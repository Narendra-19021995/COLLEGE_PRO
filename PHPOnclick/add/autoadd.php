
<!DOCTYPE html>
<html>
<head>
<title>Create Dynamic form Using JavaScript</title>
<script src="form.js" type="text/javascript"></script>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main_content">
<!--
========================================================================================
Header Div.
========================================================================================
-->
<div class="first">
<p><a href="https://www.formget.com/app/"><img id="logo" src="logo.png">
</a> Online form builder.</p>
</div>
<!--
======================================================================================
This Div is for the Buttons. When user click on buttons, respective field will appear.
=======================================================================================
-->
<div class="two">
<h4>Frequently Used Form Fields</h4><button onclick="nameFunction()">Name</button>
<button onclick="emailFunction()">Email</button>
<button onclick="contactFunction()">Contact</button>
<button onclick="textareaFunction()">Message</button>
<button onclick="resetElements()">Reset</button>
</div>
<!--
========================================================================================
This Div is meant to display final form.
========================================================================================
-->
<div class="three">
<h2>Your Dynamic Form!</h2>
<form action="#" id="mainform" method="get" name="mainform">
<span id="myForm"></span>
<p></p><input type="submit" value="Submit">
</form>
</div>
<!--
========================================================================================
Footer Div.
========================================================================================
-->
<div class="four">
<p>2014 <a href="https://www.formget.com/app/"><img src="logo.png">
</a> All rights reserved.</p>
</div>
</div>
</body>
</html>
