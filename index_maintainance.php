<?php
// index.php - T20 Maintenance Page
http_response_code(503);
header("Retry-After: 3600");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>T20 Match - Maintenance</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:linear-gradient(135deg,#0f172a,#1e293b,#334155);
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    text-align:center;
    padding:20px;
}

.container{
    max-width:650px;
    width:100%;
    background:rgba(255,255,255,.08);
    padding:50px 40px;
    border-radius:16px;
    backdrop-filter:blur(10px);
    box-shadow:0 20px 40px rgba(0,0,0,.35);
}

.icon{
    font-size:70px;
    margin-bottom:20px;
}

h1{
    font-size:50px;
    color:#38bdf8;
    margin-bottom:10px;
}

h2{
    margin-bottom:20px;
}

p{
    color:#dbeafe;
    line-height:1.8;
    font-size:18px;
}

.countdown{
    margin:35px 0;
    display:flex;
    justify-content:center;
    gap:15px;
    flex-wrap:wrap;
}

.box{
    width:110px;
    padding:15px;
    background:rgba(255,255,255,.12);
    border-radius:10px;
}

.box span{
    display:block;
    font-size:36px;
    font-weight:bold;
    color:#38bdf8;
}

.box small{
    color:#ddd;
    text-transform:uppercase;
}

.live-time{
    margin-top:20px;
    color:#94a3b8;
    font-size:15px;
}

.footer{
    margin-top:30px;
    color:#94a3b8;
    font-size:14px;
}
</style>

</head>
<body>

<div class="container">

    <div class="icon">🛠️</div>

    <h1>T20 Match</h1>

    <h2>We're Under Maintenance</h2>

    <p>
        We're working hard to improve your experience.
        Our website will be back online on
        <strong>Wednesday at 5:00 PM (IST)</strong>.
    </p>

    <div class="countdown">
        <div class="box">
            <span id="days">0</span>
            <small>Days</small>
        </div>

        <div class="box">
            <span id="hours">0</span>
            <small>Hours</small>
        </div>

        <div class="box">
            <span id="minutes">0</span>
            <small>Minutes</small>
        </div>

        <div class="box">
            <span id="seconds">0</span>
            <small>Seconds</small>
        </div>
    </div>

    <div class="live-time">
        Website Launch: <strong>Wednesday, 5:00 PM IST</strong>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> T20 Match. All Rights Reserved.
    </div>

</div>

<script>
// Next Monday 5:00 PM IST
const target = new Date("2026-08-19T17:00:00+05:30").getTime();

function countdown() {

    const now = new Date().getTime();
    const diff = target - now;

    if(diff <= 0){
        document.querySelector(".countdown").innerHTML =
            "<h2 style='color:#4ade80'>🎉 Website is Live!</h2>";
        return;
    }

    const days = Math.floor(diff/(1000*60*60*24));
    const hours = Math.floor((diff%(1000*60*60*24))/(1000*60*60));
    const minutes = Math.floor((diff%(1000*60*60))/(1000*60));
    const seconds = Math.floor((diff%(1000*60))/1000);

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;
}

countdown();
setInterval(countdown,1000);
</script>

</body>
</html>