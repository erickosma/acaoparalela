import {Profile} from "./App/Profile";
import {Skill} from "./App/Skill";
import {Address} from "./App/Address";

$(document).ready(function () {
    let profile = new Profile();
    let skill = new Skill();
    let address = new Address();

    profile.validate();
    skill.init();
    address.init();


    $('#bt-save').click(function () {
        profile.submit()
    });

});


