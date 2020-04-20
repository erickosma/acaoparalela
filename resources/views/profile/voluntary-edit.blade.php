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
                                    <h2>
                                        <form action="" method="POST" >
                                            @method('PUT')

                                            ...
                                        </form>
                                        {{  $user->name ?? 'Digite seu nome' }}</h2>
                                    <h4 class="text-light-ac">
                                        <span class="d-block">{{  $voluntaty->description ?? 'Digite aqui uma breve descrição sobre você' }}</span>
                                    </h4>
                                    <br>
                                    <button type="button" class="btn btn-labeled  @if($bgColor === 'bg-primary-ac') btn-info @else btn-secondary @endif" href="#">
                                        <span id="editUser" class="btn-label"><i class="material-icons">edit</i> </span>Editar
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

        </section>
    </div>
    <div class="mb-5 p-0">
    </div>
@endsection

