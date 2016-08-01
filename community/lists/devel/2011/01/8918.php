<?
$subject_val = "Re: [OMPI devel] dummy component warnings";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Jan 25 15:49:44 2011" -->
<!-- isoreceived="20110125204944" -->
<!-- sent="Tue, 25 Jan 2011 15:49:39 -0500" -->
<!-- isosent="20110125204939" -->
<!-- name="Jeff Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] dummy component warnings" -->
<!-- id="69B45814-90D3-48C6-A247-839DC23F3FF6_at_cisco.com" -->
<!-- charset="windows-1252" -->
<!-- inreplyto="alpine.OSX.2.00.1101240828500.28834_at_panthera.lanl.gov" -->
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
<strong>Subject:</strong> Re: [OMPI devel] dummy component warnings<br>
<strong>From:</strong> Jeff Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-01-25 15:49:39
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8919.php">Nathan Hjelm: "Re: [OMPI devel] dummy component warnings"</a>
<li><strong>Previous message:</strong> <a href="8917.php">Hugo Meyer: "[OMPI devel] OMPI-MIGRATE error"</a>
<li><strong>In reply to:</strong> <a href="8916.php">Nathan Hjelm: "Re: [OMPI devel] dummy component warnings"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8919.php">Nathan Hjelm: "Re: [OMPI devel] dummy component warnings"</a>
<li><strong>Reply:</strong> <a href="8919.php">Nathan Hjelm: "Re: [OMPI devel] dummy component warnings"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Short version
<br>
=============
<br>
<p>MTT turned up a problem with -std=gnu99 on OS X Leopard, which ships with the gcc 4.0 compiler (OS X Snow Leopard ships with gcc 4.2, and doesn't have a problem).  Does anyone have gcc 4.0 on Linux?  I'm wondering if the same problem would occur.
<br>
<p>More details:
<br>
=============
<br>
<p><span class="quotelev1">&gt;From our friends at Absoft:
</span><br>
<p>-----
<br>
The -std=gnu99 is causing the problem when used with gcc-4.0 ( the default on Leopard with Apple's XCode 3.1 development tools ):
<br>
<p>BigMac:ompi cag$ gcc --version -std=gnu99 -c conftest.s
<br>
conftest.s:2:3: error: invalid preprocessing directive #_gsym_test_func
<br>
conftest.s:5:3: error: invalid preprocessing directive #_gsym_test_func
<br>
BigMac:ompi cag$ gcc-4.0 -std=gnu99 -c conftest.s
<br>
conftest.s:2:3: error: invalid preprocessing directive #_gsym_test_func
<br>
conftest.s:5:3: error: invalid preprocessing directive #_gsym_test_func
<br>
BigMac:ompi cag$ gcc-4.2 -std=gnu99 -c conftest.s
<br>
BigMac:ompi cag$
<br>
<p>On Snow Leopard with Apple's XCode 3.2 development tools, the default compiler is 4.2.
<br>
-----
<br>
<p>The compile line he's talking about in particular is from a configure test in opal/config/opal_config_asm.m4, where we're looking for assembly global symbols.  The source that we're trying to compile is:
<br>
<p>-----
<br>
.text
<br>
# _gsym_test_func
<br>
.globl _gsym_test_func
<br>
_gsym_test_func:
<br>
# _gsym_test_func
<br>
-----
<br>
<p>(configure tries a few prefixes)
<br>
<p>But the &quot;#&quot; token with the -std=gnu99 option is causing failures where it shouldn't (i.e., it causes configure to abort because all the assembly tests looking for the global symbols error out due to the # token.
<br>
<p>So I think we either need to find a workaround for this assembly test or whack the idea of the C99 stuff.  :-(
<br>
<p><p><p>On Jan 24, 2011, at 10:29 AM, Nathan Hjelm wrote:
<br>
<p><span class="quotelev1">&gt; No, they didn't get added (adding them now). I didn't get a chance to add them over the weekend.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -Nathan
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Mon, 24 Jan 2011, Jeff Squyres wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; I'm getting these:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; CC     dummy_component.lo
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c:25: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c:28: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c:29: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c:30: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c:31: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c:33: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c:34: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c:35: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c:37: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c:39: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c: In function &#145;component_open&#146;:
</span><br>
<span class="quotelev2">&gt;&gt; dummy_component.c:45: warning: unused variable &#145;c&#146;
</span><br>
<span class="quotelev2">&gt;&gt; dummy.c:67: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy.c:68: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy.c:69: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; dummy.c:70: warning: ISO C90 forbids specifying subobject to initialize
</span><br>
<span class="quotelev2">&gt;&gt; CCLD   mca_debugger_dummy.la
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Did the autoconf tests not get added?
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; -- 
</span><br>
<span class="quotelev2">&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev2">&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; For corporate legal information go to:
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
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
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to:
<a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8919.php">Nathan Hjelm: "Re: [OMPI devel] dummy component warnings"</a>
<li><strong>Previous message:</strong> <a href="8917.php">Hugo Meyer: "[OMPI devel] OMPI-MIGRATE error"</a>
<li><strong>In reply to:</strong> <a href="8916.php">Nathan Hjelm: "Re: [OMPI devel] dummy component warnings"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8919.php">Nathan Hjelm: "Re: [OMPI devel] dummy component warnings"</a>
<li><strong>Reply:</strong> <a href="8919.php">Nathan Hjelm: "Re: [OMPI devel] dummy component warnings"</a>
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