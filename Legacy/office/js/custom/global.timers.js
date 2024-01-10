// JavaScript Document
/*	


*/
$(function() {

    console.log('Global Timers Loaded Don not forget about this');

    $('span#created_ago').each(function() {
        var created_at = $(this).html();

        $(this).countdowntimer({

        });

        console.log(created_at);
        //return;			

    });

    /* 
        $('#future_date').countdowntimer({
            dateAndTime: "2016/01/01 00:00:00",
            size: "lg"
        });
     */







});


// Start Added 12/11/2019
// Javascript

var ms = 0,
    s = 0,
    m = 0;
var timer;

var stopwatchEl = document.querySelector('.stopwatch');
var lapsContainer = document.querySelector('.laps');


function start() {

    if (!timer) {
        timer = setInterval(run, 10);
    }

}

function run() {
    stopwatchEl.textContent = getTimer();
    ms++;
    if (ms == 100) {
        ms = 0;
        s++;
    }
    if (s == 60) {
        s = 0;
        m++;
    }
}


function pause() {
    stopTimer();
}

function stop() {
    stopTimer();
    timer = false;
    ms = 0;
    s = 0;
    m = 0;
    stopwatchEl.textContent = getTimer();
}

function stopTimer() {
    clearInterval(timer);
    timer = false;
}

function getTimer() {
    return (m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s) + ":" + (ms < 10 ? "0" + ms : ms);
}

function restart() {
    stop();
    start();

}

function lap() {
    if (timer) {
        var li = document.createElement('li');
        li.innerText = getTimer();
        lapsContainer.appendChild(li);
    }

}

function resetLaps() {
    lapsContainer.innerHTML = '';
}





$(document).ready(function() {








    function countDown() {
        var today = new Date();
        var eventDate = new Date("December 31, 2019 11:59:59");

        var currentTime = today.getTime();
        var eventTime = eventDate.getTime();

        var remTime = eventTime - currentTime;

        var sec = Math.floor(remTime / 1000);
        var minute = Math.floor(sec / 60);
        var hrs = Math.floor(minute / 60);
        var days = Math.floor(hrs / 24);

        hrs = hrs % 24;
        minute %= 60;
        sec %= 60;

        hrs = (hrs < 10) ? "0" + hrs : hrs;
        minute = (minute < 10) ? "0" + minute : minute;
        sec = (sec < 10) ? "0" + sec : sec;
        days = (days < 10) ? "0" + days : days;

        document.getElementById("days").innerHTML = days;
        document.getElementById("hrs").innerHTML = hrs;
        document.getElementById("minute").innerHTML = minute;
        document.getElementById("sec").innerHTML = sec;

        if (today >= eventDate) {
            console.log('Caught it 1');
            clearInterval(myVar);
            myVar = false;

            console.log('Caught it today: ' + today);
            console.log('Caught it eventDate: ' + eventDate);

            document.getElementById("days").innerHTML = 00;
            document.getElementById("hrs").innerHTML = 00;
            document.getElementById("minute").innerHTML = 0;
            document.getElementById("sec").innerHTML = 00;
            return false;

        }



        var myVar = setTimeout(countDown, 1000);



    }



    //countDown();

    //countUp();

    function countDownCut() {
        clearInterval(myVar);
        myVar = false;
    }









});
// End Added 12/11/2019