<?
$subject_val = "Re: [OMPI devel] [OMPI svn] svn:open-mpi r31376 - trunk/orte/mca/oob/tcp";
include("../../include/msg-header.inc");
?>
<!-- received="Sun Apr 13 19:23:53 2014" -->
<!-- isoreceived="20140413232353" -->
<!-- sent="Sun, 13 Apr 2014 19:23:49 -0400" -->
<!-- isosent="20140413232349" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [OMPI svn] svn:open-mpi r31376 - trunk/orte/mca/oob/tcp" -->
<!-- id="284466DB-26F0-47BB-ADCC-CF3901A3CC41_at_icl.utk.edu" -->
<!-- charset="windows-1252" -->
<!-- inreplyto="20140412150125.4A61015FB2C_at_tiger.crest.iu.edu" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [OMPI svn] svn:open-mpi r31376 - trunk/orte/mca/oob/tcp<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-04-13 19:23:49
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14501.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r31376 - trunk/orte/mca/oob/tcp"</a>
<li><strong>Previous message:</strong> <a href="14499.php">Anthony Alba: "[OMPI devel] Update SLURM FAQ entry?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14501.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r31376 - trunk/orte/mca/oob/tcp"</a>
<li><strong>Reply:</strong> <a href="14501.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r31376 - trunk/orte/mca/oob/tcp"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Isn&#146;t a socket or a pipe the right way to address this issue?
<br>
<p>&nbsp;&nbsp;George.
<br>
<p>On Apr 12, 2014, at 11:01 , svn-commit-mailer_at_[hidden] wrote:
<br>
<p><span class="quotelev1">&gt; Author: rhc (Ralph Castain)
</span><br>
<span class="quotelev1">&gt; Date: 2014-04-12 11:01:24 EDT (Sat, 12 Apr 2014)
</span><br>
<span class="quotelev1">&gt; New Revision: 31376
</span><br>
<span class="quotelev1">&gt; URL: <a href="https://svn.open-mpi.org/trac/ompi/changeset/31376">https://svn.open-mpi.org/trac/ompi/changeset/31376</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Log:
</span><br>
<span class="quotelev1">&gt; Ensure we properly terminate the listening thread prior to exiting, but do so in a way that doesn't make us wait for select to timeout.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Refs #4510
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Text files modified: 
</span><br>
<span class="quotelev1">&gt;   trunk/orte/mca/oob/tcp/oob_tcp_component.c |     9 ++++++---                               
</span><br>
<span class="quotelev1">&gt;   trunk/orte/mca/oob/tcp/oob_tcp_component.h |     2 ++                                      
</span><br>
<span class="quotelev1">&gt;   trunk/orte/mca/oob/tcp/oob_tcp_listener.c  |    17 ++++++++++++-----                       
</span><br>
<span class="quotelev1">&gt;   3 files changed, 20 insertions(+), 8 deletions(-)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Modified: trunk/orte/mca/oob/tcp/oob_tcp_component.c
</span><br>
<span class="quotelev1">&gt; ==============================================================================
</span><br>
<span class="quotelev1">&gt; --- trunk/orte/mca/oob/tcp/oob_tcp_component.c	Sat Apr 12 10:43:20 2014	(r31375)
</span><br>
<span class="quotelev1">&gt; +++ trunk/orte/mca/oob/tcp/oob_tcp_component.c	2014-04-12 11:01:24 EDT (Sat, 12 Apr 2014)	(r31376)
</span><br>
<span class="quotelev1">&gt; @@ -140,8 +140,8 @@
</span><br>
<span class="quotelev1">&gt;     if (ORTE_PROC_IS_HNP) {
</span><br>
<span class="quotelev1">&gt;         OBJ_CONSTRUCT(&amp;mca_oob_tcp_component.listen_thread, opal_thread_t);
</span><br>
<span class="quotelev1">&gt;         mca_oob_tcp_component.listen_thread_active = false;
</span><br>
<span class="quotelev1">&gt; -        mca_oob_tcp_component.listen_thread_tv.tv_sec = 0;
</span><br>
<span class="quotelev1">&gt; -        mca_oob_tcp_component.listen_thread_tv.tv_usec = 300000;
</span><br>
<span class="quotelev1">&gt; +        mca_oob_tcp_component.listen_thread_tv.tv_sec = 3600;
</span><br>
<span class="quotelev1">&gt; +        mca_oob_tcp_component.listen_thread_tv.tv_usec = 0;
</span><br>
<span class="quotelev1">&gt;     }
</span><br>
<span class="quotelev1">&gt;     mca_oob_tcp_component.addr_count = 0;
</span><br>
<span class="quotelev1">&gt;     OBJ_CONSTRUCT(&amp;mca_oob_tcp_component.modules, opal_pointer_array_t);
</span><br>
<span class="quotelev1">&gt; @@ -659,7 +659,10 @@
</span><br>
<span class="quotelev1">&gt;                         ORTE_NAME_PRINT(ORTE_PROC_MY_NAME));
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt;     if (ORTE_PROC_IS_HNP &amp;&amp; mca_oob_tcp_component.listen_thread_active) {
</span><br>
<span class="quotelev1">&gt; -        mca_oob_tcp_component.listen_thread_active = 0;
</span><br>
<span class="quotelev1">&gt; +        mca_oob_tcp_component.listen_thread_active = false;
</span><br>
<span class="quotelev1">&gt; +        /* tell the thread to exit */
</span><br>
<span class="quotelev1">&gt; +        write(mca_oob_tcp_component.stop_thread, &amp;i, sizeof(int));
</span><br>
<span class="quotelev1">&gt; +        opal_thread_join(&amp;mca_oob_tcp_component.listen_thread, NULL);
</span><br>
<span class="quotelev1">&gt;     }
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt;     while (NULL != (item = opal_list_remove_first(&amp;mca_oob_tcp_component.listeners))) {
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Modified: trunk/orte/mca/oob/tcp/oob_tcp_component.h
</span><br>
<span class="quotelev1">&gt; ==============================================================================
</span><br>
<span class="quotelev1">&gt; --- trunk/orte/mca/oob/tcp/oob_tcp_component.h	Sat Apr 12 10:43:20 2014	(r31375)
</span><br>
<span class="quotelev1">&gt; +++ trunk/orte/mca/oob/tcp/oob_tcp_component.h	2014-04-12 11:01:24 EDT (Sat, 12 Apr 2014)	(r31376)
</span><br>
<span class="quotelev1">&gt; @@ -12,6 +12,7 @@
</span><br>
<span class="quotelev1">&gt;  * Copyright (c) 2006-2013 Los Alamos National Security, LLC. 
</span><br>
<span class="quotelev1">&gt;  *                         All rights reserved.
</span><br>
<span class="quotelev1">&gt;  * Copyright (c) 2010-2011 Cisco Systems, Inc.  All rights reserved.
</span><br>
<span class="quotelev1">&gt; + * Copyright (c) 2014      Intel, Inc. All rights reserved
</span><br>
<span class="quotelev1">&gt;  * $COPYRIGHT$
</span><br>
<span class="quotelev1">&gt;  * 
</span><br>
<span class="quotelev1">&gt;  * Additional copyrights may follow
</span><br>
<span class="quotelev1">&gt; @@ -77,6 +78,7 @@
</span><br>
<span class="quotelev1">&gt;     opal_thread_t      listen_thread;          /**&lt; handle to the listening thread */
</span><br>
<span class="quotelev1">&gt;     bool               listen_thread_active;
</span><br>
<span class="quotelev1">&gt;     struct timeval     listen_thread_tv;       /**&lt; Timeout when using listen thread */
</span><br>
<span class="quotelev1">&gt; +    int                stop_thread;            /**&lt; file descriptor used to exit the listen thread */
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt;     /* peers available via this transport - the index is the process name,
</span><br>
<span class="quotelev1">&gt;      * and the pointer returned is the pointer to the last module that
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Modified: trunk/orte/mca/oob/tcp/oob_tcp_listener.c
</span><br>
<span class="quotelev1">&gt; ==============================================================================
</span><br>
<span class="quotelev1">&gt; --- trunk/orte/mca/oob/tcp/oob_tcp_listener.c	Sat Apr 12 10:43:20 2014	(r31375)
</span><br>
<span class="quotelev1">&gt; +++ trunk/orte/mca/oob/tcp/oob_tcp_listener.c	2014-04-12 11:01:24 EDT (Sat, 12 Apr 2014)	(r31376)
</span><br>
<span class="quotelev1">&gt; @@ -121,11 +121,11 @@
</span><br>
<span class="quotelev1">&gt;     }
</span><br>
<span class="quotelev1">&gt; #endif
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -    /* if I am the HNP, create a separate event base for the
</span><br>
<span class="quotelev1">&gt; -     * listening thread so we can harvest connection requests
</span><br>
<span class="quotelev1">&gt; -     * as rapidly as possible
</span><br>
<span class="quotelev1">&gt; +    /* if I am the HNP, start a listening thread so we can
</span><br>
<span class="quotelev1">&gt; +     * harvest connection requests as rapidly as possible
</span><br>
<span class="quotelev1">&gt;      */
</span><br>
<span class="quotelev1">&gt;     if (ORTE_PROC_IS_HNP) {
</span><br>
<span class="quotelev1">&gt; +        mca_oob_tcp_component.stop_thread = open(&quot;/dev/null&quot;, O_RDWR);
</span><br>
<span class="quotelev1">&gt;         mca_oob_tcp_component.listen_thread_active = true;
</span><br>
<span class="quotelev1">&gt;         mca_oob_tcp_component.listen_thread.t_run = listen_thread;
</span><br>
<span class="quotelev1">&gt;         mca_oob_tcp_component.listen_thread.t_arg = NULL;
</span><br>
<span class="quotelev1">&gt; @@ -641,15 +641,22 @@
</span><br>
<span class="quotelev1">&gt;             FD_SET(listener-&gt;sd, &amp;readfds);
</span><br>
<span class="quotelev1">&gt;             max = (listener-&gt;sd &gt; max) ? listener-&gt;sd : max;
</span><br>
<span class="quotelev1">&gt;         }
</span><br>
<span class="quotelev1">&gt; +        /* add the stop_thread fd */
</span><br>
<span class="quotelev1">&gt; +        FD_SET(mca_oob_tcp_component.stop_thread, &amp;readfds);
</span><br>
<span class="quotelev1">&gt; +        max = (mca_oob_tcp_component.stop_thread &gt; max) ? mca_oob_tcp_component.stop_thread : max;
</span><br>
<span class="quotelev1">&gt; +
</span><br>
<span class="quotelev1">&gt;         /* set timeout interval */
</span><br>
<span class="quotelev1">&gt;         timeout.tv_sec = mca_oob_tcp_component.listen_thread_tv.tv_sec;
</span><br>
<span class="quotelev1">&gt;         timeout.tv_usec = mca_oob_tcp_component.listen_thread_tv.tv_usec;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -        /* Block in a select for a short (10ms) amount of time to
</span><br>
<span class="quotelev1">&gt; -         * avoid hammering the cpu.  If a connection
</span><br>
<span class="quotelev1">&gt; +        /* Block in a select to avoid hammering the cpu.  If a connection
</span><br>
<span class="quotelev1">&gt;          * comes in, we'll get woken up right away.
</span><br>
<span class="quotelev1">&gt;          */
</span><br>
<span class="quotelev1">&gt;         rc = select(max + 1, &amp;readfds, NULL, NULL, &amp;timeout);
</span><br>
<span class="quotelev1">&gt; +        if (!mca_oob_tcp_component.listen_thread_active) {
</span><br>
<span class="quotelev1">&gt; +            /* we've been asked to terminate */
</span><br>
<span class="quotelev1">&gt; +            return NULL;
</span><br>
<span class="quotelev1">&gt; +        }
</span><br>
<span class="quotelev1">&gt;         if (rc &lt; 0) {
</span><br>
<span class="quotelev1">&gt;             if (EAGAIN != opal_socket_errno &amp;&amp; EINTR != opal_socket_errno) {
</span><br>
<span class="quotelev1">&gt;                 perror(&quot;select&quot;);
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; svn mailing list
</span><br>
<span class="quotelev1">&gt; svn_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/svn">http://www.open-mpi.org/mailman/listinfo.cgi/svn</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14501.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r31376 - trunk/orte/mca/oob/tcp"</a>
<li><strong>Previous message:</strong> <a href="14499.php">Anthony Alba: "[OMPI devel] Update SLURM FAQ entry?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14501.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r31376 - trunk/orte/mca/oob/tcp"</a>
<li><strong>Reply:</strong> <a href="14501.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r31376 - trunk/orte/mca/oob/tcp"</a>
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
