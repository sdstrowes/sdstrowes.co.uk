<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>indyref polling</title>
	<link rel="stylesheet" href="/style.css">
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<?php include( "../../ga.js" ) ?>
</head>

<body>

<div class="container-fixed">

<?php include( "../../header.html" ) ?>

<div>

<h1>2014 scottish independence referendum, polling results</h1>

<p>For these plots, I've chosen the recurring polling agencies from the beginning
of July. The margin of error shown in these plots represents a 95% confidence
level against the size of the population per poll; most polls have a sample of
around 1,000 people.</p>

<p>The data used to generate these plots is <a
href="https://github.com/sdstrowes/indyref">available on github</a>. I initially pulled
this data together on September 13th, 2014, to help myself better
understand the headlines. I've updated right up to the polls released on September 17th. There are some instances where tables hadn't been published yet, but I took the headline numbers from <a
href="http://whatscotlandthinks.org/">What Scotland Thinks</a>.</p>

<p>If you have comments, feel free to get in touch on twitter; I'm <a
href="https://twitter.com/sdstrowes">@sdstrowes</a>.</p>

<h2>yes trend:</h2>

<p><img src="plots/all-yesses.png" /></p>

<h2>no trend:</h2>

<p><img src="plots/all-noes.png" /></p>

<h2>individual polling agencies</h2>

<h3>ICM:</h3>
<p><img src="plots/icm.png" /></p>

<h3>Panelbase:</h3>
<p><img src="plots/panelbase.png" /></p>

<h3>Survation:</h3>
<p><img src="plots/survation.png" /></p>

<h3>TNS-BMRB:</h3>
<p><img src="plots/tns-bmrb.png" /></p>

<h3>YouGov:</h3>
<p><img src="plots/yougov.png" /></p>

</div>

<?php include( "../../copyright.html" ) ?>

</div>

</body>
</html>

