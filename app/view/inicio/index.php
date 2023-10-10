<?php
// Initialize session
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
	header('location: ../../login.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php

/* if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../login/");
    exit;
}  */

require_once './contador/useronline.php';

if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}

/* $path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/config/functions/autenticaUsuario.php';
include_once($path); */

?>
<?php

$path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/includes/UI/header.php';
include_once($path);

?>

<link rel="stylesheet" href="css/unisen_styles.css">

<body class="light">
    <!-- Pre loader -->
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="app">

        <script>
        /*
                         *  Add sidebar classes (sidebar-mini sidebar-collapse sidebar-expanded-on-hover) in body tag
                         *  you can remove this script tag and add classes directly to body
                         *  this is only for demo
                         .fab-top {
                                top: 505px;
                            }
                            .fab-right-bottom {
                                right: 18px;
                                bottom: -16px;
                                z-index: 1;
                            }
                         */
        //document.body.className += ' sidebar-mini' + ' sidebar-collapse' + ' sidebar-expanded-on-hover' + ' sidebar-top-offset';
        </script>
        <?php
        $path =  $_SERVER['DOCUMENT_ROOT'];
        $path .= $unisen_url . 'app/includes/UI/sidebar.php';
        include_once($path);
        ?>
        <div class="has-sidebar-left">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                        <div class="search-bar">
                            <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50"
                                type="text" placeholder="start typing..." name="dash_text_search" id="dash_text_search">
                        </div>
                        <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                            aria-expanded="false" aria-label="Toggle navigation"
                            class="paper-nav-toggle paper-nav-white active "><i></i></a>
                    </div>
                </div>
            </div>
            <!-- NavBar Sticky -->
            <?php
            $path =  $_SERVER['DOCUMENT_ROOT'];
            $path .= $unisen_url . 'app/includes/UI/sidebar-left.php';
            include_once($path);
            ?>

            <!-- Main Content -->
            <div class="page has-sidebar-left height-full">
                <header class="blue accent-3 relative nav-sticky">
                    <div class="container-fluid text-white">
                        <div class="row p-t-b-10 ">
                            <div class="col">
                                <h4>
                                    <i class="icon-box"></i> Dashboard
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                                <li>
                                    <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1">
                                        <i class="icon icon-home2"></i>Atual</a>
                                </li>
                                <li>
                                    <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2"><i
                                            class="icon icon-plus-circle mb-3"></i>Cadastros</a>
                                </li>
                                <li>
                                    <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3"><i
                                            class="icon icon-calendar"></i>Pesquisar</a>
                                </li>
                            </ul>
                            <a class="btn-fab absolute fab-right-bottom btn-primary" data-toggle="control-sidebar">
                                <i class="icon icon-menu"></i>
                            </a>
                        </div>
                    </div>
                </header>
                <div class="container-fluid relative animatedParent animateOnce">
                    <div class="tab-content pb-3" id="v-pills-tabContent">
                        <!--Today Tab Start-->
                        <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">
                            <div class="row my-3">
                                <div class="col-md-3">
                                    <div class="counter-box white r-5 p-3">
                                        <div class="p-4">
                                            <div class="float-right">
                                                <a href="../associados/">
                                                    <span class="icon icon-user-md text-green s-48"></span></a>
                                            </div>
                                            <div class="counter-title">Sócios Cadastrados</div>
                                            <h5 class="sc-counter mt-3"><?php echo $_SESSION['socios_cadastrados']; ?>
                                            </h5>
                                        </div>
                                        <div class="progress progress-xs r-0">
                                            <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="counter-box white r-5 p-3">
                                        <div class="p-4">
                                            <div class="float-right">
                                                <a href="../cadastrantes/">
                                                    <span class="icon icon-group_add text-light-blue s-48"></span></a>
                                            </div>
                                            <div class="counter-title ">Cadastrantes</div>
                                            <h5 class="sc-counter mt-3"><?php echo $_SESSION['verif_cadastrantes']; ?>
                                            </h5>
                                        </div>
                                        <div class="progress progress-xs r-0">
                                            <div class="progress-bar" role="progressbar" style="width: 50%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="counter-box white r-5 p-3">
                                        <div class="p-4">
                                            <div class="float-right">
                                                <a href="../tomador_servico/">
                                                    <span class="icon icon-local_hospital text-red s-48"></span></a>
                                            </div>
                                            <div class="counter-title">Tomador de Serviço</div>
                                            <h5 class="sc-counter mt-3"><?php echo '88'; ?></h5>
                                        </div>
                                        <div class="progress progress-xs r-0">
                                            <div class="progress-bar" role="progressbar" style="width: 75%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="counter-box white r-5 p-3">
                                        <div class="p-4">
                                            <div class="float-right">
                                                <a href="../painel_usuarios/">
                                                    <span class="icon icon-user-circle-o text-yellow s-48"></span></a>
                                            </div>
                                            <div class="counter-title">Usuários Admin</div>
                                            <h5 class="sc-counter mt-3"><?php echo $_SESSION['total_usuarios']; ?></h5>
                                        </div>
                                        <div class="progress progress-xs r-0">
                                            <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white p-5 r-5">
                                        <div class="card-title"><a href="../fluxo-de-caixa/">
                                                <h5> Fluxo de Caixa</h5>
                                            </a>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-md-3">
                                                <div class="my-3 mt-4">
                                                    <h5>Sales <span class="red-text">+203.48</span></h5>
                                                    <span class="s-24">$2652.07</span>
                                                    <p>A short summary of sales report if you want to add here. This
                                                        could be useful for quick view.</p>
                                                </div>
                                                <div class="row no-gutters bg-light r-3 p-2 mt-5">
                                                    <div class="col-md-6 b-r p-3">
                                                        <h5>Neste Mês</h5>
                                                        <span>$2351.08 </span>
                                                    </div>
                                                    <div class="col-md-6 p-3">
                                                        <div class="">
                                                            <h5>Costs <span class="amber-text">+87.4</span></h5>
                                                            <span>$900.09</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-9" style="height: 350px">
                                                <canvas data-chart="line" data-dataset="[
                                                            [0, 15, 4, 30, 8, 5, 18],
                                                            [1, 7, 21, 4, 12, 5, 10],
                                                
                                                            ]" data-labels="['A', 'B', 'C', 'D', 'E', 'F']" data-dataset-options="[
                                                            {   label:'HTML',
                                                                fill: true,
                                                                backgroundColor: 'rgba(50,141,255,.2)',
                                                                borderColor: '#328dff',
                                                                pointBorderColor: '#328dff',
                                                                pointBackgroundColor: '#fff',
                                                                pointBorderWidth: 2,
                                                                borderWidth: 1,
                                                                borderJoinStyle: 'miter',
                                                                pointHoverBackgroundColor: '#328dff',
                                                                pointHoverBorderColor: '#328dff',
                                                                pointHoverBorderWidth: 1,
                                                                pointRadius: 3,
                                                                
                                                            },
                                                            {  
                                                                label:'Wordpress',
                                                                fill: false,
                                                                borderDash: [5, 5],
                                                                backgroundColor: 'rgba(87,115,238,.3)',
                                                                borderColor: '#2979ff',
                                                                pointBorderColor: '#2979ff',
                                                                pointBackgroundColor: '#2979ff',
                                                                pointBorderWidth: 2,
                                                
                                                                borderWidth: 1,
                                                                borderJoinStyle: 'miter',
                                                                pointHoverBackgroundColor: '#2979ff',
                                                                pointHoverBorderColor: '#fff',
                                                                pointHoverBorderWidth: 1,
                                                                pointRadius: 3,
                                                                
                                                            }
                                                            ]" data-options="{
                                                                    maintainAspectRatio: false,
                                                                    legend: {
                                                                        display: true
                                                                    },
                                                        
                                                                    scales: {
                                                                        xAxes: [{
                                                                            display: true,
                                                                            gridLines: {
                                                                                zeroLineColor: '#eee',
                                                                                color: '#eee',
                                                                            
                                                                                borderDash: [5, 5],
                                                                            }
                                                                        }],
                                                                        yAxes: [{
                                                                            display: true,
                                                                            gridLines: {
                                                                                zeroLineColor: '#eee',
                                                                                color: '#eee',
                                                                                borderDash: [5, 5],
                                                                            }
                                                                        }]
                                                        
                                                                    },
                                                                    elements: {
                                                                        line: {
                                                                        
                                                                            tension: 0.4,
                                                                            borderWidth: 1
                                                                        },
                                                                        point: {
                                                                            radius: 2,
                                                                            hitRadius: 10,
                                                                            hoverRadius: 6,
                                                                            borderWidth: 4
                                                                        }
                                                                    }
                                                                }">
                                                </canvas>
                                                <!-- <div style="height: 450px">
                                                    <canvas data-chart="line"
                                                        data-dataset="[[0,528,228,728,528,1628,0]]"
                                                        data-labels="['Blue','Yellow','Green','Purple','Orange','Red','Indigo']"
                                                        data-dataset-options="[{ label:'Sales', borderColor:  'rgba(255,99,132,1)', backgroundColor: 'rgba(255, 99, 132, 0.2)'}]">
                                                    </canvas>
                                                </div> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-eq-height">
                                <!-- Chat Widget Start -->

                                <div class="col-md-4">
                                    <div class="card my-3 no-b r-5">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="card no-b mb-3 bg-danger text-white">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div><i class="icon-package s-18"></i></div>
                                                            <div><span class="text-success">40+35</span></div>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="s-48 my-3 font-weight-lighter"><i
                                                                    class="icon-chrome"></i></div>
                                                            Configs
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="card no-b mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div><i class="icon-timer s-18"></i></div>
                                                            <div><span
                                                                    class="badge badge-pill badge-primary">4:30</span>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="s-48 my-3 font-weight-lighter">
                                                                <?php echo $_SESSION['show_user']; ?></div>
                                                            Usuários Online
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="card no-b mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div><i class="icon-user-circle-o s-18"></i></div>
                                                            <div><span class="badge badge-pill badge-danger">4:30</span>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="s-48 my-3 font-weight-lighter">170</div>
                                                            Novos Contratos
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="card no-b mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div><i class="icon-user-times s-18"></i></div>
                                                            <div><span class="text-danger">50</span></div>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="s-48 my-3 font-weight-lighter">95</div>
                                                            Pendentes
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Followers -->
                                <div class="col-md-3">
                                    <div class="card no-b r-5 my-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Novos Associados <span
                                                    class="badge badge-success r-3">30+</span>
                                            </h5>
                                            <p>Recentemente foram adicionados 30 novos sócios</p>
                                            <div class="avatar-group">
                                                <figure class="avatar">
                                                    <img src="../../includes/template/assets/img/dummy/u4.png" alt="">
                                                </figure>
                                                <figure class="avatar">
                                                    <span class="avatar-letter avatar-letter-l circle"></span>
                                                </figure>
                                                <figure class="avatar">
                                                    <img src="../../includes/template/assets/img/dummy/u5.png" alt="">
                                                </figure>
                                                <figure class="avatar">
                                                    <img src="../../includes/template/assets/img/dummy/u6.png" alt="">
                                                </figure>
                                                <figure class="avatar">
                                                    <img src="../../includes/template/assets/img/dummy/u7.png" alt="">
                                                </figure>
                                                <figure class="avatar">
                                                    <span class="avatar-letter avatar-letter-a circle"></span>
                                                </figure>
                                                <figure class="avatar">
                                                    <span class="avatar-letter avatar-letter-b circle"></span>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card no-b r-5 my-3">
                                        <div class="bg-primary text-white lighten-2 r-5">
                                            <div class="pt-5 pb-0 pl-4 pr-4">
                                                <div class="lightSlider masonry-container" data-item="1"
                                                    data-item-md="1" data-item-sm="1" data-auto="true" data-pause="6000"
                                                    data-pager="false" data-controls="false" data-loop="true">
                                                    <div>
                                                        <h5 class="font-weight-normal s-14">Escalas Trocadas</h5>
                                                        <div class="my-5">
                                                            <span>
                                                                Essa Semana 30%</span>
                                                            <div class="progress" style="height: 3px;">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: 25%;" aria-valuenow="25"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="my-5">
                                                            <span>
                                                                Semana Passada 10%</span>
                                                            <div class="progress" style="height: 3px;">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: 25%;" aria-valuenow="25"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <canvas width="378" height="140" data-chart="spark"
                                                            data-chart-type="bar"
                                                            data-dataset="[[28,530,200,430,28,530,200,430,28,530,200,430,28,530,200,430,28,530,200,430]]"
                                                            data-labels="['a','b','c','d','a','b','c','d','a','b','c','d','a','b','c','d','a','b','c','d']"
                                                            data-dataset-options="[
                                                        { borderColor:  'rgba(54, 162, 235, 1)', backgroundColor: 'rgba(54, 162, 235,1)'},
                                                        ]">
                                                        </canvas>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-weight-normal s-14">Pontos Confirmados</h5>
                                                        <div class="my-5">
                                                            <span>
                                                                Hoje 70% (atualmente)</span>
                                                            <div class="progress" style="height: 3px;">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: 25%;" aria-valuenow="25"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="my-5">
                                                            <span>
                                                                Ontem 90%</span>
                                                            <div class="progress" style="height: 3px;">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: 25%;" aria-valuenow="25"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <canvas width="378" height="140" data-chart="spark"
                                                            data-chart-type="line"
                                                            data-dataset="[[28,530,200,430,28,530,200,430,28,530,200,430,28,530,200,430,28,530,200,430]]"
                                                            data-labels="['a','b','c','d','a','b','c','d','a','b','c','d','a','b','c','d','a','b','c','d']"
                                                            data-dataset-options="[
                                                        { borderColor:  'rgba(54, 162, 235, 1)', backgroundColor: 'rgba(54, 162, 235,1)'},
                                                        ]">
                                                        </canvas>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Daily Sale Report-->
                                <div class="col-md-5">
                                    <div class="card my-3 no-b ">
                                        <div class="card-header white b-0 p-3">
                                            <div class="card-handle">
                                                <a data-toggle="collapse" href="#salesCard" aria-expanded="false"
                                                    aria-controls="salesCard">
                                                    <i class="icon-menu"></i>
                                                </a>
                                            </div>
                                            <h4 class="card-title">Pagamentos de Associado</h4>
                                            <small class="card-subtitle mb-2 text-muted">Pagamentos requeridos por
                                                sócios.</small>
                                        </div>
                                        <div class="collapse show" id="salesCard">
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-hover earning-box">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th colspan="2">Nome</th>
                                                                <th>Tipo da Transação</th>
                                                                <th>Valor</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-10">
                                                                    <a href="panel-page-profile.html"
                                                                        class="avatar avatar-lg">
                                                                        <img src="../../includes/template/assets/img/dummy/u6.png"
                                                                            alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <h6>Sara Kamzoon</h6>
                                                                    <small class="text-muted">Marketing Manager</small>
                                                                </td>
                                                                <td>25</td>
                                                                <td>$250</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-10">
                                                                    <a href="panel-page-profile.html"
                                                                        class="avatar avatar-lg">
                                                                        <img src="../../includes/template/assets/img/dummy/u7.png"
                                                                            alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <h6>Sara Kamzoon</h6>
                                                                    <small class="text-muted">Marketing Manager</small>
                                                                </td>
                                                                <td>25</td>
                                                                <td>$250</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-10">
                                                                    <a href="panel-page-profile.html"
                                                                        class="avatar avatar-lg">
                                                                        <img src="../../includes/template/assets/img/dummy/u9.png"
                                                                            alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <h6>Sara Kamzoon</h6>
                                                                    <small class="text-muted">Marketing Manager</small>
                                                                </td>
                                                                <td>25</td>
                                                                <td>$250</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-10">
                                                                    <a href="panel-page-profile.html"
                                                                        class="avatar avatar-lg">
                                                                        <img src="../../includes/template/assets/img/dummy/u11.png"
                                                                            alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <h6>Sara Kamzoon</h6>
                                                                    <small class="text-muted">Marketing Manager</small>
                                                                </td>
                                                                <td>25</td>
                                                                <td>$250</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-10">
                                                                    <a href="panel-page-profile.html"
                                                                        class="avatar avatar-lg">
                                                                        <img src="../../includes/template/assets/img/dummy/u12.png"
                                                                            alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <h6>Sara Kamzoon</h6>
                                                                    <small class="text-muted">Marketing Manager</small>
                                                                </td>
                                                                <td>25</td>
                                                                <td>$250</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Today Tab End-->
                        <!--Yesterday Tab Start-->
                        <div class="tab-pane animated fadeInUpShort" id="v-pills-2">
                            <div class="row my-3">
                                <div class="col-md-3">
                                    <div class="counter-box white r-5 p-3">
                                        <div class="p-4">
                                            <div class="float-right">
                                                <a href="../painel_usuarios/">
                                                    <span class="icon icon-user-circle-o text-yellow s-48"></span>
                                                </a>
                                            </div>
                                            <div class="counter-title">Usuários Admin</div>
                                            <h5 class="sc-counter mt-3"><?php echo $_SESSION['total_usuarios']; ?></h5>
                                        </div>
                                        <div class="progress progress-xs r-0">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="counter-box white r-5 p-3">
                                        <div class="p-4">
                                            <div class="float-right">
                                                <a href="../tomador_servico/">
                                                    <span class="icon icon-local_hospital text-red s-48"></span>
                                                </a>
                                            </div>
                                            <div class="counter-title ">Tomador de Serviço</div>
                                            <h5 class="sc-counter mt-3"><?php echo $_SESSION['total_tomadores']; ?></h5>
                                        </div>
                                        <div class="progress progress-xs r-0">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="counter-box white r-5 p-3">
                                        <div class="p-4">
                                            <div class="float-right">
                                                <a href="../verificacao_cadastro/">
                                                    <span class="icon icon-group_add text-light-blue s-48"></span>
                                                </a>
                                            </div>
                                            <div class="counter-title">Cadastrantes</div>
                                            <h5 class="sc-counter mt-3"><?php echo $_SESSION['verif_cadastrantes']; ?>
                                            </h5>
                                        </div>
                                        <div class="progress progress-xs r-0">
                                            <div class="progress-bar" role="progressbar" style="width: 75%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="counter-box white r-5 p-3">
                                        <div class="p-4">
                                            <div class="float-right">
                                                <a href="../socios_unisen/">
                                                    <span class="icon icon-user-md text-green s-48"></span>
                                                </a>
                                            </div>
                                            <div class="counter-title">Sócios</div>
                                            <h5 class="sc-counter mt-3"><?php echo $socios_cadastrados; ?></h5>
                                        </div>
                                        <div class="progress progress-xs r-0">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="128"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="white p-5 r-5">
                                        <div style="height: 528px">
                                            <canvas data-chart="line" data-dataset="[
                                                [0,528,228,728,528,1628,0],
                                                [0,628,228,1228,428,1828,0],
                                                ]"
                                                data-labels="['Blue','Yellow','Green','Purple','Orange','Red','Indigo']"
                                                data-dataset-options="[
                                            { label:'Sales', borderColor:  'rgba(54, 162, 235, 1)', backgroundColor: 'rgba(54, 162, 235,1)'},
                                            { label:'Orders', borderColor:  'rgba(255,99,132,1)', backgroundColor: 'rgba(255, 99, 132, 1)' }]"
                                                data-options="{
                                                maintainAspectRatio: false,
                                                legend: {
                                                    display: true
                                                },
                                    
                                                scales: {
                                                    xAxes: [{
                                                        display: true,
                                                        gridLines: {
                                                            zeroLineColor: '#eee',
                                                            color: '#eee',
                                                      
                                                            borderDash: [5, 5],
                                                        }
                                                    }],
                                                    yAxes: [{
                                                        display: true,
                                                        gridLines: {
                                                            zeroLineColor: '#eee',
                                                            color: '#eee',
                                                            borderDash: [5, 5],
                                                        }
                                                    }]
                                    
                                                },
                                                elements: {
                                                    line: {
                                                    
                                                        tension: 0.4,
                                                        borderWidth: 1
                                                    },
                                                    point: {
                                                        radius: 2,
                                                        hitRadius: 10,
                                                        hoverRadius: 6,
                                                        borderWidth: 4
                                                    }
                                                }
                                            }">
                                            </canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Yesterday Tab Start-->
                        <!--Yesterday Tab Start-->
                        <div class="tab-pane animated fadeInUpShort" id="v-pills-3">
                            <div class="row">
                                <div class="col-md-4 mx-md-auto m-5">
                                    <div class="card no-b shadow">
                                        <div class="card-body p-4">
                                            <div>
                                                <i class="icon-calendar-check-o s-48 text-primary"></i>
                                                <p class="p-t-b-20">Hey Soldier welcome back signin now there is lot of
                                                    new stuff waiting for you</p>
                                            </div>
                                            <form action="dashboard2.html">
                                                <div class="form-group has-icon"><i class="icon-calendar"></i>
                                                    <input class="form-control form-control-lg datePicker"
                                                        placeholder="Date From" type="text" name="dash_date_from"
                                                        id="dash_date_from">
                                                </div>
                                                <div class="form-group has-icon"><i class="icon-calendar"></i>
                                                    <input class="form-control form-control-lg datePicker"
                                                        placeholder="Date TO" type="text" name="dash_date_to"
                                                        id="dash_date_to">
                                                </div>
                                                <input class="btn btn-success btn-lg btn-block" value="Get Data"
                                                    type="submit">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Yesterday Tab Start-->
                    </div>
                </div>
            </div>
            <!-- Right Sidebar -->

            <?php
            $path =  $_SERVER['DOCUMENT_ROOT'];
            $path .= $unisen_url . 'app/includes/UI/sidebar-right.php';
            include_once($path);
            ?>
            <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
            <div class="control-sidebar-bg shadow white fixed"></div>
        </div>
        <!--/#app -->
        <script src="../../includes/template/assets/js/app.js"></script>




        <!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
        <script>
        (function($, d) {
            $.each(readyQ, function(i, f) {
                $(f)
            });
            $.each(bindReadyQ, function(i, f) {
                $(d).bind("ready", f)
            })
        })(jQuery, document)
        </script>
</body>

</html>