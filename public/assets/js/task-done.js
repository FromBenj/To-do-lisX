export function taskDone() {
// Task done
    document.addEventListener('htmx:load', () => {
        const taskContainers = document.querySelectorAll('.task-container');
        taskContainers.forEach(taskContainer => {
            let doneButton;
            let task;
            [...taskContainer.children].forEach(child => {
                if (child.classList.contains("done-button")) {
                    doneButton = child;
                } else if (child.classList.contains("task-in-list")) {
                    task = child;
                }
            })
            if (doneButton && task) {
                doneButton.addEventListener('click', (event) => {
                    task.classList.contains("task-done") ?
                        task.classList.remove("task-done") :
                        task.classList.add("task-done");
                    const doneIcon = doneButton.querySelector(".task-done-icon");
                    doneIcon.classList.contains("fa-thumbs-up") ?
                        doneIcon.classList.replace("fa-thumbs-up", "fa-check") :
                        doneIcon.classList.replace("fa-check", "fa-thumbs-up");
                })
            }
        })
    })
}
