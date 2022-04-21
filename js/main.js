// Thiet lap ngay ket thuc dem nguoc
var launchDate = new Date("Jul 7, 2022 00:00:00").getTime();

// Bo dem thoi gian danh dau sau moi 1 giay
var timer = setInterval(tick, 1000);

function tick() {
    // lay thoi gian hien tai
    var now = new Date().getTime();

    // do chenh lech thoi gian
    var distance = launchDate - now;

    if (distance > 0) {
        var days = Math.floor(distance / (24 * 60 * 60 * 1000));
        if (days < 10) {
            days = "0" + days;
        }
        document.getElementById('days').innerHTML = days;

        var hours = Math.floor((distance % (24 * 60 * 60 * 1000)) / (60 * 60 * 1000));
        if (distance < 10) {
            distance = "0" + distance;
        }
        document.getElementById('hours').innerHTML = hours;

        var minutes = Math.floor((distance % (60 * 60 * 1000)) / (60 * 1000));
        if (minutes < 10) {
            minutes = "0" + minutes;
        }
        document.getElementById('minutes').innerHTML = minutes;

        var seconds = Math.floor((distance % (60 * 1000)) / 1000);
        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        document.getElementById('seconds').innerHTML = seconds;
    }
}