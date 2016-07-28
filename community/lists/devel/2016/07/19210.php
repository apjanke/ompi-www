<?
$subject_val = "Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Jul 14 09:47:52 2016" -->
<!-- isoreceived="20160714134752" -->
<!-- sent="Thu, 14 Jul 2016 09:47:24 -0400" -->
<!-- isosent="20160714134724" -->
<!-- name="Eric Chamberland" -->
<!-- email="Eric.Chamberland_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end" -->
<!-- id="0c6b7c35-45b4-6ccd-bf47-1c14dcb7f94f_at_giref.ulaval.ca" -->
<!-- charset="utf-8" -->
<!-- inreplyto="48FF8549-C1AC-4657-B914-C5FBFC875AF4_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end<br>
<strong>From:</strong> Eric Chamberland (<em>Eric.Chamberland_at_[hidden]</em>)<br>
<strong>Date:</strong> 2016-07-14 09:47:24
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="19211.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end"</a>
<li><strong>Previous message:</strong> <a href="19209.php">Eric Chamberland: "Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end"</a>
<li><strong>In reply to:</strong> <a href="19208.php">Ralph Castain: "Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="19211.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end"</a>
<li><strong>Reply:</strong> <a href="19211.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Thanks Ralph,
<br>
<p>It is now *much* better: all sequential executions are working... ;)
<br>
but I still have issues with a lot of parallel tests... (but not all)
<br>
<p>The SHA tested last night was c3c262b.
<br>
<p><a href="http://www.giref.ulaval.ca/~cmpgiref/dernier_ompi/2016.07.14.01h20m32s_config.log">http://www.giref.ulaval.ca/~cmpgiref/dernier_ompi/2016.07.14.01h20m32s_config.log</a>
<br>
<p>Here is what is the backtrace for most of these issues:
<br>
<p>*** Error in 
<br>
`/pmi/cmpbib/compilation_BIB_dernier_ompi/COMPILE_AUTO/GIREF/bin/Test.ProblemeGD.opt': 
<br>
free(): invalid pointer: 0x00007f9ab09c6020 ***
<br>
======= Backtrace: =========
<br>
/lib64/libc.so.6(+0x7277f)[0x7f9ab019b77f]
<br>
/lib64/libc.so.6(+0x78026)[0x7f9ab01a1026]
<br>
/lib64/libc.so.6(+0x78d53)[0x7f9ab01a1d53]
<br>
/opt/openmpi-2.x_opt/lib/openmpi/mca_pml_ob1.so(+0x172a1)[0x7f9aa3df32a1]
<br>
/opt/openmpi-2.x_opt/lib/libmpi.so.0(MPI_Request_free+0x4c)[0x7f9ab0761dac]
<br>
/opt/petsc-3.7.2_debug_openmpi_2.x/lib/libpetsc.so.3.7(+0x4adaf9)[0x7f9ab7fa2af9]
<br>
/opt/petsc-3.7.2_debug_openmpi_2.x/lib/libpetsc.so.3.7(VecScatterDestroy+0x68d)[0x7f9ab7f9dc35]
<br>
/opt/petsc-3.7.2_debug_openmpi_2.x/lib/libpetsc.so.3.7(+0x4574e7)[0x7f9ab7f4c4e7]
<br>
/opt/petsc-3.7.2_debug_openmpi_2.x/lib/libpetsc.so.3.7(VecDestroy+0x648)[0x7f9ab7ef28ca]
<br>
/pmi/cmpbib/compilation_BIB_dernier_ompi/COMPILE_AUTO/GIREF/lib/libgiref_opt_Petsc.so(_Z15GIREFVecDestroyRP6_p_Vec+0xe)[0x7f9abc9746de]
<br>
/pmi/cmpbib/compilation_BIB_dernier_ompi/COMPILE_AUTO/GIREF/lib/libgiref_opt_Petsc.so(_ZN12VecteurPETScD1Ev+0x31)[0x7f9abca8bfa1]
<br>
/pmi/cmpbib/compilation_BIB_dernier_ompi/COMPILE_AUTO/GIREF/lib/libgiref_opt_Petsc.so(_ZN10SolveurGCPD2Ev+0x20c)[0x7f9abc9a013c]
<br>
/pmi/cmpbib/compilation_BIB_dernier_ompi/COMPILE_AUTO/GIREF/lib/libgiref_opt_Petsc.so(_ZN10SolveurGCPD0Ev+0x9)[0x7f9abc9a01f9]
<br>
/pmi/cmpbib/compilation_BIB_dernier_ompi/COMPILE_AUTO/GIREF/lib/libgiref_opt_Formulation.so(_ZN10ProblemeGDD2Ev+0x42)[0x7f9abeeb94e2]
<br>
/pmi/cmpbib/compilation_BIB_dernier_ompi/COMPILE_AUTO/GIREF/bin/Test.ProblemeGD.opt[0x4159b9]
<br>
/lib64/libc.so.6(__libc_start_main+0xf5)[0x7f9ab014ab25]
<br>
/pmi/cmpbib/compilation_BIB_dernier_ompi/COMPILE_AUTO/GIREF/bin/Test.ProblemeGD.opt[0x4084dc]
<br>
<p>The very same code ans tests are all working well with 
<br>
openmpi-1.{8.4,10.2} and the same version of PETSc...
<br>
<p>And the segfault with MPI_File_write_all_end seems gone... Thanks to 
<br>
Edgar! :)
<br>
<p>Btw, I am wondering when I should report a bug or not, since I am 
<br>
&quot;blindly&quot; cloning around 01h20 am each day, independently of the 
<br>
&quot;status&quot; of the master...  I don't want to bother anyone on this list 
<br>
with annoying bug reports...  So tell me what you would like please...
<br>
<p>Thanks,
<br>
<p>Eric
<br>
<p><p>On 13/07/16 08:36 PM, Ralph Castain wrote:
<br>
<span class="quotelev1">&gt; Fixed on master
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Jul 13, 2016, at 12:47 PM, Jeff Squyres (jsquyres) &lt;jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I literally just noticed that this morning (that singleton was broken on master), but hadn't gotten to bisecting / reporting it yet...
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I also haven't tested 2.0.0.  I really hope singletons aren't broken then...
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; /me goes to test 2.0.0...
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Whew -- 2.0.0 singletons are fine.  :-)
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Jul 13, 2016, at 3:01 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Hmmm&#226;&#128;&#166;I see where the singleton on master might be broken - will check later today
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Jul 13, 2016, at 11:37 AM, Eric Chamberland &lt;Eric.Chamberland_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Hi Howard,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; ok, I will wait for 2.0.1rcX... ;)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I've put in place a script to download/compile OpenMPI+PETSc(3.7.2) and our code from the git repos.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Now I am in a somewhat uncomfortable situation where neither the ompi-release.git or ompi.git repos are working for me.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; The first gives me the errors with MPI_File_write_all_end I reported, but the former gives me errors like these:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [lorien:106919] [[INVALID],INVALID] ORTE_ERROR_LOG: Bad parameter in file ess_singleton_module.c at line 167
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; *** An error occurred in MPI_Init_thread
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; *** on a NULL communicator
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; *** MPI_ERRORS_ARE_FATAL (processes in this communicator will now abort,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; ***    and potentially your MPI job)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; [lorien:106919] Local abort before MPI_INIT completed completed successfully, but am not able to aggregate error messages, and not able to guarantee that all other processes were killed!
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; So, for my continuous integration of OpenMPI I am in a no man's land... :(
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Thanks anyway for the follow-up!
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Eric
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On 13/07/16 07:49 AM, Howard Pritchard wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Hi Eric,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Thanks very much for finding this problem.   We decided in order to have
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; a reasonably timely
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; release, that we'd triage issues and turn around a new RC if something
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; drastic
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; appeared.  We want to fix this issue (and it will be fixed), but we've
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; decided to
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; defer the fix for this issue to a 2.0.1 bug fix release.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Howard
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 2016-07-12 13:51 GMT-06:00 Eric Chamberland
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;Eric.Chamberland_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;mailto:Eric.Chamberland_at_[hidden]&gt;&gt;:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  Hi Edgard,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  I just saw that your patch got into ompi/master... any chances it
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  goes into ompi-release/v2.x before rc5?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  thanks,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  Eric
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  On 08/07/16 03:14 PM, Edgar Gabriel wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;      I think I found the problem, I filed a pr towards master, and if
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;      that
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;      passes I will file a pr for the 2.x branch.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;      Thanks!
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;      Edgar
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;      On 7/8/2016 1:14 PM, Eric Chamberland wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          On 08/07/16 01:44 PM, Edgar Gabriel wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;              ok, but just to be able to construct a test case,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;              basically what you are
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;              doing is
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;              MPI_File_write_all_begin (fh, NULL, 0, some datatype);
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;              MPI_File_write_all_end (fh, NULL, &amp;status),
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;              is this correct?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          Yes, but with 2 processes:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          rank 0 writes something, but not rank 1...
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          other info: rank 0 didn't wait for rank1 after
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          MPI_File_write_all_end so
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          it continued to the next MPI_File_write_all_begin with a
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          different
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          datatype but on the same file...
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          thanks!
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          Eric
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          Subscription:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          Link to this post:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;          <a href="http://www.open-mpi.org/community/lists/devel/2016/07/19173.php">http://www.open-mpi.org/community/lists/devel/2016/07/19173.php</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  Link to this post:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  <a href="http://www.open-mpi.org/community/lists/devel/2016/07/19192.php">http://www.open-mpi.org/community/lists/devel/2016/07/19192.php</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2016/07/19201.php">http://www.open-mpi.org/community/lists/devel/2016/07/19201.php</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2016/07/19202.php">http://www.open-mpi.org/community/lists/devel/2016/07/19202.php</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; --
</span><br>
<span class="quotelev2">&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev2">&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2016/07/19203.php">http://www.open-mpi.org/community/lists/devel/2016/07/19203.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2016/07/19208.php">http://www.open-mpi.org/community/lists/devel/2016/07/19208.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="19211.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end"</a>
<li><strong>Previous message:</strong> <a href="19209.php">Eric Chamberland: "Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end"</a>
<li><strong>In reply to:</strong> <a href="19208.php">Ralph Castain: "Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="19211.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end"</a>
<li><strong>Reply:</strong> <a href="19211.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 2.0.0rc4 Crash in MPI_File_write_all_end"</a>
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
