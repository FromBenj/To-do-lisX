// Tasks list opacity

const deleteAllTasks = document.getElementById("delete-all");
const taskList = document.getElementById("tasks-list");
const addButton = document.getElementById("add-button");
const deleteButton = document.getElementsByClassName("delete-button");
function manageListOpacity() {
    (taskList.children.length === 0) ? taskList.style.opacity = "0.5" : taskList.style.opacity = "1";
}

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

for (let i = 0; i <  taskList.children.length; i++) {
    deleteButton[i].addEventListener("click", () => {
        taskList.children.length > 1 ? taskList.style.opacity = "1" : taskList.style.opacity = "0.5";
    })
}

//delete a new task

let taskListLength = taskList.children.length;
addButton.addEventListener("click", () => {
    setTimeout(() => {
        let firstTaskDeleteButton = taskList.querySelector("div .delete-button" );
        console.log(firstTaskDeleteButton)
        firstTaskDeleteButton.addEventListener("click", () => {
            taskList.style.opacity = "0.5";
        })
    }, 500);

    taskListLength ++;
    for (let i = 0; i < taskList.children.length; i++) {
        deleteButton[i].addEventListener("click", () => {
            taskList.children.length > 1 ? taskList.style.opacity = "1" : taskList.style.opacity = "0.5";
        })
    }
})



