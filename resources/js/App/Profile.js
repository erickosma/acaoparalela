import {Update} from "./Util/Update";
import {AppUrl} from "./Util/AppUrl";

class Profile {

    constructor() {
        this.updateForm = new Update();
        this.totalLoad = 0;
    }

    submit() {
        $('#form-user-update').submit();
        this.cloneObjective();
        $('#form-voluntary-update').submit();
        this.checkTotalLoad();
    }

    checkTotalLoad() {
        let selector = '#totalLoad';
        let self = this;

        if (!!$(selector)) {
            setInterval(function () {
                let totalUpdate = $(selector).val();
                if (totalUpdate > self.totalLoad) {
                    new AppUrl('profile').redirect();
                }
                self.updateForm.incrementTotalLoad();
            }, 1000);
        }
    }

    cloneObjective() {
        $("#objective").val($("#objective-clone").val());
    }

    update(form) {
        this.updateForm.form(form);
        this.incrementTotal();
    }

    incrementTotal() {
        this.totalLoad++;
    }

    validate() {
        this.validateName();
        this.validateVoluntary();
    }

    validateName() {
        let self = this;
        $('#form-user-update').validate({
            errorElement: 'div',
            focusInvalid: true,
            rules: {
                name: {
                    required: true
                }
            },
            submitHandler: function (form) {
                try {
                    self.update(form);
                } catch (e) {
                    console.debug(e);
                }

            }
        });
    }

    validateVoluntary() {
        let self = this;
        $('#form-voluntary-update').validate({
            errorElement: 'div',
            focusInvalid: true,
            rules: {
                description: {
                    required: true
                },
                objective: {
                    required: true
                }
            },
            submitHandler: function (form) {
                try {
                    self.update(form);
                } catch (e) {
                    console.debug(e);
                }

            }
        });
    }

}

export {Profile}
