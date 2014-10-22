<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <title>Stephen Strowes :: AMUSe :: Kernel compile on the HP iPAQ hx4700</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="http://www.sdstrowes.co.uk/style.css" type="text/css" media="all" />
</head>

<body>

<?php include( "../header.php" ) ?>

<div id="content">

<h2>Kernel compile on the HP iPAQ hx4700</h2>

<h3>(13 December 2006)</h3>

<h3>Prerequisites</h3>

<p>The following assumes you're already running Familiar Linux on your
iPAQ hx4700. I'm currently running <a
href="http://familiar.handhelds.org/releases/v0.8.4/">Familiar
0.8.4</a> (but you must use the <a
href="http://sdgsystems.com/pub/ipaq/hx4700/starterkit/20060615-gpe/">SDG
bootloader</a>; note that the official Familiar instructions do not
cover installation on an hx4700, so please look at all instructions
provided via both those links if you are going to install. If in
doubt, ask questions, or you may kill your iPAQ, and it won't be my
fault).</p>

<p>You need a toolchain capable of creating binaries for the
hx4700. <a
href="http://ftp.handhelds.org/projects/toolchain/">Download the
appropriate arm-linux-gcc</a>.</p>

<p>You'll obviously also need kernel sources. <a
href="http://familiar.handhelds.org/source/v0.8.4/sources/">Grab the
latest "-hh" version</a>; for reference, I used 2.6.16-hh3 when writing
this.</p>


<h3>The compile</h3>

<p>Once you have the various tools set up and source code in place,
the compile is actually surprisinly simple.</p>

<ol>
<li>In the top-level Makefile, ensure the following lines are correct:
<pre>ARCH:=          arm
CROSS_COMPILE?= arm-linux-</pre> If your arm-linux-* binaries are not in
your $PATH, define CROSS_COMPILE: as <tt>CROSS_COMPILE?=
/path/to/arm-linux-</tt></li>
<li>Run: <tt>make hx4700_defconfig</tt><br /> This provides a .config
file which will work on the hx4700, with the most common options
turned on.</li>
<li>Edit the .config at the top of the kernel tree if need be
(manually, or run <tt>make menuconfig</tt>, etc).</li>
<li>Run: <tt>make modules</tt></li>
<li>Run: <tt>make modules_install INSTALL_MOD_PATH=/tmp</tt><br />
This will place a /lib/modules/ directory structure under /tmp. This
is just a precaution, as the kernel is labelled "2.6.16-hh3", so the
modules should never be confused with mainline kernel modules, but
better safe than sorry.</li>
<li>Run: <tt>make zImage</tt></li>
</ol>

<p>By now, your kernel and its modules should be complete.</p>

<h3>The install</h3>

<p>This should go without saying, but: <em>make sure you have keep a
copy of the original kernel, and don't remove old kernel modules from
the iPAQ until you're happy, in case it all goes pear shaped.</em></p>

<p>Installation of modules is easy; simply copy them into place. I
have wireless set up on the hx4700, so I simply run the following to
put the modules in place:</p>
<blockquote><pre>rm /tmp/lib/modules/2.6.16-hh3/source
rm /tmp/lib/modules/2.6.16-hh3/build
scp -r /tmp/lib/modules/2.6.16-hh3 root@ipaq:/lib/modules/</pre></blockquote>
<p>"source" and "build" are symlinks into the build tree. Believe me when
I say that you will run out of space on your iPAQ should you
accidentally try and copy them over with the modules.</p>

<p>Installation of the kernel is slightly tricker, in that you can't
just copy the image over to /boot on the iPAQ and go. The kernel must
be flashed to /dev/mtdblock1 via the SDG bootloader, in the same way
that you will probably have flashed the default kernel, root and home
filesystems into place. Copy your zImage from <tt
class="path">arch/arm/boot/zImage</tt> onto your CF card, and update
the reflash.ctl file to point to the new kernel. Unmount the CF card
and insert it into the hx4700.</p>

<p>Hold down the contacts and email buttons (top left, top right
respectively), and hit 'reset' to enter the flash utility on the
bootloader. Select your kernel image, and follow the on-screen
instructions.</p>

<p>You can watch the process via a serial line (115200 8N1, no flow
control). When it's complete, reset the iPAQ again, and say hello to
your new kernel.</p>

<h3>Resources</h3>

<ul>

<li>Familiar Linux: <a
href="http://familiar.handhelds.org/">http://familiar.handhelds.org/</a></li>
<li>Familiar on hx4700: <a href="http://handhelds.org/moin/moin.cgi/HpIpaqHx4700">http://handhelds.org/moin/moin.cgi/HpIpaqHx4700</a></li>
<li>Tool chain for cross compilation: <a href="http://handhelds.org/moin/moin.cgi/PrebuiltToolchains">http://handhelds.org/moin/moin.cgi/PrebuiltToolchains</a></li>
<li>Familiar sources (including kernel): <a
href="http://familiar.handhelds.org/source/v0.8.4/sources/">http://familiar.handhelds.org/source/v0.8.4/sources/</a></li>
</ul>

</div>

<?php include( "../copyright.php" ) ?>

</body>

</html>
