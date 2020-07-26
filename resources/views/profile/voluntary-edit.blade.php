@extends('layout.app')

@section('title', ' - Editar perfil')

@section('style')
    <link rel="stylesheet" href="{{ mix('app/css/profile.css') }}">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" rel="stylesheet">

@endsection

@section('content')
    <div class="m-0 p-0">
        <section id="profile-page" class="mx-auto w-100 justify-content-center">
                <div class="col user-menu-container bg-white-ac">
                    <div  id="my-details" class="user-details">
                        <div class="row {{ $bgColor }} text-light-ac">
                            <div class="col-md-5 p-0">
                                <div class="user-image">
                                    <img  alt="image user" src="/img/default-user.png" class="img-responsive thumbnail" >
                                </div>
                            </div>
                            <div class="col-md-7 p-0 ">
                                <div class="pl-lg-5  pl-4  pt-4 mb-5">

                                    <form action="{{ route('api.user.update', $user) }}" method="POST" id="form-user-update" name="form-user-update">
                                        @method('PUT')
                                        @csrf

                                        <div class="form-group pr-md-3">
                                            <label for="name" class="text-light-ac">Nome</label>
                                            <input type="text" class="form-control text-light-ac form-control-lg" id="name" name="name" value="{{  $user->name ?? 'Digite seu nome' }}" aria-describedby="nameHelp" placeholder="Digite seu nome">
                                            <small id="nameHelp" class="form-text text-meio-ac" >Nome Sobrenome.</small>
                                        </div>

                                    </form>

                                    <form action="{{ route('api.voluntary.update', $user) }}" method="POST" id="form-voluntary-update" name="form-voluntary-update">
                                        @method('PUT')
                                        @csrf

                                        <div class="form-group pr-md-3">
                                            <label for="description" class="text-light-ac">Descrição</label>
                                            <input type="text" class="form-control text-light-ac " name="description" id="description" value="{{  $voluntary->description ?? 'Digite aqui uma breve descrição sobre você' }}" aria-describedby="descHelp" placeholder="Digite aqui uma breve descrição sobre você">
                                        </div>
                                        <textarea class="d-none" id="objective" rows="0" name="objective"></textarea>

                                    </form>


                                </div>
                            </div>
                        </div>

                        <div id="my-skill" class="col justify-content-center text-center align-content-center mt-5">
                            <h2>Habilidades</h2>
                            <div class="form-group text-left col-12">
                                <input type="hidden" name="skillUrl" id="skillUrl" value="{{ route('api.skill.update') }}">
                                <select  id="selectSkill" class="skill form-control" name="skill[]" multiple="multiple" style="width: 98.6%;">
                                    @foreach($occupations as $macro)
                                        <optgroup label="{{ $macro->macro  }}">
                                            @foreach($macro as $skill)
                                                <option  @if($skill->selected) selected="selected" @endif label="{{ $skill->name }}" value="{{ $skill->id }}"> {{ $skill->name }} </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="my-help" class="col user-menu-container top justify-content-center text-center align-content-center mt-5">
                            <h2>Quero ajuda</h2>
                            <div class="form-group text-left">
                                Descreva o que você pode fazer
                            </div>
                            <div class="form-group text-left">
                                <label for="objective">Objetivos</label>
                                <textarea class="editable medium-editor-textarea" id="objective-clone" rows="4" name="objective-clone">
                                    @if(empty(trim($voluntary->objective)))
                                        <h2>Descreva seus objetivos</h2>
                                            <br>
                                        Aqui alguns dos seus objetivo, algo em você possa ajudar :)
                                    @else
                                        {{  $voluntary->objective }}
                                    @endif
                                </textarea>
                            </div>

                            <button id="bt-save" type="button" class="btn btn-labeled  @if($bgColor === 'bg-primary-ac') btn-info @else btn-secondary @endif" href="#">
                                <span id="editUser" class="btn-label"><i class="material-icons">save_alt</i> </span>Salvar
                            </button>
                        </div>
                    </div>

                </div>

        </section>
    </div>
    <div class="mb-1">&nbsp;</div>

@endsection

@section('script')
    <script src="{{ mix('app/js/profile.js') }}"></script>
    <script>
        $(document).ready(function () {
            let editor = new MediumEditor('.editable', {
                buttonLabels: 'fontawesome'
            });
        });

    </script>
@endsection
