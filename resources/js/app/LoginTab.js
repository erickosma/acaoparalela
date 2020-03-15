import { Ajax } from '../util/Ajax';

class LoginTab {

    activeTab(id) {
        $(id + '-tab').addClass('active');
        $(id).addClass('active');
    }

    disableTab(id) {
        $(id + '-tab').removeClass('active');
        $(id).removeClass('active');
    }

    registerUser(form) {


    }

    selectTab() {
        const scream = location.hash;
        const registerString = '#new-register';
        const accessString = '#access';

        if (scream === registerString) {
            this.activeTab(registerString);
            this.disableTab(accessString);
        } else {
            this.activeTab(accessString);
            this.disableTab(registerString);
        }
    }

    validateForm() {
        $('#form-register').validate({ // initialize the plugin
            errorElement: 'div',
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                },
            },
            submitHandler: function (form) {
                let ajax  = new Ajax();
                const url = $(form).attr('action');
                const data = $(form).serialize();
                ajax.post(url, data);
            }
        });
    }


}

export {LoginTab};
