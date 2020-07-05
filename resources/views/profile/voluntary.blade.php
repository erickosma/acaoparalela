@extends('layout.app')

@section('title', ' - Editar perfil')

@section('style')
    <link rel="stylesheet" href="{{ mix('app/css/profile.css') }}">
@endsection

@section('script')
    <script src="{{ mix('app/js/profile.js') }}"></script>

@endsection
@section('content')


    <div class="m-0 p-0">
        <section id="profile-page" class="mx-auto w-100 justify-content-center mb-5">
            <div class="col user-menu-container bg-dark-ac">
                <div class="user-details">
                    <div class="row {{ $bgColor }} text-light-ac">
                        <div class="col-md-5 p-0">
                            <div class="user-image">
                                <img src="/img/default-user.png" class="img-responsive thumbnail" >
                            </div>
                        </div>
                        <div class="col-md-7 p-0 ">
                            <div class="pl-lg-5  pl-4  pt-4 mb-5">
                                <h2> {{  $user->name ?? 'Digite seu nome' }}</h2>
                                <h4 class="text-light-ac">
                                    <span class="d-block">{{  $voluntaty->description ?? 'Digite aqui uma breve descrição sobre você' }}</span>
                                </h4>
                                <br>
                                <a type="button" class="btn btn-labeled  @if($bgColor === 'bg-primary-ac') btn-info @else btn-secondary @endif" href="{{route('web.profile.vol.edit', $user)}}">
                                    <span id="editUser" class="btn-label"><i class="material-icons">edit</i> </span>Editar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row overview mx-auto justify-content-center">
                        <div class="col-md-4 p-4 text-center">
                            <h3>Seguindo</h3>
                            <h4 class="text-secundary-ac">2,784</h4>
                        </div>
                        <div class="col-md-4 p-4 text-center">
                            <h3>Participações voluntárias</h3>
                            <h4 class="text-secundary-ac">45</h4>
                        </div>
                        <div class="col-md-4 p-4 text-center">
                            <h3>Horas de voluntariado</h3>
                            <h4 class="text-secundary-ac">4</h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col justify-content-center text-center align-content-center mt-5">
                <h2>Habilidades</h2>
                <button type="button" class="btn btn-outline-secondary">Secondary</button>
            </div>
                <div class="col justify-content-center text-center align-content-center mt-5">
                    <h2>Objetivos</h2>
                    <br>
                    <p class="text-left pl-lg-5 pr-lg-2  pl-md-3 pr-md-1">
                        {{  $voluntaty->objective ?? 'Aqui algus dos seus objetivo, algo em você possa ajudar :)' }}
                    </p>

                </div>
            <div class="col user-menu-container top justify-content-center text-center align-content-center mt-5 bg-white-ac">
                <br>
                <h2>Interações recentes</h2>

                <a type="button" class="btn btn-labeled  @if($bgColor === 'bg-primary-ac') btn-info @else btn-secondary @endif" href="{{route('web.profile.vol.edit', $user)}}">
                    <span id="editUser" class="btn-label"><i class="material-icons">exposure_plus_1</i> </span>
                    Quero ajudar
                </a>
                <br>
                <br>
                <br>
                <div class="d-lg-flex justify-content-center text-center align-content-center">

                    <div class="card-group  text-left">
                        <div class="card card-ac ml-2 mb-3 mr-2">
                            <img class="card-img-top" src="https://picsum.photos/200/200" alt="Card image cap">
                            <a href="#">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                </div>
                            </a>
                        </div>

                        <div class="card card-ac ml-2 mb-3 mr-2">
                            <img class="card-img-top" src="https://picsum.photos/200/201" alt="Card image cap">
                            <a href="#">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                </div>
                            </a>
                        </div>
                        <div class="card card-ac ml-2 mb-3 mr-2">
                            <img class="card-img-top" src="https://picsum.photos/200/202" alt="Card image cap">
                            <a href="#">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
    <div class="mb-5 p-0">
    </div>
@endsection

