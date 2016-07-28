<?
$subject_val = "Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Dec 15 17:35:13 2011" -->
<!-- isoreceived="20111215223513" -->
<!-- sent="Thu, 15 Dec 2011 22:35:06 +0000" -->
<!-- isosent="20111215223506" -->
<!-- name="Ashley Pittman" -->
<!-- email="ashley_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)" -->
<!-- id="C09E2E29-70EF-4FDD-A4F3-3E1DAE720D38_at_pittman.co.uk" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="alpine.OSX.2.00.1112151507180.9108_at_panthera.lanl.gov" -->
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
<strong>Subject:</strong> Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)<br>
<strong>From:</strong> Ashley Pittman (<em>ashley_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-12-15 17:35:06
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10154.php">Nathan Hjelm: "Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)"</a>
<li><strong>Previous message:</strong> <a href="10152.php">Jeff Squyres: "Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)"</a>
<li><strong>In reply to:</strong> <a href="10151.php">Nathan Hjelm: "Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="10154.php">Nathan Hjelm: "Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)"</a>
<li><strong>Reply:</strong> <a href="10154.php">Nathan Hjelm: "Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
If I add a new symbol to orte/mca/debugger/base/debugger_base_open.c and declare it in orte/mca/debugger/base/base.h, the same as MPIR_proctable_size is defined then it appears in the .so but not in the binary, if I then reference this variable in orte/tools/orterun/orterun.c the symbol appears in orterun.  It's definably coming from that declaration, what isn't so clear is how it's getting into the binary.  I can only assume that orte/mca/debugger/base/debugger_base_fns.c is linked into the binary directly and the symbol is optimised away in the case where it's defined but not used.
<br>
<p>Ashley.
<br>
<p>On 15 Dec 2011, at 22:09, Nathan Hjelm wrote:
<br>
<p><span class="quotelev1">&gt; orte/tools/orterun/debuggers.c does not exist anymore (its not in the 1.5.5rc1 tarball). I don't know why the symbols are showing up in section B of orterun. Investigating now.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -Nathan Hjelm
</span><br>
<span class="quotelev1">&gt; HPC-3, LANL
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Thu, 15 Dec 2011, George Bosilca wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Dec 15, 2011, at 16:55 , Ashley Pittman wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; There is a problem with 1.5.5rc1 that prevents padb from loading the process table start from the orterun process, what appears to be happening is that MPIR_proctable and MPIR_proctable_size is present in both orterun itself and also in libopen-rte.so, the code is correctly setting them in libopen-rte.so however when gdb is picking the variable from orterun in preference and hence padb is reading NULL values.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Indeed, there are two definitions, but a single declaration. This is true for both the trunk and the 1.5.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; ./orte/mca/debugger/base/base.h:61:ORTE_DECLSPEC extern struct MPIR_PROCDESC *MPIR_proctable;
</span><br>
<span class="quotelev2">&gt;&gt; ./orte/mca/debugger/base/base.h:62:ORTE_DECLSPEC extern int MPIR_proctable_size;
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; ./orte/mca/debugger/base/debugger_base_open.c:42:struct MPIR_PROCDESC *MPIR_proctable = NULL;
</span><br>
<span class="quotelev2">&gt;&gt; ./orte/mca/debugger/base/debugger_base_open.c:43:int MPIR_proctable_size = 0;
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; ./orte/tools/orterun/debuggers.c:142:struct MPIR_PROCDESC *MPIR_proctable = NULL;
</span><br>
<span class="quotelev2">&gt;&gt; ./orte/tools/orterun/debuggers.c:143:int MPIR_proctable_size = 0;
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; george.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Attached is a log showing the problem, the only change I made to the source is to add a call to orte_debugger_base_dump() before the return from orte_debugger_base_init_after_spawn(), it looks like this could also have been achieved via a debug setting but I couldn't see how.
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
<li><strong>Next message:</strong> <a href="10154.php">Nathan Hjelm: "Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)"</a>
<li><strong>Previous message:</strong> <a href="10152.php">Jeff Squyres: "Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)"</a>
<li><strong>In reply to:</strong> <a href="10151.php">Nathan Hjelm: "Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="10154.php">Nathan Hjelm: "Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)"</a>
<li><strong>Reply:</strong> <a href="10154.php">Nathan Hjelm: "Re: [OMPI devel] MPIR attach from padb broken (1.5.5rc1)"</a>
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
