// Delete all tasks

const deleteAllTasks = document.getElementById("delete-all");
const taskList = document.getElementById("tasks-list");
const addButton = document.getElementById("add-button");

// Tasks list opacity
function manageListOpacity() {
    (taskList.children.length === 0) ? taskList.style.opacity = "0.5" : taskList.style("1");
}

manageListOpacity();
deleteAllTasks.addEventListener("click", () => {
    taskList.innerHTML = "";
    manageListOpacity();
})
addButton.addEventListener("click", () => {
    taskList.style.opacity = "1";
})
