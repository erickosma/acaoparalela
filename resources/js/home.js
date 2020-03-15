import { RandomImage } from '../js/app/RandomImage.js';
import { LoginTab } from './app/LoginTab';

function  onchange(login){
    $(window).on('hashchange',function(){
        login.selectTab();
    });
}

$( document ).ready(function() {
    let home = new RandomImage('.top-search');
    let login = new LoginTab();
    home.init();
    login.selectTab();
    login.validateForm();
    onchange(login);
    console.log(toastr);
    //todo organizar login
});

