<?php include 'navbar.php'; ?>

<div id="container">
    <div id="MyClockDisplay" class="clock" onload="showTime()"></div>

    <div id="timeZone"></div>
</div>

<script>
    function showTime() {
        let date = new Date();
        let h = date.getHours(); // 0 - 23
        let m = date.getMinutes(); // 0 - 59
        let s = date.getSeconds(); // 0 - 59



        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        let time = h + ":" + m + ":" + s + " ";
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;


        setTimeout(showTime, 1000);

    }
    document.getElementById("timeZone").innerHTML = "Time Zone: " + Intl.DateTimeFormat().resolvedOptions().timeZone;

    showTime();
</script>

<style>
    body {
        background: black;
    }

    .clock {

        transform: translateX(-50%) translateY(-50%);
        color: #17D4FE;
        font-size: 120px;
        font-family: Orbitron;
        letter-spacing: 7px;



    }

    #timeZone {

        color: #17D4FE;
        font-size: 20px;
        font-family:Arial, Helvetica, sans-serif;
        transform: translateX(-50%) translateY(-50%);
        text-align: center;

    }

    #container {
        position: absolute;
        top: 50%;
        left: 50%;





    }
</style>