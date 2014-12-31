<?php
//assign value for title of page
$pageTitle = 'About: Get Your Knowledge Card';
$subTitle = 'jason a. clark';
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
<head>
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
<body class="<?php if(!isset($_GET['view'])) { echo 'what'; } else { echo $_GET['view']; } ?>" role="document" vocab="http://schema.org/" typeof="WebPage">
<header>
<h1><?php echo($pageTitle); ?></h1>
<h2><?php echo($subTitle); ?></h2>
</header>
<div class="main">
<main role="main">
<h2 class="mainHeading">A responsive web design (rwd) form example</h2>
<p>This is a proof of concept form and teaching demo. The CSS and HTML shows how to responsively design a web form for the book, <i>Responsive Web Design (RWD) in Practice</i>.</p>
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
