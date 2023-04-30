<?php
if (session_id() == "") {
    session_start();
}
if (!isset($_SESSION['user'])) {
    session_destroy();
    echo '<script>alert("You are not logged in!");
    window.location = "login.php";
    </script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Clock</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/79a2e49394.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
    .fas {
        color: #392759;
    }
    .buttonbg {
        background-color: #392759;
        color: white;
    }
    .buttonbg:hover {
      background-color: #523F73;
      color: white;
    }
    .linklabel {
        color: black;
        font-weight: 500;
    }
    body {
        font-family: 'Poppins', sans-serif;
    }
    .profileimage {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        margin: auto;
        margin-bottom: 10px;
    }
    .sidebar-profile {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        text-align: center;
    }
    .bgcolor {
        background-color: #E8F0FF;
    }
    .pinkbgcolor {
        background-color: #F7ACCF;
        margin-right: 10%;
        margin-left: 10%;
    }



/* clock */

      /* Set the default tab to Timer and show its content */
      #timer {
        display: block;
      }
      
      /* Hide the Stopwatch tab content */
      #stopwatch {
        display: none;
      }
  
      .tab {
        overflow: hidden;
        background-color: #74768c;
        border-radius: 10px 10px 0 0;
        display: flex;
        width: 100%;
      }

      .tab button {
        background-color: #74768c;
        color:#f1f1f1;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        width: 100%;
        border-radius: 10px 10px 0 0;
      }
      #timer {
        text-align: center;
      }

      #stopwatch {
        text-align: center;
      }
  
      .tab button:hover {
        background-color: #ddd;
      }
  
      /* Set the Timer button as active */
      .tab button.active {
        background-color: #7251ad;
        color: #f1f1f1;
      }
  
      .container-ts {
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.25);
        margin: auto;
        padding: 20px;
        background-color: #392759;
        color: #f1f1f1;
      }
  
      .tabcontent {
        text-align: center;
        margin-top: 20px;
      }
  
      .input-field {
        font-size: 20px;
        width: 50px;
        text-align: center;
        margin: 0 5px;
        border-radius: 20px;
        background-color: #e8f0ff;
      }
  
      .timer-buttons button {
        font-size: 14px;
        padding: 8px 12px;
        margin: 0 5px;
      }
  
      .countdown {
        font-size: 60px;
        margin-top: 30px;
      }


      .timer-sw-start {
        background-color: #6874e8;
        border: none;
        color: white;
        padding: 12px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 50px;
      }

      .timer-sw-start:hover {
        background-color: #D6185A;
        color: white;
      }

      .timer-sw-reset {
        background-color: #d99ab7;
        border: none;
        color: white;
        padding: 12px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 50px;
      }

      .timer-sw-reset:hover {
        background-color: #D6185A;
        color: white;
      }

/* pomodoro timer */


      .container-p {
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.25);
        margin: auto;
        padding: 20px;
        background-color: #6874e8;
        color: #f1f1f1;
      }

      .tabs {
        overflow: hidden;
        background-color: #74768c;
        border-radius: 10px 10px 0 0;
        display: flex;
        width: 100%;
      }

      .tablinks2 {
        background-color: #74768c;
        color:#f1f1f1;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        width: 100%;
        border-radius: 10px 10px 0 0;
      }

      .tablinks2.active {
        background-color: #394188;
        color: #f1f1f1;
      }

      .tabcontent2 {
        display: none;
        padding: 20px;
        text-align: center;
      }

      .tabcontent2.show {
        display: block;
      }


      .timer-pomo-start {
        background-color: #392759;
        border: none;
        color: white;
        padding: 12px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 50px;
      }

      .timer-pomo-start:hover {
        background-color: #D6185A;
        color: white;
      }

      .timer-pomo-reset {
        background-color: #d99ab7;
        border: none;
        color: white;
        padding: 12px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 50px;
      }

      .timer-pomo-reset:hover {
        background-color: #D6185A;
        color: white;
      }
      .countdown{
        font-size: 60px;
        margin-top: 30px;
      }
      

  </style>
</head>
<body class="bgcolor">
    <div class="container-fluid">
        <div class="row h-100">
          <!--NAVBAR START-->
          <nav class="d-lg-none navbar navbar-expand-lg bgcolor m-0">
            <div class="container-fluid">
              <a class="navbar-brand" href="Homepage.php">TaskLab</a>
              <button class="navbar-toggler buttonbg" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars p-2"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="Homepage.php">
                      <i class="fas fa-rectangle-list me-2"></i>
                      <span class="linklabel">Projects</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <i class="fas fa-clock me-2"></i>
                      <span class="linklabel">Clock</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="display.php">
                      <i class="fas fa-calendar-alt me-2"></i>
                      <span class="linklabel">Schedule</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="update_account.php">
                      <i class="fas fa-user-circle me-2"></i>
                      <span class="linklabel">Account</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                      <i class="fas fa-right-from-bracket me-2"></i>
                      <span class="linklabel">Logout</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!--NAVBAR END-->
          <!--SIDEBAR START-->
          <nav class="col-lg-2 d-lg-block d-none bgcolor"> <!--lg breakpoint : 992 px-->
            <div class="sidebar-profile">
              <img src="imguser.png" alt="User picture" class="profileimage mt-5">
              <h4 style="margin: auto; font-size: 20px; font-weight: bold;" class="mb-5">
                <?php echo $_SESSION['user']; ?>
              </h4>
            </div>
            <div class="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link active" href="Homepage.php">
                      <i class="fas fa-rectangle-list me-2"></i><span class="linklabel">Projects</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <i class="fas fa-clock me-2"></i><span class="linklabel">Clock</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="display.php">
                      <i class="fas fa-calendar-alt me-2"></i><span class="linklabel">Schedule</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="update_account.php">
                      <i class="fas fa-user-circle me-2"></i><span class="linklabel">Account</span>
                    </a>
                  </li>
                  <li class="nav-item mt-5">
                    <a class="nav-link" href="logout.php">
                      <i class="fas fa-right-from-bracket me-2"></i><span class="linklabel">Logout</span>
                    </a>
                  </li>
                </ul>
            </div>
          </nav>
          <!--SIDEBAR END-->
          <main class="col-lg-8 px-4 offset-lg-1 mb-5 maincontent">
            <div class="mt-5">
              <div class="container-ts col-md-6 col-lg-8 col-xl-5">
                <div class="tab">
                  <button class="tablinks active" onclick="openTab(event, 'timer')">Timer</button>
                  <button class="tablinks" onclick="openTab(event, 'stopwatch')">Stopwatch</button>
                </div>
              
                <div id="timer" class="tabcontent">
                  <h2>Timer</h2>
                  <input type="text" class="input-field" id="hours" placeholder="HH" maxlength="2" size="2" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                  <input type="text" class="input-field" id="minutes" placeholder="MM" maxlength="2" size="2" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                  <input type="text" class="input-field" id="seconds" placeholder="SS" maxlength="2" size="2" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                  
                  <br />
                  <p class="countdown" id="countdown">00:00:00</p>
                  <button class= "timer-sw-start" id="start-button" onclick="startTimer()">Start</button>
                 <button class= "timer-sw-reset" id="reset-button" onclick="resetTimer()">Reset</button>
               </div>

                
              
                <div id="stopwatch" class="tabcontent">
                  <h2>Stopwatch</h2>
                  <p id="stopwatch-display" class="countdown">00:00:00</p>
                  <button class= "timer-sw-start" id="start-button-sw" onclick="startStopwatch()">Start</button>
                  <button class= "timer-sw-reset" id="reset-button-sw" onclick="resetStopwatch()">Reset</button>
                </div>
              </div>
              <br>


              <div class="container-p col-md-6 col-lg-8 col-xl-5">
                <div class="tabs">
                  <button class="tablinks2 active" onclick="openPomoTimer(event, 'pomodoro', 25)" id="pomodoro-tab">
                    Pomodoro
                  </button>
                  <button class="tablinks2" onclick="openPomoTimer(event, 'short-break', 5)" id="short-break-tab">
                    Short Break
                  </button>
                  <button class="tablinks2" onclick="openPomoTimer(event, 'long-break', 15)" id="long-break-tab">
                    Long Break
                  </button>
                </div>
          
                <div id="pomodoro" class="tabcontent2 show">
                  <h2>Pomodoro Timer</h2>
                  <p class="countdown" id="pomodoro-timer">25:00</p>
                  <button class="timer-pomo-start" onclick="startPomoTimer('pomodoro-timer', 25)">Start</button>
                  <button class="timer-pomo-reset" onclick="resetPomoTimer('pomodoro-timer', 25)">Reset</button>
                </div>
                
                <div id="short-break" class="tabcontent2">
                  <h2>Short Break Timer</h2>
                  <p class="countdown" id="short-break-timer">5:00</p>
                  <button class="timer-pomo-start" onclick="startPomoTimer('short-break-timer', 5)">Start</button>
                  <button class="timer-pomo-reset" onclick="resetPomoTimer('short-break-timer', 5)">Reset</button>
                </div>
          
                <div id="long-break" class="tabcontent2">
                  <h2>Long Break Timer</h2>
                  <p class="countdown" id="long-break-timer">15:00</p>
                  <button class="timer-pomo-start" onclick="startPomoTimer('long-break-timer', 15)">Start</button>
                  <button class="timer-pomo-reset" onclick="resetPomoTimer('long-break-timer', 15)">Reset</button>
                </div>
              </div>

        
        
    </div>



<script>

var audio = new Audio('alarm-clock.mp3');

let timerInterval;
let timeLeft;
let stopwatchInterval;
let stopwatchTime = 0;

function startTimer() {
  try {
    const hours = parseInt(document.getElementById('hours').value) || 0;
    const minutes = parseInt(document.getElementById('minutes').value) || 0;
    const seconds = parseInt(document.getElementById('seconds').value) || 0;

    if (!hours && !minutes && !seconds) {
      throw new Error('Please enter a value for hours, minutes, or seconds.');
    }

    if (isNaN(hours) || isNaN(minutes) || isNaN(seconds)) {
      throw new Error('Please enter valid numbers for hours, minutes, and seconds.');
    }

    if (minutes > 59 || seconds > 59) {
      throw new Error('Please enter a value between 0 and 59 for minutes and seconds.');
    }

    const startButton = document.getElementById('start-button');
    const resetButton = document.getElementById('reset-button');

    if (startButton.textContent === 'Start') {
      startButton.textContent = 'Stop';
      resetButton.disabled = true;

      if (timerInterval) {
        clearInterval(timerInterval);
      }

      if (timeLeft > 0) {
        resumeTimer();
      } else {
        timeLeft = (hours * 60 * 60 + minutes * 60 + seconds) * 1000;
        displayTime();
        timerInterval = setInterval(() => {
          timeLeft -= 1000;
          if (timeLeft < 0) {
            stopTimer();
            audio.play();
            alert("Time's up!");
          } else {
            displayTime();
          }
        }, 1000);
      }
    } else {
      startButton.textContent = 'Start';
      resetButton.disabled = false;
      stopTimer();
    }
  } catch (error) {
    alert(error.message);
  }
}


function resumeTimer() {
  timerInterval = setInterval(() => {
    timeLeft -= 1000;
    if (timeLeft < 0) {
      stopTimer();
      audio.play();
      alert("Time's up!");
    } else {
      displayTime();
    }
  }, 1000);
}

function stopTimer() {
  clearInterval(timerInterval);
}

function resetTimer() {
  const countdown = document.getElementById("countdown");

  clearInterval(timerInterval);
  countdown.textContent = "00:00:00";
  timeLeft = 0;
}

function displayTime() {
  const hours = Math.floor(timeLeft / (1000 * 60 * 60)).toString().padStart(2, '0');
  const minutes = Math.floor((timeLeft / 1000 / 60) % 60).toString().padStart(2, '0');
  const seconds = Math.floor((timeLeft / 1000) % 60).toString().padStart(2, '0');
  document.getElementById('countdown').textContent = `${hours}:${minutes}:${seconds}`;
}

function formatTime(time) {
  return time.toString().padStart(2, '0');
}

let stopwatchStart = null;

function startStopwatch() {
  const stopwatchDisplay = document.getElementById("stopwatch-display");
  const startButtonSW = document.getElementById("start-button-sw");
  const resetButtonSW = document.getElementById("reset-button-sw");

  if (startButtonSW.textContent === "Start") {
    startButtonSW.textContent = "Stop";
    resetButtonSW.disabled = true;

    stopwatchStart = performance.now();
    stopwatchInterval = setInterval(() => {
      stopwatchTime = performance.now() - stopwatchStart;
      const minutes = Math.floor((stopwatchTime / 1000 / 60) % 60);
      const seconds = Math.floor((stopwatchTime / 1000) % 60);
      const milliseconds = Math.floor((stopwatchTime % 1000) / 10);
      stopwatchDisplay.textContent = `${formatTime(minutes)}:${formatTime(
        seconds
      )}:${formatTime(milliseconds)}`;
    }, 10);
  } else {
    startButtonSW.textContent = "Start";
    resetButtonSW.disabled = false;
    clearInterval(stopwatchInterval);
    stopwatchTime += performance.now() - stopwatchStart;
  }
}

function stopStopwatch() {
  clearInterval(stopwatchInterval);
}

function resetStopwatch() {
  const stopwatchDisplay = document.getElementById("stopwatch-display");
  stopwatchTime = 0;
  stopwatchDisplay.textContent = "00:00:00";
}

function formatTime(time) {
  return time.toString().padStart(2, "0");
}


function openTab(evt, tabName) {
  // Get all elements with class="tabcontent" and hide them
  let tabcontent = document.getElementsByClassName("tabcontent");
  for (let i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  let tablinks = document.getElementsByClassName("tablinks");
  for (let i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("active");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.classList.add("active");
}




	let intervalId;
		let remainingSeconds;
		let currentCycle = 0;
		const cycleList = ['pomodoro', 'short-break', 'pomodoro', 'long-break'];
		
    function startPomoTimer(id, minutes) {
  const timer = document.getElementById(id);
  const startButton = timer.nextElementSibling;
  const resetButton = startButton.nextElementSibling;
  remainingSeconds = minutes * 60;

  startButton.innerHTML = 'Stop';
  startButton.onclick = () => stopPomoTimer(startButton);

  resetButton.disabled = true; // disable reset button when timer starts

  // Disable the tabs when the countdown is running
  const pomodoroTab = document.getElementById('pomodoro-tab');
  const shortBreakTab = document.getElementById('short-break-tab');
  const longBreakTab = document.getElementById('long-break-tab');

  if (!intervalId) {
    pomodoroTab.disabled = true;
    shortBreakTab.disabled = true;
    longBreakTab.disabled = true;
  }

  intervalId = setInterval(() => {
    const remainingMinutes = Math.floor(remainingSeconds / 60);
    const seconds = remainingSeconds % 60;

    timer.innerHTML = `${remainingMinutes}:${seconds < 10 ? '0' : ''}${seconds}`;

    if (remainingSeconds === 0) {
      clearInterval(intervalId);
      audio.play();
      alert('Timer finished!');
      switchCycle();
      resetButton.disabled = false; // re-enable reset button when timer stops
    }

    remainingSeconds--;
  }, 1000);
}


function stopPomoTimer(button) {
  clearInterval(intervalId);
  const timer = button.previousElementSibling;
  const minutes = parseInt(timer.innerHTML.split(':')[0]);
  const resetButton = button.nextElementSibling;
  button.innerHTML = 'Start';
  button.onclick = () => startPomoTimer(timer.id, minutes);
  resetButton.disabled = false; // re-enable reset button when timer stops

  // Re-enable the tabs when the countdown stops
  const pomodoroTab = document.getElementById('pomodoro-tab');
  const shortBreakTab = document.getElementById('short-break-tab');
  const longBreakTab = document.getElementById('long-break-tab');

  pomodoroTab.disabled = false;
  shortBreakTab.disabled = false;
  longBreakTab.disabled = false;
}



function resetPomoTimer(id, minutes) {
  stopPomoTimer(document.getElementById(id).nextElementSibling);
  remainingSeconds = minutes * 60;
  document.getElementById(id).innerHTML = `${minutes}:00`;
  document.getElementById(id).nextElementSibling.innerHTML = 'Start';
  document.getElementById(id).nextElementSibling.onclick = () => startPomoTimer(id, minutes);
}
		
function openPomoTimer(event, timerType, minutes) {
  const tabcontent2s = document.getElementsByClassName('tabcontent2');
  for (let i = 0; i < tabcontent2s.length; i++) {
    tabcontent2s[i].classList.remove('show');
  }

  const tablinks2 = document.getElementsByClassName('tablinks2');
  for (let i = 0; i < tablinks2.length; i++) {
    tablinks2[i].classList.remove('active');
  }

  document.getElementById(timerType).classList.add('show');
  event.currentTarget.classList.add('active');

  if (timerType === 'pomodoro') {
    currentCycle = 0;
  } else if (timerType === 'short-break') {
    currentCycle = 1;
  } else {
    currentCycle = 3;
  }
}
		
		function switchCycle() {
		currentCycle = (currentCycle + 1) % cycleList.length;
		const nextTimerType = cycleList[currentCycle];
		const nextTimerMinutes = (nextTimerType === 'pomodoro') ? 25 : ((nextTimerType === 'short-break') ? 5 : 15);
		const nextTimerId = `${nextTimerType}-timer`;

		const tablinks2 = document.getElementsByClassName('tablinks2');
		for (let i = 0; i < tablinks2.length; i++) {
			tablinks2[i].classList.remove('active');
		}

		// hide previous timer
		const previousTimerType = cycleList[(currentCycle + cycleList.length - 1) % cycleList.length];
		document.getElementById(previousTimerType).classList.remove('show');

		// show new timer
		document.getElementById(nextTimerType).classList.add('show');
		document.getElementById(nextTimerId).innerHTML = `${nextTimerMinutes}:00`;
		document.querySelector(`button[onclick="openPomoTimer(event, '${nextTimerType}', ${nextTimerMinutes})"]`).classList.add('active');

		startPomoTimer(nextTimerId, nextTimerMinutes);
		}

    </script>
</body>
</html>