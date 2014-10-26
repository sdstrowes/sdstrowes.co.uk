<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <title>Stephen Strowes :: AMUSe :: CFU1U USB Host Adapter on HP iPAQ hx4700</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="/style.css" rel="stylesheet" />
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<?php include( "../ga.js" ) ?>

</head>

<body>

<?php include( "../header.php" ) ?>

<div class="container-fixed">

<h2>RATOC CFU1U USB Host adapter on HP iPAQ hx4700</h2>

<h3>(13 December 2006)</h3>

<p>The <a
href="http://www.ratocsystems.com/english/products/cfu1u.html">RATOC
CFU1U</a> adapter allows certain PDAs to act as a USB host. By
default, Linux doesn't really understand what it is; these
instructions should help you compile the correct kernel modules to
support this card, opening up the possibility of using your PDA with
mass storage devices and various other USB dongles you might have.</p>

<p>Note that a PDA cannot support the power requirements of some
devices, so depending on what you're trying to run, you might need an
externally powered USB hub. Small things, like most pen drives, seem
to work fine.</p>

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

<p>You'll also need kernel sources. <a
href="http://familiar.handhelds.org/source/v0.8.4/sources/">Grab the
latest "-hh" version</a>; for reference, I used 2.6.16-hh3 when
writing this. The CFU1U module is included as part of the standard
kernel codebase, but it is not selected by default.</p>


<h3>Compilation and installation</h3>

<p>Take a look at <a
href="http://sdstrowes.co.uk/amuse/Kernel_compile_on_HP_iPAQ_hx4700.php">kernel
compilation instructions</a>; read the instructions, and make sure
you're comfortable with what you're about to try. Note that, if your
compile goes the same way as mine, you <em>will</em> have to install a
new kernel image, even if you're compiling modules for the same kernel
version as you're currently running.</p>

<p>The default kernel config is close to what you want, but not
quite. From <tt>make menuconfig</tt>, I changed the following options,
and left all others as they were. I've included module names, where
appropriate, in brackets:</p>

<blockquote><pre>Required: M - Support for Host-Side USB (usbcore)
Optional: Y - USB device filesystem
Optional: Y - USB selective suspend/resume and wakeup
Required: M - SL811HS HCD support (sl811_hcd)
Required: M - CF/PCMCIA support for SL811HS HCD (sl811_cs)
Optional: M - USB Mass Storage Support (usb-storage)
Optional: M - USB Human Interface Device (usbhid)
Optional: Y - HID input layer support
Optional: M - USB Serial Converter support (usbserial)
Optional: Y - USB Generic Serial Driver
</pre></blockquote>

<p>Follow the install instructions as per the <a
href="http://sdstrowes.co.uk/amuse/Kernel_compile_on_HP_iPAQ_hx4700.php">kernel
instructions</a> page, and you should be good to go.</p>

<h3>Successful output</h3>

<p>On a successful install, I get the following output from
<tt>dmesg</tt> on insertion of the CFU1U card:</p>
<blockquote><pre>pccard: PCMCIA card inserted into slot 0
pcmcia: registering new device pcmcia0.0
usbcore: registered new driver usbfs
usbcore: registered new driver hub
sl811: driver sl811-hcd, 19 May 2005
sl811_cs: index 0x04: Vcc 3.3, irq 92, io 0xc4820000-0xc4820007
sl811-hcd sl811-hcd: SL811HS v1.5
sl811-hcd sl811-hcd: new USB bus registered, assigned bus number 1
sl811-hcd sl811-hcd: irq 92, io mem 0xc4820000
usb usb1: configuration #1 chosen from 1 choice
hub 1-0:1.0: USB hub found
hub 1-0:1.0: 1 port detected
</pre></blockquote>

<p>On inserting a pen drive into the USB slot, I then get the following
output as I'd expect:</p>

<blockquote><pre>usb 1-1: new full speed USB device using sl811-hcd and address 2
usb 1-1: configuration #1 chosen from 1 choice
SCSI subsystem initialized
Initializing USB Mass Storage driver...
scsi0 : SCSI emulation for USB Mass Storage devices
usb-storage: device found at 2
usb-storage: waiting for device to settle before scanning
usbcore: registered new driver usb-storage
USB Mass Storage support registered.
  Vendor: CREATIVE  Model: NOMAD_MUVO        Rev: 0001
  Type:   Direct-Access                      ANSI SCSI revision: 04
usb-storage: device scan complete
</pre></blockquote>

<p>That looks good to go. For completeness, the following commands were
required for access to the filesystem:</p>
<blockquote><pre>modprobe sd_mod
mount /dev/sda1 /media/card/
</pre></blockquote>

<h3>Resources</h3>

<ul>
<li>RATOC CFU1U adapter: <a href="http://www.ratocsystems.com/english/products/subpages/cfu1u.html">http://www.ratocsystems.com/english/products/subpages/cfu1u.html</a></li>
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
