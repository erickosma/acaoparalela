@extends('layout.app')


@section('style')
    <link rel="stylesheet" href="{{ mix('app/css/home.css') }}">
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
                                    <div class="align-self-center align-middle text-center">
                                        <div class="btn btn-outline-secondary rounded-ac">
                                            <i class="material-icons icon-home-ac">people</i>
                                        </div>
                                        <div class="p-2">
                                            <h3>Voluntário</h3>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-auto mt-2">
                        <div class="align-self-center align-middle text-center">
                            ou
                        </div>
                    </div>

                    <div class="col-md-auto mt-2" style="width: 23rem;">
                        <div class="card">
                            <div class="card-body">
                                <div class="justify-content-md-center">
                                <div class="align-self-center align-middle text-center">
                                    <div class="btn btn-outline-secondary rounded-ac">
                                        <i class="material-icons icon-home-ac">location_city</i>
                                    </div>
                                    <div class="p-2">
                                        <h3>Ong</h3>
                                    </div>

                            </div>

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

