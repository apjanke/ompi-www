<?
$subject_val = "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r23936";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Oct 26 06:20:31 2010" -->
<!-- isoreceived="20101026102031" -->
<!-- sent="Tue, 26 Oct 2010 06:20:27 -0400" -->
<!-- isosent="20101026102027" -->
<!-- name="Jeff Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r23936" -->
<!-- id="97203D84-47BB-4C83-B76A-D790D0EB251F_at_cisco.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="741E5671-AE8F-461D-A427-36AEB179A998_at_eecs.utk.edu" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r23936<br>
<strong>From:</strong> Jeff Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-10-26 06:20:27
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8625.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r23936"</a>
<li><strong>Previous message:</strong> <a href="8623.php">Ralph Castain: "Re: [OMPI devel] orte does not compile on XT5 (pgcc)"</a>
<li><strong>In reply to:</strong> <a href="8621.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r23936"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8625.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r23936"</a>
<li><strong>Reply:</strong> <a href="8625.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r23936"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
On Oct 25, 2010, at 9:29 PM, George Bosilca wrote:
<br>
<p><span class="quotelev1">&gt; 1. Not all processes deadlock in btl_sm_add_procs. The process that setup the shared memory area, is going forward, and block later in a barrier.
</span><br>
<p>Yes, I'm seeing the same thing (I didn't include all details like this in my post, sorry). I was running with -np 2 on a local machine and saw vpid=0 get stuck in opal_progress (because the first time through, seg_inited &lt; n_local_procs).  vpid=1 increments seg_inited and therefore doesn't enter the loop that calls opal_progress(), and therefore continues on.
<br>
<p><span class="quotelev1">&gt; 2. All other processes, loop around the opal_progress, until they got a message from all other processes. The variable used for counting is somehow updated correctly, but we still call opal_progress. I couldn't figure out is we loop more that we should, or if opal_progress doesn't return. However, both of these possibilities look very unlikely to me: the loop in the sm_add_procs is pretty straightforward, and I couldn't find any loops in opal_progress. I wonder if some of the messages get lost on the exchange.
</span><br>
<p>I had this problem, too, until I tried to use padb to get stack traces.  I noticed that when I ran padb, my blocked process un-blocked itself and continued.  After more digging, I determined that my blocked process was, in fact, blocked in poll() with an infinite timeout.  padb (or any signal at all) caused it to unblock and therefore continue.
<br>
<p><span class="quotelev1">&gt; 3. If I unblock the situation by hand, everything goes back to normal. NetPIPE runs to completion but the performances are __really__ bad. On my test machine I get around 2000Mbs, when the expected value is at least 10 times more. Similar finding on the latency side, we're now at 1.65 micro-sec up from the usual 0.35 we had before.
</span><br>
<p>It's a feature!
<br>
<p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to:
<a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8625.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r23936"</a>
<li><strong>Previous message:</strong> <a href="8623.php">Ralph Castain: "Re: [OMPI devel] orte does not compile on XT5 (pgcc)"</a>
<li><strong>In reply to:</strong> <a href="8621.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r23936"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8625.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r23936"</a>
<li><strong>Reply:</strong> <a href="8625.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r23936"</a>
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
