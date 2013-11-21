<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Demo Class Validate</title>
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-10">

	<?php
	// Setting up Error Variable
	$error = "";
	if ( isset( $_POST["action"] ) && $_POST["action"]=="submitted" ) {
		// Setting up the Class
		require("../class.validate.php");
		$validate = New Validate("ITA");
		// Exec the validation on String
		$error .= $validate->String( $_POST["string"], "String", true);
		$error .= $validate->String( $_POST["string2"], "String 2", true, 2, 10);
		// Exec the validation on Numeric
		$error .= $validate->Numeric( $_POST["numeric"], "Numeric", true);
		// Exec the validation on Email
		$error .= $validate->Email( $_POST["email"], "Email", true);
	}
	?>

	<?php if ( strlen( $error )>0 ) { ?>
		<div class="alert-danger p-10 mb-10"><?php echo $error; ?></div>
	<?php } ?>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<input type="hidden" name="action" value="submitted">

		<!-- STRING FORM -->
		<div class="row">
			<div class="span2">
				<label for="string">String</label>
			</div>
			<div class="span10">
				<input type="text" name="string" placeholder="Insert a string value" />
			</div>
		</div>
		<!-- /STRING FORM -->

		<!-- STRING 2 FORM -->
		<div class="row">
			<div class="span2">
				<label for="string2">String (length 2/10)</label>
			</div>
			<div class="span10">
				<input type="text" name="string2" placeholder="Insert a string value" />
			</div>
		</div>
		<!-- /STRING 2 FORM -->

		<!-- NUMERIC FORM -->
		<div class="row">
			<div class="span2">
				<label for="numeric">Numeric</label>
			</div>
			<div class="span10">
				<input type="text" name="numeric" placeholder="Insert a numeric value" />
			</div>
		</div>
		<!-- /NUMERIC FORM -->

		<!-- EMAIL FORM -->
		<div class="row">
			<div class="span2">
				<label for="email">Email</label>
			</div>
			<div class="span10">
				<input type="text" name="email" placeholder="Insert a Email value" />
			</div>
		</div>
		<!-- /EMAIL FORM -->

		<input type="submit" value="submit" class="btn" />
	</form>
	
</div>

	
</body>
</html>