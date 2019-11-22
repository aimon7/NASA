<!DOCTYPE html>
<html>
<head>
	<title>NASA Rover Output Page</title>
	<style type="text/css">
		
	</style>
</head>
<body>
	<h1>NASA Rover Output Page</h1>

	<div>
		The first rover went to: <?php 
			echo $_POST["firstRover"];
		 ?>
	</div>
	<div>
		The second rover went to: <?php 
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
			echo $xRover." ".$yRover." ".$orientation;
		 ?>
	</div>


</body>
</html>