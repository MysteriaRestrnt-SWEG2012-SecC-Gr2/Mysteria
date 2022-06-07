

form.addEventListener('submit', e => {
    e.preventDefault();

    checkInputs();
});

function checkInputs() {
    const form = document.getElementById('form');
    const firstname = document.getElementById('Fname');
    const Lastname = document.getElementById('Lname');
    const email = document.getElementById('email');
    const phonenumber = document.getElementById('phone');
    // trim to remove the whitespaces
    const firstnameValue = firstname.value.trim();
    const lastnameValue = Lastname.value.trim();
    const emailValue = email.value.trim();
    const phoneValue = phonenumber.value.trim();

    if (firstnameValue === '') {
        alert( 'First name cannot be blank'); return false;
    } else {
        setSuccessFor(firstname);
    }
    if (lastnameValue === '') {
        setErrorFor(Lastname, 'Last name cannot be blank');
    } else {
        setSuccessFor(Lastname);
    }

    if (emailValue === '') {
        setErrorFor(email, 'Email cannot be blank');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Not a valid email');
    } else {
        setSuccessFor(email);
    }

    if (phoneValue === '') {
        setErrorFor(phonenumber, 'Phone number cannot be blank');
    } else {
        setSuccessFor(phonenumber);
    }

}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');

floating_btn.addEventListener('click', () => {
    social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
    social_panel_container.classList.remove('visible')
});