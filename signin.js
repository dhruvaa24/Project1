
function validate(event){
    event.preventDefault();
    
    let isValid = true;

    // Validate firstname
    let firstname = document.getElementById("firstname").value;
    if (firstname === "") {
        document.getElementById("fn").innerText = "Firstname is required";
        isValid = false;
    } else {
        document.getElementById("fn").innerText = "";
    }

    // Validate lastname
    let lastname = document.getElementById("lastname").value;
    if (lastname === "") {
        document.getElementById("ln").innerText = "Lastname is required";
        isValid = false;
    } else {
        document.getElementById("ln").innerText = "";
    }

    // Validate gender
    let gender = document.getElementById("gender").value;
    if (gender === "") {
        document.getElementById("genderError").innerText = "Gender is required";
        isValid = false;
    } else {
        document.getElementById("genderError").innerText = "";
    }

    // Validate email
    let email = document.getElementById("email").value;
    if (email === "") {
        document.getElementById("emailError").innerText = "Email is required";
        isValid = false;
    } else {
        document.getElementById("emailError").innerText = "";
    }

    // Validate phone
    let phone = document.getElementById("phone").value;
    if (phone === "" || phone<1000000000 || phone>9999999999) {
        document.getElementById("phoneError").innerText = "Invalid Phone Number";
        isValid = false;
    } else {
        document.getElementById("phoneError").innerText = "";
    }

    // Validate username
    let username = document.getElementById("username").value;
    if (username === "") {
        document.getElementById("usernameError").innerText = "Username is required";
        isValid = false;
    } else {
        document.getElementById("usernameError").innerText = "";
    }

    // Validate password
    let password = document.getElementById("password").value;
    if (password === "") {
        document.getElementById("passwordError").innerText = "Password is required";
        isValid = false;
    } else {
        document.getElementById("passwordError").innerText = "";
    }

    // If the form is valid, submit it
    if (isValid) {
        document.forms["myForm"].submit();
    }
}
