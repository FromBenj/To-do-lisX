// Delete all tasks

const deleteAllTasks = document.getElementById("delete-all");
const taskList = document.getElementById("tasks-list");
const addButton = document.getElementById("add-button");
const deleteButton = document.getElementsByClassName("delete-button");

// Tasks list opacity
function manageListOpacity() {
    (taskList.children.length === 0) ? taskList.style.opacity = "0.5" : taskList.style.opacity = "1";
}

manageListOpacity();
deleteAllTasks.addEventListener("click", () => {
    taskList.innerHTML = "";
    manageListOpacity();
})

for (let i = 0; i < deleteButton.length; i++) {
    deleteButton[i].addEventListener("click", () => {
        taskList.children.length >= 2 ? taskList.style.opacity = "1" : taskList.style.opacity = "0.5";
    })
}

addButton.addEventListener("click", () => {
    taskList.style.opacity = "1";
})
