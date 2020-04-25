import {Storage} from "./Storage";
import {MapError} from "./error/MapError";  //use in login
import {AppUrl} from "./AppUrl";

class Ajax {

    constructor() {
        this.storage = new Storage();
        this.refresh = false;
    }

    request(config, callbackSuccess = null, callbackError = null) {
        let storage = this.storage;
        let self  = this;
        config = config || {};
        const url = config.url || '/';
        const method = config.method || 'GET';
        const data = config.data || '';
        const auth = config.auth || null;
        let cache = false;
        let contentType = "application/x-www-form-urlencoded";

        if (method === 'GET') {
            cache = true;
        }

        $.ajax({
            url: url,
            type: method,
            dataType: 'json',
            processData: false,
            data: data, // post data || get data
            cache: cache,
            headers: {
                "Content-Type": contentType,
                "Accept": "application/json"
            },
            success: function (json) {
                if (callbackSuccess && typeof callbackSuccess === "function") {
                    callbackSuccess(json);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                if (callbackError && typeof callbackError === "function") {
                    callbackError({
                        textStatus: textStatus,
                        status: XMLHttpRequest.status,
                        messageThrown: errorThrown,
                        responseJSON: (XMLHttpRequest.responseJSON || null),
                    });
                }
                if(auth &&  XMLHttpRequest.status === 401 && self.refresh === false){
                    self.refreshToken();
                }
            },
            beforeSend: function (xhr, settings) {
                $('#progress-bar').slideDown();
                if (auth || storage.check()) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + storage.getToken());
                }
            },
            complete: function () {
                $('#progress-bar').delay(900).slideUp(500);
            }
        });
    }

    post(url, data, callbackSuccess = null, callbackError = null) {
        return this.request(
            {url: url, method: 'POST', data: data, auth: false},
            callbackSuccess,
            callbackError);
    }

    postAuth(url, data, callbackSuccess = null, callbackError = null) {
        return this.request(
            {url: url, method: 'POST', data: data, auth: true},
            callbackSuccess,
            callbackError);
    }

    get(url, data, callbackSuccess = null, callbackError = null) {
        return this.request(
            {url: url, method: 'GET', data: data, auth: false},
            callbackSuccess,
            callbackError);
    }

    getAuth(url, data, callbackSuccess = null, callbackError = null) {
        return this.request(
            {url: url, method: 'GET', data: data, auth: true},
            callbackSuccess,
            callbackError);
    }

    refreshToken() {
        let url = new AppUrl('rurl').getRefresh();
        let self = this;
        this.postAuth(url, null,
            function (json) {
                self.storage.saveToken(json);
            },
            function (error) {
                let map = new MapError(error);
                toastr.error(map.error.message);
            });
        self.refresh=true;
    }


}

export {Ajax}
