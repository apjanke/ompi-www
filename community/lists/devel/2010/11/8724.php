<?
$subject_val = "Re: [OMPI devel] RFC: Bring the lastest ROMIO version from	MPICH2-1.3 into the trunk";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Nov 29 11:19:57 2010" -->
<!-- isoreceived="20101129161957" -->
<!-- sent="Mon, 29 Nov 2010 11:19:51 -0500" -->
<!-- isosent="20101129161951" -->
<!-- name="Jeff Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: Bring the lastest ROMIO version from	MPICH2-1.3 into the trunk" -->
<!-- id="7F6AF9CF-96C3-4604-A4E4-4657B27378A8_at_cisco.com" -->
<!-- charset="iso-8859-1" -->
<!-- inreplyto="4CED33CE.2080501_at_bull.net" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: Bring the lastest ROMIO version from	MPICH2-1.3 into the trunk<br>
<strong>From:</strong> Jeff Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-11-29 11:19:51
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8725.php">Pascal Deveze: "Re: [OMPI devel] RFC: Bring the lastest ROMIO version	from	MPICH2-1.3 into the trunk"</a>
<li><strong>Previous message:</strong> <a href="8723.php">Jeff Squyres: "Re: [OMPI devel] RFC: Bring the lastest ROMIO version from	MPICH2-1.3 into the trunk"</a>
<li><strong>In reply to:</strong> <a href="8720.php">Pascal Deveze: "Re: [OMPI devel] RFC: Bring the lastest ROMIO version from	MPICH2-1.3 into the trunk"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8739.php">Pascal Deveze: "Re: [OMPI devel] RFC: Bring the lastest ROMIO version	from	MPICH2-1.3 into the trunk"</a>
<li><strong>Reply:</strong> <a href="8739.php">Pascal Deveze: "Re: [OMPI devel] RFC: Bring the lastest ROMIO version	from	MPICH2-1.3 into the trunk"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Some questions about the patch:
<br>
<p>configure.in:
<br>
<p>@@ -2002,9 +1987,8 @@
<br>
&nbsp;&nbsp;&nbsp;&nbsp;# Turn off the building of the Fortran interface and the Info routines
<br>
&nbsp;&nbsp;&nbsp;&nbsp;EXTRA_DIRS=&quot;&quot;
<br>
&nbsp;&nbsp;&nbsp;&nbsp;AC_DEFINE(HAVE_STATUS_SET_BYTES,1,[Define if status_set_bytes available])
<br>
-   DEFINE_HAVE_MPI_GREQUEST=&quot;#define HAVE_MPI_GREQUEST&quot;
<br>
-   # Add the MPICH2_INCLUDE_FLAGS to CPPFLAGS
<br>
-   CPPFLAGS=&quot;$CPPFLAGS $MPICH2_INCLUDE_FLAGS&quot;
<br>
+   DEFINE_HAVE_MPI_GREQUEST=&quot;#define HAVE_MPI_GREQUEST 1&quot;
<br>
+   AC_DEFINE(HAVE_MPIU_FUNCS,1,[Define if MPICH2 memory tracing macros defined])
<br>
&nbsp;fi
<br>
&nbsp;#
<br>
&nbsp;#
<br>
<p>Do we have the MPIU functions?  Or is that an MPICH2-specific thing?
<br>
<p>I see that you moved confdb/aclocal_cc.m4 to acinclude.m4.  Shoudn't we just -I confdb instead to get all of their .m4 files?
<br>
<p>In mpipr.h, why remove the #if 0?
<br>
<p>-/* Open MPI: these functions are not supposed to be profiled */
<br>
-#if 0
<br>
&nbsp;#undef MPI_Wtick
<br>
&nbsp;#define MPI_Wtick PMPI_Wtick
<br>
&nbsp;#undef MPI_Wtime
<br>
&nbsp;#define MPI_Wtime PMPI_Wtime
<br>
-#endif
<br>
<p>In configure.in, please update the version number in AM_INIT_AUTOMAKE.
<br>
<p>I thought there was one other thing that I saw, but I can't recall it right now...
<br>
<p>This is just from looking at your diff; I didn't try to run it yet because you said there were some things that weren't pushed back up to bitbucket yet.
<br>
<p><p><p><p><p>On Nov 24, 2010, at 10:48 AM, Pascal Deveze wrote:
<br>
<p><span class="quotelev1">&gt; Hi Jeff,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Here is the unified diff.
</span><br>
<span class="quotelev1">&gt; As only the romio subtree is modified, I made the following command:
</span><br>
<span class="quotelev1">&gt;   diff -u -r -x .svn ompi-trunk/ompi/mca/io/romio/romio/ NEW-ROMIO-FOR-OPENMPI/ompi/mca/io/romio/romio/ &gt; DIFF_UPDATE
</span><br>
<span class="quotelev1">&gt;   tar cvzf DIFF_UPDATE.TGZ DIFF_UPDATE
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Compilation is OK. I run the ROMIO tests.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; There are a few new modifications that are not in bitbucket. I think it is not necessary to update bitbucket (<a href="http://bitbucket.org/devezep/new-romio-for-openmpi/">http://bitbucket.org/devezep/new-romio-for-openmpi/</a> ).
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Pascal
</span><br>
<span class="quotelev1">&gt;  
</span><br>
<span class="quotelev1">&gt; Jeff Squyres a &#233;crit :
</span><br>
<span class="quotelev2">&gt;&gt; Thanks Pascal!
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Is there any change you could send a unified diff of the tip of your hg vs. the SVN trunk HEAD?
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; E.g., if you have an hg+ssh combo tree, could you &quot;hg up&quot; in there to get all your work, and then &quot;svn diff &gt; diff.out&quot; and then compress and send the diff.out?
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Thanks!
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Nov 10, 2010, at 8:43 AM, Pascal Deveze wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; WHAT: Port the lastest ROMIO version from MPICH2-1.3 into the trunk.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; WHY: There is a considerable interest in updating the ROMIO branch that was ported from mpich2-1.0.7
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; WHERE: ompi/mca/io/romio/
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; WHEN: Before 1.5.2, so asap
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; TIMEOUT: Next Tuesday teleconf, 23 Nov 2010
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -----
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I am in charge of ticket 1888 (see at 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="https://svn.open-mpi.org/trac/ompi/ticket/1888">https://svn.open-mpi.org/trac/ompi/ticket/1888</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ).
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I have made the porting of ROMIO available in bitbucket since September 17th 2010. (
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://bitbucket.org/devezep/new-romio-for-openmpi/">http://bitbucket.org/devezep/new-romio-for-openmpi/</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  )
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Until now, I do not have any report on this porting and it's now time to bring it into the trunk.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; All modified files are located under the romio subtree.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Pascal Dev&#232;ze
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;     
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;   
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; &lt;DIFF_UPDATE.TGZ&gt;_______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to:
<a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8725.php">Pascal Deveze: "Re: [OMPI devel] RFC: Bring the lastest ROMIO version	from	MPICH2-1.3 into the trunk"</a>
<li><strong>Previous message:</strong> <a href="8723.php">Jeff Squyres: "Re: [OMPI devel] RFC: Bring the lastest ROMIO version from	MPICH2-1.3 into the trunk"</a>
<li><strong>In reply to:</strong> <a href="8720.php">Pascal Deveze: "Re: [OMPI devel] RFC: Bring the lastest ROMIO version from	MPICH2-1.3 into the trunk"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8739.php">Pascal Deveze: "Re: [OMPI devel] RFC: Bring the lastest ROMIO version	from	MPICH2-1.3 into the trunk"</a>
<li><strong>Reply:</strong> <a href="8739.php">Pascal Deveze: "Re: [OMPI devel] RFC: Bring the lastest ROMIO version	from	MPICH2-1.3 into the trunk"</a>
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
