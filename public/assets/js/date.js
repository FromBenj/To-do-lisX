// get date and time
const weekdayDiv = document.getElementById("weekday");
const numberDIv = document.getElementById("date-number");

let  currentDate = new Date();
let number = String(currentDate.getDate ());
let weekday = currentDate.toLocaleDateString('en-US', { weekday: 'short' });
weekdayDiv.innerText = weekday;
numberDIv.innerText = number;

