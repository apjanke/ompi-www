<?
$subject_val = "Re: [OMPI devel] Mtt Fails";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Apr 22 09:28:39 2009" -->
<!-- isoreceived="20090422132839" -->
<!-- sent="Wed, 22 Apr 2009 16:28:33 +0300" -->
<!-- isosent="20090422132833" -->
<!-- name="Lenny Verkhovsky" -->
<!-- email="lenny.verkhovsky_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Mtt Fails" -->
<!-- id="453d39990904220628k4f171654vf87e49f95a90fdb5_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="71d2d8cc0904220615w68bbaf77m482e1ff321fb8d8a_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Mtt Fails<br>
<strong>From:</strong> Lenny Verkhovsky (<em>lenny.verkhovsky_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-04-22 09:28:33
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5854.php">Jeff Squyres: "Re: [OMPI devel] Mtt Fails"</a>
<li><strong>Previous message:</strong> <a href="5852.php">Ralph Castain: "Re: [OMPI devel] Mtt Fails"</a>
<li><strong>In reply to:</strong> <a href="5852.php">Ralph Castain: "Re: [OMPI devel] Mtt Fails"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5854.php">Jeff Squyres: "Re: [OMPI devel] Mtt Fails"</a>
<li><strong>Reply:</strong> <a href="5854.php">Jeff Squyres: "Re: [OMPI devel] Mtt Fails"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
As I understood it will be fixed in 1.3.2.
<br>
<p>thanks, Ralph.
<br>
<p>On Wed, Apr 22, 2009 at 4:15 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; If you look at the code in that test, it has a --openmpi option you are
</span><br>
<span class="quotelev1">&gt; supposed to set so that it runs properly for OMPI. Not sure if that's the
</span><br>
<span class="quotelev1">&gt; problem here or not.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Did this used to run?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Note also that the test has a hardcoded version of 2.0 in it. I'm not sure
</span><br>
<span class="quotelev1">&gt; if that could also be part of the problem.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;   On Wed, Apr 22, 2009 at 6:04 AM, Lenny Verkhovsky &lt;
</span><br>
<span class="quotelev1">&gt; lenny.verkhovsky_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt;   Hi all,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I have MTT failures complaining about MPI2, but before I am opening a
</span><br>
<span class="quotelev2">&gt;&gt; ticket, pls, have a look.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; $/hpc/home/USERS/mtt/mtt-scratch/20090421220402_moo1_17859/installs/oma-nightly-1.3--gcc--1.3r404/install/bin/mpirun
</span><br>
<span class="quotelev2">&gt;&gt; --host moo1,moo1,moo2,moo2,moo3,moo3,moo4,moo4 -np 8 --mca
</span><br>
<span class="quotelev2">&gt;&gt; btl_openib_use_eager_rdma 1 --mca btl self,sm,openib
</span><br>
<span class="quotelev2">&gt;&gt; /hpc/home/USERS/mtt/mtt-scratch/20090421220402_moo1_17859/installs/ogHK/tests/mpicxx/cxx-test-suite/src/mpi2c++_dynamics_test
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; MPI-2 C++ bindings MPI-2 dynamics test suite
</span><br>
<span class="quotelev2">&gt;&gt; ------------------------------
</span><br>
<span class="quotelev2">&gt;&gt; Open MPI Version 2.0
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; *** There are delays built into some of the tests
</span><br>
<span class="quotelev2">&gt;&gt; *** Please let them complete
</span><br>
<span class="quotelev2">&gt;&gt; *** No test should take more than 10 seconds
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Test suite running on 8 nodes
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; * MPI-2 Dynamics...
</span><br>
<span class="quotelev2">&gt;&gt;   - Looking for &quot;connect&quot; program... PASS
</span><br>
<span class="quotelev2">&gt;&gt;   - MPI::Get_version... FAIL
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; MPI2C++ test suite: NODE 0 - 2) ERROR in MPI::Get_version should be 2.1
</span><br>
<span class="quotelev2">&gt;&gt; MPI2C++ test suite: all ranks failed
</span><br>
<span class="quotelev2">&gt;&gt; MPI2C++ test suite: minor error
</span><br>
<span class="quotelev2">&gt;&gt; MPI2C++ test suite: attempting to finalize...
</span><br>
<span class="quotelev2">&gt;&gt; MPI2C++ test suite: terminated
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
<span class="quotelev1">&gt;
</span><br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-5853/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5854.php">Jeff Squyres: "Re: [OMPI devel] Mtt Fails"</a>
<li><strong>Previous message:</strong> <a href="5852.php">Ralph Castain: "Re: [OMPI devel] Mtt Fails"</a>
<li><strong>In reply to:</strong> <a href="5852.php">Ralph Castain: "Re: [OMPI devel] Mtt Fails"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5854.php">Jeff Squyres: "Re: [OMPI devel] Mtt Fails"</a>
<li><strong>Reply:</strong> <a href="5854.php">Jeff Squyres: "Re: [OMPI devel] Mtt Fails"</a>
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
