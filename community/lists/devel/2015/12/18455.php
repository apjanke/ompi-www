<?
$subject_val = "Re: [OMPI devel] v1.10: mpirun --host xxx behaviour";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Dec 23 23:21:56 2015" -->
<!-- isoreceived="20151224042156" -->
<!-- sent="Thu, 24 Dec 2015 13:21:54 +0900" -->
<!-- isosent="20151224042154" -->
<!-- name="Gilles Gouaillardet" -->
<!-- email="gilles_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] v1.10: mpirun --host xxx behaviour" -->
<!-- id="567B72E2.9090905_at_rist.or.jp" -->
<!-- charset="utf-8" -->
<!-- inreplyto="1030AAB9-41C7-4626-A33A-617B1BB260D6_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] v1.10: mpirun --host xxx behaviour<br>
<strong>From:</strong> Gilles Gouaillardet (<em>gilles_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-12-23 23:21:54
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18456.php">Gilles Gouaillardet: "Re: [OMPI devel] PMIX on 2.0.0rc1 and cygwin build"</a>
<li><strong>Previous message:</strong> <a href="18454.php">Ralph Castain: "[OMPI devel] OMPI 1.10.2rc2"</a>
<li><strong>In reply to:</strong> <a href="18451.php">Ralph Castain: "Re: [OMPI devel] v1.10: mpirun --host xxx behaviour"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Ralph,
<br>
<p>the behaviour is slightly different between v1.10 and {v2.x,master}, 
<br>
here are the full details on my centos 7 vm with 4 cores.
<br>
<p>if i simply run
<br>
mpirun ./hw
<br>
then 4 tasks are created with the three ompi versions
<br>
<p>if i run
<br>
mpirun --host localhost ./hw
<br>
then 1 task is created with the three ompi versions
<br>
<p>now if i run
<br>
mpirun --host localhost -np 2 ./hw
<br>
v1.10 fails :
<br>
--------------------------------------------------------------------------
<br>
There are not enough slots available in the system to satisfy the 2 slots
<br>
that were requested by the application:
<br>
&nbsp;&nbsp;&nbsp;./hw
<br>
<p>Either request fewer slots for your application, or make more slots 
<br>
available
<br>
for use.
<br>
--------------------------------------------------------------------------
<br>
but v2.x and master success and 2 tasks are created
<br>
<p>more surprisingly, if i run
<br>
mpirun --host localhost -np 5 ./hw
<br>
/* 4 cores available but 5 tasks requested */
<br>
v1.10 fails with the same previous error message
<br>
*but*
<br>
v2.x and master success without any complain, and even if i did not use 
<br>
the --oversubscribe flag
<br>
<p>last but not least, with v2.x and master, i can do
<br>
mpirun --host localhost:4 ./hw
<br>
and 4 tasks are created
<br>
*but*
<br>
v1.10 fails with the following error message
<br>
<p>$ mpirun --host localhost:4 ./hw
<br>
ssh: Could not resolve hostname localhost:4: Name or service not known
<br>
--------------------------------------------------------------------------
<br>
ORTE was unable to reliably start one or more daemons.
<br>
This usually is caused by:
<br>
<p><p><p>as far as i am concerned, i'd rather have
<br>
mpirun --host localhost ./hw
<br>
and
<br>
mpirun ./hw
<br>
behave the same (e.g. 4 tasks are created)
<br>
but i guess this is just a matter of taste ...
<br>
<p>that being said, since
<br>
mpirun --host localhost ./hw
<br>
does create only one task, i think very unconvenient v1.10 does not 
<br>
support setting the number of slots on the command line, e.g.
<br>
mpirun --host localhost:4 ./hw
<br>
<p><p>shall i make a pr so v1.10 support --host &lt;hostname&gt;:&lt;slots&gt; ?
<br>
<p>Cheers,
<br>
<p>Gilles
<br>
<p>On 12/22/2015 11:26 PM, Ralph Castain wrote:
<br>
<span class="quotelev1">&gt; That is the behavior folks asked for, yes. I personally don&#226;&#128;&#153;t care either way, but you&#226;&#128;&#153;ll find that the master and 2.x branch all work that way too.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Dec 22, 2015, at 12:49 AM, Gilles Gouaillardet &lt;gilles_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Ralph,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; i (re)discovered an old and odd behaviour in v1.10, which was discussed in <a href="https://github.com/open-mpi/ompi-release/pull/664">https://github.com/open-mpi/ompi-release/pull/664</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; when running
</span><br>
<span class="quotelev2">&gt;&gt; mpirun --host xxx ...
</span><br>
<span class="quotelev2">&gt;&gt; mpirun v1.10 assumes one slot per host.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; consequently, on my vm with 4 cores
</span><br>
<span class="quotelev2">&gt;&gt; mpirun -np 2 ./helloworld_mpi
</span><br>
<span class="quotelev2">&gt;&gt; works fine
</span><br>
<span class="quotelev2">&gt;&gt; but
</span><br>
<span class="quotelev2">&gt;&gt; mpirun -np 2 --host localhost ./helloworld_mpi
</span><br>
<span class="quotelev2">&gt;&gt; fails with the following error message
</span><br>
<span class="quotelev2">&gt;&gt; &quot;There are not enough slots available ...&quot;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; if i understand correctly, and thought this is a different behaviour from v1.8, this is compliant with the definition of the --host option.
</span><br>
<span class="quotelev2">&gt;&gt; it seems you were open to some change.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; did you have time to think about it ?
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Cheers,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Gilles
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2015/12/18450.php">http://www.open-mpi.org/community/lists/devel/2015/12/18450.php</a>
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2015/12/18451.php">http://www.open-mpi.org/community/lists/devel/2015/12/18451.php</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18456.php">Gilles Gouaillardet: "Re: [OMPI devel] PMIX on 2.0.0rc1 and cygwin build"</a>
<li><strong>Previous message:</strong> <a href="18454.php">Ralph Castain: "[OMPI devel] OMPI 1.10.2rc2"</a>
<li><strong>In reply to:</strong> <a href="18451.php">Ralph Castain: "Re: [OMPI devel] v1.10: mpirun --host xxx behaviour"</a>
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
