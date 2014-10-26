<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <title>Stephen Strowes :: AMUSe :: JBlueZ on the HP iPAQ hx4700</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="/style.css" rel="stylesheet" />
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<?php include( "./ga.js" ) ?>

</head>

<body>

<?php include( "../header.php" ) ?>

<div class="container-fixed">

<h2>JBlueZ on the HP iPAQ hx4700</h2>

<h3>(23 November 2005)</h3>

<p>The following assumes you're already running
Familiar Linux on your iPAQ hx4700. I obtained Familiar from <a
href="http://sdgsystems.com/pub/ipaq/hx4700/starterkit/current">http://sdgsystems.com/pub/ipaq/hx4700/starterkit/current</a>,
but you may know of other sources.</p>

<p>The work documented here was required due to
JBlueZ's dependency on JNI; a shared library is used to interface
between the JVM and the native <a
href="http://www.bluez.org/">BlueZ</a> library. This shared library
ties JBlueZ to the x86 Linux platform, for which is was designed. I
wanted to use JBlueZ on my Linux-enabled iPAQ instead.</p>

<h3>Java</h3>

<p><a href="http://www.blackdown.org/">Blackdown
Java</a> 1.3.1 is available for the iPAQ, if you download the
<em>arm</em> distribution. For the sake of simplicity, I extracted
this and placed it all under <tt class="path">/usr/local/</tt> on the
iPAQ.</p>

<h3>The toolchain</h3>

<p>You need a compiler which can create binaries
targetted for the appropriate platform. I downloaded the toolchain
which is available at <a
href="ftp://ftp.handhelds.org/projects/toolchain/">ftp://ftp.handhelds.org/projects/toolchain/</a>

(namely, <a
href="ftp://ftp.handhelds.org/projects/toolchain/arm-linux-gcc-3.3.2.tar.bz2">arm-linux-gcc-3.3.2.tar.bz2</a>). As
with Java, I extracted and placed all this into <tt
class="path">/usr/local/</tt>.</p>

<h3>JBlueZ</h3>

<p>JBlueZ is designed to interface with the BlueZ
stack incorporated into Linux. It can be downloaded via <a
href="http://jbluez.sourceforge.net/">http://jbluez.sf.net/</a>. Place
this distribution somewhere convenient -- the only truly important
parts are the contents of the <tt class="path">bin/</tt> directory
(which contains the .so file which we will be generating). I worked
under <tt class="path">/tmp/</tt>, and will use this in any following
examples.</p>

<h3>libbluetooth</h3>

<p>For the compilation process, the libbluetooth
libraries which reside on the iPAQ must be pulled onto your host
machine. This is as simple as: <tt class="path">mkdir
/tmp/libbluetooth &amp;&amp; scp root@ipaq:/lib/libbluetooth*
/tmp/libbluetooth/</tt></p>

<h3>Modification of sources</h3>

<p>The JBlueZ sources require a little fixing, but
not much at all. In the order I tackled them then:</p>

<ol>
<li>Add to the CFLAGS line in <tt
class="path">/tmp/jbluez/src/c/Makefile</tt> the following:

<tt>-barm-linux -mcpu=xscale -L/tmp/libbluetooth</tt></li>
<li>Make sure the target Java platform is set correctly in <tt
class="path">/tmp/jbluez/src/java/Makefile</tt> (bear in mind
we're using Java 1.3.1); change line 57 to the following: 
<tt>(cd $(PACKAGE_SRC) ; javac -target 1.3 *java)</tt></li>
<li>Alter the following two lines in
<tt class="path">/tmp/jbluez/src/c/BlueZ.c</tt>: line 381, change
<tt>hci_local_name(...)</tt> to <tt>hci_read_local_name(...)</tt>; 
line 408, change <tt>hci_remote_name(...)</tt> to 

<tt>hci_read_remote_name(...)</tt>.</li>
</ol>

<h3>Building and testing</h3>

<p>With these modifications in place, it should be
a simple case of compiling JBlueZ via <tt class="path">make</tt>. This
step should pass without failure -- the library has now been
built. Now transfer the jbluez tree over to the iPAQ. The tree only
takes up about 487.5KB of space.</p>

<p>For the sake of simplicity, and to reduce
workload each time I run anything, I have the following script simply
named "j" placed in <tt class="path">/usr/local/bin/</tt>:</p>

<blockquote><pre>#!/bin/sh
export CLASSPATH=$CLASSPATH:.:/tmp/jbluez/bin/jbluez.jar
export LD_LIBRARY_PATH=$LD_LIBRARY_PATH:/tmp/jbluez/bin/
killall hciattach
hciattach -S /etc/bluetooth/TIInit_3.2.26.bts ttyS1 texas 1> /dev/null 2>/dev/null

java $1</pre></blockquote>

<p>My <tt
class="path">/etc/bluetooth/hcid.conf</tt> is largely unmodified, but
I suspect it might prove useful to mirror my setup entirely for
anybody else trying out JBlueZ on their iPAQ. My hcid.conf is
available <a href="./hcid.conf">here</a>.</p>

<p>With all this in place, it should be a matter of
locating a JBlueZ application and running it:</p>

<blockquote><pre># cd /tmp/jbluez/examples/inquiry/
# j Inquiry
2 devices found.

        00:E:07:E3:26:D5
        00:11:B1:07:A2:F1
#</pre></blockquote>

<h3>My JBlueZ tree</h3>

<p>If you don't fancy all that effort, feel free to
download the outcome of my troubles <a href="./jbluez.tar.bz2">here</a>.</p>

<h3>Resources</h3>

<ul>

<li>Familiar Linux: <a
href="http://familiar.handhelds.org/">http://familiar.handhelds.org/</a></li>
<li>Familiar on hx4700: <a href="http://handhelds.org/moin/moin.cgi/HpIpaqHx4700">http://handhelds.org/moin/moin.cgi/HpIpaqHx4700</a></li>

<li>BlueZ: <a href="http://www.bluez.org/">http://www.bluez.org/</a></li> 
<li>JBlueZ <a
href="http://jbluez.sf.net/">http://jbluez.sf.net/</a></li>
<li>Tool chain for cross compilation: <a href="http://handhelds.org/moin/moin.cgi/PrebuiltToolchains">http://handhelds.org/moin/moin.cgi/PrebuiltToolchains</a></li>
</ul>

</div>

<?php include( "../copyright.php" ) ?>

</body>

</html>
