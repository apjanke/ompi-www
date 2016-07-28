<?
$subject_val = "Re: [OMPI devel] How to disable paffinity";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Jul  1 23:32:13 2010" -->
<!-- isoreceived="20100702033213" -->
<!-- sent="Fri, 2 Jul 2010 11:32:04 +0800" -->
<!-- isosent="20100702033204" -->
<!-- name="&#213;&#197;&#190;&#167;" -->
<!-- email="iam.chilli_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] How to disable paffinity" -->
<!-- id="AANLkTim5s731kb_ZIlb2M7fTufHETzKVHNB7eJvxYvGt_at_mail.gmail.com" -->
<!-- charset="GB2312" -->
<!-- inreplyto="EA3D014B-689B-4DBC-9E0B-1A5906313C51_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] How to disable paffinity<br>
<strong>From:</strong> &#213;&#197;&#190;&#167; (<em>iam.chilli_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-07-01 23:32:04
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8135.php">Ralph Castain: "Re: [OMPI devel] How to disable paffinity"</a>
<li><strong>Previous message:</strong> <a href="8133.php">Christopher Samuel: "Re: [OMPI devel] v1.5: thumbs up or down?"</a>
<li><strong>In reply to:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2010/06/8124.php">Ralph Castain: "Re: [OMPI devel] How to disable paffinity"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8135.php">Ralph Castain: "Re: [OMPI devel] How to disable paffinity"</a>
<li><strong>Reply:</strong> <a href="8135.php">Ralph Castain: "Re: [OMPI devel] How to disable paffinity"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Hi Ralph,
<br>
<p>I just copy your code in the trunk ,it seems working well. But the
<br>
&quot;mpirun ls &quot; still stuck at the orte_plm_select ,after using ompi_info
<br>
,there is no available component for plm. I think my configure option
<br>
is not the problem, for I use the same configure option to build the
<br>
program under the linux ,the rsh &amp; slurm component are both available
<br>
. Maybe it is a problem of my enviroment , but I really don't know how
<br>
to find the condition to include rsh component.
<br>
<p>2010/6/30 Ralph Castain &lt;rhc_at_[hidden]&gt;:
<br>
<span class="quotelev1">&gt; You may be working off of an old version of OMPI - I updated opal_paffinity awhile ago to no longer require that a component be selected. Then you can no-build all paffinity components if you like and the system will still startup okay.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I don't believe this was moved over to the 1.4 release branch - afraid you would have to use a developer's trunk tarball or svn checkout. It -might- be in the 1.5.0 release candidates, though (I haven't looked).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Jun 29, 2010, at 9:36 PM, &#213;&#197;&#190;&#167; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Hi all ,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I tried to run the openmpi on vxworks. Now I can run program ompi_info
</span><br>
<span class="quotelev2">&gt;&gt; etc. But it failed running &quot;mpirun ls&quot;,  the error is :
</span><br>
<span class="quotelev2">&gt;&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev2">&gt;&gt; It looks like opal_init failed for some reason; your parallel process is
</span><br>
<span class="quotelev2">&gt;&gt; likely to abort.  There are many reasons that a parallel process can
</span><br>
<span class="quotelev2">&gt;&gt; fail during opal_init; some of which are due to configuration or
</span><br>
<span class="quotelev2">&gt;&gt; environment problems.  This failure appears to be an internal failure;
</span><br>
<span class="quotelev2">&gt;&gt; here's some additional information (which may only be relevant to an
</span><br>
<span class="quotelev2">&gt;&gt; Open MPI developer):
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  opal_paffinity_base_select failed
</span><br>
<span class="quotelev2">&gt;&gt;  --&gt; Returned value -13 instead of OPAL_SUCCESS
</span><br>
<span class="quotelev2">&gt;&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; After using the ompi_info , I cann't find any available component for
</span><br>
<span class="quotelev2">&gt;&gt; paffinity. It seems the linux component of paffinity  isn't  available
</span><br>
<span class="quotelev2">&gt;&gt; . As the paffinity is not a must in openmpi . I wonder whether I can
</span><br>
<span class="quotelev2">&gt;&gt; disable the paffinity during the running of mpirun?
</span><br>
<span class="quotelev2">&gt;&gt; --
</span><br>
<span class="quotelev2">&gt;&gt; Jing Zhang
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
<p><p><p><pre>
-- 
&#213;&#197;&#190;&#167;
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8135.php">Ralph Castain: "Re: [OMPI devel] How to disable paffinity"</a>
<li><strong>Previous message:</strong> <a href="8133.php">Christopher Samuel: "Re: [OMPI devel] v1.5: thumbs up or down?"</a>
<li><strong>In reply to:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2010/06/8124.php">Ralph Castain: "Re: [OMPI devel] How to disable paffinity"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8135.php">Ralph Castain: "Re: [OMPI devel] How to disable paffinity"</a>
<li><strong>Reply:</strong> <a href="8135.php">Ralph Castain: "Re: [OMPI devel] How to disable paffinity"</a>
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
