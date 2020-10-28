//document.getElementById("pizzaform").onsubmit =validate;

let form = document.getElementById("pizzaform");
form.onsubmit = validate;

//make error messaged invisible
function clearErrors() {
    let errors = document.getElementsByClassName("text-danger");
    for(let i=0; i<errors.length; i++) {
        errors[i].classList.add("d-none");
    }
}

//Validate pizza form
function validate() {
    clearErrors();

    let first = document.getElementById("fname").value;
    let last = document.getElementById("lname").value;

    //error flag
    let isValid = true;

    //get the value of the first name
    if (first =="") {
        //alert("First name Required");
        let errFname = document.getElementById("errfname");
        errFname.classList.remove("d-none");
        isValid = false;
    }

    //get the value of the last name
    if (last =="") {
        let errLname = document.getElementById("errlname");
        errLname.classList.remove("d-none");
        isValid = false;
    }

    //validate address

    //validate method
    let method = document.getElementsByName("method");
    let count = 0;
    for(let i = 0; i<method.length; i++) {
        if(method[i].checked) {
            count++
        }
        if (count==0) {
            let errMethod = document.getElementById("err-method");
            errMethod.classList.remove("d-none");
            isValid = false;
        }
    }
    //toppings

    //validate size
    let size = document.getElementById("size").value;
    if(size == "none") {
        let errsize = document.getElementById("err-size");
        errsize.classList.remove("d-none");
        isValid = false;
    }

    return isValid;
}



