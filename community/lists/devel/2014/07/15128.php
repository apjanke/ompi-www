<?
$subject_val = "Re: [OMPI devel] 1.8.2rc1 available for test";
include("../../include/msg-header.inc");
?>
<!-- received="Sat Jul 12 13:43:43 2014" -->
<!-- isoreceived="20140712174343" -->
<!-- sent="Sat, 12 Jul 2014 10:43:07 -0700" -->
<!-- isosent="20140712174307" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] 1.8.2rc1 available for test" -->
<!-- id="4EEC219F-F4E3-4DC1-9E2E-CD57A642F3CA_at_open-mpi.org" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="CAAO1Kya-4obvSryS0MNT3OO3T=914P_d6wZ-tprRMGo0Ox+SaA_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] 1.8.2rc1 available for test<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-07-12 13:43:07
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="15129.php">Mike Dubman: "Re: [OMPI devel] 1.8.2rc1 available for test"</a>
<li><strong>Previous message:</strong> <a href="15127.php">Mike Dubman: "Re: [OMPI devel] 1.8.2rc1 available for test"</a>
<li><strong>In reply to:</strong> <a href="15127.php">Mike Dubman: "Re: [OMPI devel] 1.8.2rc1 available for test"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="15129.php">Mike Dubman: "Re: [OMPI devel] 1.8.2rc1 available for test"</a>
<li><strong>Reply:</strong> <a href="15129.php">Mike Dubman: "Re: [OMPI devel] 1.8.2rc1 available for test"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Congrats - your Makefile.am change broke it :-)
<br>
<p>I reverted it so the repo can build again
<br>
<p>On Jul 12, 2014, at 10:23 AM, Mike Dubman &lt;miked_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; From repo
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Jul 12, 2014 7:59 PM, &quot;Ralph Castain&quot; &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; Just checked out the tarball and it builds fine for me - did you build this from the tarball, or from the repo?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Jul 12, 2014, at 9:29 AM, Mike Dubman &lt;miked_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[8]: Entering directory `/hpc/newhome/hpcuser/workspace/hpc-internal-tools.git/build/dist-ompi-mellanox-v1.8-1.8/master/ompi/contrib/vt/vt/extlib/otf/tools/otfinfo'
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[8]: Leaving directory `/hpc/newhome/hpcuser/workspace/hpc-internal-tools.git/build/dist-ompi-mellanox-v1.8-1.8/master/ompi/contrib/vt/vt/extlib/otf/tools/otfinfo'
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; (cd otfmerge &amp;&amp; make  top_distdir=../../../../../../../../openmpi-1.8.2rc1 distdir=../../../../../../../../openmpi-1.8.2rc1/ompi/contrib/vt/vt/extlib/otf/tools/otfmerge \
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;      am__remove_distdir=: am__skip_length_check=: am__skip_mode_fix=: distdir)
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[8]: Entering directory `/hpc/newhome/hpcuser/workspace/hpc-internal-tools.git/build/dist-ompi-mellanox-v1.8-1.8/master/ompi/contrib/vt/vt/extlib/otf/tools/otfmerge'
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Makefile:530: .deps/otfmerge-handler.Po: No such file or directory
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Makefile:531: .deps/otfmerge-otfmerge.Po: No such file or directory
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[8]: *** No rule to make target `.deps/otfmerge-otfmerge.Po'.  Stop.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[8]: Leaving directory `/hpc/newhome/hpcuser/workspace/hpc-internal-tools.git/build/dist-ompi-mellanox-v1.8-1.8/master/ompi/contrib/vt/vt/extlib/otf/tools/otfmerge'
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[7]: *** [distdir] Error 1
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[7]: Leaving directory `/hpc/newhome/hpcuser/workspace/hpc-internal-tools.git/build/dist-ompi-mellanox-v1.8-1.8/master/ompi/contrib/vt/vt/extlib/otf/tools'
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[6]: *** [distdir] Error 1
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[6]: Leaving directory `/hpc/newhome/hpcuser/workspace/hpc-internal-tools.git/build/dist-ompi-mellanox-v1.8-1.8/master/ompi/contrib/vt/vt/extlib/otf'
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[5]: *** [distdir] Error 1
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[5]: Leaving directory `/hpc/newhome/hpcuser/workspace/hpc-internal-tools.git/build/dist-ompi-mellanox-v1.8-1.8/master/ompi/contrib/vt/vt/extlib'
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[4]: *** [distdir] Error 1
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[4]: Leaving directory `/hpc/newhome/hpcuser/workspace/hpc-internal-tools.git/build/dist-ompi-mellanox-v1.8-1.8/master/ompi/contrib/vt/vt'
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[3]: *** [distdir] Error 1
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[3]: Leaving directory `/hpc/newhome/hpcuser/workspace/hpc-internal-tools.git/build/dist-ompi-mellanox-v1.8-1.8/master/ompi/contrib/vt'
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; make[2]: *** [distdir] Error 1
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;  
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;  
</span><br>
<span class="quotelev2">&gt;&gt;  
</span><br>
<span class="quotelev2">&gt;&gt;  
</span><br>
<span class="quotelev2">&gt;&gt; On Jul 11, 2014 11:28 PM, &quot;Ralph Castain&quot; &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; Sorry - gave the link to my test page :-)
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/software/ompi/v1.8/">http://www.open-mpi.org/software/ompi/v1.8/</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Jul 11, 2014, at 11:46 AM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Hi folks
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; I've posted the first release candidate for 1.8.2 - please test!!
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; <a href="http://localhost/~rhc/ompi-www/software/ompi/v1.8/">http://localhost/~rhc/ompi-www/software/ompi/v1.8/</a>
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Ralph
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/07/15113.php">http://www.open-mpi.org/community/lists/devel/2014/07/15113.php</a>
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/07/15124.php">http://www.open-mpi.org/community/lists/devel/2014/07/15124.php</a>
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
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/07/15126.php">http://www.open-mpi.org/community/lists/devel/2014/07/15126.php</a>
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/07/15127.php">http://www.open-mpi.org/community/lists/devel/2014/07/15127.php</a>
</span><br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-15128/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="15129.php">Mike Dubman: "Re: [OMPI devel] 1.8.2rc1 available for test"</a>
<li><strong>Previous message:</strong> <a href="15127.php">Mike Dubman: "Re: [OMPI devel] 1.8.2rc1 available for test"</a>
<li><strong>In reply to:</strong> <a href="15127.php">Mike Dubman: "Re: [OMPI devel] 1.8.2rc1 available for test"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="15129.php">Mike Dubman: "Re: [OMPI devel] 1.8.2rc1 available for test"</a>
<li><strong>Reply:</strong> <a href="15129.php">Mike Dubman: "Re: [OMPI devel] 1.8.2rc1 available for test"</a>
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
