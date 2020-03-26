class Ajax {

    request(config, callbackSuccess = null, callbackError = null) {
        config = config || {};
        const url = config.url || '/';
        const method = config.method || 'GET';
        const data = config.data || null;
        const auth = config.auth || null;
        $.ajax({
            url: url,
            type: method,
            contentType: 'json',
            dataType: 'json',
            data: data, // post data || get data
            success: function (json) {
                if (callbackSuccess && typeof callbackSuccess === "function") {
                    callbackSuccess(json);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                if (callbackError && typeof callbackError === "function") {
                    callbackError({  textStatus:  textStatus, status:  XMLHttpRequest.status, message: errorThrown});
                }
            },
            beforeSend: function (xhr) {
                if (auth) {
                    console.log('todo auth');
                }
            }
        });

    }

    post(url, data, callbackSuccess = null, callbackError = null) {
        return this.request(
            { url: url, method : 'POST', data: data, auth: false},
            callbackSuccess,
            callbackError);
    }

    postAuth(url, data, callbackSuccess = null, callbackError = null){
        return this.request(
            { url: url, method : 'POST', data: data, auth: true},
            callbackSuccess,
            callbackError);
    }

    get(url, data, callbackSuccess = null, callbackError = null) {
        return this.request(
            { url: url, method : 'POST', data: data, auth: false},
            callbackSuccess,
            callbackError);
    }

    getAuth(url, data, callbackSuccess = null, callbackError = null) {
        return this.request(
            { url: url, method : 'POST', data: data, auth: true},
            callbackSuccess,
            callbackError);
    }
}

export {Ajax}
