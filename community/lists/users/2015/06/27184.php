<?
$subject_val = "Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Jun 24 04:35:12 2015" -->
<!-- isoreceived="20150624083512" -->
<!-- sent="Wed, 24 Jun 2015 08:34:39 +0000" -->
<!-- isosent="20150624083439" -->
<!-- name="Lane, William" -->
<!-- email="William.Lane_at_[hidden]" -->
<!-- subject="Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash" -->
<!-- id="434F2BB0AF80484CA04DE0D8C0738BF293EDEE8F_at_cshsmsgmbx02.CSMC.EDU" -->
<!-- charset="iso-8859-1" -->
<!-- inreplyto="CAMD57oeat2h7FMNFPZmWSD2A7=fDNhgF_JvUNQ09sB_ENaJ58Q_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash<br>
<strong>From:</strong> Lane, William (<em>William.Lane_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-06-24 04:34:39
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="27185.php">Gilles Gouaillardet: "Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash"</a>
<li><strong>Previous message:</strong> <a href="27183.php">Daniel Letai: "Re: [OMPI users] simple mpi hello world segfaults when coll ml not disabled"</a>
<li><strong>In reply to:</strong> <a href="27181.php">Ralph Castain: "Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="27185.php">Gilles Gouaillardet: "Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash"</a>
<li><strong>Reply:</strong> <a href="27185.php">Gilles Gouaillardet: "Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Gilles,
<br>
<p>All the blades only have two core Xeons (without hyperthreading) populating both their sockets. All
<br>
the x3550 nodes have hyperthreading capable Xeons and Sandybridge server CPU's. It's possible
<br>
hyperthreading has been disabled on some of these nodes though. The 3-0-n nodes are all IBM x3550
<br>
nodes while the 3-6-n nodes are all blade nodes.
<br>
<p>I have run this exact same test code successfully in the past on another cluster (~200 nodes of Sunfire X2100
<br>
2x dual-core Opterons) w/no issues on upwards of 390 slots. I even tested it recently on OpenMPI 1.8.5
<br>
on another smaller R&amp;D cluster consisting of 10 Sunfire X2100 nodes (w/2 dual core Opterons apiece).
<br>
On this particular cluster I've had success running this code on &lt; 132 slots.
<br>
<p>Anyway, here's the results of the following mpirun:
<br>
<p>mpirun -np 132 -display-devel-map --prefix /hpc/apps/mpi/openmpi/1.8.6/ --hostfile hostfile-noslots --mca btl_tcp_if_include eth0 --hetero-nodes --bind-to core /hpc/home/lanew/mpi/openmpi/ProcessColors3 &gt;&gt; out.txt 2&gt;&amp;1
<br>
<p>--------------------------------------------------------------------------
<br>
WARNING: a request was made to bind a process. While the system
<br>
supports binding the process itself, at least one node does NOT
<br>
support binding memory to the process location.
<br>
<p>&nbsp;&nbsp;Node:  csclprd3-6-1
<br>
<p>This usually is due to not having the required NUMA support installed
<br>
on the node. In some Linux distributions, the required support is
<br>
contained in the libnumactl and libnumactl-devel packages.
<br>
This is a warning only; your job will continue, though performance may be degraded.
<br>
--------------------------------------------------------------------------
<br>
&nbsp;Data for JOB [51718,1] offset 0
<br>
<p>&nbsp;Mapper requested: NULL  Last mapper: round_robin  Mapping policy: BYSOCKET  Ranking policy: SLOT
<br>
&nbsp;Binding policy: CORE  Cpu set: NULL  PPR: NULL  Cpus-per-rank: 1
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num new daemons: 0    New daemon starting vpid INVALID
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num nodes: 15
<br>
<p>&nbsp;Data for node: csclprd3-6-1         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],1]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 4    Slots in use: 4    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 4    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 4    Next node_rank: 4
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],0]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [B/B][./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [B/.][./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],1]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 1
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [./.][B/B]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./.][B/.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],2]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 2
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [B/B][./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./B][./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],3]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 3
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [./.][B/B]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./.][./B]
<br>
<p>&nbsp;Data for node: csclprd3-6-5         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],2]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 4    Slots in use: 4    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 4    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 4    Next node_rank: 4
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],4]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 4
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [B/B][./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [B/.][./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],5]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 5
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [./.][B/B]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./.][B/.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],6]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 6
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [B/B][./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./B][./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],7]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 7
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [./.][B/B]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./.][./B]
<br>
<p>&nbsp;Data for node: csclprd3-0-0         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],3]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 12    Slots in use: 12    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 12    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 12    Next node_rank: 12
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],8]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 8
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [B/B/B/B/B/B][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [B/././././.][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],9]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 9
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [./././././.][B/B/B/B/B/B]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././.][B/././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],10]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 10
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [B/B/B/B/B/B][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./B/./././.][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],11]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 11
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [./././././.][B/B/B/B/B/B]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././.][./B/./././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],12]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 12
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [B/B/B/B/B/B][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././B/././.][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],13]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 13
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [./././././.][B/B/B/B/B/B]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././.][././B/././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],14]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 6    Node rank: 6    App rank: 14
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [B/B/B/B/B/B][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././B/./.][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],15]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 7    Node rank: 7    App rank: 15
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [./././././.][B/B/B/B/B/B]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././.][./././B/./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],16]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 8    Node rank: 8    App rank: 16
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [B/B/B/B/B/B][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././././B/.][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],17]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 9    Node rank: 9    App rank: 17
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [./././././.][B/B/B/B/B/B]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././.][././././B/.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],18]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 10    Node rank: 10    App rank: 18
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [B/B/B/B/B/B][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././B][./././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],19]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 11    Node rank: 11    App rank: 19
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [./././././.][B/B/B/B/B/B]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././.][./././././B]
<br>
<p>&nbsp;Data for node: csclprd3-0-1         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],4]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 6    Slots in use: 6    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 6    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 6    Next node_rank: 6
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],20]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 20
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [B/././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],21]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 21
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./B/./././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],22]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 22
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././B/././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],23]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 23
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././B/./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],24]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 24
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././././B/.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],25]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 25
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././B]
<br>
<p>&nbsp;Data for node: csclprd3-0-2         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],5]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 6    Slots in use: 6    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 6    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 6    Next node_rank: 6
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],26]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 26
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [B/././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],27]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 27
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./B/./././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],28]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 28
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././B/././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],29]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 29
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././B/./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],30]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 30
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././././B/.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],31]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 31
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././B]
<br>
<p>&nbsp;Data for node: csclprd3-0-3         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],6]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 6    Slots in use: 6    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 6    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 6    Next node_rank: 6
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],32]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 32
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [B/././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],33]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 33
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./B/./././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],34]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 34
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././B/././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],35]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 35
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././B/./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],36]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 36
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././././B/.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],37]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 37
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././B]
<br>
<p>&nbsp;Data for node: csclprd3-0-4         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],7]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 6    Slots in use: 6    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 6    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 6    Next node_rank: 6
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],38]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 38
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [B/././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],39]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 39
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./B/./././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],40]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 40
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././B/././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],41]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 41
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././B/./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],42]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 42
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././././B/.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],43]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 43
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././B]
<br>
<p>&nbsp;Data for node: csclprd3-0-5         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],8]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 6    Slots in use: 6    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 6    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 6    Next node_rank: 6
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],44]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 44
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [B/././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],45]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 45
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./B/./././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],46]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 46
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././B/././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],47]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 47
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././B/./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],48]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 48
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././././B/.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],49]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 49
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././B]
<br>
<p>&nbsp;Data for node: csclprd3-0-6         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],9]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 6    Slots in use: 6    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 6    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 6    Next node_rank: 6
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],50]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 50
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [B/././././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],51]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 51
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./B/./././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],52]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 52
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././B/././.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],53]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 53
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././B/./.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],54]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 54
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [././././B/.]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],55]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 55
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [./././././B]
<br>
<p>&nbsp;Data for node: csclprd3-0-7         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],10]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 16    Slots in use: 16    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 16    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 16    Next node_rank: 16
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],56]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 56
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [BB/../../../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],57]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 57
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][BB/../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],58]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 58
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../BB/../../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],59]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 59
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../BB/../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],60]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 60
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../BB/../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],61]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 61
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../BB/../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],62]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 6    Node rank: 6    App rank: 62
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../BB/../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],63]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 7    Node rank: 7    App rank: 63
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../BB/../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],64]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 8    Node rank: 8    App rank: 64
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../BB/../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],65]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 9    Node rank: 9    App rank: 65
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../BB/../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],66]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 10    Node rank: 10    App rank: 66
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../BB/../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],67]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 11    Node rank: 11    App rank: 67
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../BB/../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],68]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 12    Node rank: 12    App rank: 68
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../BB/..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],69]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 13    Node rank: 13    App rank: 69
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../../BB/..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],70]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 14    Node rank: 14    App rank: 70
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],71]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 15    Node rank: 15    App rank: 71
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../../../BB]
<br>
<p>&nbsp;Data for node: csclprd3-0-8         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],11]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 16    Slots in use: 16    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 16    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 16    Next node_rank: 16
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],72]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 72
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [BB/../../../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],73]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 73
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][BB/../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],74]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 74
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../BB/../../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],75]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 75
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../BB/../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],76]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 76
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../BB/../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],77]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 77
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../BB/../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],78]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 6    Node rank: 6    App rank: 78
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../BB/../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],79]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 7    Node rank: 7    App rank: 79
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../BB/../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],80]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 8    Node rank: 8    App rank: 80
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../BB/../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],81]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 9    Node rank: 9    App rank: 81
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../BB/../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],82]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 10    Node rank: 10    App rank: 82
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../BB/../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],83]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 11    Node rank: 11    App rank: 83
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../BB/../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],84]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 12    Node rank: 12    App rank: 84
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../BB/..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],85]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 13    Node rank: 13    App rank: 85
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../../BB/..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],86]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 14    Node rank: 14    App rank: 86
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],87]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 15    Node rank: 15    App rank: 87
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../../../BB]
<br>
<p>&nbsp;Data for node: csclprd3-0-10         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],12]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 16    Slots in use: 16    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 16    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 16    Next node_rank: 16
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],88]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 88
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [BB/../../../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],89]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 89
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][BB/../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],90]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 90
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../BB/../../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],91]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 91
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../BB/../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],92]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 92
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../BB/../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],93]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 93
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../BB/../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],94]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 6    Node rank: 6    App rank: 94
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../BB/../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],95]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 7    Node rank: 7    App rank: 95
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../BB/../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],96]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 8    Node rank: 8    App rank: 96
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../BB/../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],97]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 9    Node rank: 9    App rank: 97
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../BB/../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],98]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 10    Node rank: 10    App rank: 98
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../BB/../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],99]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 11    Node rank: 11    App rank: 99
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../BB/../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],100]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 12    Node rank: 12    App rank: 100
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../BB/..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],101]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 13    Node rank: 13    App rank: 101
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../../BB/..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],102]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 14    Node rank: 14    App rank: 102
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],103]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 15    Node rank: 15    App rank: 103
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../../../BB]
<br>
<p>&nbsp;Data for node: csclprd3-0-11         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],13]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 16    Slots in use: 16    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 16    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 16    Next node_rank: 16
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],104]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 104
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [BB/../../../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],105]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 105
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][BB/../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],106]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 106
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../BB/../../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],107]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 107
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../BB/../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],108]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 108
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../BB/../../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],109]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 109
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../BB/../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],110]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 6    Node rank: 6    App rank: 110
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../BB/../../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],111]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 7    Node rank: 7    App rank: 111
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../BB/../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],112]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 8    Node rank: 8    App rank: 112
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../BB/../../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],113]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 9    Node rank: 9    App rank: 113
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../BB/../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],114]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 10    Node rank: 10    App rank: 114
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../BB/../..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],115]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 11    Node rank: 11    App rank: 115
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../BB/../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],116]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 12    Node rank: 12    App rank: 116
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../BB/..][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],117]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 13    Node rank: 13    App rank: 117
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../../BB/..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],118]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 14    Node rank: 14    App rank: 118
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../BB][../../../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],119]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 15    Node rank: 15    App rank: 119
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../../../..][../../../../../../../BB]
<br>
<p>&nbsp;Data for node: csclprd3-0-12         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],14]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 6    Slots in use: 6    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 6    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 6    Next node_rank: 6
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],120]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 120
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [BB/../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],121]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 121
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../BB/../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],122]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 122
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../BB/../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],123]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 123
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../BB/../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],124]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 124
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../BB/..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],125]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 125
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: UNKNOWN
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../BB]
<br>
<p>&nbsp;Data for node: csclprd3-0-13         Launch id: -1    State: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daemon: [[51718,0],15]    Daemon launched: True
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots: 12    Slots in use: 6    Oversubscribed: FALSE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num slots allocated: 12    Max slots: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username on node: NULL
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Num procs: 6    Next node_rank: 6
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],126]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 0    Node rank: 0    App rank: 126
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB][../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [BB/../../../../..][../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],127]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 1    Node rank: 1    App rank: 127
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../..][BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../..][BB/../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],128]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 2    Node rank: 2    App rank: 128
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB][../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../BB/../../../..][../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],129]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 3    Node rank: 3    App rank: 129
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../..][BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../..][../BB/../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],130]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 4    Node rank: 4    App rank: 130
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [BB/BB/BB/BB/BB/BB][../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../BB/../../..][../../../../../..]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data for proc: [[51718,1],131]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pid: 0    Local rank: 5    Node rank: 5    App rank: 131
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: INITIALIZED    App_context: 0
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Locale: [../../../../../..][BB/BB/BB/BB/BB/BB]
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Binding: [../../../../../..][../../BB/../../..]
<br>
[csclprd3-0-13:31619] *** Process received signal ***
<br>
[csclprd3-0-13:31619] Signal: Bus error (7)
<br>
[csclprd3-0-13:31619] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:31619] Failing at address: 0x7f1374267a00
<br>
[csclprd3-0-13:31620] *** Process received signal ***
<br>
[csclprd3-0-13:31620] Signal: Bus error (7)
<br>
[csclprd3-0-13:31620] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:31620] Failing at address: 0x7fcc702a7980
<br>
[csclprd3-0-13:31615] *** Process received signal ***
<br>
[csclprd3-0-13:31615] Signal: Bus error (7)
<br>
[csclprd3-0-13:31615] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:31615] Failing at address: 0x7f8128367880
<br>
[csclprd3-0-13:31616] *** Process received signal ***
<br>
[csclprd3-0-13:31616] Signal: Bus error (7)
<br>
[csclprd3-0-13:31616] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:31616] Failing at address: 0x7fe674227a00
<br>
[csclprd3-0-13:31617] *** Process received signal ***
<br>
[csclprd3-0-13:31617] Signal: Bus error (7)
<br>
[csclprd3-0-13:31617] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:31617] Failing at address: 0x7f061c32db80
<br>
[csclprd3-0-13:31618] *** Process received signal ***
<br>
[csclprd3-0-13:31618] Signal: Bus error (7)
<br>
[csclprd3-0-13:31618] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:31618] Failing at address: 0x7fb8402eaa80
<br>
[csclprd3-0-13:31618] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7fb851851500]
<br>
[csclprd3-0-13:31618] [ 1] [csclprd3-0-13:31616] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7fe6843a4500]
<br>
[csclprd3-0-13:31616] [ 1] [csclprd3-0-13:31620] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7fcc80c54500]
<br>
[csclprd3-0-13:31620] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7fcc80fc9f61]
<br>
[csclprd3-0-13:31620] [ 2] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7fcc80fca047]
<br>
[csclprd3-0-13:31620] [ 3] [csclprd3-0-13:31615] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7f81385ca500]
<br>
[csclprd3-0-13:31615] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7f813893ff61]
<br>
[csclprd3-0-13:31615] [ 2] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7f8138940047]
<br>
[csclprd3-0-13:31615] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7fb851bc6f61]
<br>
[csclprd3-0-13:31618] [ 2] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7fb851bc7047]
<br>
[csclprd3-0-13:31618] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7fb851ab4670]
<br>
[csclprd3-0-13:31618] [ 4] [csclprd3-0-13:31617] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7f062cfe5500]
<br>
[csclprd3-0-13:31617] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7f062d35af61]
<br>
[csclprd3-0-13:31617] [ 2] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7f062d35b047]
<br>
[csclprd3-0-13:31617] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7f062d248670]
<br>
[csclprd3-0-13:31617] [ 4] [csclprd3-0-13:31619] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7f1384fde500]
<br>
[csclprd3-0-13:31619] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7f1385353f61]
<br>
[csclprd3-0-13:31619] [ 2] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7fe684719f61]
<br>
[csclprd3-0-13:31616] [ 2] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7fe68471a047]
<br>
[csclprd3-0-13:31616] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7fe684607670]
<br>
[csclprd3-0-13:31616] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7f1385354047]
<br>
[csclprd3-0-13:31619] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7f1385241670]
<br>
[csclprd3-0-13:31619] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7f13852425ab]
<br>
[csclprd3-0-13:31619] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7f1385242751]
<br>
[csclprd3-0-13:31619] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7f13853501c9]
<br>
[csclprd3-0-13:31619] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7f1385336628]
<br>
[csclprd3-0-13:31619] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7fcc80eb7670]
<br>
[csclprd3-0-13:31620] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7fcc80eb85ab]
<br>
[csclprd3-0-13:31620] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7fcc80eb8751]
<br>
[csclprd3-0-13:31620] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7fcc80fc61c9]
<br>
[csclprd3-0-13:31620] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7fcc80fac628]
<br>
[csclprd3-0-13:31620] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7fcc8111fd61]
<br>
[csclprd3-0-13:31620] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7f813882d670]
<br>
[csclprd3-0-13:31615] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7f813882e5ab]
<br>
[csclprd3-0-13:31615] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7f813882e751]
<br>
[csclprd3-0-13:31615] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7f813893c1c9]
<br>
[csclprd3-0-13:31615] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7f8138922628]
<br>
[csclprd3-0-13:31615] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7f8138a95d61]
<br>
[csclprd3-0-13:31615] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7f813885d747]
<br>
[csclprd3-0-13:31615] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7fb851ab55ab]
<br>
[csclprd3-0-13:31618] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7fb851ab5751]
<br>
[csclprd3-0-13:31618] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7fb851bc31c9]
<br>
[csclprd3-0-13:31618] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7fb851ba9628]
<br>
[csclprd3-0-13:31618] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7fb851d1cd61]
<br>
[csclprd3-0-13:31618] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7fb851ae4747]
<br>
[csclprd3-0-13:31618] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7f062d2495ab]
<br>
[csclprd3-0-13:31617] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7f062d249751]
<br>
[csclprd3-0-13:31617] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7f062d3571c9]
<br>
[csclprd3-0-13:31617] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7f062d33d628]
<br>
[csclprd3-0-13:31617] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7f062d4b0d61]
<br>
[csclprd3-0-13:31617] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7f062d278747]
<br>
[csclprd3-0-13:31617] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7fe6846085ab]
<br>
[csclprd3-0-13:31616] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7fe684608751]
<br>
[csclprd3-0-13:31616] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7fe6847161c9]
<br>
[csclprd3-0-13:31616] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7fe6846fc628]
<br>
[csclprd3-0-13:31616] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7fe68486fd61]
<br>
[csclprd3-0-13:31616] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7fe684637747]
<br>
[csclprd3-0-13:31616] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7fe68467750b]
<br>
[csclprd3-0-13:31616] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:31616] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7fe684021cdd]
<br>
[csclprd3-0-13:31616] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:31616] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7f062d2b850b]
<br>
[csclprd3-0-13:31617] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:31617] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f062cc62cdd]
<br>
[csclprd3-0-13:31617] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:31617] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7f13854a9d61]
<br>
[csclprd3-0-13:31619] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7f1385271747]
<br>
[csclprd3-0-13:31619] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7f13852b150b]
<br>
[csclprd3-0-13:31619] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:31619] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f1384c5bcdd]
<br>
[csclprd3-0-13:31619] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:31619] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7fcc80ee7747]
<br>
[csclprd3-0-13:31620] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7fcc80f2750b]
<br>
[csclprd3-0-13:31620] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:31620] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7fcc808d1cdd]
<br>
[csclprd3-0-13:31620] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:31620] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7f813889d50b]
<br>
[csclprd3-0-13:31615] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:31615] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f8138247cdd]
<br>
[csclprd3-0-13:31615] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:31615] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7fb851b2450b]
<br>
[csclprd3-0-13:31618] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:31618] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7fb8514cecdd]
<br>
[csclprd3-0-13:31618] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:31618] *** End of error message ***
<br>
--------------------------------------------------------------------------
<br>
mpirun noticed that process rank 126 with PID 0 on node csclprd3-0-13 exited on signal 7 (Bus error).
<br>
--------------------------------------------------------------------------
<br>
<p>________________________________
<br>
From: users [users-bounces_at_[hidden]] on behalf of Ralph Castain [rhc_at_[hidden]]
<br>
Sent: Tuesday, June 23, 2015 6:20 PM
<br>
To: Open MPI Users
<br>
Subject: Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash
<br>
<p>Wow - that is one sick puppy! I see that some nodes are reporting not-bound for their procs, and the rest are binding to socket (as they should). Some of your nodes clearly do not have hyper threads enabled (or only have single-thread cores on them), and have 2 cores/socket. Other nodes have 8 cores/socket with hyper threads enabled, while still others have 6 cores/socket and HT enabled.
<br>
<p>I don't see anyone binding to a single HT if multiple HTs/core are available. I think you are being fooled by those nodes that either don't have HT enabled, or have only 1 HT/core.
<br>
<p>In both cases, it is node 13 that is the node that fails. I also note that you said everything works okay with &lt; 132 ranks, and node 13 hosts ranks 127-131. So node 13 would host ranks even if you reduced the number in the job to 131. This would imply that it probably isn't something wrong with the node itself.
<br>
<p>Is there any way you could run a job of this size on a homogeneous cluster? The procs all show bindings that look right, but I'm wondering if the heterogeneity is the source of the trouble here. We may be communicating the binding pattern incorrectly and giving bad info to the backend daemon.
<br>
<p>Also, rather than --report-bindings, use &quot;--display-devel-map&quot; on the command line and let's see what the mapper thinks it did. If there is a problem with placement, that is where it would exist.
<br>
<p><p>On Tue, Jun 23, 2015 at 5:12 PM, Lane, William &lt;William.Lane_at_[hidden]&lt;mailto:William.Lane_at_[hidden]&gt;&gt; wrote:
<br>
Ralph,
<br>
<p>There is something funny going on, the trace from the
<br>
runs w/the debug build aren't showing any differences from
<br>
what I got earlier. However, I did do a run w/the --bind-to core
<br>
switch and was surprised to see that hyperthreading cores were
<br>
sometimes being used.
<br>
<p>Here's the traces that I have:
<br>
<p>mpirun -np 132 -report-bindings --prefix /hpc/apps/mpi/openmpi/1.8.6/ --hostfile hostfile-noslots --mca btl_tcp_if_include eth0 --hetero-nodes /hpc/home/lanew/mpi/openmpi/ProcessColors3
<br>
[csclprd3-0-5:16802] MCW rank 44 is not bound (or bound to all available processors)
<br>
[csclprd3-0-5:16802] MCW rank 45 is not bound (or bound to all available processors)
<br>
[csclprd3-0-5:16802] MCW rank 46 is not bound (or bound to all available processors)
<br>
[csclprd3-6-5:12480] MCW rank 4 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]]: [B/B][./.]
<br>
[csclprd3-6-5:12480] MCW rank 5 bound to socket 1[core 2[hwt 0]], socket 1[core 3[hwt 0]]: [./.][B/B]
<br>
[csclprd3-6-5:12480] MCW rank 6 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]]: [B/B][./.]
<br>
[csclprd3-6-5:12480] MCW rank 7 bound to socket 1[core 2[hwt 0]], socket 1[core 3[hwt 0]]: [./.][B/B]
<br>
[csclprd3-0-5:16802] MCW rank 47 is not bound (or bound to all available processors)
<br>
[csclprd3-0-5:16802] MCW rank 48 is not bound (or bound to all available processors)
<br>
[csclprd3-0-5:16802] MCW rank 49 is not bound (or bound to all available processors)
<br>
[csclprd3-0-1:14318] MCW rank 22 is not bound (or bound to all available processors)
<br>
[csclprd3-0-1:14318] MCW rank 23 is not bound (or bound to all available processors)
<br>
[csclprd3-0-1:14318] MCW rank 24 is not bound (or bound to all available processors)
<br>
[csclprd3-6-1:24682] MCW rank 3 bound to socket 1[core 2[hwt 0]], socket 1[core 3[hwt 0]]: [./.][B/B]
<br>
[csclprd3-6-1:24682] MCW rank 0 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]]: [B/B][./.]
<br>
[csclprd3-0-1:14318] MCW rank 25 is not bound (or bound to all available processors)
<br>
[csclprd3-0-1:14318] MCW rank 20 is not bound (or bound to all available processors)
<br>
[csclprd3-0-3:13827] MCW rank 34 is not bound (or bound to all available processors)
<br>
[csclprd3-0-1:14318] MCW rank 21 is not bound (or bound to all available processors)
<br>
[csclprd3-0-3:13827] MCW rank 35 is not bound (or bound to all available processors)
<br>
[csclprd3-6-1:24682] MCW rank 1 bound to socket 1[core 2[hwt 0]], socket 1[core 3[hwt 0]]: [./.][B/B]
<br>
[csclprd3-0-3:13827] MCW rank 36 is not bound (or bound to all available processors)
<br>
[csclprd3-6-1:24682] MCW rank 2 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]]: [B/B][./.]
<br>
[csclprd3-0-6:30371] MCW rank 51 is not bound (or bound to all available processors)
<br>
[csclprd3-0-6:30371] MCW rank 52 is not bound (or bound to all available processors)
<br>
[csclprd3-0-6:30371] MCW rank 53 is not bound (or bound to all available processors)
<br>
[csclprd3-0-2:05825] MCW rank 30 is not bound (or bound to all available processors)
<br>
[csclprd3-0-6:30371] MCW rank 54 is not bound (or bound to all available processors)
<br>
[csclprd3-0-3:13827] MCW rank 37 is not bound (or bound to all available processors)
<br>
[csclprd3-0-2:05825] MCW rank 31 is not bound (or bound to all available processors)
<br>
[csclprd3-0-3:13827] MCW rank 32 is not bound (or bound to all available processors)
<br>
[csclprd3-0-6:30371] MCW rank 55 is not bound (or bound to all available processors)
<br>
[csclprd3-0-3:13827] MCW rank 33 is not bound (or bound to all available processors)
<br>
[csclprd3-0-6:30371] MCW rank 50 is not bound (or bound to all available processors)
<br>
[csclprd3-0-2:05825] MCW rank 26 is not bound (or bound to all available processors)
<br>
[csclprd3-0-2:05825] MCW rank 27 is not bound (or bound to all available processors)
<br>
[csclprd3-0-2:05825] MCW rank 28 is not bound (or bound to all available processors)
<br>
[csclprd3-0-2:05825] MCW rank 29 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:12383] MCW rank 121 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:12383] MCW rank 122 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:12383] MCW rank 123 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:12383] MCW rank 124 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:12383] MCW rank 125 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:12383] MCW rank 120 is not bound (or bound to all available processors)
<br>
[csclprd3-0-0:31079] MCW rank 13 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket 1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-0:31079] MCW rank 14 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-0:31079] MCW rank 15 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket 1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-0:31079] MCW rank 16 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-7:20515] MCW rank 68 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-10:19096] MCW rank 100 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-7:20515] MCW rank 69 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-10:19096] MCW rank 101 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-0:31079] MCW rank 17 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket 1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-7:20515] MCW rank 70 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-10:19096] MCW rank 102 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:31636] MCW rank 116 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:31636] MCW rank 117 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-0:31079] MCW rank 18 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-11:31636] MCW rank 118 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-0:31079] MCW rank 19 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket 1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-7:20515] MCW rank 71 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-10:19096] MCW rank 103 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-0:31079] MCW rank 8 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-0:31079] MCW rank 9 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket 1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-10:19096] MCW rank 88 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:31636] MCW rank 119 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:20515] MCW rank 56 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-0:31079] MCW rank 10 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-7:20515] MCW rank 57 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-10:19096] MCW rank 89 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-11:31636] MCW rank 104 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-0:31079] MCW rank 11 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket 1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-0:31079] MCW rank 12 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-4:30348] MCW rank 42 is not bound (or bound to all available processors)
<br>
[csclprd3-0-4:30348] MCW rank 43 is not bound (or bound to all available processors)
<br>
[csclprd3-0-10:19096] MCW rank 90 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-4:30348] MCW rank 38 is not bound (or bound to all available processors)
<br>
[csclprd3-0-7:20515] MCW rank 58 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-4:30348] MCW rank 39 is not bound (or bound to all available processors)
<br>
[csclprd3-0-4:30348] MCW rank 40 is not bound (or bound to all available processors)
<br>
[csclprd3-0-4:30348] MCW rank 41 is not bound (or bound to all available processors)
<br>
[csclprd3-0-11:31636] MCW rank 105 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-13:29118] MCW rank 127 bound to socket 1[core 6[hwt 0-1]], socket 1[core 7[hwt 0-1]], socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]]: [../../../../../..][BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-13:29118] MCW rank 128 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]]: [BB/BB/BB/BB/BB/BB][../../../../../..]
<br>
[csclprd3-0-13:29118] MCW rank 129 bound to socket 1[core 6[hwt 0-1]], socket 1[core 7[hwt 0-1]], socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]]: [../../../../../..][BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-13:29118] MCW rank 130 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]]: [BB/BB/BB/BB/BB/BB][../../../../../..]
<br>
[csclprd3-0-8:15542] MCW rank 84 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-13:29118] MCW rank 131 bound to socket 1[core 6[hwt 0-1]], socket 1[core 7[hwt 0-1]], socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]]: [../../../../../..][BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:15542] MCW rank 85 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-13:29118] MCW rank 126 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]]: [BB/BB/BB/BB/BB/BB][../../../../../..]
<br>
[csclprd3-0-8:15542] MCW rank 86 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-8:15542] MCW rank 87 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:20515] MCW rank 59 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-10:19096] MCW rank 91 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-11:31636] MCW rank 106 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-8:15542] MCW rank 72 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-7:20515] MCW rank 60 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-10:19096] MCW rank 92 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:31636] MCW rank 107 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:20515] MCW rank 61 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-11:31636] MCW rank 108 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-10:19096] MCW rank 93 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:15542] MCW rank 73 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:20515] MCW rank 62 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-10:19096] MCW rank 94 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:31636] MCW rank 109 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:20515] MCW rank 63 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-10:19096] MCW rank 95 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-11:31636] MCW rank 110 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-8:15542] MCW rank 74 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-7:20515] MCW rank 64 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-10:19096] MCW rank 96 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:31636] MCW rank 111 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:20515] MCW rank 65 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-10:19096] MCW rank 97 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-11:31636] MCW rank 112 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-8:15542] MCW rank 75 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:20515] MCW rank 66 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-10:19096] MCW rank 98 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:31636] MCW rank 113 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:20515] MCW rank 67 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-10:19096] MCW rank 99 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-11:31636] MCW rank 114 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-8:15542] MCW rank 76 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:31636] MCW rank 115 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:15542] MCW rank 77 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:15542] MCW rank 78 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-8:15542] MCW rank 79 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:15542] MCW rank 80 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-8:15542] MCW rank 81 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:15542] MCW rank 82 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-8:15542] MCW rank 83 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-13:29120] *** Process received signal ***
<br>
[csclprd3-0-13:29120] Signal: Bus error (7)
<br>
[csclprd3-0-13:29120] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29120] Failing at address: 0x7f181832ba80
<br>
[csclprd3-0-13:29121] *** Process received signal ***
<br>
[csclprd3-0-13:29121] Signal: Bus error (7)
<br>
[csclprd3-0-13:29121] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29121] Failing at address: 0x7f5ca82a7980
<br>
[csclprd3-0-13:29122] *** Process received signal ***
<br>
[csclprd3-0-13:29122] Signal: Bus error (7)
<br>
[csclprd3-0-13:29122] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29122] Failing at address: 0x7fac6ba24980
<br>
[csclprd3-0-13:29123] *** Process received signal ***
<br>
[csclprd3-0-13:29123] Signal: Bus error (7)
<br>
[csclprd3-0-13:29123] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29123] Failing at address: 0x7faa24267a00
<br>
[csclprd3-0-13:29125] *** Process received signal ***
<br>
[csclprd3-0-13:29125] Signal: Bus error (7)
<br>
[csclprd3-0-13:29125] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29125] Failing at address: 0x7fa493ae7a00
<br>
[csclprd3-0-13:29119] *** Process received signal ***
<br>
[csclprd3-0-13:29119] Signal: Bus error (7)
<br>
[csclprd3-0-13:29119] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29119] Failing at address: 0x7fed7436ba80
<br>
[csclprd3-0-13:29120] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7f182913e500]
<br>
[csclprd3-0-13:29120] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7f18294b3f61]
<br>
[csclprd3-0-13:29120] [ 2] [csclprd3-0-13:29121] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7f5cb8803500]
<br>
[csclprd3-0-13:29121] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7f5cb8b78f61]
<br>
[csclprd3-0-13:29121] [ 2] [csclprd3-0-13:29122] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7fac7b20c500]
<br>
[csclprd3-0-13:29122] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7fac7b581f61]
<br>
[csclprd3-0-13:29122] [ 2] [csclprd3-0-13:29123] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7faa33edd500]
<br>
[csclprd3-0-13:29123] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7faa34252f61]
<br>
[csclprd3-0-13:29123] [ 2] [csclprd3-0-13:29125] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7fa4a3097500]
<br>
[csclprd3-0-13:29125] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7fa4a340cf61]
<br>
[csclprd3-0-13:29125] [ 2] [csclprd3-0-13:29119] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7fed85c95500]
<br>
[csclprd3-0-13:29119] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7fed8600af61]
<br>
[csclprd3-0-13:29119] [ 2] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7fa4a340d047]
<br>
[csclprd3-0-13:29125] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7fa4a32fa670]
<br>
[csclprd3-0-13:29125] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7fa4a32fb5ab]
<br>
[csclprd3-0-13:29125] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7fa4a32fb751]
<br>
[csclprd3-0-13:29125] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7f18294b4047]
<br>
[csclprd3-0-13:29120] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7f18293a1670]
<br>
[csclprd3-0-13:29120] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7f18293a25ab]
<br>
[csclprd3-0-13:29120] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7f18293a2751]
<br>
[csclprd3-0-13:29120] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7f5cb8b79047]
<br>
[csclprd3-0-13:29121] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7f5cb8a66670]
<br>
[csclprd3-0-13:29121] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7f5cb8a675ab]
<br>
[csclprd3-0-13:29121] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7f5cb8a67751]
<br>
[csclprd3-0-13:29121] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7fac7b582047]
<br>
[csclprd3-0-13:29122] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7fac7b46f670]
<br>
[csclprd3-0-13:29122] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7fac7b4705ab]
<br>
[csclprd3-0-13:29122] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7fac7b470751]
<br>
[csclprd3-0-13:29122] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7faa34253047]
<br>
[csclprd3-0-13:29123] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7faa34140670]
<br>
[csclprd3-0-13:29123] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7faa341415ab]
<br>
[csclprd3-0-13:29123] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7faa34141751]
<br>
[csclprd3-0-13:29123] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7fed8600b047]
<br>
[csclprd3-0-13:29119] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7fed85ef8670]
<br>
[csclprd3-0-13:29119] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7fed85ef95ab]
<br>
[csclprd3-0-13:29119] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7fed85ef9751]
<br>
[csclprd3-0-13:29119] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7fed860071c9]
<br>
[csclprd3-0-13:29119] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7fed85fed628]
<br>
[csclprd3-0-13:29119] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7fed86160d61]
<br>
[csclprd3-0-13:29119] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7faa3424f1c9]
<br>
[csclprd3-0-13:29123] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7faa34235628]
<br>
[csclprd3-0-13:29123] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7faa343a8d61]
<br>
[csclprd3-0-13:29123] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7fa4a34091c9]
<br>
[csclprd3-0-13:29125] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7fa4a33ef628]
<br>
[csclprd3-0-13:29125] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7fa4a3562d61]
<br>
[csclprd3-0-13:29125] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7f18294b01c9]
<br>
[csclprd3-0-13:29120] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7f1829496628]
<br>
[csclprd3-0-13:29120] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7f5cb8b751c9]
<br>
[csclprd3-0-13:29121] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7f5cb8b5b628]
<br>
[csclprd3-0-13:29121] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7f5cb8cced61]
<br>
[csclprd3-0-13:29121] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7f5cb8a96747]
<br>
[csclprd3-0-13:29121] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7fac7b57e1c9]
<br>
[csclprd3-0-13:29122] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7fac7b564628]
<br>
[csclprd3-0-13:29122] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7fac7b6d7d61]
<br>
[csclprd3-0-13:29122] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7fac7b49f747]
<br>
[csclprd3-0-13:29122] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7fed85f28747]
<br>
[csclprd3-0-13:29119] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7fed85f6850b]
<br>
[csclprd3-0-13:29119] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29119] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7fed85912cdd]
<br>
[csclprd3-0-13:29119] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29119] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7faa34170747]
<br>
[csclprd3-0-13:29123] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7faa341b050b]
<br>
[csclprd3-0-13:29123] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29123] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7faa33b5acdd]
<br>
[csclprd3-0-13:29123] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29123] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7fa4a332a747]
<br>
[csclprd3-0-13:29125] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7fa4a336a50b]
<br>
[csclprd3-0-13:29125] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29125] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7fa4a2d14cdd]
<br>
[csclprd3-0-13:29125] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29125] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7f1829609d61]
<br>
[csclprd3-0-13:29120] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7f18293d1747]
<br>
[csclprd3-0-13:29120] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7f182941150b]
<br>
[csclprd3-0-13:29120] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29120] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f1828dbbcdd]
<br>
[csclprd3-0-13:29120] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29120] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7f5cb8ad650b]
<br>
[csclprd3-0-13:29121] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29121] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f5cb8480cdd]
<br>
[csclprd3-0-13:29121] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29121] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7fac7b4df50b]
<br>
[csclprd3-0-13:29122] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29122] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7fac7ae89cdd]
<br>
[csclprd3-0-13:29122] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29122] *** End of error message ***
<br>
--------------------------------------------------------------------------
<br>
mpirun noticed that process rank 126 with PID 0 on node csclprd3-0-13 exited on signal 7 (Bus error).
<br>
--------------------------------------------------------------------------
<br>
<p><p>2.  mpirun -np 132 -report-bindings --prefix /hpc/apps/mpi/openmpi/1.8.6/ --hostfile hostfile-noslots --mca btl_tcp_if_include eth0 --hetero-nodes --bind-to core /hpc/home/lanew/mpi/openmpi/ProcessColors3
<br>
--------------------------------------------------------------------------
<br>
WARNING: a request was made to bind a process. While the system
<br>
supports binding the process itself, at least one node does NOT
<br>
support binding memory to the process location.
<br>
<p>&nbsp;&nbsp;Node:  csclprd3-6-1
<br>
<p>This usually is due to not having the required NUMA support installed
<br>
on the node. In some Linux distributions, the required support is
<br>
contained in the libnumactl and libnumactl-devel packages.
<br>
This is a warning only; your job will continue, though performance may be degraded.
<br>
--------------------------------------------------------------------------
<br>
[csclprd3-6-1:24853] MCW rank 0 bound to socket 0[core 0[hwt 0]]: [B/.][./.]
<br>
[csclprd3-6-1:24853] MCW rank 1 bound to socket 1[core 2[hwt 0]]: [./.][B/.]
<br>
[csclprd3-6-1:24853] MCW rank 2 bound to socket 0[core 1[hwt 0]]: [./B][./.]
<br>
[csclprd3-6-1:24853] MCW rank 3 bound to socket 1[core 3[hwt 0]]: [./.][./B]
<br>
[csclprd3-6-5:12646] MCW rank 4 bound to socket 0[core 0[hwt 0]]: [B/.][./.]
<br>
[csclprd3-6-5:12646] MCW rank 5 bound to socket 1[core 2[hwt 0]]: [./.][B/.]
<br>
[csclprd3-6-5:12646] MCW rank 6 bound to socket 0[core 1[hwt 0]]: [./B][./.]
<br>
[csclprd3-6-5:12646] MCW rank 7 bound to socket 1[core 3[hwt 0]]: [./.][./B]
<br>
[csclprd3-0-1:14499] MCW rank 24 bound to socket 0[core 4[hwt 0]]: [././././B/.]
<br>
[csclprd3-0-1:14499] MCW rank 25 bound to socket 0[core 5[hwt 0]]: [./././././B]
<br>
[csclprd3-0-1:14499] MCW rank 20 bound to socket 0[core 0[hwt 0]]: [B/././././.]
<br>
[csclprd3-0-5:16978] MCW rank 44 bound to socket 0[core 0[hwt 0]]: [B/././././.]
<br>
[csclprd3-0-5:16978] MCW rank 45 bound to socket 0[core 1[hwt 0]]: [./B/./././.]
<br>
[csclprd3-0-1:14499] MCW rank 21 bound to socket 0[core 1[hwt 0]]: [./B/./././.]
<br>
[csclprd3-0-5:16978] MCW rank 46 bound to socket 0[core 2[hwt 0]]: [././B/././.]
<br>
[csclprd3-0-1:14499] MCW rank 22 bound to socket 0[core 2[hwt 0]]: [././B/././.]
<br>
[csclprd3-0-1:14499] MCW rank 23 bound to socket 0[core 3[hwt 0]]: [./././B/./.]
<br>
[csclprd3-0-5:16978] MCW rank 47 bound to socket 0[core 3[hwt 0]]: [./././B/./.]
<br>
[csclprd3-0-5:16978] MCW rank 48 bound to socket 0[core 4[hwt 0]]: [././././B/.]
<br>
[csclprd3-0-5:16978] MCW rank 49 bound to socket 0[core 5[hwt 0]]: [./././././B]
<br>
[csclprd3-0-6:30547] MCW rank 51 bound to socket 0[core 1[hwt 0]]: [./B/./././.]
<br>
[csclprd3-0-2:06006] MCW rank 30 bound to socket 0[core 4[hwt 0]]: [././././B/.]
<br>
[csclprd3-0-6:30547] MCW rank 52 bound to socket 0[core 2[hwt 0]]: [././B/././.]
<br>
[csclprd3-0-2:06006] MCW rank 31 bound to socket 0[core 5[hwt 0]]: [./././././B]
<br>
[csclprd3-0-6:30547] MCW rank 53 bound to socket 0[core 3[hwt 0]]: [./././B/./.]
<br>
[csclprd3-0-2:06006] MCW rank 26 bound to socket 0[core 0[hwt 0]]: [B/././././.]
<br>
[csclprd3-0-6:30547] MCW rank 54 bound to socket 0[core 4[hwt 0]]: [././././B/.]
<br>
[csclprd3-0-2:06006] MCW rank 27 bound to socket 0[core 1[hwt 0]]: [./B/./././.]
<br>
[csclprd3-0-2:06006] MCW rank 28 bound to socket 0[core 2[hwt 0]]: [././B/././.]
<br>
[csclprd3-0-6:30547] MCW rank 55 bound to socket 0[core 5[hwt 0]]: [./././././B]
<br>
[csclprd3-0-3:14008] MCW rank 34 bound to socket 0[core 2[hwt 0]]: [././B/././.]
<br>
[csclprd3-0-6:30547] MCW rank 50 bound to socket 0[core 0[hwt 0]]: [B/././././.]
<br>
[csclprd3-0-3:14008] MCW rank 35 bound to socket 0[core 3[hwt 0]]: [./././B/./.]
<br>
[csclprd3-0-3:14008] MCW rank 36 bound to socket 0[core 4[hwt 0]]: [././././B/.]
<br>
[csclprd3-0-3:14008] MCW rank 37 bound to socket 0[core 5[hwt 0]]: [./././././B]
<br>
[csclprd3-0-3:14008] MCW rank 32 bound to socket 0[core 0[hwt 0]]: [B/././././.]
<br>
[csclprd3-0-3:14008] MCW rank 33 bound to socket 0[core 1[hwt 0]]: [./B/./././.]
<br>
[csclprd3-0-2:06006] MCW rank 29 bound to socket 0[core 3[hwt 0]]: [./././B/./.]
<br>
[csclprd3-0-12:12559] MCW rank 120 bound to socket 0[core 0[hwt 0-1]]: [BB/../../../../..]
<br>
[csclprd3-0-12:12559] MCW rank 121 bound to socket 0[core 1[hwt 0-1]]: [../BB/../../../..]
<br>
[csclprd3-0-12:12559] MCW rank 122 bound to socket 0[core 2[hwt 0-1]]: [../../BB/../../..]
<br>
[csclprd3-0-12:12559] MCW rank 123 bound to socket 0[core 3[hwt 0-1]]: [../../../BB/../..]
<br>
[csclprd3-0-12:12559] MCW rank 124 bound to socket 0[core 4[hwt 0-1]]: [../../../../BB/..]
<br>
[csclprd3-0-12:12559] MCW rank 125 bound to socket 0[core 5[hwt 0-1]]: [../../../../../BB]
<br>
[csclprd3-0-0:31325] MCW rank 8 bound to socket 0[core 0[hwt 0]]: [B/././././.][./././././.]
<br>
[csclprd3-0-0:31325] MCW rank 9 bound to socket 1[core 6[hwt 0]]: [./././././.][B/././././.]
<br>
[csclprd3-0-0:31325] MCW rank 10 bound to socket 0[core 1[hwt 0]]: [./B/./././.][./././././.]
<br>
[csclprd3-0-7:20792] MCW rank 68 bound to socket 0[core 6[hwt 0-1]]: [../../../../../../BB/..][../../../../../../../..]
<br>
[csclprd3-0-7:20792] MCW rank 69 bound to socket 1[core 14[hwt 0-1]]: [../../../../../../../..][../../../../../../BB/..]
<br>
[csclprd3-0-0:31325] MCW rank 11 bound to socket 1[core 7[hwt 0]]: [./././././.][./B/./././.]
<br>
[csclprd3-0-10:19372] MCW rank 100 bound to socket 0[core 6[hwt 0-1]]: [../../../../../../BB/..][../../../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 101 bound to socket 1[core 14[hwt 0-1]]: [../../../../../../../..][../../../../../../BB/..]
<br>
[csclprd3-0-11:31905] MCW rank 116 bound to socket 0[core 6[hwt 0-1]]: [../../../../../../BB/..][../../../../../../../..]
<br>
[csclprd3-0-11:31905] MCW rank 117 bound to socket 1[core 14[hwt 0-1]]: [../../../../../../../..][../../../../../../BB/..]
<br>
[csclprd3-0-7:20792] MCW rank 70 bound to socket 0[core 7[hwt 0-1]]: [../../../../../../../BB][../../../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 102 bound to socket 0[core 7[hwt 0-1]]: [../../../../../../../BB][../../../../../../../..]
<br>
[csclprd3-0-11:31905] MCW rank 118 bound to socket 0[core 7[hwt 0-1]]: [../../../../../../../BB][../../../../../../../..]
<br>
[csclprd3-0-7:20792] MCW rank 71 bound to socket 1[core 15[hwt 0-1]]: [../../../../../../../..][../../../../../../../BB]
<br>
[csclprd3-0-10:19372] MCW rank 103 bound to socket 1[core 15[hwt 0-1]]: [../../../../../../../..][../../../../../../../BB]
<br>
[csclprd3-0-0:31325] MCW rank 12 bound to socket 0[core 2[hwt 0]]: [././B/././.][./././././.]
<br>
[csclprd3-0-11:31905] MCW rank 119 bound to socket 1[core 15[hwt 0-1]]: [../../../../../../../..][../../../../../../../BB]
<br>
[csclprd3-0-0:31325] MCW rank 13 bound to socket 1[core 8[hwt 0]]: [./././././.][././B/././.]
<br>
[csclprd3-0-7:20792] MCW rank 56 bound to socket 0[core 0[hwt 0-1]]: [BB/../../../../../../..][../../../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 88 bound to socket 0[core 0[hwt 0-1]]: [BB/../../../../../../..][../../../../../../../..]
<br>
[csclprd3-0-11:31905] MCW rank 104 bound to socket 0[core 0[hwt 0-1]]: [BB/../../../../../../..][../../../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 89 bound to socket 1[core 8[hwt 0-1]]: [../../../../../../../..][BB/../../../../../../..]
<br>
[csclprd3-0-7:20792] MCW rank 57 bound to socket 1[core 8[hwt 0-1]]: [../../../../../../../..][BB/../../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 90 bound to socket 0[core 1[hwt 0-1]]: [../BB/../../../../../..][../../../../../../../..]
<br>
[csclprd3-0-11:31905] MCW rank 105 bound to socket 1[core 8[hwt 0-1]]: [../../../../../../../..][BB/../../../../../../..]
<br>
[csclprd3-0-0:31325] MCW rank 14 bound to socket 0[core 3[hwt 0]]: [./././B/./.][./././././.]
<br>
[csclprd3-0-7:20792] MCW rank 58 bound to socket 0[core 1[hwt 0-1]]: [../BB/../../../../../..][../../../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 91 bound to socket 1[core 9[hwt 0-1]]: [../../../../../../../..][../BB/../../../../../..]
<br>
[csclprd3-0-0:31325] MCW rank 15 bound to socket 1[core 9[hwt 0]]: [./././././.][./././B/./.]
<br>
[csclprd3-0-7:20792] MCW rank 59 bound to socket 1[core 9[hwt 0-1]]: [../../../../../../../..][../BB/../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 92 bound to socket 0[core 2[hwt 0-1]]: [../../BB/../../../../..][../../../../../../../..]
<br>
[csclprd3-0-0:31325] MCW rank 16 bound to socket 0[core 4[hwt 0]]: [././././B/.][./././././.]
<br>
[csclprd3-0-11:31905] MCW rank 106 bound to socket 0[core 1[hwt 0-1]]: [../BB/../../../../../..][../../../../../../../..]
<br>
[csclprd3-0-0:31325] MCW rank 17 bound to socket 1[core 10[hwt 0]]: [./././././.][././././B/.]
<br>
[csclprd3-0-7:20792] MCW rank 60 bound to socket 0[core 2[hwt 0-1]]: [../../BB/../../../../..][../../../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 93 bound to socket 1[core 10[hwt 0-1]]: [../../../../../../../..][../../BB/../../../../..]
<br>
[csclprd3-0-0:31325] MCW rank 18 bound to socket 0[core 5[hwt 0]]: [./././././B][./././././.]
<br>
[csclprd3-0-11:31905] MCW rank 107 bound to socket 1[core 9[hwt 0-1]]: [../../../../../../../..][../BB/../../../../../..]
<br>
[csclprd3-0-7:20792] MCW rank 61 bound to socket 1[core 10[hwt 0-1]]: [../../../../../../../..][../../BB/../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 94 bound to socket 0[core 3[hwt 0-1]]: [../../../BB/../../../..][../../../../../../../..]
<br>
[csclprd3-0-11:31905] MCW rank 108 bound to socket 0[core 2[hwt 0-1]]: [../../BB/../../../../..][../../../../../../../..]
<br>
[csclprd3-0-7:20792] MCW rank 62 bound to socket 0[core 3[hwt 0-1]]: [../../../BB/../../../..][../../../../../../../..]
<br>
[csclprd3-0-11:31905] MCW rank 109 bound to socket 1[core 10[hwt 0-1]]: [../../../../../../../..][../../BB/../../../../..]
<br>
[csclprd3-0-7:20792] MCW rank 63 bound to socket 1[core 11[hwt 0-1]]: [../../../../../../../..][../../../BB/../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 95 bound to socket 1[core 11[hwt 0-1]]: [../.../../../../../../..][../../../BB/../../../..]
<br>
[csclprd3-0-11:31905] MCW rank 110 bound to socket 0[core 3[hwt 0-1]]: [../../../BB/../../../..][../../../../../../../..]
<br>
[csclprd3-0-7:20792] MCW rank 64 bound to socket 0[core 4[hwt 0-1]]: [../../../../BB/../../..][../../../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 96 bound to socket 0[core 4[hwt 0-1]]: [../../../../BB/../../..][../../../../../../../..]
<br>
[csclprd3-0-11:31905] MCW rank 111 bound to socket 1[core 11[hwt 0-1]]: [../../../../../../../..][../../../BB/../../../..]
<br>
[csclprd3-0-0:31325] MCW rank 19 bound to socket 1[core 11[hwt 0]]: [./././././.][./././././B]
<br>
[csclprd3-0-4:30528] MCW rank 42 bound to socket 0[core 4[hwt 0]]: [././././B/.]
<br>
[csclprd3-0-4:30528] MCW rank 43 bound to socket 0[core 5[hwt 0]]: [./././././B]
<br>
[csclprd3-0-4:30528] MCW rank 38 bound to socket 0[core 0[hwt 0]]: [B/././././.]
<br>
[csclprd3-0-4:30528] MCW rank 39 bound to socket 0[core 1[hwt 0]]: [./B/./././.]
<br>
[csclprd3-0-4:30528] MCW rank 40 bound to socket 0[core 2[hwt 0]]: [././B/././.]
<br>
[csclprd3-0-4:30528] MCW rank 41 bound to socket 0[core 3[hwt 0]]: [./././B/./.]
<br>
[csclprd3-0-13:29240] MCW rank 127 bound to socket 1[core 6[hwt 0-1]]: [../../../../../..][BB/../../../../..]
<br>
[csclprd3-0-8:15818] MCW rank 76 bound to socket 0[core 2[hwt 0-1]]: [../../BB/../../../../..][../../../../../../../..]
<br>
[csclprd3-0-13:29240] MCW rank 128 bound to socket 0[core 1[hwt 0-1]]: [../BB/../../../..][../../../../../..]
<br>
[csclprd3-0-8:15818] MCW rank 77 bound to socket 1[core 10[hwt 0-1]]: [../../../../../../../..][../../BB/../../../../..]
<br>
[csclprd3-0-13:29240] MCW rank 129 bound to socket 1[core 7[hwt 0-1]]: [../../../../../..][../BB/../../../..]
<br>
[csclprd3-0-8:15818] MCW rank 78 bound to socket 0[core 3[hwt 0-1]]: [../../../BB/../../../..][../../../../../../../..]
<br>
[csclprd3-0-13:29240] MCW rank 130 bound to socket 0[core 2[hwt 0-1]]: [../../BB/../../..][../../../../../..]
<br>
[csclprd3-0-8:15818] MCW rank 79 bound to socket 1[core 11[hwt 0-1]]: [../../../../../../../..][../../../BB/../../../..]
<br>
[csclprd3-0-13:29240] MCW rank 131 bound to socket 1[core 8[hwt 0-1]]: [../../../../../..][../../BB/../../..]
<br>
[csclprd3-0-8:15818] MCW rank 80 bound to socket 0[core 4[hwt 0-1]]: [../../../../BB/../../..][../../../../../../../..]
<br>
[csclprd3-0-13:29240] MCW rank 126 bound to socket 0[core 0[hwt 0-1]]: [BB/../../../../..][../../../../../..]
<br>
[csclprd3-0-8:15818] MCW rank 81 bound to socket 1[core 12[hwt 0-1]]: [../../../../../../../..][../../../../BB/../../..]
<br>
[csclprd3-0-8:15818] MCW rank 82 bound to socket 0[core 5[hwt 0-1]]: [../../../../../BB/../..][../../../../../../../..]
<br>
[csclprd3-0-8:15818] MCW rank 83 bound to socket 1[core 13[hwt 0-1]]: [../../../../../../../..][../../../../../BB/../..]
<br>
[csclprd3-0-8:15818] MCW rank 84 bound to socket 0[core 6[hwt 0-1]]: [../../../../../../BB/..][../../../../../../../..]
<br>
[csclprd3-0-8:15818] MCW rank 85 bound to socket 1[core 14[hwt 0-1]]: [../../../../../../../..][../../../../../../BB/..]
<br>
[csclprd3-0-8:15818] MCW rank 86 bound to socket 0[core 7[hwt 0-1]]: [../../../../../../../BB][../../../../../../../..]
<br>
[csclprd3-0-8:15818] MCW rank 87 bound to socket 1[core 15[hwt 0-1]]: [../../../../../../../..][../../../../../../../BB]
<br>
[csclprd3-0-8:15818] MCW rank 72 bound to socket 0[core 0[hwt 0-1]]: [BB/../../../../../../..][../../../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 97 bound to socket 1[core 12[hwt 0-1]]: [../../../../../../../..][../../../../BB/../../..]
<br>
[csclprd3-0-11:31905] MCW rank 112 bound to socket 0[core 4[hwt 0-1]]: [../../../../BB/../../..][../../../../../../../..]
<br>
[csclprd3-0-7:20792] MCW rank 65 bound to socket 1[core 12[hwt 0-1]]: [../../../../../../../..][../../../../BB/../../..]
<br>
[csclprd3-0-8:15818] MCW rank 73 bound to socket 1[core 8[hwt 0-1]]: [../../../../../../../..][BB/../../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 98 bound to socket 0[core 5[hwt 0-1]]: [../../../../../BB/../..][../../../../../../../..]
<br>
[csclprd3-0-11:31905] MCW rank 113 bound to socket 1[core 12[hwt 0-1]]: [../../../../../../../..][../../../../BB/../../..]
<br>
[csclprd3-0-8:15818] MCW rank 74 bound to socket 0[core 1[hwt 0-1]]: [../BB/../../../../../..][../../../../../../../..]
<br>
[csclprd3-0-7:20792] MCW rank 66 bound to socket 0[core 5[hwt 0-1]]: [../../../../../BB/../..][../../../../../../../..]
<br>
[csclprd3-0-10:19372] MCW rank 99 bound to socket 1[core 13[hwt 0-1]]: [../../../../../../../..][../../../../../BB/../..]
<br>
[csclprd3-0-11:31905] MCW rank 114 bound to socket 0[core 5[hwt 0-1]]: [../../../../../BB/../..][../../../../../../../..]
<br>
[csclprd3-0-11:31905] MCW rank 115 bound to socket 1[core 13[hwt 0-1]]: [../../../../../../../..][../../../../../BB/../..]
<br>
[csclprd3-0-8:15818] MCW rank 75 bound to socket 1[core 9[hwt 0-1]]: [../../../../../../../..][../BB/../../../../../..]
<br>
[csclprd3-0-7:20792] MCW rank 67 bound to socket 1[core 13[hwt 0-1]]: [../../../../../../../..][../../../../../BB/../..]
<br>
[csclprd3-0-13:29244] *** Process received signal ***
<br>
[csclprd3-0-13:29244] Signal: Bus error (7)
<br>
[csclprd3-0-13:29244] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29244] Failing at address: 0x7f67c02a7980
<br>
[csclprd3-0-13:29245] *** Process received signal ***
<br>
[csclprd3-0-13:29245] Signal: Bus error (7)
<br>
[csclprd3-0-13:29245] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29245] Failing at address: 0x7f6390225900
<br>
[csclprd3-0-13:29247] *** Process received signal ***
<br>
[csclprd3-0-13:29247] Signal: Bus error (7)
<br>
[csclprd3-0-13:29247] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29247] Failing at address: 0x7ff4842e8980
<br>
[csclprd3-0-13:29241] *** Process received signal ***
<br>
[csclprd3-0-13:29241] Signal: Bus error (7)
<br>
[csclprd3-0-13:29241] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29241] Failing at address: 0x7fbd7c36ba80
<br>
[csclprd3-0-13:29242] *** Process received signal ***
<br>
[csclprd3-0-13:29242] Signal: Bus error (7)
<br>
[csclprd3-0-13:29242] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29242] Failing at address: 0x7f6773728a80
<br>
[csclprd3-0-13:29243] *** Process received signal ***
<br>
[csclprd3-0-13:29243] Signal: Bus error (7)
<br>
[csclprd3-0-13:29243] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:29243] Failing at address: 0x7fbd7ea60980
<br>
[csclprd3-0-13:29244] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7f67cfa7b500]
<br>
[csclprd3-0-13:29244] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7f67cfdf0f61]
<br>
[csclprd3-0-13:29244] [ 2] [csclprd3-0-13:29245] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7f639fac4500]
<br>
[csclprd3-0-13:29245] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7f639fe39f61]
<br>
[csclprd3-0-13:29245] [ 2] [csclprd3-0-13:29247] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7ff493ea8500]
<br>
[csclprd3-0-13:29247] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7ff49421df61]
<br>
[csclprd3-0-13:29247] [ 2] [csclprd3-0-13:29243] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7fbd8e1b0500]
<br>
[csclprd3-0-13:29243] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7fbd8e525f61]
<br>
[csclprd3-0-13:29243] [ 2] [csclprd3-0-13:29241] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7fbd8cd79500]
<br>
[csclprd3-0-13:29241] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7fbd8d0eef61]
<br>
[csclprd3-0-13:29241] [ 2] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7fbd8d0ef047]
<br>
[csclprd3-0-13:29241] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7fbd8cfdc670]
<br>
[csclprd3-0-13:29241] [ 4] [csclprd3-0-13:29242] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7f6782cd0500]
<br>
[csclprd3-0-13:29242] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x167f61)[0x7f6783045f61]
<br>
[csclprd3-0-13:29242] [ 2] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7f6783046047]
<br>
[csclprd3-0-13:29242] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7fbd8e526047]
<br>
[csclprd3-0-13:29243] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7fbd8e413670]
<br>
[csclprd3-0-13:29243] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7fbd8e4145ab]
<br>
[csclprd3-0-13:29243] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7fbd8e414751]
<br>
[csclprd3-0-13:29243] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7fbd8e5221c9]
<br>
[csclprd3-0-13:29243] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7fbd8e508628]
<br>
[csclprd3-0-13:29243] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7fbd8cfdd5ab]
<br>
[csclprd3-0-13:29241] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7fbd8cfdd751]
<br>
[csclprd3-0-13:29241] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7fbd8d0eb1c9]
<br>
[csclprd3-0-13:29241] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7fbd8d0d1628]
<br>
[csclprd3-0-13:29241] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7fbd8d244d61]
<br>
[csclprd3-0-13:29241] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7ff49421e047]
<br>
[csclprd3-0-13:29247] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7ff49410b670]
<br>
[csclprd3-0-13:29247] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7ff49410c5ab]
<br>
[csclprd3-0-13:29247] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7ff49410c751]
<br>
[csclprd3-0-13:29247] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7ff49421a1c9]
<br>
[csclprd3-0-13:29247] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7ff494200628]
<br>
[csclprd3-0-13:29247] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7ff494373d61]
<br>
[csclprd3-0-13:29247] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7f67cfdf1047]
<br>
[csclprd3-0-13:29244] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7f67cfcde670]
<br>
[csclprd3-0-13:29244] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7f67cfcdf5ab]
<br>
[csclprd3-0-13:29244] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7f67cfcdf751]
<br>
[csclprd3-0-13:29244] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7f67cfded1c9]
<br>
[csclprd3-0-13:29244] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7f67cfdd3628]
<br>
[csclprd3-0-13:29244] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7f67cff46d61]
<br>
[csclprd3-0-13:29244] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x168047)[0x7f639fe3a047]
<br>
[csclprd3-0-13:29245] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7f639fd27670]
<br>
[csclprd3-0-13:29245] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7f639fd285ab]
<br>
[csclprd3-0-13:29245] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7f639fd28751]
<br>
[csclprd3-0-13:29245] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7f639fe361c9]
<br>
[csclprd3-0-13:29245] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7f639fe1c628]
<br>
[csclprd3-0-13:29245] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7f639ff8fd61]
<br>
[csclprd3-0-13:29245] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x55670)[0x7f6782f33670]
<br>
[csclprd3-0-13:29242] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x3b9)[0x7f6782f345ab]
<br>
[csclprd3-0-13:29242] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0xfb)[0x7f6782f34751]
<br>
[csclprd3-0-13:29242] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_btl_sm_add_procs+0x671)[0x7f67830421c9]
<br>
[csclprd3-0-13:29242] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0x14a628)[0x7f6783028628]
<br>
[csclprd3-0-13:29242] [ 8] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7fbd8d00c747]
<br>
[csclprd3-0-13:29241] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7fbd8d04c50b]
<br>
[csclprd3-0-13:29241] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29241] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7fbd8c9f6cdd]
<br>
[csclprd3-0-13:29241] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29241] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7ff49413b747]
<br>
[csclprd3-0-13:29247] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7ff49417b50b]
<br>
[csclprd3-0-13:29247] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29247] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7ff493b25cdd]
<br>
[csclprd3-0-13:29247] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29247] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7f67cfd0e747]
<br>
[csclprd3-0-13:29244] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7f67cfd4e50b]
<br>
[csclprd3-0-13:29244] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29244] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f67cf6f8cdd]
<br>
[csclprd3-0-13:29244] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29244] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7f678319bd61]
<br>
[csclprd3-0-13:29242] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7f6782f63747]
<br>
[csclprd3-0-13:29242] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7f6782fa350b]
<br>
[csclprd3-0-13:29242] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29242] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f678294dcdd]
<br>
[csclprd3-0-13:29242] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29242] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7f639fd57747]
<br>
[csclprd3-0-13:29245] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7f639fd9750b]
<br>
[csclprd3-0-13:29245] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29245] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f639f741cdd]
<br>
[csclprd3-0-13:29245] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29245] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xff)[0x7fbd8e67bd61]
<br>
[csclprd3-0-13:29243] [ 9] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0xbda)[0x7fbd8e443747]
<br>
[csclprd3-0-13:29243] [10] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x185)[0x7fbd8e48350b]
<br>
[csclprd3-0-13:29243] [11] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:29243] [12] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7fbd8de2dcdd]
<br>
[csclprd3-0-13:29243] [13] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:29243] *** End of error message ***
<br>
--------------------------------------------------------------------------
<br>
mpirun noticed that process rank 126 with PID 0 on node csclprd3-0-13 exited on signal 7 (Bus error).
<br>
--------------------------------------------------------------------------
<br>
[lanew_at_csclprd3s1 openmpi]$
<br>
<p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p>________________________________
<br>
From: users [users-bounces_at_[hidden]&lt;mailto:users-bounces_at_[hidden]&gt;] on behalf of Ralph Castain [rhc_at_[hidden]&lt;mailto:rhc_at_[hidden]&gt;]
<br>
Sent: Tuesday, June 23, 2015 2:54 PM
<br>
To: Open MPI Users
<br>
Subject: Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash
<br>
<p>You shouldn't need any special flags for mpicc or mpirun to replicate the problem. This will just let us see the line numbers associated with the crash so we can narrow down the problem. Once we get that, we may need to rerun with specific params to narrow it down further.
<br>
<p>BTW: when you get the backtrace, could you check the other threads as well? There are several threads running underneath now, and it would help to get the backtrace for each of them just to ensure there isn't something funny going on.
<br>
<p>Thanks
<br>
Ralph
<br>
<p><p>On Tue, Jun 23, 2015 at 12:19 PM, Lane, William &lt;William.Lane_at_[hidden]&lt;mailto:William.Lane_at_[hidden]&gt;&gt; wrote:
<br>
Ralph,
<br>
<p>I've had OpenMPI 1.8.6 installed on our cluster w/the --enable-debug
<br>
option. Here's what I think are the relevant flags returned from ompi_info:
<br>
<p>&nbsp;&nbsp;openMPI 1.8.6 build info
<br>
&nbsp;&nbsp;Fort MPI_SIZEOF: no
<br>
&nbsp;&nbsp;C profiling: yes
<br>
&nbsp;&nbsp;C++ profiling: yes
<br>
&nbsp;&nbsp;Fort mpif.h profiling: yes
<br>
&nbsp;&nbsp;Fort use mpi profiling: yes
<br>
&nbsp;&nbsp;Fort use mpi_f08 prof: no
<br>
&nbsp;&nbsp;C++ exceptions: no
<br>
&nbsp;Thread support: posix (MPI_THREAD_MULTIPLE: no, OPAL support: yes, OMPI progress: no, ORTE progress: yes, Event lib: yes)
<br>
&nbsp;&nbsp;Sparse Groups: no
<br>
&nbsp;&nbsp;Internal debug support: yes
<br>
&nbsp;&nbsp;MPI interface warnings: yes
<br>
&nbsp;&nbsp;MPI parameter check: runtime
<br>
&nbsp;&nbsp;Memory profiling support: no
<br>
&nbsp;&nbsp;Memory debugging support: no
<br>
&nbsp;&nbsp;dl support: yes
<br>
&nbsp;&nbsp;Heterogeneous support: no
<br>
&nbsp;&nbsp;mpirun default --prefix: no
<br>
<p>Do I need to compile my OpenMPI C test code w/any special
<br>
switches passed to mpicc?
<br>
<p>Are there any special switches should I use with mpirun to run my job?
<br>
<p>Thanks for your help w/these issues.
<br>
<p>-Bill L.
<br>
________________________________
<br>
From: users [users-bounces_at_[hidden]&lt;mailto:users-bounces_at_[hidden]&gt;] on behalf of Ralph Castain [rhc_at_[hidden]&lt;mailto:rhc_at_[hidden]&gt;]
<br>
Sent: Friday, June 19, 2015 6:40 AM
<br>
<p>To: Open MPI Users
<br>
Subject: Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash
<br>
<p>Good point
<br>
<p>William: can you rebuild OMPI with -enable-debug and run this again so we can see where the code is breaking?
<br>
<p>Thanks
<br>
Ralph
<br>
<p><p>On Jun 19, 2015, at 6:11 AM, Gilles Gouaillardet &lt;gilles.gouaillardet_at_[hidden]&lt;mailto:gilles.gouaillardet_at_[hidden]&gt;&gt; wrote:
<br>
<p>Ralph,
<br>
<p>I got that, but I cannot read the stack trace (optimized build)
<br>
my best bet is to reproduce the issue, and then find how and why ompi_free_list_t is segfault'ing.
<br>
that's why I requested info about the environment
<br>
<p>iirc, ompi_free_list_t are different between master and v1.8, so an incorrect back port could be the root cause.
<br>
<p>Cheers,
<br>
<p>Gilles
<br>
<p>On Friday, June 19, 2015, Ralph Castain &lt;rhc_at_[hidden]&lt;mailto:rhc_at_[hidden]&gt;&gt; wrote:
<br>
Gilles
<br>
<p>I was fooled too, but that isn't the issue. The problem is that ompi_free_list is segfaulting:
<br>
<p>[csclprd3-0-13:30901] *** Process received signal ***
<br>
[csclprd3-0-13:30901] Signal: Bus error (7)
<br>
[csclprd3-0-13:30901] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:30901] Failing at address: 0x7ff404351d80
<br>
[csclprd3-0-13:30901] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7ff41453c500]
<br>
[csclprd3-0-13:30901] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0xd4fea)[0x7ff41481efea]
<br>
[csclprd3-0-13:30901] [ 2] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x219)[0x7ff41479f009]
<br>
[csclprd3-0-13:30901] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0x40)[0x7ff41479f110]
<br>
[csclprd3-0-13:30901] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0xc568e)[0x7ff41480f68e]
<br>
[csclprd3-0-13:30901] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xd5)[0x7ff4148e3715]
<br>
[csclprd3-0-13:30901] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0x8d6)[0x7ff4147b9ad6]
<br>
[csclprd3-0-13:30901] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x170)[0x7ff4147d8c60]
<br>
[csclprd3-0-13:30901] [ 8] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:30901] [ 9] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7ff4141b9cdd]
<br>
[csclprd3-0-13:30901] [10] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:30901] *** End of error message ***
<br>
<p><p><p>On Jun 19, 2015, at 5:52 AM, Gilles Gouaillardet &lt;gilles.gouaillardet_at_[hidden]&lt;<a href="http://UrlBlockedError.aspx">http://UrlBlockedError.aspx</a>&gt;&gt; wrote:
<br>
<p>Lane,
<br>
<p>could you please describe your configuration ?
<br>
how many sockets per node ?
<br>
how many cores per socket ?
<br>
how many threads per core ?
<br>
what is the minimum number of nodes needed to reproduce the issue ?
<br>
do all the nodes have the same configuration ?
<br>
if yes, what happens without --hetero-nodes ?
<br>
<p>Cheers,
<br>
<p>Gilles
<br>
<p>On Friday, June 19, 2015, Lane, William &lt;William.Lane_at_[hidden]&lt;<a href="http://UrlBlockedError.aspx">http://UrlBlockedError.aspx</a>&gt;&gt; wrote:
<br>
Ralph,
<br>
<p>I created a hostfile that just has the names of the hosts while
<br>
specifying no slot information whatsoever (e.g. csclprd3-0-0)
<br>
and received the following errors:
<br>
<p>mpirun -np 132 -report-bindings --prefix /hpc/apps/mpi/openmpi/1.8.6/ --hostfile hostfile-noslots --mca btl_tcp_if_include eth0 --hetero-nodes /hpc/home/lanew/mpi/openmpi/ProcessColors3
<br>
<p>[csclprd3-6-5:14770] MCW rank 4 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]]: [B/B][./.]
<br>
[csclprd3-6-5:14770] MCW rank 5 bound to socket 1[core 2[hwt 0]], socket 1[core 3[hwt 0]]: [./.][B/B]
<br>
[csclprd3-6-5:14770] MCW rank 6 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]]: [B/B][./.]
<br>
[csclprd3-6-5:14770] MCW rank 7 bound to socket 1[core 2[hwt 0]], socket 1[core 3[hwt 0]]: [./.][B/B]
<br>
[csclprd3-0-1:16437] MCW rank 24 is not bound (or bound to all available processors)
<br>
[csclprd3-0-5:18925] MCW rank 48 is not bound (or bound to all available processors)
<br>
[csclprd3-0-1:16437] MCW rank 25 is not bound (or bound to all available processors)
<br>
[csclprd3-0-5:18925] MCW rank 49 is not bound (or bound to all available processors)
<br>
[csclprd3-0-1:16437] MCW rank 20 is not bound (or bound to all available processors)
<br>
[csclprd3-0-1:16437] MCW rank 21 is not bound (or bound to all available processors)
<br>
[csclprd3-0-5:18925] MCW rank 44 is not bound (or bound to all available processors)
<br>
[csclprd3-0-5:18925] MCW rank 45 is not bound (or bound to all available processors)
<br>
[csclprd3-0-1:16437] MCW rank 22 is not bound (or bound to all available processors)
<br>
[csclprd3-0-1:16437] MCW rank 23 is not bound (or bound to all available processors)
<br>
[csclprd3-0-5:18925] MCW rank 46 is not bound (or bound to all available processors)
<br>
[csclprd3-0-5:18925] MCW rank 47 is not bound (or bound to all available processors)
<br>
[csclprd3-0-3:15946] MCW rank 36 is not bound (or bound to all available processors)
<br>
[csclprd3-0-3:15946] MCW rank 37 is not bound (or bound to all available processors)
<br>
[csclprd3-0-3:15946] MCW rank 32 is not bound (or bound to all available processors)
<br>
[csclprd3-0-3:15946] MCW rank 33 is not bound (or bound to all available processors)
<br>
[csclprd3-0-3:15946] MCW rank 34 is not bound (or bound to all available processors)
<br>
[csclprd3-0-3:15946] MCW rank 35 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:09165] MCW rank 124 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:09165] MCW rank 125 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:09165] MCW rank 120 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:09165] MCW rank 121 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:09165] MCW rank 122 is not bound (or bound to all available processors)
<br>
[csclprd3-0-12:09165] MCW rank 123 is not bound (or bound to all available processors)
<br>
[csclprd3-6-1:27030] MCW rank 0 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]]: [B/B][./.]
<br>
[csclprd3-6-1:27030] MCW rank 1 bound to socket 1[core 2[hwt 0]], socket 1[core 3[hwt 0]]: [./.][B/B]
<br>
[csclprd3-6-1:27030] MCW rank 2 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]]: [B/B][./.]
<br>
[csclprd3-6-1:27030] MCW rank 3 bound to socket 1[core 2[hwt 0]], socket 1[core 3[hwt 0]]: [./.][B/B]
<br>
[csclprd3-0-2:07944] MCW rank 30 is not bound (or bound to all available processors)
<br>
[csclprd3-0-6:32510] MCW rank 54 is not bound (or bound to all available processors)
<br>
[csclprd3-0-2:07944] MCW rank 31 is not bound (or bound to all available processors)
<br>
[csclprd3-0-6:32510] MCW rank 55 is not bound (or bound to all available processors)
<br>
[csclprd3-0-2:07944] MCW rank 26 is not bound (or bound to all available processors)
<br>
[csclprd3-0-6:32510] MCW rank 50 is not bound (or bound to all available processors)
<br>
[csclprd3-0-6:32510] MCW rank 51 is not bound (or bound to all available processors)
<br>
[csclprd3-0-2:07944] MCW rank 27 is not bound (or bound to all available processors)
<br>
[csclprd3-0-2:07944] MCW rank 28 is not bound (or bound to all available processors)
<br>
[csclprd3-0-6:32510] MCW rank 52 is not bound (or bound to all available processors)
<br>
[csclprd3-0-6:32510] MCW rank 53 is not bound (or bound to all available processors)
<br>
[csclprd3-0-2:07944] MCW rank 29 is not bound (or bound to all available processors)
<br>
[csclprd3-0-0:00453] MCW rank 11 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-0:00453] MCW rank 12 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-0:00453] MCW rank 13 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket 1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-0:00453] MCW rank 14 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-0:00453] MCW rank 15 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket 1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-0:00453] MCW rank 16 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-7:22146] MCW rank 64 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-7:22146] MCW rank 65 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-0:00453] MCW rank 17 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket 1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-0:00453] MCW rank 18 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-11:00885] MCW rank 116 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:00885] MCW rank 117 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]],socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-10:20752] MCW rank 100 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-10:20752] MCW rank 101 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-0:00453] MCW rank 19 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket 1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-7:22146] MCW rank 66 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:00885] MCW rank 118 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-0:00453] MCW rank 8 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-10:20752] MCW rank 102 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-0:00453] MCW rank 9 bound to socket 1[core 6[hwt 0]], socket 1[core 7[hwt 0]], socket 1[core 8[hwt 0]], socket 1[core 9[hwt 0]], socket 1[core 10[hwt 0]], socket 1[core 11[hwt 0]]: [./././././.][B/B/B/B/B/B]
<br>
[csclprd3-0-0:00453] MCW rank 10 bound to socket 0[core 0[hwt 0]], socket 0[core 1[hwt 0]], socket 0[core 2[hwt 0]], socket 0[core 3[hwt 0]], socket 0[core 4[hwt 0]], socket 0[core 5[hwt 0]]: [B/B/B/B/B/B][./././././.]
<br>
[csclprd3-0-4:32449] MCW rank 42 is not bound (or bound to all available processors)
<br>
[csclprd3-0-4:32449] MCW rank 43 is not bound (or bound to all available processors)
<br>
[csclprd3-0-4:32449] MCW rank 38 is not bound (or bound to all available processors)
<br>
[csclprd3-0-4:32449] MCW rank 39 is not bound (or bound to all available processors)
<br>
[csclprd3-0-4:32449] MCW rank 40 is not bound (or bound to all available processors)
<br>
[csclprd3-0-4:32449] MCW rank 41 is not bound (or bound to all available processors)
<br>
[csclprd3-0-13:30897] MCW rank 126 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]]: [BB/BB/BB/BB/BB/BB][../../../../../..]
<br>
[csclprd3-0-8:17159] MCW rank 80 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-13:30897] MCW rank 127 bound to socket 1[core 6[hwt 0-1]], socket 1[core 7[hwt 0-1]], socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]]: [../../../../../..][BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:17159] MCW rank 81 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]]: [../../../../../..][BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:17159] MCW rank 81 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-13:30897] MCW rank 128 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]]: [BB/BB/BB/BB/BB/BB][../../../../../..]
<br>
[csclprd3-0-8:17159] MCW rank 82 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-13:30897] MCW rank 129 bound to socket 1[core 6[hwt 0-1]], socket 1[core 7[hwt 0-1]], socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]]: [../../../../../..][BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:17159] MCW rank 83 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-13:30897] MCW rank 130 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]]: [BB/BB/BB/BB/BB/BB][../../../../../..]
<br>
[csclprd3-0-13:30897] MCW rank 131 bound to socket 1[core 6[hwt 0-1]], socket 1[core 7[hwt 0-1]], socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]]: [../../../../../..][BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:17159] MCW rank 84 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-8:17159] MCW rank 85 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-11:00885] MCW rank 119 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-10:20752] MCW rank 103 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:17159] MCW rank 86 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-7:22146] MCW rank 67 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-11:00885] MCW rank 104 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..][csclprd3-0-10:20752] MCW rank 88 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-8:17159] MCW rank 87 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-11:00885] MCW rank 105 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-10:20752] MCW rank 89 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:17159] MCW rank 72 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-7:22146] MCW rank 68 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:00885] MCW rank 106 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-10:20752] MCW rank 90 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-8:17159] MCW rank 73 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-11:00885] MCW rank 107 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:22146] MCW rank 69 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-8:17159] MCW rank 74 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:00885] MCW rank 108 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:22146] MCW rank 57 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-11:00885] MCW rank 114 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-10:20752] MCW rank 98 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-11:00885] MCW rank 115 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:22146] MCW rank 58 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-10:20752] MCW rank 99 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:22146] MCW rank 59 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:22146] MCW rank 60 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-7:22146] MCW rank 61 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-7:22146] MCW rank 62 bound to socket 0[core 0[hwt 0-1]], socket 0[core 1[hwt 0-1]], socket 0[core 2[hwt 0-1]], socket 0[core 3[hwt 0-1]], socket 0[core 4[hwt 0-1]], socket 0[core 5[hwt 0-1]], socket 0[core 6[hwt 0-1]], socket 0[core 7[hwt 0-1]]: [BB/BB/BB/BB/BB/BB/BB/BB][../../../../../../../..]
<br>
[csclprd3-0-7:22146] MCW rank 63 bound to socket 1[core 8[hwt 0-1]], socket 1[core 9[hwt 0-1]], socket 1[core 10[hwt 0-1]], socket 1[core 11[hwt 0-1]], socket 1[core 12[hwt 0-1]], socket 1[core 13[hwt 0-1]], socket 1[core 14[hwt 0-1]], socket 1[core 15[hwt 0-1]]: [../../../../../../../..][BB/BB/BB/BB/BB/BB/BB/BB]
<br>
[csclprd3-0-13:30901] *** Process received signal ***
<br>
[csclprd3-0-13:30901] Signal: Bus error (7)
<br>
[csclprd3-0-13:30901] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:30901] Failing at address: 0x7ff404351d80
<br>
[csclprd3-0-13:30901] [ 0] /lib64/libpthread.so.0(+0xf500)[0x7ff41453c500]
<br>
[csclprd3-0-13:30901] [ 1] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0xd4fea)[0x7ff41481efea]
<br>
[csclprd3-0-13:30901] [ 2] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x219)[0x7ff41479f009]
<br>
[csclprd3-0-13:30901] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0x40)[0x7ff41479f110]
<br>
[csclprd3-0-13:30901] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0xc568e)[0x7ff41480f68e]
<br>
[csclprd3-0-13:30901] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xd5)[0x7ff4148e3715]
<br>
[csclprd3-0-13:30901] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0x8d6)[0x7ff4147b9ad6]
<br>
[csclprd3-0-13:30901] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x170)[0x7ff4147d8c60]
<br>
[csclprd3-0-13:30901] [ 8] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:30901] [ 9] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7ff4141b9cdd]
<br>
[csclprd3-0-13:30901] [10] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:30901] *** End of error message ***
<br>
<p>________________________________
<br>
From: users [users-bounces_at_[hidden]] on behalf of Ralph Castain [rhc_at_[hidden]]
<br>
Sent: Thursday, June 18, 2015 5:26 PM
<br>
To: Open MPI Users
<br>
Subject: Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash
<br>
<p>FWIW: I don't think this actually has anything to do with the #procs you are trying to run. Instead, I expect it has to do with confusion over how many cores it can bind across. When you tell it to use-hwthread-cpus, you are asking us to map processes to hwthreads, and not cores. I don't know which nodes are which, but it could be that we are getting incorrect info somewhere.
<br>
<p>Given that you are limiting the number of procs to the number of cores, is there some reason why you are asking us to use-hwthread-cpus? Why not just leave it at the default core level?
<br>
<p>I also suspect that you would have no problems if you -bind-to none - does that in fact work?
<br>
<p><p>On Jun 18, 2015, at 4:54 PM, Lane, William &lt;William.Lane_at_[hidden]&gt; wrote:
<br>
<p>I'm having a strange problem w/OpenMPI 1.8.6. If I run
<br>
my OpenMPI test code (compiled against OpenMPI 1.8.6
<br>
libraries) on &lt; 131 slots I get no issues. Anything over 131
<br>
errors out:
<br>
<p>mpirun -np 132 -report-bindings --prefix /hpc/apps/mpi/openmpi/1.8.6/ --hostfile hostfile-single --mca btl_tcp_if_include eth0 --hetero-nodes --use-hwthread-cpus /hpc/home/lanew/mpi/openmpi/ProcessColors3
<br>
<p>The hostfile has the number of slots restricted
<br>
to the number of cores, while the max-slots includes
<br>
the hyperthreading cores (e.g. csclprd3-0-0 slots=6
<br>
max-slots=12).
<br>
<p>The nodes are a mix of IBM x3550 nodes some
<br>
are Sandybridges and others are older Xeons.
<br>
<p>I would like to add that the submit node from
<br>
which I am launching mpirun has the open files
<br>
soft limit (ulimit -a) set to 1024, while the hard limit
<br>
(ulimit -Ha) is set to 4096. I know open file limits
<br>
were an issue w/an older version of OpenMPI. The
<br>
compute nodes all have their hard open files limit
<br>
and soft open files limits set to 4096.
<br>
<p>Here's the output (csclprd3-0-13 is the last node
<br>
listed in the hostfile hostfile-single):
<br>
<p>[csclprd3-0-13:28765] Signal: Bus error (7)
<br>
[csclprd3-0-13:28765] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28765] Failing at address: 0x7f30002a8980
<br>
[csclprd3-0-13:28766] *** Process received signal ***
<br>
[csclprd3-0-13:28766] Signal: Bus error (7)
<br>
[csclprd3-0-13:28766] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28766] Failing at address: 0x7fe137662880
<br>
[csclprd3-0-13:28768] *** Process received signal ***
<br>
[csclprd3-0-13:28768] Signal: Bus error (7)
<br>
[csclprd3-0-13:28768] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28768] Failing at address: 0x7f9b40228a80
<br>
[csclprd3-0-13:28770] *** Process received signal ***
<br>
[csclprd3-0-13:28770] Signal: Bus error (7)
<br>
[csclprd3-0-13:28770] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28770] Failing at address: 0x7f0de7f2bb00
<br>
[csclprd3-0-13:28767] *** Process received signal ***
<br>
[csclprd3-0-13:28767] Signal: Bus error (7)
<br>
[csclprd3-0-13:28767] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28767] Failing at address: 0x7f9b6c2e8980
<br>
[csclprd3-0-13:28764] *** Process received signal ***
<br>
[csclprd3-0-13:28764] Signal: Bus error (7)
<br>
[csclprd3-0-13:28764] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28765] Signal: Bus error (7)
<br>
[csclprd3-0-13:28765] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28765] Failing at address: 0x7f30002a8980
<br>
[csclprd3-0-13:28766] *** Process received signal ***
<br>
[csclprd3-0-13:28766] Signal: Bus error (7)
<br>
[csclprd3-0-13:28766] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28766] Failing at address: 0x7fe137662880
<br>
[csclprd3-0-13:28768] *** Process received signal ***
<br>
[csclprd3-0-13:28768] Signal: Bus error (7)
<br>
[csclprd3-0-13:28768] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28768] Failing at address: 0x7f9b40228a80
<br>
[csclprd3-0-13:28770] *** Process received signal ***
<br>
[csclprd3-0-13:28770] Signal: Bus error (7)
<br>
[csclprd3-0-13:28770] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28770] Failing at address: 0x7f0de7f2bb00
<br>
[csclprd3-0-13:28767] *** Process received signal ***
<br>
[csclprd3-0-13:28767] Signal: Bus error (7)
<br>
[csclprd3-0-13:28767] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28767] Failing at address: 0x7f9b6c2e8980
<br>
[csclprd3-0-13:28764] *** Process received signal ***
<br>
[csclprd3-0-13:28764] Signal: Bus error (7)
<br>
[csclprd3-0-13:28764] Signal code: Non-existant physical address (2)
<br>
[csclprd3-0-13:28768] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0x40)[0x7f9b513ad110]
<br>
[csclprd3-0-13:28768] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_grow+0x219)[0x7f0df77b6009]
<br>
[csclprd3-0-13:28770] [ 3] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_free_list_resize_mt+0x40)[0x7f0df77b6110]
<br>
[csclprd3-0-13:28770] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0xc568e)[0x7f9b5141d68e]
<br>
[csclprd3-0-13:28768] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xd5)[0x7f9b514f1715]
<br>
[csclprd3-0-13:28768] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0xc568e)[0x7f30115ea68e]
<br>
[csclprd3-0-13:28765] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xd5)[0x7f30116be715]
<br>
[csclprd3-0-13:28765] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0xc568e)[0x7f9b7bb3b68e]
<br>
[csclprd3-0-13:28767] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xd5)[0x7f9b7bc0f715]
<br>
[csclprd3-0-13:28767] [ 6] [csclprd3-0-13:28764] [ 4] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0xc568e)[0x7fa946bb768e]
<br>
[csclprd3-0-13:28764] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0xc568e)[0x7fe146d4068e]
<br>
[csclprd3-0-13:28766] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(+0xc568e)[0x7f0df782668e]
<br>
[csclprd3-0-13:28770] [ 5] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xd5)[0x7f0df78fa715]
<br>
[csclprd3-0-13:28770] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0x8d6)[0x7f0df77d0ad6]
<br>
[csclprd3-0-13:28770] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xd5)[0x7fe146e14715]
<br>
[csclprd3-0-13:28766] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0x8d6)[0x7fe146ceaad6]
<br>
[csclprd3-0-13:28766] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0x8d6)[0x7f9b513c7ad6]
<br>
[csclprd3-0-13:28768] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x170)[0x7f9b513e6c60]
<br>
[csclprd3-0-13:28768] [ 8] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:28768] [ 9] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f9b50dc7cdd]
<br>
[csclprd3-0-13:28768] [10] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:28768] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0x8d6)[0x7f3011594ad6]
<br>
[csclprd3-0-13:28765] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x170)[0x7f30115b3c60]
<br>
[csclprd3-0-13:28765] [ 8] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:28765] [ 9] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f3010f94cdd]
<br>
[csclprd3-0-13:28765] [10] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:28765] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0x8d6)[0x7f9b7bae5ad6]
<br>
[csclprd3-0-13:28767] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x170)[0x7f9b7bb04c60]
<br>
[csclprd3-0-13:28767] [ 8] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:28767] [ 9] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f9b7b4e5cdd]
<br>
[csclprd3-0-13:28767] [10] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:28767] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xd5)[0x7fa946c8b715]
<br>
[csclprd3-0-13:28764] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0x8d6)[0x7fa946b61ad6]
<br>
[csclprd3-0-13:28764] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x170)[0x7f0df77efc60]
<br>
[csclprd3-0-13:28770] [ 8] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:28770] [ 9] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f0df71d0cdd]
<br>
[csclprd3-0-13:28770] [10] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:28770] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x170)[0x7fe146d09c60]
<br>
[csclprd3-0-13:28766] [ 8] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:28766] [ 9] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7fe1466eacdd]
<br>
[csclprd3-0-13:28767] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(mca_pml_ob1_add_procs+0xd5)[0x7fa946c8b715]
<br>
[csclprd3-0-13:28764] [ 6] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(ompi_mpi_init+0x8d6)[0x7fa946b61ad6]
<br>
[csclprd3-0-13:28764] [ 7] /hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x170)[0x7f0df77efc60]
<br>
[csclprd3-0-13:28770] [ 8] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:28770] [ 9] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7f0df71d0cdd]
<br>
[csclprd3-0-13:28770] [10] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:28770] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x170)[0x7fe146d09c60]
<br>
[csclprd3-0-13:28766] [ 8] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:28766] [ 9] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7fe1466eacdd]
<br>
[csclprd3-0-13:28766] [10] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:28766] *** End of error message ***
<br>
/hpc/apps/mpi/openmpi/1.8.6/lib/libmpi.so.1(MPI_Init+0x170)[0x7fa946b80c60]
<br>
[csclprd3-0-13:28764] [ 8] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400ad0]
<br>
[csclprd3-0-13:28764] [ 9] /lib64/libc.so.6(__libc_start_main+0xfd)[0x7fa946561cdd]
<br>
[csclprd3-0-13:28764] [10] /hpc/home/lanew/mpi/openmpi/ProcessColors3[0x400999]
<br>
[csclprd3-0-13:28764] *** End of error message ***
<br>
--------------------------------------------------------------------------
<br>
mpirun noticed that process rank 126 with PID 0 on node csclprd3-0-13 exited on signal 7 (Bus error).
<br>
<p>Could a lack of the necessary NUMA libraries or the wrong version of NUMA
<br>
libraries be contributing to this?
<br>
IMPORTANT WARNING: This message is intended for the use of the person or entity to which it is addressed and may contain information that is privileged and confidential, the disclosure of which is governed by applicable law. If the reader of this message is not the intended recipient, or the employee or agent responsible for delivering it to the intended recipient, you are hereby notified that any dissemination, distribution or copying of this information is strictly prohibited. Thank you for your cooperation. _______________________________________________
<br>
users mailing list
<br>
users_at_[hidden]
<br>
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
<br>
Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/06/27159.php">http://www.open-mpi.org/community/lists/users/2015/06/27159.php</a>
<br>
<p>IMPORTANT WARNING: This message is intended for the use of the person or entity to which it is addressed and may contain information that is privileged and confidential, the disclosure of which is governed by applicable law. If the reader of this message is not the intended recipient, or the employee or agent responsible for delivering it to the intended recipient, you are hereby notified that any dissemination, distribution or copying of this information is strictly prohibited. Thank you for your cooperation.
<br>
_______________________________________________
<br>
users mailing list
<br>
users_at_[hidden]&lt;<a href="http://UrlBlockedError.aspx">http://UrlBlockedError.aspx</a>&gt;
<br>
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
<br>
Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/06/27164.php">http://www.open-mpi.org/community/lists/users/2015/06/27164.php</a>
<br>
<p>_______________________________________________
<br>
users mailing list
<br>
users_at_[hidden]&lt;mailto:users_at_[hidden]&gt;
<br>
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
<br>
Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/06/27166.php">http://www.open-mpi.org/community/lists/users/2015/06/27166.php</a>
<br>
<p>IMPORTANT WARNING: This message is intended for the use of the person or entity to which it is addressed and may contain information that is privileged and confidential, the disclosure of which is governed by applicable law. If the reader of this message is not the intended recipient, or the employee or agent responsible for delivering it to the intended recipient, you are hereby notified that any dissemination, distribution or copying of this information is strictly prohibited. Thank you for your cooperation.
<br>
<p>_______________________________________________
<br>
users mailing list
<br>
users_at_[hidden]&lt;mailto:users_at_[hidden]&gt;
<br>
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
<br>
Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/06/27176.php">http://www.open-mpi.org/community/lists/users/2015/06/27176.php</a>
<br>
<p>IMPORTANT WARNING: This message is intended for the use of the person or entity to which it is addressed and may contain information that is privileged and confidential, the disclosure of which is governed by applicable law. If the reader of this message is not the intended recipient, or the employee or agent responsible for delivering it to the intended recipient, you are hereby notified that any dissemination, distribution or copying of this information is strictly prohibited. Thank you for your cooperation.
<br>
<p>_______________________________________________
<br>
users mailing list
<br>
users_at_[hidden]&lt;mailto:users_at_[hidden]&gt;
<br>
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
<br>
Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2015/06/27179.php">http://www.open-mpi.org/community/lists/users/2015/06/27179.php</a>
<br>
<p>IMPORTANT WARNING: This message is intended for the use of the person or entity to which it is addressed and may contain information that is privileged and confidential, the disclosure of which is governed by applicable law. If the reader of this message is not the intended recipient, or the employee or agent responsible for delivering it to the intended recipient, you are hereby notified that any dissemination, distribution or copying of this information is strictly prohibited. Thank you for your cooperation.
<br>
<p><p>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/users/att-27184/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="27185.php">Gilles Gouaillardet: "Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash"</a>
<li><strong>Previous message:</strong> <a href="27183.php">Daniel Letai: "Re: [OMPI users] simple mpi hello world segfaults when coll ml not disabled"</a>
<li><strong>In reply to:</strong> <a href="27181.php">Ralph Castain: "Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="27185.php">Gilles Gouaillardet: "Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash"</a>
<li><strong>Reply:</strong> <a href="27185.php">Gilles Gouaillardet: "Re: [OMPI users] OpenMPI 1.8.6, CentOS 6.3, too many slots = crash"</a>
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