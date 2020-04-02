import {Auth} from "./Auth";
import {Form} from "../Util/Form";
import {AppUrl} from "../Util/AppUrl";

//ajas in Atuh

class Register extends Auth {

    registerUser(form) {
        let self = this;
        let ajax = this.ajax;
        let formClass  = new Form();

        const url = formClass.getAction(form);
        let data = formClass.getFormData(form);
        ajax.post(url, data,
            function (json) {
                if (json.success && json.data) {
                    $(form).attr('action', new AppUrl('login').getRoute);
                    self.login(form);
                }
            },
            function (error) {
                self.mapErro(error);
            });
    }


}

export {Register};
