// get date and time
const weekdayDiv = document.getElementById("weekday");
const numberDIv = document.getElementById("date-number");

function updateDate(currentDate) {
let number = String(currentDate.getDate ());
let weekday = currentDate.toLocaleDateString('en-US', { weekday: 'short' });
weekdayDiv.innerText = weekday;
numberDIv.innerText = number;
}

function updateTime(currentDate) {
    const time = currentDate.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
    });
    document.getElementById('time').innerHTML = time;
}

function updateDateAndTime() {
    const currentDate = new Date();
    updateDate(currentDate);
    updateTime(currentDate);
}

setInterval(updateDateAndTime, 1000);
updateDateAndTime();
