<?
$subject_val = "Re: [OMPI devel] Signals";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Apr  8 14:19:36 2008" -->
<!-- isoreceived="20080408181936" -->
<!-- sent="Tue, 08 Apr 2008 12:19:23 -0600" -->
<!-- isosent="20080408181923" -->
<!-- name="Ralph H Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Signals" -->
<!-- id="C421134B.CFE7%rhc_at_lanl.gov" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="47FBB521.8070000_at_Sun.COM" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Signals<br>
<strong>From:</strong> Ralph H Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2008-04-08 14:19:23
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3689.php">Richard Graham: "Re: [OMPI devel] Signals"</a>
<li><strong>Previous message:</strong> <a href="3687.php">Pak Lui: "Re: [OMPI devel] Signals"</a>
<li><strong>In reply to:</strong> <a href="3687.php">Pak Lui: "Re: [OMPI devel] Signals"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="3689.php">Richard Graham: "Re: [OMPI devel] Signals"</a>
<li><strong>Reply:</strong> <a href="3689.php">Richard Graham: "Re: [OMPI devel] Signals"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
On 4/8/08 12:10 PM, &quot;Pak Lui&quot; &lt;Pak.Lui_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Richard Graham wrote:
</span><br>
<span class="quotelev2">&gt;&gt; What happens if I deliver sigusr2 to mpirun ?  What I observe (for both
</span><br>
<span class="quotelev2">&gt;&gt; ssh/rsh and torque) that if I deliver a sigusr2 to mpirun, the signal does
</span><br>
<span class="quotelev2">&gt;&gt; get propagated to the mpi procs, which do invoke the signal handler I
</span><br>
<span class="quotelev2">&gt;&gt; registered, but the job is terminated right after that.  However, if I
</span><br>
<span class="quotelev2">&gt;&gt; deliver the signal directly to the mpi procs, the signal handler is invoked,
</span><br>
<span class="quotelev2">&gt;&gt; and the job continues to run.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; This is exactly what I have observed previously when I made the
</span><br>
<span class="quotelev1">&gt; gridengine change. It is due to the fact that orterun (aka mpirun) is
</span><br>
<span class="quotelev1">&gt; the process fork and exec'ing the executables on the HNP. e.g. On the
</span><br>
<span class="quotelev1">&gt; remote nodes, you don't have this problem. So the wait_daemon function
</span><br>
<span class="quotelev1">&gt; picks up the signal from mpirun on HNP, then kill off the children.
</span><br>
<p>I'll look into this, but I don't believe this is true UNLESS something
<br>
exits. The wait_daemon function only gets called when a proc terminates - it
<br>
doesn't &quot;pickup&quot; a signal on its own. Perhaps we are just having a language
<br>
problem here...
<br>
<p>In the rsh situation, the daemon &quot;daemonizes&quot; and closes the ssh session
<br>
during launch. If the ssh session closed on a signal, then that would return
<br>
and indicate that a daemon had failed to start, causing the abort. But that
<br>
session is successfully closed PRIOR to the launch of any MPI procs. I note
<br>
that we don't &quot;deregister&quot; the waitpid, though, so there may be some issue
<br>
there.
<br>
<p>However, we most certainly do NOT look for such things in Torque. My guess
<br>
is that something is causing a proc/daemon to abort, which then causes the
<br>
system to abort the job.
<br>
<p>I have tried this on my Mac (got other things going on at the moment on the
<br>
distributed machines), and all works as expected. However, that doesn't mean
<br>
there isn't a problem in general.
<br>
<p>Will investigate when I have time shortly.
<br>
<p><span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; So, I think that what was intended to happen is the correct thing, but for
</span><br>
<span class="quotelev2">&gt;&gt; some reason it is not happening.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Rich
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On 4/8/08 1:47 PM, &quot;Ralph H Castain&quot; &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I found what Pak said a little confusing as the wait_daemon function doesn't
</span><br>
<span class="quotelev3">&gt;&gt;&gt; actually receive a signal itself - it only detects that a proc has exited
</span><br>
<span class="quotelev3">&gt;&gt;&gt; and checks to see if that happened due to a signal. If so, it flags that
</span><br>
<span class="quotelev3">&gt;&gt;&gt; situation and will order the job aborted.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; So if the proc continues alive, the fact that it was hit with SIGUSR2 will
</span><br>
<span class="quotelev3">&gt;&gt;&gt; not be detected by ORTE nor will anything happen - however, if the OS uses
</span><br>
<span class="quotelev3">&gt;&gt;&gt; SIGUSR2 to terminate the proc, or if the proc terminates when it gets that
</span><br>
<span class="quotelev3">&gt;&gt;&gt; signal, we will see that proc terminate due to signal and abort the rest of
</span><br>
<span class="quotelev3">&gt;&gt;&gt; the job.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; We could change it if that is what people want - it is trivial to insert
</span><br>
<span class="quotelev3">&gt;&gt;&gt; code to say &quot;kill everything except if it died due to a certain signal&quot;.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; &lt;shrug&gt; up to you folks. Current behavior is what you said you wanted a long
</span><br>
<span class="quotelev3">&gt;&gt;&gt; time ago - nothing has changed in this regard for several years.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On 4/8/08 11:36 AM, &quot;Pak Lui&quot; &lt;Pak.Lui_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; First, can your user executable create a signal handler to catch the
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; SIGUSR2 to not exit? By default on Solaris it is going to exit, unless
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; you catch the signal and have the process to do nothing.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; from signal(3HEAD)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;       Name             Value   Default    Event
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;       SIGUSR1          16      Exit       User Signal 1
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;       SIGUSR2          17      Exit       User Signal 2
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; The other thing is, I suspect orte_plm_rsh_wait_daemon() in the rsh plm
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; might cause the processes to exit if the orted (or mpirun if it's on
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; HNP) receives a signal like SIGUSR2; it'd work on killing all the user
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; processes on that node once it receives a signal.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I workaround this for gridengine PLM. Once the gridengine_wait_daemon()
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; receives a SIGUSR1/SIGUSR2 signal, it just lets the signals to
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; acknowledge a signal returns, without declaring the launch_failed which
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; would kill off the user processes. The signals would also get passed to
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; the user processes, and let them decide what to do with the signals
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; themselves.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; SGE needed this so the job kill or job suspension notification to work
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; properly since they would send a SIGUSR1/2 to mpirun. I believe this is
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; probably what you need in the rsh plm.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Richard Graham wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I am running into a situation where I am trying to deliver a signal to the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; mpi procs (sigusr2).  I deliver this to mpirun, which propagates it to the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; mpi procs, but then proceeds to kill the children.  Is there an easy way
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; that I can get around this ?  I am using this mechanism in a situation
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; where
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I don't have a debugger, and trying to use this to turn on debugging when
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; hit a hang, so killing the mpi procs is really not what I want to have
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; happen.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Thanks,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Rich
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
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
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3689.php">Richard Graham: "Re: [OMPI devel] Signals"</a>
<li><strong>Previous message:</strong> <a href="3687.php">Pak Lui: "Re: [OMPI devel] Signals"</a>
<li><strong>In reply to:</strong> <a href="3687.php">Pak Lui: "Re: [OMPI devel] Signals"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="3689.php">Richard Graham: "Re: [OMPI devel] Signals"</a>
<li><strong>Reply:</strong> <a href="3689.php">Richard Graham: "Re: [OMPI devel] Signals"</a>
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
