export function taskDone() {
// Task done
    document.addEventListener('htmx:load', () => {
        const doneButtons = document.getElementsByClassName("task-done-container");
        for (let i = 0; i < doneButtons.length; i++) {
            doneButtons[i].addEventListener("click", () => {
                let siblings = doneButtons[i].parentNode.children;
                for (let j = 0; i < siblings.length; i++) {
                    if (siblings[j].classList.contains("task-in-list")) {
                        !siblings[j].classList.contains("text-decoration-line-through") ?
                            siblings[j].classList.add("text-decoration-line-through", "text-white", "main-green-background") :
                            siblings[j].classList.remove("text-decoration-line-through", "text-white", "main-green-background");
                    }
                }
            })
        }
    })
}
