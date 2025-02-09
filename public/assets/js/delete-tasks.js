// Tasks list opacity

const deleteAllTasks = document.getElementById("delete-all");
const taskList = document.getElementById("tasks-list");
const addButton = document.getElementById("add-button");
const deleteButton = document.getElementsByClassName("delete-button");

// Delete all tasks
manageListOpacity();
deleteAllTasks.addEventListener("click", () => {
    taskList.innerHTML = "";
    manageListOpacity();
})

// New task
addButton.addEventListener("click", () => {
    taskList.style.opacity = "1";
})

//Delete a task
function manageListOpacity() {
    (taskList.children.length === 0) ? taskList.style.opacity = "0.5" : taskList.style.opacity = "1";
    for (let i = 0; i < deleteButton.length; i++) {
        deleteButton[i].addEventListener("click", () => {
            taskList.children.length >= 2 ? taskList.style.opacity = "1" : taskList.style.opacity = "0.5";
        })
    }
}

//delete a new task
function manageUpdatedListOpacity() {
    addButton.addEventListener("click", () => {
        let tasksCount = taskList.children.length + 1;
        let deleteButtons = document.querySelectorAll(".delete-button");
        deleteButtons.forEach((button) => {
            button.addEventListener("click", () => {
                tasksCount--;
                tasksCount === 0 ? taskList.style.opacity = "0.5" : null;
            })
        })
    })
}

manageUpdatedListOpacity();




