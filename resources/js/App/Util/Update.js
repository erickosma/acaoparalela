import {Form} from "./Form";
import {Ajax} from "./Ajax";
import {MapError} from "./error/MapError";

class Update {

    constructor() {
        this.ajax = new Ajax();
    }

    form(form, auth = true) {
        let ajax = this.ajax;
        let formClass = new Form();
        let self = this;

        const url = formClass.getAction(form);
        let data = formClass.getFormData(form);
        if (auth === true) {
            ajax.postAuth(url, data,
                function (json) {
                    if (json.success === true) {
                        toastr.success('Tudo ok!');
                        self.incrementTotalLoad();
                    }
                },
                function (error) {
                    let map = new MapError(error);
                    toastr.warning(map.error.message);
                });
        } else {
            //do redirect
        }

    }

    incrementTotalLoad() {
        let selector = '#totalLoad';
        if (!!$(selector)) {
            let intVal = $(selector).val();
            intVal++;
            $(selector).val('' + intVal);
        }
    }

}

export {Update}
