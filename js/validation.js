console.log("Validation script loaded succesfully!");
let myForm = document.getElementById('theForm');
let username = document.getElementById("Username");
let password = document.getElementById("Password");
let  rPassword= document.getElementById("Repeat_Password");
let fName = document.getElementById("First_Name");
let lName = document.getElementById("Last_Name");
let address1 = document.getElementById("Address1");
let address2 = document.getElementById("Address2");
let city = document.getElementById("City");
let state = document.getElementById("State");
let zipCode = document.getElementById("Zip_Code");
let phoneNumber = document.getElementById("Phone_Number");
let eMail = document.getElementById("Email");
//let gender = document.getElementsByName("Gender");
//let maritalStatus = document.getElementsByName("Marital_Status");
let dob = document.getElementById("DOB");

//X 1 username
function validateUsername() {
    if (username.value.trim().length < 6 || username.value.trim().length > 50) {
        document.getElementById("U").style.visibility = 'visible';
        return 1;
    } else {
        document.getElementById("U").style.visibility = 'hidden';
        return 0;
    }
}
username.addEventListener("blur", validateUsername);

//X 2 password
let passwordCheck=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
function validatePassword() {

    if (password.value.match(passwordCheck) && (password.value.length > 7 || password.value.length < 51)) {
        document.getElementById("P").style.visibility = 'hidden';
        return 0;
    } else {
        document.getElementById("P").style.visibility = 'visible';
        return 1;
    }
}
password.addEventListener("blur", validatePassword);

//X 3 repeat password
function validateRPassword() {
    if ( password.value !== rPassword.value ) {
        document.getElementById("PR").style.visibility = 'visible';
        return 1;
    } else {
        document.getElementById("PR").style.visibility = 'hidden';
        return 0;
    }
}
rPassword.addEventListener("blur", validateRPassword);

//X 4 first name
function validateFName() {
    if (fName.value.trim().length < 1 || fName.value.trim().length > 50) {
        document.getElementById("FN").style.visibility = 'visible';
        return 1;
    } else {
        document.getElementById("FN").style.visibility = 'hidden';
        return 0;
    }
}
fName.addEventListener("blur", validateFName);

//X 5 last name
function validateLName() {
    if (lName.value.trim().length < 1 || lName.value.trim().length > 50) {
        document.getElementById("LN").style.visibility = 'visible';
        return 1;
    } else {
        document.getElementById("LN").style.visibility = 'hidden';
        return 0;
    }
}
lName.addEventListener("blur", validateLName);

//X 6 address1
function validateAddress1() {
    if (address1.value.trim().length < 1 || address1.value.trim().length > 100) {
        document.getElementById("A").style.visibility = 'visible';
        return 1;
    } else {
        document.getElementById("A").style.visibility = 'hidden';
        return 0;
    }
}
address1.addEventListener("blur", validateAddress1);

//X 7 address2
function validateAddress2() {
    if (address2.value.trim().length > 100) {
        document.getElementById("A2").style.visibility = 'visible';
        return 1;
    } else {
        document.getElementById("A2").style.visibility = 'hidden';
        return 0;
    }
}
address2.addEventListener("blur", validateAddress2);

//X 8 city
function validateCity() {
    if (city.value.trim().length < 1 || city.value.trim().length > 50) {
        document.getElementById("C").style.visibility = 'visible';
        return 1;
    } else {
        document.getElementById("C").style.visibility = 'hidden';
        return 0;
    }
}
city.addEventListener("blur", validateCity);

//X 10 zipcode
let digitCheck = /^\d+$/

function validateZipCode() {
    if ((zipCode.value.trim().length === 5 || zipCode.value.trim().length === 9) && zipCode.value.match(digitCheck)) {
        if (zipCode.value.length === 9) {
            zipCode.value = zipCode.value.slice(0,5)+'-'+zipCode.value.slice(5);
        }
        document.getElementById("Z").style.visibility = 'hidden';
        return 0;
        } else {
        document.getElementById("Z").style.visibility = 'visible';
        return 1;
    }
}
zipCode.addEventListener("blur", validateZipCode);

//X 11 phone number
function validatePhoneNumber() {
    let strippedPhoneNumber = phoneNumber.value.replace(/\D/g, '');
    if ((strippedPhoneNumber.value.trim().length === 10) && strippedPhoneNumber.value.match(digitCheck)) {
        phoneNumber.value = '(' + strippedPhoneNumber.value.slice(0, 3) + ') ' + strippedPhoneNumber.value.slice(3, 6) + '-' + strippedPhoneNumber.value.slice(6, 10);
        document.getElementById("PN").style.visibility = 'hidden';
        return 0;
    } else {
        document.getElementById("PN").style.visibility = 'visible';
        return 1;
    }
}
phoneNumber.addEventListener("blur", validatePhoneNumber);

//X 12 email
let emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
function validateEMail() {
    if (eMail.value.trim().length > 3 && emailFormat.test(eMail.value)) {
        document.getElementById("E").style.visibility = 'hidden';
        return 0;
    } else {
        document.getElementById("E").style.visibility = 'visible';
        return 1;
    }
}
eMail.addEventListener("blur", validateEMail);

function submitValidation(event) {
    alert("Project 3 is live");
    let pDCounter = 0;
//X 9 State
    if (state.options[state.selectedIndex].value === "na") {
        document.getElementById("S").style.visibility = 'visible';
        pDCounter++;
    } else {
        document.getElementById("S").style.visibility = 'hidden';
    }

//X 13 gender
    let genderSelected = Array.from(document.querySelectorAll('input[name="Gender"]')).some(radio => radio.checked);

    if (genderSelected) {
        document.getElementById("G").style.visibility = 'hidden';
    } else {
        document.getElementById("G").style.visibility = 'visible';
        pDCounter++;
    }

//X 14 marital status
    let maritalSelected = Array.from(document.querySelectorAll('input[name="Marital Status"]')).some(radio => radio.checked);

    if (maritalSelected) {
        document.getElementById("M").style.visibility = 'hidden';
    } else {
        document.getElementById("M").style.visibility = 'visible';
        pDCounter++;
    }

//X 15 dob
    if (dob.value === "") {
        document.getElementById("D").style.visibility = 'visible';
        pDCounter++;
    } else {
        document.getElementById("D").style.visibility = 'hidden';
    }

    pDCounter += validateUsername()
    pDCounter += validatePassword()
    pDCounter += validateRPassword()
    pDCounter += validateFName()
    pDCounter += validateLName()
    pDCounter += validateAddress1()
    pDCounter += validateAddress2()
    pDCounter += validateCity()
    //pDCounter += validateZipCode()
    pDCounter += validateEMail()

    if (zipCode.value !== "") {
        document.getElementById("Z").style.visibility = 'hidden';
    } else {
        document.getElementById("Z").style.visibility = 'visible';
        pDCounter++;
    }

    if (phoneNumber.value !== "") {
        document.getElementById("PN").style.visibility = 'hidden';
    } else {
        document.getElementById("PN").style.visibility = 'visible';
        pDCounter++;
    }

    /*
    if (eMail.value !== "") {
        document.getElementById("E").style.visibility = 'hidden';
    } else {
        document.getElementById("E").style.visibility = 'visible';
        pDCounter++;
    }
    */


    if (pDCounter > 0) {
        event.preventDefault();
    }
}

myForm.addEventListener('submit', submitValidation);