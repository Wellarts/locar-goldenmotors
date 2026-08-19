<?php

namespace App\Filament\Resources\ContasPagarResource\Pages;

use App\Filament\Resources\ContasPagarResource;
use App\Models\ContasPagar;
use App\Models\FluxoCaixa;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageContasPagars extends ManageRecords
{
    protected static string $resource = ContasPagarResource::class;

    protected static ?string $title = 'Contas a Pagar';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Lançar Conta')
                ->after(
                    function ($data, $record) {
                        if ($record->parcelas > 1) {
                            $valor_parcela = ($record->valor_total / $record->parcelas);
                            $dataBase = Carbon::create($record->data_vencimento);
                            $diaOriginal = $dataBase->day;
                            for ($cont = 1; $cont < $data['parcelas']; $cont++) {
                                $dataVencimentos = match ((string) $data['proxima_parcela']) {
                                    '7'  => $dataBase->copy()->addWeeks($cont),
                                    '15' => $dataBase->copy()->addWeeks($cont * 2),
                                    '30' => tap(
                                        $dataBase->copy()->startOfMonth()->addMonths($cont),
                                        fn($data) => $data->day(min($diaOriginal, $data->daysInMonth))
                                    ),
                                    default => $dataBase->copy()->addDays($cont * $data['proxima_parcela']),
                                };
                                $parcelas = [
                                    'fornecedor_id' => $data['fornecedor_id'],
                                    'valor_total' => $data['valor_total'],
                                    'categoria_id' => $data['categoria_id'],
                                    'parcelas' => $data['parcelas'],
                                    'formaPgmto' => $data['formaPgmto'],
                                    'ordem_parcela' => $cont + 1,
                                    'data_vencimento' => $dataVencimentos,
                                    'valor_pago' => 0.00,
                                    'status' => 0,
                                    'obs' => $data['obs'],
                                    'valor_parcela' => $valor_parcela,
                                ];
                                ContasPagar::create($parcelas);
                            }
                        } else {
                            if (($data['status'] == 1)) {
                                $addFluxoCaixa = [
                                    'valor' => ($record->valor_total * -1),
                                    'tipo'  => 'DEBITO',
                                    'obs'   => 'Pagamento da conta do fornecedor ' . $record->fornecedor->nome . '',
                                ];

                                FluxoCaixa::create($addFluxoCaixa);
                            }
                        }
                    }
                ),

        ];
    }
}
