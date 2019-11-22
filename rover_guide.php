<!DOCTYPE html>
<html>
<head>
	<title>NASA Guide Input Page for first rover</title>
	<style type="text/css">
		form {
		  /* Center the form on the page */
		  margin: 0 auto;
		  width: 700px;
		  /* Form outline */
		  padding: 1em;
		  border: 1px solid #CCC;
		  border-radius: 1em;
		}

		form div + div {
		  margin-top: 1em;
		}

		label {
		  /* Uniform size & alignment */
		  display: inline-block;
		  width: 140px;
		  text-align: right;
		}

		input, 
		textarea {
		  /* To make sure that all text fields have the same font settings
		     By default, textareas have a monospace font */
		  font: 1em sans-serif;

		  /* Uniform text field size */
		  width: 550px;
		  box-sizing: border-box;

		  /* Match form field borders */
		  border: 1px solid #999;
		}

		input:focus, 
		textarea:focus {
		  /* Additional highlight for focused elements */
		  border-color: #000;
		}

		textarea {
		  /* Align multiline text fields with their labels */
		  vertical-align: top;

		  /* Provide space to type some text */
		  height: 5em;
		}

		.button {
		  /* Align buttons with the text fields */
		  padding-left: 140px; /* same size as the label elements */
		}

		button {
		  /* This extra margin represent roughly the same space as the space
		     between the labels and their text fields */
		  margin-left: .5em;
		}
	</style>
</head>
<body>
	<h1>NASA Rover Guide Input Page for first rover</h1>

<!-- 	<?php 
		$coordinates = explode(" ", $_POST["coordinates"]);
		$x = $coordinates[0];
		$y = $coordinates[1];
		//echo $x." ".$y;
		$xO = 0;
		$yO = 0;

	 ?> -->

	<form action="rover_guide2.php" method="POST">
		<div>
			In order to control a rover, NASA sends a simple string of letters. The possible letters are 'L', 'R'and 'M'. 'L' and 'R' makes the rover spin 90 degrees left or right respectively, without movingfrom its current spot.'M' means move forward one grid point, and maintain the same heading.
		</div>
		<div>
			<label for="coordinates">Grid Coordinates</label>
			<input type="text" name="coordinates" id="coordinates" value="<?php 
				$coordinates = explode(" ", $_POST["coordinates"]);
				 echo $coordinates[0]." ".$coordinates[1];
			?>" readonly="readonly"><br>
		</div>
		<div>
			<label for="currentCords">Input the Coords that you want the first rover to start and the orientation of it</label>
			<input type="text" name="currentCords" id="currentCords" placeholder="Write only numbers between <?php 
				$coordinates = explode(" ", $_POST["coordinates"]);
				 echo "0 to ".$coordinates[0]." for X axis and 0 to ".$coordinates[1]. " for Y axis";
			?>"><br>
		</div>
		<div>
			<label for="guidance">Guidance Input</label>
			<input type="text" name="guidance" id="guidance" placeholder="Write your guidance (only accepltable L, R and M, max characters 100)" pattern="[LRM]{1,100}"><br>
		</div>
		<div>
			<button type="Submit">Submit</button>
		</div>
	</form>

</body>
</html>