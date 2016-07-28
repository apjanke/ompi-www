<?
$subject_val = "Re: [OMPI devel] RFC: make hwloc first-class data";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Sep 23 12:38:41 2010" -->
<!-- isoreceived="20100923163841" -->
<!-- sent="Thu, 23 Sep 2010 12:38:36 -0400" -->
<!-- isosent="20100923163836" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: make hwloc first-class data" -->
<!-- id="CEF5F7F6-7CEB-4F1C-B06F-4C7784AA732E_at_eecs.utk.edu" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="75ECA605-D9FB-4549-8A91-A7E9F388A9EF_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: make hwloc first-class data<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-09-23 12:38:36
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8537.php">Jeff Squyres: "Re: [OMPI devel] RFC: make hwloc first-class data"</a>
<li><strong>Previous message:</strong> <a href="8535.php">Barrett, Brian W: "Re: [OMPI devel] RFC: make hwloc first-class data"</a>
<li><strong>In reply to:</strong> <a href="8532.php">Jeff Squyres: "[OMPI devel] RFC: make hwloc first-class data"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8550.php">Kenneth Lloyd: "Re: [OMPI devel] RFC: make hwloc first-class data"</a>
<li><strong>Reply:</strong> <a href="8550.php">Kenneth Lloyd: "Re: [OMPI devel] RFC: make hwloc first-class data"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
On Sep 22, 2010, at 21:08 , Jeff Squyres wrote:
<br>
<p><span class="quotelev1">&gt; WHAT: Make hwloc a 1st class item in OMPI
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; WHY: At least 2 pieces of new functionality want/need to use the hwloc data
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; WHERE: Put it in ompi/hwloc
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; WHEN: Some time in the 1.5 series
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; TIMEOUT: Tues teleconf, Oct 5 (about 2 weeks from now)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; --------------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; A long time ago, I floated the proposal of putting hwloc at the top level in opal so that parts of OPAL/ORTE/OMPI could use the data directly.  I didn't have any concrete suggestions at the time about what exactly would use the hwloc data -- just a feeling that &quot;someone&quot; would want to.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; There are now two solid examples of functionality that want to use hwloc data directly:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 1. Sandia + ORNL are working on a proposal for MPI_COMM_SOCKET, MPI_COMM_NUMA_NODE, MPI_COMM_CORE, ...etc. (those names may not be the right ones, but you get the idea).  That is, pre-defined communicators that contain all the MPI procs on the same socket as you, the same NUMA node as you, the same core as you, ...etc.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 2. INRIA presented a paper at Euro MPI last week that takes process distance to NICs into account when coming up with the long-message splitting ratio for the PML.  E.g., if we have 2 openib NICs with the same bandwidth, don't just assume that we'll split long messages 50-50 across both of them.  Instead, use NUMA distances to influence calculating the ratio.  See the paper here: <a href="http://hal.archives-ouvertes.fr/inria-00486178/en/">http://hal.archives-ouvertes.fr/inria-00486178/en/</a>
</span><br>
<p>While the paper is interesting I don't agree with the approach. It is a minor improvement based on what we have today, in the sense that it will better split the load between networks based on the NUMA distance. However, this is a static approach, which do not take into account the global load on the network, and therefore it is a benchmark type of improvement. I would rather prefer we get back our dynamic scheduling, which in addition to the capabilities of the network took into account the speed at which the data flowed through each one of them (and thus taking into account the current load on the network).
<br>
<p><span class="quotelev1">&gt; A previous objection was that we are increasing our dependencies by making hwloc be a 1st-class entity in OPAL -- we're hosed if hwloc ever goes out of business.  Fair enough.  But that being said, hwloc is getting a bit of a community growing around it: vendors are submitting patches for their hardware, distros are picking it up, etc.  I certainly can't predict the future, but hwloc looks in good shape for now.  There is a little risk in depending on hwloc, but I think it's small enough to be ok.
</span><br>
<p>Same level of risk as if libevent goes out of business, and we still depend on it.
<br>
<p><span class="quotelev1">&gt; Cisco does need to be able to compile OPAL/ORTE without hwloc, however (for embedded environments where hwloc simply takes up space and adds no value).  I previously proposed wrapping a subset of the hwloc API with opal_*() functions.  After thinking about that a bit, that seems like a lot of work for little benefit -- how does one decide *which* subset of hwloc should be wrapped?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Instead, it might be worthwhile to simply put hwloc up in ompi/hwloc (instead of opal/hwloc).  Indeed, the 2 places that want to use hwloc are up in the MPI layer -- I'm guessing that most functionality that wants hwloc will be up in MPI.  And if we do the build system right, we can have paffinity/hwloc and libmpi's hwloc all link against the same libhwloc_embedded so that:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; a) there's no duplication in the process, and 
</span><br>
<span class="quotelev1">&gt; b) paffinity/hwloc can still be compiled out with the usual mechanisms to avoid having hwloc in OPAL/ORTE for embedded environments
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; (there's a little hand-waving there, but I think we can figure out the details)
</span><br>
<p>Before making a decision I would love to hear more technical details about this instead of just hand-waving, simply because we all realize this is a very difficult task to be realized in a portable way.
<br>
<p>&nbsp;&nbsp;george.
<br>
<p><p><span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; We *may* want to refactor paffinity and maffinity someday, but that's not necessarily what I'm proposing here.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Comments?
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
<li><strong>Next message:</strong> <a href="8537.php">Jeff Squyres: "Re: [OMPI devel] RFC: make hwloc first-class data"</a>
<li><strong>Previous message:</strong> <a href="8535.php">Barrett, Brian W: "Re: [OMPI devel] RFC: make hwloc first-class data"</a>
<li><strong>In reply to:</strong> <a href="8532.php">Jeff Squyres: "[OMPI devel] RFC: make hwloc first-class data"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8550.php">Kenneth Lloyd: "Re: [OMPI devel] RFC: make hwloc first-class data"</a>
<li><strong>Reply:</strong> <a href="8550.php">Kenneth Lloyd: "Re: [OMPI devel] RFC: make hwloc first-class data"</a>
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
