@if(auth()->check())
    <div class="float-left">
        <ul class="navbar-nav ">
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('web.profile') }}">
                    <i class="material-icons icon-mobile-ac">person_pin</i>
                </a>
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
