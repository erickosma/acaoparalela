@extends('layout.app')


@section('style')
    <link rel="stylesheet" href="{{ mix('app/css/home.css') }}">
@endsection

@section('script')
    <script src="{{ mix('app/js/home.js') }}"></script>

    <script type="text/javascript">
        const myRequest = new Request('https://jsonplaceholder.typicode.com/todos/1');
        fetch(myRequest)
            .then(response => {
                if (response.status === 200) {
                    return response.json();
                } else {
                    throw new Error('Ops! Houve um erro em nosso servidor.');
                }
            })
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection
@section('content')


    <div class="m-0 p-0">
        <section id="feature" class="mx-auto w-100 mt-3 bg-light justify-content-center mb-5">
            <div class="d-lg-flex justify-content-center text-center align-content-center " >
                <div class="col-lg-6 col-lg-push-2 col-sm-10 col-sm-push-1 bg-white-ac">
                        <ul class="nav nav-justified nav-tabs" id="justifiedTab" role="tablist">
                            <li class="nav-item">
                                <a aria-controls="access" aria-selected="true" class="nav-link active" data-toggle="tab" href="#access" id="home-tab" role="tab">Acessar sua conta</a>
                            </li>
                            <li class="nav-item">
                                <a aria-controls="new-register" aria-selected="false" class="nav-link" data-toggle="tab" href="#new-register" id="profile-tab" role="tab">Criar sua conta</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="justifiedTabContent">
                            <div aria-labelledby="access-tab" class="tab-pane fade show active" id="access" role="tabpanel">
                                <section class="content-inner">
                                    <div class="card">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group mt-4 mb-4">
                                                    <label class="sr-only" for="inputEmail">Seu email</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><i class="material-icons" style="color: #7886d7">alternate_email</i></div>
                                                        </div>
                                                        <input type="email" class="form-control" id="inputEmail"  placeholder="Seu email" aria-describedby="emailHelp">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4 mb-4">
                                                    <label class="sr-only" for="inputPassword">Senha</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><i class="material-icons" style="color: #7886d7">vpn_key</i></div>
                                                        </div>
                                                        <input type="email" class="form-control" id="inputPassword"  placeholder="Senha" aria-describedby="passHelp">
                                                        <div class="invalid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-check text-left">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>

                                            </div>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </section>


                            </div>
                            <div aria-labelledby="new-register-tab" class="tab-pane fade" id="new-register" role="tabpanel">22222</div>
                        </div>

                    <div style="height: 3rem"> </div>
                    </div>


            </div>

        </section>
    </div>
    <div class="mb-5 p-0">
    </div>
@endsection
