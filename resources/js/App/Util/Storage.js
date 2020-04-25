/**
 * Storage token
 */
class Storage {

    check() {
        return !!localStorage.token;
    }

    getToken() {
        return localStorage.token;
    }

    getExpireAt(){
        return localStorage.expiration;
    }

    setToken(token, expiration = null) {
        localStorage.token = token;
        this.setExpiredAt(expiration);
    }

    setExpiredAt(expiration = null){
        let expireAt = this.calculateExpireDate(1440*1000);
        if(expiration){
            expireAt = this.calculateExpireDate(expiration);
        }
        localStorage.expiration =  expireAt;
    }

    calculateExpireDate(expiration){
        var dt = new Date();
        dt.setSeconds( dt.getSeconds() + expiration );
        return dt.getTime();
    }

    saveToken(json){
        if(json && json.access_token){
            this.setToken(json.access_token, json.expires_in);
        }
    }

    remove(){
        localStorage.token = null;
        localStorage.expiration = null;
    }
}

export  { Storage }
