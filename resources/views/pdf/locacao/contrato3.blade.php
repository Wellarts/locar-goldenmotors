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
        <span class="texto">FICHA DE LOCAÇÃO - MOTOCICLETA ELÉTRICA</span>
    </div>
    <table>
    </table>
    <div class="retangulo">
        <span class="texto">LOCATÁRIO</span>
    </div>

    <table class="tabelas" width="100%" id='ficha'>
        <tr>
            <td colspan="2">
                <b class="tx">Nome:</b> {{$locacao->Cliente->nome}}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <b class="tx">Endereço:</b> {{$locacao->Cliente->endereco}}
            </td>
        </tr>
        <tr>
            <td>
                <b class="tx">Cidade:</b> {{$locacao->Cliente->Cidade->nome}}
            </td>
            <td>
                <b class="tx">UF:</b> {{$locacao->Cliente->Estado->nome}}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <b class="tx">E-mail:</b> {{$locacao->Cliente->email}}
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
                <b class="tx">Ano/Modelo:</b> {{$locacao->Veiculo->ano}}
            </td>
            <td>
                <b class="tx">Cor:</b> {{$locacao->Veiculo->cor}}
            </td>
            <td>
                <b class="tx">Motor:</b>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <b class="tx">Valor de Referência R$:</b> R$ {{$locacao->valor_total_desconto}}
            </td>
        </tr>
    </table>
    <div class="retangulo">
        <span class="texto">CONDIÇÕES FINANCEIRAS</span>
    </div>
    <table class="tabelas" id='ficha'>
        <tr>
            <td>
                <b class="tx">Entrada / Caução R$:</b> R$ {{$locacao->valor_caucao}}
            </td>
            <td>
                <b class="tx">Prazo Contratado:</b> {{\Carbon\Carbon::parse($locacao->data_saida)->diffInMonths(\Carbon\Carbon::parse($locacao->data_retorno))}} meses
            </td>
        </tr>
        <tr>
            <td>
                <b class="tx">Valor da Parcela R$:</b> R$ {{$locacao->valor_parcela_financeiro}}
            </td>
            <td>
                <b class="tx">Quantidade de Parcelas:</b> {{$locacao->parcelas_financeiro}}
            </td>
        </tr>
        <tr>
            <td>
                <b class="tx">Dia do Vencimento (1ª parcela):</b> {{ \Carbon\Carbon::parse($locacao->data_vencimento_financeiro)->format('d/m/Y') }}
            </td>
            <td>
                <b class="tx">Valor Total Financiado R$:</b> R$ {{$locacao->valor_total_desconto}}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <b class="tx">Forma de Pagamento:</b>
                ( {{$locacao->formaPgmto_financeiro == 1 ? 'X' : ' '}} ) Dinheiro &nbsp;&nbsp;
                ( {{$locacao->formaPgmto_financeiro == 2 ? 'X' : ' '}} ) Pix &nbsp;&nbsp;
                ( {{$locacao->formaPgmto_financeiro == 3 ? 'X' : ' '}} ) Cartão &nbsp;&nbsp;
                ( {{$locacao->formaPgmto_financeiro == 4 ? 'X' : ' '}} ) Boleto
            </td>
        </tr>
    </table>
    <div class="retangulo">
        <span class="texto">OBSERVAÇÕES</span>
    </div>
    <table class="tabelas" id='ficha'>
        <tr>
            <td>
                {{ $locacao->obs}}
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
                    <p style="width: 100%; font-size:20px; font-weight: bold" align="center">Contrato Particular de Locação Operacional de Motocicleta Elétrica com Opção de Compra</p>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <p class="parag">
            Registro: <b>{{$locacao->id}}</b><br><br>

            <b>LOCADORA</b><br>
            Razão Social: <b>MOTOMASTER CAMPO GRANDE LTDA</b><br>
            CNPJ: <b>53.825.708/0001-48</b><br>
            E-mail: motomaster@rdbled.com.br<br><br>

            <b>LOCATÁRIO</b><br>
            Nome: {{$locacao->Cliente->nome}}<br>
            CPF/CNPJ: {{$cpfCnpj}}<br><br>

            <b>VEÍCULO</b><br>
            Marca: {{$locacao->Veiculo->Marca->nome}} - Modelo: {{$locacao->Veiculo->modelo}} - Cor: {{$locacao->Veiculo->cor}} - Ano/Modelo: {{$locacao->Veiculo->ano}}<br><br>
        </p>

        <p class="parag">
            <b>CLÁUSULA PRIMEIRA - DO OBJETO</b><br>
            1.1. O presente contrato tem por objeto a locação operacional da motocicleta elétrica identificada no Quadro Resumo da Operação, de propriedade da MOTOMASTER CAMPO GRANDE LTDA, doravante denominada LOCADORA, para utilização exclusiva do LOCATÁRIO, observadas todas as condições estabelecidas neste instrumento.<br>
            1.2. Durante toda a vigência contratual a motocicleta permanecerá de propriedade exclusiva da LOCADORA.<br>
            1.3. O presente contrato não transfere ao LOCATÁRIO qualquer direito de propriedade sobre o veículo.<br>
            1.4. O LOCATÁRIO reconhece que recebe a motocicleta em perfeitas condições de funcionamento, conservação e segurança, comprometendo-se a devolvê-la nas mesmas condições, ressalvado o desgaste natural decorrente da utilização regular.
        </p>

        <p class="parag">
            <b>CLÁUSULA SEGUNDA - DO PRAZO</b><br>
            2.1. O prazo da locação será aquele indicado no Quadro Resumo da Operação.<br>
            2.2. O contrato inicia-se na data da entrega do veículo.<br>
            2.3. O término ocorrerá automaticamente ao final do prazo contratado, salvo renovação expressa entre as partes.<br>
            2.4. Qualquer tolerância concedida pela LOCADORA não implicará novação contratual nem renúncia de direitos.
        </p>

        <p class="parag">
            <b>CLÁUSULA TERCEIRA - DOS PAGAMENTOS</b><br>
            3.1. O LOCATÁRIO compromete-se a pagar rigorosamente as parcelas nas datas estabelecidas.<br>
            3.2. O atraso no pagamento implicará:<br>
            I – multa de 2% sobre a parcela vencida;<br>
            II – juros moratórios de 1% ao mês, calculados proporcionalmente aos dias de atraso;<br>
            III – atualização monetária pelo índice legal aplicável.<br>
            3.3. Persistindo a inadimplência, poderá a LOCADORA adotar as medidas administrativas e judiciais cabíveis para cobrança dos valores devidos.<br>
            3.4. O não recebimento de boletos, mensagens ou notificações não isenta o LOCATÁRIO da obrigação de efetuar os pagamentos nas datas contratadas.<br>
            3.5. Eventual pagamento parcial não implicará quitação integral do débito.
        </p>

        <p class="parag">
            <b>CLÁUSULA QUARTA - DA CAUÇÃO</b><br>
            4.1. O valor da caução será aquele previsto no Quadro Resumo da Operação.<br>
            4.2. A caução possui natureza de garantia contratual.<br>
            4.3. Poderá ser utilizada para compensação de: parcelas vencidas; danos ao veículo; multas; despesas de recuperação; custos de remoção; outras obrigações inadimplidas pelo LOCATÁRIO.<br>
            4.4. Havendo utilização parcial ou integral da caução durante a vigência contratual, o LOCATÁRIO obriga-se a recompor seu valor no prazo máximo de 10 (dez) dias úteis após a notificação da LOCADORA.
        </p>

        <p class="parag">
            <b>CLÁUSULA QUINTA - DAS OBRIGAÇÕES DA LOCADORA</b><br>
            Constituem obrigações da LOCADORA:<br>
            I – entregar o veículo em perfeitas condições de funcionamento;<br>
            II – fornecer carregador compatível com o veículo;<br>
            III – disponibilizar suporte técnico durante a vigência contratual;<br>
            IV – disponibilizar o Manual Digital da motocicleta por meio eletrônico;<br>
            V – manter a documentação do veículo regularizada, salvo obrigações legais atribuídas ao LOCATÁRIO.
        </p>

        <p class="parag">
            <b>CLÁUSULA SEXTA - DAS OBRIGAÇÕES DO LOCATÁRIO</b><br>
            O LOCATÁRIO obriga-se a:<br>
            I – utilizar a motocicleta exclusivamente para fins lícitos;<br>
            II – conduzir o veículo respeitando integralmente o Código de Trânsito Brasileiro;<br>
            III – manter o veículo devidamente carregado utilizando exclusivamente carregadores homologados pela LOCADORA ou pelo fabricante;<br>
            IV – não realizar qualquer modificação elétrica, mecânica ou estrutural sem autorização expressa da LOCADORA;<br>
            V – comunicar imediatamente qualquer defeito, pane, colisão, furto, roubo ou sinistro;<br>
            VI – manter o veículo em adequado estado de conservação;<br>
            VII – não emprestar, sublocar, ceder ou transferir a posse do veículo a terceiros sem autorização expressa da LOCADORA;<br>
            VIII – responsabilizar-se pelas infrações de trânsito praticadas durante a vigência contratual;<br>
            IX – permitir inspeções e vistorias sempre que solicitado pela LOCADORA, mediante aviso prévio razoável, ressalvadas situações de urgência;<br>
            X – comunicar qualquer alteração de endereço, telefone ou e-mail no prazo máximo de 5 (cinco) dias úteis.
        </p>

        <p class="parag">
            <b>CLÁUSULA SÉTIMA - DA UTILIZAÇÃO DA MOTOCICLETA ELÉTRICA</b><br>
            7.1. O veículo deverá ser utilizado observando rigorosamente as recomendações técnicas do fabricante.<br>
            7.2. É vedado utilizar carregadores incompatíveis, adaptadores não homologados ou realizar qualquer intervenção no sistema elétrico da motocicleta.<br>
            7.3. A bateria deverá ser utilizada dentro das condições recomendadas pelo fabricante, evitando exposição prolongada a temperaturas extremas, impactos, submersão ou qualquer uso inadequado.<br>
            7.4. O descumprimento das recomendações técnicas poderá acarretar a perda da garantia contratual, sem prejuízo da responsabilidade do LOCATÁRIO pelos danos causados.
        </p>

        <p class="parag">
            <b>CLÁUSULA OITAVA - DA MANUTENÇÃO DA MOTOCICLETA</b><br>
            8.1. A LOCADORA será responsável pelas manutenções preventivas e corretivas decorrentes de defeitos de fabricação ou desgaste natural dos componentes, desde que não sejam provenientes de mau uso do veículo.<br>
            8.2. O LOCATÁRIO compromete-se a comunicar imediatamente qualquer falha mecânica, elétrica ou eletrônica observada na motocicleta.<br>
            8.3. É expressamente proibido ao LOCATÁRIO realizar qualquer reparo, substituição de peças, atualização de software, manutenção elétrica ou mecânica sem autorização prévia e expressa da LOCADORA.<br>
            8.4. Caso o LOCATÁRIO realize manutenção em oficina não autorizada, ficará responsável por todos os danos eventualmente causados ao veículo, inclusive aqueles decorrentes da perda de garantia do fabricante.<br>
            8.5. Sempre que solicitado, o LOCATÁRIO deverá apresentar a motocicleta para inspeção técnica, revisão preventiva ou atualização de componentes.<br>
            8.6. A não apresentação injustificada da motocicleta para manutenção programada poderá caracterizar descumprimento contratual.
        </p>

        <p class="parag">
            <b>CLÁUSULA NONA - DA BATERIA E DO CARREGAMENTO</b><br>
            9.1. O LOCATÁRIO declara ter recebido orientações quanto ao correto carregamento da bateria.<br>
            9.2. O carregamento deverá ocorrer exclusivamente utilizando carregadores homologados pela LOCADORA ou pelo fabricante.<br>
            9.3. É proibida qualquer adaptação elétrica.<br>
            9.4. A bateria não poderá ser aberta, desmontada, perfurada, modificada ou submetida a qualquer intervenção técnica pelo LOCATÁRIO.<br>
            9.5. Danos ocasionados por utilização inadequada serão integralmente suportados pelo LOCATÁRIO.<br>
            9.6. A autonomia do veículo poderá sofrer variações em razão de fatores climáticos, topografia, peso transportado, modo de condução e desgaste natural da bateria, não caracterizando defeito.
        </p>

        <p class="parag">
            <b>CLÁUSULA DÉCIMA - DAS INFRAÇÕES DE TRÂNSITO</b><br>
            10.1. Todas as multas ocorridas durante a posse do veículo serão integralmente de responsabilidade do LOCATÁRIO.<br>
            10.2. A LOCADORA poderá indicar o LOCATÁRIO como condutor infrator perante os órgãos competentes.<br>
            10.3. Caso haja cobrança dirigida inicialmente à LOCADORA, o LOCATÁRIO deverá efetuar o respectivo reembolso no prazo máximo de 05 (cinco) dias úteis após comunicação.<br>
            10.4. Eventuais despesas administrativas decorrentes da identificação do condutor poderão ser cobradas do LOCATÁRIO.
        </p>

        <p class="parag">
            <b>CLÁUSULA DÉCIMA PRIMEIRA - DA PROTEÇÃO MOTOMASTER</b><br>
            11.1. A contratação da Proteção MotoMaster é facultativa, devendo constar expressamente no Quadro Resumo da Operação.<br>
            11.2. A existência da proteção não afasta a responsabilidade do LOCATÁRIO pelos eventos excluídos da cobertura.<br>
            11.3. Permanecem excluídos, entre outros:<br>
            I --- condução sob efeito de álcool ou drogas;<br>
            II --- participação em competições;<br>
            III --- utilização diversa da finalidade do veículo;<br>
            IV --- atos dolosos;<br>
            V --- utilização por pessoa não autorizada.<br>
            11.4. Havendo negativa de cobertura em razão de conduta atribuída ao LOCATÁRIO, este responderá integralmente pelos prejuízos suportados pela LOCADORA.<br>
            11.5. Na ocorrência de acidente, colisão, roubo ou furto envolvendo a motocicleta objeto deste contrato, o LOCATÁRIO ficará responsável pelo pagamento à LOCADORA do valor fixo de R$ 1.000,00 (mil reais), a título de participação no evento, por ocorrência, independentemente do valor total dos danos ou prejuízos, desde que o evento esteja amparado pela Proteção MotoMaster.<br>
            11.5.1. A participação será devida para cada evento ocorrido durante a vigência do contrato e deverá ser paga pelo LOCATÁRIO no prazo máximo de 05 (cinco) dias úteis após a comunicação formal da LOCADORA.<br>
            11.5.2. O pagamento da participação de R$ 1.000,00 (mil reais) limita-se aos eventos abrangidos pela Proteção MotoMaster e não implica reconhecimento de culpa pelo LOCATÁRIO.<br>
            11.5.3. Caso o evento esteja excluído da cobertura em razão de dolo, culpa grave, condução sob efeito de álcool ou drogas, utilização por pessoa não autorizada, uso ilícito, descumprimento contratual ou qualquer outra hipótese de exclusão prevista neste instrumento, não se aplicará a limitação de R$ 1.000,00 (mil reais), podendo o LOCATÁRIO responder integralmente pelos prejuízos causados à LOCADORA, conforme as demais disposições deste contrato.
        </p>

        <p class="parag">
            <b>CLÁUSULA DÉCIMA SEGUNDA - DOS SINISTROS</b><br>
            12.1. Em caso de acidente, o LOCATÁRIO deverá comunicar imediatamente à LOCADORA.<br>
            12.2. Sempre que exigido pela legislação, deverá ser registrado Boletim de Ocorrência.<br>
            12.3. O LOCATÁRIO compromete-se a colaborar integralmente com todos os procedimentos administrativos relacionados ao sinistro.<br>
            12.4. A omissão de informações ou a prestação de informações falsas caracterizará infração contratual grave.
        </p>

        <p class="parag">
            <b>CLÁUSULA DÉCIMA TERCEIRA - DO FURTO E ROUBO</b><br>
            13.1. Ocorrendo furto ou roubo, o LOCATÁRIO deverá:<br>
            I --- comunicar imediatamente às autoridades policiais;<br>
            II --- comunicar imediatamente à LOCADORA;<br>
            III --- entregar cópia do Boletim de Ocorrência;<br>
            IV --- disponibilizar todas as informações necessárias para localização e recuperação do veículo.<br>
            13.2. Caso o evento decorra de culpa grave, dolo ou descumprimento contratual pelo LOCATÁRIO, este responderá pelos prejuízos suportados pela LOCADORA.
        </p>

        <p class="parag">
            <b>CLÁUSULA DÉCIMA QUARTA - DA VISTORIA</b><br>
            14.1. A LOCADORA poderá realizar vistorias periódicas.<br>
            14.2. O LOCATÁRIO compromete-se a apresentar a motocicleta sempre que solicitado.<br>
            14.3. A recusa injustificada poderá caracterizar descumprimento contratual.<br>
            14.4. Todas as vistorias poderão ser documentadas por fotografias, vídeos ou relatórios técnicos.
        </p>

        <p class="parag">
            <b>CLÁUSULA DÉCIMA QUINTA - DA DEVOLUÇÃO DO VEÍCULO</b><br>
            15.1. Encerrado o contrato, a motocicleta deverá ser devolvida no local indicado pela LOCADORA.<br>
            15.2. O veículo deverá ser entregue juntamente com: chave principal; chave reserva (quando houver); carregador; cabo de carregamento; demais acessórios fornecidos.<br>
            15.3. Será realizada vistoria técnica.<br>
            15.4. Danos que excedam o desgaste natural serão de responsabilidade do LOCATÁRIO.<br>
            15.5. Caso seja necessária limpeza especializada ou reparação decorrente de mau uso, a LOCADORA poderá cobrar os respectivos custos.
        </p>

        <p class="parag">
            <b>CLÁUSULA DÉCIMA SEXTA - DA OPÇÃO DE AQUISIÇÃO</b><br>
            16.1. Caso a modalidade contratada contemple opção de aquisição da motocicleta, esta somente poderá ser exercida após o cumprimento integral das condições previstas neste contrato.<br>
            16.2. A eventual transferência da propriedade dependerá de:<br>
            I --- inexistência de débitos;<br>
            II --- quitação integral das obrigações financeiras;<br>
            III --- assinatura dos documentos necessários;<br>
            IV --- pagamento das despesas legais de transferência, quando aplicáveis.<br>
            16.3. Até a efetiva transferência documental, a motocicleta permanecerá de propriedade exclusiva da LOCADORA.
        </p>

        <p class="parag">
            <b>CLÁUSULA DÉCIMA SÉTIMA - DAS PENALIDADES</b><br>
            17.1. Constituem infrações contratuais: utilização indevida da motocicleta; empréstimo não autorizado; modificações no veículo; atraso na devolução; omissão de informações; descumprimento das obrigações previstas neste contrato.<br>
            17.2. As penalidades poderão compreender, conforme a gravidade da infração:<br>
            I --- advertência;<br>
            II --- multa contratual;<br>
            III --- cobrança por perdas e danos;<br>
            IV --- rescisão contratual.<br>
            17.3. A aplicação de uma penalidade não impede a adoção das demais medidas cabíveis previstas em lei ou neste contrato.
        </p>

        <p class="parag">
            <b>CLÁUSULA DÉCIMA OITAVA - DA INADIMPLÊNCIA</b><br>
            18.1. Considera-se inadimplente o LOCATÁRIO que deixar de efetuar qualquer pagamento previsto neste contrato na data do respectivo vencimento.<br>
            18.2. A inadimplência não autoriza o LOCATÁRIO a interromper a devolução do veículo, reter bens pertencentes à LOCADORA ou suspender o cumprimento de quaisquer obrigações contratuais.<br>
            18.3. O atraso superior a <strong>15 (quinze) dias</strong>, salvo acordo formal entre as partes, poderá caracterizar infração contratual grave, facultando à LOCADORA promover a rescisão do contrato, exigir os valores vencidos e adotar as medidas cabíveis para recuperação do veículo, observada a legislação aplicável.<br>
            18.4. Permanecendo o atraso, a LOCADORA poderá encaminhar os débitos para cobrança administrativa, protesto, negativação junto aos órgãos de proteção ao crédito e cobrança judicial, conforme permitido pela legislação vigente.<br>
            18.5. Todos os custos necessários à cobrança do débito, quando legalmente cabíveis, poderão ser exigidos do LOCATÁRIO.
        </p>

        <p class="parag">
            <b>CLÁUSULA DÉCIMA NONA - DA RESCISÃO</b><br>
            19.1. O presente contrato poderá ser rescindido:<br>
            I – pelo término do prazo contratual;<br>
            II – por acordo entre as partes;<br>
            III – por descumprimento contratual;<br>
            IV – por determinação legal ou judicial.<br>
            19.2. Constituem motivos para rescisão por iniciativa da LOCADORA:<br>
            a) utilização irregular da motocicleta;<br>
            b) utilização por pessoa não autorizada;<br>
            c) adulteração das características do veículo;<br>
            d) utilização em atividades ilícitas;<br>
            e) omissão de informações relevantes;<br>
            f) inadimplência, conforme previsto neste contrato;<br>
            g) recusa injustificada em apresentar a motocicleta para vistoria.<br>
            19.3. Rescindido o contrato, o LOCATÁRIO deverá devolver imediatamente a motocicleta no local indicado pela LOCADORA.<br>
            19.4. A devolução da motocicleta não extingue eventual obrigação de pagamento de valores pendentes.
        </p>

        <p class="parag">
            <b>CLÁUSULA VIGÉSIMA - DA OPÇÃO DE RENOVAÇÃO</b><br>
            20.1. Encerrado o prazo contratual, as partes poderão celebrar novo contrato de locação.<br>
            20.2. A renovação dependerá exclusivamente da concordância da LOCADORA.<br>
            20.3. A renovação poderá ocorrer com novo veículo, novos valores e novas condições comerciais.
        </p>

        <p class="parag">
            <b>CLÁUSULA VIGÉSIMA PRIMEIRA - DO MANUAL DIGITAL</b><br>
            21.1. O LOCATÁRIO declara ciência de que todas as orientações de utilização da motocicleta serão disponibilizadas exclusivamente em formato digital.<br>
            21.2. O Manual Digital poderá ser atualizado pela LOCADORA sempre que necessário para refletir alterações técnicas, operacionais ou de segurança.<br>
            21.3. O LOCATÁRIO compromete-se a consultar periodicamente o Manual Digital disponibilizado pela LOCADORA.
        </p>

        <p class="parag">
            <b>CLÁUSULA VIGÉSIMA SEGUNDA - DA PROTEÇÃO DE DADOS (LGPD)</b><br>
            22.1. O LOCATÁRIO autoriza a coleta, tratamento e armazenamento de seus dados pessoais exclusivamente para fins relacionados à execução deste contrato.<br>
            22.2. Os dados poderão ser compartilhados com: empresas de proteção veicular; oficinas credenciadas; órgãos públicos; instituições financeiras; empresas responsáveis pela cobrança; sempre que necessário para cumprimento das obrigações contratuais ou legais.<br>
            22.3. A LOCADORA compromete-se a observar a Lei nº 13.709/2018 (Lei Geral de Proteção de Dados).
        </p>

        <p class="parag">
            <b>CLÁUSULA VIGÉSIMA TERCEIRA - DAS COMUNICAÇÕES</b><br>
            23.1. As partes reconhecem como válidas as comunicações realizadas por: WhatsApp; E-mail; SMS; Carta; Plataforma eletrônica; Assinatura eletrônica.<br>
            23.2. Considerar-se-á válida qualquer comunicação enviada aos dados constantes do Quadro Resumo da Operação, cabendo ao LOCATÁRIO informar eventual alteração.
        </p>

        <p class="parag">
            <b>CLÁUSULA VIGÉSIMA QUARTA - DA ASSINATURA ELETRÔNICA</b><br>
            24.1. As partes reconhecem como plenamente válida a assinatura eletrônica realizada por meio da plataforma <b>ZapSign</b>, ou outra plataforma equivalente que atenda aos requisitos legais.<br>
            24.2. A assinatura eletrônica produzirá os mesmos efeitos jurídicos da assinatura manuscrita.
        </p>

        <p class="parag">
            <b>CLÁUSULA VIGÉSIMA QUINTA - DAS DISPOSIÇÕES GERAIS</b><br>
            25.1. A eventual tolerância de uma das partes quanto ao descumprimento de qualquer obrigação contratual será considerada mera liberalidade, não constituindo renúncia de direitos.<br>
            25.2. A eventual nulidade de qualquer cláusula não prejudicará a validade das demais disposições do contrato.<br>
            25.3. Este contrato obriga as partes, seus herdeiros e sucessores.<br>
            25.4. O presente instrumento substitui quaisquer entendimentos anteriores relacionados ao seu objeto.
        </p>

        <p class="parag">
            <b>CLÁUSULA VIGÉSIMA SEXTA - DO FORO</b><br>
            26.1. As partes elegem o foro da Comarca da Capital do Estado do Rio de Janeiro para dirimir quaisquer controvérsias decorrentes deste contrato, renunciando a qualquer outro, por mais privilegiado que seja.
        </p>

        <p class="parag">
            <b>DECLARAÇÃO FINAL</b><br>
            O LOCATÁRIO declara: ter recebido a motocicleta em perfeitas condições de funcionamento; ter lido integralmente este contrato; compreender todas as cláusulas aqui estabelecidas; concordar livremente com todas as condições pactuadas; receber acesso ao Manual Digital da MOTOMASTER; comprometer-se a cumprir integralmente todas as obrigações assumidas.
        </p>

    </div><br><br>

    <div style="text-align: center; font-size: 12">Rio de Janeiro, {{ $dataAtual->isoFormat('DD MMMM YYYY') }}<br><br><br><br>

        ___________________________________________________________<br>
        LOCATÁRIO: {{$locacao->Cliente->nome}} <br> CPF: {{$cpfCnpj}}<br><br><br><br>

        ___________________________________________________________<br>
        LOCADOR: MOTOMASTER CAMPO GRANDE LTDA.<br><br>
        Representante: _________________________________ CPF: _______________<br><br><br><br>

        ___________________________________________________________<br>
        TESTEMUNHA 1<br><br>
        Nome: _________________________________ CPF: _______________

    </div>

</body>

</html>