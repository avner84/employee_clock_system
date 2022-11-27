<?php include 'navbar.php';?>

<div class=main>

	<div id="timerArea">0:00</div>

	<div class="threeButtons">
		<div id="addClassic" class="oneThird">+ 25 mins</div>
		<div id="addTen" class="oneThird">+ 10 MINS</div>
		<div id="addFive" class="oneThird">+ 5 MINS</div>
		<div id="addOne" class="oneThird"> + 1 MINS</div>
	</div>
	<div id="startButton" class="button">Start </div>
	<div id="stopButton" class="button">Stop </div>
	<div id="resetButton" class="button">Reset </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	$("#stopButton").hide();
$(document).ready(function () {
	//basic variables
	let m = 0, // time in minutes
		s = 0, // seconds counter
		seconds = 60, // seconds per minute
		duration = 1000, // interval timer 1000 = 1 second
		timeSet = 0, // variable to handle time remaining
		started = false; // check if timer has started
	//$("#stopButton").hide();
	var snd = new Audio(
		"data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU="
	);

	// resets the timer to 0, removes the formatting and reinstates the hidden buttons
	$("#resetButton").click(function () {
		$("#timerArea").text("0:00");
		$("#timerArea").css("font", "140px/180px Roboto, sans-serif");
		$("#timerArea").css("background-color", "#222");
		$(".threeButtons").show();
		$("#startButton").show();
		$("#stopButton").hide();

		started = false;
		m = 0;
		s = 0;
		timeSet = 0;
	});

	// adding time to the timer
	$("#addClassic").click(function () {
		m += 25;
		$("#timerArea").text(m + ":00");
	});
	$("#addTen").click(function () {
		m += 10;
		$("#timerArea").text(m + ":00");
	});
	$("#addFive").click(function () {
		m += 5;
		$("#timerArea").text(m + ":00");
	});
	$("#addOne").click(function () {
		m += 1;
		$("#timerArea").text(m + ":00");
	});

	$("#startButton").click(function () {
		timeSet = m * seconds; //set countdown to total seconds

		if (timeSet > 0 && started != true) {
			started = true;
			$("#stopButton").show();
			$("#startButton").hide();
			$("#resetButton").hide();
			x = setInterval(function () {
				timeSet--;
				s--;
				if (s <= -1) {
					m--;
					s = seconds - 1;
				}
				if (s < 10) {
					$("#timerArea").text(m + ":0" + s);
				} else {
					$("#timerArea").text(m + ":" + s);
				}

				$("#stopButton").click(function () {
					clearInterval(x);
					$("#startButton").show();
					$("#resetButton").show();
					$("#stopButton").hide();
					started = false;
				});

				if (timeSet <= 0) {
					clearInterval(x);
					//update buttons and Timer Area
					$("#timerArea").text("TOMATO!");
					$("#timerArea").css("font", "100px/180px Roboto, sans-serif");
					$("#timerArea").css("background-color", "Tomato");
					$(".threeButtons").hide();
					$("#startButton").hide();
					$("#stopButton").hide();
					$("#resetButton").show();
					snd.play();
					setTimeout(function(){ alert("Time is up") }, 100);
					
				}
			}, duration);
		}
	});
});


</script>

<style>
  

body {
	background: #222;
}
.main {
	margin: 0 auto;
	width: 500px;
	min-width: 25%;
	max-width: 95%;
	max-height: 100vh;
    padding-top: 50px;
    user-select: none;
}
.button,
.oneThird {
	border-radius: 20px;
	text-transform: uppercase;
	text-align: center;
}

.button,
#timerArea {
	font: 30px/80px Roboto;
	color: #fff;
	width: 100%;
	margin: 10px auto;
	border: none;
	display: block;
}
.mid {
}
.button {
	background: tomato;
}
.oneThird {
}
#timerArea {
	font: 140px/180px Roboto, sans-serif;
	text-align: center;
}
.hidden {
	visibility: none;
}
.threeButtons {
	display: flex;
	justify-content: space-between;
	flex-direction: row;
	gap: 10px;

	font: 16px Roboto, sans-serif;
	font-weight: 600;
	color: #fff;
	width: 100%;
}

.oneThird {
	padding: 16px 0;
	flex-grow: 1;
	background: AliceBlue;
	color: #222;
    cursor: pointer;
}

.button:hover {
    cursor: pointer;
	background: SeaGreen;
}
.oneThird:hover {
	background: DarkSeaGreen;
}
.grey,
.grey:hover {
	background: #222;
}

</style>