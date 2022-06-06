 function openNav() {
     if (window.innerWidth < 600 || window.innerHeight < 450) {
         document.getElementById("sideNav").style.width = "40%";
         //document.body.style.marginLeft="18%";
         document.body.style.backgroundColor = "rgba(0,0,0,0.7)";
     } else {
         document.getElementById("sideNav").style.width = "18%";
         //document.body.style.marginLeft="18%";
         document.body.style.backgroundColor = "rgba(0,0,0,0.7)";
     }

 }

 function closeNav() {
     document.getElementById("sideNav").style.width = "0";
     document.body.style.marginLeft = "0";
     document.body.style.backgroundColor = "white";
 }