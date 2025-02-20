export function taskUpdate() {
    let tasksInList;
    tasksInList = document.querySelectorAll(".task-in-list");
    const updateAction = task => {
        let taskContainer = task.parentElement;
        const childrenList = [...taskContainer.children];
        childrenList.forEach(child => {
            if (child.classList.contains("update-button")) {
                child.click();
                const tasksList = document.getElementById("tasks-list");
                child.addEventListener('htmx:beforeRequest', () => {
                    tasksList.innerHTML = "";
                })
            }
        })
    }

    tasksInList.forEach(taskItem => {
        taskItem.addEventListener("dblclick", (event) => {
            const task = event.target;
            task.classList.add("clicked");
            let taskContainer = task.parentElement;
            const childrenList = [...taskContainer.children];
            childrenList.forEach(element => {
                if (element.classList.contains("done-button") || element.classList.contains("delete-button")) {
                    element.classList.toggle("opacity-25");
                    element.classList.toggle("pe-none");
                    element.disabled = true;
                }
            })
        })
    })

    document.body.addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            tasksInList.forEach( task => {
                if (task.classList.contains("clicked")) {
                    console.log(task);
                    updateAction(task);
                }
            })
        }
    })
}
