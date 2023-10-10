<?php


$empresa_json = json_decode(file_get_contents("../../view/dados-empresa/configs-dados-empresa.json"));
$empresa_configs = $empresa_json[0];
$path_logo_img =  $unisen_url . $empresa_configs->logo_path;




function nome_curto_empresa($str)
{
    $str2 = explode(" - ", $str);
    $str = trim($str2[0]);
    return $str;
}

require_once '../../config/database/conexao.php';

//session_start();

// TOTAL DE CADASTRANTANTES EM PROCESSO DE VERIFICACAO
$sql_cadastrantes_verific = mysqli_query($con, "SELECT count(*) as cadastrantes_verific FROM tbl_cadastrantes") or print mysqli_error();
$num_cadastrantes = mysqli_fetch_assoc($sql_cadastrantes_verific);
$_SESSION['verif_cadastrantes'] = $verif_cadastrantes = $num_cadastrantes['cadastrantes_verific'];

// TOTAL DE ASSOCIADOS EFETIVADOS
$sql_socios_cadastrados = mysqli_query($con, "SELECT count(*) as socios_cadastrados FROM tbl_socios") or print mysqli_error();
$num_associados = mysqli_fetch_assoc($sql_socios_cadastrados);
$_SESSION['socios_cadastrados'] = $socios_cadastrados = $num_associados['socios_cadastrados'];

// TOTAL DE USUARIOS CADASTRADOS NO SISTEMA ADMIN
$sql_users_cadastrados = mysqli_query($con, "SELECT count(*) as usuarios_cadastrados FROM tbl_users") or print mysqli_error();
$num_usuarios = mysqli_fetch_assoc($sql_users_cadastrados);
$_SESSION['total_usuarios'] = $total_usuarios = $num_usuarios['usuarios_cadastrados'];

// TOTAL DE TOMADORES DE SERVIÇO CADASTRADOS NO SISTEMA
$sql_tomador_cadastrados = mysqli_query($con, "SELECT count(*) as tomadores_cadastrados FROM tbl_tomador") or print mysqli_error();
$num_tomadores = mysqli_fetch_assoc($sql_tomador_cadastrados);
$_SESSION['total_tomadores'] = $total_tomadores = $num_tomadores['tomadores_cadastrados'];


function nome_reduzido($nome_completo)
{
    $arrNomeCompleto = explode(" ",strtolower($nome_completo));
    
    $ultimo_nome = count($arrNomeCompleto);
    $nome_reduzido = "";
    $nome_reduzido .= ucfirst($arrNomeCompleto[0])." ";
    $nome_reduzido .= ucfirst($arrNomeCompleto[$ultimo_nome-1]);
        
    return $nome_reduzido;
}

/* 
if(mysqli_num_rows($sql)>0)
echo json_encode(array('crm' => 'erro'));
else 
echo json_encode(array('crm' => 'ok' )); 
 */
?>

<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-100px mt-3 mb-3 ml-3">
            <div class="logo-sidebar-div">
                <a href="../../view/inicio/">
                    <img src="<?php if (isset($empresa_configs->logo_path)) echo $path_logo_img; ?>" alt="" width="36" class="logo-sidebar">
                    <p class="nome-empresa-sidebar"><?php if (isset($empresa_configs->nome_empresa)) echo nome_curto_empresa($empresa_configs->nome_empresa); ?></p>
                </a>
            </div>
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false" aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                       <!--  <img class="user_avatar" src="../../includes/template/assets/img/dummy/u2.png" alt="User Image"> -->
                       
                       <img class="user_avatar" src="<?php echo $_SESSION['path_userimages'] . $_SESSION['userlogin']['user_image']; ?>" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1"><?php echo nome_reduzido($_SESSION['userlogin']['nome']); //print_r($_SESSION['userlogin']);  ?></h6>
                        <a href="#"><i class="icon-circle text-green lighten-2 blink"></i> <span class="sidebar-user-online">Online</span></a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="../../view/profile/" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-umbrella text-blue"></i>Profile
                        </a>
                        <a href="#" class="list-group-item list-group-item-action"><i class="mr-2 icon-cogs text-yellow"></i>Settings</a>
                        <a href="#" class="list-group-item list-group-item-action"><i class="mr-2 icon-security text-purple"></i>Change Password</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong>MENU PRINCIPAL</strong></li>
            <li class="treeview">
                <a href="../../view/inicio/">
                    <i class="icon icon-dashboard2 green-text s-18"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview no-b"><a href="#">
                    <i class="icon icon-package light-green-text s-18"></i>
                    <span>Inbox</span>
                    <span class="badge r-3 badge-success pull-right">20</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../../view/inbox-emails/"><i class="icon icon-circle-o"></i>Enviar Mensagem</a>
                    </li>
                    <li><a href="panel7-inbox.html"><i class="icon icon-circle-o"></i>Panel7 - Inbox</a>
                    </li>
                    <li><a href="panel8-inbox.html"><i class="icon icon-circle-o"></i>Panel8 - Inbox</a>
                    </li>
                    <li><a href="panel-page-inbox-create.html"><i class="icon icon-add"></i>Compose</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="icon icon icon-wpforms orange-text s-18"></i>
                    <span>Cadastros</span>
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../../view/painel_usuarios/"><i class="icon icon-users green-text"></i>Painel de Usuários <?php echo "<span class='pull-right total_usuarios'>$total_usuarios</span>"; ?></a>
                    </li>
                    
                    <li><a href="../../view/tomador_servico/"><i class="icon icon-hospital-o light-blue-text"></i>Tomador de Serviço <?php echo "<span class='pull-right socios_cadastrados'>$total_tomadores</span>"; ?></a>
                    </li>
                    <li><a href="../../view/unidades/"><i class="icon icon-ambulance red-text"></i>Unidades</a>
                    </li>
                    <li><a href="../../view/verificacao_cadastro/"><i class="icon icon-circle-o orange-text"></i>Cadastrantes <?php echo "<span class='pull-right verif_cadastrantes'>$verif_cadastrantes</span>"; ?></a>
                    <li><a href="../../view/socios_unisen/"><i class="icon icon-user-md light-green-text"></i>Sócios <?php echo "<span class='pull-right socios_cadastrados'>$socios_cadastrados</span>"; ?></a>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="icon icon-user-md lighten-3 green-text s-18"></i><span>Associados</span>
                    <span class="badge badge-primary pull-right badge-pill badge-cadastrantes">
                        <span class="blink"><?php echo $verif_cadastrantes; ?></span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../../view/cadastrantes/"><i class="icon icon-circle-o orange-text"></i>Em Verificação <?php echo "<span class='pull-right verif_cadastrantes'>$verif_cadastrantes</span>"; ?></a>
                    </li>
                    <li><a href="../../view/associados/"><i class="icon icon-user light-blue-text"></i>Cadastrados <?php echo "<span class='pull-right socios_cadastrados'>$socios_cadastrados</span>"; ?></a>                 
                    </li>

                    <!-- ../../view/cadastrantes/ -->
                    <li><a href="../../view/associados/?addcliente=1" data-target="#modalNovoAssociado" class="add_socio"><i class="icon icon-user-plus light-green-text"></i>Adicionar</a>
                    </li>
                   <!--  <script>
                        $(document).ready(function() {
                            $(".add_socio").click(function() {
                                $("#modalNovoAssociado").modal('show');
                            });
                        });
                    </script> -->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="icon icon-cubes light-green-text s-18"></i>
                    Escalas<i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="panel-page-inbox.html"><i class="icon icon-map-o"></i>Criação</a>
                    </li>
                    <li><a href="panel7-inbox.html"><i class="icon icon-circle-o"></i>Modelo</a>
                    </li>
                    <li><a href="panel8-inbox.html"><i class="icon icon-add"></i>Cadastramento</a>
                    </li>
                </ul>
            </li>
            <li class="header light mt-3"><strong>GESTÃO ADMINISTRATIVA</strong></li>
            <li class="treeview ">
                <a href="#">
                    <i class="icon icon-monetization_on green-text text-lime s-18"></i> <span>Financeiro</span>
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../../view/fluxo-de-caixa/"><i class="icon icon-money"></i>Fluxo de Caixa</a>
                    </li>
                    <li><a href="panel7-tasks.html"><i class="icon icon-circle-o"></i>Faturamento</a>
                    </li>
                    <li><a href="panel-page-calendar.html"><i class="icon icon-date_range"></i>Pagamentos</a>
                    </li>
                    <li><a href="panel-page-calendar2.html"><i class="icon icon-date_range"></i>Cadastros</a>
                    </li>
                    <li><a href="panel-page-contacts.html"><i class="icon icon-circle-o"></i>Relatórios</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="icon icon-goals-1 amber-text s-18"></i> <span>Empresa</span>
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="panel-element-widgets.html">
                            <i class="icon icon-widgets amber-text s-14"></i> <span>Contratos</span>
                        </a>
                    </li>
                    <li>
                        <a href="panel-element-counters.html">
                            <i class="icon icon-filter_9_plus amber-text s-14"></i> <span>Certificado Digital</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../view/central-mensagens/">
                            <i class="icon icon-filter_9_plus amber-text s-14"></i> <span>Central de Mensagens</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../view/tipos_de_documentos/">
                            <i class="icon icon-filter_9_plus amber-text s-14"></i> <span>Documentação</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="icon icon-documents3 text-blue s-18"></i> <span>Relatórios</span>
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="icon icon-documents3"></i>Blank Pages<i class="icon icon-angle-left s-18 pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="panel-page-blank.html"><i class="icon icon-document"></i>Simple Blank</a>
                            </li>
                            <li><a href="panel-page-blank-tabs.html"><i class="icon icon-document"></i>Tabs Blank <i class="icon icon-angle-left s-18 pull-right"></i></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon icon-fingerprint text-green"></i>Auth Pages<i class="icon icon-angle-left s-18 pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="login.html"><i class="icon icon-document"></i>Login Page 1</a>
                            </li>
                            <li><a href="login-2.html"><i class="icon icon-document"></i>Login Page 2</a>
                            </li>
                            <li><a href="login-3.html"><i class="icon icon-document"></i>Login Page 3</a>
                            </li>
                            <li><a href="login-4.html"><i class="icon icon-document"></i>Login Page 4</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon icon-bug text-red"></i>Error Pages<i class="icon icon-angle-left s-18 pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="panel-page-404.html"><i class="icon icon-document"></i>404 Page</a>
                            </li>
                            <li><a href="panel-page-500.html"><i class="icon icon-document"></i>500 Page<i class="icon icon-angle-left s-18 pull-right"></i></a>
                            </li>
                            <li><a href="panel-page-error.html"><i class="icon icon-document"></i>420 Page<i class="icon icon-angle-left s-18 pull-right"></i></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon icon-documents3"></i>Other Pages<i class="icon icon-angle-left s-18 pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="panel-page-invoice.html"><i class="icon icon-document"></i>Invoice Page</a>
                            </li>
                            <li><a href="panel-page-no-posts.html"><i class="icon icon-document"></i>No Post Page</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="header light mt-3"><strong>SISTEMA</strong></li>

            <li class="treeview">
                <a href="#"> <i class="icon icon-settings2 s-18"></i>
                    <span>Configurações</span>
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="../../view/minha-conta/">
                            <i class="icon icon-brightness_auto light-blue-text s-14"></i>
                            <span>Minha Conta</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../view/dados-empresa/">
                            <i class="icon icon-camera2 light-blue-text s-14"></i> <span>Dados da Empresa</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../view/config-sistema/">
                            <i class="icon icon-palette light-blue-text s-14"></i> <span>Sistema</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../view/smtp-config/">
                            <i class="icon icon-palette light-blue-text s-14"></i> <span>Email SMTP</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../view/config-importar/">
                            <i class="icon icon-palette light-blue-text s-14"></i> <span>Importar / Exportar</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../view/config-backup/">
                            <i class="icon icon-palette light-blue-text s-14"></i> <span>Backup</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"> <i class="icon icon-dialpad light-green-text s-18"></i>
                    <span>Links Rápidos</span>
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="panel-element-letters.html">
                            <i class="icon icon-brightness_auto light-blue-text s-14"></i>
                            <span>Avatar Placeholders</span>
                        </a>
                    </li>
                    <li>
                        <a href="panel-element-icons.html">
                            <i class="icon icon-camera2 light-blue-text s-14"></i> <span>Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../view/sample_page/">
                            <i class="icon icon-gradient light-blue-text s-14"></i> <span>Sample Page</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../includes/template/" target="_blank">
                            <i class="icon icon-paperclip2 black-text s-18"></i> <span>Template</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 
            <li class="treeview no-b">
                <a href="../../includes/template/">
                    <i class="icon icon-paperclip2 black-text s-18"></i>
                    <span>Template</span>
                </a>
            </li> -->
            <li class="treeview no-b">
                <a href="../../login/logout.php">
                    <i class="icon icon-sign-out red-text s-18"></i>
                    <span>Sair</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
<!--Sidebar End-->