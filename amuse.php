<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stephen D. Strowes</title>

	<style type="text/css">
.container-fixed
{
	width: 800px;
	margin: auto;
}
td.nowrap
{
        white-space:nowrap;
        vertical-align:top;
}

	</style>

	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<?php include( "./ga.js" ) ?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<div class="container-fixed">

<?php include( "./header.html" ) ?>

<div>

<h2>AMUSe</h2>

<h3>Autonomic Management of Ubiquitous Systems for e-Health</h3>

<p>September 2005 -- May 2007</p>

<p>Research Associate and lead software developer on the AMUSe
(Autonomic Management of Ubiquitous Systems in e-Health) project, an
EPSRC-funded collaborative project between University of Glasgow and
Imperial College London.</p>

<p>AMUSe concerned itself with demonstrating and exploring a
repeatable management architecture suitable for various environments,
from wireless personal-area networks controlled by a PDA, to
geographically distributed wide-area networks. This architecture
included integrated management components (policy and discovery
services) and mechanisms for delivering management content to
subscribers (event bus). These components combined create a
Self-Managed Cell (SMC), each instance of which has policies to allow
interactions with other SMCs.</p>

<p>Our primary usage scenario included hospital outpatients wearing sensors
in a personal-area network to constantly monitor their condition, these
sensors communicating with a central management component (perhaps as
powerful as a PDA) which monitors wireless components and collects
data. Patient SMCs interacted doctor SMCs, hospital SMCs,
etc. Interactions between these autonomous cells also formed a
substantial part of the project. My time on this project involved:</p>

<ul>

<li>Developing software required to run over these wireless
  systems. Development primarily in C/Java, with some JNI glue tying
  components together. Required the integration of disparate
  codebases: e.g., an in-house event bus and discovery system, a
  policy-based management system authored at Imperial College, and
  existing communication libraries (e.g., libbluetooth). Development
  across multiple hardware platforms was also required.</li>

<li>Authoring or second-authoring papers to a variety of venues on
  various aspects of the AMUSe project, and its solutions for ubiquitous
  systems.</li>

<li>Delivering a number of presentations, at workshops and regular
  group meetings.</li>

</ul>

<h3>HP iPAQ Linux information</h3>

<p>The following are potentially useful links for anybody running
Linux on their hx4700; I provide these almost as brain-dumps, or as
future reference for myself, in the hope that somebody else might find
them useful too.</p>

<ul>
<li><a href="http://sdstrowes.co.uk/amuse/JBlueZ_on_the_HP_iPAQ_hx4700.php">Running JBlueZ on the hx4700</a>.</li>
<li><a href="http://sdstrowes.co.uk/amuse/Kernel_compile_on_HP_iPAQ_hx4700.php">Kernel compilation for the hx4700</a>.</li>
<li><a href="http://sdstrowes.co.uk/amuse/CFU1U_on_HP_iPAQ_hx4700.php">Using the hx4700 as a USB host</a>.</li>
</ul>


</div>

<?php include( "./copyright.html" ) ?>

</div>

</body>

</html>
