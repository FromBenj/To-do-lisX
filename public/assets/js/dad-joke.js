// Fetch dad joke
document.addEventListener("DOMContentLoaded", (event) => {
fetch('https://icanhazdadjoke.com/', {
    headers: {
        Accept: 'application/json',
    },
})
    .then(response => response.json())
    .then(data => {
        console.log(data);
        const dadJoke = document.getElementById("dad-joke");
        dadJoke.innerHTML = data.joke;
    })
    .catch(() => {
        const dadJoke = document.getElementById("dad-joke");
        dadJoke.innerHTML = "Oups... Daddy is sleeping.";
    });
});
