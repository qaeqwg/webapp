<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php

		if (!isset($_GET["name"]) || !isset($_GET["id"]) || !isset($_GET["check"]) || !isset($_GET["grade"]) || !isset($_GET["cardnum"]) || !isset($_GET["card"])){ ?>
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely.<a href="gradestore.html">Try again?</a></p> <?php
		}
		else { ?>
		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>
		-->

		<?php
		if (!preg_match("/^[a-zA-Z]+(([',. -])?[a-zA-Z]*)*$/", $_POST["name"])) { ?>
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely.<a href="gradestore.html">Try again?</a></p> <?php
		}
		else if (!preg_match("/^[4|5]+[0-9]{15}*)*$/", $_POST["cardnum"])) { ?>
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely.<a href="gradestore.html">Try again?</a></p> <?php
		}
		else { ?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->
		<ul>
			<li>Name:<?= $_GET["name"]?></li>
			<li>ID:<?= $_GET["id"]?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course:<?=processCheckbox($_GET["check"]);
			 ?></li>
			<li>Grade:<?= $_GET["grade"]?></li>
			<li>Credit:<?= $_GET["card"]?></li>
		</ul>

		<p>Here are all the loosers who have submitted here:</p>
		<?php
			$filename = "loosers.txt";
			$new_text = $_POST["name"] . ";" . $_POST["id"] . ";" . $_POST["cardnum"] . ";" . $_POST["card"] . "\n";
			file_put_contents($filename, $new_text, FILE_APPEND);
			$text = file_get_contents($filename);

		?>
		<pre><?= $text ?> </pre>


		<?php
		 }
	 }
		?>
		<?php
			 function processCheckbox($names){
	 			$boxs = $names;
	 			for ($i = 0; $i < count($boxs); $i++) {
	 				if ($i == (count($boxs)-1)) print $boxs[$i];
					else print $boxs[$i] . ",";
	 			}
	 		}
		?>

	</body>
</html>
