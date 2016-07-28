<? include("../../include/msg-header.inc"); ?>
<!-- received="Sun Oct 16 21:51:01 2005" -->
<!-- isoreceived="20051017025101" -->
<!-- sent="Sun, 16 Oct 2005 21:50:53 -0500" -->
<!-- isosent="20051017025053" -->
<!-- name="Brian Barrett" -->
<!-- email="brbarret_at_[hidden]" -->
<!-- subject="Re:  build system changes" -->
<!-- id="41B33966-5CA2-4343-A001-DCB8C4686234_at_open-mpi.org" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="670D059D-CCED-4DEC-8A8D-EACE329305F9_at_open-mpi.org" -->
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
<strong>From:</strong> Brian Barrett (<em>brbarret_at_[hidden]</em>)<br>
<strong>Date:</strong> 2005-10-16 21:50:53
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0451.php">George Bosilca: "Re:  build system changes"</a>
<li><strong>Previous message:</strong> <a href="0449.php">Brian Barrett: "build system changes"</a>
<li><strong>In reply to:</strong> <a href="0449.php">Brian Barrett: "build system changes"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0451.php">George Bosilca: "Re:  build system changes"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I forgot the whole point of the e-mail...  You'll need to autogen /  
<br>
configure / make after updating your subversion checkout.  Sorry  
<br>
about that :/.
<br>
<p>Brian
<br>
<p>On Oct 16, 2005, at 9:32 PM, Brian Barrett wrote:
<br>
<p><span class="quotelev1">&gt; Hi all -
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I made yet another round of changes to the build system this
</span><br>
<span class="quotelev1">&gt; weekend.  The goal was to improve the build time for Open MPI.  This
</span><br>
<span class="quotelev1">&gt; improvement should offer speedups for autogen, configure, and build.
</span><br>
<span class="quotelev1">&gt; I reduced the number of Makefiles produced by configure (and
</span><br>
<span class="quotelev1">&gt; therefore the number of Makefile.in files generated by Automake), by
</span><br>
<span class="quotelev1">&gt; using some interesting include features of Automake.  Rather than
</span><br>
<span class="quotelev1">&gt; building support libraries in each directory, everything is directly
</span><br>
<span class="quotelev1">&gt; folded into the project-level (opal,orte,ompi) library.  The
</span><br>
<span class="quotelev1">&gt; advantage is faster build time.  The disadvantage is that you can no
</span><br>
<span class="quotelev1">&gt; longer run &quot;make&quot; in ompi/proc (for instance).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; There is still one improvement along these lines that we can make.
</span><br>
<span class="quotelev1">&gt; Currently, we create a Makefile in both &lt;project&gt;/mca/&lt;framework&gt; and
</span><br>
<span class="quotelev1">&gt; &lt;project&gt;/mca/&lt;framework&gt;/base.  It should be possible to eliminate
</span><br>
<span class="quotelev1">&gt; the one in base, reducing the number of Makefiles created even
</span><br>
<span class="quotelev1">&gt; further.  But I ran out of time this weekend, so it's going to have
</span><br>
<span class="quotelev1">&gt; to wait a bit.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Brian
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt;    Brian Barrett
</span><br>
<span class="quotelev1">&gt;    Open MPI developer
</span><br>
<span class="quotelev1">&gt;    <a href="http://www.open-mpi.org/">http://www.open-mpi.org/</a>
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
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0451.php">George Bosilca: "Re:  build system changes"</a>
<li><strong>Previous message:</strong> <a href="0449.php">Brian Barrett: "build system changes"</a>
<li><strong>In reply to:</strong> <a href="0449.php">Brian Barrett: "build system changes"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0451.php">George Bosilca: "Re:  build system changes"</a>
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
