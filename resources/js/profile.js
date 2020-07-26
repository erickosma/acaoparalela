import {Profile} from "./App/Profile";
import {Skill} from "./App/Skill";

$(document).ready(function () {
    let profile = new Profile();
    let skill = new Skill();

    profile.validate();
    skill.init();


    $('#bt-save').click(function () {
        profile.submit()
    });

});


