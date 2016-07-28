<? include("../../include/msg-header.inc"); ?>
<!-- received="Wed Sep  6 09:38:40 2006" -->
<!-- isoreceived="20060906133840" -->
<!-- sent="Wed, 06 Sep 2006 09:38:25 -0400" -->
<!-- isosent="20060906133825" -->
<!-- name="Jeff Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [Open MPI] #334: Building with Libtool 2.1a fails to run OpenIB BTL" -->
<!-- id="C1244791.258C1%jsquyres_at_cisco.com" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="20060906130539.GF31632_at_iam.uni-bonn.de" -->
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
<strong>From:</strong> Jeff Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2006-09-06 09:38:25
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="1033.php">Jeff Squyres: "Re: [OMPI devel] [Open MPI] #334: Building with Libtool 2.1a fails to run OpenIB BTL"</a>
<li><strong>Previous message:</strong> <a href="1031.php">Ralf Wildenhues: "Re: [OMPI devel] [Open MPI] #334: Building with Libtool 2.1a fails	to run OpenIB BTL"</a>
<li><strong>In reply to:</strong> <a href="1029.php">Ralf Wildenhues: "Re: [OMPI devel] [Open MPI] #334: Building with Libtool 2.1a fails to run	OpenIB BTL"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
On 9/6/06 9:05 AM, &quot;Ralf Wildenhues&quot; &lt;Ralf.Wildenhues_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev2">&gt;&gt;  I was testing with a trivial &quot;hello world&quot; MPI application; i.e., one that
</span><br>
<span class="quotelev2">&gt;&gt;  I had compiled with mpicc and was running with &quot;mpirun -np 2 --mca btl
</span><br>
<span class="quotelev2">&gt;&gt;  openib hello&quot;.  Hence, I was testing against installed trees of Open MPI.
</span><br>
<span class="quotelev2">&gt;&gt;  I took care to &quot;rm -rf&quot; the installation tree before testing each so that
</span><br>
<span class="quotelev2">&gt;&gt;  there would be no kruft left from prior installs.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; OK, I can only assume that with 1.5.22, some code links against
</span><br>
<span class="quotelev1">&gt; libibverbs, or loads it earlier at runtime, so that the symbol is
</span><br>
<span class="quotelev1">&gt; present.  In any case I wonder why mthca.so isn't linked directly
</span><br>
<span class="quotelev1">&gt; against libibverbs (maybe useful to suggest that to upstream).
</span><br>
<p>I'm not sure.  I think it's a plugin; I'll ask.
<br>
&nbsp;
<br>
<span class="quotelev1">&gt; To find out the culprit, here's a couple of quick (well) ways:
</span><br>
<span class="quotelev1">&gt;   diff build-with-lt1.5/Makefile build-with-lt2.1a/Makefile
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; and look for differences in library link variables.  Otherwise, the
</span><br>
<span class="quotelev1">&gt; config.log outputs should give clues.
</span><br>
<p>I did that early in the ticket and didn't see much of a difference.
<br>
However, while typing this, Gleb just replied about RTLD_GLOBAL.  I'll go
<br>
comment on that...
<br>
&nbsp;
<br>
<span class="quotelev1">&gt; To give you some more hints for possible causes: ompi_info could have a
</span><br>
<span class="quotelev1">&gt; different set of RPATH entries, or different NEEDED libraries than your
</span><br>
<span class="quotelev1">&gt; test executable; if any of those cause libibverbs.so to be loaded, then
</span><br>
<span class="quotelev1">&gt; the symbol would be visible already.  Maybe your test executables even
</span><br>
<span class="quotelev1">&gt; have different RPATHs or NEEDED libs (find out with 'objdump -p' and
</span><br>
<span class="quotelev1">&gt; ldd)?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;  I've attached 2 tarballs to the bug (you have to go to the URL of the bug
</span><br>
<span class="quotelev2">&gt;&gt;  to get them; they are not included in the mails):
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; If there are tarballs available at
</span><br>
<span class="quotelev1">&gt; <a href="http://svn.open-mpi.org/trac/ompi/ticket/334">http://svn.open-mpi.org/trac/ompi/ticket/334</a>, then I'm too blind to find
</span><br>
<span class="quotelev1">&gt; them.  Would that be elsewhere?
</span><br>
<p>It's because I'm a bozo and forgot to attach them.  They're now near the top
<br>
of the ticket in the &quot;Attachments&quot; section.  Sorry about that...
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://svn.open-mpi.org/trac/ompi/ticket/334">http://svn.open-mpi.org/trac/ompi/ticket/334</a>
<br>
<p><pre>
-- 
Jeff Squyres
Server Virtualization Business Unit
Cisco Systems
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="1033.php">Jeff Squyres: "Re: [OMPI devel] [Open MPI] #334: Building with Libtool 2.1a fails to run OpenIB BTL"</a>
<li><strong>Previous message:</strong> <a href="1031.php">Ralf Wildenhues: "Re: [OMPI devel] [Open MPI] #334: Building with Libtool 2.1a fails	to run OpenIB BTL"</a>
<li><strong>In reply to:</strong> <a href="1029.php">Ralf Wildenhues: "Re: [OMPI devel] [Open MPI] #334: Building with Libtool 2.1a fails to run	OpenIB BTL"</a>
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
