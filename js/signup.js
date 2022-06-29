function openForm1() {
    console.log("form1");
    document.getElementById("myForm").style.display = "block";
    document.getElementById("pass_reset1").style.display = "block";
    // document.getElementById("pass_reset3").style.display = "none";
    // document.getElementById("pass_reset2").style.display = "none";
    document.getElementById("pass_reset4").style.display = "none";
}

function openForm2() {
    console.log("hi2");
    document.getElementById("myForm").style.display = "block";
    document.getElementById("pass_reset1").style.display = "none";
    document.getElementById("pass_reset2").style.display = "block";
}

function openForm3() {
    console.log("hi3");
    document.getElementById("myForm").style.display = "block";
    document.getElementById("pass_reset1").style.display = "none";
    document.getElementById("pass_reset2").style.display = "none";
    document.getElementById("pass_reset4").style.display = "none";
    document.getElementById("pass_reset3").style.display = "block";
}

function openForm4() {
    console.log("hi4");
    document.getElementById("myForm").style.display = "block";
    document.getElementById("pass_reset1").style.display = "none";
    document.getElementById("pass_reset4").style.display = "block";

}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
    document.getElementById("pass_reset1").style.display = "none";
    document.getElementById("pass_reset2").style.display = "none";
    document.getElementById("pass_reset3").style.display = "none";
    document.getElementById("pass_reset4").style.display = "none";
    sessionStorage.clear();
}

function confPsd() {
    console.log("conf");
    var p1 = document.getElementById("Password").value;
    var p2 = document.getElementById("Password2").value;
    var msg = document.getElementById("msg");
    if (p1 !== p2) {
        console.log("not");
        msg.innerHTML = "password and confirm password should match!";
        msg.style.color = "red";
        return false;
    } else {
        return true;
    }
}

function confPsd2() {
    console.log("conf");
    var p1 = document.getElementById("password3").value;
    var p2 = document.getElementById("password4").value;
    var msg = document.getElementById("msg2");

    if (p1 !== p2) {
        console.log("not");
        msg.innerHTML = "password and confirm password should match!";
        msg.style.color = "red";
        return false;
    } else {
        return true;
    }
}