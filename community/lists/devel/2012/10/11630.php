<?
$subject_val = "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk: ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va...";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Oct 24 12:48:19 2012" -->
<!-- isoreceived="20121024164819" -->
<!-- sent="Wed, 24 Oct 2012 18:48:07 +0200" -->
<!-- isosent="20121024164807" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk: ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va..." -->
<!-- id="F16D8E2F-5A47-4A14-A68F-86A89BE28C8D_at_icl.utk.edu" -->
<!-- charset="windows-1252" -->
<!-- inreplyto="3A266020-620B-478B-98DB-4A973A9021A6_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk: ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va...<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-10-24 12:48:07
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11631.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk: ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va..."</a>
<li><strong>Previous message:</strong> <a href="11629.php">Ralph Castain: "[OMPI devel] OMPI developers meeting: Dec 2012"</a>
<li><strong>In reply to:</strong> <a href="11626.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk:	ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va..."</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11631.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk: ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va..."</a>
<li><strong>Reply:</strong> <a href="11631.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk: ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va..."</a>
<li><strong>Reply:</strong> <a href="11683.php">Nathan Hjelm: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk: ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va..."</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I have some issues starting my applications lately. Here is an example:
<br>
<p>mpirun -x LD_LIBRARY_PATH -np 8 -hostfile /etc/hostfile -bynode  ./testing_dtrmm -N 4000 -p 4 -x
<br>
<p>And the corresponding output:
<br>
/home/bosilca/opt/trunk/debug/bin/orted: Error: unknown option &quot;-p&quot;
<br>
<p>And then the daemons segfault &#133;
<br>
<p>&nbsp;&nbsp;george.
<br>
<p><p>On Oct 22, 2012, at 17:43 , Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Ah, I see - I checked and I don't see any unusual behavior in ompi_info or in picking up the params in components, so it looks like it didn't matter.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Oct 22, 2012, at 8:04 AM, &quot;Hjelm, Nathan T&quot; &lt;hjelmn_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; The change was due to the removal of the deprecated functions in mca_base_param. Comments in the command line parser suggested the change was expected eventually:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 179      struct opal_cmd_line_init_t {
</span><br>
<span class="quotelev2">&gt;&gt; 180	        /** If want to set an MCA parameter, set its type name here.
</span><br>
<span class="quotelev2">&gt;&gt; 181	            WARNING: This MCA tuple (type, component, param) will
</span><br>
<span class="quotelev2">&gt;&gt; 182	            eventually be replaced with a single name! */
</span><br>
<span class="quotelev2">&gt;&gt; 183	        const char *ocl_mca_type_name;
</span><br>
<span class="quotelev2">&gt;&gt; 184	        /** If want to set an MCA parameter, set its component name
</span><br>
<span class="quotelev2">&gt;&gt; 185	            here.  WARNING: This MCA tuple (type, component, param)
</span><br>
<span class="quotelev2">&gt;&gt; 186	            will eventually be replaced with a single name! */
</span><br>
<span class="quotelev2">&gt;&gt; 187	        const char *ocl_mca_component_name;
</span><br>
<span class="quotelev2">&gt;&gt; 188	        /** If want to set an MCA parameter, set its parameter name
</span><br>
<span class="quotelev2">&gt;&gt; 189	            here.  WARNING: This MCA tuple (type, component, param)
</span><br>
<span class="quotelev2">&gt;&gt; 190	            will eventually be replaced with a single name! */
</span><br>
<span class="quotelev2">&gt;&gt; 191	        const char *ocl_mca_param_name;
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; -Nathan
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; ________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; From: devel-bounces_at_[hidden] [devel-bounces_at_[hidden]] on behalf of Ralph Castain [rhc_at_[hidden]]
</span><br>
<span class="quotelev2">&gt;&gt; Sent: Thursday, October 18, 2012 5:48 PM
</span><br>
<span class="quotelev2">&gt;&gt; To: devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Subject: Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk:    ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma       ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base        ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda ompi/mca/btl/template ompi/mca/btl/va...
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Hmmm...this didn't just remove deprecated functions. It actually changed the way the cmd line parser works. Was that intentional?
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; I haven't fully grok'd what that did to us, but wonder if the change was intentional or just got caught in the commit?
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Oct 17, 2012, at 1:17 PM, svn-commit-mailer_at_[hidden] wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Author: hjelmn (Nathan Hjelm)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Date: 2012-10-17 16:17:37 EDT (Wed, 17 Oct 2012)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; New Revision: 27451
</span><br>
<span class="quotelev3">&gt;&gt;&gt; URL: <a href="https://svn.open-mpi.org/trac/ompi/changeset/27451">https://svn.open-mpi.org/trac/ompi/changeset/27451</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Log:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; MCA: remove deprecated mca_base_param functions (mca_base_param_register_int, mca_base_param_register_string, mca_base_param_environ_variable). Remove all uses of deprecated functions.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; cmr:v1.7
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Text files modified:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/allocator/bucket/allocator_bucket.c                 |     5
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/bcol/basesmuma/bcol_basesmuma_component.c           |     7
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/bml/base/bml_base_open.c                            |    22 +--
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/btl/base/btl_base_open.c                            |    10 +-
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/btl/btl.h                                           |     4
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/btl/openib/btl_openib_component.c                   |     8 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/btl/sm/btl_sm_component.c                           |    14 ++
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/btl/smcuda/btl_smcuda_component.c                   |    14 ++
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/btl/template/btl_template_component.c               |    14 ++
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/btl/vader/btl_vader_component.c                     |    14 +-
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/btl/wv/btl_wv_component.c                           |     6
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/coll/demo/coll_demo_component.c                     |     8 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/coll/ml/coll_ml_component.c                         |    19 ---
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/coll/self/coll_self_component.c                     |     3
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/pml/base/pml_base_bsend.c                           |     5
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/pml/bfo/pml_bfo_component.c                         |     6
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/pml/csum/pml_csum_component.c                       |     6
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/pml/dr/pml_dr_component.c                           |     6
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/pml/example/pml_example_component.c                 |     6
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/pml/ob1/pml_ob1_component.c                         |     6
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/pml/v/pml_v_component.c                             |    12 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/sbgp/basesmsocket/sbgp_basesmsocket_component.c     |     7 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/sbgp/basesmuma/sbgp_basesmuma_component.c           |     7 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/sbgp/ibnet/sbgp_ibnet_component.c                   |     9 -
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/sbgp/p2p/sbgp_p2p_component.c                       |     7 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/vprotocol/example/vprotocol_example_component.c     |     7 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/mca/vprotocol/pessimist/vprotocol_pessimist_component.c |    14 ++
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/ompi/tools/ompi-server/ompi-server.c                         |    10 +-
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/opal/dss/dss_open_close.c                                    |    19 +--
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/opal/mca/base/mca_base_cmd_line.c                            |     4
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/opal/mca/base/mca_base_components_open.c                     |    11 +
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/opal/mca/base/mca_base_param.c                               |    96 --------------------
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/opal/mca/base/mca_base_param.h                               |   136 +---------------------------
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/opal/mca/shmem/base/shmem_base_select.c                      |     3
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/opal/tools/opal-checkpoint/opal-checkpoint.c                 |    14 +-
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/opal/tools/opal-restart/opal-restart.c                       |    18 +-
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/opal/util/cmd_line.c                                         |     8 -
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/opal/util/cmd_line.h                                         |    11 --
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/mca/ess/base/ess_base_put.c                             |     6
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/mca/ess/pmi/ess_pmi_module.c                            |     2
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/mca/odls/base/odls_base_default_fns.c                   |    36 +++---
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/mca/odls/default/odls_default_module.c                  |     5
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/mca/plm/base/plm_base_launch_support.c                  |     6
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/mca/plm/tm/plm_tm_module.c                              |     2
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/orted/orted_main.c                                      |    48 +++++-----
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/tools/orte-checkpoint/orte-checkpoint.c                 |    28 +++---
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/tools/orte-clean/orte-clean.c                           |     8
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/tools/orte-migrate/orte-migrate.c                       |    16 +-
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/tools/orte-ps/orte-ps.c                                 |    16 +-
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/tools/orte-restart/orte-restart.c                       |    24 ++--
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/tools/orte-top/orte-top.c                               |    18 +-
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/tools/orterun/orterun.c                                 |   186 +++++++++++++++++++--------------------
</span><br>
<span class="quotelev3">&gt;&gt;&gt; trunk/orte/util/pre_condition_transports.c                         |     2
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 53 files changed, 390 insertions(+), 589 deletions(-)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Diff not shown due to size (102218 bytes).
</span><br>
<span class="quotelev3">&gt;&gt;&gt; To see the diff, run the following command:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;     svn diff -r 27450:27451 --no-diff-deleted
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; svn mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; svn_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/svn">http://www.open-mpi.org/mailman/listinfo.cgi/svn</a>
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
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11631.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk: ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va..."</a>
<li><strong>Previous message:</strong> <a href="11629.php">Ralph Castain: "[OMPI devel] OMPI developers meeting: Dec 2012"</a>
<li><strong>In reply to:</strong> <a href="11626.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk:	ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va..."</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11631.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk: ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va..."</a>
<li><strong>Reply:</strong> <a href="11631.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk: ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va..."</a>
<li><strong>Reply:</strong> <a href="11683.php">Nathan Hjelm: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r27451 - in trunk: ompi/mca/allocator/bucket ompi/mca/bcol/basesmuma	ompi/mca/bml/base ompi/mca/btl ompi/mca/btl/base	ompi/mca/btl/openib ompi/mca/btl/sm ompi/mca/btl/smcuda	ompi/mca/btl/template ompi/mca/btl/va..."</a>
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
