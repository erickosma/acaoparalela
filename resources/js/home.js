import { RandomImage } from './App/RandomImage.js';
import { LoginTab } from './App/LoginTab';

function  onchange(login){
    $(window).on('hashchange',function(){
        login.selectTab();
    });
}

$( document ).ready(function() {
    let home = new RandomImage('.top-search');
    let loginTab = new LoginTab();
    home.init();
    loginTab.selectTab();
    loginTab.validateForm();
    onchange(loginTab);
    //todo organizar login
});

