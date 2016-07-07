@extends('layouts.app')

@section('content')


    <section id="busca">
        <div class="container" >
            <div class="center wow fadeInDown">
                <h2>Busca</h2>
                <p >Encontre ongs <br>
                    Encontre voluntários
                </p>

                <div class="form-group" id="form-pesquisar">
                    <div class="row divBuscaSimples">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="" style="margin-top: 10px;">
                                <div class="form-group">
                                    <input type="text" name="termoPesquisa" id="pesquisa-vagas" placeholder="ex. Analista de Suporte" class="form-control rounded typeahead inputPesquisa" data-provide="typeahead" autocomplete="off">
                                </div>
                            </div>
                            <!--
                            <div class="row divBuscaAvancada">
                                <div class="col-md-7 col-sm-12 col-xs-12 ">
                                    <div class="form-group">
                                        <label class="label titulo-pesquisa-vagas">Localização</label>
                                        <div class="box-local"></div>
                                        <input type="hidden" name="facetCidade[]" id="filtro_localizacao">
                                        <input type="text" placeholder="ex. Belo Horizonte" class="form-control rounded typeahead inputPesquisa" id="busca-cidades" data-provide="typeahead" autocomplete="off">
                                    </div>
                                </div>

                            </div>
                            -->
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-block btn-primary" id="botao-pesquisar">
                                    <i class="fa fa-search"></i>
                                    PESQUISAR
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--/.container-->
    </section><!--/#partner-->










    <section id="search">
        <div class="container" id="partner">
            <div class="center">
                <h2>Busca</h2>
            </div>
            <div class="center wow fadeInDown" >















                @include('core-templates::common.errors')
                <div class="center col-sm-8 col-lg-8">
                    {{ Form::open([ 'route' => 'busca' ]) }}

                    <div class="input-group form-group{{ $errors->has('q') ? ' has-error' : '' }}">
                        <div class="">
                            {{ Form::text('q', null, ['class' => 'form-control']) }}
                            <span class="input-group-btn">
                             {!! Form::submit('Save', ['class' => 'btn btn-primary btn-lg']) !!}
                            </span>
                            {{ $errors->first('q', '<p class="help-block">:message</p>') }}

                        </div>
                    </div>


                    <div class="col-lg-8 {{ $errors->has('q') ? ' has-error' : '' }}">
                        <div class="input-group">
                            {{ Form::text('q', null, ['class' => 'form-control','placeholder' => 'Procurar por']) }}

                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">Go!</button>
                            </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    {{ Form::close() }}
                </div>


            </div>


        </div>
    </section><!--/#portfolio-item-->


@endsection