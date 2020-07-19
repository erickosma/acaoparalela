import {Register} from './Api/Register.js';
import {Login} from "./Api/Login";

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
        let register = new Register();
        register.registerUser(form);
    }

    login(form) {
        let login = new Login();
        login.login(form);
    }

    logout(){
        let login = new Login();
        login.logout();
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
        this.validateRegister();
        this.validateLogin();
    }


    validateLogin() {
        let self = this;
        $('#form-login').validate({ // initialize the plugin
            errorElement: 'div',
            rules: {
                inputEmail: {
                    required: true,
                    email: true
                },
                inputPassword: {
                    required: true
                },
            },
            submitHandler: function (form) {
                self.login(form);
            }
        });
    }

    validateRegister() {
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
                try {
                    self.registerUser(form);
                } catch (e) {
                    console.debug(e);
                }

            }
        });
    }
}

export {LoginTab};
