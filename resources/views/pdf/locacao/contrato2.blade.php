<!DOCTYPE html>
<html>

<head>

    <style>
        .retangulo {
            width: 100%;
            height: 2.5%;
            background-color: rgb(222, 225, 226);
            display: flex;
            align-items: center;
            text-align: center;
        }

        .texto {
            margin: auto;
            font-weight: bold;
            font-size: 16px;

        }

        .tabelas {
            border: 1px;
            border-style: solid;
            border-color: grey;
            width: 100%;
            border-collapse: collapse;
        }


        #ficha td {
            border: 1px solid rgb(160 160 160);
            padding: 8px 10px;
        }


        .tx {
            line-height: 1.5;
            font-size: 15px;
        }
    </style>

    <style>
        .tela {
            width: 100%;
            height: 100px;
            border: 0px solid black;
            float: center;
            text-align: center;

        }
    </style>

</head>

<body>

    <table style="width: 100%">
        <tr>
            <td><img src="{{ public_path('img/logo.png') }}" alt="Image" height="60" width="180"></td>
            <td>
                <p style="width: 100%; font-size:28px; font-weight: bold;" align="center">Locadora Motomaster</p>
                <p style="font-size:16px;" align="center">Av. Cesário de Melo, nº 4030 Campo Grande - Rio de Janeiro - RJ.<br>
                    Contato: (21)7402-1183<br>
                    Email: erike@rdbled.com.br - CNPJ: 53-825-708/0001-48</p>
            </td>
        </tr>

    </table>
    <div class="retangulo">
        <span class="texto">FICHA DE LOCAÇÃO</span>
    </div>
    <table>
    </table>
    <div class="retangulo">
        <span class="texto">LOCATÁRIO</span>
    </div>

    <table class="tabelas" width="100%" id='ficha'>
        <tr>
            <td colspan="2">
                <b class="tx">Nome:</b> {{$locacao->Cliente->nome}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <b class="tx">Endereço:</b> {{$locacao->Cliente->endereco}}
            </td>
        <tr>
            <td>
                <b class="tx">Cidade:</b> {{$locacao->Cliente->Cidade->nome}}
            </td>
            <td>
                <b class="tx">UF:</b> {{$locacao->Cliente->Estado->nome}}
            </td>
        </tr>
        <tr>
            <td>
                <b class="tx">Rg:</b> {{$locacao->Cliente->rg}}
            </td>
            <td>
                <b class="tx">Org Exp:</b> {{$locacao->Cliente->exp_rg}}
            </td>

        </tr>
        <tr>
            <td>
                <b class="tx">Telefones:</b> {{$tel_1.' - '.$tel_2}}
            </td>
            <td>
                <b class="tx">CPF/CNPJ:</b> {{$cpfCnpj}}
            </td>
        </tr>

    </table>
    </table>
    <div class="retangulo">
        <span class="texto">VEÍCULO</span>
    </div>
    <table class="tabelas" id='ficha'>
        <tr>
            <td>
                <b class="tx">Marca:</b> {{$locacao->Veiculo->Marca->nome}}
            </td>
            <td>
                <b class="tx">Modelo:</b> {{$locacao->Veiculo->modelo}}
            </td>
            <td>
                <b class="tx">Chassi:</b> {{$locacao->Veiculo->chassi}}
            </td>
        </tr>
        <tr>
            <td>
                <b class="tx">Ano:</b> {{$locacao->Veiculo->ano}}
            </td>
            <td>
                <b class="tx">Cor:</b> {{$locacao->Veiculo->cor}}
            </td>
            <td>
                <b class="tx">Placa:</b> {{$locacao->Veiculo->placa}}
            </td>
        </tr>
    </table>
    <div class="retangulo">
        <span class="texto">LOCAÇÃO</span>
    </div>
    <table class="tabelas" id='ficha'>
        <tr>
            <td>
                <b class="tx">Data da Saída:</b> {{\Carbon\Carbon::parse($locacao->data_saida)->format('d/m/Y')}}
            </td>
            <td>
                <b class="tx">Hora da Saída:</b> {{$locacao->hora_saida}}
            </td>

            <td>
                <b class="tx">Data do Retorno:</b> {{\Carbon\Carbon::parse($locacao->data_retorno)->format('d/m/Y')}}
            </td>
            <td>
                <b class="tx">Hora do Retorno:</b> {{$locacao->hora_retorno}}
            </td>
        </tr>
        <td>
            <b class="tx">Km de Saída:</b> {{$locacao->km_saida}}
        </td>
        <td>
        @if($locacao->forma_locacao == 1)
            <b class="tx">Qtd de Diárias:</b> {{$locacao->qtd_diarias}}
        @elseif($locacao->forma_locacao == 2)
            <b class="tx">Qtd de Semanas:</b> {{$locacao->qtd_semanas}}
        @elseif($locacao->forma_locacao == 3)
            <b class="tx">Qtd de Meses:</b> {{$locacao->qtd_meses}}
        @endif
    </td>
    <td colspan="2">
        @if($locacao->forma_locacao == 1)
            <b class="tx">Valor da Diária R$:</b> {{$locacao->Veiculo->valor_diaria}}
        @elseif($locacao->forma_locacao == 2)
            <b class="tx">Valor da Semana R$:</b> {{$locacao->Veiculo->valor_semana}}
        @elseif($locacao->forma_locacao == 3)
            <b class="tx">Valor do Mês R$:</b> {{$locacao->Veiculo->valor_mes}}
        @endif
    </td>

        </tr>
        <tr>
            <td>
                <b class="tx">Km de Retorno:</b> {{$locacao->km_retorno}}
            </td>
            <td>
                <b class="tx">Valor do Desconto R$:</b> {{$locacao->valor_desconto}}
            </td>
            <td colspan="2">
                <b class="tx">Valor Total R$:</b> {{$locacao->valor_total_desconto}}
            </td>

        </tr>

    </table>

    <table class="tabelas" id='ficha'>
        <tr>
            <td>
                <b class="tx">Observações: </b> {{$locacao->obs}}
            </td>
        </tr>
    </table>

    <!-- PÁGINA 2 -->

    <style>
        .break {
            page-break-before: always;
        }

        .parag {
            text-align: justify;
            font-size: 11;
        }
    </style>

    <div class="break">

        <table style="width: 100%">
            <tr>
                <td><img src="{{ public_path('img/logo.png') }}" alt="Image" height="60" width="180"></td>
                <td>
                    <p style="width: 100%; font-size:20px; font-weight: bold" align="center">Contrato de Locação de Veículos</p>
                    <p style="width: 100%; font-size:16px; font-weight: bold" align="right; color:LightSlateGray">Plano Minha Moto</p>

                </td>
            </tr>
        </table>
    </div>
    <div>
        <p class="parag">
            Registro: <b>{{$locacao->id}}</b><br><br>
            Parte, locadora. Motomaster Campo Grande Ltda CNPJ 53.825.708/0001-48 Endereço: AV. Cesario de Melo 04030 denominado LOCADOR.<br><br>


            CLÁUSULA 1 DO OBJETO DO CONTRATO:<br>
            1.1- Por meio deste contrato regula-se a locação da motocicleta da marca: <b>{{$locacao->Veiculo->modelo}} - {{$locacao->Veiculo->cor}} - {{$locacao->Veiculo->ano}}.</b><br>

        <p style="text-align: justify;"><strong>1.2. O ve&iacute;culo descrito acima, ser&aacute; utilizado exclusivamente pelo LOCAT&Aacute;RIO, n&atilde;o sendo permitido sub-rogar </strong><strong>para terceiros os direitos por ele obtidos contrato do presente, nem permitir que outra pessoa conduza o referido ve&iacute;culo sem a inequ&iacute;voca e expressa autoriza&ccedil;&atilde;o do LOCADOR, sob pena de rescis&atilde;o contratual, multa de R$ </strong><strong>1.600,00 (um mil e seiscentos reais), bem como, a responsabiliza&ccedil;&atilde;o total por qualquer ato ou danos em rela&ccedil;&atilde;o </strong><strong>ao ve&iacute;culo, inclusive os provenientes de caso fortuito ou for&ccedil;a maior.</strong><br />CL&Aacute;USULA 2&ordf; &ndash; DO HOR&Aacute;RIO DO ALUGU&Eacute;L E LOCAL DE COLETA E DEVOLU&Ccedil;&Atilde;O DO VE&Iacute;CULO<br />2.1. O ve&iacute;culo em quest&atilde;o permanecer&aacute; na posse do LOCAT&Aacute;RIO por per&iacute;odo integral, de segunda a domingo.<br />2.2. O LOCAT&Aacute;RIO dever&aacute; apresentar o ve&iacute;culo ao LOCADOR 01 (uma) vez por m&ecirc;s ou quando for comunicado pela locadora, para a realiza&ccedil;&atilde;o de vistoria, em data e endere&ccedil;o por este designado.<br />2.3. A n&atilde;o apresenta&ccedil;&atilde;o do ve&iacute;culo, no prazo e os supracitados locais, ser&atilde;o cobrados ao LOCAT&Aacute;RIO multa de R$ 150,00 (cento e cinquenta reais) mais R$ 50,00 (cinquenta reais) por dia de atraso, al&eacute;m da poss&iacute;vel rescis&atilde;o contratual.<br />CL&Aacute;USULA 3&ordf; &ndash; DAS OBRIGA&Ccedil;&Otilde;ES DO LOCADOR<br />3.1. O ve&iacute;culo objeto do presente contrato ser&aacute; submetido &agrave; manuten&ccedil;&atilde;o preventiva peri&oacute;dica, ou em decorr&ecirc;ncia de problemas mec&acirc;nicos e/ou el&eacute;tricos, aos quais o LOCAT&Aacute;RIO n&atilde;o deu causa, em oficina mec&acirc;nica designada pelo LOCADOR, nos termos a seguir:<br />3.2. O LOCADOR se compromete a realizar a transfer&ecirc;ncia do ve&iacute;culo, aqui citado, no final deste contrato, se n&atilde;o apresentar d&eacute;bitos ativos por parte do LOCAT&Aacute;RIO, todos os gastos para transfer&ecirc;ncia do ve&iacute;culo ser&atilde;o de responsabilidade do locat&aacute;rio, caso seja encerrado o contrato antes do prazo estabelecido por quaisquer motivos, o contrato ser&aacute; considerado como uma loca&ccedil;&atilde;o normal pelo tempo de contrato estabelecido no in&iacute;cio deste contrato.<br />3.3. No caso de problemas mec&acirc;nicos e/ou el&eacute;tricos (quebra, defeito e/ou desgaste) percebidos em ocasi&atilde;o diversa da manuten&ccedil;&atilde;o preventiva peri&oacute;dica, o LOCAT&Aacute;RIO dever&aacute; informar imediatamente ao LOCADOR, bem como apresentar o ve&iacute;culo a este, no prazo de 24 horas, para reparo a ser realizado em oficina mec&acirc;nica designada pelo LOCADOR.<br />3.4. O LOCADOR manter&aacute; prote&ccedil;&atilde;o veicular no ve&iacute;culo, caso o LOCAT&Aacute;RIO contrate os planos de seguro descrito no in&iacute;cio deste contrato, caso n&atilde;o haja interesse de adquirir prote&ccedil;&atilde;o veicular por parte do LOCAT&Aacute;RIO, o ve&iacute;culo seguir&aacute; por total responsabilidade civil e criminal do LOCAT&Aacute;RIO, ficando respons&aacute;vel por quaisquer danos causados ao ve&iacute;culo<br />alugado ou a terceiros.<br />3.5. Caso o LOCAT&Aacute;RIO opte por contratar alguma prote&ccedil;&atilde;o veicular (seguro para pane mec&acirc;nica/el&eacute;trica, seguro para&nbsp; terceiros, seguro para o ve&iacute;culo), fica a observa&ccedil;&atilde;o em que o seguro veicular s&oacute; ser&aacute; v&aacute;lido dentro do per&iacute;metro de at&eacute; 200 km (duzentos quil&ocirc;metros) de dist&acirc;ncia da base da locadora onde foi retirada a moto, sendo que, a prote&ccedil;&atilde;o veicular para terceiros &eacute; fixada no valor m&aacute;ximo a ser <strong>coberto em R$30.000,00 (trinta mil reais) para danos materiais</strong>. caso os danos a terceiros ultrapassar trinta mil reais, o valor excedente deve ser cobrado do LOCAT&Aacute;RIO.<br />3.6. &ndash; Veiculo moto reserva, a locadora n&atilde;o &eacute; obrigada a disponibilizar ve&iacute;culo reserva, e n&atilde;o se responsabiliza caso o&nbsp; LOCAT&Aacute;RIO n&atilde;o possa dirigir devido &agrave; indisponibilidade do ve&iacute;culo.<br />CL&Aacute;USULA 4&ordf; &ndash; DAS OBRIGA&Ccedil;&Otilde;ES DO LOCAT&Aacute;RIO<br />4.1. Quaisquer danos/avarias ao ve&iacute;culo ser&atilde;o apurados no final do contrato ou em vistoria mensal e os custos de repara&ccedil;&atilde;o ser&atilde;o arcados pelo LOCAT&Aacute;RIO imediatamente.<br />4.2. Os custos de revis&otilde;es reparat&oacute;rias causadas pelo mau uso dos ve&iacute;culos correr&atilde;o por conta do LOCAT&Aacute;RIO. Caso a bomba de combust&iacute;vel queime ou danifique por falta de combust&iacute;vel ou neglig&ecirc;ncia, quando o ve&iacute;culo estiver em posse do LOCAT&Aacute;RIO, este dever&aacute; arcar com o valor integral da pe&ccedil;a, m&atilde;o de obra, reboque do ve&iacute;culo e demais valores inerentes ao reparo.<br />4.3. &Eacute; de responsabilidade do LOCAT&Aacute;RIO o pagamento de quaisquer multas relativas &agrave;s infra&ccedil;&otilde;es de tr&acirc;nsito inerentes &agrave; utiliza&ccedil;&atilde;o do ve&iacute;culo cometidas na vig&ecirc;ncia deste contrato.<br />4.4. O pagamento das multas pelo LOCAT&Aacute;RIO dever&aacute; ser realizado imediatamente ap&oacute;s a constata&ccedil;&atilde;o no sistema do DETRAN, independentemente de qualquer procedimento, seja transfer&ecirc;ncia de pontos ou recurso.<br />4.5. O LOCAT&Aacute;RIO concorda que o LOCADOR ir&aacute; indic&aacute;-lo como condutor/infrator respons&aacute;vel pelas infra&ccedil;&otilde;es de tr&acirc;nsito apuradas durante a loca&ccedil;&atilde;o, nos termos do artigo 257, par&aacute;grafos 1&ordm;, 3&ordm;, 7&ordm; e 8&ordm; do C&oacute;digo de Tr&acirc;nsito. A partir da indica&ccedil;&atilde;o, o LOCAT&Aacute;RIO ter&aacute; legitimidade para se defender perante o &oacute;rg&atilde;o atuador.<br />4.6. Qualquer questionamento sobre eventual improced&ecirc;ncia de infra&ccedil;&atilde;o de tr&acirc;nsito dever&aacute; ser feito exclusivamente pelo LOCAT&Aacute;RIO perante o &oacute;rg&atilde;o autuado.<br />4.7. Ao ocorrer as multas acima mencionadas, quando a autua&ccedil;&atilde;o da infra&ccedil;&atilde;o chegar ao LOCADOR, dever&aacute; o LOCAT&Aacute;RIO comparecer em local e data estipulados pelo LOCADOR se necess&aacute;rio, para a assinatura do auto de infra&ccedil;&atilde;o, com o intuito de transfer&ecirc;ncia dos pontos para a sua CNH, sob pena de pagamento ao LOCADOR na quantia de R$ 200,00 (duzentos reais), em caso de perda do prazo para a transfer&ecirc;ncia dos pontos.<br />4.8. Caso o ve&iacute;culo seja rebocado por estacionamento irregular, ou outra hip&oacute;tese a qual tenha dado causa, o LOCAT&Aacute;RIO dever&aacute; arcar com todos os custos necess&aacute;rios para a recupera&ccedil;&atilde;o do ve&iacute;culo junto ao respectivo dep&oacute;sito p&uacute;blico. O LOCAT&Aacute;RIO dever&aacute; arcar tamb&eacute;m com multa contratual de R$ 30,00 (trinta reais) por dia pelo per&iacute;odo em que a moto estiver no dep&oacute;sito, a t&iacute;tulo de lucro cessante.<br />4.9. &Eacute; proibido o LOCAT&Aacute;RIO acionar o servi&ccedil;o de prote&ccedil;&atilde;o veicular do ve&iacute;culo, objeto deste contrato, sem a expressa permiss&atilde;o do LOCADOR, sob pena de multa de R$ 200,00 (duzentos reais), al&eacute;m da obriga&ccedil;&atilde;o de arcar com eventuais custos de reboques e/ou transportes necess&aacute;rios, caso o servi&ccedil;o de prote&ccedil;&atilde;o veicular n&atilde;o os disponibilize mais, devido ao limite de utiliza&ccedil;&otilde;es mensais deste servi&ccedil;o.<br />4.10. O LOCAT&Aacute;RIO se responsabiliza por quaisquer acess&oacute;rios do ve&iacute;culo que estiverem em sua posse, como por exemplo chave de igni&ccedil;&atilde;o, documento do ve&iacute;culo, entre outros. Caso algum acess&oacute;rio do ve&iacute;culo seja perdido ou danificado, o LOCAT&Aacute;RIO dever&aacute; arcar com todos os custos necess&aacute;rios &agrave; reposi&ccedil;&atilde;o.<br />4.11. &Eacute; proibido o LOCAT&Aacute;RIO sair do per&iacute;metro raio de 50km onde a moto foi alugada, com o ve&iacute;culo objeto deste contrato, sem a autoriza&ccedil;&atilde;o expressa e por escrito do LOCADOR, sob pena de multa de R$ 150,00 (cento e cinquenta reais), al&eacute;m do pagamento dos custos para o retorno do ve&iacute;culo para base da locadora, bem como o pagamento de eventuais danos ocorridos com o ve&iacute;culo, inclusive caso furto e for&ccedil;a maior, exceto se o LOCAT&Aacute;RIO adquiriu o plano sa&iacute;da da cidade no raio de 100km ou 200km, onde o locat&aacute;rio pagar&aacute; uma taxa di&aacute;ria para ter direito a este benef&iacute;cio.<br />4.12. Em caso de roubo ou furto do ve&iacute;culo, o LOCAT&Aacute;RIO se compromete em avisar imediatamente ao LOCADOR, bem como a comparecer &agrave; delegacia de pol&iacute;cia mais pr&oacute;xima da resid&ecirc;ncia do LOCADOR para registrar a ocorr&ecirc;ncia.<br />4.13. O LOCAT&Aacute;RIO se compromete a comparecer &agrave; sede da empresa de prote&ccedil;&atilde;o veicular, ou outro local especificado por ela, a fim de cumprir com procedimento de indeniza&ccedil;&atilde;o do ve&iacute;culo.<br />4.14. Caso o LOCAT&Aacute;RIO se envolva em sinistro, estando sob efeito de &aacute;lcool/entorpecentes, ou se n&atilde;o fizer o teste de embriaguez requerido pela autoridade ou at&eacute; mesmo <strong>n&atilde;o fa&ccedil;a ou se recuse a fazer o boletim de ocorr&ecirc;ncia junto aos </strong><strong>&oacute;rg&atilde;os competentes em um prazo de at&eacute; 12 horas</strong>, este dever&aacute; pagar ao LOCADOR o valor da tabela FIPE do ve&iacute;culo, caso a indeniza&ccedil;&atilde;o da prote&ccedil;&atilde;o veicular seja negada e/ou com todos os custos inerentes &agrave; recupera&ccedil;&atilde;o do ve&iacute;culo junto ao dep&oacute;sito, em caso de reboque.<br /><strong>4.15. O LOCAT&Aacute;RIO deve manter as caracter&iacute;sticas originais do ve&iacute;culo, deste modo, a instala&ccedil;&atilde;o de adesivos, </strong><strong>pinturas especiais, equipamentos e outros, na constata&ccedil;&atilde;o da falta ou danos e descaracteriza&ccedil;&atilde;o do ve&iacute;culo, fica </strong><strong>sujeito a multa de R$ 150,00 mais o pagamento do reparo ou substitui&ccedil;&atilde;o de pe&ccedil;as ou avarias do ve&iacute;culo</strong>.<br />4.16. &Eacute; de responsabilidade do LOCAT&Aacute;RIO o pagamento e a troca do &oacute;leo do motor e filtro a cada 2.000 km (dois mil quil&ocirc;metros) rodados ou o que for orientado previamente, de acordo com as especifica&ccedil;&otilde;es do fabricante do ve&iacute;culo.<br /><strong>Fica obrigat&oacute;rio a troca de &oacute;leo no local em que a locadora determinar, ser&aacute; exigido foto do painel do ve&iacute;culo e </strong><strong>nota fiscal da compra do &oacute;leo (&oacute;leo especificado pela locadora ou fabricante da moto), em caso da n&atilde;o realiza&ccedil;&atilde;o da troca de &oacute;leo no per&iacute;odo certo especificado, fica sujeito a multa de R$ 100,00 (cem reais).</strong><br />4.17. O pagamento de multas cometidas por n&atilde;o cumprimento do contrato bem como reparos e consertos da moto cometido por mau uso do locat&aacute;rio, dever&aacute; ser pago imediatamente ap&oacute;s a constata&ccedil;&atilde;o do mesmo.<br />4.18. Aceitar que o LOCADOR promova, pelos meios processuais de que venha a dispor, o seu chamamento aos feitos judiciais promovidos por terceiros decorrentes de eventos com o ve&iacute;culo alugado, cabendo-lhe assumir o polo passivo nas demandas, inclusive quanto aos valores reclamados por terceiros e/ou para assegurar os direitos regressivos do LOCADOR. O LOCAT&Aacute;RIO ser&aacute; respons&aacute;vel pelo pagamento de lucros cessantes que terceiros possam pleitear judicialmente em raz&atilde;o de conduta irregular do LOCAT&Aacute;RIO.<br />CL&Aacute;USULA 5&ordf; &ndash; DAS OBRIGA&Ccedil;&Otilde;ES DECORRENTES DE COLIS&Otilde;ES E AVARIAS DO VE&Iacute;CULO<br />5.1. &Eacute; de responsabilidade do LOCAT&Aacute;RIO o pagamento do reboque, taxas e reparos ao ve&iacute;culo objeto do presente contrato ou a ve&iacute;culo de outrem, na ocorr&ecirc;ncia de acidentes e colis&otilde;es sofridas na vig&ecirc;ncia do presente contrato, quando n&atilde;o contempladas pela cobertura da prote&ccedil;&atilde;o veicular contratada para este ve&iacute;culo, independente de dolo, culpa, neglig&ecirc;ncia, imprud&ecirc;ncia ou imper&iacute;cia do LOCAT&Aacute;RIO.<br /><strong>5.2. Na ocorr&ecirc;ncia da necessidade do pagamento da cota de participa&ccedil;&atilde;o da prote&ccedil;&atilde;o veicular, a quantia ser&aacute; </strong><strong>integralmente de responsabilidade do LOCAT&Aacute;RIO, no valor de R$ 1.600,00, 24 horas a contar da comunica&ccedil;&atilde;o </strong><strong>ao LOCADOR. No caso em que o LOCAT&Aacute;RIO resilir o presente contrato, 24 (vinte e quatro) horas a contar do </strong><strong>momento em que teve ci&ecirc;ncia da resili&ccedil;&atilde;o, quando realizada pelo LOCADOR.</strong><br />5.3. Ser&aacute; de responsabilidade do LOCAT&Aacute;RIO, o pagamento de taxas e di&aacute;rias para a libera&ccedil;&atilde;o do ve&iacute;culo decorrentes ao reboque realizado pelo Poder P&uacute;blico, nos casos supracitados.<br />5.4.A responsabilidade determinada nos itens supracitados permanece estabelecida, inclusive, caso o LOCAT&Aacute;RIO n&atilde;o se encontre no interior do ve&iacute;culo objeto do presente contrato.<br />CL&Aacute;USULA 6&ordf; &ndash; DO PAGAMENTO EM RAZ&Atilde;O DA LOCA&Ccedil;&Atilde;O DO VE&Iacute;CULO<br />6.1.O LOCAT&Aacute;RIO pagar&aacute; ao LOCADOR o valor citado no in&iacute;cio do contrato semanalmente.<br /><strong>6.2. Caso o pagamento seja realizado ap&oacute;s a data acordada, o valor sofrer&aacute; um acr&eacute;scimo de R$ 30,00 (trinta </strong><strong>reais) a t&iacute;tulo de multa, bem como um acr&eacute;scimo de R$ 10,00 (dez reais) por dia de atraso a t&iacute;tulo de juros.</strong><br />6.3. Caso o pagamento da loca&ccedil;&atilde;o n&atilde;o seja pago no dia do vencimento acordado, o LOCADOR poder&aacute; encerrar o contrato e bloquear o ve&iacute;culo sem aviso pr&eacute;vio, entendendo que o n&atilde;o pagamento confirma o cancelamento do contrato por parte do LOCAT&Aacute;RIO, e que o LOCADOR poder&aacute; usar o valor cau&ccedil;&atilde;o para cobrir os d&eacute;bitos e restante das di&aacute;rias prevista em contrato da cl&aacute;usula 8.1 e 8.1.1.<br />6.4. A locadora reserva o direito de reajuste anual no valor da loca&ccedil;&atilde;o, baseado na taxa &iacute;ndice da <strong>SELIC.</strong><br />CL&Aacute;USULA 7&ordf; &ndash; DA QUANTIA CAU&Ccedil;&Atilde;O<br />7.1. Estabelecem como partes, a QUANTIA CAU&Ccedil;&Atilde;O no valor total descrito no in&iacute;cio do contrato, a ser integralizada at&eacute; o ato de retirada do ve&iacute;culo.<br />7.2. Ao t&eacute;rmino da vig&ecirc;ncia do presente contrato caber&aacute; ao LOCADOR restituir a integralidade da QUANTIA CAU&Ccedil;&Atilde;O ao LOCAT&Aacute;RIO no prazo de 30 (trinta) dias &uacute;teis, de a contar da devolu&ccedil;&atilde;o do ve&iacute;culo por parte do LOCAT&Aacute;RIO, o valor ser&aacute; devolvido sem juros e corre&ccedil;&atilde;o monet&aacute;ria, conforme as seguintes CONDI&Ccedil;&Otilde;ES: A devolu&ccedil;&atilde;o do ve&iacute;culo em perfeito estado, em condi&ccedil;&atilde;o equivalente &agrave; observada ao &uacute;ltimo checklist de vistoria, e ap&oacute;s vistoria realizada por fotos ou v&iacute;deo<br />enviado para o WhatsApp do LOCADOR; a inexist&ecirc;ncia de alugu&eacute;is, multas de tr&acirc;nsito ou multas por descumprimento contratual pendente por parte do LOCAT&Aacute;RIO; ap&oacute;s realiza&ccedil;&atilde;o da manuten&ccedil;&atilde;o necess&aacute;ria do ve&iacute;culo, caso haja necessidade; ap&oacute;s descontados quaisquer outros subs&iacute;dios pendentes.<br />7.3. Na hip&oacute;tese de n&atilde;o estarem observadas as condi&ccedil;&otilde;es acima dispostas, o LOCADOR poder&aacute; utilizar-se da QUANTIA CAU&Ccedil;&Atilde;O para adimplir subs&iacute;dios eventuais ou reparar danos causados ao ve&iacute;culo, que n&atilde;o decorram o desgaste natural e a utiliza&ccedil;&atilde;o adequada do bem, hip&oacute;teses em que s&oacute; ser&aacute; de direito do LOCAT&Aacute;RIO a quantidade remanescente a tal utiliza&ccedil;&atilde;o da QUANTIA CAU&Ccedil;&Atilde;O.<br />7.4. Os gastos com o combust&iacute;vel do ve&iacute;culo dever&atilde;o ser arcados integralmente pelo LOCAT&Aacute;RIO, e sempre devolver o ve&iacute;culo com a mesma quantidade de combust&iacute;vel contido no ve&iacute;culo quando a entrega deste foi realizado pelo LOCADOR, sob pena de desconto na QUANTIA CAU&Ccedil;&Atilde;O do valor necess&aacute;rio a atingir tal quantidade de combust&iacute;vel.<br />7.5. Qualquer valor que implica a cobran&ccedil;a por passagem, estacionamento ou ped&aacute;gio do ve&iacute;culo durante a posse do LOCAT&Aacute;RIO, dever&aacute; por este ser arcado. Caso o LOCADOR seja cobrado por qualquer valor desta natureza, o LOCAT&Aacute;RIO dever&aacute; reembols&aacute;-lo imediatamente.<br />7.6. Caso o ve&iacute;culo seja devolvido sujo, ser&aacute; cobrada higieniza&ccedil;&atilde;o no valor R$ 80,00 (oitenta reais). Na hip&oacute;tese de lavagem especial ser&aacute; cobrada tamb&eacute;m 1 (um) dia de loca&ccedil;&atilde;o, ou quanto for permitido, at&eacute; a disponibiliza&ccedil;&atilde;o do ve&iacute;culo, limitadas a 10 (dez) di&aacute;rias.<br />7.7. Quando o documento do ve&iacute;culo n&atilde;o for devolvido, ser&aacute; cobrada uma taxa de R$ 150,00 (cento e cinquenta reais).<br /><strong>CL&Aacute;USULA 8&ordf; Em caso de devolu&ccedil;&atilde;o antecipada, o LOCAT&Aacute;RIO pagar&aacute; uma multa no valor de 20% (vinte por </strong><strong>cento) das di&aacute;rias restantes, n&atilde;o recuperando quaisquer valores j&aacute; pagos ao LOCADOR.</strong><br />8.1. &Eacute; assegurado &agrave;s partes a resili&ecirc;ncia do presente CONTRATO a qualquer tempo, bastando, para tanto, dar ci&ecirc;ncia a outra parte, cabendo ao LOCAT&Aacute;RIO a devolu&ccedil;&atilde;o do ve&iacute;culo ao LOCADOR em local designado por este no seguinte prazo: 24 (vinte e quatro) horas a contar da comunica&ccedil;&atilde;o ao LOCADOR. No caso em que o LOCAT&Aacute;RIO resista ao presente contrato. 24 (vinte e quatro) horas a contar do momento em que teve ci&ecirc;ncia da resili&ecirc;ncia, quando realizada pelo LOCADOR.<br />8.1. Caso seja necess&aacute;rio o acionamento de guincho/reboque para buscar o ve&iacute;culo alugado, ser&aacute; cobrado toda a despesa de transporte do locat&aacute;rio.<br />8.2. O contrato poder&aacute; ser rescindido em pleno direito pelo LOCADOR, independentemente de qualquer notifica&ccedil;&atilde;o, sem mais formalidades, providenciar&aacute; a retomada do ve&iacute;culo, sem que isso enseje ao LOCAT&Aacute;RIO qualquer direito de reten&ccedil;&atilde;o, indeniza&ccedil;&atilde;o ou devolu&ccedil;&atilde;o da quantia cau&ccedil;&atilde;o, quando:</p>
        <p style="text-align: justify;">8.3. O ve&iacute;culo n&atilde;o pode ser devolvido na data, hora e local previamente ajustados;<br />8.3.1. Corrija o uso inadequado do ve&iacute;culo;<br />8.3.2. Corrigir apreens&atilde;o do ve&iacute;culo localizado por autoridades competentes;<br />8.3.3. O LOCAT&Aacute;RIO n&atilde;o quitar seus subs&iacute;dios nos respectivos vencimentos;<br />8.3.4. O contrato pode ser encerrado se o LOCAT&Aacute;RIO acumular uma d&iacute;vida superior a R$ 50,00 (cinquenta reais), caso<br />no qual o ve&iacute;culo dever&aacute; ser entregue no local determinado pelo LOCADOR, imediatamente, sob pena de multa de R$<br />150,00 (cento e cinquenta reais) por dia, salvo acordo contr&aacute;rio entre as partes.<br />8.4. Fica desde j&aacute;, pactuada a total inexist&ecirc;ncia de v&iacute;nculo trabalhista entre as partes do presente contrato, sendo indevida toda e qualquer incid&ecirc;ncia das obriga&ccedil;&otilde;es previdenci&aacute;rias e dos encargos sociais, n&atilde;o havendo entre as partes, qualquer tipo de subordina&ccedil;&atilde;o e controle t&iacute;picos de rela&ccedil;&otilde;es de emprego.<br />8.5. Nos termos do artigo 265 do C&oacute;digo Civil Brasileiro, inexiste solidariedade, seja contratual ou legal entre o LOCADOR e o LOCAT&Aacute;RIO, raz&atilde;o pela qual, com a loca&ccedil;&atilde;o e a efetiva retirada do ve&iacute;culo motorizado, o LOCAT&Aacute;RIO assume sua posse aut&ocirc;noma para todos os fins de direito, responsabilizando-se por eventuais indeniza&ccedil;&otilde;es decorrentes do uso e circula&ccedil;&atilde;o do ve&iacute;culo, cuja responsabilidade perdurar&aacute; at&eacute; a efetiva&ccedil;&atilde;o da devolu&ccedil;&atilde;o do ve&iacute;culo alternativo.</p>
        <p style="text-align: justify;"><br />CL&Aacute;USULA 9&ordf; &ndash; DA DEVOLU&Ccedil;&Atilde;O DO VE&Iacute;CULO<br /><strong>9.1. A n&atilde;o devolu&ccedil;&atilde;o de ve&iacute;culo pelo LOCAT&Aacute;RIO, ap&oacute;s notifica&ccedil;&atilde;o realizada pelo LOCADOR, configura crime de </strong><strong>APROPRIA&Ccedil;&Atilde;O IND&Eacute;BITA conforme artigo 168 do C&oacute;digo Penal Brasileiro, com pena de reclus&atilde;o de um a quatro </strong><strong>anos de pris&atilde;o e multa.</strong></p>
        <p style="text-align: justify;"><br />CL&Aacute;USULA 10&ordf; - DAS DISPOSI&Ccedil;&Otilde;ES GERAIS<br />10.1. Quaisquer notifica&ccedil;&otilde;es e comunicados enviados sob esse contrato podem ser realizados de forma eletr&ocirc;nica (email ou WhatsApp), escritos ou por correspond&ecirc;ncia com aviso de recep&ccedil;&atilde;o aos endere&ccedil;os constantes do pre&acirc;mbulo. Ficam as partes obrigadas a fornecer tal informa&ccedil;&atilde;o.<br />10.2. Todos os valores, despesas e encargos de loca&ccedil;&atilde;o espec&iacute;ficos de d&iacute;vidas l&iacute;quidas e espec&iacute;ficos para pagamento &agrave; vista, pass&iacute;veis de cobran&ccedil;a executiva.<br />10.3. Eventuais toler&acirc;ncias do LOCADOR para com o LOCAT&Aacute;RIO no cumprimento das obriga&ccedil;&otilde;es ajustadas neste contrato espec&iacute;fico mera liberalidade, n&atilde;o importando em hip&oacute;teses de nova&ccedil;&atilde;o ou ren&uacute;ncia, permanecendo integralmente as cl&aacute;usulas e condi&ccedil;&otilde;es aqui contratadas.<br />10.4. O LOCAT&Aacute;RIO autoriza o LOCADOR a coletar, usar e divulgar sua imagem para fins de cadastro, defesa e/ou promo&ccedil;&atilde;o.<br />10.5. O LOCAT&Aacute;RIO concorda que sua assinatura no contrato, implica ci&ecirc;ncia e ades&atilde;o por si, seus herdeiros/sucessores a estas cl&aacute;usulas.<br />10.6. Fica eleito o Foro desta cidade de S&atilde;o Paulo SP, como competente para dirimir quaisquer quest&otilde;es que possam aconselhar da aplica&ccedil;&atilde;o do presente CONTRATO, por mais privilegiado que seja ou venha a ser, qualquer Foro.<br />10.7. E, por serem assim, justas e contratadas, as partes firmam o presente instrumento em 02 (duas) vias de igual teor e forma, para que produza seus efeitos legais, ap&oacute;s ter lido o seu conte&uacute;do ter sido claramente entendido e aceito.</p>



    </div><br><br>

    <div style="text-align: center; font-size: 12">Rio de Janeiro, {{ $dataAtual->isoFormat('DD MMMM YYYY') }}<br><br><br><br>

        ___________________________________________________________<br>
        LOCATÁRIO: {{$locacao->Cliente->nome}}<br><Br><br><br>

        ___________________________________________________________<br>
        LOCADOR: MOTOMASTER CAMPO GRANDE LTDA.



    </div>











</body>

</html>