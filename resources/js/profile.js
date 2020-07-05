import {Profile} from "./App/Profile";

$(document).ready(function () {
    let profile = new Profile();
    profile.validate();


    $('#bt-save').click(function () {
        profile.submit()
    });

});


