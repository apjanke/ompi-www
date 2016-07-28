<?
$subject_val = "Re: [OMPI devel] 1.10.*, intel 16.0.0, fortran, symbol lookup error reference to mpi_fortran_argvs_null__";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Oct 29 21:15:35 2015" -->
<!-- isoreceived="20151030011535" -->
<!-- sent="Fri, 30 Oct 2015 01:14:57 +0000" -->
<!-- isosent="20151030011457" -->
<!-- name="Jeff Squyres (jsquyres)" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] 1.10.*, intel 16.0.0, fortran, symbol lookup error reference to mpi_fortran_argvs_null__" -->
<!-- id="6BC1EC56-0C17-4790-9933-576144F5CC04_at_cisco.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="CAAbhqc6navviXJagSWLLVm0r=eh3=qCTgT2c09rH_7Amzu1fdw_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] 1.10.*, intel 16.0.0, fortran, symbol lookup error reference to mpi_fortran_argvs_null__<br>
<strong>From:</strong> Jeff Squyres (jsquyres) (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-10-29 21:14:57
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18318.php">Ralph Castain: "Re: [OMPI devel] Please test: v1.10.1rc3"</a>
<li><strong>Previous message:</strong> <a href="18316.php">Orion Poplawski: "Re: [OMPI devel] Please test: v1.10.1rc3"</a>
<li><strong>In reply to:</strong> <a href="18312.php">Nick Papior: "Re: [OMPI devel] 1.10.*, intel 16.0.0, fortran, symbol lookup error reference to mpi_fortran_argvs_null__"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Great -- glad you figured it out!
<br>
<p><span class="quotelev1">&gt; On Oct 29, 2015, at 3:26 PM, Nick Papior &lt;nickpapior_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Problem resolved, the later intel versions source files automatically adds their own MPI library to the LD_LIBRARY_PATH, hence the linked mpi library was the intel MPICH library and _not_ the openmpi library. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Bottomline, be aware that LD_LIBRARY_PATH has to be corrected (or prepended the correct path) for correct linking.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 2015-10-29 8:49 GMT+01:00 Nick Papior &lt;nickpapior_at_[hidden]&gt;:
</span><br>
<span class="quotelev1">&gt; Hi all,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I am not really sure whether this is an intel or ompi bug?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I have now tried with all 1.10.* versions (including 1.10.1rc[23]) to test whether this could be circumvented.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I use the intel 2016.1.0.423501 compiler.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I can successfully compile OpenMPI and use the C-compiler. But as soon as I compile the most simple fortran (ping-pong) program with mpif90 (no compile flags) I get symbol lookup errors.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; $&gt; mpirun -np &lt;&gt; &lt;exec&gt; 
</span><br>
<span class="quotelev1">&gt; intel: symbol lookup error: */XeonX5550/openmpi/1.10.1/intel-16.0.0/lib/libmpi_mpifh.so.12: undefined symbol: mpi_fortran_argvs_null__
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; So I thought that it was really a missing symbol, hence I grepped for the routine in the libraries:
</span><br>
<span class="quotelev1">&gt; for m in *.a *.so
</span><br>
<span class="quotelev1">&gt; do 
</span><br>
<span class="quotelev1">&gt;   echo $m 
</span><br>
<span class="quotelev1">&gt;   nm $m | grep mpi_fortran_argv 
</span><br>
<span class="quotelev1">&gt; done
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; And came up with:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; libopen-trace-format.a
</span><br>
<span class="quotelev1">&gt; libotfaux.a
</span><br>
<span class="quotelev1">&gt; libvt.a
</span><br>
<span class="quotelev1">&gt; libvt-hyb.a
</span><br>
<span class="quotelev1">&gt; libvt-mpi.a
</span><br>
<span class="quotelev1">&gt; libvt-mpi-unify.a
</span><br>
<span class="quotelev1">&gt; libvt-mt.a
</span><br>
<span class="quotelev1">&gt; libvt-pomp.a
</span><br>
<span class="quotelev1">&gt; libmca_common_sm.so
</span><br>
<span class="quotelev1">&gt; libmca_common_verbs.so
</span><br>
<span class="quotelev1">&gt; libmpi_cxx.so
</span><br>
<span class="quotelev1">&gt; libmpi_mpifh.so
</span><br>
<span class="quotelev1">&gt;                  U mpi_fortran_argv_null
</span><br>
<span class="quotelev1">&gt;                  U mpi_fortran_argv_null_
</span><br>
<span class="quotelev1">&gt;                  U mpi_fortran_argv_null__
</span><br>
<span class="quotelev1">&gt;                  U mpi_fortran_argvs_null
</span><br>
<span class="quotelev1">&gt;                  U mpi_fortran_argvs_null_
</span><br>
<span class="quotelev1">&gt;                  U mpi_fortran_argvs_null__
</span><br>
<span class="quotelev1">&gt;                  U ompi_fortran_argv_f2c
</span><br>
<span class="quotelev1">&gt; libmpi.so
</span><br>
<span class="quotelev1">&gt; 00000000002fb160 B mpi_fortran_argv_null
</span><br>
<span class="quotelev1">&gt; 00000000002fb080 B mpi_fortran_argv_null_
</span><br>
<span class="quotelev1">&gt; 00000000002fb028 B mpi_fortran_argv_null__
</span><br>
<span class="quotelev1">&gt; 00000000002fb1d8 B mpi_fortran_argvs_null
</span><br>
<span class="quotelev1">&gt; 00000000002fb220 B mpi_fortran_argvs_null_
</span><br>
<span class="quotelev1">&gt; 00000000002fb060 B mpi_fortran_argvs_null__
</span><br>
<span class="quotelev1">&gt; 0000000000086d60 T ompi_fortran_argv_f2c
</span><br>
<span class="quotelev1">&gt; libmpi_usempif08.so
</span><br>
<span class="quotelev1">&gt; 00000000002ce2c0 B mpi_fortran_argv_null
</span><br>
<span class="quotelev1">&gt; 00000000002ce2a0 B mpi_fortran_argvs_null
</span><br>
<span class="quotelev1">&gt; libmpi_usempi_ignore_tkr.so
</span><br>
<span class="quotelev1">&gt; 00000000002a8500 B mpi_fortran_argv_null_
</span><br>
<span class="quotelev1">&gt; 00000000002a8560 B mpi_fortran_argvs_null_
</span><br>
<span class="quotelev1">&gt; libompitrace.so
</span><br>
<span class="quotelev1">&gt; libopen-pal.so
</span><br>
<span class="quotelev1">&gt; libopen-rte.so
</span><br>
<span class="quotelev1">&gt; libopen-trace-format.so
</span><br>
<span class="quotelev1">&gt; liboshmem.so
</span><br>
<span class="quotelev1">&gt; 0000000000356e60 B mpi_fortran_argv_null
</span><br>
<span class="quotelev1">&gt; 0000000000356d00 B mpi_fortran_argv_null_
</span><br>
<span class="quotelev1">&gt; 0000000000356bc0 B mpi_fortran_argv_null__
</span><br>
<span class="quotelev1">&gt; 0000000000356f00 B mpi_fortran_argvs_null
</span><br>
<span class="quotelev1">&gt; 0000000000356f20 B mpi_fortran_argvs_null_
</span><br>
<span class="quotelev1">&gt; 0000000000356ca0 B mpi_fortran_argvs_null__
</span><br>
<span class="quotelev1">&gt; libotfaux.so
</span><br>
<span class="quotelev1">&gt; libvt-hyb.so
</span><br>
<span class="quotelev1">&gt; libvt-mpi.so
</span><br>
<span class="quotelev1">&gt; libvt-mpi-unify.so
</span><br>
<span class="quotelev1">&gt; libvt-mt.so
</span><br>
<span class="quotelev1">&gt; libvt.so
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; So they are uninitialized in the common section of mpi.so, but undefined in mpi_mpifh.so.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Note:
</span><br>
<span class="quotelev1">&gt; I have also tried with intel 15 and ompi 1.8.X and the symbol tables are identical yet the program executes fine.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Note:
</span><br>
<span class="quotelev1">&gt; I then tried with gcc (5.2.0) and found the exact same nm listings, i.e. the mpi_fortran_argvs_null routine are all B/U defined in the libraries. 
</span><br>
<span class="quotelev1">&gt; Yet, the program runs fine.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I have tried manually setting the -l order to
</span><br>
<span class="quotelev1">&gt; -lmpi_mpifh -lmpi
</span><br>
<span class="quotelev1">&gt; to no avail.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Should this be reported to intel? Or?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Kind regards Nick
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Kind regards Nick
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2015/10/18312.php">http://www.open-mpi.org/community/lists/devel/2015/10/18312.php</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18318.php">Ralph Castain: "Re: [OMPI devel] Please test: v1.10.1rc3"</a>
<li><strong>Previous message:</strong> <a href="18316.php">Orion Poplawski: "Re: [OMPI devel] Please test: v1.10.1rc3"</a>
<li><strong>In reply to:</strong> <a href="18312.php">Nick Papior: "Re: [OMPI devel] 1.10.*, intel 16.0.0, fortran, symbol lookup error reference to mpi_fortran_argvs_null__"</a>
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
