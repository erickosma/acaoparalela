import $ from 'jquery';
import {AppHeader} from "./App/AppHeader";
import {Login} from "./App/Api/Login";

window.$ = window.jQuery = $;

window.toastr = require('toastr');

toastr.options = {
    "closeButton": false,
    "newestOnTop": true,
    "progressBar": true,
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "400",
    "hideDuration": "2000",
    "timeOut": "7000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
    "positionClass": "toast-center-center"
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$( document ).ready(function() {
    new AppHeader();
    $('.logout').click(function (ev) {
        ev.preventDefault();
        let login = new Login();
        login.logout();
        return false;
    });
});
