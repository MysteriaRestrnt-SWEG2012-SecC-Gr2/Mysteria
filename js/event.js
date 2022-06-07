function openNav() {
    document.getElementById("sideNav").style.width = "18%";
    // document.body.style.marginLeft = "18%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

}

function closeNav() {
    document.getElementById("sideNav").style.width = "0";
    document.body.style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
}

function countdown() {
    const today = new Date();
    var endDate = new Date('14 feb 2022');
    if (today.getSeconds() == endDate.getSeconds()) {
        endDate = resetOfferDate();
    }
    const endTime = endDate - today;
    const endDays = Math.floor(endTime / (1000 * 60 * 60 * 24));
    const endHours = Math.floor((endTime / (1000 * 60 * 60) % 24));
    const endMins = Math.floor((endTime / (1000 * 60) % 60));
    const endSecs = Math.floor((endTime / 1000) % 60);
    const days_el = document.getElementById("days_left");
    days_el.innerHTML = endDays;
    const hours_el = document.getElementById("hours_left");
    hours_el.innerHTML = endHours;
    const mins_el = document.getElementById("mins_left");
    mins_el.innerHTML = endMins;
    const secs_el = document.getElementById("secs_left");
    secs_el.innerHTML = endSecs;
}

function resetOfferDate() {
    const futureDate = new Date();
    futureDate.setDate(futureDate.getDate() + 15);
    return futureDate;
}
setInterval(countdown, 1000);
let toggleBtn = document.querySelector('.toggle-btn');
var swiper = new Swiper(".home-slider", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 100,
        modifier: 2,
        slideShadows: true,
    },
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    }
});