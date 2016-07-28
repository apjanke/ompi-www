<?
$subject_val = "Re: [OMPI devel] OMPI 1.3 - PERUSE peruse_comm_spec_t peer Negative	Value";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Mar 25 16:50:56 2009" -->
<!-- isoreceived="20090325205056" -->
<!-- sent="Wed, 25 Mar 2009 14:50:42 -0600 (MDT)" -->
<!-- isosent="20090325205042" -->
<!-- name="Samuel K. Gutierrez" -->
<!-- email="samuel_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] OMPI 1.3 - PERUSE peruse_comm_spec_t peer Negative	Value" -->
<!-- id="56149.128.165.0.81.1238014242.squirrel_at_webmail.lanl.gov" -->
<!-- charset="iso-8859-1" -->
<!-- inreplyto="1238002161.13040.80.camel_at_hp-laptop" -->
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
<strong>Subject:</strong> Re: [OMPI devel] OMPI 1.3 - PERUSE peruse_comm_spec_t peer Negative	Value<br>
<strong>From:</strong> Samuel K. Gutierrez (<em>samuel_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-03-25 16:50:42
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5703.php">George Bosilca: "Re: [OMPI devel] OMPI 1.3 - PERUSE peruse_comm_spec_t peer Negative	Value"</a>
<li><strong>Previous message:</strong> <a href="5701.php">George Bosilca: "Re: [OMPI devel] OMPI 1.3 - PERUSE peruse_comm_spec_t peer Negative	Value"</a>
<li><strong>In reply to:</strong> <a href="5700.php">Kiril Dichev: "Re: [OMPI devel] OMPI 1.3 - PERUSE peruse_comm_spec_t peer	Negative	Value"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5703.php">George Bosilca: "Re: [OMPI devel] OMPI 1.3 - PERUSE peruse_comm_spec_t peer Negative	Value"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Hi All,
<br>
<p>George - I really appreciate the quick response.
<br>
<p><span class="quotelev1">&gt; Hi,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; at least for the specific test program I used, the negative values for
</span><br>
the peer attribute disappeared after George's modifications in 20844.
<br>
<p>Same here for my profiling library - tested with openmpi-1.3.2a1r20855.
<br>
<p><span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; One remark: after installation, I had to remove the '#include
</span><br>
<span class="quotelev1">&gt; &quot;ompi_config.h&quot;' line  in the &quot;include/peruse.h&quot; header to get PERUSE
</span><br>
applications to compile. Otherwise I got a missing header error message
<br>
for ompi_config.h.
<br>
<p>I did not experience this - no modifications were needed on my end.  That
<br>
being said, my peruse.h does not include ompi_config.h, only mpi.h.
<br>
<p>Thanks again,
<br>
<p>Samuel K. Gutierrez
<br>
<p><span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Regards,
</span><br>
<span class="quotelev1">&gt; Kiril
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Mon, 2009-03-23 at 16:34 -0400, George Bosilca wrote:
</span><br>
<span class="quotelev2">&gt;&gt; You are absolutely right, the peer should never be set to -1 on any of
</span><br>
the PERUSE callbacks. I checked the code this morning and figure out
<br>
what was the problem. We report the peer and the tag attached to a
<br>
request before setting the right values (some code moved around). I
<br>
submitted a patch and created a &quot;move request&quot; to have this correction
<br>
as soon as possible on one of our stable releases. The move request can
<br>
be followed using our TRAC system and the following link
<br>
<span class="quotelev2">&gt;&gt; (<a href="https://svn.open-mpi.org/trac/ompi/ticket/1845">https://svn.open-mpi.org/trac/ompi/ticket/1845</a>
</span><br>
<span class="quotelev2">&gt;&gt; ). If you want to play with this change please update your Open MPI
</span><br>
installation to a nightly build or a fresh checkout from the SVN with
<br>
at least revision 20844 (a nightly including this change will be posted
<br>
on our website tomorrow morning).
<br>
<span class="quotelev2">&gt;&gt;    Thanks,
</span><br>
<span class="quotelev2">&gt;&gt;      george.
</span><br>
<span class="quotelev2">&gt;&gt; On Mar 23, 2009, at 13:23 , Samuel K. Gutierrez wrote:
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Hi Kiril,
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Appreciate the quick response.
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; Hi Samuel,
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; On Sat, 21 Mar 2009 18:18:54 -0600 (MDT)
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;  &quot;Samuel K. Gutierrez&quot; &lt;samuel_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; Hi All,
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; I'm writing a simple profiling library which utilizes
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; PERUSE.  My callback
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; So am I :)
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; function counts communication events (see example code
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; below).  I noticed
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; that in OMPI v1.3 spec-&gt;peer is sometimes a negative
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; value (OMPI v1.2.6
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; did not exhibit this behavior).  I added some boundary
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; checks, but it
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; seems as if this is a bug?  I hope I'm not missing
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; something...
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; It took me quite some time to reproduce the error - I also
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Sorry about that - I should have provided more information.
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; got peer value &quot;-1&quot; for the Peruse peruse_comm_spec_t
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; struct. I only managed to reproduce this with
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; communication of a process with itself, which is an
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; unusual scenario. Anyway, for all the tests I did, the
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; error happened only when:
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; -a process communicates with itself
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; -the MPI receive call is made
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; -the Peruse event &quot;PERUSE_COMM_MSG_REMOVE_FROM_UNEX_Q&quot; is
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; triggered
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; That's interesting... Nice work!
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; The file ompi/mca/pml/ob1/pml_ob1_recvreq.c seems to be
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; the place where the above event is called with a wrong
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; value of the peer attribute.
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; I will let you know if I find something.
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; I will also take a look.
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; Best regards,
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; Kiril
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; The peruse test provided in the OMPI v1.3 source
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; exhibits similar behavior:
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; mpirun -np 2 ./mpi_peruse | grep peer:-1
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; int callback(peruse_event_h event_h, MPI_Aint unique_id,
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; peruse_comm_spec_t *spec, void *param) {
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;   if (spec-&gt;peer == rank) {
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;       return MPI_SUCCESS;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;   }
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;   rrCounts[spec-&gt;peer]++;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;   return MPI_SUCCESS;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; }
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; Any insight is greatly appreciated.
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; Thanks,
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; Samuel K. Gutierrez
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Appreciate the help,
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Samuel K. Gutierrez
</span><br>
<span class="quotelev3">&gt;&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt; &gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5703.php">George Bosilca: "Re: [OMPI devel] OMPI 1.3 - PERUSE peruse_comm_spec_t peer Negative	Value"</a>
<li><strong>Previous message:</strong> <a href="5701.php">George Bosilca: "Re: [OMPI devel] OMPI 1.3 - PERUSE peruse_comm_spec_t peer Negative	Value"</a>
<li><strong>In reply to:</strong> <a href="5700.php">Kiril Dichev: "Re: [OMPI devel] OMPI 1.3 - PERUSE peruse_comm_spec_t peer	Negative	Value"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5703.php">George Bosilca: "Re: [OMPI devel] OMPI 1.3 - PERUSE peruse_comm_spec_t peer Negative	Value"</a>
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
