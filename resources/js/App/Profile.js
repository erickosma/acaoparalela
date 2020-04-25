import {Update} from "./Util/Update";
import {MapError} from "./Util/error/MapError";

class Profile {

    submit() {
        $('#form-user-update').submit();
        $("#objective").val($("#objective-clone").val());
        $('#form-voluntary-update').submit();
    }

    update(form) {
        let updateForm = new Update();
        return updateForm.form(form);
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
                    console.log(e);
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
                        console.log(e);
                    }

                }
            });
    }

}

export {Profile}
