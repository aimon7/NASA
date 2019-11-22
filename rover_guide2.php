<!DOCTYPE html>
<html>
<head>
	<title>NASA Guide Input Page for second rover</title>
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
	<h1>NASA Rover Guide Input Page for second rover</h1>

	<form action="rover_output.php" method="POST">
		<div>
			<?php 
				$coordinatesAndOrientation = explode(" ", $_POST["currentCords"]);
				$xRover = $coordinatesAndOrientation[0];
				$yRover = $coordinatesAndOrientation[1];
				$orientation = $coordinatesAndOrientation[2];
				$gridCoordinates = explode(" ", $_POST["coordinates"]);
				$xGrid = $gridCoordinates[0];
				$yGrid = $gridCoordinates[1];
				$guidance = $_POST["guidance"];
				for ($i=0; $i < strlen($guidance) ; $i++) { 
					//check what is the character
					//if it is L, the rover turns itself
					if ($guidance[$i] = "L") {
						if ($orientation = "N") {
							//it will go west
							$orientation = "W";
						} elseif ($orientation = "W") {
							//it will go south
							$orientation = "S";
						} elseif ($orientation = "S") {
							//it will go east
							$orientation = "E";
						} else {
							//it will go north
							$orientation = "N";
						}
					} elseif ($guidance[$i] = "R") {
						//if it is R, the rover turns itself again
						if ($orientation = "N") {
							//it will go east
							$orientation = "E";
						} elseif ($orientation = "E") {
							//it will go south
							$orientation = "S";
						} elseif ($orientation = "S") {
							//it will go west
							$orientation = "W";
						} else {
							//it will go north
							$orientation = "N";
						}
					} else {
						//Last it is the move, but we have to chech the orientation before the move
						if ($orientation = "N") {
							$yRover += 1;
						} elseif ($orientation = "S") {
							$yRover -= 1;
						} elseif ($orientation = "W") {
							$xRover -= 1;
						} else {
							$xRover += 1;
						}
						if ($yRover < 0 || $xRover < 0) {
							echo "You run out of the grid";
						}
					}
				}
				//echo "The First Rover is at: ".$xRover." ".$yRover." ".$orientation;
				echo "<label for=".chr(34)."firstRover".chr(34).">The First Rover is at:</label>";
				echo "<input type=".chr(34)."text".chr(34)." name=".chr(34)."firstRover".chr(34)." id=".chr(34)."firstRover".chr(34)." value=".chr(34).$xRover." ".$yRover." ".$orientation.chr(34)." readonly=".chr(34)."readonly".chr(34)."<br>";
				// $directions = explode("M", $_POST["guidance"]);
				// for ($i=0; $i < count($directions); $i++) { 
				// 	echo $directions[$i]."<br>";
				// }
				

			 ?>
		</div>
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
			<label for="currentCords">Input the Coords that u want the second rover to start and the orientation of it</label>
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