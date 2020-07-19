/**
 * Storage token
 */
class Storage {

    constructor() {
        this.defaltExpirate = 1440;
        this.defalCalculeteExpiration = 1000*30
    }

    check() {
        return !!localStorage.token;
    }

    isExpire() {
        const expire = this.getExpireAt() - this.defalCalculeteExpiration;
        let now = new Date().getTime();

        if(expire.length <= 0){
            return false;
        }
        //already expire
        return now >= expire ;
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
        let expireAt = this.calculateExpireDate(this.defaltExpirate);
        if(expiration){
            expireAt = this.calculateExpireDate(expiration);
        }
        localStorage.expiration =  expireAt;
    }

    calculateExpireDate(expiration){
        var dt = new Date();
        dt.setSeconds( (dt.getSeconds() + expiration) );
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
