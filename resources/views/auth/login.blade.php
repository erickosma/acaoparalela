@extends('layout.app')

@section('title', ' - Login')
@section('style')
    <link rel="stylesheet" href="{{ mix('app/css/home.css') }}">
@endsection

@section('script')
    <script src="{{ mix('app/js/home.js') }}"></script>

@endsection
@section('content')


    <div class="m-0 p-0">
        <section id="login-page" class="mx-auto w-100 mt-3 bg-light justify-content-center mb-5">
            <div class="d-lg-flex justify-content-center text-center align-content-center " >
                <div class="col-lg-6 col-lg-push-2 col-sm-10 col-sm-push-1 bg-white-ac"   style="height: 25rem">
                        <ul class="nav nav-justified nav-tabs" id="justifiedTab" role="tablist">
                            <li class="nav-item">
                                <a aria-controls="access" aria-selected="true" class="nav-link" data-toggle="tab" href="#access" id="access-tab" role="tab">Acessar sua conta</a>
                            </li>
                            <li class="nav-item">
                                <a aria-controls="new-register" aria-selected="false" class="nav-link" data-toggle="tab" href="#new-register" id="new-register-tab" role="tab">Criar sua conta</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="justifiedTabContent">
                            <div aria-labelledby="access-tab" class="tab-pane show" id="access" role="tabpanel">
                                @include('auth.acess')
                            </div>
                            <div aria-labelledby="new-register-tab" class="tab-pane" id="new-register" role="tabpanel">
                                @include('auth.register')

                            </div>
                        </div>

                    <div style="height: 3rem"> </div>
                    </div>


            </div>

        </section>
    </div>
    <div class="mb-5 p-0">
    </div>
@endsection
