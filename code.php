<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Stephen D. Strowes</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="http://www.sdstrowes.co.uk/style.css" type="text/css" media="all" />

	<?php include( "./ga.js" ) ?>

</head>

<body>

<?php include("./header.php")?>

<div id="content">

<h2>Source code</h2>

<p>Any source code released here is publicly available, and licensed
under a <a href="http://svn.sdstrowes.co.uk/LICENSE">BSD-style
license</a>. The source code itself is all available from <a
href="http://svn.sdstrowes.co.uk/">http://svn.sdstrowes.co.uk/</a>.</p>

<ul>

<!--<li><h3>Cisco BGP ASCII dump cleaner</h3></li>-->
<li><h3>Orta</h3>

<p>The overlay for real-time applications. A stand-alone peer-to-peer
library written in C, and designed primarily for use with the <a
href="http://mediatools.cs.ucl.ac.uk/nets/mmedia/wiki/RatWiki">Robust Audio
Tool</a>, a work of the <a
href="http://mediatools.cs.ucl.ac.uk/nets/mmedia/">UCL Network and
Multimedia Research Group</a>.</p>

<ul>
<li><a href="http://svn.sdstrowes.co.uk/orta/">SVN repository</a></li>

<li><a
href="http://sdstrowes.co.uk/publications/sdstrowes-orta.pdf">Technical
report describing the performance of the overlay</a>, written August
2005.</li>

</ul>
</li> <!-- /orta -->

<!--<li><h3>Network Simulator</h3>

<p>An AS-level graph simulator, written in <a
href="http://scala-lang.org">Scala</a>, intended to be widely distributed
across many commodity machines.</p>

</li>--> <!-- /network simulator -->

<li><h3>Scala fragments: Dijkstra's shortest-paths algorithm</h3>

<p><a href="http://en.wikipedia.org/wiki/Dijkstra's_algorithm">Dijkstra's
algorithm</a> is reasonably easy to implement, but it requires a priority
queue with priorities which can be modified efficiently. This is best
represented as a priority map, where the ordering of the elements is
based on priority, but indexing is based on the data stored.</p>

<p><em>PriorityMap</em> stores keys of any type, and orders them against
an integer priority. The interface is simple: items may be pushed into
the queue, or popped off the end of the queue. Pushing a key which is
already contained within the structure will reassign its priority. Lower
numbers indicate higher priority. These semantics are based on those
used by <a href="http://code.activestate.com/recipes/117228/">a very
similar priority dictionary for Python</a>.</p>

<ul>
<li><b><a
href="http://svn.sdstrowes.co.uk/util/PriorityMap.scala">PriorityMap.scala</a></b>:
The PriorityMap provides efficient (<em>O</em>(log <em>n</em>))
insertions, removals, and reassignments. This may be useful stand-alone,
but is required by this implementation of Dijkstra's algorithm.</li>

<li><b><a
href="http://svn.sdstrowes.co.uk/util/Dijkstra.scala">Dijkstra.scala</a></b>:
An implementation of Dijkstra's algorithm, and a test harness to load a
graph and perform the algorithm from an arbitrary starting
point. Integers are used as node identifiers, and so are stored as keys
in the PriorityMap. Input is read from <em>stdin</em>, and the first two
fields of each line must be integers. Other fields in each line are
ignored. Usage is of the form: <ul><li><b>cat <a
href="http://svn.sdstrowes.co.uk/util/Dijkstra.input">Dijkstra.input</a> |
scala com.sdstrowes.DijkstraTest</b></li></ul></li>

<li><b><a href="http://svn.sdstrowes.co.uk/util/AllPairs.scala">AllPairs.scala</a></b> As an example of
how simple it is to parallelise some Scala code, Dijkstra's algorithm
works <em>extremely</em> well. <em>AllPairs</em> accepts a graph in the
same format as above, and computes Dijkstra from <em>every</em> location,
storing the results in a triangular array of distances (since the
distances are symmetric). <em>AllPairs</em> will spawn as many threads as
the operating system reports cores. Usage is of the form: <ul><li><b>cat
<a href="http://svn.sdstrowes.co.uk/util/Dijkstra.input">Dijkstra.input</a> | scala
com.sdstrowes.AllPairs</b></li></ul></li>

</ul>

</li> <!-- /dikstra -->



</ul> <!-- Main page list -->

</div> <!-- /content -->

<?php include( "../sdstrowes.co.uk/copyright.php" ) ?>

</body>
</html>
