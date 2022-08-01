document.getElementById("edit-btn").onclick = function() {
    var x = document.querySelectorAll("div.del-button");
    x.forEach(function(i) {
        i.style.display = i.style.display === "none" ? "block" : "none";
    });
}

function confirmRemove(id){
    modalSmallContent.innerHTML = ""+
    "<div class='row g-0'>"+
        "<div class='col-12 p-3 text-center'>"+
            "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-alert-circle'><circle cx='12' cy='12' r='10'></circle><line x1='12' y1='8' x2='12' y2='12'></line><line x1='12' y1='16' x2='12.01' y2='16'></line></svg><br /><br />"+
            "Do you really want to remove this item from your cart?"+
        "</div>"+
    "</div>"+
    "<div class='row g-0 bg-dark'>"+
        "<a href='/cart/remove/"+id+"/' class='col-6 btn btn-dark'>Yes</a>"+
        "<button class='col-6 btn btn-dark' data-bs-dismiss='modal'>No</button>"+
    "</div>";
    modalSmall.show();
}


