@if(auth()->check())
    <div class="row d-block">
        <ul class="navbar-nav d-flex justify-content-center ">
            <li class="nav-item mr-3">
                <div class="dropleft">
                    <a class="nav-link"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons icon-mobile-ac" style="font-size: 3rem">person_pin</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                        <a class="dropdown-item"  href="{{ route('web.profile') }}" type="button">Perfil</a>
                        <a class="dropdown-item logout" href="#"  type="button">Sair</a>
                    </div>
                </div>

            </li>


        </ul>
    </div>

@else
    <div class="row d-md-block d-sm-block d-xm-block d-lg-none">
        <ul class="navbar-nav d-flex justify-content-center mt-2 ">
            <li class="nav-item">
                <a class="nav-link btn  btn-dark" href="{{ route('web.login') }}#access" role="button">
                    <i class="material-icons">lock</i> Entre
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-success" href="{{ route('web.login') }}#new-register"  role="button">
                    <i class="material-icons">person_pin</i> Cadastre-se
                </a>
            </li>
        </ul>
    </div>

    <div class="float-left d-none d-lg-block">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link btn  btn-dark" href="{{ route('web.login') }}#access"  role="button">
                    <i class="material-icons">lock</i> Entre
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-success" href="{{ route('web.login') }}#new-register"  role="button">
                    <i class="material-icons">person_pin</i> Cadastre-se
                </a>
            </li>
        </ul>
    </div>

@endif
