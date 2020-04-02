<section class="content-inner">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('register') }}" id="form-register">
                <input type="hidden" name="test"  id="registerNametest" value="1">
                <div class="form-group mt-4 mb-4">
                    <label class="sr-only" for="registerName">Nome Completo</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons" style="color: #7886d7">person_outline</i></div>
                        </div>
                        <input type="text" name="name" class="form-control" id="registerName"  placeholder="Nome Completo" aria-describedby="namelHelp">
                    </div>
                </div>


                <div class="form-group mt-4 mb-4">
                    <label class="sr-only" for="registerEmail">Seu email</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons" style="color: #7886d7">alternate_email</i></div>
                        </div>
                        <input type="email"  name="email" class="form-control" id="registerEmail"  placeholder="Seu email" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group mt-4 mb-4">
                    <label class="sr-only" for="registerPassword">Senha</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons" style="color: #7886d7">vpn_key</i></div>
                        </div>
                        <input type="password" name="password" class="form-control" id="registerPassword"  placeholder="Senha" aria-describedby="passHelp">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
    <div class="clearfix">
    </div>
</section>
