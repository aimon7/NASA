<!DOCTYPE html>
<html>
<head>
	<title>NASA Coordinates Input Page</title>
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
	<h1>NASA Rover Coordinates Input Page</h1>
	<p>You can find the GitHub repooritory and all files in <a href = "https://github.com/aimon7/NASA">here</a>

	<form action="rover_guide.php" method="POST">
		<div>
			<label for="coordinates">Upper-right coordinates: </label>
			<input type="text" name="coordinates" id="coordinates" placeholder="Write your coordinates with a space between them"><br>
		</div>
		<div>
			<button type="Submit">Submit</button>
		</div>
	</form>


</body>
</html>