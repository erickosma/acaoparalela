import $ from 'jquery';
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
