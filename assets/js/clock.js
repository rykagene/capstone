function updateTime() {
    const clock = document.getElementById('clock');
    const now = new Date();
    let hours = now.getHours();
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    let timeOfDay = 'AM';

    if (hours >= 12) {
        timeOfDay = 'PM';
        if (hours > 12) {
            hours -= 12;
        }
    }

    hours = hours.toString().padStart(2, '0');
    const timeString = `${hours}:${minutes}:${seconds} ${timeOfDay}`;

    clock.textContent = timeString;
}

setInterval(updateTime, 1000);

updateTime();