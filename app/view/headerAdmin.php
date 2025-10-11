<header> 
<nav class="navbar bg-warning sticky-top eva-menu">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="../../public/img/logo.png" alt="Logo" height="30" class="d-inline-block align-text-top">
            EVA - Espaço Virtual de Aprendizagem
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bar"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel" style="--bs-offcanvas-width: 220px;">
            <div class="offcanvas-header">
              <h6 class="offcanvas-title text-warning" id="offcanvasDarkNavbarLabel">
              <img src="../../public/img/logo.png" alt="Logo" height="26" class="d-inline-block align-text-top lil">
              Menu</h6>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 list">
                <li class="nav-item lnk">
                  <a class="nav-link text-white" href="logado.php">HOME</a>
                </li>

                <li class="nav-item dropdown lnk">
                  <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    EDUCA
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark list">
                  <li><a class="dropdown-item" target="_blank" href="http://educa.alcidesmaya.com.br">PORTAL DO ALUNO</a></li>
                    <li><a class="dropdown-item" target="_blank" href="http://educa.alcidesmaya.com.br/Corpore.Net/Login.aspx">PORTAL DO PROFESSOR</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown lnk">
                  <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    TELEFONES
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark list">
                    <li><a class="dropdown-item" target="_blank" href="https://wa.me/5551993400528">
                      <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                      Coordenação (Márcio) <span class="break">(51) 99340-0528</span>
                    </a></li>
                    <li><a class="dropdown-item" target="_blank" href="https://wa.me/5551993880915">
                      <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                      NADD (Kathy) <span class="break"> (51) 99388-0915 </span>
                    </a></li>
                    <li><a class="dropdown-item" target="_blank" href="https://wa.me/5551993880915">
                      <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                      NADD (Estagiário) <span class="break"> (51) 99388-0915 </span>
                    </a></li>
                    <li><a class="dropdown-item" target="_blank" href="https://wa.me/5551993400596">
                      <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                      CAE (Financeiro) <span class="break"> (51) 99340-0596 </span>
                    </a></li>
                    <li><a class="dropdown-item" target="_blank" href="https://wa.me/5551993881095">
                      <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                      CAE (Geral) <span class="break"> (51) 99388-1095 </span>
                    </a></li>
                  </ul>
                </li>
                <li class="nav-item lnk">
                  <a class="nav-link text-white" 
                  href="#">VÍDEO TUTORIAL</a>
                </li>
                <li class="nav-item lnk">
                  <a class="nav-link text-white" 
                  href="../controller/usuarioController.php?action=sair">DESLOGAR</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>