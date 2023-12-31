<?php session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: ../../login.php');
    exit;
}

ini_set('output_buffering', true); // no limit
ini_set('output_buffering', 24488); // 12KB limit
//header("Content-type:application/pdf");

if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
} else {
    $unisen_url = "/unisen-main/";
}


//PDF DO PEDIDO
require_once './dompdf/autoload.inc.php';
//include "../../../../../wp-load.php";


use Dompdf\Dompdf;
use Dompdf\Options;
//if posted data is not empty
$options = new Options();
$options->set('defaultFont', 'Courier');
$options->set('isRemoteEnabled', TRUE);
$options->set('debugKeepTemp', TRUE);
$options->set('isHtml5ParserEnabled', TRUE);
$options->set('isPhpEnabled', TRUE);
$options->set('chroot', '/');
$options->setIsRemoteEnabled(true);
ob_start();


/* 	$db = new DBController();
	$conn = $db->connect();
    require_once './controller/itens-controller.php';
    $num_pedido = $_GET['n'];

	$dCtrl  = new ItensController($conn, $num_pedido);
	$itens = $dCtrl->index(); */
?>
<?php
//include "config.php";
//CLASSE CLIENTE - PDO CRUD MYSQL
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/CadastranteDAO.php';

/**
 * @param array|object $data
 * @return array
 */
function object_to_array($data)
{
    $result = [];
    foreach ($data as $key => $value) {
        $result[$key] = (is_array($value) || is_object($value)) ? object_to_array($value) : $value;
    }
    return $result;
}



$userid = 0;
if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $params = "WHERE id = $userid"; // . $id_usuario;
    $CadastranteDAO = new CadastranteDAO();
    $Cadastrante = $CadastranteDAO->selectNewCadastrante($params);
    $dados = json_encode($Cadastrante);
    $perfil = $Cadastrante[0];   
}

?>
<?php

include_once "./scripts/funcoes_pedido.php"; //funcoes extras DADOS DA FATURA / PEDIDO

$json_empresa = "../../view/dados-empresa/configs-dados-empresa.json";
$empresa = dados_da_empresa($json_empresa);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contrato - <?php echo $perfil->nome_completo; ?></title>
    <!-- Bootstrap 4 CSS  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles-fatura.css">
</head>

<body>

    <div class="corpo-pedido">
        <div class="row">
            <table>
                <tr>
                    <th class="titulo-fatura"><span class="logo-fatura"><img src="./images/logo-contrato-trans.png"></span>
                    </th>
                    <th class="empresa-fatura">
                        <?php

                        echo '<span class="nome-empresa-sistema">' . $empresa->nome_empresa . '</span><br />';
                        echo '<span class="dados-empresa">';
                        echo nl2br($empresa->endereco) . '<br />';
                        echo nl2br($empresa->cidade) . "-" . $empresa->estado . " CEP: " . $empresa->cep;
                        echo '<br />CNPJ: ' . $empresa->cnpj . '</span>';
                        ?>

                    </th>
                </tr>
            </table>

        </div>
        <hr>

        <div>
            <h5>CONTRATO DE SOCIEDADE EM CONTA DE PARTICIPAÇÃO</h5>

            <table>
                <tr>
                    <th class="titulo-celula">Contrato <?php if ($perfil->contrato != '') {
                                                            $arrContrato = explode("_", $perfil->contrato);
                                                            echo "nº $arrContrato[0] / $arrContrato[1]";
                                                        } ?></th>
                </tr>
            </table>

        </div>
        <br />
        <div>
            <b>RPC E ASSOCIADOS S/S LTDA</b>, estabelecida na Rua 16 de Julho, nº 690, Quadra 08, Lote 19, Bairro
            Centro, CEP: 75.388-658, Trindade-GO, inscrita no CNPJ 20.755.503/0001-84, com contrato social devidamente
            registrado e arquivado no Cartório do 2º Ofício de Trindade, Goiás em 23/07/2014, sob o Registro nº 527,
            doravante denominada <b>SÓCIO OSTENSIVO</b>, e
        </div>
        <br />
        <div><?php echo corpo_do_contrato($perfil); ?>
        </div>
        <br />
        <div>
            Resolvem constituir uma <b>SOCIEDADE EM CONTA DE PARTICIPAÇÃO - SCP</b>, regida pelas cláusulas seguintes:
        </div>
        <div>
            <br />
            <p><span class="titulo-clausula">CLÁUSULA PRIMEIRA - Da SCP</span><br />
                A SCP será uma sociedade não personificada que se regerá pelos artigos 991 a 996 da Lei nº 10.406, de 10
                de janeiro 2002, que instituiu o Novo Código Civil Brasileiro.</p>
        </div>
        <div>
            <p><span class="titulo-clausula">CLÁUSULA SEGUNDA - DO PRAZO</span><br />
                A SCP iniciará as suas atividades a partir de 01/01/2023 e encerrará as mesmas na data de
                31/12/2023.<br />
                <b><u>Parágrafo único</u></b> - A renovação do presente contrato será automática ou previamente
                estabelecida entre as partes, observando o mesmo prazo deste.
                <br />
            <p><span class="titulo-clausula">CLÁUSULA TERCEIRA - DENOMINAÇÃO SOCIAL</span><br />
                A SCP girará sob a denominação social <b><u>RPC E ASSOCIADOS S/S - SCP</u></b>.
                <br />
            <p><span class="titulo-clausula">CLÁUSULA QUARTA - Da SCP</span><br />
                A sede da sociedade será na Rua Felicidade, nº 2174, Quadra 04, Lote 44, Piso 02, Vila Santa Rita -
                Goiânia - GO - CEP: 74420-035.<br />
            <p><span class="titulo-clausula">CLÁUSULA QUINTA - DO OBJETO</span><br />
                A SCP tem por objeto o ATENDIMENTO MÉDICO EM CARÁTER DE URGÊNCIA E EMERGÊNCIA EM PRONTO SOCORRO, PRONTO
                ATENDIMENTO, UNIDADE DE TERAPIA INTENSIVA; SUPERVISÃO E ATENDIMENTO DE INTERCORRÊNCIAS DE PACIENTES
                HOSPITALARES; PRESCRIÇÃO E EVOLUÇÃO DE PACIENTES INTERNADOS, TRANSPORTE INTRA-HOSPITALAR DE PACIENTES
                GRAVES; ATENDIMENTO MÉDICO EM CARÁTER AMBULATORIAL (NA UNIDADE OU EM DOMICÍLIO) VOLTADO A ASSISTÊNCIA
                INTEGRAL (PROMOÇÃO E PROTEÇÃO DA SAÚDE, PREVENÇÃO DE AGRAVOS,DIAGNÓSTICO, TRATAMENTO, REABILITAÇÃO E
                MANUTENÇÃO DA SAÚDE) AOS INDIVÍDUOS E FAMÍLIAS EM TODAS AS FASES DO DESENVOLVIMENTO HUMANO: INFÂNCIA,
                ADOLESCÊNCIA, IDADE ADULTA E TERCEIRA IDADE; ATENDIMENTO MÉDICO EM CONSULTAS ELETIVAS EM TODAS
                ESPECIALIDADES MÉDICAS REGISTRADAS NO CONSELHO FEDERAL DE MEDICINA; seguindo escala prévia, por parte
                dos SÓCIOS PARTICIPANTES, nas dependências físicas e áreas de abrangência funcional indicadas pelo SÓCIO
                OSTENSIVO.
                <br />
            <p><span class="titulo-clausula">CLÁUSULA SEXTA - DO CAPITAL</span><br />
                O capital social da SCP no ato da assinatura deste instrumento, subscrito e integralizado em favor do
                SÓCIO OSTENSIVO, é da ordem de R$ 10.000,00 (Dez mil reais), assim distribuído entre os sócios:

                a) SÓCIO OSTENSIVO - Subscrevem e integralizam 99,99%, do capital social da SCP no valor de R$ 9.999,00
                (Nove mil novecentos e noventa e nove reais) em moeda corrente do País;
                b) SÓCIO PARTICIPANTE - Subscrevem e integralizam 0,01%, do capital social da SCP no valor de R$ 1,00
                (hum real) em moeda corrente do País;
                <br />

            <p><span class="titulo-clausula">CLÁUSULA SÉTIMA - DO INTUITO PERSONAE</span><br />
                As quotas referentes ao percentual correspondente a cada sócio na participação do capital social da SCP
                são individuais e pessoais, não podendo ser transferidas ou alienadas a qualquer título a terceiros sem
                o consentimento do sócio remanescente, ao qual fica assegurado o direito de preferência em igualdade de
                condições.

                Parágrafo Primeiro - O sócio que desejar transferir suas quotas deverá notificar o sócio remanescente,
                discriminando o preço, forma e prazo de pagamento para que este exerça ou renuncie ao direito de
                preferência o qual deverá fazê-lo dentro de 60 (sessenta) dias contados da data do recebimento da
                notificação. Findo o prazo, e caso não haja interesse do sócio remanescente ou o mesmo não exerça o
                pagamento, o sócio interessado em transferir suas cotas ficará livre para transferi-las a terceiro(s).

                Parágrafo Segundo - Igualmente, a alteração do quadro societário e a transferência de quotas que
                integralizam as sociedades empresariais de ambos os SÓCIOS deverão ser submetidas à preferência de um ao
                outro, após a preferência legal dos próprios sócios que as constituem, ficando livre a transferência a
                terceiros, alheios aos SÓCIOS e à própria SCP, somente após a ciência e desistência de aquisição seja do
                SÓCIO OSTENSIVO, seja dos SÓCIOS PARTICIPANTES.
                <br />

            <p><span class="titulo-clausula">CLÁUSULA OITAVA - DA ADMINISTRAÇÃO E FUNCIONAMENTO</span><br />
                A SCP será administrada pelo SÓCIO OSTENSIVO, ao qual compete privativa e individualmente o uso da firma
                e a representação ativa, passiva, judicial e extra-judicial da sociedade, além da responsabilidade pelos
                registros contábeis da mesma, sendo-lhe vedado o seu uso sob qualquer pretexto ou modalidade em
                operações de compras, vendas, endossos, fianças, avais, cauções de favor ou qualquer outra que possa
                interferir no capital da SCP, sem prévia autorização dos SÓCIOS PARTICIPANTES.
                <br />

            <p><span class="titulo-clausula">CLÁUSULA NONA - DAS OBRIGAÇÕES DOS SÓCIOS PARTICIPANTES</span><br />
                Constituem encargos específicos dos SÓCIOS PARTICIPANTES, além dos implícitos ou explicitamente contidos
                nas demais cláusulas e condições do presente contrato:

                1 - Responsabilizar-se por qualquer dano, seja ele cível, criminal ou trabalhista, o que engloba toda a
                responsabilidade técnica e ética, dentre outras, ocasionado pelo desenvolvimento de suas atividades,
                objeto deste contrato, bem como os riscos dela inerentes.

                2 - ATENDIMENTO MÉDICO EM CARÁTER DE URGÊNCIA E EMERGÊNCIA EM PRONTO SOCORRO, PRONTO ATENDIMENTO,
                UNIDADE DE TERAPIA INTENSIVA; SUPERVISÃO E ATENDIMENTO DE INTERCORRÊNCIAS DE PACIENTES HOSPITALARES;
                PRESCRIÇÃO E EVOLUÇÃO DE PACIENTES INTERNADOS, TRANSPORTE INTRA-HOSPITALAR DE PACIENTES GRAVES;
                ATENDIMENTO MÉDICO EM CARÁTER AMBULATORIAL (NA UNIDADE OU EM DOMICÍLIO) VOLTADO A ASSISTÊNCIA INTEGRAL
                (PROMOÇÃO E PROTEÇÃO DA SAÚDE, PREVENÇÃO DE AGRAVOS,DIAGNÓSTICO, TRATAMENTO, REABILITAÇÃO E MANUTENÇÃO
                DA SAÚDE) AOS INDIVÍDUOS E FAMÍLIAS EM TODAS AS FASES DO DESENVOLVIMENTO HUMANO: INFÂNCIA, ADOLESCÊNCIA,
                IDADE ADULTA E TERCEIRA IDADE; ATENDIMENTO MÉDICO EM CONSULTAS ELETIVAS EM TODAS ESPECIALIDADES MÉDICAS
                REGISTRADAS NO CONSELHO FEDERAL DE MEDICINA.

                Parágrafo único - O local, carga horária e a forma da prestação do serviço médico prestado pelo SÓCIO
                PARTICIPANTE, descrito no item “2” deste parágrafo serão definidos por escala de plantão médico
                previamente acordado entre o SÓCIO OSTENSIVO E SÓCIO PARTICIPANTE.
                <br />

            <p><span class="titulo-clausula">CLÁUSULA DÉCIMA - DAS OBRIGAÇÕES DOS SÓCIO OSTENSIVO</span><br />
                Constituem encargos específicos do SÓCIO OSTENSIVO, além dos implícitos ou explicitamente contidos nas
                demais cláusulas e condições do presente contrato:

                1 - Elaborar e coordenar as escalas de plantão médico;
                2 - Definir o rateio mensal entre os SÓCIOS PARTICIPANTES de acordo com o cumprimento da escala de
                plantão mensal;
                3 - Disponibilizar o informe de rendimento anual para os SÓCIOS PARTICIPANTES.
                <br />

            <p><span class="titulo-clausula">CLÁUSULA DÉCIMA PRIMEIRA - DA REMUNERAÇÃO</span><br />
                A partir do lucro original dos serviços prestados o SÓCIO OSTENSIVO pagará aos SÓCIOS PARTICIPANTES a
                sua participação nos lucros líquidos. Entende-se por lucro líquido o total decorrente da apuração, após
                os efetivos recebimentos, deste subtraindo-se as despesas operacionais, administrativas e tributárias.
                <br />

            <p><span class="titulo-clausula">CLÁUSULA DÉCIMA SEGUNDA - DA RESCISÃO</span><br />
                O presente contrato só poderá ser rescindido nas seguintes hipóteses:
                1 - Por mútuo acordo;
                2 - Ao final do prazo de vigência ora estipulado;
                3 - Em decorrência da prática de infração legal ou contratual;
                4 - Em decorrência da falta de repasse dos lucros e demais encargos.

                Parágrafo Único - Para efeitos de rescisão contratual, o presente contrato sempre será interpretado,
                respeitando-se os princípios da proporcionalidade e razoabilidade, haja vista que a intenção manifesta
                das partes é a continuidade e a boa convivência na relação societária.
                <br />

            <p><span class="titulo-clausula">CLÁUSULA DÉCIMA TERCEIRA - DA CLÁUSULA PENAL</span><br />
                O presente contrato é celebrado em caráter irrevogável e irretratável, devendo ser cumprido na íntegra
                pelas partes. Entretanto, caso alguma das partes queira rescindir esta Avença unilateralmente, sem que
                haja motivação para tanto, ou, em caso de falta de fiel cumprimento das obrigações ora assumidas, nos
                termos das cláusulas Nona e Décima, obriga a parte que der causa a rescisão ao pagamento da pena
                pecuniária convencionada, em duas vezes o valor investido pelo SÓCIO PARTICIPANTE, corrigido até a data
                da rescisão pelo IGPM.
                Parágrafo Primeiro - Tal penalidade poderá ser dispensada, se rescindido o contrato por mútuo
                consentimento das partes.
                <br />

            <p><span class="titulo-clausula">CLÁUSULA DÉCIMA QUINTA - DAS DISPOSIÇÕES GERAIS</span><br />
                Parágrafo Primeiro - o ano social coincidirá com o ano civil, devendo ao dia 31 de dezembro de cada ano,
                ser feito o levantamento contábil geral da SCP para apuração dos lucros ou prejuízos acumulados no
                período. Os resultados deverão ser divididos ou suportados pelos sócios na proporção equivalente aos
                termos da Cláusula Décima Primeira podendo ainda os Lucros a critério dos sócios ficarem como reserva de
                capital da sociedade ou serem reinvestidos na mesma, total ou parcialmente, descontados os lucros ou
                prejuízos distribuídos ou suportados mensalmente.
                Parágrafo Segundo - O falecimento ou incapacidade de qualquer um dos sócios não dissolverá a sociedade,
                ficando os herdeiros e sucessores sub-rogados nos direitos e obrigações do “de cujus”, podendo nela
                fazerem se representar enquanto indiviso o quinhão respectivo, por um dentre eles devidamente
                credenciados pelos demais.
                Parágrafo Terceiro - os casos omissos no presente contrato serão regulados pela Lei das Sociedades
                Anônimas, ou outra que lhe seja mais pertinente.

                As partes elegem o foro da cidade de Trindade-GO, para dirimirem qualquer dúvida do presente contrato.
                E, por assim se acharem justas e contratadas, as partes assinam o presente instrumento em 02 (duas) vias
                de igual teor e forma, para que produzam seus jurídicos e legais efeitos o que fazem na presença de duas
                testemunhas, abaixo identificadas e assinadas, a que tudo assistiram, e que atestam a livre vontade das
                partes, as quais se obrigam por si, seus herdeiros e sucessores a cumpri-lo em todos os seus termos.
                <br />
        </div>
    </div>

    <hr>
    <table class="rodape-fatura">
        <tr>
            <td>
                <?php
                echo '<span class="nome-empresa-sistema">' . $empresa->nome_empresa . '</span><br />';
                //$dadosRodape = rodape_da_fatura($conexao);
                echo $empresa->email_empresa . '<br />';
                echo 'Tel: ' . $empresa->telefone_empresa . ' | ' . $empresa->celular_empresa . '<br />';
                echo $empresa->website_empresa . '<br />';

                ?>
            </td>
        </tr>
    </table>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>

    <script>
    /* $(document).ready(function() {
        $('#productTable').DataTable();
    }); */
    </script>

</body>

</html>
<?php
$html = ob_get_contents();
ob_end_flush();
$dompdf = new DOMPDF($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'Portrait');
$dompdf->render();
ob_end_clean();
$namefile = "$userid-$perfil->nome_completo.pdf";

$pdf = $dompdf->output();
$pdf_name = $namefile;

//LOCAL ONDE E FEITO O DOWNLOAD DO PDF
$file_location = $_SERVER['DOCUMENT_ROOT'] . "/unisen-main/app/libs/pdf_contratos/reports/" . $pdf_name;
//echo $file_location;

if(file_put_contents($file_location, $pdf) != false) echo " Contrato Criado ";
$dompdf->stream($namefile, array("Attachment" => false));

exit();
?>