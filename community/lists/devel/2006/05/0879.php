<? include("../../include/msg-header.inc"); ?>
<!-- received="Tue May 16 11:07:52 2006" -->
<!-- isoreceived="20060516150752" -->
<!-- sent="Tue, 16 May 2006 11:07:30 -0400" -->
<!-- isosent="20060516150730" -->
<!-- name="Rolf Vandevaart" -->
<!-- email="Rolf.Vandevaart_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Non-threaded test fails with thread-safe library" -->
<!-- id="4469EAB2.8030807_at_Sun.COM" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="49D16438-FE4E-4146-96F0-3307FDB673A0_at_open-mpi.org" -->
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
<strong>From:</strong> Rolf Vandevaart (<em>Rolf.Vandevaart_at_[hidden]</em>)<br>
<strong>Date:</strong> 2006-05-16 11:07:30
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0880.php">George Bosilca: "Re: [OMPI devel] Non-threaded test fails with thread-safe library"</a>
<li><strong>Previous message:</strong> <a href="0878.php">Edgar Gabriel: "Re: [OMPI devel] MPI_Comm_spawn_multiple() and MPI_ERRORCODES_IGNORE"</a>
<li><strong>In reply to:</strong> <a href="0873.php">Brian Barrett: "Re: [OMPI devel] Non-threaded test fails with thread-safe library"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0880.php">George Bosilca: "Re: [OMPI devel] Non-threaded test fails with thread-safe library"</a>
<li><strong>Reply:</strong> <a href="0880.php">George Bosilca: "Re: [OMPI devel] Non-threaded test fails with thread-safe library"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Hi Brian:
<br>
<p>Here is the stack trace from the core dump.  I am also trying to understand
<br>
better what is happening here, but I figured I needed to get this off
<br>
to you.
<br>
Rolf
<br>
<p>&nbsp;burl-ct-v440-4 96 =&gt;dbx connectivity core
<br>
For information about new features see `help changes'
<br>
To remove this message, put `dbxenv suppress_startup_message 7.4' in 
<br>
your .dbxrc
<br>
Reading connectivity
<br>
core file header read successfully
<br>
[...snip...]
<br>
(dbx) where
<br>
current thread: t_at_1
<br>
&nbsp;&nbsp;[1] _lwp_kill(0x0, 0x6, 0x0, 0x6, 0xfc00, 0x0), at 0xfd840f90
<br>
&nbsp;&nbsp;[2] raise(0x6, 0x0, 0xfd824a98, 0xffffffff, 0xfd868284, 0x6), at 
<br>
0xfd7dfd78
<br>
&nbsp;&nbsp;[3] abort(0xffbfee00, 0x1, 0x0, 0xa83f0, 0xfd86b298, 0x0), at 0xfd7bff98
<br>
=&gt;[4] opal_mutex_lock(m = 0xfd0b12e8), line 101 in &quot;mutex_unix.h&quot;
<br>
&nbsp;&nbsp;[5] __ompi_free_list_wait(fl = 0xfd0b1298, item = 0xffbfef88), line 
<br>
167 in &quot;ompi_free_list.h&quot;
<br>
&nbsp;&nbsp;[6] mca_pml_ob1_recv_frag_match(btl = 0xfcfbc778, hdr = 0xdc897260, 
<br>
segments = 0xdc897218, num_segments = 1U), line 550 in &quot;pml_ob1_recvfrag.c&quot;
<br>
&nbsp;&nbsp;[7] mca_pml_ob1_recv_frag_callback(btl = 0xfcfbc778, tag = '\001', des 
<br>
= 0xdc8971d0, cbdata = (nil)), line 80 in &quot;pml_ob1_recvfrag.c&quot;
<br>
&nbsp;&nbsp;[8] mca_btl_sm_component_progress(), line 396 in &quot;btl_sm_component.c&quot;
<br>
&nbsp;&nbsp;[9] mca_bml_r2_progress(), line 103 in &quot;bml_r2.c&quot;
<br>
&nbsp;&nbsp;[10] opal_progress(), line 288 in &quot;opal_progress.c&quot;
<br>
&nbsp;&nbsp;[11] opal_condition_wait(c = 0xff29d3b8, m = 0xff29d430), line 75 in 
<br>
&quot;condition.h&quot;
<br>
&nbsp;&nbsp;[12] mca_pml_ob1_recv(addr = 0xffbff4b0, count = 1U, datatype = 
<br>
0x21458, src = 0, tag = 0, comm = 0x215a0, status = 0xffbff4c0), line 
<br>
101 in &quot;pml_ob1_irecv.c&quot;
<br>
&nbsp;&nbsp;[13] PMPI_Recv(buf = 0xffbff4b0, count = 1, type = 0x21458, source = 
<br>
0, tag = 0, comm = 0x215a0, status = 0xffbff4c0), line 66 in &quot;precv.c&quot;
<br>
&nbsp;&nbsp;[14] main(argc = 2, argv = 0xffbff53c), line 69 in &quot;connectivity.c&quot;
<br>
(dbx)
<br>
<p><p><p>Brian Barrett wrote On 05/11/06 02:57,:
<br>
<p><span class="quotelev1">&gt;Eeeks!  That sounds like a bug.  Can you attach a debugger and get a  
</span><br>
<span class="quotelev1">&gt;stack trace for the situation where that occurs?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;Brian
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;On May 10, 2006, at 10:17 PM, Rolf Vandevaart wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt;I have built a library with &quot;--enable-mpi-threads --with- 
</span><br>
<span class="quotelev2">&gt;&gt;threads=posix&quot;
</span><br>
<span class="quotelev2">&gt;&gt;(using
</span><br>
<span class="quotelev2">&gt;&gt;the trunk) and tried running a simple non-threaded program linked
</span><br>
<span class="quotelev2">&gt;&gt;against it.
</span><br>
<span class="quotelev2">&gt;&gt;The program just calls to MPI_Send and MPI_Recv so every process  
</span><br>
<span class="quotelev2">&gt;&gt;sends an
</span><br>
<span class="quotelev2">&gt;&gt;MPI_INT to one another.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;When I run it I see the following:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; burl-ct-v440-4 86 =&gt;mpirun -np 4 connectivity -v
</span><br>
<span class="quotelev2">&gt;&gt;burl-ct-v440-4: checking connection    0 &lt;-&gt; 1
</span><br>
<span class="quotelev2">&gt;&gt;burl-ct-v440-4: checking connection    1 &lt;-&gt; 2
</span><br>
<span class="quotelev2">&gt;&gt;burl-ct-v440-4: checking connection    0 &lt;-&gt; 2
</span><br>
<span class="quotelev2">&gt;&gt;opal_mutex_lock(): Deadlock situation detected/avoided
</span><br>
<span class="quotelev2">&gt;&gt;Signal:6 info.si_errno:0(Error 0) si_code:-1()
</span><br>
<span class="quotelev2">&gt;&gt;*** End of error message ***
</span><br>
<span class="quotelev2">&gt;&gt; burl-ct-v440-4 87 =&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;Since I had the debug enabled, I get to see that one of the processes
</span><br>
<span class="quotelev2">&gt;&gt;was trying to grab a lock that it already head.    (Nice feature  
</span><br>
<span class="quotelev2">&gt;&gt;having
</span><br>
<span class="quotelev2">&gt;&gt;that error printed out!)
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;Has anyone else seen this?  As I said, this is a non-threaded program
</span><br>
<span class="quotelev2">&gt;&gt;so there is only one thread per process.   I am wondering if I am  
</span><br>
<span class="quotelev2">&gt;&gt;missing
</span><br>
<span class="quotelev2">&gt;&gt;something basic in the building of my library.  This test works  
</span><br>
<span class="quotelev2">&gt;&gt;fine against
</span><br>
<span class="quotelev2">&gt;&gt;a library configured without &quot;--enable-mpi-threads --with- 
</span><br>
<span class="quotelev2">&gt;&gt;threads=posix&quot;.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;Rolf
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;-- 
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;=========================
</span><br>
<span class="quotelev2">&gt;&gt;rolf.vandevaart_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;781-442-3043
</span><br>
<span class="quotelev2">&gt;&gt;=========================
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;_______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt;devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt;devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;    
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;_______________________________________________
</span><br>
<span class="quotelev1">&gt;devel mailing list
</span><br>
<span class="quotelev1">&gt;devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;  
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><pre>
-- 
=========================
rolf.vandevaart_at_[hidden]
781-442-3043
=========================
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0880.php">George Bosilca: "Re: [OMPI devel] Non-threaded test fails with thread-safe library"</a>
<li><strong>Previous message:</strong> <a href="0878.php">Edgar Gabriel: "Re: [OMPI devel] MPI_Comm_spawn_multiple() and MPI_ERRORCODES_IGNORE"</a>
<li><strong>In reply to:</strong> <a href="0873.php">Brian Barrett: "Re: [OMPI devel] Non-threaded test fails with thread-safe library"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0880.php">George Bosilca: "Re: [OMPI devel] Non-threaded test fails with thread-safe library"</a>
<li><strong>Reply:</strong> <a href="0880.php">George Bosilca: "Re: [OMPI devel] Non-threaded test fails with thread-safe library"</a>
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
