import {Ajax} from '../Util/Ajax';
import {MapError} from "../Util/error/MapError";  //use in login
import {AppUrl} from "../Util/AppUrl";
import {Form} from "../Util/Form";

//MapError in ajax

class Auth {

    constructor() {
        this.ajax = new Ajax();
    }

    mapErro(error) {
        console.log(error);
        let map = new MapError(error);
        toastr.warning(map.error.message);
    }

    login(form) {
        let self = this;
        let ajax = this.ajax;
        let formClass = new Form();
        //ver como remover
        $('#inputEmail').attr('name', 'email');
        $('#inputPassword').attr('name', 'password');

        const url = formClass.getAction(form);
        let data = formClass.getFormData(form);
        ajax.post(url, data,
            function (json) {
                if (json) {
                    ajax.storage.saveToken(json);
                    new AppUrl('profile').redirect();
                }
            },
            function (error) {
                self.mapErro(error);
            });
    }

    logout() {
        let self = this;
        let ajax = this.ajax;
        ajax.postAuth(new AppUrl('logout').getLogout(), null,
            function (json) {
                new AppUrl('undef').redirect();
            },
            function (error) {
                self.mapErro(error);
            });
    }
}

export {Auth}
