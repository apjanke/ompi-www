<?
$subject_val = "Re: [OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Jun  6 15:19:28 2014" -->
<!-- isoreceived="20140606191928" -->
<!-- sent="Fri, 6 Jun 2014 12:19:24 -0700" -->
<!-- isosent="20140606191924" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk" -->
<!-- id="ACFEB5FA-2D19-4B5C-ACDB-B18864D2C3C6_at_open-mpi.org" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="3AF945EBF4D3EC41AFE44EED9B0585F36046F8524F_at_HQMAIL02.nvidia.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-06-06 15:19:24
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14992.php">Rolf vandeVaart: "Re: [OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk"</a>
<li><strong>Previous message:</strong> <a href="14990.php">Rolf vandeVaart: "[OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk"</a>
<li><strong>In reply to:</strong> <a href="14990.php">Rolf vandeVaart: "[OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14992.php">Rolf vandeVaart: "Re: [OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk"</a>
<li><strong>Reply:</strong> <a href="14992.php">Rolf vandeVaart: "Re: [OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Works fine for me:
<br>
<p>[rhc_at_bend001 mpi]$ mpirun -n 3 --host bend001 ./simple_spawn
<br>
[pid 22777] starting up!
<br>
[pid 22778] starting up!
<br>
[pid 22779] starting up!
<br>
1 completed MPI_Init
<br>
Parent [pid 22778] about to spawn!
<br>
2 completed MPI_Init
<br>
Parent [pid 22779] about to spawn!
<br>
0 completed MPI_Init
<br>
Parent [pid 22777] about to spawn!
<br>
[pid 22783] starting up!
<br>
[pid 22784] starting up!
<br>
Parent done with spawn
<br>
Parent sending message to child
<br>
Parent done with spawn
<br>
Parent done with spawn
<br>
0 completed MPI_Init
<br>
Hello from the child 0 of 2 on host bend001 pid 22783
<br>
Child 0 received msg: 38
<br>
1 completed MPI_Init
<br>
Hello from the child 1 of 2 on host bend001 pid 22784
<br>
Child 1 disconnected
<br>
Parent disconnected
<br>
Parent disconnected
<br>
Parent disconnected
<br>
Child 0 disconnected
<br>
22784: exiting
<br>
22778: exiting
<br>
22779: exiting
<br>
22777: exiting
<br>
22783: exiting
<br>
[rhc_at_bend001 mpi]$ make spawn_multiple
<br>
mpicc -g --openmpi:linkall    spawn_multiple.c   -o spawn_multiple
<br>
[rhc_at_bend001 mpi]$ mpirun -n 3 --host bend001 ./spawn_multiple
<br>
Parent [pid 22797] about to spawn!
<br>
Parent [pid 22798] about to spawn!
<br>
Parent [pid 22799] about to spawn!
<br>
Parent done with spawn
<br>
Parent done with spawn
<br>
Parent sending message to children
<br>
Parent done with spawn
<br>
Hello from the child 0 of 2 on host bend001 pid 22803: argv[1] = foo
<br>
Child 0 received msg: 38
<br>
Hello from the child 1 of 2 on host bend001 pid 22804: argv[1] = bar
<br>
Child 1 disconnected
<br>
Parent disconnected
<br>
Parent disconnected
<br>
Parent disconnected
<br>
Child 0 disconnected
<br>
[rhc_at_bend001 mpi]$ mpirun -n 3 --host bend001 -mca coll ^ml ./intercomm_create
<br>
b: MPI_Intercomm_create( intra, 0, intra, MPI_COMM_NULL, 201, &amp;inter) [rank 3]
<br>
b: MPI_Intercomm_create( intra, 0, intra, MPI_COMM_NULL, 201, &amp;inter) [rank 4]
<br>
b: MPI_Intercomm_create( intra, 0, intra, MPI_COMM_NULL, 201, &amp;inter) [rank 5]
<br>
c: MPI_Intercomm_create( MPI_COMM_WORLD, 0, intra, 0, 201, &amp;inter) [rank 3]
<br>
c: MPI_Intercomm_create( MPI_COMM_WORLD, 0, intra, 0, 201, &amp;inter) [rank 4]
<br>
c: MPI_Intercomm_create( MPI_COMM_WORLD, 0, intra, 0, 201, &amp;inter) [rank 5]
<br>
a: MPI_Intercomm_create( ab_intra, 0, ac_intra, 3, 201, &amp;inter) (0)
<br>
a: MPI_Intercomm_create( ab_intra, 0, ac_intra, 3, 201, &amp;inter) (0)
<br>
a: MPI_Intercomm_create( ab_intra, 0, ac_intra, 3, 201, &amp;inter) (0)
<br>
b: intercomm_create (0)
<br>
b: barrier on inter-comm - before
<br>
b: barrier on inter-comm - after
<br>
b: intercomm_create (0)
<br>
b: barrier on inter-comm - before
<br>
b: barrier on inter-comm - after
<br>
c: intercomm_create (0)
<br>
c: barrier on inter-comm - before
<br>
c: barrier on inter-comm - after
<br>
c: intercomm_create (0)
<br>
c: barrier on inter-comm - before
<br>
c: barrier on inter-comm - after
<br>
a: intercomm_create (0)
<br>
a: barrier on inter-comm - before
<br>
a: barrier on inter-comm - after
<br>
c: intercomm_create (0)
<br>
c: barrier on inter-comm - before
<br>
c: barrier on inter-comm - after
<br>
a: intercomm_create (0)
<br>
a: barrier on inter-comm - before
<br>
a: barrier on inter-comm - after
<br>
a: intercomm_create (0)
<br>
a: barrier on inter-comm - before
<br>
a: barrier on inter-comm - after
<br>
b: intercomm_create (0)
<br>
b: barrier on inter-comm - before
<br>
b: barrier on inter-comm - after
<br>
a: intercomm_merge(0) (0) [rank 2]
<br>
c: intercomm_merge(0) (0) [rank 8]
<br>
a: intercomm_merge(0) (0) [rank 0]
<br>
a: intercomm_merge(0) (0) [rank 1]
<br>
c: intercomm_merge(0) (0) [rank 7]
<br>
b: intercomm_merge(1) (0) [rank 4]
<br>
b: intercomm_merge(1) (0) [rank 5]
<br>
c: intercomm_merge(0) (0) [rank 6]
<br>
b: intercomm_merge(1) (0) [rank 3]
<br>
a: barrier (0)
<br>
b: barrier (0)
<br>
c: barrier (0)
<br>
a: barrier (0)
<br>
c: barrier (0)
<br>
b: barrier (0)
<br>
a: barrier (0)
<br>
c: barrier (0)
<br>
b: barrier (0)
<br>
dpm_base_disconnect_init: error -12 in isend to process 3
<br>
dpm_base_disconnect_init: error -12 in isend to process 3
<br>
dpm_base_disconnect_init: error -12 in isend to process 3
<br>
dpm_base_disconnect_init: error -12 in isend to process 0
<br>
dpm_base_disconnect_init: error -12 in isend to process 3
<br>
dpm_base_disconnect_init: error -12 in isend to process 3
<br>
dpm_base_disconnect_init: error -12 in isend to process 3
<br>
dpm_base_disconnect_init: error -12 in isend to process 0
<br>
dpm_base_disconnect_init: error -12 in isend to process 3
<br>
dpm_base_disconnect_init: error -12 in isend to process 3
<br>
dpm_base_disconnect_init: error -12 in isend to process 3
<br>
dpm_base_disconnect_init: error -12 in isend to process 1
<br>
dpm_base_disconnect_init: error -12 in isend to process 3
<br>
[rhc_at_bend001 mpi]$ 
<br>
<p><p><p>On Jun 6, 2014, at 11:26 AM, Rolf vandeVaart &lt;rvandevaart_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; I am seeing an interesting failure on trunk.  intercomm_create, spawn, and spawn_multiple from the IBM tests hang if I explicitly list the hostnames to run on.  For example:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Good:
</span><br>
<span class="quotelev1">&gt; $ mpirun -np 2 --mca btl self,sm,tcp spawn_multiple
</span><br>
<span class="quotelev1">&gt; Parent: 0 of 2, drossetti-ivy0.nvidia.com (0 in init)
</span><br>
<span class="quotelev1">&gt; Parent: 1 of 2, drossetti-ivy0.nvidia.com (0 in init)
</span><br>
<span class="quotelev1">&gt; Child: 0 of 4, drossetti-ivy0.nvidia.com (this is job 1) (1 in init)
</span><br>
<span class="quotelev1">&gt; Child: 1 of 4, drossetti-ivy0.nvidia.com (this is job 1) (1 in init)
</span><br>
<span class="quotelev1">&gt; Child: 2 of 4, drossetti-ivy0.nvidia.com (this is job 2) (1 in init)
</span><br>
<span class="quotelev1">&gt; Child: 3 of 4, drossetti-ivy0.nvidia.com (this is job 2) (1 in init)
</span><br>
<span class="quotelev1">&gt; $ 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Bad:
</span><br>
<span class="quotelev1">&gt; $ mpirun -np 2 --mca btl self,sm,tcp -host drossetti-ivy0,drossetti-ivy0 spawn_multiple
</span><br>
<span class="quotelev1">&gt; Parent: 0 of 2, drossetti-ivy0.nvidia.com (1 in init)
</span><br>
<span class="quotelev1">&gt; Parent: 1 of 2, drossetti-ivy0.nvidia.com (1 in init)
</span><br>
<span class="quotelev1">&gt; Child: 0 of 4, drossetti-ivy0.nvidia.com (this is job 1) (1 in init)
</span><br>
<span class="quotelev1">&gt; Child: 1 of 4, drossetti-ivy0.nvidia.com (this is job 1) (1 in init)
</span><br>
<span class="quotelev1">&gt; Child: 2 of 4, drossetti-ivy0.nvidia.com (this is job 2) (1 in init)
</span><br>
<span class="quotelev1">&gt; Child: 3 of 4, drossetti-ivy0.nvidia.com (this is job 2) (1 in init)
</span><br>
<span class="quotelev1">&gt; [..and we are hung here...]
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I see the exact same behavior for spawn and spawn_multiple.  Ralph, any thoughts?  Open MPI 1.8 is fine.  I can provide more information if needed, but I assume this is reproducible. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Thanks,
</span><br>
<span class="quotelev1">&gt; Rolf
</span><br>
<span class="quotelev1">&gt; -----------------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; This email message is for the sole use of the intended recipient(s) and may contain
</span><br>
<span class="quotelev1">&gt; confidential information.  Any unauthorized review, use, disclosure or distribution
</span><br>
<span class="quotelev1">&gt; is prohibited.  If you are not the intended recipient, please contact the sender by
</span><br>
<span class="quotelev1">&gt; reply email and destroy all copies of the original message.
</span><br>
<span class="quotelev1">&gt; -----------------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/06/14990.php">http://www.open-mpi.org/community/lists/devel/2014/06/14990.php</a>
</span><br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-14991/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14992.php">Rolf vandeVaart: "Re: [OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk"</a>
<li><strong>Previous message:</strong> <a href="14990.php">Rolf vandeVaart: "[OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk"</a>
<li><strong>In reply to:</strong> <a href="14990.php">Rolf vandeVaart: "[OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14992.php">Rolf vandeVaart: "Re: [OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk"</a>
<li><strong>Reply:</strong> <a href="14992.php">Rolf vandeVaart: "Re: [OMPI devel] Strange intercomm_create, spawn, spawn_multiple hang on trunk"</a>
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
