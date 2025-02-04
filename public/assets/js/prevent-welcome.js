const perfEntries = performance.getEntriesByType("navigation");

const preventSituations = [
    "reload",
    "back_forward",
]

if (preventSituations.includes(perfEntries[0].type)) {
    welcomePage.classList.add("d-none");
    toDoPage.classList.remove("d-none");
}


