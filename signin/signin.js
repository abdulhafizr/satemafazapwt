function togglePassword() {
    let inputPassword = document.getElementById("password-content-4-1");
    if (inputPassword.type === "password") {
        inputPassword.type = "text";
        document
            .getElementById("icon-toggle")
            .setAttribute("fill", "#FDF006");
    } else {
        inputPassword.type = "password";
        document
            .getElementById("icon-toggle")
            .setAttribute("fill", "#CACBCE");
    }
}