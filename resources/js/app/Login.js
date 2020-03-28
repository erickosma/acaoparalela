import { Ajax } from '../util/Ajax';
import {MapError} from "../util/error/MapError";

class Login {

    login(form) {
        let ajax  = new Ajax();
        let $registerForm =  $(form);
        const url = $registerForm.attr('action');
        const data = $registerForm.serialize();
        ajax.post(url, data,
            function (json) {
                if(json.success && json.data){
                    //todo login
                }

            },
            function (error) {
                let map = new  MapError(error);
                toastr.warning(map.error.message);
            });
    }

}

export { Login }
