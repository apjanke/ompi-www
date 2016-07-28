<?
$subject_val = "Re: [OMPI devel] RFC: make predefined handles extern to pointers";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Dec 18 08:39:05 2008" -->
<!-- isoreceived="20081218133905" -->
<!-- sent="Thu, 18 Dec 2008 08:38:38 -0500" -->
<!-- isosent="20081218133838" -->
<!-- name="Terry Dontje" -->
<!-- email="Terry.Dontje_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: make predefined handles extern to pointers" -->
<!-- id="494A525E.3060807_at_sun.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="494A3E54.7060905_at_sun.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: make predefined handles extern to pointers<br>
<strong>From:</strong> Terry Dontje (<em>Terry.Dontje_at_[hidden]</em>)<br>
<strong>Date:</strong> 2008-12-18 08:38:38
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5075.php">Graham, Richard L.: "Re: [OMPI devel] RFC: make predefined handles extern to pointers"</a>
<li><strong>Previous message:</strong> <a href="5073.php">Terry Dontje: "Re: [OMPI devel] RFC: make predefined handles extern to pointers"</a>
<li><strong>In reply to:</strong> <a href="5073.php">Terry Dontje: "Re: [OMPI devel] RFC: make predefined handles extern to pointers"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5075.php">Graham, Richard L.: "Re: [OMPI devel] RFC: make predefined handles extern to pointers"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Terry Dontje wrote:
<br>
<span class="quotelev1">&gt; Richard Graham wrote:
</span><br>
<span class="quotelev2">&gt;&gt; Terry,
</span><br>
<span class="quotelev2">&gt;&gt;   Is there any way you can quantify the cost ?  This seems 
</span><br>
<span class="quotelev2">&gt;&gt; reasonable, but
</span><br>
<span class="quotelev2">&gt;&gt; would be nice to get an idea what the performance cost is (and not 
</span><br>
<span class="quotelev2">&gt;&gt; within a
</span><br>
<span class="quotelev2">&gt;&gt; tight loop where everything stays in cache).
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Rich
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;   
</span><br>
<span class="quotelev1">&gt; Ok, I guess that would eliminate any of the simple perf tests like 
</span><br>
<span class="quotelev1">&gt; IMB, netperf, and such.  So do you have something else in mind, maybe 
</span><br>
<span class="quotelev1">&gt; HPCC?
</span><br>
Rich,
<br>
<p>I retract the above.  HPCC and IMB probably doesn't use the predefines 
<br>
that much.   One might be able to just do a lot of MPI_Comm_rank calls 
<br>
but then you run into the caching problems you mention above.  Though I 
<br>
wonder if we do enough runs and compare the first call if that might be 
<br>
enough.
<br>
<p>--td
<br>
<span class="quotelev1">&gt; --td
</span><br>
<span class="quotelev2">&gt;&gt; On 12/16/08 10:41 AM, &quot;Terry D. Dontje&quot; &lt;Terry.Dontje_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; WHAT:  To make predefined handles extern to pointers instead of an
</span><br>
<span class="quotelev3">&gt;&gt;&gt; address of an extern to a structure.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; WHY:  To make OMPI more backwards compatible in regards to changes to
</span><br>
<span class="quotelev3">&gt;&gt;&gt; structures that define predefined handles.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; WHERE:  In the trunk.  ompi/include/mpi.h.in and places in ompi that
</span><br>
<span class="quotelev3">&gt;&gt;&gt; directly use the predefined handles.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; WHEN:  01/24/2009
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; TIMEOUT:  01/10/2009
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ____________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; The point of this change is to improve the odds that an MPI application
</span><br>
<span class="quotelev3">&gt;&gt;&gt; does not have to recompile when changes are made to the OMPI library.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; In this case specifically the predefined handles that use the 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; structures
</span><br>
<span class="quotelev3">&gt;&gt;&gt; for communicators, groups, ops, datatypes, error handlers, win, file,
</span><br>
<span class="quotelev3">&gt;&gt;&gt; and info.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; An example of the changes for the communicator predefined handles 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; can be
</span><br>
<span class="quotelev3">&gt;&gt;&gt; found in the hg tmp workspace at
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ssh://www.open-mpi.org/~tdd/hg/predefcompat.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Note, the one downfall that Jeff and I could think of by doing this is
</span><br>
<span class="quotelev3">&gt;&gt;&gt; you potentially add one level of indirection but I believe that will be
</span><br>
<span class="quotelev3">&gt;&gt;&gt; a small overhead and if you use one of the predefined handles
</span><br>
<span class="quotelev3">&gt;&gt;&gt; repetitively (like in a loop) that the address will probably be stored
</span><br>
<span class="quotelev3">&gt;&gt;&gt; in a register once and no additional over should be seen due to this 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; change.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;     
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
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5075.php">Graham, Richard L.: "Re: [OMPI devel] RFC: make predefined handles extern to pointers"</a>
<li><strong>Previous message:</strong> <a href="5073.php">Terry Dontje: "Re: [OMPI devel] RFC: make predefined handles extern to pointers"</a>
<li><strong>In reply to:</strong> <a href="5073.php">Terry Dontje: "Re: [OMPI devel] RFC: make predefined handles extern to pointers"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5075.php">Graham, Richard L.: "Re: [OMPI devel] RFC: make predefined handles extern to pointers"</a>
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
