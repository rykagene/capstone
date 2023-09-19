
              function markReservationAsDone(reservationId) {
    Swal.fire({
        title: 'Occupying Done?',
        text: 'This button will serve as act of removing RFID card on the reader will automatically submit this form',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'green',
        cancelButtonColor: '#d3d3d3',
        confirmButtonText: 'Mark this seat as available'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to update seat status and move reservation to history
            // mark as done button
            $.ajax({
                url: `toAddHistory.php?reservation_id=${reservationId}`,  
                type: 'GET',
                success: function (response) {
                    window.location.href = `survey.php`;
                    
                },
                error: function (xhr, textStatus, errorThrown) {
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while marking the reservation as done.',
                        icon: 'error',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    });
}

    const FULL_DASH_ARRAY = 283;
    const WARNING_THRESHOLD = 10;
    const ALERT_THRESHOLD = 5;

    const COLOR_CODES = {
        info: {
            color: "green"
        },
        warning: {
            color: "orange",
            threshold: WARNING_THRESHOLD
        },
        alert: {
            color: "red",
            threshold: ALERT_THRESHOLD
        }
    };
    const TIME_LIMIT = <?php echo $remaining_time; ?>;

    let timePassed = 0;
    let timeLeft = TIME_LIMIT;
    let timerInterval = null;
    let remainingPathColor = COLOR_CODES.info.color;

    document.getElementById("app").innerHTML = `
        <div class="base-timer">
            <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <g class="base-timer__circle">
                    <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
                    <path
                        id="base-timer-path-remaining"
                        stroke-dasharray="283"
                        class="base-timer__path-remaining ${remainingPathColor}"
                        d="
                        M 50, 50
                        m -45, 0
                        a 45,45 0 1,0 90,0
                        a 45,45 0 1,0 -90,0
                        "
                    ></path>
                </g>
            </svg>
            <span id="base-timer-label" class="base-timer__label">${formatTime(timeLeft)}</span>
        </div>
    `;

    startTimer();

    function onTimesUp() {
        clearInterval(timerInterval);
    }

    function startTimer() {
        timerInterval = setInterval(() => {
            timePassed = timePassed += 1;
            timeLeft = TIME_LIMIT - timePassed;
            document.getElementById("base-timer-label").innerHTML = formatTime(timeLeft);
            setCircleDasharray();
            setRemainingPathColor(timeLeft);

            if (timeLeft === 0) {
                onTimesUp();
                $.ajax({
                url: `toAddHistory.php?reservation_id=<?php echo $reservation_id;?>`,  
                type: 'GET',
                success: function (response) {
                    window.location.href = `survey.php`;
                    
                },
                error: function (xhr, textStatus, errorThrown) {
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while marking the reservation as done.',
                        icon: 'error',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                }
            });
                window.location.href = "survey.php";
            }
        }, 1000);
    }

    function formatTime(time) {
        const minutes = Math.floor(time / 60);
        const seconds = time % 60;
        return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    }

    function setRemainingPathColor(timeLeft) {
        const { alert, warning, info } = COLOR_CODES;
        if (timeLeft <= alert.threshold) {
            document.getElementById("base-timer-path-remaining").classList.remove(warning.color);
            document.getElementById("base-timer-path-remaining").classList.add(alert.color);
        } else if (timeLeft <= warning.threshold) {
            document.getElementById("base-timer-path-remaining").classList.remove(info.color);
            document.getElementById("base-timer-path-remaining").classList.add(warning.color);
        }
    }

    function calculateTimeFraction() {
        const rawTimeFraction = timeLeft / TIME_LIMIT;
        return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
    }

    function setCircleDasharray() {
        const circleDasharray = `${(calculateTimeFraction() * FULL_DASH_ARRAY).toFixed(0)} 283`;
        document.getElementById("base-timer-path-remaining").setAttribute("stroke-dasharray", circleDasharray);
    }
