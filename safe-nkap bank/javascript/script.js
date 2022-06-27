const form = document.getElementById("form_section");
const Cname = document.getElementById("name");
const surName = document.getElementById("sur_name");
const email = document.getElementById("email");
const location = document.getElementById("location");
const dateOfBirth = document.getElementById("date_of_birth");
// const placeOfBirth = document.getElementById("place_of_birth");
const contact = document.getElementById("contact");
const username = document.getElementById("username");
const password = document.getElementById("password_account");
const retypePassword = document.getElementById("rewrite_password_account");
const idCard = document.getElementById("ID_card_num");

form.addEventListener('submit', (e)=> {
    e.preventDefault();

    checkInputs();
});

function checkInputs(){
    // get values from inputs
    const CnameValue = Cname.value.trim();
    const surnameValue = surName.value.trim();
    const emailValue = email.value.trim();
    const locateValue = location.value.trim();
    const dobValue = dateOfBirth.value.trim();
    // const pobValue = placeOfBirth.value.trim();
    const contactValue = contact.value.trim();
    const userValue = username.value.trim();
    const passwordValue = password.value.trim();
    const password2 = retypePassword.value.trim();
    const idcardValue = idCard.value.trim(); 

    if(CnameValue === ""){
        // show error 
        // add error class
        setErrorFor(Cname, 'you have to fill this space');
    }
    else{
        // add success class
        setSuccessFor(Cname);
    }

    if(surnameValue === ""){
        // show error 
        // add error class
        setErrorFor(surName, 'you have to fill this space');
    }
    else{
        // add success class
        setSuccessFor(surName);
    }

	if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
	}

    if(locateValue === ""){
        // show error 
        // add error class
        setErrorFor(location, 'you have to fill this space');
    }
    else{
        // add success class
        setSuccessFor(location);
    }

    if(dobValue === ""){
        // show error 
        // add error class
        setErrorFor(dateOfBirth, 'you have to fill this space');
    }
    else{
        // add success class
        setSuccessFor(dateOfBirth);
    }

    if(contactValue === ""){
        // show error 
        // add error class
        setErrorFor(contact, 'you have to fill this space');
    }
    else{
        // add success class
        setSuccessFor(contact);
    }

    if(userValue === ""){
        // show error 
        // add error class
        setErrorFor(username, 'you have to fill this space');
    }
    else{
        // add success class
        setSuccessFor(username);
    }

    if(passwordValue === ""){
        // show error 
        // add error class
        setErrorFor(password, 'you have to fill this space');
    }
    else{
        // add success class
        setSuccessFor(password);
    }

    if(password2 === ""){
        // show error 
        // add error class
        setErrorFor(retypePassword, 'password do not match');
    }
    else if(passwordValue !== password2) {
		setErrorFor(retypePassword, 'Passwords does not match');
	} 
    else{
        // add success class
        setSuccessFor(retypePassword);
    }

    if(idcardValue === ""){
        // show error 
        // add error class
        setErrorFor(idCard, 'you have to fill this space');
    }
    else{
        // add success class
        setSuccessFor(idCard);
    }
}


// function setErrorFor(input, message){
//     const formControl = input.parentElement; //.form-control
//     const small = formControl.querySelector('small');

//     // add error message
//     small.innerText = message;

//     // add error class
//     formControl.className = 'form_control error';
    
// }

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form_control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form_control success';
}

function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}