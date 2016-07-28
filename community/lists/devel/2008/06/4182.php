<?
$subject_val = "Re: [OMPI devel] Is trunk broken ?";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Jun 19 15:24:10 2008" -->
<!-- isoreceived="20080619192410" -->
<!-- sent="Thu, 19 Jun 2008 13:23:58 -0600" -->
<!-- isosent="20080619192358" -->
<!-- name="Ralph H Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Is trunk broken ?" -->
<!-- id="C4800E6E.DEAE%rhc_at_lanl.gov" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="485AB102.5070208_at_dev.mellanox.co.il" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Is trunk broken ?<br>
<strong>From:</strong> Ralph H Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2008-06-19 15:23:58
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="4183.php">Ralph H Castain: "Re: [OMPI devel] Is trunk broken ?"</a>
<li><strong>Previous message:</strong> <a href="4181.php">Pavel Shamis (Pasha): "Re: [OMPI devel] Is trunk broken ?"</a>
<li><strong>In reply to:</strong> <a href="4181.php">Pavel Shamis (Pasha): "Re: [OMPI devel] Is trunk broken ?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="4184.php">Pavel Shamis (Pasha): "Re: [OMPI devel] Is trunk broken ?"</a>
<li><strong>Reply:</strong> <a href="4184.php">Pavel Shamis (Pasha): "Re: [OMPI devel] Is trunk broken ?"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I can't find anything wrong so far. I'm waiting in a queue on Odin to try
<br>
there since Jeff indicated you are using rsh as a launcher, and that's the
<br>
only access I have to such an environment. Guess Odin is being pounded
<br>
because the queue isn't going anywhere.
<br>
<p>Meantime, I'm building on RoadRunner and will test there (TM enviro).
<br>
<p><p>On 6/19/08 1:18 PM, &quot;Pavel Shamis (Pasha)&quot; &lt;pasha_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; You'll have to tell us something more than that, Pasha. What kind of
</span><br>
<span class="quotelev2">&gt;&gt; environment, what rev level were you at, etc.
</span><br>
<span class="quotelev2">&gt;&gt;   
</span><br>
<span class="quotelev1">&gt; Ahh, sorry :) I run on Linux x86_64 Sles10 sp1. (Open MPI) 1.3a1r18682M
</span><br>
<span class="quotelev1">&gt; , OFED 1.3.1
</span><br>
<span class="quotelev1">&gt; Pasha.
</span><br>
<span class="quotelev2">&gt;&gt; So far as I know, the trunk is fine.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On 6/19/08 12:01 PM, &quot;Pavel Shamis (Pasha)&quot; &lt;pasha_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I tried to run trunk on my machines and I got follow error:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; [sw214:04367] [[16563,1],1] ORTE_ERROR_LOG: Data unpack would read past
</span><br>
<span class="quotelev3">&gt;&gt;&gt; end of buffer in file base/grpcomm_base_modex.c at line 451
</span><br>
<span class="quotelev3">&gt;&gt;&gt; [sw214:04367] [[16563,1],1] ORTE_ERROR_LOG: Data unpack would read past
</span><br>
<span class="quotelev3">&gt;&gt;&gt; end of buffer in file grpcomm_basic_module.c at line 560
</span><br>
<span class="quotelev3">&gt;&gt;&gt; [sw214:04365] 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev3">&gt;&gt;&gt; It looks like MPI_INIT failed for some reason; your parallel process is
</span><br>
<span class="quotelev3">&gt;&gt;&gt; likely to abort.  There are many reasons that a parallel process can
</span><br>
<span class="quotelev3">&gt;&gt;&gt; fail during MPI_INIT; some of which are due to configuration or environment
</span><br>
<span class="quotelev3">&gt;&gt;&gt; problems.  This failure appears to be an internal failure; here's some
</span><br>
<span class="quotelev3">&gt;&gt;&gt; additional information (which may only be relevant to an Open MPI
</span><br>
<span class="quotelev3">&gt;&gt;&gt; developer):
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;   orte_grpcomm_modex failed
</span><br>
<span class="quotelev3">&gt;&gt;&gt;   --&gt; Returned &quot;Data unpack would read past end of buffer&quot; (-26) instead
</span><br>
<span class="quotelev3">&gt;&gt;&gt; of &quot;Success&quot; (0)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;     
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
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   
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
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="4183.php">Ralph H Castain: "Re: [OMPI devel] Is trunk broken ?"</a>
<li><strong>Previous message:</strong> <a href="4181.php">Pavel Shamis (Pasha): "Re: [OMPI devel] Is trunk broken ?"</a>
<li><strong>In reply to:</strong> <a href="4181.php">Pavel Shamis (Pasha): "Re: [OMPI devel] Is trunk broken ?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="4184.php">Pavel Shamis (Pasha): "Re: [OMPI devel] Is trunk broken ?"</a>
<li><strong>Reply:</strong> <a href="4184.php">Pavel Shamis (Pasha): "Re: [OMPI devel] Is trunk broken ?"</a>
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
