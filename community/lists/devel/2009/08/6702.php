<?
$subject_val = "Re: [OMPI devel] RFC: convert send to ssend";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Aug 24 11:35:11 2009" -->
<!-- isoreceived="20090824153511" -->
<!-- sent="Mon, 24 Aug 2009 11:35:01 -0400" -->
<!-- isosent="20090824153501" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: convert send to ssend" -->
<!-- id="55295E81-4C61-436F-B855-662A41B554FC_at_eecs.utk.edu" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="4A92ADAD.5050500_at_lanl.gov" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: convert send to ssend<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-08-24 11:35:01
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="6703.php">Sylvain Jeaugey: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<li><strong>Previous message:</strong> <a href="6701.php">Samuel K. Gutierrez: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<li><strong>In reply to:</strong> <a href="6701.php">Samuel K. Gutierrez: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6703.php">Sylvain Jeaugey: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<li><strong>Reply:</strong> <a href="6703.php">Sylvain Jeaugey: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<li><strong>Reply:</strong> <a href="6705.php">Jeff Squyres: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<li><strong>Reply:</strong> <a href="6716.php">Chris Samuel: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Do people know that there exist tools for checking MPI code  
<br>
correctness? Many, many tools and most of them are freely available.
<br>
<p>Personally I don't see any interest of doing this, absolutely no  
<br>
interest. There is basically no added value to our MPI, except for a  
<br>
very limited number of users, and these users if they manage to write  
<br>
a parallel application that need this checking I'm sure they will  
<br>
greatly benefit from a real tool to help them correct their MPI code.
<br>
<p>As a side note, a very similar effect can be obtained by decreasing  
<br>
the eager size of the BTLs to be equal to the size of the match  
<br>
header, which is about 24 bytes.
<br>
<p>&nbsp;&nbsp;&nbsp;george.
<br>
<p>On Aug 24, 2009, at 11:11 , Samuel K. Gutierrez wrote:
<br>
<p><span class="quotelev1">&gt; Hi Jeff,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Sounds good to me.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Samuel K. Gutierrez
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Jeff Squyres wrote:
</span><br>
<span class="quotelev2">&gt;&gt; The debug builds already have quite a bit of performance overhead.   
</span><br>
<span class="quotelev2">&gt;&gt; It might be desirable to change this RFC to have a similar tri- 
</span><br>
<span class="quotelev2">&gt;&gt; state as the MPI parameter checking:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; - compiled out
</span><br>
<span class="quotelev2">&gt;&gt; - compiled in, always check
</span><br>
<span class="quotelev2">&gt;&gt; - compiled in, use MCA parameter to determine whether to check
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Adapting that to this RFC, perhaps something like this:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; - compiled out
</span><br>
<span class="quotelev2">&gt;&gt; - compiled in, always convert standard send to sync send
</span><br>
<span class="quotelev2">&gt;&gt; - compiled in, use MCA parameter to determine whether to convert  
</span><br>
<span class="quotelev2">&gt;&gt; standard -&gt; sync
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; And we can leave the default as &quot;compiled out&quot;.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Howzat?
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Aug 23, 2009, at 9:07 PM, Samuel K. Gutierrez wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Hi all,
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; How about exposing this functionality as a run-time parameter that  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; is only
</span><br>
<span class="quotelev3">&gt;&gt;&gt; available in debug builds?  This will make debugging easier and  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; won't
</span><br>
<span class="quotelev3">&gt;&gt;&gt; impact the performance of optimized builds.  Just an idea...
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Samuel K. Gutierrez
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; ----- &quot;Jeff Squyres&quot; &lt;jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; Does anyone have any suggestions?  Or are we stuck
</span><br>
<span class="quotelev1">&gt;&gt;&gt; &gt;&gt; with compile-time checking?
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; I didn't see this until now, but I'd be happy with
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; just a compile time option so we could produce an
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; install just for debugging purposes and have our
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; users explicitly select it with modules.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; I have to say that this is of interest to us as we're
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; trying to help a researcher at one of our member uni's
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; to track down a bug where a message appears to go missing.
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; cheers!
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; Chris
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; --
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; Christopher Samuel - (03) 9925 4751 - Systems Manager
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;  The Victorian Partnership for Advanced Computing
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;  P.O. Box 201, Carlton South, VIC 3053, Australia
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; VPAC is a not-for-profit Registered Research Agency
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt; &gt;
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
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
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
<li><strong>Next message:</strong> <a href="6703.php">Sylvain Jeaugey: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<li><strong>Previous message:</strong> <a href="6701.php">Samuel K. Gutierrez: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<li><strong>In reply to:</strong> <a href="6701.php">Samuel K. Gutierrez: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6703.php">Sylvain Jeaugey: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<li><strong>Reply:</strong> <a href="6703.php">Sylvain Jeaugey: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<li><strong>Reply:</strong> <a href="6705.php">Jeff Squyres: "Re: [OMPI devel] RFC: convert send to ssend"</a>
<li><strong>Reply:</strong> <a href="6716.php">Chris Samuel: "Re: [OMPI devel] RFC: convert send to ssend"</a>
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
