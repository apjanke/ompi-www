<? include("../../include/msg-header.inc"); ?>
<!-- received="Tue Sep 11 11:31:02 2007" -->
<!-- isoreceived="20070911153102" -->
<!-- sent="Tue, 11 Sep 2007 11:30:53 -0400" -->
<!-- isosent="20070911153053" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16088" -->
<!-- id="6F02234E-27A5-4E20-80C5-2786B6DF6A6C_at_eecs.utk.edu" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="20070911150521.GA28957_at_minantech.com" -->
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
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2007-09-11 11:30:53
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2302.php">Gleb Natapov: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16088"</a>
<li><strong>Previous message:</strong> <a href="2300.php">Gleb Natapov: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16088"</a>
<li><strong>In reply to:</strong> <a href="2299.php">Gleb Natapov: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16088"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2302.php">Gleb Natapov: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16088"</a>
<li><strong>Reply:</strong> <a href="2302.php">Gleb Natapov: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16088"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
On Sep 11, 2007, at 11:05 AM, Gleb Natapov wrote:
<br>
<p><span class="quotelev1">&gt; On Tue, Sep 11, 2007 at 10:54:25AM -0400, George Bosilca wrote:
</span><br>
<span class="quotelev2">&gt;&gt; We don't want to prevent two thread from entering the code is same  
</span><br>
<span class="quotelev2">&gt;&gt; time.
</span><br>
<span class="quotelev2">&gt;&gt; The algorithm you cited support this case. There is only one  
</span><br>
<span class="quotelev2">&gt;&gt; moment that is
</span><br>
<span class="quotelev1">&gt; Are you sure it support this case? There is a global var mask_in_use
</span><br>
<span class="quotelev1">&gt; that prevent multiple access.
</span><br>
<p>I'm unable to find the mask_in_use global variable. Where it is ?
<br>
<p>&nbsp;&nbsp;&nbsp;george.
<br>
<p><span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; critical. The local selection of the next available cid. And this  
</span><br>
<span class="quotelev2">&gt;&gt; is what
</span><br>
<span class="quotelev2">&gt;&gt; we try to protect there. If after the first run, the collective  
</span><br>
<span class="quotelev2">&gt;&gt; call do not
</span><br>
<span class="quotelev2">&gt;&gt; manage to figure out the correct next_cid then we will execute the  
</span><br>
<span class="quotelev2">&gt;&gt; while
</span><br>
<span class="quotelev2">&gt;&gt; loop again. And then this condition make sense, as only the thread  
</span><br>
<span class="quotelev2">&gt;&gt; running
</span><br>
<span class="quotelev2">&gt;&gt; on the smallest communicator cid will continue. This insure that  
</span><br>
<span class="quotelev2">&gt;&gt; it will
</span><br>
<span class="quotelev2">&gt;&gt; pickup the smallest next available cid, and then it's reduce  
</span><br>
<span class="quotelev2">&gt;&gt; operation will
</span><br>
<span class="quotelev2">&gt;&gt; succeed. The other threads will wait until the selection of the next
</span><br>
<span class="quotelev2">&gt;&gt; available cid is unlocked.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Without the code you removed we face a deadlock situation.  
</span><br>
<span class="quotelev2">&gt;&gt; Multiple threads
</span><br>
<span class="quotelev2">&gt;&gt; will pick different next_cid on each process and thy will never  
</span><br>
<span class="quotelev2">&gt;&gt; succeed
</span><br>
<span class="quotelev2">&gt;&gt; with the reduce operation. And this is what we're trying to avoid  
</span><br>
<span class="quotelev2">&gt;&gt; with the
</span><br>
<span class="quotelev2">&gt;&gt; test.
</span><br>
<span class="quotelev1">&gt; OK. I think now I get the idea behind this test. I'll restore it and
</span><br>
<span class="quotelev1">&gt; leave ompi_comm_unregister_cid() fix in place. Is this OK?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;   george.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Sep 11, 2007, at 10:34 AM, Gleb Natapov wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Tue, Sep 11, 2007 at 10:14:30AM -0400, George Bosilca wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Gleb,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; This patch is not correct. The code preventing the registration  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; of the
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; same
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; communicator twice is later in the code (same file in the function
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; ompi_comm_register_cid line 326). Once the function
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; ompi_comm_register_cid
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I saw this code and the comment. The problem is not with the same
</span><br>
<span class="quotelev3">&gt;&gt;&gt; communicator but with different communicators.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; is called, we know that each communicator only handle one  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; &quot;communicator
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; creation&quot; function at the same time. Therefore, we want to give  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; priority
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; to
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; the smallest com_id, which is what happens in the code you removed.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; The code I removed was doing it wrongly. I.e the algorithm  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; sometimes is
</span><br>
<span class="quotelev3">&gt;&gt;&gt; executed
</span><br>
<span class="quotelev3">&gt;&gt;&gt; for different communicators simultaneously by different threads.  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Think
</span><br>
<span class="quotelev3">&gt;&gt;&gt; about the case where the function is running for cid 1 and then  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; another
</span><br>
<span class="quotelev3">&gt;&gt;&gt; thread runs it for cid 0. cid 0 will proceed although the  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; function is
</span><br>
<span class="quotelev3">&gt;&gt;&gt; executed on another CPU. And this is not something theoretical, that
</span><br>
<span class="quotelev3">&gt;&gt;&gt; is happening with sun's thread test suit mpi_coll test case.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Without the condition in the ompi_comm_register_cid (each  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; communicator
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; only
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; get registered once) your comment make sense. However, with the  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; condition
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; your patch allow a dead end situation, while 2 processes try to  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; create
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; communicators in multiple threads, and they will never succeed,  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; simply
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; because they will not order the creation based on the com_id.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; If the algorithm is really prone to deadlock in case it is  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; concurrently
</span><br>
<span class="quotelev3">&gt;&gt;&gt; executed for several different communicators (I haven't check this),
</span><br>
<span class="quotelev3">&gt;&gt;&gt; then we may want to fix original code to really prevent two  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; threads to
</span><br>
<span class="quotelev3">&gt;&gt;&gt; enter the function, but then I don't see the reason for all those
</span><br>
<span class="quotelev3">&gt;&gt;&gt; complications with ompi_comm_register_cid()/ 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ompi_comm_unregister_cid()
</span><br>
<span class="quotelev3">&gt;&gt;&gt; The algorithm described here:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://209.85.129.104/search?q=cache:5PV5MMRkBWkJ:ftp://">http://209.85.129.104/search?q=cache:5PV5MMRkBWkJ:ftp://</a> 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; info.mcs.anl.gov/pub/tech_reports/reports/P1382.pdf+MPI 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +communicator+dup+algorithm&amp;hl=en&amp;ct=clnk&amp;cd=2
</span><br>
<span class="quotelev3">&gt;&gt;&gt; in section 5.3 works without it and we can do something similar.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;   george.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Sep 11, 2007, at 9:23 AM, gleb_at_[hidden] wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Author: gleb
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Date: 2007-09-11 09:23:46 EDT (Tue, 11 Sep 2007)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; New Revision: 16088
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; URL: <a href="https://svn.open-mpi.org/trac/ompi/changeset/16088">https://svn.open-mpi.org/trac/ompi/changeset/16088</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Log:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; The code tries to prevent itself from running for more then one
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; communicator
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; simultaneously, but is doing it incorrectly. If the function is  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; running
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; already
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; for one communicator and it is called from another thread for  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; other
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; communicator
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; with lower cid the check comm-&gt;c_contextid !=  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ompi_comm_lowest_cid()
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; will fail and the function will be executed for two different
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; communicators by
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; two threads simultaneously. There is nothing in the algorithm that
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; prevent
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; it
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; from been running simultaneously for different communicators as  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; far as I
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; can see,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; but ompi_comm_unregister_cid() assumes that it is always called  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; for a
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; communicator
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; with the lowest cid and this is not always the case. This patch  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; removes
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; bogus
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; lowest cid check and fix ompi_comm_register_cid() to properly  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; remove cid
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; from
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; the list.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Text files modified:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;    trunk/ompi/communicator/comm_cid.c |    24 +++++++++++ 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +------------
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;    1 files changed, 12 insertions(+), 12 deletions(-)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Modified: trunk/ompi/communicator/comm_cid.c
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ================================================================== 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ============
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --- trunk/ompi/communicator/comm_cid.c	(original)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +++ trunk/ompi/communicator/comm_cid.c	2007-09-11 09:23:46 EDT  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; (Tue, 11
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Sep 2007)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; @@ -11,6 +11,7 @@
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;   *                         All rights reserved.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;   * Copyright (c) 2006-2007 University of Houston. All rights  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; reserved.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;   * Copyright (c) 2007      Cisco, Inc.  All rights reserved.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; + * Copyright (c) 2007      Voltaire All rights reserved.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;   * $COPYRIGHT$
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;   *
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;   * Additional copyrights may follow
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; @@ -170,15 +171,6 @@
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;               * This is the real algorithm described in the doc
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;               */
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -            OPAL_THREAD_LOCK(&amp;ompi_cid_lock);
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -            if (comm-&gt;c_contextid != ompi_comm_lowest_cid() ) {
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -                /* if not lowest cid, we do not continue, but  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; sleep and
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; try again */
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -                OPAL_THREAD_UNLOCK(&amp;ompi_cid_lock);
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -                continue;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -            }
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -            OPAL_THREAD_UNLOCK(&amp;ompi_cid_lock);
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;              for (i=start; i &lt; mca_pml.pml_max_contextid ; i++) {
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; flag=ompi_pointer_array_test_and_set_item(&amp;ompi_mpi_communicators,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;                                                            i,  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; comm);
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; @@ -365,10 +357,18 @@
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  static int ompi_comm_unregister_cid (uint32_t cid)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  {
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -    ompi_comm_reg_t *regcom=NULL;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -    opal_list_item_t
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; *item=opal_list_remove_first(&amp;ompi_registered_comms);
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +    ompi_comm_reg_t *regcom;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +    opal_list_item_t *item;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -    regcom = (ompi_comm_reg_t *) item;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +    for (item = opal_list_get_first(&amp;ompi_registered_comms);
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +         item != opal_list_get_end(&amp;ompi_registered_comms);
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +         item = opal_list_get_next(item)) {
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +        regcom = (ompi_comm_reg_t *)item;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +        if(regcom-&gt;cid == cid) {
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +            opal_list_remove_item(&amp;ompi_registered_comms, item);
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +            break;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +        }
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; +    }
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;      OBJ_RELEASE(regcom);
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;      return OMPI_SUCCESS;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  }
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; svn-full mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; svn-full_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/svn-full">http://www.open-mpi.org/mailman/listinfo.cgi/svn-full</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 			Gleb.
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
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
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
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; 			Gleb.
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><p>
<br><hr>
<ul>
<li>application/pkcs7-signature attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-2301/smime.p7s">smime.p7s</a>
</ul>
<!-- attachment="smime.p7s" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2302.php">Gleb Natapov: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16088"</a>
<li><strong>Previous message:</strong> <a href="2300.php">Gleb Natapov: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16088"</a>
<li><strong>In reply to:</strong> <a href="2299.php">Gleb Natapov: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16088"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2302.php">Gleb Natapov: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16088"</a>
<li><strong>Reply:</strong> <a href="2302.php">Gleb Natapov: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r16088"</a>
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
