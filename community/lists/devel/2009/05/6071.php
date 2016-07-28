<?
$subject_val = "Re: [OMPI devel] ompi-ps broken or just changed?";
include("../../include/msg-header.inc");
?>
<!-- received="Tue May 19 09:06:30 2009" -->
<!-- isoreceived="20090519130630" -->
<!-- sent="Tue, 19 May 2009 14:07:33 +0100" -->
<!-- isosent="20090519130733" -->
<!-- name="Ashley Pittman" -->
<!-- email="ashley_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] ompi-ps broken or just changed?" -->
<!-- id="1242738453.26039.426.camel_at_localhost.localdomain" -->
<!-- inreplyto="1242662788.4444.48.camel_at_localhost.localdomain" -->
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
<strong>Subject:</strong> Re: [OMPI devel] ompi-ps broken or just changed?<br>
<strong>From:</strong> Ashley Pittman (<em>ashley_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-05-19 09:07:33
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="6072.php">Jeff Squyres: "Re: [OMPI devel] possible bug in 1.3.2 sm transport"</a>
<li><strong>Previous message:</strong> <a href="6070.php">Bryan Lally: "Re: [OMPI devel] possible bug in 1.3.2 sm transport"</a>
<li><strong>In reply to:</strong> <a href="6065.php">Ashley Pittman: "Re: [OMPI devel] ompi-ps broken or just changed?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6081.php">Ralph Castain: "Re: [OMPI devel] ompi-ps broken or just changed?"</a>
<li><strong>Reply:</strong> <a href="6081.php">Ralph Castain: "Re: [OMPI devel] ompi-ps broken or just changed?"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Ralph,
<br>
<p>At least part of them problem is to do with error reporting, orte-ps is
<br>
hitting the error case for a stale hnp at around line 258 and is trying
<br>
to report the error via orte_show_help() however this function is
<br>
calling a rpc into the orted-run which is silently ignoring it for some
<br>
reason.
<br>
<p>The failure itself seems to come from a timeout in comm.c:1114 where the
<br>
client process isn't waiting long enough for the orted-run to reply and
<br>
is returning ORTE_ERR_SILENT instead.  I can't think what to suggest
<br>
here other than increasing the timeout?
<br>
<p>Ashley,
<br>
<p>On Mon, 2009-05-18 at 17:06 +0100, Ashley Pittman wrote:
<br>
<span class="quotelev1">&gt; It's certainly helped and now runs for me however if I run mpirun under
</span><br>
<span class="quotelev1">&gt; valgrind and then opmi-ps in another window Valgrind reports errors and
</span><br>
<span class="quotelev1">&gt; ompi-ps doesn't list the job so there is clearly something still amiss.
</span><br>
<span class="quotelev1">&gt; I'm trying to do some more diagnostics now.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; ==32362== Syscall param writev(vector[...]) points to uninitialised
</span><br>
<span class="quotelev1">&gt; byte(s)
</span><br>
<span class="quotelev1">&gt; ==32362==    at 0x41BF10C: writev (writev.c:46)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4EAAD52: mca_oob_tcp_msg_send_handler
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/openmpi/mca_oob_tcp.so)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4EAC505: mca_oob_tcp_peer_send
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/openmpi/mca_oob_tcp.so)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4EAEF89: mca_oob_tcp_send_nb
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/openmpi/mca_oob_tcp.so)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4EA20BE: orte_rml_oob_send
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/openmpi/mca_rml_oob.so)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4EA2359: orte_rml_oob_send_buffer
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/openmpi/mca_rml_oob.so)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4050738: process_commands
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-rte.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x405108C: orte_daemon_cmd_processor
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-rte.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4260B57: opal_event_base_loop
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-pal.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4260DF6: opal_event_loop
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-pal.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4260E1D: opal_event_dispatch
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-pal.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x804B15F: orterun (orterun.c:757)
</span><br>
<span class="quotelev1">&gt; ==32362==  Address 0x448507c is 20 bytes inside a block of size 512
</span><br>
<span class="quotelev1">&gt; alloc'd
</span><br>
<span class="quotelev1">&gt; ==32362==    at 0x402613C: realloc (vg_replace_malloc.c:429)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x42556B7: opal_dss_buffer_extend
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-pal.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4256C4F: opal_dss_pack_int32
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-pal.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x42565C9: opal_dss_pack_buffer
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-pal.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x403A60D: orte_dt_pack_job
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-rte.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x42565C9: opal_dss_pack_buffer
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-pal.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4256FFB: opal_dss_pack
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-pal.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x40506F7: process_commands
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-rte.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x405108C: orte_daemon_cmd_processor
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-rte.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4260B57: opal_event_base_loop
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-pal.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4260DF6: opal_event_loop
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-pal.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; ==32362==    by 0x4260E1D: opal_event_dispatch
</span><br>
<span class="quotelev1">&gt; (in /mnt/home/debian/ashley/code/OpenMPI/install/lib/libopen-pal.so.0.0.0)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Mon, 2009-05-18 at 08:22 -0600, Ralph Castain wrote:
</span><br>
<span class="quotelev2">&gt; &gt; Aha! Thanks for spotting the problem - I had to move that var init to  
</span><br>
<span class="quotelev2">&gt; &gt; cover all cases, but it should be working now with r21249
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; On May 18, 2009, at 8:08 AM, Ashley Pittman wrote:
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; Ralph,
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; This patch fixed it, num_nodes was being used initialised and hence  
</span><br>
<span class="quotelev3">&gt; &gt; &gt; the
</span><br>
<span class="quotelev3">&gt; &gt; &gt; client was getting a bogus value for the number of nodes.
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; Ashley,
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; On Mon, 2009-05-18 at 10:09 +0100, Ashley Pittman wrote:
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; No joy I'm afraid,  now I get errors when I run it.  This is a single
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; node job run with the command line &quot;mpirun -n 3 ./a.out&quot;.  I've  
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; attached
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; the strace output and gzipped /tmp files from the machine.   
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; Valgrind on
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; the opmi-ps process doesn't show anything interesting.
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; [alpha:29942] [[35044,0],0] ORTE_ERROR_LOG: Data unpack would read  
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; past
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; end of buffer in
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; file /mnt/home/debian/ashley/code/OpenMPI/ompi-trunk-tes/trunk/orte/ 
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; util/comm/comm.c at line 242
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; [alpha:29942] [[35044,0],0] ORTE_ERROR_LOG: Data unpack would read  
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; past
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; end of buffer in
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; file /mnt/home/debian/ashley/code/OpenMPI/ompi-trunk-tes/trunk/orte/ 
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; tools/orte-ps/orte-ps.c at line 818
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; Ashley.
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; On Sat, 2009-05-16 at 08:15 -0600, Ralph Castain wrote:
</span><br>
<span class="quotelev1">&gt; &gt; &gt;&gt;&gt; This is fixed now, Ashley - sorry for the problem.
</span><br>
<span class="quotelev1">&gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt;&gt;&gt; On May 15, 2009, at 4:47 AM, Ashley Pittman wrote:
</span><br>
<span class="quotelev1">&gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; On Thu, 2009-05-14 at 22:49 -0600, Ralph Castain wrote:
</span><br>
<span class="quotelev3">&gt; &gt; &gt;&gt;&gt;&gt;&gt; It is definitely broken at the moment, Ashley. I have it pretty  
</span><br>
<span class="quotelev3">&gt; &gt; &gt;&gt;&gt;&gt;&gt; well
</span><br>
<span class="quotelev3">&gt; &gt; &gt;&gt;&gt;&gt;&gt; fixed, but need/want to cleanup some corner cases that have  
</span><br>
<span class="quotelev3">&gt; &gt; &gt;&gt;&gt;&gt;&gt; plagued
</span><br>
<span class="quotelev3">&gt; &gt; &gt;&gt;&gt;&gt;&gt; us
</span><br>
<span class="quotelev3">&gt; &gt; &gt;&gt;&gt;&gt;&gt; for a long time.
</span><br>
<span class="quotelev3">&gt; &gt; &gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt;&gt;&gt;&gt;&gt; Should have it for you sometime Friday.
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; Ok, thanks.  I might try switching to slurm in the mean-time, I  
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; know
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; my
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; code works with that.
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; Can you let me know when it's fixed on or off list and I'll do an
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; update.
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; Ashley,
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; &gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; &gt; &gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; &gt; &gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; &gt; &gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt; &gt; &gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &lt;ompi-ps.patch&gt;_______________________________________________
</span><br>
<span class="quotelev3">&gt; &gt; &gt; devel mailing list
</span><br>
<span class="quotelev3">&gt; &gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="6072.php">Jeff Squyres: "Re: [OMPI devel] possible bug in 1.3.2 sm transport"</a>
<li><strong>Previous message:</strong> <a href="6070.php">Bryan Lally: "Re: [OMPI devel] possible bug in 1.3.2 sm transport"</a>
<li><strong>In reply to:</strong> <a href="6065.php">Ashley Pittman: "Re: [OMPI devel] ompi-ps broken or just changed?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6081.php">Ralph Castain: "Re: [OMPI devel] ompi-ps broken or just changed?"</a>
<li><strong>Reply:</strong> <a href="6081.php">Ralph Castain: "Re: [OMPI devel] ompi-ps broken or just changed?"</a>
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
