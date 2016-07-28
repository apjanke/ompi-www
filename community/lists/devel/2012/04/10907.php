<?
$subject_val = "Re: [OMPI devel] RFC: opal_cache_line_size";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Apr 23 16:40:55 2012" -->
<!-- isoreceived="20120423204055" -->
<!-- sent="Mon, 23 Apr 2012 16:40:57 -0400" -->
<!-- isosent="20120423204057" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: opal_cache_line_size" -->
<!-- id="3F1D53C3-632F-415A-B54B-C46ABE80186F_at_eecs.utk.edu" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="F3F65832-F3B5-4D82-839E-7E6AD5421908_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: opal_cache_line_size<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-04-23 16:40:57
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10908.php">Jeffrey Squyres: "Re: [OMPI devel] RFC: opal_cache_line_size"</a>
<li><strong>Previous message:</strong> <a href="10906.php">Jeffrey Squyres: "Re: [OMPI devel] RFC: opal_cache_line_size"</a>
<li><strong>In reply to:</strong> <a href="10906.php">Jeffrey Squyres: "Re: [OMPI devel] RFC: opal_cache_line_size"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="10908.php">Jeffrey Squyres: "Re: [OMPI devel] RFC: opal_cache_line_size"</a>
<li><strong>Reply:</strong> <a href="10908.php">Jeffrey Squyres: "Re: [OMPI devel] RFC: opal_cache_line_size"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
No strong opinion. However, the comment about the initial value of opal_cache_line_size is wrong (opal/runtime/opal.h), as it states that the default value is -1 while it is 128.
<br>
<p>&nbsp;&nbsp;george.
<br>
<p>On Apr 23, 2012, at 16:21 , Jeffrey Squyres wrote:
<br>
<p><span class="quotelev1">&gt; No one replied to this RFC.  Does anyone have an opinion about it?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I have attached a patch (including some debugging output) showing my initial implementation.  If no one objects by the end of this week, I'll commit to the trunk.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Terry: please add this to the agenda tomorrow.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Mar 30, 2012, at 1:09 PM, Jeffrey Squyres wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; I was just recently reminded of a comment that is near the top of opal_init_util():
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   /* JMS See note in runtime/opal.h -- this is temporary; to be
</span><br>
<span class="quotelev2">&gt;&gt;      replaced with real hwloc information soon (in trunk/v1.5 and
</span><br>
<span class="quotelev2">&gt;&gt;      beyond, only).  This *used* to be a #define, so it's important
</span><br>
<span class="quotelev2">&gt;&gt;      to define it very early.  */
</span><br>
<span class="quotelev2">&gt;&gt;   opal_cache_line_size = 128;
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; A few points:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 1. On my platforms, hwloc tells me that my cache line size is 64, not 128.  Probably not a tragedy, but...
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 2. I see opal_cache_line_size being used in a lot of BTL and PML initialization locations.  I see it being used in opal/class/free_list.*, too.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 3. I poked around with this yesterday to see if we could have hwloc initialize the opal_cache_line_size value.  Points to remember:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; - we initialize the opal hwloc framework in opal_init(), but we do not load the local machine's architecture then (because it can be expensive, particularly if lots of MPI processes are all doing it simultaneously)
</span><br>
<span class="quotelev2">&gt;&gt; - instead, the local machine topology is discovered once by each orted (using hwloc) and then RML sent to each local MPI process, where it is locally loaded into each MPI proc's hwloc tree
</span><br>
<span class="quotelev2">&gt;&gt; - this happens during the orte_init() in ompi_mpi_init()
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Meaning: we can initialize the opal_cache_line_size in MPI processes during orte_init().
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Is this acceptable to everyone?  
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; If so, I can go ahead and code this up.  I would probably leave the initial value hard-coded to 128 (just in case something uses it before orte_init()), and then later during orte_init(), reset it to the smallest L1 cache size that hwloc finds on the machine.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; -- 
</span><br>
<span class="quotelev2">&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev2">&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev1">&gt; For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev1">&gt; &lt;opal-cache-line-size.diff&gt;_______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10908.php">Jeffrey Squyres: "Re: [OMPI devel] RFC: opal_cache_line_size"</a>
<li><strong>Previous message:</strong> <a href="10906.php">Jeffrey Squyres: "Re: [OMPI devel] RFC: opal_cache_line_size"</a>
<li><strong>In reply to:</strong> <a href="10906.php">Jeffrey Squyres: "Re: [OMPI devel] RFC: opal_cache_line_size"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="10908.php">Jeffrey Squyres: "Re: [OMPI devel] RFC: opal_cache_line_size"</a>
<li><strong>Reply:</strong> <a href="10908.php">Jeffrey Squyres: "Re: [OMPI devel] RFC: opal_cache_line_size"</a>
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
