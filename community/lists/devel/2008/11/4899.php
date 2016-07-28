<?
$subject_val = "Re: [OMPI devel] SM backing file size";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Nov 14 09:41:57 2008" -->
<!-- isoreceived="20081114144157" -->
<!-- sent="Fri, 14 Nov 2008 09:41:51 -0500" -->
<!-- isosent="20081114144151" -->
<!-- name="Richard Graham" -->
<!-- email="rlgraham_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] SM backing file size" -->
<!-- id="C542F85F.2B3FB%rlgraham_at_ornl.gov" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="67C30CEF-142E-433A-84D2-224F3A62A33F_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] SM backing file size<br>
<strong>From:</strong> Richard Graham (<em>rlgraham_at_[hidden]</em>)<br>
<strong>Date:</strong> 2008-11-14 09:41:51
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="4900.php">Ralph Castain: "Re: [OMPI devel] SM backing file size"</a>
<li><strong>Previous message:</strong> <a href="4898.php">Jeff Squyres: "Re: [OMPI devel] SM backing file size"</a>
<li><strong>In reply to:</strong> <a href="4898.php">Jeff Squyres: "Re: [OMPI devel] SM backing file size"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="4900.php">Ralph Castain: "Re: [OMPI devel] SM backing file size"</a>
<li><strong>Reply:</strong> <a href="4900.php">Ralph Castain: "Re: [OMPI devel] SM backing file size"</a>
<li><strong>Reply:</strong> <a href="4901.php">Tim Mattox: "Re: [OMPI devel] SM backing file size"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Just a few comments:
<br>
&nbsp;&nbsp;- not sure what sort of alternative memory approach is being considered.
<br>
The current approach was selected for two reasons:
<br>
&nbsp;&nbsp;&nbsp;&nbsp;- If something like anonymous memory is being used, one can only inherit
<br>
access to the shared files, so one process needs
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;set up the shared memory regions, and then fork() the procs that will
<br>
use it.  This usually implies that to do this portably,
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;this needs to happen inside of MPI_Init(), so up to that stage only
<br>
one process runs on each host.  Also, unrelated procs can&#185;t
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;access this memory &#173; can&#185;t use this in the context of Fault Tolerance.
<br>
&nbsp;&nbsp;- The approach used here is very efficient for small systems, so
<br>
alternatives should be added to what is in place here, so we
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;don&#185;t loose the performance potential on small SMP&#185;s, which still
<br>
describes the vast majority of systems.
<br>
<p>Rich
<br>
<p><p>On 11/14/08 9:22 AM, &quot;Jeff Squyres&quot; &lt;jsquyres_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Ok.  Should be pretty easy to test/simulate to figure out what's going
</span><br>
<span class="quotelev1">&gt; on -- e.g., whether it's segv'ing in MPI_INIT or the first MPI_SEND.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Nov 14, 2008, at 9:19 AM, Ralph Castain wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Until we do complete the switch, and for systems that do not support
</span><br>
<span class="quotelev3">&gt;&gt; &gt; the alternate type of shared memory (I believe it is only Linux?), I
</span><br>
<span class="quotelev3">&gt;&gt; &gt; truly believe we should do something nicer than segv.
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Just to clarify: I know the segv case was done with paffinity set,
</span><br>
<span class="quotelev3">&gt;&gt; &gt; and believe both cases were done that way. In the first case, I was
</span><br>
<span class="quotelev3">&gt;&gt; &gt; told that the segv hit when they did MPI_Send, but I did not
</span><br>
<span class="quotelev3">&gt;&gt; &gt; personally verify that claim - it could be that it hit during
</span><br>
<span class="quotelev3">&gt;&gt; &gt; maffinity binding if, as you suggest, we actually touch the page at
</span><br>
<span class="quotelev3">&gt;&gt; &gt; that time.
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Ralph
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; On Nov 14, 2008, at 7:07 AM, Jeff Squyres wrote:
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; It's been a looooong time since I've looked at the sm code; Eugene
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; has looked at it much more in-depth recently than I have.  But I'm
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; guessing we *haven't* checked this stuff to abort nicely in such
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; error conditions.  We might very well succeed in the mmap but then
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; segv later when the memory isn't actually available.  Perhaps we
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; should try to touch every page first to ensure that it's actually
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; there...?  (I'm pretty sure we do this when using paffinity to
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; ensure to maffinity bind memory to processors -- perhaps we're not
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; doing that in the !paffinity case?)
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; Additionally, another solution might well be what Tim has long
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; advocated: switch to the other type of shared memory on systems
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; that support auto-pruning it when all processes die, and/or have
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; the orted kill it when all processes die.  Then a) we're not
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; dependent on the filesystem free space, and b) we're not writing
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; all the dirty pages to disk when the processes exit.
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; On Nov 14, 2008, at 8:42 AM, Ralph Castain wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; Hi Eugene
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; I too am interested - I think we need to do something about the sm
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; backing file situation as larger core machines are slated to
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; become more prevalent shortly.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; I appreciate your info on the sizes and controls. One other
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; question: what happens when there isn't enough memory to support
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; all this? Are we smart enough to detect this situation? Does the
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; sm subsystem quietly shut down? Warn and shut down? Segfault?
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; I have two examples so far:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; 1. using a ramdisk, /tmp was set to 10MB. OMPI was run on a single
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; node, 2ppn, with btl=openib,sm,self. The program started, but
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; segfaulted on the first MPI_Send. No warnings were printed.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; 2. again with a ramdisk, /tmp was reportedly set to 16MB
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; (unverified - some uncertainty, could be have been much larger).
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; OMPI was run on multiple nodes, 16ppn, with btl=openib,sm,self.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; The program ran to completion without errors or warning. I don't
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; know the communication pattern - could be no local comm was
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; performed, though that sounds doubtful.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; If someone doesn't know, I'll have to dig into the code and figure
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; out the response - just hoping that someone can spare me the pain.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; Thanks
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; Ralph
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; On Nov 13, 2008, at 3:21 PM, Eugene Loh wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; Ralph Castain wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;&gt; As has frequently been commented upon at one time or another,
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;&gt; the  shared memory backing file can be quite huge. There used to
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;&gt; be a param  for controlling this size, but I can't find it in
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;&gt; 1.3 - or at least,  the name or method for controlling file size
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;&gt; has morphed into  something I don't recognize.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;&gt; Can someone more familiar with that subsystem point me to one or
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;&gt; more  params that will allow us to control the size of that
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;&gt; file? It is  swamping our systems and causing OMPI to segfault.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; Sounds like you've already gotten your answers, but I'll add my
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; $0.02 anyhow.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; The file size is the number of local processes (call it n) times
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; mpool_sm_per_peer_size (default 32M), but with a minimum of
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; mpool_sm_min_size (default 128M) and a maximum of
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; mpool_sm_max_size (default 2G?  256M?).  So, you can tweak those
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; parameters to control file size.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; Another issue is possibly how small a backing file you can get
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; away with.  That is, just forcing the file to be smaller may not
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; be enough since your job may no longer run.  The backing file
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; seems to be used mainly by:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; *) eager-fragment free lists:  We start with enough eager
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; fragments so that we could have two per connection.  So, you
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; could bump the sm eager size down if you need to shoehorn a job
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; into a very small backing file.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; *) large-fragment free lists:  We start with 8*n large
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; fragments.  If this term plagues you, you can bump the sm chunk
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; size down or reduce the value of 8 (using btl_sm_free_list_num, I
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; think).
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; *) FIFOs:  The code tries to align a number of things on pagesize
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; boundaries, so you end up with about 3*n*n*pagesize overhead
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; here.  If this term is causing you problems, you're stuck (unless
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; you modify OMPI).
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; I'm interested in this subject!  :^)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt; &gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; --
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; Cisco Systems
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt; &gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; Cisco Systems
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
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-4899/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="4900.php">Ralph Castain: "Re: [OMPI devel] SM backing file size"</a>
<li><strong>Previous message:</strong> <a href="4898.php">Jeff Squyres: "Re: [OMPI devel] SM backing file size"</a>
<li><strong>In reply to:</strong> <a href="4898.php">Jeff Squyres: "Re: [OMPI devel] SM backing file size"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="4900.php">Ralph Castain: "Re: [OMPI devel] SM backing file size"</a>
<li><strong>Reply:</strong> <a href="4900.php">Ralph Castain: "Re: [OMPI devel] SM backing file size"</a>
<li><strong>Reply:</strong> <a href="4901.php">Tim Mattox: "Re: [OMPI devel] SM backing file size"</a>
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
