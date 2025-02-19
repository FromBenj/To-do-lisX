
export function taskUpdate() {
//Special task style
    let tasksInList;
    tasksInList = document.querySelectorAll(".task-in-list");
    tasksInList.forEach(task => {
        task.addEventListener("dblclick", (event) => {
            const task = event.target;
            const listChildren = [...task.parentElement.children];
            listChildren.forEach(element => {
                if (element.classList.contains("done-button") || element.classList.contains("delete-button")) {
                    element.classList.toggle("opacity-25");
                    element.classList.toggle("pe-none");
                    element.disabled = "true";
                }
            })
            document.body.addEventListener("click", (event) => {
                if (!task.contains(event.target)) {
                    listChildren.forEach(element => {
                        if (element.classList.contains("update-button")) {
                            element.click();
                            const tasksList = document.getElementById("tasks-list");
                            element.addEventListener('htmx:beforeRequest', () => {
                            tasksList.innerHTML = "";
                            })
                        }
                        // if (element.classList.contains("done-button") || element.classList.contains("delete-button")) {
                        //     element.classList.toggle("opacity-25");
                        //     element.classList.toggle("pe-none");
                        //     element.disabled = "false";
                        // }
                    })
                }
            })
        })
    })

//Handling data submission
}
