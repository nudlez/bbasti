var modalLarge = new bootstrap.Modal(document.querySelector("#modal_large"));
var modalSmall = new bootstrap.Modal(document.querySelector("#modal_small"));
var modalLargeContent = document.querySelector("#modal_large .modal-content");
var modalSmallContent = document.querySelector("#modal_small .modal-content");

var alertModal = new bootstrap.Modal(document.querySelector("#alertModal"));
var alertModalContent = document.querySelector("#alertModal #content");

var alert = new bootstrap.Toast(document.querySelector("#alertToast"));
var alertContent = document.querySelector("#alertToast .toast-body");

function ajxcall(method, url, callback){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        callback(this.responseText);
    }
    xhttp.open(method, url, true);
    xhttp.send();
}

function returnajx(rsp){
    modalSmallContent.innerHTML = rsp;
    modalSmall.show();
}

function addCart(rsp){
    alertModalContent.innerHTML = rsp;
    alertModal.show();
}

