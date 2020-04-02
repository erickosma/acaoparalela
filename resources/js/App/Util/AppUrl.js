class AppUrl {

    constructor(id) {
        this.id = id;
        this.route = $('#' + id).val() || '/';
    }

    redirect(){
        window.location.replace(this.getRoute);
    }

    reload(){
        window.location.reload();
    }
    get getRoute(){
        return this.route;
    }

    getRefresh(){
        return $('#' + this.id).val() || '/api/auth/refresh';
    }

    getLogout(){
        return $('#' + this.id).val() || '/api/auth/logout';
    }
}

export { AppUrl }
