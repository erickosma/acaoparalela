import { Register } from './Register.js';

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
        let register  = new Register();
        const url = $(form).attr('action');
        const data = $(form).serialize();
        register.registerUser(url, data);
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
        let self = this;
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
                self.registerUser(form);
            }
        });
    }


}

export {LoginTab};
