const toggleSecretCodeInput = () => {
    const assistantCheckBox = document.getElementById("assistantCheckBox");
    const secretCodeInput = document.getElementById("secretCodeInput");
    if(assistantCheckBox.checked){
        secretCodeInput.style.display = "block";
    }
    else {
        secretCodeInput.style.display = "none";
    }
}