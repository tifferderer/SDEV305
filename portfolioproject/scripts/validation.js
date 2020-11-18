//Validation for the Guestbook Form
//Tiffany Ferderer
//11/4/2020

let form = document.getElementById("guest");
form.onsubmit = validate;

let isValid = true;

//Validate guest form
function validate() {

    clearErrors();

    //Set variables
    let first = document.getElementById("fname").value;
    let last = document.getElementById("lname").value;
    let email = document.getElementById("email").value;
    let mailingList = document.getElementById("add").checked;
    let linkedin = document.getElementById("linkedin").value;
    let meet = document.getElementById("meet").value;
    let meetOther = document.getElementById("other").value;

    //run functions
    nameRequirements(first, last);
    emailInput(email, mailingList);
    linkedinRequirements(linkedin);
    howMet(meet, meetOther);

    return isValid;
}

//Make error messaged invisible
function clearErrors() {
    let errors = document.getElementsByClassName("text-danger");
    for(let i=0; i<errors.length; i++) {
        errors[i].classList.add("d-none");
    }
}

//Are there any empty fields?
function checkEmpties(check, error) {
    if(check == "") {
        fillError(error, "Field Required.")
    }
}

//function to fill the error message and set isValid to false
function fillError(errorText, warning) {
    let response = document.getElementById(errorText);
    response.textContent = warning;
    response.classList.remove("d-none");
    isValid = false;
}

// First and Last name required
function nameRequirements(first, last) {
    //get the value of the first name
    checkEmpties(first, "errfname");

    //get the value of the last name
    checkEmpties(last, "errlname");
}

//Email address must contain '@' and '.'
function emailRequirements(email) {
    if(!email.includes("@") && !email.includes(".")){
        fillError("erremail", "Please enter a valid email.")
    }
}

//If the user  checks mailing list, email is required
function emailInput(email, mailingList) {
if (mailingList === true || email != "") {
        emailRequirements(email);
    }
}

//If linkedIn address, Start with 'http', end with '.com'
function linkedinRequirements(linkedin) {
    if(linkedin !== "") {
        if(linkedin.substring(0,4) !== "http" ||
            linkedin.substring(linkedin.length-4) !==".com"){
            fillError("errlinkedin", "Please enter valid website.");
        }
    }
}

//How we met answer required
function howMet(meet, meetOther) {
    if(meet === "none") {
        fillError("errmeet", "Please Choose.");
    }
    if(meet === "other") {
        checkEmpties(meetOther, "errother");
        }
}