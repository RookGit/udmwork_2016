var sec;
function start() {
    setInterval("timer()", 1000);
}

function timer() {
    h = Math.floor(sec / 3600);
    if (h < 10)
        hz = "0";
    else
        hz = "";


    m = Math.floor(sec / 60 - h * 60);
    if (m < 10)
        mz = "0";
    else
        mz = "";

    s = Math.floor(sec - h * 3600 - m * 60);
    if (s < 10)
        sz = "0";
    else
        sz = "";


    $('#timer').text("Бонус через: " + hz + h + ":" + mz + m + ":" + sz + s);
    sec = sec - 1;

    if (sec < 0 || sec == 0)
        $('#timer').text("Получить бонус");

}



