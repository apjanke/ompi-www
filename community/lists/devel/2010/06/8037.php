<?
$subject_val = "Re: [OMPI devel] RFC: System V Shared Memory for Open MPI";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Jun  2 13:07:42 2010" -->
<!-- isoreceived="20100602170742" -->
<!-- sent="Wed, 2 Jun 2010 11:07:38 -0600" -->
<!-- isosent="20100602170738" -->
<!-- name="Samuel K. Gutierrez" -->
<!-- email="samuel_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: System V Shared Memory for Open MPI" -->
<!-- id="B87EF9B1-5162-4CD8-A695-2933E88CBE8C_at_lanl.gov" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="05F1E7FC-36E3-4A71-9B2C-7AB7FA2666D0_at_eecs.utk.edu" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: System V Shared Memory for Open MPI<br>
<strong>From:</strong> Samuel K. Gutierrez (<em>samuel_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-06-02 13:07:38
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8038.php">Jeff Squyres: "Re: [OMPI devel] BTL add procs errors"</a>
<li><strong>Previous message:</strong> <a href="8036.php">George Bosilca: "Re: [OMPI devel] RFC: System V Shared Memory for Open MPI"</a>
<li><strong>In reply to:</strong> <a href="8036.php">George Bosilca: "Re: [OMPI devel] RFC: System V Shared Memory for Open MPI"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8040.php">Jeff Squyres: "Re: [OMPI devel] RFC: System V Shared Memory for Open MPI"</a>
<li><strong>Reply:</strong> <a href="8040.php">Jeff Squyres: "Re: [OMPI devel] RFC: System V Shared Memory for Open MPI"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Hi George,
<br>
<p>That may work - I'll try it.
<br>
<p>Thanks!
<br>
<p><pre>
--
Samuel K. Gutierrez
Los Alamos National Laboratory
On Jun 2, 2010, at 10:59 AM, George Bosilca wrote:
&gt; How about ftok ? The init function takes a file_name as argument,  
&gt; and this file name is unique per instance of the shared memory  
&gt; region we want to create. We can use this file name with ftok to  
&gt; create a unique key_t that can be used by shmget to retrieve the  
&gt; shared memory identifier.
&gt;
&gt;  george.
&gt;
&gt; On Jun 2, 2010, at 11:53 , Samuel K. Gutierrez wrote:
&gt;
&gt;&gt; On Jun 2, 2010, at 8:49 AM, Jeff Squyres wrote:
&gt;&gt;
&gt;&gt;&gt; On Jun 2, 2010, at 10:44 AM, George Bosilca wrote:
&gt;&gt;&gt;
&gt;&gt;&gt;&gt;&gt; Not sure what you mean here.  common/sm may create new shmem  
&gt;&gt;&gt;&gt;&gt; segments at any time (e.g., during coll sm).  The RML message  
&gt;&gt;&gt;&gt;&gt; exchange is to ensure that only 1 process creates and  
&gt;&gt;&gt;&gt;&gt; initializes the segment and then all the others just attach to it.
&gt;&gt;&gt;&gt;
&gt;&gt;&gt;&gt; Absolutely not! The RML messaging is not about initializing the  
&gt;&gt;&gt;&gt; shared memory segment. As stated on my original text it has only  
&gt;&gt;&gt;&gt; one purpose: to ensure the file used by mmap is created  
&gt;&gt;&gt;&gt; atomically. The code for Windows do not exchange any RML messages  
&gt;&gt;&gt;&gt; as the function to allocate the shared memory region provided by  
&gt;&gt;&gt;&gt; the OS is atomic (exactly as the sysv one).
&gt;&gt;&gt;
&gt;&gt;&gt; I thought that Sam said that it was important that only 1 process  
&gt;&gt;&gt; shmctl/IPC_RMID...?
&gt;&gt;
&gt;&gt; Hi George,
&gt;&gt;
&gt;&gt; We are using RML messaging in the sysv code to exchange the shared  
&gt;&gt; memory ID (generated by exactly one process).  I'm not sure how we  
&gt;&gt; would go about passing along the shared memory ID without RML, but  
&gt;&gt; any ideas are greatly appreciated.
&gt;&gt;
&gt;&gt; Thanks,
&gt;&gt; --
&gt;&gt; Samuel K. Gutierrez
&gt;&gt; Los Alamos National Laboratory
&gt;&gt;
&gt;&gt;&gt;
&gt;&gt;&gt; -- 
&gt;&gt;&gt; Jeff Squyres
&gt;&gt;&gt; jsquyres_at_[hidden]
&gt;&gt;&gt; For corporate legal information go to:
&gt;&gt;&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
&gt;&gt;&gt;
&gt;&gt;&gt;
&gt;&gt;&gt; _______________________________________________
&gt;&gt;&gt; devel mailing list
&gt;&gt;&gt; devel_at_[hidden]
&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
&gt;&gt;
&gt;&gt; _______________________________________________
&gt;&gt; devel mailing list
&gt;&gt; devel_at_[hidden]
&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
&gt;
&gt;
&gt; _______________________________________________
&gt; devel mailing list
&gt; devel_at_[hidden]
&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8038.php">Jeff Squyres: "Re: [OMPI devel] BTL add procs errors"</a>
<li><strong>Previous message:</strong> <a href="8036.php">George Bosilca: "Re: [OMPI devel] RFC: System V Shared Memory for Open MPI"</a>
<li><strong>In reply to:</strong> <a href="8036.php">George Bosilca: "Re: [OMPI devel] RFC: System V Shared Memory for Open MPI"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8040.php">Jeff Squyres: "Re: [OMPI devel] RFC: System V Shared Memory for Open MPI"</a>
<li><strong>Reply:</strong> <a href="8040.php">Jeff Squyres: "Re: [OMPI devel] RFC: System V Shared Memory for Open MPI"</a>
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
