<nav class="navbar navbar-expand-lg navbar-dark  bg-primary p-3 sticky-top">
    <a class="navbar-brand ml-5" href="{{ url('/') }}"><img src="/img/logo.png" alt="logo-acao-paralela"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"  aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarText">
        <ul class="navbar-nav mx-lg-auto d-flex justify-content-center">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="material-icons">home</i> Home
                    <span class="sr-only">Ativo</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="material-icons">supervisor_account</i> Sobre Nós</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="material-icons">explore</i>Quero Ajude</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="material-icons">search</i>Ongs</a>
            </li>
        </ul>

        <div class="row d-md-block d-sm-block d-xm-block d-lg-none">
            <ul class="navbar-nav d-flex justify-content-center mt-2 ">
                <li class="nav-item">
                    <a class="nav-link btn  btn-dark" href="#"  role="button">
                        <i class="material-icons">lock</i> Entre
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-success" href="#"  role="button">
                        <i class="material-icons">person_pin</i> Cadastre-se
                    </a>
                </li>
            </ul>
        </div>

        <div class="float-left d-none d-lg-block">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link btn  btn-dark" href="#"  role="button">
                        <i class="material-icons">lock</i> Entre
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-success" href="#"  role="button">
                        <i class="material-icons">person_pin</i> Cadastre-se
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
