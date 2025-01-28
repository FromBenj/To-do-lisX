// get new user name
const welcomePage = document.getElementById("welcome")
const toDoPage = document.getElementById("to-do-list-page")
const userNameInput = document.getElementById("new-user-name");
const pageButton = document.getElementById("open-page-button");
function newUserName() {
    const userName = userNameInput.value;
    localStorage.setItem('name', userName);
    welcomePage.classList.add("slide-out");
    toDoPage.classList.remove("d-none");
    toDoPage.classList.add("appear");
}

if (  !localStorage.getItem('name') || localStorage.getItem('name') === null) {
       userNameInput.addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            newUserName();
        }
    })
    document.body.addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            newUserName();
        }
    })
    pageButton.addEventListener("click", () => {
        newUserName()
    })
}

// welcome user

function getUserConfig() {
    const newUserContainer = document.getElementById("new-user-container");
    const userName = document.getElementById("user-name");
    userName.innerText = localStorage.getItem('name');
    newUserContainer.classList.add("slide-out");
    welcomePage.classList.replace("justify-content-between", "justify-content-around");
}

if (localStorage.getItem('name')) {
getUserConfig();
    document.body.addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            newUserName();
            welcomePage.classList.add("slide-out");
            toDoPage.classList.remove("d-none");
            toDoPage.classList.add("appear");
        }
    })
    pageButton.addEventListener("click", () => {
        newUserName();
        welcomePage.classList.add("slide-out");
        toDoPage.classList.remove("d-none");
        toDoPage.classList.add("appear");
    })
}
