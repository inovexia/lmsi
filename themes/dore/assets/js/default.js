const appPath = 'http://localhost/repos/lmsi/'; 
const logoutPath = 'login/login_actions/logout';
const updatePath = 'login/login_actions/update_session';
const themePath = `${appPath}themes/dore/assets/`;
const applicationServerPublicKey = 'BBpQAy6d2Q1LKgwAqLU96oHM1Ugyvyq8eDiPlyptO40juyjFQV9wgC6Sem2VcjmuFKY081z30DwLYpz3kF9YA8A';
const sidebarSection = document.getElementById("sidebar");
const mainSection = document.getElementById("content");
//const outputDiv = document.getElementById("response"); 
//const loader = document.getElementById("loader");
const notifyButton = document.querySelector('.enable-notification');

let isSubscribed = false;
let swRegistration = null;

/* Set Toastr Option */
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

/* Loader */
var pageLoader = '';
pageLoader += '<div class="text-center">';
    pageLoader += '<div class="spinner-border " role="status">';
        pageLoader += '<span class="sr-only">Loading...</span>';
    pageLoader += '</div>';
pageLoader += '</div>';
