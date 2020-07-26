import {Form} from "./Form";
import {Ajax} from "./Ajax";
import {MapError} from "./error/MapError";

class Update {

    constructor(showMsg = true) {
        this.ajax = new Ajax();
        this.showMsg = showMsg;
    }

    form(form) {
        let formClass = new Form();

        const url = formClass.getAction(form);
        let data = formClass.getFormData(form);
        this.data(url, data);
    }

    data(url, data){
        let ajax = this.ajax;
        let self = this;

        ajax.postAuth(url, data,
            function (json) {
                if (json.success === true) {
                    if(self.showMsg === true){
                        toastr.success('Tudo ok!');
                    }
                    self.incrementTotalLoad();
                }
            },
            function (error) {
                try{
                    let map = new MapError(error);
                    toastr.warning(map.error.message);
                }catch (e) {
                    console.error(e)
                    toastr.warning('Sorry! One unexpected error occurred');
                }

            });

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
