// Add task input
document.addEventListener('htmx:load', () => {

    const input = document.getElementById("task-input");
    input.addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            document.getElementById("add-button").click();
        }
    })
    const taskButton = document.getElementById("add-button");
    taskButton.addEventListener("click", () => {
        document.getElementById("task-input").value = "";
    })
})
