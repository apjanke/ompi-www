<?
$subject_val = "Re: [OMPI devel] NP64 _gather_ problem";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Sep 17 11:41:45 2010" -->
<!-- isoreceived="20100917154145" -->
<!-- sent="Fri, 17 Sep 2010 10:41:51 -0500" -->
<!-- isosent="20100917154151" -->
<!-- name="Steve Wise" -->
<!-- email="swise_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] NP64 _gather_ problem" -->
<!-- id="4C938C3F.4040909_at_opengridcomputing.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="4C9341ED.2080009_at_oracle.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] NP64 _gather_ problem<br>
<strong>From:</strong> Steve Wise (<em>swise_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-09-17 11:41:51
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8492.php">Steve Wise: "Re: [OMPI devel] NP64 _gather_ problem"</a>
<li><strong>Previous message:</strong> <a href="8490.php">ananda.mudar_at_[hidden]: "[OMPI devel] Checkpoint is broken in trunk"</a>
<li><strong>In reply to:</strong> <a href="8488.php">Terry Dontje: "Re: [OMPI devel] NP64 _gather_ problem"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8492.php">Steve Wise: "Re: [OMPI devel] NP64 _gather_ problem"</a>
<li><strong>Reply:</strong> <a href="8492.php">Steve Wise: "Re: [OMPI devel] NP64 _gather_ problem"</a>
<li><strong>Reply:</strong> <a href="8493.php">Terry Dontje: "Re: [OMPI devel] NP64 _gather_ problem"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
&nbsp;&nbsp;Yes it does.  With mpi_preconnect_mpi to 1, NP64 doesn't stall.  So 
<br>
its not the algorithm in and of itself, but rather some interplay 
<br>
between the algorithm and connection setup I guess.
<br>
<p><p>On 9/17/2010 5:24 AM, Terry Dontje wrote:
<br>
<span class="quotelev1">&gt; Does setting mca parameter mpi_preconnect_mpi to 1 help at all.  This 
</span><br>
<span class="quotelev1">&gt; might be able to help determine if it is the actually connection set 
</span><br>
<span class="quotelev1">&gt; up between processes that are out of sync as oppose to something in 
</span><br>
<span class="quotelev1">&gt; the actual gather algorithm.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --td
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Steve Wise wrote:
</span><br>
<span class="quotelev2">&gt;&gt; Here's a clue:  ompi_coll_tuned_gather_intra_dec_fixed() changes its 
</span><br>
<span class="quotelev2">&gt;&gt; algorithm for job sizes &gt; 60 to some binomial method.  I changed the 
</span><br>
<span class="quotelev2">&gt;&gt; threshold to 100 and my NP64 jobs run fine.  Now to try and 
</span><br>
<span class="quotelev2">&gt;&gt; understand what about ompi_coll_tuned_gather_intra_binomial() is 
</span><br>
<span class="quotelev2">&gt;&gt; causing these connect delays...
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On 9/16/2010 1:01 PM, Steve Wise wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Oops.  One key typo here:  This is the IMB-MPI1 gather test, not 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; barrier. :(
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On 9/16/2010 12:05 PM, Steve Wise wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;  Hi,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I'm debugging a performance problem with running IMB-MP1/barrier in 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; an NP64 cluster (8 nodes, 8 cores each).  I'm using openmpi-1.4.1 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; from the OFED-1.5.1 distribution.  The BTL is openib/iWARP via 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Chelsio's T3 RNIC.  In short, a NP60 and smaller run completes in a 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; timely manner as expected,  but NP61 and larger runs come to a 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; crawl at the 8KB IO size and take ~5-10min to complete.  It does 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; complete though.  It behaves this way even if I run on &gt; 8 nodes so 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; there are available cores.  IE a NP64 on a 16 node cluster still 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; behaves the same way even though there are only 4 ranks on each 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; node.  So its apparently not a thread starvation issue due to lack 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; of cores.  When in the stalled state, I see on the order of 100 or 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; so established iwarp connections on each node.  And the connection 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; count increases VERY slowly and sporadically (at its peak there are 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; around 800 connections for a NP64 gather operation).  In 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; comparison, when I run the &lt;= NP60 runs, the connections quickly 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; ramp up to the expected amount.  I added hooks in the openib BTL to 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; track the time it takes to setup each connection.  In all runs, 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; both &lt;= NP60 and &gt; NP60, the average connection setup time is 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; around 200ms.  And the max setup time seen is never much above this 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; value.  That tells me that its not individual connection setup that 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; is the issue.   I then added printfs/fflushes in librdmacm to 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; visually see when a connection is attempted and when it is 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; accepted.  When I run with these printfs, I see the connections get 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; setup quickly and evently in the &lt;= NP60 case.  Initially when the 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; job is started, I see a small flurry of connections getting setup, 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; then the run begins and at around 1KB IO size I see a 2nd large 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; flurry of connection setups.  Then the test continues and 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; completes.  With the &gt;NP60 case, this second round of connection 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; setups is very sporadic and slow.  Very slow!  I'll see little 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; bursts of ~10-20 connections setup, then long random pauses.  The 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; net is that full connection setup for the job takes 5-10min.  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; During this time the ranks are basically spinning idle awaiting the 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; connections to get setup.  So I'm concluding that something above 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; the BTL layer isn't issuing the endpoint connect requests in a 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; timely manner.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Attached are 3 padb dumps during the stall.  Anybody see anything 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; interesting in these?
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Any ideas how I can further debug this?  Once I get above the 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; openib  BTL layer my eyes glaze over and I get lost quickly. :)  I 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; would greatly appreciate any ideas from the OpenMPI experts!
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Thanks in advance,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Steve.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
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
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; ------------------------------------------------------------------------
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
<span class="quotelev1">&gt; Oracle
</span><br>
<span class="quotelev1">&gt; Terry D. Dontje | Principal Software Engineer
</span><br>
<span class="quotelev1">&gt; Developer Tools Engineering | +1.781.442.2631
</span><br>
<span class="quotelev1">&gt; Oracle * - Performance Technologies*
</span><br>
<span class="quotelev1">&gt; 95 Network Drive, Burlington, MA 01803
</span><br>
<span class="quotelev1">&gt; Email terry.dontje_at_[hidden] &lt;mailto:terry.dontje_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt;
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
<p><p><p>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-8491/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<hr>
<img src="http://www.open-mpi.org/community/lists/devel/att-8491/02-part" alt="picture">
<!-- attachment="02-part" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8492.php">Steve Wise: "Re: [OMPI devel] NP64 _gather_ problem"</a>
<li><strong>Previous message:</strong> <a href="8490.php">ananda.mudar_at_[hidden]: "[OMPI devel] Checkpoint is broken in trunk"</a>
<li><strong>In reply to:</strong> <a href="8488.php">Terry Dontje: "Re: [OMPI devel] NP64 _gather_ problem"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8492.php">Steve Wise: "Re: [OMPI devel] NP64 _gather_ problem"</a>
<li><strong>Reply:</strong> <a href="8492.php">Steve Wise: "Re: [OMPI devel] NP64 _gather_ problem"</a>
<li><strong>Reply:</strong> <a href="8493.php">Terry Dontje: "Re: [OMPI devel] NP64 _gather_ problem"</a>
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
