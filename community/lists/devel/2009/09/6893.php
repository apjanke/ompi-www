<?
$subject_val = "Re: [OMPI devel] bug?";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Sep 25 10:56:21 2009" -->
<!-- isoreceived="20090925145621" -->
<!-- sent="Fri, 25 Sep 2009 07:57:20 -0700" -->
<!-- isosent="20090925145720" -->
<!-- name="Eugene Loh" -->
<!-- email="Eugene.Loh_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] bug?" -->
<!-- id="4ABCDA50.5000508_at_sun.com" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="2280732C-FD52-42EA-A52D-B6852011F760_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] bug?<br>
<strong>From:</strong> Eugene Loh (<em>Eugene.Loh_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-09-25 10:57:20
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="6894.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r22014"</a>
<li><strong>Previous message:</strong> <a href="6892.php">Ralph Castain: "Re: [OMPI devel] bug?"</a>
<li><strong>In reply to:</strong> <a href="6892.php">Ralph Castain: "Re: [OMPI devel] bug?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2009/10/6923.php">Lenny Verkhovsky: "Re: [OMPI devel] bug?"</a>
<li><strong>Reply:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2009/10/6923.php">Lenny Verkhovsky: "Re: [OMPI devel] bug?"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Thanks, filed as <a href="https://svn.open-mpi.org/trac/ompi/ticket/2030">https://svn.open-mpi.org/trac/ompi/ticket/2030</a>
<br>
<p>Ralph Castain wrote:
<br>
<p><span class="quotelev1">&gt; Circling some off-list comments back to the list...while we could and  
</span><br>
<span class="quotelev1">&gt; should error-out easier, this really isn't a supportable operation.  
</span><br>
<span class="quotelev1">&gt; What the cmd
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; mpirun -n 2 -slot-list 1,3 foo
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; appears to do is cause us to launch a 2-process job consisting of  
</span><br>
<span class="quotelev1">&gt; vpid=1 and vpid=3, as opposed to the normal vpid=0 and 1.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Not only is ORTE not prepared to handle this scenario, I believe it  
</span><br>
<span class="quotelev1">&gt; will cause problems in some areas within OMPI.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I can try to make it fail nicer - someone with more knowledge of the  
</span><br>
<span class="quotelev1">&gt; intended slot-list behavior would have to make it do what they  
</span><br>
<span class="quotelev1">&gt; actually intended, or at least explain what is supposed o happen.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Ralph
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Sep 24, 2009, at 7:03 PM, Eugene Loh wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; mpirun -V
</span><br>
<span class="quotelev2">&gt;&gt; mpirun (Open MPI) 1.4a1-1
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Ralph Castain wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Sigh - you really need to remember to tell us what version you're   
</span><br>
<span class="quotelev3">&gt;&gt;&gt; talking about.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Sep 24, 2009, at 5:39 PM, Eugene Loh wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I assume this is a bug?
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; % mpirun -np 2 -slot-list 1,3 hostname
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] [[455,0],0] ORTE_ERROR_LOG: Not found in file base/  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; odls_base_default_fns.c at line 875
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] *** Process received signal ***
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] Signal: Segmentation fault (11)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] Signal code: Address not mapped (1)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] Failing at address: 0x4c
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] [ 0] [0xffffe600]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] [ 1] /home/eugene/CTperf/test-CT821/paff_bug2/src/  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; myopt/lib/libopen-rte.so.0(orte_plm_base_launch_apps+0x78a)   
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [0xf7f8c206]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] [ 2] /home/eugene/CTperf/test-CT821/paff_bug2/src/  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; myopt/lib/openmpi/mca_plm_rsh.so [0xf7d13564]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] [ 3] mpirun [0x804b49d]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] [ 4] mpirun [0x804a456]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] [ 5] /lib/libc.so.6(__libc_start_main+0xdc)  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [0xf7d348ac]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] [ 6] mpirun(orte_daemon_recv+0x201) [0x804a3b1]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [saem9:10337] *** End of error message ***
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Segmentation fault
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
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
<li><strong>Next message:</strong> <a href="6894.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r22014"</a>
<li><strong>Previous message:</strong> <a href="6892.php">Ralph Castain: "Re: [OMPI devel] bug?"</a>
<li><strong>In reply to:</strong> <a href="6892.php">Ralph Castain: "Re: [OMPI devel] bug?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2009/10/6923.php">Lenny Verkhovsky: "Re: [OMPI devel] bug?"</a>
<li><strong>Reply:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2009/10/6923.php">Lenny Verkhovsky: "Re: [OMPI devel] bug?"</a>
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
