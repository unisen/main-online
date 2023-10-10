<div class="sticky">
    <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
        <div class="relative">
            <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                <i></i>
            </a>
        </div>
        <!--Top Menu Start -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages-->
                <li class="dropdown custom-dropdown messages-menu">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="icon-message "></i>
                        <span class="badge badge-success badge-mini rounded-circle">4</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu pl-2 pr-2">
                                <!-- start message -->
                                <li>
                                    <a href="#">
                                        <div class="avatar float-left">
                                            <img src="../../includes/template/assets/img/dummy/u4.png" alt="">
                                            <span class="avatar-badge busy"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <!-- start message -->
                                <li>
                                    <a href="#">
                                        <div class="avatar float-left">
                                            <img src="../../includes/template/assets/img/dummy/u1.png" alt="">
                                            <span class="avatar-badge online"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <!-- start message -->
                                <li>
                                    <a href="#">
                                        <div class="avatar float-left">
                                            <img src="../../includes/template/assets/img/dummy/u2.png" alt="">
                                            <span class="avatar-badge idle"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <!-- start message -->
                                <li>
                                    <a href="#">
                                        <div class="avatar float-left">
                                            <img src="../../includes/template/assets/img/dummy/u3.png" alt="">
                                            <span class="avatar-badge busy"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                            </ul>
                        </li>
                        <li class="footer s-12 p-2 text-center"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications -->
                <li class="dropdown custom-dropdown notifications-menu">
                    <a href="#" class=" nav-link" data-toggle="dropdown" aria-expanded="false">
                        <i class="icon-notifications "></i>
                        <span class="badge badge-danger badge-mini rounded-circle">4</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="icon icon-data_usage text-success"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon icon-data_usage text-danger"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon icon-data_usage text-yellow"></i> 5 new members joined today
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer p-2 text-center"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!--
                ICONE DE PESQUISA - NAVBAR
                <li>
                    <a class="nav-link " data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class=" icon-search3 "></i>
                    </a>
                </li> -->
                <!-- Right Sidebar Toggle Button -->
                
                <!--
                ICONE DE TASKBAR    
                <li>
                    <a class="nav-link ml-2" data-toggle="control-sidebar">
                        <i class="icon-tasks "></i>
                    </a>
                </li>  -->
                <!-- User Account-->
                <li class="dropdown custom-dropdown user user-menu ">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <img src="<?php echo $_SESSION['path_userimages'] . $_SESSION['userlogin']['user_image']; ?>" class="user-image" alt="User Image">
                        <i class="icon-more_vert "></i>
                    </a>
                    <div class="dropdown-menu p-4 dropdown-menu-right">
                        <div class="row box justify-content-between my-4">
                            <div class="col">
                                <a href="#">
                                    <i class="icon-apps purple lighten-2 avatar  r-5"></i>
                                    <div class="pt-1">Apps</div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="../../view/profile/">
                                    <i class="icon-beach_access pink lighten-1 avatar  r-5"></i>
                                    <div class="pt-1">Profile</div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="#">
                                    <i class="icon-perm_data_setting indigo lighten-2 avatar  r-5"></i>
                                    <div class="pt-1">Settings</div>
                                </a>
                            </div>
                        </div>
                        <div class="row box justify-content-between my-4">
                            <div class="col">
                                <a href="#">
                                    <i class="icon-star light-green lighten-1 avatar  r-5"></i>
                                    <div class="pt-1">Favourites</div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="#">
                                    <i class="icon-save2 orange accent-1 avatar  r-5"></i>
                                    <div class="pt-1">Saved</div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="#">
                                    <i class="icon-perm_data_setting grey darken-3 avatar  r-5"></i>
                                    <div class="pt-1">Settings</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- BTN FULL SCREEN -->
                <li><a href="#" id="btnFullscreen" class="nav-link" onclick="toggleFullScreen()"><i class="icon-arrows-alt" id="fullScreenIcon"></i></a></li>

                <!-- BTN LOG OFF -->
                <li><a href="../../login/logout.php" class="nav-link"><i class="icon-power-off"></i></a></li>
            </ul>
        </div>
    </div>
</div>
</div>

<script>
    function toggleFullScreen() {

        var div = document.documentElement;

        var iconfullscreen = document.getElementById('fullScreenIcon');
        iconfullscreen.classList.remove("icon-arrows-alt");
        iconfullscreen.classList.toggle("icon-fullscreen");


        if ((document.fullScreenElement && document.fullScreenElement !== null) ||
            (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (div.requestFullScreen) {
                div.requestFullScreen();
            } else if (div.mozRequestFullScreen) {
                div.mozRequestFullScreen();
            } else if (div.webkitRequestFullScreen) {
                div.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
            iconfullscreen.classList.remove("icon-arrows-alt");
            iconfullscreen.classList.add("icon-fullscreen");
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
            iconfullscreen.classList.add("icon-arrows-alt");
            iconfullscreen.classList.remove("icon-fullscreen_exit");
        }
    }
</script>