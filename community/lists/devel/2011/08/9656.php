<?
$subject_val = "Re: [OMPI devel] Building Error";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Aug 16 14:36:13 2011" -->
<!-- isoreceived="20110816183613" -->
<!-- sent="Tue, 16 Aug 2011 11:36:09 -0700" -->
<!-- isosent="20110816183609" -->
<!-- name="Larry Baker" -->
<!-- email="baker_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Building Error" -->
<!-- id="2429B3EC-BDBE-4895-A3F4-7CF6BFCC643E_at_usgs.gov" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="CAFmqpWphF09er1Uj7Jy+MuvcNVY+rhHH=hxTwJchk0U5etEYCg_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Building Error<br>
<strong>From:</strong> Larry Baker (<em>baker_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-08-16 14:36:09
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9657.php">Jeff Squyres: "Re: [OMPI devel] ibm/dynamic/loop_spawn"</a>
<li><strong>Previous message:</strong> <a href="9655.php">Larry Baker: "Re: [OMPI devel] Building Error"</a>
<li><strong>In reply to:</strong> <a href="9653.php">Matthew Russell: "Re: [OMPI devel] Building Error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9655.php">Larry Baker: "Re: [OMPI devel] Building Error"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Matthew,
<br>
<p>What configure options did you use?
<br>
<p>I can try to replicate your findings, as best I can, using the Intel  
<br>
compiler on my desktop Mac (Leopard).  One thing I want to investigate  
<br>
is which libutil is supposed to be linked.  There is no -L in the  
<br>
failing link step.  Is that possibly the error?
<br>
<p>I have PGI and about five other compilers on our cluster.  I'll get to  
<br>
OpenMPI 1.4.3 with all those as soon as I fetch the latest versions  
<br>
and reinstall my cluster software (Rocks just came out with 5.4.3).
<br>
<p>Larry Baker
<br>
US Geological Survey
<br>
650-329-5608
<br>
baker_at_[hidden]
<br>
<p>On 16 Aug 2011, at 9:44 AM, Matthew Russell wrote:
<br>
<p><span class="quotelev1">&gt; Hmm, I tried the recommendation above, adding -Wl,- 
</span><br>
<span class="quotelev1">&gt; search_paths_first, and I still ran into the same issue.  I suspect  
</span><br>
<span class="quotelev1">&gt; it is an issue with PGI.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Meanwhile, I've been able to get my applications (CMAQ) working with  
</span><br>
<span class="quotelev1">&gt; MPICH2, so for now at least I am going to continue with that.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Thanks for the responses!
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Mon, Aug 15, 2011 at 8:43 PM, Ralph Castain &lt;rhc_at_[hidden]&gt;  
</span><br>
<span class="quotelev1">&gt; wrote:
</span><br>
<span class="quotelev1">&gt; FWIW: I build OMPI on Mac OS-X (Snow Leopard) every day, without  
</span><br>
<span class="quotelev1">&gt; adding any extra flags, without problem. The citation below relates  
</span><br>
<span class="quotelev1">&gt; to something from a long time ago, I believe - haven't seen that  
</span><br>
<span class="quotelev1">&gt; problem in quite some time.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I do not, however, use PGI. We regularly have problems with PGI on a  
</span><br>
<span class="quotelev1">&gt; variety of systems, and I suspect you are hitting one here - but  
</span><br>
<span class="quotelev1">&gt; can't confirm it as we don't have PGI licenses to use for testing.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; The Xgrid support is broken, but has nothing to do with the problem  
</span><br>
<span class="quotelev1">&gt; you describe. Just means you can't launch via Xgrid.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Aug 15, 2011, at 2:53 PM, Larry Baker wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Matthew,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I have the same type of error on a completely different software  
</span><br>
<span class="quotelev2">&gt;&gt; package on Mac OS X.  The error occurs because of the way that Mac  
</span><br>
<span class="quotelev2">&gt;&gt; OS X searches for -lutil.  If the libutil.a ORTE needs is theirs,  
</span><br>
<span class="quotelev2">&gt;&gt; i.e., not the system libutil.dylib, then you have exactly the same  
</span><br>
<span class="quotelev2">&gt;&gt; problem I did.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Here are my notes for the fix using gcc.  You will have to find out  
</span><br>
<span class="quotelev2">&gt;&gt; the equivalent method to pass the -search_paths_first linker option  
</span><br>
<span class="quotelev2">&gt;&gt; using pgcc.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # Mac OS X searches for shared libraries before static libraries.   
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Thus, -L&lt;ours&gt; -lutil finds the system libutil.dylib
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # before our libutil.a, which causes undefined references in the  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; link step because it is using the wrong library.  The
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # ld -search_paths_first option forces ld to search each directory  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; first for a matching library, instead of all directories
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # first for a shared library.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; # Note: this is the form to pass -search_paths_first to ld when $ 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (CC) is the linker command in makefile.ux
</span><br>
<span class="quotelev3">&gt;&gt;&gt; export LDFLAGS=-Wl,-search_paths_first
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Larry Baker
</span><br>
<span class="quotelev2">&gt;&gt; US Geological Survey
</span><br>
<span class="quotelev2">&gt;&gt; 650-329-5608
</span><br>
<span class="quotelev2">&gt;&gt; baker_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On 15 Aug 2011, at 1:01 PM, Matthew Russell wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I hope this problem merits being posted here.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On OS X (Snow Leopard, and Lion), I cannot seem to build Open MPI.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; After a lot of building, I get the error:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; /bin/sh ../../../libtool --tag=CC   --mode=link /opt/pgi/ 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; osx86-64/10.9/bin/pgcc  -DNDEBUG -O2 -Msignextend -V   -export- 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; dynamic   -o orte-clean orte-clean.o ../../../orte/libopen-rte.la- 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; lutil
</span><br>
<span class="quotelev3">&gt;&gt;&gt; libtool: link: /opt/pgi/osx86-64/10.9/bin/pgcc -DNDEBUG -O2 - 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Msignextend -V -o orte-clean orte-clean.o  ../../../orte/.libs/ 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; libopen-rte.a /Users/matt/software/openmpi/openmpi-1.4.3/ 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; opal/.libs/libopen-pal.a -lutil
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Undefined symbols for architecture x86_64:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;   &quot;_orte_odls&quot;, referenced from:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;       _orte_errmgr_base_error_abort in libopen- 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; rte.a(errmgr_base_fns.o)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ld: symbol(s) not found for architecture x86_64
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; This is with the PGI 10.9 compiler, OpenMPI 1.4.3, platform is 86x64
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; The README does not list PGI as a compiler that OpenMPI was tested  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; with, and there are notes about it's support for XGrid being  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; broken (I'm not sure if this is related.)
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I seem to get the error regardless of which configure flags I'm  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; using, just for completeness though, here are the flags I am using:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ./configure --prefix=/usr/local/openmpi_pg --enable-mpi-f77 -- 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; enable-mpi-f90 --with-memory-manager=none
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Has anyone else got or fixed this error?
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I looked at other postings in this list, such as <a href="http://www.open-mpi.org/community/lists/devel/2007/05/1590.php">http://www.open-mpi.org/community/lists/devel/2007/05/1590.php</a> 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  , but they didn't help much.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
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
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-9656/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9657.php">Jeff Squyres: "Re: [OMPI devel] ibm/dynamic/loop_spawn"</a>
<li><strong>Previous message:</strong> <a href="9655.php">Larry Baker: "Re: [OMPI devel] Building Error"</a>
<li><strong>In reply to:</strong> <a href="9653.php">Matthew Russell: "Re: [OMPI devel] Building Error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9655.php">Larry Baker: "Re: [OMPI devel] Building Error"</a>
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
