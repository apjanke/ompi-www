<?
$subject_val = "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk: ompi/mca/btl/openib ompi/mca/btl/wv ompi/mca/coll/ml	opal/util/keyval orte/mca/rmaps/rank_file";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Dec  4 04:37:36 2012" -->
<!-- isoreceived="20121204093736" -->
<!-- sent="Tue, 4 Dec 2012 10:37:29 +0100" -->
<!-- isosent="20121204093729" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk: ompi/mca/btl/openib ompi/mca/btl/wv ompi/mca/coll/ml	opal/util/keyval orte/mca/rmaps/rank_file" -->
<!-- id="0296A4EF-A9CD-4CB1-B763-744E53022A62_at_icl.utk.edu" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="AE45F2F55FE69B4F99BB3455E821D7151AE2BFDF_at_ECS-EXG-P-MB07.win.lanl.gov" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk: ompi/mca/btl/openib ompi/mca/btl/wv ompi/mca/coll/ml	opal/util/keyval orte/mca/rmaps/rank_file<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-12-04 04:37:29
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11828.php">Juan A. Rico: "[OMPI devel] Collective SM memory affinity possible error"</a>
<li><strong>Previous message:</strong> <a href="11826.php">Hjelm, Nathan T: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk:	ompi/mca/btl/openib ompi/mca/btl/wv ompi/mca/coll/ml	opal/util/keyval orte/mca/rmaps/rank_file"</a>
<li><strong>In reply to:</strong> <a href="11826.php">Hjelm, Nathan T: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk:	ompi/mca/btl/openib ompi/mca/btl/wv ompi/mca/coll/ml	opal/util/keyval orte/mca/rmaps/rank_file"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11829.php">Hjelm, Nathan T: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk:	ompi/mca/btl/openib ompi/mca/btl/wv	ompi/mca/coll/ml	opal/util/keyval orte/mca/rmaps/rank_file"</a>
<li><strong>Reply:</strong> <a href="11829.php">Hjelm, Nathan T: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk:	ompi/mca/btl/openib ompi/mca/btl/wv	ompi/mca/coll/ml	opal/util/keyval orte/mca/rmaps/rank_file"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
This doesn't work on a subversion checkout. However, there is a similar trick that seems to work in this case. If one copies the opal/util/keyval/keyval_lex.c file from a platform with a recent version of flex (2.5.37 in my case) the compilation proceed without issues.
<br>
<p>&nbsp;&nbsp;george.
<br>
<p>On Dec 4, 2012, at 02:39 , &quot;Hjelm, Nathan T&quot; &lt;hjelmn_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Oh, and I don't know if you have tried this but we don't recreate the keyval_lex.c file if it already exists. This allows use to not put a flex requirement on the end user. Have you tried removing opal/util/keyval/keyval_lex.c? If that works you might want to run configure/make from an empty directory.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -Nathan
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Monday, December 03, 2012 6:28 PM, devel-bounces_at_[hidden] [devel-bounces_at_[hidden]] on behalf of George Bosilca [bosilca_at_[hidden]] wrote:
</span><br>
<span class="quotelev2">&gt;&gt; To: devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Subject: Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk:    ompi/mca/btl/openib ompi/mca/btl/wv ompi/mca/coll/ml    opal/util/keyval orte/mca/rmaps/rank_file
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; I remember there were some discussions about lex (or flex) and their version, but I don't remember the specifics. Whatever the outcome was, we're back at having a problem there, more specifically a missing reference (opal_util_keyval_yylex_destroy) which seems to indicate the issue was not fixed.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;  george.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Nov 9, 2012, at 23:00 , svn-commit-mailer_at_[hidden] wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Author: hjelmn (Nathan Hjelm)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Date: 2012-11-09 17:00:27 EST (Fri, 09 Nov 2012)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; New Revision: 27580
</span><br>
<span class="quotelev3">&gt;&gt;&gt; URL: <a href="https://svn.open-mpi.org/trac/ompi/changeset/27580">https://svn.open-mpi.org/trac/ompi/changeset/27580</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Log:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; add prototypes for lex destroy functions
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Text files modified:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  trunk/ompi/mca/btl/openib/btl_openib_lex.h       |     1 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  trunk/ompi/mca/btl/wv/btl_wv_lex.h               |     1 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  trunk/ompi/mca/coll/ml/coll_ml_lex.h             |     1 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  trunk/opal/util/keyval/keyval_lex.h              |     1 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  trunk/orte/mca/rmaps/rank_file/rmaps_rank_file.h |     2 ++
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  5 files changed, 6 insertions(+), 0 deletions(-)
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
<li><strong>Next message:</strong> <a href="11828.php">Juan A. Rico: "[OMPI devel] Collective SM memory affinity possible error"</a>
<li><strong>Previous message:</strong> <a href="11826.php">Hjelm, Nathan T: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk:	ompi/mca/btl/openib ompi/mca/btl/wv ompi/mca/coll/ml	opal/util/keyval orte/mca/rmaps/rank_file"</a>
<li><strong>In reply to:</strong> <a href="11826.php">Hjelm, Nathan T: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk:	ompi/mca/btl/openib ompi/mca/btl/wv ompi/mca/coll/ml	opal/util/keyval orte/mca/rmaps/rank_file"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11829.php">Hjelm, Nathan T: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk:	ompi/mca/btl/openib ompi/mca/btl/wv	ompi/mca/coll/ml	opal/util/keyval orte/mca/rmaps/rank_file"</a>
<li><strong>Reply:</strong> <a href="11829.php">Hjelm, Nathan T: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27580 - in trunk:	ompi/mca/btl/openib ompi/mca/btl/wv	ompi/mca/coll/ml	opal/util/keyval orte/mca/rmaps/rank_file"</a>
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
