<?
$subject_val = "Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Nov 18 10:41:15 2014" -->
<!-- isoreceived="20141118154115" -->
<!-- sent="Tue, 18 Nov 2014 07:41:12 -0800" -->
<!-- isosent="20141118154112" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems" -->
<!-- id="CAMD57oehkNa=f6gs0Ado+MLfs9K01EZhw0m1+SAkSBD6BcBeow_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="19A6D200-E9D5-475E-A45A-EA1441EC8A54_at_bils.se" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-11-18 10:41:12
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16319.php">Marc H�ppner: "Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems"</a>
<li><strong>Previous message:</strong> <a href="16317.php">Marc H&#195;&#182;ppner: "Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems"</a>
<li><strong>In reply to:</strong> <a href="16317.php">Marc H&#195;&#182;ppner: "Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16319.php">Marc H�ppner: "Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems"</a>
<li><strong>Reply:</strong> <a href="16319.php">Marc H�ppner: "Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I took a brief gander at the OpenLava source code, and a couple of things
<br>
jump out. First, OpenLava is a batch scheduler and only supports batch
<br>
execution - there is no interactive command for &quot;run this job&quot;. So you
<br>
would have to &quot;bsub&quot; mpirun regardless.
<br>
<p>Once you submit the job, mpirun can certainly read the local allocation via
<br>
the environment. However, we cannot use the OpenLava internal functions to
<br>
launch the daemons or processes as the code is GPL2, and thus has a viral
<br>
incompatible license. Ordinarily, we get around that by just executing the
<br>
interactive job execution command, but OpenLava doesn't have one.
<br>
<p>So we'd have no other choice but to use ssh to launch the daemons on the
<br>
remote nodes. This is exactly what the provided openmpi wrapper script that
<br>
comes with OpenLava already does.
<br>
<p>Bottom line: I don't see a way to do any deeper integration minus the
<br>
interactive execution command. If OpenLava had a way of getting an
<br>
allocation and then interactively running jobs, we could support what you
<br>
requested. This doesn't seem to be what they are intending, unless I'm
<br>
missing something (the documentation is rather incomplete).
<br>
<p>Ralph
<br>
<p><p>On Tue, Nov 18, 2014 at 6:20 AM, Marc H&#195;&#182;ppner &lt;marc.hoeppner_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Hi,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; sure, no problem. And about the C Api, I really don&#226;&#128;&#153;t know more than what
</span><br>
<span class="quotelev1">&gt; I was told in the google group post I referred to (i.e. the API is
</span><br>
<span class="quotelev1">&gt; essentially identical to LSF 4-6, which should be on the web).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; The output of env can be found here:
</span><br>
<span class="quotelev1">&gt; <a href="https://dl.dropboxusercontent.com/u/1918141/env.txt">https://dl.dropboxusercontent.com/u/1918141/env.txt</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; /M
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Marc P. Hoeppner, PhD
</span><br>
<span class="quotelev1">&gt; Team Leader
</span><br>
<span class="quotelev1">&gt; BILS Genome Annotation Platform
</span><br>
<span class="quotelev1">&gt; Department for Medical Biochemistry and Microbiology
</span><br>
<span class="quotelev1">&gt; Uppsala University, Sweden
</span><br>
<span class="quotelev1">&gt; marc.hoeppner_at_[hidden]
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On 18 Nov 2014, at 15:14, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; If you could just run a single copy of &quot;env&quot; and send the output along,
</span><br>
<span class="quotelev1">&gt; that would help a lot. I'm not interested in the usual path etc, but would
</span><br>
<span class="quotelev1">&gt; like to see the envars that OpenLava is setting.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Thanks
</span><br>
<span class="quotelev1">&gt; Ralph
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Tue, Nov 18, 2014 at 2:19 AM, Gilles Gouaillardet &lt;
</span><br>
<span class="quotelev1">&gt; gilles.gouaillardet_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  Marc,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; the reply you pointed is a bit confusing to me :
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &quot;There is a native C API which can submit/start/stop/kill/re queue jobs&quot;
</span><br>
<span class="quotelev2">&gt;&gt; this is not what i am looking for :-(
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &quot;you need to make an appropriate call to openlava to start a remote
</span><br>
<span class="quotelev2">&gt;&gt; process&quot;
</span><br>
<span class="quotelev2">&gt;&gt; this is what i am interested in :-)
</span><br>
<span class="quotelev2">&gt;&gt; could you be more specific (e.g. point me to the functions, since the
</span><br>
<span class="quotelev2">&gt;&gt; OpenLava doc is pretty minimal ...)
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; the goal here is to spawn the orted daemons as part of the parallel job,
</span><br>
<span class="quotelev2">&gt;&gt; so these daemons are accounted within the parallel job.
</span><br>
<span class="quotelev2">&gt;&gt; /* if we use an API that simply spawns orted, but the orted is not
</span><br>
<span class="quotelev2">&gt;&gt; related whatsoever to the parallel job,
</span><br>
<span class="quotelev2">&gt;&gt; then we can simply use ssh */
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Cheers,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Gilles
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On 2014/11/18 18:24, Marc H&#195;&#182;ppner wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Hi Gilles,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; thanks for the prompt reply. Yes, as far as I know there is a C API to interact with jobs etc. Some mentioning here: <a href="https://groups.google.com/forum/#!topic/openlava-users/w74cRUe9Y9E">https://groups.google.com/forum/#!topic/openlava-users/w74cRUe9Y9E</a> &lt;<a href="https://groups.google.com/forum/#!topic/openlava-users/w74cRUe9Y9E">https://groups.google.com/forum/#!topic/openlava-users/w74cRUe9Y9E</a>&gt; &lt;<a href="https://groups.google.com/forum/#!topic/openlava-users/w74cRUe9Y9E">https://groups.google.com/forum/#!topic/openlava-users/w74cRUe9Y9E</a>&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; /Marc
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Marc P. Hoeppner, PhD
</span><br>
<span class="quotelev2">&gt;&gt; Team Leader
</span><br>
<span class="quotelev2">&gt;&gt; BILS Genome Annotation Platform
</span><br>
<span class="quotelev2">&gt;&gt; Department for Medical Biochemistry and Microbiology
</span><br>
<span class="quotelev2">&gt;&gt; Uppsala University, Swedenmarc.hoeppner_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  On 18 Nov 2014, at 08:40, Gilles Gouaillardet &lt;gilles.gouaillardet_at_[hidden]&gt; &lt;gilles.gouaillardet_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Hi Marc,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; OpenLava is based on a pretty old version of LSF (4.x if i remember
</span><br>
<span class="quotelev2">&gt;&gt; correctly)
</span><br>
<span class="quotelev2">&gt;&gt; and i do not think LSF had support for parallel jobs tight integration
</span><br>
<span class="quotelev2">&gt;&gt; at that time.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; my understanding is that basically, there is two kind of direct
</span><br>
<span class="quotelev2">&gt;&gt; integration :
</span><br>
<span class="quotelev2">&gt;&gt; - mpirun launch: mpirun spawns orted via the API provided by the batch
</span><br>
<span class="quotelev2">&gt;&gt; manager
</span><br>
<span class="quotelev2">&gt;&gt; - direct launch: the mpi tasks are launched directly from the
</span><br>
<span class="quotelev2">&gt;&gt; script/command line and no mpirun/orted is involved
</span><br>
<span class="quotelev2">&gt;&gt;  at that time, it works with SLURM and possibly other PMI capable batch
</span><br>
<span class="quotelev2">&gt;&gt; manager
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; i think OpenLava simply gets a list of hosts from the environment, build
</span><br>
<span class="quotelev2">&gt;&gt; a machinefile, pass it to mpirun that spawns orted with ssh, so this is
</span><br>
<span class="quotelev2">&gt;&gt; really loose integration.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; OpenMPI is based on plugins, so as long as the queing system provides an
</span><br>
<span class="quotelev2">&gt;&gt; API to start/stop/kill tasks, mpirun launch should not
</span><br>
<span class="quotelev2">&gt;&gt; be a huge effort.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Are you aware of such an API provided by OpenLava ?
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Cheers,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Gilles
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On 2014/11/18 16:31, Marc H&#195;&#182;ppner wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  Hi list,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I have recently started to wonder how hard it would be to add support for queuing systems to the tight integration function of OpenMPI (unfortunately, I am not a developer myself). Specifically, we are working with OpenLava (www.openlava.org), which is based on an early version of Lava/LSF and open source. It&#226;&#128;&#153;s proven quite useful in environments where some level of LSF compatibility is needed, but without actually paying for a (rather pricey) LSF license.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Given that openLava shares quite a bit of DNA with LSF, I was wondering how hard it would be to add OL tight integration support to OpenMPI. Currently, OL enables OpenMPI jobs through a wrapper script, but that&#226;&#128;&#153;s obviously not ideal and doesn&#226;&#128;&#153;t work for some programs that have MPI support built-in (and thus expect to be able to just execute mpirun).
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Any thoughts on this would be greatly appreciated!
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Regards,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Marc
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Marc P. Hoeppner, PhD
</span><br>
<span class="quotelev2">&gt;&gt; Team Leader
</span><br>
<span class="quotelev2">&gt;&gt; BILS Genome Annotation Platform
</span><br>
<span class="quotelev2">&gt;&gt; Department for Medical Biochemistry and Microbiology
</span><br>
<span class="quotelev2">&gt;&gt; Uppsala University, Swedenmarc.hoeppner_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing listdevel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16312.php">http://www.open-mpi.org/community/lists/devel/2014/11/16312.php</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing listdevel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16313.php">http://www.open-mpi.org/community/lists/devel/2014/11/16313.php</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing listdevel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16314.php">http://www.open-mpi.org/community/lists/devel/2014/11/16314.php</a>
</span><br>
<span class="quotelev2">&gt;&gt;
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
<span class="quotelev2">&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post:
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16315.php">http://www.open-mpi.org/community/lists/devel/2014/11/16315.php</a>
</span><br>
<span class="quotelev2">&gt;&gt;
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
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16316.php">http://www.open-mpi.org/community/lists/devel/2014/11/16316.php</a>
</span><br>
<span class="quotelev1">&gt;
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
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16317.php">http://www.open-mpi.org/community/lists/devel/2014/11/16317.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-16318/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16319.php">Marc H�ppner: "Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems"</a>
<li><strong>Previous message:</strong> <a href="16317.php">Marc H&#195;&#182;ppner: "Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems"</a>
<li><strong>In reply to:</strong> <a href="16317.php">Marc H&#195;&#182;ppner: "Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16319.php">Marc H�ppner: "Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems"</a>
<li><strong>Reply:</strong> <a href="16319.php">Marc H�ppner: "Re: [OMPI devel] Question about tight integration with not-yet-supported queuing systems"</a>
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
