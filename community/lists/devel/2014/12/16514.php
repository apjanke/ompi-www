<?
$subject_val = "[OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Dec 11 18:08:25 2014" -->
<!-- isoreceived="20141211230825" -->
<!-- sent="Thu, 11 Dec 2014 15:08:00 -0800" -->
<!-- isosent="20141211230800" -->
<!-- name="Paul Hargrove" -->
<!-- email="phhargrove_at_[hidden]" -->
<!-- subject="[OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64" -->
<!-- id="CAAvDA15Qy_2io0s_=1Reowj7T2=482jm+a93toa=q6Ayi90edA_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
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
<strong>Subject:</strong> [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64<br>
<strong>From:</strong> Paul Hargrove (<em>phhargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-12-11 18:08:00
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16515.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<li><strong>Previous message:</strong> <a href="16513.php">Larry Baker: "Re: [OMPI devel] still supporting pgi?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16515.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<li><strong>Reply:</strong> <a href="16515.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Testing the 1.8.4rc2 tarball on my x86-64 Solaris-11 systems I am getting
<br>
the following crash for both &quot;-m32&quot; and &quot;-m64&quot; builds:
<br>
<p>$ mpirun -mca btl sm,self,openib -np 2 -host pcp-j-19,pcp-j-20
<br>
examples/ring_c'
<br>
[pcp-j-19:18762] *** Process received signal ***
<br>
[pcp-j-19:18762] Signal: Segmentation Fault (11)
<br>
[pcp-j-19:18762] Signal code: Address not mapped (1)
<br>
[pcp-j-19:18762] Failing at address: 0
<br>
/shared/OMPI/openmpi-1.8.4rc2-solaris11-x64-ib-gcc452/INST/lib/libopen-pal.so.6.2.1'opal_backtrace_print+0x26
<br>
[0xfffffd7ffaf237ba]
<br>
/shared/OMPI/openmpi-1.8.4rc2-solaris11-x64-ib-gcc452/INST/lib/libopen-pal.so.6.2.1'show_stackframe+0x833
<br>
[0xfffffd7ffaf20ba1]
<br>
/lib/amd64/libc.so.1'__sighndlr+0x6 [0xfffffd7fff202cc6]
<br>
/lib/amd64/libc.so.1'call_user_handler+0x2aa [0xfffffd7fff1f648e]
<br>
/lib/amd64/libc.so.1'strcmp+0x1a [0xfffffd7fff170fda] [Signal 11 (SEGV)]
<br>
/shared/OMPI/openmpi-1.8.4rc2-solaris11-x64-ib-gcc452/INST/bin/orted'main+0x90
<br>
[0x4010b7]
<br>
/shared/OMPI/openmpi-1.8.4rc2-solaris11-x64-ib-gcc452/INST/bin/orted'_start+0x6c
<br>
[0x400f2c]
<br>
[pcp-j-19:18762] *** End of error message ***
<br>
bash: line 1: 18762 Segmentation Fault      (core dumped)
<br>
/shared/OMPI/openmpi-1.8.4rc2-solaris11-x64-ib-gcc452/INST/bin/orted -mca
<br>
ess &quot;env&quot; -mca orte_ess_jobid &quot;911343616&quot; -mca orte_ess_vpid 1 -mca
<br>
orte_ess_num_procs &quot;2&quot; -mca orte_hnp_uri &quot;911343616.0;tcp://172.16.0.120,
<br>
172.18.0.120:50362&quot; --tree-spawn -mca btl &quot;sm,self,openib&quot; -mca plm &quot;rsh&quot;
<br>
-mca shmem_mmap_enable_nfs_warning &quot;0&quot;
<br>
<p>Running gdb against a core generated by the 32-bit build gives line numbers:
<br>
#0  0xfea1cb45 in strcmp () from /lib/libc.so.1
<br>
#1  0xfeef4900 in orte_daemon (argc=26, argv=0x80479b0)
<br>
&nbsp;&nbsp;&nbsp;&nbsp;at
<br>
/shared/OMPI/openmpi-1.8.4rc2-solaris11-x86-ib-gcc452/openmpi-1.8.4rc2/orte/orted/orted_main.c:789
<br>
#2  0x08050fb1 in main (argc=26, argv=0x80479b0)
<br>
&nbsp;&nbsp;&nbsp;&nbsp;at
<br>
/shared/OMPI/openmpi-1.8.4rc2-solaris11-x86-ib-gcc452/openmpi-1.8.4rc2/orte/tools/orted/orted.c:62
<br>
<p>-Paul
<br>
<p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Computer Languages &amp; Systems Software (CLaSS) Group
Computer Science Department               Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-16514/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16515.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<li><strong>Previous message:</strong> <a href="16513.php">Larry Baker: "Re: [OMPI devel] still supporting pgi?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16515.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<li><strong>Reply:</strong> <a href="16515.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
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
