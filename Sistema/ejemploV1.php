<html><head>

<title>JavaScript Index</title>

<script language="JavaScript">

<!-- Helpers for JSI page...

// Navigation - Start

function goback(){

alert("Good Bye!");

history.go(-1);

}

function gettheDate() {

Todays = new Date();

TheDate = "" + (Todays.getMonth()+ 1) +" / "+ Todays.getDate() + " / " + (Todays.getYear() + 1900) 

document.clock.thedate.value = TheDate;

}

// Navigation - Stop

// Netscapes Clock - Start

// this code was taken from Netscapes JavaScript documentation at

// www.netscape.com on Jan.25.96



var timerID = null;

var timerRunning = false;

function stopclock (){

	if(timerRunning)

		clearTimeout(timerID);

	timerRunning = false;

}



function startclock () {

	// Make sure the clock is stopped

	stopclock();

	gettheDate()

	showtime();

}



function showtime () {

	var now = new Date();

	var hours = now.getHours();

	var minutes = now.getMinutes();

	var seconds = now.getSeconds()

	var timeValue = "" + ((hours >12) ? hours -12 :hours)

	timeValue += ((minutes < 10) ? ":0" : ":") + minutes

	timeValue += ((seconds < 10) ? ":0" : ":") + seconds

	timeValue += (hours >= 12) ? " P.M." : " A.M."

	document.clock.face.value = timeValue;

	// you could replace the above with this

	// and have a clock on the status bar:

	// window.status = timeValue;

	timerID = setTimeout("showtime()",1000);

	timerRunning = true;

}

// Netscapes Clock - Stop



// end Helpers -->

</script>

</head>



<body bgcolor="#00FFFF" onload="startclock()">





<center>



<h2>Esto es un reloj hecho con JavaScript</h2>



<table border="">

<tbody><tr>

   <td><form name="clock" onsubmit="0"></form></td>

</tr>



<tr>

   <td colspan="2">Hoy es: <input type="text" name="thedate" size="12" value=""></td>

   <td colspan="2">La hora es: <input type="text" name="face" size="12" value=""></td>

</tr>





</tbody></table>

</center>



<hr>
<center>
<h3>
[<a href="javascr.htm">Volver</a>]
</h3>
</center>







</body></html>