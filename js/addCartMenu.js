// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    var mybutton = document.getElementById("cartBTNM");
    var myDiv = document.getElementById("cartBTNdiv");

    if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        mybutton.style.display = "block";
        myDiv.style.display = "block";

    } else {
        mybutton.style.display = "none";
        myDiv.style.display = "none";
    }
}

function checkAll() {
    var chkBtns = document.querySelectorAll('.fCheck');
    var chkALL = document.getElementById("chkALL");


    if (chkALL.checked == true) {
        for (var i = 0; i < chkBtns.length; i++) {
            chkBtns[i].checked = true;
        }
    } else if (!chkALL.checked) {
        for (var i = 0; i < chkBtns.length; i++) {
            chkBtns[i].checked = false;
        }
    }
}