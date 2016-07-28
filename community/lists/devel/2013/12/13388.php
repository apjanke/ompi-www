<?
$subject_val = "Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to compile again. (void value not ignored)";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Dec  6 09:21:38 2013" -->
<!-- isoreceived="20131206142138" -->
<!-- sent="Fri, 6 Dec 2013 08:21:37 -0600" -->
<!-- isosent="20131206142137" -->
<!-- name="Josh Hursey" -->
<!-- email="jjhursey_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to compile again. (void value not ignored)" -->
<!-- id="CAANzjEmpnFcYQTuaCW_qLPENQwpd-Am1cc3ZKcsD6UprcWchrQ_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="C7E16A45-029D-4F36-9406-AF0D5E726933_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to compile again. (void value not ignored)<br>
<strong>From:</strong> Josh Hursey (<em>jjhursey_at_[hidden]</em>)<br>
<strong>Date:</strong> 2013-12-06 09:21:37
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="13389.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to compile again. (void value not ignored)"</a>
<li><strong>Previous message:</strong> <a href="13387.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to	compile	again. (void value not ignored)"</a>
<li><strong>In reply to:</strong> <a href="13387.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to	compile	again. (void value not ignored)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="13389.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to compile again. (void value not ignored)"</a>
<li><strong>Reply:</strong> <a href="13389.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to compile again. (void value not ignored)"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
This patch looks good to me. Let me look at some of the others.
<br>
<p><p>On Fri, Dec 6, 2013 at 7:14 AM, Jeff Squyres (jsquyres)
<br>
&lt;jsquyres_at_[hidden]&gt;wrote:
<br>
<p><span class="quotelev1">&gt; Let's see what Josh says (he said he'd review the patches today).  I'm
</span><br>
<span class="quotelev1">&gt; guessing he'll be ok with this one, but let's see.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Dec 6, 2013, at 6:25 AM, Adrian Reber &lt;adrian_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt; &gt; Thanks for your reviews. Will you apply this patch as it is or should I
</span><br>
<span class="quotelev2">&gt; &gt; include it again in my upcoming rework of the other patches?
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;               Adrian
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; On Wed, Dec 04, 2013 at 03:58:49PM +0000, Jeff Squyres (jsquyres) wrote:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; +1 on this patch.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; On Nov 25, 2013, at 9:59 AM, Adrian Reber &lt;adrian_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; From: Adrian Reber &lt;adrian.reber_at_[hidden]&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; This patch fixes
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; error: void value not ignored as it ought to be
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; in the C/R code by ignoring the return value of functions which
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; no longer return a value (only void).
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Signed-off-by: Adrian Reber &lt;adrian.reber_at_[hidden]&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; ---
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; orte/mca/errmgr/base/errmgr_base_tool.c         |  8 +-----
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; orte/mca/rml/ftrm/rml_ftrm.h                    |  6 ++---
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; orte/mca/rml/ftrm/rml_ftrm_module.c             | 32
</span><br>
<span class="quotelev1">&gt; +++++------------------
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; orte/mca/snapc/full/snapc_full_global.c         | 34
</span><br>
<span class="quotelev1">&gt; ++++++-------------------
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; orte/mca/snapc/full/snapc_full_local.c          | 32
</span><br>
<span class="quotelev1">&gt; +++++------------------
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; orte/mca/sstore/central/sstore_central_global.c | 13 ++--------
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; orte/mca/sstore/central/sstore_central_local.c  | 13 ++--------
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; orte/mca/sstore/stage/sstore_stage_global.c     | 13 ++--------
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; orte/mca/sstore/stage/sstore_stage_local.c      | 14 ++--------
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; orte/tools/orte-checkpoint/orte-checkpoint.c    | 14 +++-------
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; orte/tools/orte-migrate/orte-migrate.c          | 14 +++-------
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 11 files changed, 40 insertions(+), 153 deletions(-)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; diff --git a/orte/mca/errmgr/base/errmgr_base_tool.c
</span><br>
<span class="quotelev1">&gt; b/orte/mca/errmgr/base/errmgr_base_tool.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; index a030faf..20d76e5 100644
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --- a/orte/mca/errmgr/base/errmgr_base_tool.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +++ b/orte/mca/errmgr/base/errmgr_base_tool.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -290,16 +290,10 @@ static int
</span><br>
<span class="quotelev1">&gt; errmgr_base_tool_stop_cmdline_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    OPAL_OUTPUT_VERBOSE((5, orte_errmgr_base_framework.framework_output,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;                         &quot;errmgr:base:tool: Shutdown Command Line
</span><br>
<span class="quotelev1">&gt; Channel&quot;));
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    if (ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;  ORTE_RML_TAG_MIGRATE))) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        ORTE_ERROR_LOG(ret);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    orte_rml.recv_cancel(ORTE_NAME_WILDCARD, ORTE_RML_TAG_MIGRATE);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    errmgr_cmdline_recv_issued = false;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; - cleanup:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    return exit_status;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; diff --git a/orte/mca/rml/ftrm/rml_ftrm.h
</span><br>
<span class="quotelev1">&gt; b/orte/mca/rml/ftrm/rml_ftrm.h
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; index 82a80e8..a1bd48a 100644
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --- a/orte/mca/rml/ftrm/rml_ftrm.h
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +++ b/orte/mca/rml/ftrm/rml_ftrm.h
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -63,7 +63,7 @@ BEGIN_C_DECLS
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    /*
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;     * Set URI
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;     */
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int orte_rml_ftrm_set_contact_info(const char* uri);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    void orte_rml_ftrm_set_contact_info(const char* uri);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    /*
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;     * Ping
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -148,7 +148,7 @@ BEGIN_C_DECLS
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    /*
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;     * Recv Cancel
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;     */
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int orte_rml_ftrm_recv_cancel(orte_process_name_t* peer,
</span><br>
<span class="quotelev1">&gt; orte_rml_tag_t tag);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    void orte_rml_ftrm_recv_cancel(orte_process_name_t* peer,
</span><br>
<span class="quotelev1">&gt; orte_rml_tag_t tag);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    /*
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;     * Register a callback on loss of connection
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -161,7 +161,7 @@ BEGIN_C_DECLS
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;     */
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    int orte_rml_ftrm_ft_event(int state);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int orte_rml_ftrm_purge(orte_process_name_t *peer);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    void orte_rml_ftrm_purge(orte_process_name_t *peer);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; END_C_DECLS
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; diff --git a/orte/mca/rml/ftrm/rml_ftrm_module.c
</span><br>
<span class="quotelev1">&gt; b/orte/mca/rml/ftrm/rml_ftrm_module.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; index 76f9064..85b288e 100644
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --- a/orte/mca/rml/ftrm/rml_ftrm_module.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +++ b/orte/mca/rml/ftrm/rml_ftrm_module.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -94,20 +94,14 @@ char * orte_rml_ftrm_get_contact_info(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; /*
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; * Set CONTACT_INFO
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; */
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -int orte_rml_ftrm_set_contact_info(const char* contact_info)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +void orte_rml_ftrm_set_contact_info(const char* contact_info)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    opal_output_verbose(20, rml_ftrm_output_handle,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;                        &quot;orte_rml_ftrm: set_contact_info()&quot;);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    if( NULL != orte_rml_ftrm_wrapped_module.set_contact_info ) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        if( ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml_ftrm_wrapped_module.set_contact_info(contact_info) ) ) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -            return ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +        orte_rml_ftrm_wrapped_module.set_contact_info(contact_info);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -330,20 +324,14 @@ int
</span><br>
<span class="quotelev1">&gt; orte_rml_ftrm_recv_buffer_nb(orte_process_name_t* peer,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; /*
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; * Recv Cancel
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; */
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -int orte_rml_ftrm_recv_cancel(orte_process_name_t* peer,
</span><br>
<span class="quotelev1">&gt; orte_rml_tag_t tag)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +void orte_rml_ftrm_recv_cancel(orte_process_name_t* peer,
</span><br>
<span class="quotelev1">&gt; orte_rml_tag_t tag)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    opal_output_verbose(20, rml_ftrm_output_handle,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;                        &quot;orte_rml_ftrm: recv_cancel()&quot;);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    if( NULL != orte_rml_ftrm_wrapped_module.recv_cancel ) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        if( ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml_ftrm_wrapped_module.recv_cancel(peer, tag) ) ) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -            return ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +        orte_rml_ftrm_wrapped_module.recv_cancel(peer, tag);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -436,18 +424,12 @@ int orte_rml_ftrm_ft_event(int state)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -int orte_rml_ftrm_purge(orte_process_name_t *peer)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +void orte_rml_ftrm_purge(orte_process_name_t *peer)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    opal_output_verbose(20, rml_ftrm_output_handle,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;                        &quot;orte_rml_ftrm: purge()&quot;);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    if( NULL != orte_rml_ftrm_wrapped_module.purge ) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        if( ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml_ftrm_wrapped_module.purge(peer) ) ) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -            return ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +        orte_rml_ftrm_wrapped_module.purge(peer);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; diff --git a/orte/mca/snapc/full/snapc_full_global.c
</span><br>
<span class="quotelev1">&gt; b/orte/mca/snapc/full/snapc_full_global.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; index 8f1317b..c88c6db 100644
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --- a/orte/mca/snapc/full/snapc_full_global.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +++ b/orte/mca/snapc/full/snapc_full_global.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -905,26 +905,17 @@ static int snapc_full_global_start_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int snapc_full_global_stop_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret, exit_status = ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    if (!snapc_orted_recv_issued &amp;&amp; ORTE_PROC_IS_HNP) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;        return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    OPAL_OUTPUT_VERBOSE((5,
</span><br>
<span class="quotelev1">&gt; mca_snapc_full_component.super.output_handle,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;                         &quot;Global) Shutdown Coordinator Channel&quot;));
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    if (ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;  ORTE_RML_TAG_SNAPC_FULL))) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        ORTE_ERROR_LOG(ret);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    orte_rml.recv_cancel(ORTE_NAME_WILDCARD, ORTE_RML_TAG_SNAPC_FULL);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    snapc_orted_recv_issued = false;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; - cleanup:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return exit_status;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int snapc_full_global_start_cmdline_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -959,26 +950,17 @@ static int
</span><br>
<span class="quotelev1">&gt; snapc_full_global_start_cmdline_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int snapc_full_global_stop_cmdline_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret, exit_status = ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    if (!snapc_cmdline_recv_issued &amp;&amp; ORTE_PROC_IS_HNP) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;        return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    OPAL_OUTPUT_VERBOSE((5,
</span><br>
<span class="quotelev1">&gt; mca_snapc_full_component.super.output_handle,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;                         &quot;Global) Shutdown Command Line Channel&quot;));
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    if (ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;  ORTE_RML_TAG_CKPT))) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        ORTE_ERROR_LOG(ret);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    orte_rml.recv_cancel(ORTE_NAME_WILDCARD, ORTE_RML_TAG_CKPT);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    snapc_cmdline_recv_issued = false;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; - cleanup:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return exit_status;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; /*****************
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; diff --git a/orte/mca/snapc/full/snapc_full_local.c
</span><br>
<span class="quotelev1">&gt; b/orte/mca/snapc/full/snapc_full_local.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; index 0975d77..c0b168a 100644
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --- a/orte/mca/snapc/full/snapc_full_local.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +++ b/orte/mca/snapc/full/snapc_full_local.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -378,8 +378,6 @@ static int
</span><br>
<span class="quotelev1">&gt; snapc_full_local_start_hnp_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int snapc_full_local_stop_hnp_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret, exit_status = ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    /*
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;     * Global Coordinator: Does not register a Local listener
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;     */
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -393,18 +391,11 @@ static int
</span><br>
<span class="quotelev1">&gt; snapc_full_local_stop_hnp_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    OPAL_OUTPUT_VERBOSE((5,
</span><br>
<span class="quotelev1">&gt; mca_snapc_full_component.super.output_handle,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;                         &quot;Local) Shutdown Coordinator Channel&quot;));
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    if (ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;  ORTE_RML_TAG_SNAPC_FULL))) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        ORTE_ERROR_LOG(ret);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    orte_rml.recv_cancel(ORTE_NAME_WILDCARD, ORTE_RML_TAG_SNAPC_FULL);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    snapc_local_hnp_recv_issued = false;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; - cleanup:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return exit_status;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int snapc_full_local_start_app_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -439,26 +430,17 @@ static int
</span><br>
<span class="quotelev1">&gt; snapc_full_local_start_app_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int snapc_full_local_stop_app_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret, exit_status = ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    if (!snapc_local_app_recv_issued ) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;        return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    OPAL_OUTPUT_VERBOSE((5,
</span><br>
<span class="quotelev1">&gt; mca_snapc_full_component.super.output_handle,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;                         &quot;Local) Shutdown Application State Channel&quot;));
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    if (ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;  ORTE_RML_TAG_SNAPC))) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        ORTE_ERROR_LOG(ret);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    orte_rml.recv_cancel(ORTE_NAME_WILDCARD, ORTE_RML_TAG_SNAPC);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    snapc_local_app_recv_issued = false;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; - cleanup:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return exit_status;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; /******************
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; diff --git a/orte/mca/sstore/central/sstore_central_global.c
</span><br>
<span class="quotelev1">&gt; b/orte/mca/sstore/central/sstore_central_global.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; index cd41aef..935b6fe 100644
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --- a/orte/mca/sstore/central/sstore_central_global.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +++ b/orte/mca/sstore/central/sstore_central_global.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -824,19 +824,10 @@ static int
</span><br>
<span class="quotelev1">&gt; sstore_central_global_start_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int sstore_central_global_stop_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret, exit_status = ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    if (ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;  ORTE_RML_TAG_SSTORE_INTERNAL))) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        ORTE_ERROR_LOG(ret);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev1">&gt; ORTE_RML_TAG_SSTORE_INTERNAL);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    is_global_listener_active = false;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; - cleanup:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return exit_status;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static void sstore_central_global_recv(int status,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; diff --git a/orte/mca/sstore/central/sstore_central_local.c
</span><br>
<span class="quotelev1">&gt; b/orte/mca/sstore/central/sstore_central_local.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; index 0442dd0..35ef518 100644
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --- a/orte/mca/sstore/central/sstore_central_local.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +++ b/orte/mca/sstore/central/sstore_central_local.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -643,19 +643,10 @@ static int
</span><br>
<span class="quotelev1">&gt; sstore_central_local_start_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int sstore_central_local_stop_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret, exit_status = ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    if (ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;  ORTE_RML_TAG_SSTORE_INTERNAL))) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        ORTE_ERROR_LOG(ret);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev1">&gt; ORTE_RML_TAG_SSTORE_INTERNAL);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    is_global_listener_active = false;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; - cleanup:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return exit_status;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int process_global_pull(orte_process_name_t* peer,
</span><br>
<span class="quotelev1">&gt; opal_buffer_t* buffer, orte_sstore_central_local_snapshot_info_t
</span><br>
<span class="quotelev1">&gt; *handle_info)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; diff --git a/orte/mca/sstore/stage/sstore_stage_global.c
</span><br>
<span class="quotelev1">&gt; b/orte/mca/sstore/stage/sstore_stage_global.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; index c79bfb9..1c8847a 100644
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --- a/orte/mca/sstore/stage/sstore_stage_global.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +++ b/orte/mca/sstore/stage/sstore_stage_global.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -1016,19 +1016,10 @@ static int
</span><br>
<span class="quotelev1">&gt; sstore_stage_global_start_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int sstore_stage_global_stop_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret, exit_status = ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    if (ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;  ORTE_RML_TAG_SSTORE_INTERNAL))) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        ORTE_ERROR_LOG(ret);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev1">&gt; ORTE_RML_TAG_SSTORE_INTERNAL);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    is_global_listener_active = false;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; - cleanup:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return exit_status;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static void sstore_stage_global_recv(int status,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; diff --git a/orte/mca/sstore/stage/sstore_stage_local.c
</span><br>
<span class="quotelev1">&gt; b/orte/mca/sstore/stage/sstore_stage_local.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; index e3667ba..792c1a2 100644
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --- a/orte/mca/sstore/stage/sstore_stage_local.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +++ b/orte/mca/sstore/stage/sstore_stage_local.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -1067,19 +1067,9 @@ static int
</span><br>
<span class="quotelev1">&gt; sstore_stage_local_start_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int sstore_stage_local_stop_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret, exit_status = ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    if (ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;  ORTE_RML_TAG_SSTORE_INTERNAL))) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        ORTE_ERROR_LOG(ret);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev1">&gt; ORTE_RML_TAG_SSTORE_INTERNAL);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    is_global_listener_active = false;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; - cleanup:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return exit_status;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static void sstore_stage_local_recv(int status,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; diff --git a/orte/tools/orte-checkpoint/orte-checkpoint.c
</span><br>
<span class="quotelev1">&gt; b/orte/tools/orte-checkpoint/orte-checkpoint.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; index 9f2e716..caa5949 100644
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --- a/orte/tools/orte-checkpoint/orte-checkpoint.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +++ b/orte/tools/orte-checkpoint/orte-checkpoint.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -671,22 +671,14 @@ static int start_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int stop_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret, exit_status = ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    if( !listener_started ) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ORTE_ERROR;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +        return ORTE_ERROR;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    if (ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;  ORTE_RML_TAG_CKPT))) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    orte_rml.recv_cancel(ORTE_NAME_WILDCARD, ORTE_RML_TAG_CKPT);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    listener_started = false;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; - cleanup:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return exit_status;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static void hnp_receiver(int status,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; diff --git a/orte/tools/orte-migrate/orte-migrate.c
</span><br>
<span class="quotelev1">&gt; b/orte/tools/orte-migrate/orte-migrate.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; index b1de924..7ba2074 100644
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --- a/orte/tools/orte-migrate/orte-migrate.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +++ b/orte/tools/orte-migrate/orte-migrate.c
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; @@ -532,22 +532,14 @@ static int start_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static int stop_listener(void)
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    int ret, exit_status = ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    if( !listener_started ) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ORTE_ERROR;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +        return ORTE_ERROR;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    if (ORTE_SUCCESS != (ret =
</span><br>
<span class="quotelev1">&gt; orte_rml.recv_cancel(ORTE_NAME_WILDCARD,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;  ORTE_RML_TAG_MIGRATE))) {
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        exit_status = ret;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -        goto cleanup;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    orte_rml.recv_cancel(ORTE_NAME_WILDCARD, ORTE_RML_TAG_MIGRATE);
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;    listener_started = false;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; - cleanup:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -    return exit_status;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; +    return ORTE_SUCCESS;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; static void hnp_receiver(int status,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 1.8.3.1
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; --
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev3">&gt; &gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; For corporate legal information go to:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev1">&gt; For corporate legal information go to:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
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
<p><p><p><pre>
-- 
Joshua Hursey
Assistant Professor of Computer Science
University of Wisconsin-La Crosse
<a href="http://cs.uwlax.edu/~jjhursey">http://cs.uwlax.edu/~jjhursey</a>
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-13388/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="13389.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to compile again. (void value not ignored)"</a>
<li><strong>Previous message:</strong> <a href="13387.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to	compile	again. (void value not ignored)"</a>
<li><strong>In reply to:</strong> <a href="13387.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to	compile	again. (void value not ignored)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="13389.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to compile again. (void value not ignored)"</a>
<li><strong>Reply:</strong> <a href="13389.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [PATCH 1/4] Trying to get the C/R code to compile again. (void value not ignored)"</a>
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
