<section class="content-inner">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('login') }}" id="form-login">
                @csrf
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
