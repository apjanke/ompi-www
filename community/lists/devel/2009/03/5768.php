<?
$subject_val = "Re: [OMPI devel] SM init failures";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Mar 31 15:06:45 2009" -->
<!-- isoreceived="20090331190645" -->
<!-- sent="Tue, 31 Mar 2009 11:06:05 -0800" -->
<!-- isosent="20090331190605" -->
<!-- name="Eugene Loh" -->
<!-- email="Eugene.Loh_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] SM init failures" -->
<!-- id="49D2699D.9030608_at_sun.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="4B5D8E57-3A86-463A-9B02-169C3902EB2E_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] SM init failures<br>
<strong>From:</strong> Eugene Loh (<em>Eugene.Loh_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-03-31 15:06:05
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5769.php">Jeff Squyres: "[OMPI devel] mallopt fixes"</a>
<li><strong>Previous message:</strong> <a href="5767.php">Jeff Squyres: "Re: [OMPI devel] custom btl"</a>
<li><strong>In reply to:</strong> <a href="5764.php">Jeff Squyres: "Re: [OMPI devel] SM init failures"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5770.php">Jeff Squyres: "Re: [OMPI devel] SM init failures"</a>
<li><strong>Reply:</strong> <a href="5770.php">Jeff Squyres: "Re: [OMPI devel] SM init failures"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Jeff Squyres wrote:
<br>
<p><span class="quotelev1">&gt; On Mar 31, 2009, at 1:46 AM, Eugene Loh wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; FWIW, George found what looks like a race condition in the sm init
</span><br>
<span class="quotelev3">&gt;&gt; &gt; code today -- it looks like we don't call maffinity anywhere in the
</span><br>
<span class="quotelev3">&gt;&gt; &gt; sm  btl startup, so we're not actually guaranteed that the memory is
</span><br>
<span class="quotelev3">&gt;&gt; &gt; local  to any particular process(or) (!).  This race shouldn't cause
</span><br>
<span class="quotelev3">&gt;&gt; &gt; segvs,  though; it should only mean that memory is potentially  
</span><br>
<span class="quotelev2">&gt;&gt; farther
</span><br>
<span class="quotelev3">&gt;&gt; &gt; away  than we intended.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Is this that business that came up recently on one of these mail lists
</span><br>
<span class="quotelev2">&gt;&gt; about setting the memory node to -1 rather than using the value we  know
</span><br>
<span class="quotelev2">&gt;&gt; it should be?  In mca_mpool_sm_alloc(), I do see a call to
</span><br>
<span class="quotelev2">&gt;&gt; opal_maffinity_base_bind().
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; No, it was a different thing -- but we missed the call to maffinity 
</span><br>
<span class="quotelev1">&gt; in  mpool sm.  So that might make George's point moot (I see he still  
</span><br>
<span class="quotelev1">&gt; hasn't chimed in yet on this thread, perhaps that's why ;-) ).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; To throw a little flame on the fire -- I notice the following from an  
</span><br>
<span class="quotelev1">&gt; MTT run last night:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] *** Process received signal ***
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] Signal: Segmentation fault (11)
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] Signal code: Invalid permissions (2)
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] Failing at address: 0x2a98a3f080
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [ 0] /lib64/tls/libpthread.so.0 [0x2a960695b0]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [ 1] /home/jsquyres/bogus/lib/openmpi/ 
</span><br>
<span class="quotelev1">&gt; mca_btl_sm.so [0x2a97f22619]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [ 2] /home/jsquyres/bogus/lib/openmpi/ 
</span><br>
<span class="quotelev1">&gt; mca_btl_sm.so [0x2a97f225ee]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [ 3] /home/jsquyres/bogus/lib/openmpi/ 
</span><br>
<span class="quotelev1">&gt; mca_btl_sm.so [0x2a97f22946]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [ 4] /home/jsquyres/bogus/lib/libopen-pal.so. 
</span><br>
<span class="quotelev1">&gt; 0(opal_progress+0xa9) [0x2a95bbc078]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [ 5] /home/jsquyres/bogus/lib/libmpi.so.0  
</span><br>
<span class="quotelev1">&gt; [0x2a95831324]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [ 6] /home/jsquyres/bogus/lib/libmpi.so.0  
</span><br>
<span class="quotelev1">&gt; [0x2a9583185b]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [ 7] /home/jsquyres/bogus/lib/openmpi/ 
</span><br>
<span class="quotelev1">&gt; mca_coll_tuned.so [0x2a987e45be]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [ 8] /home/jsquyres/bogus/lib/openmpi/ 
</span><br>
<span class="quotelev1">&gt; mca_coll_tuned.so [0x2a987f160b]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [ 9] /home/jsquyres/bogus/lib/openmpi/ 
</span><br>
<span class="quotelev1">&gt; mca_coll_tuned.so [0x2a987e4c2e]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [10] /home/jsquyres/bogus/lib/libmpi.so. 
</span><br>
<span class="quotelev1">&gt; 0(PMPI_Barrier+0xd7) [0x2a9585987f]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [11] src/MPI_Type_extent_types_c(main+0xa20)  
</span><br>
<span class="quotelev1">&gt; [0x402f88]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [12] /lib64/tls/libc.so.6(__libc_start_main+0xdb)  
</span><br>
<span class="quotelev1">&gt; [0x2a9618e3fb]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] [13] src/MPI_Type_extent_types_c [0x4024da]
</span><br>
<span class="quotelev1">&gt; [svbu-mpi004:17172] *** End of error message ***
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Notice the &quot;invalid permissions&quot; message.  I didn't notice that  
</span><br>
<span class="quotelev1">&gt; before, but perhaps I wasn't looking.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I also see that this is under coll_tuned, not coll_hierarch (i.e.,  
</span><br>
<span class="quotelev1">&gt; *not* during MPI_INIT -- it's in a barrier).
</span><br>
<p>Yes, actually these happen &quot;a lot&quot;.  (I've been spending time looking at 
<br>
IU_Sif/r20880 MTT stack traces.)
<br>
<p>If the stack trace has MPI_Init in it, it seems to be going through 
<br>
mca_coll_hierarch.
<br>
<p>Otherwise, the seg fault is in a collective call as you note -- could be 
<br>
MPI_Allgather, Barrier, Bcast, and I imagine there are others -- then 
<br>
mca_coll_tuned and eventually down to the sm BTL.
<br>
<p>There are also quite a bit of orphaned(?) stack traces.  Just a segfault 
<br>
and a single-level stack a la
<br>
[ 0] /lib/libpthread.so
<br>
<p><span class="quotelev3">&gt;&gt; &gt; The central question is: does &quot;first touch&quot; mean both read and
</span><br>
<span class="quotelev3">&gt;&gt; &gt; write?   I.e., is the first process that either reads *or* writes  
</span><br>
<span class="quotelev2">&gt;&gt; to a
</span><br>
<span class="quotelev3">&gt;&gt; &gt; given  location considered &quot;first touch&quot;?  Or is it only the first  
</span><br>
<span class="quotelev2">&gt;&gt; write?
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; So, maybe the strategy is to create the shared area, have each process
</span><br>
<span class="quotelev2">&gt;&gt; initialize its portion (FIFOs and free lists), have all processes  sync,
</span><br>
<span class="quotelev2">&gt;&gt; and then move on.  That way, you know all memory will be written by  the
</span><br>
<span class="quotelev2">&gt;&gt; appropriate owner before it's read by anyone else.  First-touch
</span><br>
<span class="quotelev2">&gt;&gt; ownership will be proper and we won't be dependent on zero-filled  
</span><br>
<span class="quotelev2">&gt;&gt; pages.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; That was what George was going at yesterday -- there's a section in  
</span><br>
<span class="quotelev1">&gt; the btl sm startup where you're setting up your own FIFOs.  But then  
</span><br>
<span class="quotelev1">&gt; there's a section later where you're looking at your peers' FIFOs.   
</span><br>
<span class="quotelev1">&gt; There's no synchronization between these two points -- when you're  
</span><br>
<span class="quotelev1">&gt; looking at your peers' FIFOs, you can tell if they're not setup yet 
</span><br>
<span class="quotelev1">&gt; by  if the peer's FIFO is NULL or not.  If it's NULL, you loop and 
</span><br>
<span class="quotelev1">&gt; try  again (until it's not NULL).  This is what George thought might 
</span><br>
<span class="quotelev1">&gt; be  &quot;bad&quot; from a maffinity standpoint -- but perhaps this is moot if 
</span><br>
<span class="quotelev1">&gt; mpool  sm is calling maffinity bind.
</span><br>
<p>The thing I was wondering about was memory barriers.  E.g., you 
<br>
initialize stuff and then post the FIFO pointer.  The other guy sees the 
<br>
FIFO pointer before the initialized memory.
<br>
<p><span class="quotelev2">&gt;&gt; The big question in my mind remains that we don't seem to know how to
</span><br>
<span class="quotelev2">&gt;&gt; reproduce the failure (segv) that we're trying to fix.  I, personally,
</span><br>
<span class="quotelev2">&gt;&gt; am reluctant to stick fixes into the code for problems I can't  observe.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Well, we *can* observe them -- I can reproduce them at a very low 
</span><br>
<span class="quotelev1">&gt; rate  in my MTT runs.  We just don't understand the problem yet to 
</span><br>
<span class="quotelev1">&gt; know how  to reproduce them manually.  To be clear: I'm violently 
</span><br>
<span class="quotelev1">&gt; agreeing with  you: I want to fix the problem, but it would be much 
</span><br>
<span class="quotelev1">&gt; mo' betta to  *know* that we fixed the problem rather than &quot;well, it 
</span><br>
<span class="quotelev1">&gt; doesn't seem to  be happening anymore.&quot;  :-)
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5769.php">Jeff Squyres: "[OMPI devel] mallopt fixes"</a>
<li><strong>Previous message:</strong> <a href="5767.php">Jeff Squyres: "Re: [OMPI devel] custom btl"</a>
<li><strong>In reply to:</strong> <a href="5764.php">Jeff Squyres: "Re: [OMPI devel] SM init failures"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5770.php">Jeff Squyres: "Re: [OMPI devel] SM init failures"</a>
<li><strong>Reply:</strong> <a href="5770.php">Jeff Squyres: "Re: [OMPI devel] SM init failures"</a>
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
