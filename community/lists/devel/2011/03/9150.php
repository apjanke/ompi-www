<?
$subject_val = "[OMPI devel] Too many open files (24)";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Mar 30 19:22:52 2011" -->
<!-- isoreceived="20110330232252" -->
<!-- sent="Wed, 30 Mar 2011 19:22:46 -0400" -->
<!-- isosent="20110330232246" -->
<!-- name="Timothy Stitt" -->
<!-- email="Timothy.Stitt.9_at_[hidden]" -->
<!-- subject="[OMPI devel] Too many open files (24)" -->
<!-- id="5D62B72F-41C2-4328-B023-CF10102DA772_at_nd.edu" -->
<!-- charset="us-ascii" -->
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
<strong>Subject:</strong> [OMPI devel] Too many open files (24)<br>
<strong>From:</strong> Timothy Stitt (<em>Timothy.Stitt.9_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-03-30 19:22:46
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9151.php">Samuel K. Gutierrez: "Re: [OMPI devel] Too many open files (24)"</a>
<li><strong>Previous message:</strong> <a href="9149.php">Hugo Meyer: "Re: [OMPI devel] Add child to another parent."</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9151.php">Samuel K. Gutierrez: "Re: [OMPI devel] Too many open files (24)"</a>
<li><strong>Reply:</strong> <a href="9151.php">Samuel K. Gutierrez: "Re: [OMPI devel] Too many open files (24)"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Dear OpenMPI developers,
<br>
<p>One of our users was running a benchmark on a 1032 core simulation. He had a successful run at 900 cores but when he stepped up to 1032 cores the job just stalled and his logs contained many occurrences of the following line:
<br>
<p>[d6copt368.crc.nd.edu][[25621,1],0][btl_tcp_component.c:885:mca_btl_tcp_component_accept_handler] accept() failed: Too many open files (24)
<br>
<p>The simulation has a single master task that communicates with all the other tasks to write out some I/O via the master. We are assuming the message is related to this bottleneck. Is there a 1024 limit on the number of open files/connections for instance?
<br>
<p>Can anyone confirm the meaning of this error and secondly provide a resolution that hopefully doesn't involve a code rewrite.
<br>
<p>Thanks in advance,
<br>
<p>Tim.
<br>
<p>Tim Stitt PhD (User Support Manager).
<br>
Center for Research Computing | University of Notre Dame |
<br>
P.O. Box 539, Notre Dame, IN 46556 | Phone:  574-631-5287 | Email: tstitt_at_[hidden]&lt;mailto:tstitt_at_[hidden]&gt;
<br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-9150/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9151.php">Samuel K. Gutierrez: "Re: [OMPI devel] Too many open files (24)"</a>
<li><strong>Previous message:</strong> <a href="9149.php">Hugo Meyer: "Re: [OMPI devel] Add child to another parent."</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9151.php">Samuel K. Gutierrez: "Re: [OMPI devel] Too many open files (24)"</a>
<li><strong>Reply:</strong> <a href="9151.php">Samuel K. Gutierrez: "Re: [OMPI devel] Too many open files (24)"</a>
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
