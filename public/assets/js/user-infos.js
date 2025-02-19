export function manageUserInfos() {
//get new user name
    let welcomePage = document.getElementById("welcome")
    let toDoPage = document.getElementById("to-do-list-page")
    const newUserContainer = document.getElementById("new-user-container");
    const userNameInput = document.getElementById("new-user-name");
    const pageButton = document.getElementById("open-page-button");

    function newUserName() {
        const userName = userNameInput.value;
        localStorage.setItem('name', userName);
        welcomePage.classList.add("slide-out");
        toDoPage.classList.remove("d-none");
        toDoPage.classList.add("appear");
    }

    if (!localStorage.getItem('name') || localStorage.getItem('name') === null) {
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
        const userName = document.getElementById("user-name");
        userName.innerText = localStorage.getItem('name');
        newUserContainer.classList.add("d-none");
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
}
