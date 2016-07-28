<?
$subject_val = "Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Nov 25 19:19:50 2014" -->
<!-- isoreceived="20141126001950" -->
<!-- sent="Tue, 25 Nov 2014 16:19:47 -0800" -->
<!-- isosent="20141126001947" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0" -->
<!-- id="C49EF86E-38C2-4F6D-A84E-1FF0E1AB0871_at_open-mpi.org" -->
<!-- charset="windows-1252" -->
<!-- inreplyto="CAAvDA14jPgAG95oymh398L6d=PHYVX2qs=Ucw5kh6JOxz237iw_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-11-25 19:19:47
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16351.php">Paul Hargrove: "Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0"</a>
<li><strong>Previous message:</strong> <a href="16349.php">Paul Hargrove: "Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0"</a>
<li><strong>In reply to:</strong> <a href="16349.php">Paul Hargrove: "Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16351.php">Paul Hargrove: "Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0"</a>
<li><strong>Reply:</strong> <a href="16351.php">Paul Hargrove: "Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I&#146;ll have to look - there isn&#146;t supposed to be such a requirement, and I certainly haven&#146;t seen it before.
<br>
<p><p><span class="quotelev1">&gt; On Nov 25, 2014, at 3:26 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Allan,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I am glad things are working for you now.
</span><br>
<span class="quotelev1">&gt; I can confirm (on a QEMU-emulated Versatile Express A9 board running Ubuntu 14.04) that disabling the &quot;lo&quot; interface reproduces the problem.
</span><br>
<span class="quotelev1">&gt; I imagine this is true on other architectures, though I did not attempt to verify.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Ralph,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; If oob:tcp really does need the loopback interface, shouldn't its lack be something that could/should be detected and reported instead of hanging as Allan saw?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; FWIW, neither of the following resolved the problem:
</span><br>
<span class="quotelev1">&gt;     -mca oob_tcp_if_exclude lo
</span><br>
<span class="quotelev1">&gt;     -mca oob_tcp_if_include eth0
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Tue, Nov 25, 2014 at 2:58 PM, Allan Wu &lt;allwu_at_[hidden] &lt;mailto:allwu_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt; I think I have found the problem. After inspecting the output with &quot;-mca state_base_verbose 10 -mca odls_base_verbose 10 -mca oob_base_verbose 100&quot; on both the old system and the new system, I noticed there is one line that is different: on the old system where it works correctly, there is a line that says: &quot;oob:tcp:init rejecting loopback interface lo&quot;, while on the new system there is no such line. Both system proceed to open interface eth0 afterwards. Then I checked the new system, and found out that somehow the loopback interface is not up by default. After I opened the lo interface, the mpirun executes normally.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Does it means that OpenMPI will use lo for some initial setup? Since the actual socket was created on eth0 I did not think of checking the lo interface. Anyway, thanks everyone for all of your kind help. Let me know if you want me to provide any more information for future references. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Regards,
</span><br>
<span class="quotelev1">&gt; Allan
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Di Wu (Allan)
</span><br>
<span class="quotelev1">&gt; PhD student, VAST&#160;Laboratory &lt;<a href="http://vast.cs.ucla.edu/">http://vast.cs.ucla.edu/</a>&gt;,
</span><br>
<span class="quotelev1">&gt; Department of Computer Science, UC Los Angeles
</span><br>
<span class="quotelev1">&gt; Email: allwu_at_[hidden] &lt;mailto:allwu_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Tue, Nov 25, 2014 at 11:55 AM, Allan Wu &lt;allwu_at_[hidden] &lt;mailto:allwu_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt; Thanks Ralph!
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I did not compile my openmpi with --enable-debug, and I am compiling it now. But your suggested command already provided some output, which I attached with this email. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; It seems the process was stuck on the line:
</span><br>
<span class="quotelev1">&gt; &quot;[fpga2:00962] [[44848,1],0] waiting for connect completion to [[44848,0],0] - activating send event&quot;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Then it got stuck and I CTRL+C'ed it. Previous to that line, it said something about 'orte_tcp_peer_try_connect: attempting to connect to proc [[44848,0],0] via interface eth0'.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Regards,
</span><br>
<span class="quotelev1">&gt; Di
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Tue, Nov 25, 2014 at 2:25 PM, Ralph Castain &lt;rhc_at_[hidden] &lt;mailto:rhc_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt; This is all running on a single node, correct? If so, did you configure OMPI with &#226;&#128;&#148;enable-debug? 
</span><br>
<span class="quotelev1">&gt; If you can do that, or already have, then let&#226;&#128;&#153;s add the following to the mpirun cmd line: 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -mca state_base_verbose 10 -mca odls_base_verbose 10 -mca oob_base_verbose 10 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; You&#226;&#128;&#153;ll get a bunch of output, but hopefully it will tell us where mpirun is encountering a problem. 
</span><br>
<span class="quotelev1">&gt; Ralph 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Tue, Nov 25, 2014 at 11:20 AM, Paul Hargrove &lt;phhargrove_at_[hidden] &lt;mailto:phhargrove_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt; Allan,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; If you send me the .config from your build of the kernel I can compare it against, for instance, my .config for a Raspberry Pi.
</span><br>
<span class="quotelev1">&gt; There will certainly be many differences, but I am hoping my own experience configuring linux kernels will help me filter the &quot;noise&quot; from any differences that might be significant.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Tue, Nov 25, 2014 at 11:11 AM, Allan Wu &lt;allwu_at_[hidden] &lt;mailto:allwu_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt; Thanks Paul! Unfortunately '/boot' is not available in my embedded linux, and I do not have the configuration file for the old kernel since it is provided as is. However, I have the new kernel configuration since I compiled it myself. Would it be helpful if I provide you the .config file when I compile the kernel? It maybe quite painful to look through that file though. Is there any other way that I can obtain the configuration? 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I checked my config for the new kernel, and UNIX-domain sockets and Sys V IPC are both enabled in the build. Are there any other possibilities I can check?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Thanks,
</span><br>
<span class="quotelev1">&gt; Di
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Di Wu (Allan)
</span><br>
<span class="quotelev1">&gt; PhD student, VAST&#160;Laboratory &lt;<a href="http://vast.cs.ucla.edu/">http://vast.cs.ucla.edu/</a>&gt;,
</span><br>
<span class="quotelev1">&gt; Department of Computer Science, UC Los Angeles
</span><br>
<span class="quotelev1">&gt; Email: allwu_at_[hidden] &lt;mailto:allwu_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Tue, Nov 25, 2014 at 10:45 AM, Paul Hargrove &lt;phhargrove_at_[hidden] &lt;mailto:phhargrove_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt; Allan,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; A likely possibility is that some important kernel feature (that Open MPI assumes is present) is missing.
</span><br>
<span class="quotelev1">&gt; That includes not only &quot;kernel modules&quot; as you mention, but also features configure in (or out) of the base kernel.
</span><br>
<span class="quotelev1">&gt; For instance, some embedded kernels omit UNIX-domain sockets and SysV IPC support.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; If you can send me (preferably off-list) the kernel config files for the old an new kernels I may be able to spot something.
</span><br>
<span class="quotelev1">&gt; If present, you are looking for /boot/config-[VERSION]
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Tue, Nov 25, 2014 at 10:25 AM, Allan Wu &lt;allwu_at_[hidden] &lt;mailto:allwu_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt; I'm sorry I forgot to change the subject when I reply to the digest issue. Please find my original email below. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Regards,
</span><br>
<span class="quotelev1">&gt; Di
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Tue, Nov 25, 2014 at 10:19 AM, Allan Wu &lt;allwu_at_[hidden] &lt;mailto:allwu_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt; Thanks Ralph for the reply. Sorry about the log file, I think I forgot to put an extension to the file. Please find a new one attached with this email. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I'm sorry for not enough debugging information, but 'omp_info' and '--debug-devel' are the only ways I know for collecting information, are there any other things I can try to provide more info?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; When I execute 'mpirun --debug-devel -np 1 ./helloworld', all the output is the logging information in my last email. It got stuck at  &quot;[fpga1:00718] tmp: /tmp&quot;, and nothing from my helloworld program is printed out to the screen. So I think it is mpirun failing to start my executable, not failing to terminate.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I was wondering if this has anything to do with my newer kernel version, since it works well in the old case. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Thanks,
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Di Wu (Allan)
</span><br>
<span class="quotelev1">&gt; PhD student, VAST&#160;Laboratory &lt;<a href="http://vast.cs.ucla.edu/">http://vast.cs.ucla.edu/</a>&gt;,
</span><br>
<span class="quotelev1">&gt; Department of Computer Science, UC Los Angeles
</span><br>
<span class="quotelev1">&gt; Email: allwu_at_[hidden] &lt;mailto:allwu_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Date: Tue, 25 Nov 2014 07:29:51 -0800
</span><br>
<span class="quotelev1">&gt; From: Ralph Castain &lt;rhc_at_[hidden] &lt;mailto:rhc_at_[hidden]&gt;&gt;
</span><br>
<span class="quotelev1">&gt; To: Open MPI Developers &lt;devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt;&gt;
</span><br>
<span class="quotelev1">&gt; Subject: Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at
</span><br>
<span class="quotelev1">&gt;         execution       on an embedded ARM Linux kernel version 3.15.0
</span><br>
<span class="quotelev1">&gt; Message-ID: &lt;898CB117-F6A6-4569-89C3-49B75D65B314_at_[hidden] &lt;mailto:898CB117-F6A6-4569-89C3-49B75D65B314_at_[hidden]&gt;&gt;
</span><br>
<span class="quotelev1">&gt; Content-Type: text/plain; charset=&quot;utf-8&quot;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I don?t know what you put in that log file, but it was an executable and I?m not feeling that trusting :-)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I?m afraid there isn?t enough debug output there to really tell anything. From what little I can see, I?m guessing that the application ran fine and you got the usual ?hello? output and the helloworld process exited safely - is that correct? And so it is solely mpirun that is failing to cleanly terminate?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt; &gt; On Nov 24, 2014, at 11:24 PM, Allan Wu &lt;allwu_at_[hidden] &lt;mailto:allwu_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Hello everyone,
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; I have cross-compiled OpenMPI for an embedded ARM Linux. Everything works fine for my system based on Linux 3.8.0. I have previously submitted a post related to my compilation, which can be found here: <a href="http://www.open-mpi.org/community/lists/devel/2014/04/14440.php">http://www.open-mpi.org/community/lists/devel/2014/04/14440.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/04/14440.php">http://www.open-mpi.org/community/lists/devel/2014/04/14440.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/04/14440.php">http://www.open-mpi.org/community/lists/devel/2014/04/14440.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/04/14440.php">http://www.open-mpi.org/community/lists/devel/2014/04/14440.php</a>&gt;&gt;. When I recently upgraded my Linux kernel to 3.15.0, mpirun begins to stuck at even the helloworld program. The program consists only simple APIs: MPI_Init, MPI_Comm_size, MPI_Comm_rank, MPI_Finalize. The problem occurs even at 'mpirun -np 1 ./helloworld', and below are the output with --debug-devel (before it got stuck):
</span><br>
<span class="quotelev2">&gt; &gt; [fpga1:00716] sess_dir_finalize: job session dir not empty - leaving
</span><br>
<span class="quotelev2">&gt; &gt; [fpga1:00716] procdir: /tmp/openmpi-sessions-root_at_fpga1_0/63813/0/0
</span><br>
<span class="quotelev2">&gt; &gt; [fpga1:00716] jobdir: /tmp/openmpi-sessions-root_at_fpga1_0/63813/0
</span><br>
<span class="quotelev2">&gt; &gt; [fpga1:00716] top: openmpi-sessions-root_at_fpga1_0
</span><br>
<span class="quotelev2">&gt; &gt; [fpga1:00716] tmp: /tmp
</span><br>
<span class="quotelev2">&gt; &gt; [fpga1:00718] procdir: /tmp/openmpi-sessions-root_at_fpga1_0/63813/1/0
</span><br>
<span class="quotelev2">&gt; &gt; [fpga1:00718] jobdir: /tmp/openmpi-sessions-root_at_fpga1_0/63813/1
</span><br>
<span class="quotelev2">&gt; &gt; [fpga1:00718] top: openmpi-sessions-root_at_fpga1_0
</span><br>
<span class="quotelev2">&gt; &gt; [fpga1:00718] tmp: /tmp
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; I suspect maybe it is due to incompatible kernel version or some missing kernel modules. I tried also with the latest version 1.8.3, and had the same problem. Does anyone have any thoughts? I have attached the output of 'ompi-info --all' with this email.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Please let me know if I need to provide more information. Thanks in advance!
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Regards,
</span><br>
<span class="quotelev2">&gt; &gt; --
</span><br>
<span class="quotelev2">&gt; &gt; Di Wu (Allan)
</span><br>
<span class="quotelev2">&gt; &gt; PhD student, VAST?Laboratory &lt;<a href="http://vast.cs.ucla.edu/">http://vast.cs.ucla.edu/</a> &lt;<a href="http://vast.cs.ucla.edu/">http://vast.cs.ucla.edu/</a>&gt;&gt;,
</span><br>
<span class="quotelev2">&gt; &gt; Department of Computer Science, UC Los Angeles
</span><br>
<span class="quotelev2">&gt; &gt; Email: allwu_at_[hidden] &lt;mailto:allwu_at_[hidden]&gt; &lt;mailto:allwu_at_[hidden] &lt;mailto:allwu_at_[hidden]&gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &lt;log.tar.gz&gt;_______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt; &gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a> &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt;
</span><br>
<span class="quotelev2">&gt; &gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16330.php">http://www.open-mpi.org/community/lists/devel/2014/11/16330.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/11/16330.php">http://www.open-mpi.org/community/lists/devel/2014/11/16330.php</a>&gt;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a> &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt;
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16341.php">http://www.open-mpi.org/community/lists/devel/2014/11/16341.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/11/16341.php">http://www.open-mpi.org/community/lists/devel/2014/11/16341.php</a>&gt;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Paul H. Hargrove                          PHHargrove_at_[hidden] &lt;mailto:PHHargrove_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev1">&gt; Computer Science Department               Tel: +1-510-495-2352 &lt;tel:%2B1-510-495-2352&gt;
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900 &lt;tel:%2B1-510-486-6900&gt;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Paul H. Hargrove                          PHHargrove_at_[hidden] &lt;mailto:PHHargrove_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev1">&gt; Computer Science Department               Tel: +1-510-495-2352 &lt;tel:%2B1-510-495-2352&gt;
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900 &lt;tel:%2B1-510-486-6900&gt;
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
<span class="quotelev1">&gt; devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a> &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt;
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16348.php">http://www.open-mpi.org/community/lists/devel/2014/11/16348.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/11/16348.php">http://www.open-mpi.org/community/lists/devel/2014/11/16348.php</a>&gt;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Paul H. Hargrove                          PHHargrove_at_[hidden] &lt;mailto:PHHargrove_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev1">&gt; Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16349.php">http://www.open-mpi.org/community/lists/devel/2014/11/16349.php</a>
</span><br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-16350/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16351.php">Paul Hargrove: "Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0"</a>
<li><strong>Previous message:</strong> <a href="16349.php">Paul Hargrove: "Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0"</a>
<li><strong>In reply to:</strong> <a href="16349.php">Paul Hargrove: "Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16351.php">Paul Hargrove: "Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0"</a>
<li><strong>Reply:</strong> <a href="16351.php">Paul Hargrove: "Re: [OMPI devel] OpenMPI v1.8 and v1.8.3 mpirun hangs at execution on an embedded ARM Linux kernel version 3.15.0"</a>
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
