import { Ajax } from './Util/Ajax';
import {AppUrl} from "./Util/AppUrl";

class AppHeader {

    constructor() {
        let ajax =  new Ajax();
        let $div = $('#loadHeader');
        let url = new AppUrl('headerUrl').getRoute;
        if($div.length){
            ajax.getAuth(url, null,
                function (data) {
                    $div.html(data.html);
                },
                function (error) {
                    $div.html('Loading ...' + error.toString());
                });
        }
    }

}

export { AppHeader}
