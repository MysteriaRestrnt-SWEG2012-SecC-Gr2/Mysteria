// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    var myDiv = document.getElementById("cartBTNdiv");
    var mybutton = document.getElementById("cartBTN");
    var mybutton2 = document.getElementById("cartBTN2");
    var mybutton3 = document.getElementById("cartBTNM");
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        mybutton.style.display = "block";
        mybutton2.style.display = "block";
        mybutton3.style.display = "block";
        myDiv.style.display = "block";

    } else {
        mybutton.style.display = "none";
        mybutton2.style.display = "none";
        mybutton3.style.display = "none";
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