const buttonsState = {state: false}
multiButton = document.getElementsByClassName("multiButton")[0]
buttons = document.getElementsByClassName("subButton")
const checkButtons = () => {
    let stateStyle = buttonsState.state ? "" : "subButton_disabled"
    let selectedStyle = buttonsState.state ? "multiButton_selected" : ""
    multiButton.classList = "multiButton " + selectedStyle
    for(let i = 0; i<buttons.length; i++) {
        buttons[i].classList = "subButton " + stateStyle
        buttons[i].disabled = !buttonsState.state
    }
}
const toggleButtons = () => {
    buttonsState.state = !buttonsState.state
    checkButtons()
}
checkButtons()


