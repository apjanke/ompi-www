<?
$subject_val = "Re: [OMPI devel] libtool issue with crs/self";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Aug  5 10:52:04 2009" -->
<!-- isoreceived="20090805145204" -->
<!-- sent="Wed, 05 Aug 2009 10:51:59 -0400" -->
<!-- isosent="20090805145159" -->
<!-- name="Josh Hursey" -->
<!-- email="jjhursey_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] libtool issue with crs/self" -->
<!-- id="54825A94-6C0F-425F-B798-712E628160CD_at_open-mpi.org" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="alpine.DEB.1.10.0907291055030.28692_at_marvin.we-be-smart.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] libtool issue with crs/self<br>
<strong>From:</strong> Josh Hursey (<em>jjhursey_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-08-05 10:51:59
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="6591.php">George Bosilca: "Re: [OMPI devel] libtool issue with crs/self"</a>
<li><strong>Previous message:</strong> <a href="6589.php">Jeff Squyres: "Re: [OMPI devel] trunk borked -- my fault"</a>
<li><strong>In reply to:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2009/07/6543.php">Brian W. Barrett: "Re: [OMPI devel] libtool issue with crs/self"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6591.php">George Bosilca: "Re: [OMPI devel] libtool issue with crs/self"</a>
<li><strong>Reply:</strong> <a href="6591.php">George Bosilca: "Re: [OMPI devel] libtool issue with crs/self"</a>
<li><strong>Reply:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2009/09/6793.php">Ralf Wildenhues: "Re: [OMPI devel] libtool issue with crs/self"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
As an update on this thread. I had a bit of time this morning to look  
<br>
into this.
<br>
<p>I noticed that the &quot;-fvisibility=hidden&quot; option when passed to libltdl  
<br>
will cause it to fail in its configure test for:
<br>
&nbsp;&nbsp;&quot;checking whether a program can dlopen itself&quot;
<br>
This is because the symbol they are trying to look for with dlsym() is  
<br>
not postfixed with:
<br>
&nbsp;&nbsp;&nbsp;__attribute__ ((visibility(&quot;default&quot;)))
<br>
If I do that, then the test passes correctly.
<br>
<p>I am not sure if this is a configure bug in Libtool or not. But what  
<br>
it means is that even with the wrapper around the OPAL libltdl  
<br>
routines, it is not useful to me since I need to open the executable  
<br>
to examine it for the necessary symbols.
<br>
<p>So I might try to go down the track of using dlopen/dlsym/dlclose  
<br>
directly instead of through the libtool interfaces. However I just  
<br>
wanted to mention that this is happening in case there are other  
<br>
places in the codebase that ever want to look into the executable for  
<br>
symbols, and find that lt_dlopen() fails in non-obvious ways.
<br>
<p>-- Josh
<br>
<p>On Jul 29, 2009, at 11:01 AM, Brian W. Barrett wrote:
<br>
<p><span class="quotelev1">&gt; Never mind, I'm an idiot.  I still don't like the wrappers around  
</span><br>
<span class="quotelev1">&gt; lt_dlopen in util, but it might be your best option.  Are you  
</span><br>
<span class="quotelev1">&gt; looking for symbols in components or the executable?  I assumed the  
</span><br>
<span class="quotelev1">&gt; executable, in which case you might be better off just using dlsym()  
</span><br>
<span class="quotelev1">&gt; directly.  If you're looking for a symbol first place it's found,  
</span><br>
<span class="quotelev1">&gt; then you can just do:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  dlsym(RTLD_DEFAULT, symbol);
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; The lt_dlsym only really helps if you're running on really obscure  
</span><br>
<span class="quotelev1">&gt; platforms which don't support dlsym and loading &quot;preloaded&quot;  
</span><br>
<span class="quotelev1">&gt; components.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Brian
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Wed, 29 Jul 2009, Brian W. Barrett wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; What are you trying to do with lt_dlopen?  It seems like you should  
</span><br>
<span class="quotelev2">&gt;&gt; always go through the MCA base utilities.  If one's missing, adding  
</span><br>
<span class="quotelev2">&gt;&gt; it there seems like the right mechanism.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Brian
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Wed, 29 Jul 2009, Josh Hursey wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; George suggested that to me as well yesterday after the meeting.  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; So we would create opal interfaces to libtool (similar to what we  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; do with the event engine). That might be the best way to approach  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; this.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I'll start to take a look at implementing this. Since opal/libltdl  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; is not part of the repository, is there a 'right' place to put  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; this header? maybe in opal/util/?
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Thanks,
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Josh
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Jul 28, 2009, at 6:57 PM, Jeff Squyres (jsquyres) wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Josh - this is almost certainly what happened. Yoibks.  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Unfortunately, there's good reasons for it. :(
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; What about if we proxy calls to lt_dlopen through an opal  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; function call?
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; -jms
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Sent from my PDA.  No type good.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; ----- Original Message -----
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; From: devel-bounces_at_[hidden] &lt;devel-bounces_at_[hidden]&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; To: Open MPI Developers &lt;devel_at_[hidden]&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Sent: Tue Jul 28 16:39:42 2009
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Subject: Re: [OMPI devel] libtool issue with crs/self
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; It was mentioned to me that r21731 might have caused this problem  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; by
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; restricting the visibility of the libltdl library.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;  <a href="https://svn.open-mpi.org/trac/ompi/changeset/21731">https://svn.open-mpi.org/trac/ompi/changeset/21731</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Brian,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Do you have any thoughts on how we might extend the visibility so  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; that
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; MCA components could also use the libtool in opal?
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I can try to initialize libtool in the Self CRS component and use  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; it
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; directly, but since it is already opened by OPAL, I think it  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; might be
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; better to use the instantiation in OPAL.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Cheers,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Josh
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Jul 28, 2009, at 3:06 PM, Josh Hursey wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Once upon a time, the Self CRS module worked correctly, but I  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; admit
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; that I have not tested it in a long time.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; The Self CRS component uses dl_open and friends to inspect the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; running process for a particular set of functions. When I try to  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; run
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; an MPI program that contains these signatures I get the following
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; error when it tries to resolve lt_dlopen() in
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; opal_crs_self_component_query():
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ------------------
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; my-app: symbol lookup error: /path/to/install/lib/openmpi/
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; mca_crs_self.so: undefined symbol: lt_dlopen
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ------------------
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I am configuring with the following:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ------------------
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ./configure --prefix=/path/to/install \
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --enable-binaries \
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --with-devel-headers \
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --enable-debug \
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --enable-mpi-threads \
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --with-ft=cr \
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --without-memory-manager \
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --enable-ft-thread \
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; CC=gcc CXX=g++ \
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; F77=gfortran FC=gfortran
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ------------------
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; The source code is at the link below:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="https://svn.open-mpi.org/trac/ompi/browser/trunk/opal/mca/crs/self">https://svn.open-mpi.org/trac/ompi/browser/trunk/opal/mca/crs/self</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Does anyone have any thoughts on what might be going wrong here?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Thanks,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Josh
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
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
<li><strong>Next message:</strong> <a href="6591.php">George Bosilca: "Re: [OMPI devel] libtool issue with crs/self"</a>
<li><strong>Previous message:</strong> <a href="6589.php">Jeff Squyres: "Re: [OMPI devel] trunk borked -- my fault"</a>
<li><strong>In reply to:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2009/07/6543.php">Brian W. Barrett: "Re: [OMPI devel] libtool issue with crs/self"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6591.php">George Bosilca: "Re: [OMPI devel] libtool issue with crs/self"</a>
<li><strong>Reply:</strong> <a href="6591.php">George Bosilca: "Re: [OMPI devel] libtool issue with crs/self"</a>
<li><strong>Reply:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2009/09/6793.php">Ralf Wildenhues: "Re: [OMPI devel] libtool issue with crs/self"</a>
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
