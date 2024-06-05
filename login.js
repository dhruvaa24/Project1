function validate(event){
    event.preventDefault();

    let isValid = true;

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

    //if form is valid submit it
    if(isValid){
        document.forms["myForm1"].submit();
    }
}