<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <title>Stephen D. Strowes :: Fundamental Comp Sci concepts for schools</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" href="http://www.sdstrowes.co.uk/style.css" type="text/css" media="all" />

	<?php include( "./ga.js" ) ?>

</head>

<body>

<?php include( "./header.php" ) ?>

<div id="content">

<h2>Thinking Skills for Schools</h2>

<p>This project involved the generation of off-line materials for
teaching computing concepts to young children</p>

<p>The work was part of a larger project undertaken during the summer
months of 2004. I headed a team of 5 students in the creation of
worksheets for an ongoing research project being carried out within
the department as part of a number of ongoing efforts to understand
and tackle the dramatic drop in the number of students taking
computing science at University.</p>

<p>The project proposal itself outlined seven main modules to cover, those being:</p>
<ol>
        <li>Algorithms</li>
        <li>Programming</li>
        <li>Engineering Software</li>
        <li>Concurrency</li>
        <li>Systems Internals</li>
        <li>Distribution</li>
        <li>Long-lived systems</li>
</ol>

<p>Modules 1 and 2 had a reasonable bulk of material behind them
before the start of the summer. The goal of our summer work was to
create worksheets for modules 3, 4, 5 and 6.</p>

<p>Each module consists of a number of worksheets, ideally not taking
more than 1 hour to complete. The initial target age range for all
worksheets was 10 - 12 years old, placing our target group at the end
of primary education, and the start of secondary education.</p>

<p>While the idea of worksheets teaching computing concepts to
children might seem strange initially, the decision was taken early on
that this was an achievable goal. The requirement of paper based
worksheets allows for a teacher to keep control of the class, whereas
they might not be so comfortable controlling a class during a computer
based exercise. Some of the simpler concepts are then immediately
teachable to children, once the connection is made that some of the
thought processes involved in Computing Science or Software
Engineering are used in everyday situations, by all of us. For
example, Algorithms and Programming is all about rule following and
being precise with instructions, etc. Engineering Software focussed on
capturing requirements (list building), testing, etc.</p>

<p>Many of the worksheets created were evaluated in local primary
schools, with small groups of children. This allows us to guage
clearly how close we are to the target age range in terms of language
used, and also that we are not filling the sheets with too much
jargon, or indeed making the sheets too difficult for too many
pupils.</p>

<p>The spirit of this work lives on, and for current information
please visit the <a href="http://csi.dcs.gla.ac.uk/">CSinside
website</a>.</p>


<h2>"Robbie" the robot, teaching tool</h2>

<p>This was a two-person, seven-week project, during the Summer of
2003. The primary goal of the project was to redesign the user
interface for a pre-existing Lego Mindstorms line-following robot,
"Robbie". The work was completed with and trialled in primary schools
with the help of <a href="http://jimliddell.info">Jim Liddell</a>, who
also created the background artwork shown in the screenshots
below.</p>

<p>Aside from a general goal of making the interface as easily usable
and intuitive as possible, part of the purpose of the redesign was to
consider the possibility of Robbie (plus associated materials)
becoming an entity which could be shipped out to schools and be used
with little assistance from the University.</p>

<h3>The robot</h3>

<p>Robbie the robot is a teaching tool created as part of a third year
undergraduate team project in the <a
href="http://www.dcs.gla.ac.uk/">Computing department</a>, and
subsequently used by the <a href="http://www.gla.ac.uk">University of
Glasgow</a>. The robot aims to teach simple programming concepts by
allowing children (aged around 10-12 years) to program the Lego robot
to move through a printed maze from a fixed start point to a fixed
endpoint. The robot uses its own simple language (known simply as RPL,
Robot Programming Language), which is capable of writing programs of
the form:</p>

<blockquote><pre>
if path left
then go left
else go forward
</pre></blockquote>

<p>This RPL is parsed and translated into NQC ("Not Quite C") on a
host machine. The resulting NQC is then compiled into a form
acceptable for the Lego Mindstorms hardware, to be transmitted to
Robbie to be tested.</p>

<h3>The User Interface</h3>

<p>The new interface operates on the basis of
"challenges". Challenges are guided tutorials designed to build
gradually the ideas required to allow the robot to complete the final
challenge. The new UI consists of three "views".</p>


<p>Basic operation:</p>

<a href="../images/r1.png"><img src="../images/r1_thumb.png" alt=""/></a>

<p>This is the page shown on loading a 'Challenge'. The challenges were
arranged in such a way that a new concept was introduced by each, and
maps got progressively harder. The maps actually shown in the pane on the
right hand side of the window above are built up from a collection of
images representing different squares, and a corresponding text file
describing what tiles are placed where. The allowed for a handful of
squares to be drawn, with the application rotating the squares as
necessary.</p>

<a href="../images/r2.png"><img src="../images/r2_thumb.png" alt=""/></a>

<p>This is the workspace pane for the corresponding challenge shown
previously. In the easiest view, keywords like 'if' are interpreted and
presented as something a little more readable; the keywords themselves
are highlighted. The interface is drag &amp; drop, so is mouse
driven. Physically placing the solution into the gaps is much easier to
grasp at the target age range than abitrary words as were in the old
interface. Items could be dragged back out of the target spaces if a
mistake is made. Only selections relevant to the currently loaded
"Challenge" are displayed as options for the final solution in this
view.</p>

<a href="../images/r3.png"><img src="../images/r3_thumb.png" alt=""
/></a>

<p>Directly after dropping a condition into an empty blue square, the
green action icons relevant to the challenge are shown.</p>

<p>The final program, shown with error message detailing what has
gone wrong with the download operation, and just what might be done to
fix the problem.</p>

<p>The same program, displayed in the slightly more advanced "Icons &amp;
Words view". In this view, options shown are not restricted by the
challenge loaded. The plaintext strings are replaced now by actual RPL
code.</p>

<h3>Program "views"</h3>

<a href="../images/r6.png"><img src="../images/r6_thumb.png" alt=""
/></a> <a href="../images/r5.png"><img src="../images/r5_thumb.png"
alt="" /></a> <a href="../images/r4.png"><img
src="../images/r4_thumb.png" alt="" /></a>

<p>The same program, displayed in a more traditional "Words view". The
advanced view is significantly like the original interface, in that
the coding is done by hand. This time, however, keywords available to
the programmer are displayed on the right hand side of the
interface.</p>

<p>Switches between different views were handled as gracefully as
possible, as were compiler errors and hardware errors. Audible and
visual feedback was provided to the user where and when appropriate
(an icon would make a noise when placed in an appropriate empty
container, a different noise if it was pulled out of the container,
and a substantially different noise if it were placed somewhere
disallowed (somewhere outwith the centre text area, or into a
container that was already full).</p>

</div>

<?php include( "./copyright.php" ) ?>

</body>

</html>
