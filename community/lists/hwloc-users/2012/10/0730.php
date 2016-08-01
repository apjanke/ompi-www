<?
$subject_val = "Re: [hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Oct  2 17:54:52 2012" -->
<!-- isoreceived="20121002215452" -->
<!-- sent="Tue, 02 Oct 2012 23:53:47 +0200" -->
<!-- isosent="20121002215347" -->
<!-- name="Brice Goglin" -->
<!-- email="Brice.Goglin_at_[hidden]" -->
<!-- subject="Re: [hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware" -->
<!-- id="506B626B.4050203_at_inria.fr" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="CAN=597RNSvU8iZwxLPReLvvJA-LSQLEqkyiZ8bVjijP3_Tq3cQ_at_mail.gmail.com" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware<br>
<strong>From:</strong> Brice Goglin (<em>Brice.Goglin_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-10-02 17:53:47
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0731.php">Samuel Thibault: "Re: [hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware"</a>
<li><strong>Previous message:</strong> <a href="0729.php">Sebastian Kuzminsky: "[hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware"</a>
<li><strong>In reply to:</strong> <a href="0729.php">Sebastian Kuzminsky: "[hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0732.php">Sebastian Kuzminsky: "Re: [hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware"</a>
<li><strong>Reply:</strong> <a href="0732.php">Sebastian Kuzminsky: "Re: [hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Le 02/10/2012 23:45, Sebastian Kuzminsky a &#233;crit :
<br>
<span class="quotelev1">&gt; Hi folks, I just discovered hwloc and it's really cool.  Very useful,
</span><br>
<span class="quotelev1">&gt; so thanks!
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I'm trying to understand the hardware layout of a computer I'm working
</span><br>
<span class="quotelev1">&gt; with, an HP Proliant DL360p G8 server with two Intel E5-2690 processors.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I'm getting puzzling results from lstopo (from hwloc 1.5).  The
</span><br>
<span class="quotelev1">&gt; results I get in Linux make good sense, but the results I get in
</span><br>
<span class="quotelev1">&gt; FreeBSD (running on the same hardware) seem wrong.  Specifically,
</span><br>
<span class="quotelev1">&gt; notice how the first 10 CPUs are not assigned to any socket or L1/L2
</span><br>
<span class="quotelev1">&gt; cache.  Strange!
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I've attached the output from both platforms.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Any ideas what I'm doing wrong?
</span><br>
<p>Hello,
<br>
<p>You're probably not doing anything wrong. The Linux output is indeed OK.
<br>
The FreeBSD output is generated by reading cpuid information directly
<br>
from the processor, we may need to update this code for recent
<br>
processors like yours.
<br>
<p>Brice
<br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0731.php">Samuel Thibault: "Re: [hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware"</a>
<li><strong>Previous message:</strong> <a href="0729.php">Sebastian Kuzminsky: "[hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware"</a>
<li><strong>In reply to:</strong> <a href="0729.php">Sebastian Kuzminsky: "[hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0732.php">Sebastian Kuzminsky: "Re: [hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware"</a>
<li><strong>Reply:</strong> <a href="0732.php">Sebastian Kuzminsky: "Re: [hwloc-users] hwloc 1.5, freebsd and linux output on the same hardware"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>