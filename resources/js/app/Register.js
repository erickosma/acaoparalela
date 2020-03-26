import { Ajax } from '../util/Ajax';

class Register {

    registerUser(url, data) {
        let ajax  = new Ajax();
        ajax.post(url, data,
            function (json) {
                console.log(json);
            },
            function (error) {
                console.log(error);
            });
    }


}

export {Register};
