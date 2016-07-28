<?
$subject_val = "Re: [OMPI devel] binding output error";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Apr 20 18:51:34 2015" -->
<!-- isoreceived="20150420225134" -->
<!-- sent="Mon, 20 Apr 2015 15:51:31 -0700" -->
<!-- isosent="20150420225131" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] binding output error" -->
<!-- id="CAMD57ofctERDd3z+fWro41hBomgvuTjJ9=eYjqF+fnzc_-Zuwg_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="DFA2BB06-AE65-43EC-8362-CCE203CFEA11_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] binding output error<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-04-20 18:51:31
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17284.php">Nathan Hjelm: "Re: [OMPI devel] noticing odd message"</a>
<li><strong>Previous message:</strong> <a href="17282.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] binding output error"</a>
<li><strong>In reply to:</strong> <a href="17282.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] binding output error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17287.php">Devendar Bureddy: "Re: [OMPI devel] binding output error"</a>
<li><strong>Reply:</strong> <a href="17287.php">Devendar Bureddy: "Re: [OMPI devel] binding output error"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Also, was this with HT's enabled? I'm wondering if the print code is
<br>
incorrectly computing the core because it isn't correctly accounting for HT
<br>
cpus.
<br>
<p><p>On Mon, Apr 20, 2015 at 3:49 PM, Jeff Squyres (jsquyres) &lt;jsquyres_at_[hidden]
<br>
<span class="quotelev1">&gt; wrote:
</span><br>
<p><span class="quotelev1">&gt; Ralph's the authority on this one, but just to be sure: are all nodes the
</span><br>
<span class="quotelev1">&gt; same topology? E.g., does adding &quot;--hetero-nodes&quot; to the mpirun command
</span><br>
<span class="quotelev1">&gt; line fix the problem?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt; &gt; On Apr 20, 2015, at 9:29 AM, Elena Elkina &lt;elena.elkina_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; wrote:
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Hi guys,
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; I faced with an issue on our cluster related to mapping &amp; binding
</span><br>
<span class="quotelev1">&gt; policies on 1.8.5.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; The matter is that --report-bindings output doesn't correspond to the
</span><br>
<span class="quotelev1">&gt; locale. It looks like there is a mistake on the output itself, because it
</span><br>
<span class="quotelev1">&gt; just puts serial core number while that core can be on another socket. For
</span><br>
<span class="quotelev1">&gt; example,
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; mpirun -np 2 --display-devel-map --report-bindings --map-by socket
</span><br>
<span class="quotelev1">&gt; hostname
</span><br>
<span class="quotelev2">&gt; &gt;  Data for JOB [43064,1] offset 0
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;  Mapper requested: NULL  Last mapper: round_robin  Mapping policy:
</span><br>
<span class="quotelev1">&gt; BYSOCKET  Ranking policy: SOCKET
</span><br>
<span class="quotelev2">&gt; &gt;  Binding policy: CORE  Cpu set: NULL  PPR: NULL  Cpus-per-rank: 1
</span><br>
<span class="quotelev2">&gt; &gt;       Num new daemons: 0      New daemon starting vpid INVALID
</span><br>
<span class="quotelev2">&gt; &gt;       Num nodes: 1
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;  Data for node: clx-orion-001         Launch id: -1   State: 2
</span><br>
<span class="quotelev2">&gt; &gt;       Daemon: [[43064,0],0]   Daemon launched: True
</span><br>
<span class="quotelev2">&gt; &gt;       Num slots: 28   Slots in use: 2 Oversubscribed: FALSE
</span><br>
<span class="quotelev2">&gt; &gt;       Num slots allocated: 28 Max slots: 0
</span><br>
<span class="quotelev2">&gt; &gt;       Username on node: NULL
</span><br>
<span class="quotelev2">&gt; &gt;       Num procs: 2    Next node_rank: 2
</span><br>
<span class="quotelev2">&gt; &gt;       Data for proc: [[43064,1],0]
</span><br>
<span class="quotelev2">&gt; &gt;               Pid: 0  Local rank: 0   Node rank: 0    App rank: 0
</span><br>
<span class="quotelev2">&gt; &gt;               State: INITIALIZED      Restarts: 0     App_context: 0
</span><br>
<span class="quotelev1">&gt; Locale: 0-6,14-20       Bind location: 0        Binding: 0
</span><br>
<span class="quotelev2">&gt; &gt;       Data for proc: [[43064,1],1]
</span><br>
<span class="quotelev2">&gt; &gt;               Pid: 0  Local rank: 1   Node rank: 1    App rank: 1
</span><br>
<span class="quotelev2">&gt; &gt;               State: INITIALIZED      Restarts: 0     App_context: 0
</span><br>
<span class="quotelev1">&gt; Locale: 7-13,21-27      Bind location: 7        Binding: 7
</span><br>
<span class="quotelev2">&gt; &gt; [clx-orion-001:26951] MCW rank 0 bound to socket 0[core 0[hwt 0]]:
</span><br>
<span class="quotelev1">&gt; [B/././././././././././././.][./././././././././././././.]
</span><br>
<span class="quotelev2">&gt; &gt; [clx-orion-001:26951] MCW rank 1 bound to socket 1[core 14[hwt 0]]:
</span><br>
<span class="quotelev1">&gt; [./././././././././././././.][B/././././././././././././.]
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; The second process should be bound at core 7 (not core 14).
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Another example:
</span><br>
<span class="quotelev2">&gt; &gt; mpirun -np 8 --display-devel-map --report-bindings --map-by core hostname
</span><br>
<span class="quotelev2">&gt; &gt;  Data for JOB [43202,1] offset 0
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;  Mapper requested: NULL  Last mapper: round_robin  Mapping policy:
</span><br>
<span class="quotelev1">&gt; BYCORE  Ranking policy: CORE
</span><br>
<span class="quotelev2">&gt; &gt;  Binding policy: CORE  Cpu set: NULL  PPR: NULL  Cpus-per-rank: 1
</span><br>
<span class="quotelev2">&gt; &gt;       Num new daemons: 0      New daemon starting vpid INVALID
</span><br>
<span class="quotelev2">&gt; &gt;       Num nodes: 1
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;  Data for node: clx-orion-001         Launch id: -1   State: 2
</span><br>
<span class="quotelev2">&gt; &gt;       Daemon: [[43202,0],0]   Daemon launched: True
</span><br>
<span class="quotelev2">&gt; &gt;       Num slots: 28   Slots in use: 8 Oversubscribed: FALSE
</span><br>
<span class="quotelev2">&gt; &gt;       Num slots allocated: 28 Max slots: 0
</span><br>
<span class="quotelev2">&gt; &gt;       Username on node: NULL
</span><br>
<span class="quotelev2">&gt; &gt;       Num procs: 8    Next node_rank: 8
</span><br>
<span class="quotelev2">&gt; &gt;       Data for proc: [[43202,1],0]
</span><br>
<span class="quotelev2">&gt; &gt;               Pid: 0  Local rank: 0   Node rank: 0    App rank: 0
</span><br>
<span class="quotelev2">&gt; &gt;               State: INITIALIZED      Restarts: 0     App_context: 0
</span><br>
<span class="quotelev1">&gt; Locale: 0       Bind location: 0        Binding: 0
</span><br>
<span class="quotelev2">&gt; &gt;       Data for proc: [[43202,1],1]
</span><br>
<span class="quotelev2">&gt; &gt;               Pid: 0  Local rank: 1   Node rank: 1    App rank: 1
</span><br>
<span class="quotelev2">&gt; &gt;               State: INITIALIZED      Restarts: 0     App_context: 0
</span><br>
<span class="quotelev1">&gt; Locale: 1       Bind location: 1        Binding: 1
</span><br>
<span class="quotelev2">&gt; &gt;       Data for proc: [[43202,1],2]
</span><br>
<span class="quotelev2">&gt; &gt;               Pid: 0  Local rank: 2   Node rank: 2    App rank: 2
</span><br>
<span class="quotelev2">&gt; &gt;               State: INITIALIZED      Restarts: 0     App_context: 0
</span><br>
<span class="quotelev1">&gt; Locale: 2       Bind location: 2        Binding: 2
</span><br>
<span class="quotelev2">&gt; &gt;       Data for proc: [[43202,1],3]
</span><br>
<span class="quotelev2">&gt; &gt;               Pid: 0  Local rank: 3   Node rank: 3    App rank: 3
</span><br>
<span class="quotelev2">&gt; &gt;               State: INITIALIZED      Restarts: 0     App_context: 0
</span><br>
<span class="quotelev1">&gt; Locale: 3       Bind location: 3        Binding: 3
</span><br>
<span class="quotelev2">&gt; &gt;       Data for proc: [[43202,1],4]
</span><br>
<span class="quotelev2">&gt; &gt;               Pid: 0  Local rank: 4   Node rank: 4    App rank: 4
</span><br>
<span class="quotelev2">&gt; &gt;               State: INITIALIZED      Restarts: 0     App_context: 0
</span><br>
<span class="quotelev1">&gt; Locale: 4       Bind location: 4        Binding: 4
</span><br>
<span class="quotelev2">&gt; &gt;       Data for proc: [[43202,1],5]
</span><br>
<span class="quotelev2">&gt; &gt;               Pid: 0  Local rank: 5   Node rank: 5    App rank: 5
</span><br>
<span class="quotelev2">&gt; &gt;               State: INITIALIZED      Restarts: 0     App_context: 0
</span><br>
<span class="quotelev1">&gt; Locale: 5       Bind location: 5        Binding: 5
</span><br>
<span class="quotelev2">&gt; &gt;       Data for proc: [[43202,1],6]
</span><br>
<span class="quotelev2">&gt; &gt;               Pid: 0  Local rank: 6   Node rank: 6    App rank: 6
</span><br>
<span class="quotelev2">&gt; &gt;               State: INITIALIZED      Restarts: 0     App_context: 0
</span><br>
<span class="quotelev1">&gt; Locale: 6       Bind location: 6        Binding: 6
</span><br>
<span class="quotelev2">&gt; &gt;       Data for proc: [[43202,1],7]
</span><br>
<span class="quotelev2">&gt; &gt;               Pid: 0  Local rank: 7   Node rank: 7    App rank: 7
</span><br>
<span class="quotelev2">&gt; &gt;               State: INITIALIZED      Restarts: 0     App_context: 0
</span><br>
<span class="quotelev1">&gt; Locale: 14      Bind location: 14       Binding: 14
</span><br>
<span class="quotelev2">&gt; &gt; [clx-orion-001:27069] MCW rank 0 bound to socket 0[core 0[hwt 0]]:
</span><br>
<span class="quotelev1">&gt; [B/././././././././././././.][./././././././././././././.]
</span><br>
<span class="quotelev2">&gt; &gt; [clx-orion-001:27069] MCW rank 1 bound to socket 0[core 1[hwt 0]]:
</span><br>
<span class="quotelev1">&gt; [./B/./././././././././././.][./././././././././././././.]
</span><br>
<span class="quotelev2">&gt; &gt; [clx-orion-001:27069] MCW rank 2 bound to socket 0[core 2[hwt 0]]:
</span><br>
<span class="quotelev1">&gt; [././B/././././././././././.][./././././././././././././.]
</span><br>
<span class="quotelev2">&gt; &gt; [clx-orion-001:27069] MCW rank 3 bound to socket 0[core 3[hwt 0]]:
</span><br>
<span class="quotelev1">&gt; [./././B/./././././././././.][./././././././././././././.]
</span><br>
<span class="quotelev2">&gt; &gt; [clx-orion-001:27069] MCW rank 4 bound to socket 0[core 4[hwt 0]]:
</span><br>
<span class="quotelev1">&gt; [././././B/././././././././.][./././././././././././././.]
</span><br>
<span class="quotelev2">&gt; &gt; [clx-orion-001:27069] MCW rank 5 bound to socket 0[core 5[hwt 0]]:
</span><br>
<span class="quotelev1">&gt; [./././././B/./././././././.][./././././././././././././.]
</span><br>
<span class="quotelev2">&gt; &gt; [clx-orion-001:27069] MCW rank 6 bound to socket 0[core 6[hwt 0]]:
</span><br>
<span class="quotelev1">&gt; [././././././B/././././././.][./././././././././././././.]
</span><br>
<span class="quotelev2">&gt; &gt; [clx-orion-001:27069] MCW rank 7 bound to socket 0[core 7[hwt 0]]:
</span><br>
<span class="quotelev1">&gt; [./././././././B/./././././.][./././././././././././././.]
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Rank 7 should be bound at core 14 instead of core 7 since core 7 is at
</span><br>
<span class="quotelev1">&gt; another socket.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Best regards,
</span><br>
<span class="quotelev2">&gt; &gt; Elena
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt; &gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/04/17273.php">http://www.open-mpi.org/community/lists/devel/2015/04/17273.php</a>
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
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/04/17282.php">http://www.open-mpi.org/community/lists/devel/2015/04/17282.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-17283/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17284.php">Nathan Hjelm: "Re: [OMPI devel] noticing odd message"</a>
<li><strong>Previous message:</strong> <a href="17282.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] binding output error"</a>
<li><strong>In reply to:</strong> <a href="17282.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] binding output error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17287.php">Devendar Bureddy: "Re: [OMPI devel] binding output error"</a>
<li><strong>Reply:</strong> <a href="17287.php">Devendar Bureddy: "Re: [OMPI devel] binding output error"</a>
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
