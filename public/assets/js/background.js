document.addEventListener('htmx:load', () => {

// Background change
    const values = ["white-background", "color-background", "dark-mode"];
    let body = document.body.classList;
    body.add("color-background");
    let currentBackground = "color-background";
    const backgroundSelector = document.getElementById("background-choice");
    backgroundSelector.addEventListener('click', () => {
        let value = backgroundSelector.value;
        if (values.includes(value)) {
            body.remove(currentBackground);
            currentBackground = value;
            body.add(value);
            const title = document.getElementById("to-do-title");
            const addButton = document.getElementById("add-button");
            if (value === "dark-mode") {
                title.classList.add("text-white");
                addButton.classList.add("bg-dark", "text-white");
            } else {
                addButton.classList.remove("bg-dark", "text-white");
                title.classList.remove("text-white");
            }
        }
    })
})
