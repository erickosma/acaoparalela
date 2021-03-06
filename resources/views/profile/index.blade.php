@extends('layout.app')

@section('title', ' - Perfil')
@section('style')
    <style type="text/css">

    </style>
@endsection

@section('script')
    <script src="{{ mix('app/js/profile.js') }}"></script>

@endsection
@section('content')


    <div class="m-0 p-0">
        <section id="profile-page" class="mx-auto w-100 mt-3 bg-light justify-content-center mb-5">


            <div class="container">
                <div class="row justify-content-md-center">

                    <div class="col-md-auto mt-2">
                        <div class="card" style="width: 20rem;">
                            <div class="card-body">
                                <div class="justify-content-md-center">
                                    <a href="{{ route('web.profile.vol') }}">
                                        <div class="align-self-center align-middle text-center">
                                            <div class="btn btn-outline-secondary rounded-ac">
                                                <i class="material-icons icon-home-ac">people</i>
                                            </div>
                                            <div class="p-2">
                                                <h3>Voluntário</h3>
                                                <p>Você quer ajudar alguma instituição</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-auto mt-2">
                        <div class="align-self-center align-middle text-center d-md-none d-lg-block">
                            <h3>ou</h3>
                        </div>
                    </div>

                    <div class="col-md-auto mt-2" style="width: 23rem;">
                        <div class="card">
                            <div class="card-body">
                                <div class="justify-content-md-center">
                                    <a href="{{ route('web.profile.vol') }}">
                                        <div class="align-self-center align-middle text-center">
                                            <div class="btn btn-outline-secondary rounded-ac">
                                                <i class="material-icons icon-home-ac">location_city</i>
                                            </div>
                                            <div class="p-2">
                                                <h3>Ong</h3>
                                                <p>Cadastrar ong ....</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="profile-page" class="mx-auto w-100 mt-3 bg-light justify-content-center mb-5">

        </section>
    </div>
    <div class="mb-5 p-0">
    </div>
@endsection

