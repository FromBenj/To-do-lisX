export function preventWelcomePage()
{
    const perfEntries = performance.getEntriesByType("navigation");
    const preventSituations = [
        "reload",
        "back_forward",
    ]
    const welcomePage = document.getElementById('welcome');
    const toDoPage = document.getElementById('to-do-list-page');

    if (preventSituations.includes(perfEntries[0].type)) {
        welcomePage.classList.add("d-none");
        toDoPage.classList.remove("d-none");
    }
}
