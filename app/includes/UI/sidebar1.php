<nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src="../../includes/dist/images/face.jpg" alt="">
            <p class="name"><?php echo $_SESSION['name']; ?></p>
            <p class="designation"><?php echo $_SESSION['tipopessoa_login']; ?></p>
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item active">
              <a class="nav-link" href="../inicio/">
                <img src="../../includes/dist/images/icons/1.png" alt="">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../calendario/">
                <img src="../../includes/dist/images/icons/005-calendar.png" alt="">
                <span class="menu-title">Calendário</span>
              </a>
            </li>

            <!-- MENU CADASTROS -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#cadastros" aria-expanded="false" aria-controls="cadastros">
                <img src="../../includes/dist/images/icons/005-forms.png" alt="">
                <span class="menu-title">Cadastros<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="cadastros">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../painel_usuarios/">
                      Painel de Usuários
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/login.html">
                      Entidades
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/register.html">
                      Unidades
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/404.html">
                      Associados
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/500.html">
                      Tomador de Serviço
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- MENU ESCALAS -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#escalas" aria-expanded="false" aria-controls="escalas">
                <img src="../../includes/dist/images/icons/5.png" alt="">
                <span class="menu-title">Escalas<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="escalas">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/blank_page.html">
                      Criação
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/login.html">
                      Modelos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/register.html">
                      Cadastramento
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/404.html">
                      404
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/500.html">
                      500
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- MENU ASSOCIADOS -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#associados" aria-expanded="false" aria-controls="associados">
                <img src="../../includes/dist/images/icons/4.png" alt="">
                <span class="menu-title">Associados<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="associados">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/blank_page.html">
                      Painel
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/login.html">
                      Cadastros
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/register.html">
                      Pagamentos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/404.html">
                      404
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/500.html">
                      500
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- MENU FINANCEIRO -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#financeiro" aria-expanded="false" aria-controls="financeiro">
                <img src="../../includes/dist/images/icons/money-green.png" alt="">
                <span class="menu-title">Financeiro<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="financeiro">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/blank_page.html">
                      Dashboard
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/login.html">
                      Balanços
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/register.html">
                      Pagamentos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/404.html">
                      Relatórios
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/500.html">
                      500
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- MENU RELATORIOS -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#relatorios" aria-expanded="false" aria-controls="relatorios">
                <img src="../../includes/dist/images/icons/006-form.png" alt="">
                <span class="menu-title">Relatorios<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="relatorios">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/blank_page.html">
                      Blank Page
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/login.html">
                      Login
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/register.html">
                      Register
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/404.html">
                      404
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/500.html">
                      500
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- MENU LINKS RAPIDOS -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#links-rapidos" aria-expanded="false" aria-controls="links-rapidos">
                <img src="../../includes/dist/images/icons/016-diamond-1.png" alt="">
                <span class="menu-title">Links Rápidos<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="links-rapidos">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                   
                   <a class="nav-link" href="https://web.whatsapp.com/" target="_blank">
                    <button>
                      <i class="fa fa-whatsapp"></i> Whatapp
                    </button>                  
                   </a>
                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="https://outlook.live.com/mail/0/" target="_blank">
                      Email Cadastro
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="https://mail.google.com/mail/u/0/#inbox" target="_blank">
                      Email Notas Fiscais 
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="https://www.gov.br/pt-br/servicos/verificador-de-conformidade-de-assinaturas-digitais-icp-brasil" target="_blank">
                      Verifica Assinatura
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/500.html" target="_blank">
                      Google
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- MENU CONFIGURACAO -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#configuracao" aria-expanded="false" aria-controls="configuracao">
                <img src="../../includes/dist/images/icons/10.png" alt="">
                <span class="menu-title">Configurações<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="configuracao">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/blank_page.html">
                      Sistema
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/login.html">
                      Usuários
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/register.html">
                      Dados Empresa
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/404.html">
                      Modelos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/500.html">
                      Acesso
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- http://localhost/unisen-gestao/app/includes/dist/index-template.html -->
            <li class="nav-item">
              <a class="nav-link" href="../../includes/dist/index-template.html">
                <img src="../../includes/dist/images/icons/7.png" alt="">
                <span class="menu-title">TEMPLATE</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../login/logout.php">
                <img src="../../includes/dist/images/icons/sair-31.png" alt="">
                <span class="menu-title">Sair</span>
              </a>
            </li>
          </ul>
        </nav>
