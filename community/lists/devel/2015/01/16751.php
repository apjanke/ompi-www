<?
$subject_val = "Re: [OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Jan  7 11:23:07 2015" -->
<!-- isoreceived="20150107162307" -->
<!-- sent="Thu, 08 Jan 2015 01:22:59 +0900" -->
<!-- isosent="20150107162259" -->
<!-- name="Gilles Gouaillardet" -->
<!-- email="gilles.gouaillardet_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)" -->
<!-- id="xwjtgk607vwjq4ky5wpkjpfi.1420647619283_at_email.android.com" -->
<!-- charset="utf-8" -->
<!-- inreplyto="[OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)" -->
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
<strong>Subject:</strong> Re: [OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)<br>
<strong>From:</strong> Gilles Gouaillardet (<em>gilles.gouaillardet_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-01-07 11:22:59
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16752.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)"</a>
<li><strong>Previous message:</strong> <a href="16750.php">Jeff Squyres (jsquyres): "[OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)"</a>
<li><strong>Maybe in reply to:</strong> <a href="16750.php">Jeff Squyres (jsquyres): "[OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16752.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)"</a>
<li><strong>Reply:</strong> <a href="16752.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Valid options are :
<br>
--with-threads e.g. --with-threads=posix e.g. default
<br>
And
<br>
--with-threads=no
<br>
<p>Except configure will explicitly fail if --with-threads=no is used
<br>
<p>So bottom line, pthreads and pthreads only are usable
<br>
<p>Cheers,
<br>
<p>Gilles 
<br>
<p>&quot;Jeff Squyres (jsquyres)&quot; &lt;jsquyres_at_[hidden]&gt;&#227;&#129;&#149;&#227;&#130;&#147;&#227;&#129;&#174;&#227;&#131;&#161;&#227;&#131;&#188;&#227;&#131;&#171;:
<br>
<span class="quotelev1">&gt;On Jan 7, 2015, at 4:25 AM, Gilles Gouaillardet &lt;gilles.gouaillardet_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Talking about thread support ...
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; i made a RFC several monthes ago in order to remove the
</span><br>
<span class="quotelev2">&gt;&gt; --with-threads option from configure
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; /* ompi requires pthreads, no more, no less */
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;Did we decide this?  (that OMPI *requires* pthreads)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;I *think* we did.  But I just want to make sure that my (terrible) memory is correct...
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; it was accepted, but i could not find the time to implement it ...
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; basically, i can see three steps :
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 1) remove the --with-threads option from configure, check for pthreads, and set the
</span><br>
<span class="quotelev2">&gt;&gt; OPAL_HAVE_POSIX_THREADS macro to 1
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;Sounds good.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; 2) step 1) + remove #ifdef OPAL_HAVE_POSIX_THREADS and remove dead code
</span><br>
<span class="quotelev2">&gt;&gt; (e.g. #ifndef OPAL_HAVE_POSIX_THREADS)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;Also make configure fail if pthreads are not available.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; 3) step 1) + step 2) + remove the OPAL thread abstraction layer
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; is it a good idea to implement steps 2) and 3) ?
</span><br>
<span class="quotelev2">&gt;&gt; i mean, if there is a chance we might support an other threading model in the future,
</span><br>
<span class="quotelev2">&gt;&gt; it might be better to keep some dead code for the time being.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;I think the consensus was that pthreads are fine for the foreseeable future.  If we need to re-add the threading abstraction layer, it's annoying, but not difficult.  Might as well simplify what we have, since there's no other threading system on the horizon that we need to worry about.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;-- 
</span><br>
<span class="quotelev1">&gt;Jeff Squyres
</span><br>
<span class="quotelev1">&gt;jsquyres_at_[hidden]
</span><br>
<span class="quotelev1">&gt;For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;_______________________________________________
</span><br>
<span class="quotelev1">&gt;devel mailing list
</span><br>
<span class="quotelev1">&gt;devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2015/01/16750.php">http://www.open-mpi.org/community/lists/devel/2015/01/16750.php</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16752.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)"</a>
<li><strong>Previous message:</strong> <a href="16750.php">Jeff Squyres (jsquyres): "[OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)"</a>
<li><strong>Maybe in reply to:</strong> <a href="16750.php">Jeff Squyres (jsquyres): "[OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16752.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)"</a>
<li><strong>Reply:</strong> <a href="16752.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] pthreads (was: Re: RFC: remove --disable-smp-locks)"</a>
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
