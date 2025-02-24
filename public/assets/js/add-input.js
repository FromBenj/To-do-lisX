// Add task input
import {taskDone} from "./task-done.js";
export function taskInput() {
    document.addEventListener('htmx:load', () => {
        const taskButton = document.getElementById("add-button");
        const input = document.getElementById("task-input");
        input.addEventListener("keypress", (event) => {
            if (event.key === "Enter") {
                taskButton.click();
            }
        })

        taskButton.addEventListener("click", () => {
            document.getElementById("task-input").value = "";
        })

        const tasksList = document.getElementById("tasks-list");
        taskButton.addEventListener('htmx:beforeRequest', () => {
            tasksList.innerHTML = "";
        })

        document.addEventListener('htmx:afterRequest', () => {
            const newTaskContainer = tasksList.firstElementChild;
            const task = newTaskContainer.querySelector(".task-in-list");
            // task.classList.contains("task-done") ?
            //     task.classList.remove("task-done") :
            //     task.classList.add("task-done");
            // const doneIcon = newTaskContainer.querySelector(".task-done-icon");
            // doneIcon.classList.contains("fa-thumbs-up") ?
            //     doneIcon.classList.replace("fa-thumbs-up", "fa-check") :
            //     doneIcon.classList.replace("fa-check", "fa-thumbs-up");
        })
    })
}
