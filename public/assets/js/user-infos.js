// get new user name
const welcomePage = document.getElementById("welcome-background")
const toDoPage = document.getElementById("to-do-list-page")
const userNameInput = document.getElementById("new-user-name");
const pageButton = document.getElementById("open-page-button");
function newUserName() {
    const userName = userNameInput.value;
    localStorage.setItem('name', userName);
    welcomePage.classList.add("d-none");
    toDoPage.classList.remove("d-none");
}

if (userNameInput.classList.contains("d-block")) {
    userNameInput.addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            newUserName();
        }
    })
    pageButton.addEventListener("click", () => {
        newUserName()
    })
}

// welcome user
if (localStorage.getItem('name')) {
    const newUserContainer = document.getElementById("new-user-container");
    const userName = document.getElementById("user-name");
    userName.innerText = localStorage.getItem('name');
    newUserContainer.classList.add("d-none");
    welcomePage.classList.replace("justify-content-between", "justify-content-around");
}
