<?
$subject_val = "Re: [OMPI devel] btl_openib_rnr_retry MCA param";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Feb 13 09:21:21 2008" -->
<!-- isoreceived="20080213142121" -->
<!-- sent="Wed, 13 Feb 2008 16:20:35 +0200" -->
<!-- isosent="20080213142035" -->
<!-- name="Gleb Natapov" -->
<!-- email="glebn_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] btl_openib_rnr_retry MCA param" -->
<!-- id="20080213142035.GO10354_at_minantech.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="583394EF-9E3D-425E-BA96-A4F87E1F8B39_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] btl_openib_rnr_retry MCA param<br>
<strong>From:</strong> Gleb Natapov (<em>glebn_at_[hidden]</em>)<br>
<strong>Date:</strong> 2008-02-13 09:20:35
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3243.php">Jeff Squyres: "Re: [OMPI devel] [RFC] Remove explicit call to progress() from ob1."</a>
<li><strong>Previous message:</strong> <a href="3241.php">Jeff Squyres: "Re: [OMPI devel] btl_openib_rnr_retry MCA param"</a>
<li><strong>In reply to:</strong> <a href="3241.php">Jeff Squyres: "Re: [OMPI devel] btl_openib_rnr_retry MCA param"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
On Wed, Feb 13, 2008 at 09:05:24AM -0500, Jeff Squyres wrote:
<br>
<span class="quotelev1">&gt; Actually, we should then also print out a different error message when  
</span><br>
<span class="quotelev1">&gt; RNR occurs in PP QP's, too.  It should be something along the lines of  
</span><br>
<span class="quotelev1">&gt; &quot;flow control problem occurred; this shouldn't happen...&quot; (right now  
</span><br>
<span class="quotelev1">&gt; it says RNR happened, and goes into detail into what that means -- but  
</span><br>
<span class="quotelev1">&gt; that's not the real problem).
</span><br>
<span class="quotelev1">&gt; 
</span><br>
Good point.
<br>
<p><span class="quotelev1">&gt; I'll do that as well.
</span><br>
Thanks!
<br>
<p><span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Feb 13, 2008, at 12:59 AM, Gleb Natapov wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt; &gt; On Tue, Feb 12, 2008 at 05:41:13PM -0500, Jeff Squyres wrote:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; I see that in the OOB CPC for the openib BTL, when setting up the  
</span><br>
<span class="quotelev3">&gt; &gt;&gt; send
</span><br>
<span class="quotelev3">&gt; &gt;&gt; side of the QP, we set the rnr_retry value depending on whether the
</span><br>
<span class="quotelev3">&gt; &gt;&gt; remote receive queue is a per-peer or SRQ:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - SRQ: btl_openib_rnr_retry MCA param value
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - PP: 0
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; The rationale given in a comment is that setting the RNR to 0 is a
</span><br>
<span class="quotelev3">&gt; &gt;&gt; good way to find bugs in our flow control.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Do we really want this in production builds?  Or do we want 0 for
</span><br>
<span class="quotelev3">&gt; &gt;&gt; developer builds and the same btl_openib_rnr_retry value for PP  
</span><br>
<span class="quotelev3">&gt; &gt;&gt; queues?
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; The comment is mine and IMO it should stay that way for production
</span><br>
<span class="quotelev2">&gt; &gt; builds. SW flow control either work or it doesn't and if it doesn't I
</span><br>
<span class="quotelev2">&gt; &gt; prefer to know about it immediately. Setting PP to some value greater
</span><br>
<span class="quotelev2">&gt; &gt; then 0 just delays the manifestation of the problem and in the case of
</span><br>
<span class="quotelev2">&gt; &gt; iWarp such possibility doesn't even exists.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; --
</span><br>
<span class="quotelev2">&gt; &gt; 			Gleb.
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; Cisco Systems
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><pre>
--
			Gleb.
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3243.php">Jeff Squyres: "Re: [OMPI devel] [RFC] Remove explicit call to progress() from ob1."</a>
<li><strong>Previous message:</strong> <a href="3241.php">Jeff Squyres: "Re: [OMPI devel] btl_openib_rnr_retry MCA param"</a>
<li><strong>In reply to:</strong> <a href="3241.php">Jeff Squyres: "Re: [OMPI devel] btl_openib_rnr_retry MCA param"</a>
<!-- nextthread="start" -->
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
