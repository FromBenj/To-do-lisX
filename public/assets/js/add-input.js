// Add task input

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
    })
}
