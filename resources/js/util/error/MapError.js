const ERROR_500 = 'Error no servidor',
    ENTITY_ALREADY_EXIST = 'Email já está em uso, tente recuperar sua senha :)';

class MapError {

    constructor(error) {
        this.error = error;
        this.transform();
    }

    transform() {
        //textStatus:  textStatus, status:  XMLHttpRequest.status, message: errorThrown
        if (this.error && 'status' in this.error) {
            switch (this.error.status) {
                case 500:
                    this.error.message = MapError.error500;
                    break;
                case 422:
                    this.error.message = MapError.conflict;
                    break;
            }

        }
    }

    static get error500() {
        return ERROR_500;
    }

    static get conflict() {
        return ENTITY_ALREADY_EXIST;
    }
}

export {MapError}
