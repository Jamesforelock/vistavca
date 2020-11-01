const toggleSecretCodeInput = () => {
    const employeeCheckBox = document.getElementById("employeeCheckBox");
    const secretCodeInput = document.getElementById("secretCodeInput");
    if(employeeCheckBox.checked){
        secretCodeInput.style.display = "block";
    }
    else {
        secretCodeInput.style.display = "none";
    }
}