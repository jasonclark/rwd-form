<?php
//assign value for title of page
$pageTitle = 'Get Your Knowledge Card';
$subTitle = '@YourLibrary';
//declare filename for additional stylesheet variable - default is "none"
$customCSS = 'master.css';
//create an array with filepaths for multiple page scripts - default is meta/scripts/global.js
$customScript[0] = 'none';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title><?php echo($pageTitle); ?> - jason a. clark</title>
<link rel="alternate" type="application/rss+xml" title="diginit - jason clark" href="http://feeds.feedburner.com/diginit" />
<?php if ($customCSS != 'none') {
?>
<link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/meta/styles/<?php echo $customCSS; ?>">
<?php
}
if ($customScript[0] != 'none') {
  $counted = count($customScript);
  for ($i = 0; $i < $counted; $i++) {
   echo '<script type="text/javascript" src="'.$customScript[$i].'"></script>'."\n";
  }
}
?>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body class="<?php if(!isset($_GET['view'])) { echo 'home'; } else { echo $_GET['view']; } ?>" role="document" vocab="http://schema.org/" typeof="WebPage">
<header role="banner" property="name description">
<h1><?php echo($pageTitle); ?></h1>
<h2><?php echo($subTitle); ?></h2>
</header>
<div class="main">
<main role="main">
<?php
//turn on full error reports for development - REMOVE when in production
//error_reporting(E_ALL);

if (isset($_POST['passField']) && trim($_POST['passField']) != ''):
?>
  <h2>Thanks for posting a general inquiry, ROBOT. Please, go die in a fire!</h2>
<?php
elseif (isset($_POST['submitCheck']) && $_POST['submitCheck'] == 1):

  $subject = 'Request Library Card';
  $name = isset($_POST['name']) ? htmlentities(strip_tags($_POST['name'])) : null;
  $email = isset($_POST['email']) ? htmlentities(strip_tags($_POST['email'])) : null;
	$birthday = isset($_POST['birthday']) ? htmlentities(strip_tags($_POST['birthday'])) : null;


	//declare invalid characters
	$badCharacters = "#%*&:;^\/|<>{}";
	//validate name, email, and birthdate fields for invalid characters
	if (preg_match("/[$badCharacters]/", $_POST['name']) || preg_match("/[$badCharacters]/", $_POST['email']) || preg_match("/[$badCharacters]/", $_POST['birthdate'])) {
		echo '<h2>These characters are not allowed or are invalid.</h2>'."\n";
		echo '<p>Return to the <a name="back" id="back" href="'.htmlentities(strip_tags(basename(__FILE__))).'">contact form</a>.</p>';
		exit();
	}

  $mailto = 'jaclark@montana.edu';
  //$mailto = 'ENTER-YOUR-LIBRARY-CONTACT-EMAIL-HERE';
	echo '<p>Thanks for signing up for a library card, <strong>'.$name.'</strong>.</p>'."\n";
	echo '<p>We\'ll be in touch when the card is ready.</p>'."\n";

	// build the email message string
	$body = "Name:\t$name\nE-mail:\t$email\nBirthday:\t$birthday\n\n";
	$headers = 'From: '.$email.' '. "\r\n" .
	'Reply-To: ' .$email.' '. "\r\n" .
	"$name" . ' requests a library card. Contact information is below.';
	mail($mailto, $subject, $body, $headers);

else:
?>
<form method="post" action="<?php echo htmlentities(strip_tags(basename(__FILE__))); ?>">
<input type="hidden" name="submitCheck" value="1" />
<span id="access">
  <label for="passField">omit field (bot test):</label>
  <input id="passField" name="passField" type="text" autofill="off" />
  <script>(function () { var e = document.getElementById("access"); e.parentNode.removeChild(e); })();</script>
</span>
<fieldset>
  <label for="name">Enter full name:</label>
  <input title="Enter full name" type="text" name="name" id="name" placeholder="full name" autofocus />
  <label for="email">Enter email:</label>
  <input title="Enter email" type="email" name="email" id="email" placeholder="email" />
  <label for="birthday">Enter birthday using YYYY-MM-DD format:</label>
  <input title="Enter birthday using YYYY-MM-DD format" type="text" pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" name="birthday" id="birthday" placeholder="birthdate (YYYY-MM-DD)" />
  <button type="submit" class="button">Sign me up</button>
</fieldset>
</form>
<?php
endif;
?>
</main>
</div><!--end .main div-->
<aside role="complementary">
<nav role="navigation">
<h3>Key:</h3>
  <a href="./index.php">Home</a>
  <a href="./what.php">What?</a>
  <a href="./code.php">Code</a>
  <a title="Bibliography by Suzanne Chapman (CC BY-NC-SA 2.0)" href="https://www.flickr.com/photos/sukisuki/4413551329/">Credit</a>
  <a href="http://twitter.com/jaclark" class="twitter">@jaclark</a>
</nav>
</aside>
</body>
</html>
