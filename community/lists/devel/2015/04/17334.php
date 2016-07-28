<?
$subject_val = "Re: [OMPI devel] 1.8.5rc2 released";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Apr 22 20:58:48 2015" -->
<!-- isoreceived="20150423005848" -->
<!-- sent="Wed, 22 Apr 2015 17:58:38 -0700" -->
<!-- isosent="20150423005838" -->
<!-- name="Paul Hargrove" -->
<!-- email="phhargrove_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] 1.8.5rc2 released" -->
<!-- id="CAAvDA17JvwJxdURk9ZKVHQwDpvPEM4Ra1mR1J8AterfTX_TmMg_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="15973DA7-2DB8-44A3-9B73-717666285B49_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] 1.8.5rc2 released<br>
<strong>From:</strong> Paul Hargrove (<em>phhargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-04-22 20:58:38
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17335.php">Ralph Castain: "Re: [OMPI devel] Assigning processes to cores 1.4.2, 1.6.4 and 1.8.4"</a>
<li><strong>Previous message:</strong> <a href="17333.php">Paul Hargrove: "Re: [OMPI devel] powerpc64le support [1-line patch]"</a>
<li><strong>In reply to:</strong> <a href="17332.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 1.8.5rc2 released"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17303.php">Paul Hargrove: "Re: [OMPI devel] 1.8.5rc2 released"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
On Wed, Apr 22, 2015 at 4:20 PM, Jeff Squyres (jsquyres) &lt;jsquyres_at_[hidden]
<br>
<span class="quotelev1">&gt; wrote:
</span><br>
<p><span class="quotelev1">&gt; I think we missed 2 commits on v1.8.  Filed PR
</span><br>
<span class="quotelev1">&gt; <a href="https://github.com/open-mpi/ompi-release/pull/254">https://github.com/open-mpi/ompi-release/pull/254</a> to fix the problem.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; bot:hargrove -- can you test?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p>Initial testing failed autogen.pl (as did Jenkins).
<br>
I am past that point and making updates to the PR instead of this email
<br>
thread.
<br>
<p>-Paul
<br>
<p><p><span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt; &gt; On Apr 21, 2015, at 8:40 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; On Tue, Apr 21, 2015 at 5:33 PM, Jeff Squyres (jsquyres) &lt;
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt; &gt; What happens with master tar balls?
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Master is fine building dl:dlopen:
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; --- MCA component dl:dlopen (m4 configuration macro, priority 80)
</span><br>
<span class="quotelev2">&gt; &gt; checking for MCA component dl:dlopen compile mode... static
</span><br>
<span class="quotelev2">&gt; &gt; checking dlfcn.h usability... yes
</span><br>
<span class="quotelev2">&gt; &gt; checking dlfcn.h presence... yes
</span><br>
<span class="quotelev2">&gt; &gt; checking for dlfcn.h... yes
</span><br>
<span class="quotelev2">&gt; &gt; looking for library without search path
</span><br>
<span class="quotelev2">&gt; &gt; checking for library containing dlopen... none required
</span><br>
<span class="quotelev2">&gt; &gt; checking if MCA component dl:dlopen can compile... yes
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; -Paul
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Sent from my phone. No type good.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; On Apr 21, 2015, at 7:38 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Sorry the output in the previous email left out some relevant detail.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; See here that BOTH dl components were unable to compile with the
</span><br>
<span class="quotelev1">&gt; 1.8.5rc2 tarball:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; +++ Configuring MCA framework dl
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for no configure components in framework dl...
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for m4 configure components in framework dl... libltdl, dlopen
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; --- MCA component dl:dlopen (m4 configuration macro, priority 80)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for MCA component dl:dlopen compile mode... static
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking dlfcn.h usability... yes
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking dlfcn.h presence... yes
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for dlfcn.h... yes
</span><br>
<span class="quotelev3">&gt; &gt;&gt; looking for library without search path
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for dlopen in -ldl... no
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking if MCA component dl:dlopen can compile... no
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; --- MCA component dl:libltdl (m4 configuration macro, priority 50)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for MCA component dl:libltdl compile mode... static
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking --with-libltdl value... simple ok (unspecified)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking --with-libltdl-libdir value... simple ok (unspecified)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for libltdl dir... compiler default
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for libltdl library dir... linker default
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking ltdl.h usability... no
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking ltdl.h presence... no
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for ltdl.h... no
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking if MCA component dl:libltdl can compile... no
</span><br>
<span class="quotelev3">&gt; &gt;&gt; configure: WARNING: Did not find a suitable static opal dl component
</span><br>
<span class="quotelev3">&gt; &gt;&gt; configure: WARNING: You might need to install libltld (and its headers)
</span><br>
<span class="quotelev1">&gt; or
</span><br>
<span class="quotelev3">&gt; &gt;&gt; configure: WARNING: specify --disable-dlopen to configure.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; configure: error: Cannot continue
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; I am getting this on ALL of my {Free,Net,Open}BSD platforms.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; However, they all built the dl:dlopen component fine when testing
</span><br>
<span class="quotelev1">&gt; Jeff''s tarballs from PR410:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; --- MCA component dl:dlopen (m4 configuration macro, priority 80)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for MCA component dl:dlopen compile mode... static
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking dlfcn.h usability... yes
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking dlfcn.h presence... yes
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for dlfcn.h... yes
</span><br>
<span class="quotelev3">&gt; &gt;&gt; looking for library without search path
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for library containing dlopen... none required
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking if MCA component dl:dlopen can compile... yes
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; The key difference I see is that dlopen() is available in libc, not in
</span><br>
<span class="quotelev1">&gt; (the non-existent libdl).
</span><br>
<span class="quotelev3">&gt; &gt;&gt; So it looks likely that something wasn't brought over
</span><br>
<span class="quotelev1">&gt; correctly/completely from master to v1.8.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; -Paul [a.k.a. bot:hargrove]
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; On Tue, Apr 21, 2015 at 4:22 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; wrote:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Is the following configure-fails-by-default behavior really the desired
</span><br>
<span class="quotelev1">&gt; one in 1.8.5?
</span><br>
<span class="quotelev3">&gt; &gt;&gt; I thought this was more of a 1.9 change than a mid-series change.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; -Paul
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; --- MCA component dl:libltdl (m4 configuration macro, priority 50)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for MCA component dl:libltdl compile mode... static
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking --with-libltdl value... simple ok (unspecified)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking --with-libltdl-libdir value... simple ok (unspecified)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for libltdl dir... compiler default
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for libltdl library dir... linker default
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking ltdl.h usability... no
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking ltdl.h presence... no
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking for ltdl.h... no
</span><br>
<span class="quotelev3">&gt; &gt;&gt; checking if MCA component dl:libltdl can compile... no
</span><br>
<span class="quotelev3">&gt; &gt;&gt; configure: WARNING: Did not find a suitable static opal dl component
</span><br>
<span class="quotelev3">&gt; &gt;&gt; configure: WARNING: You might need to install libltld (and its headers)
</span><br>
<span class="quotelev1">&gt; or
</span><br>
<span class="quotelev3">&gt; &gt;&gt; configure: WARNING: specify --disable-dlopen to configure.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; configure: error: Cannot continue
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; On Tue, Apr 21, 2015 at 3:43 PM, Jeff Squyres (jsquyres) &lt;
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; In the usual location:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;     <a href="http://www.open-mpi.org/software/ompi/v1.8/">http://www.open-mpi.org/software/ompi/v1.8/</a>
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; The NEWS changed completely between rc1 and r2, so I don't know easily
</span><br>
<span class="quotelev1">&gt; exactly what is different between rc1 and rc2.  Here's the full 1.8.5 NEWS:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed configure problems in some cases when using an external hwloc
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   installation.  Thanks to Erick Schnetter for reporting the error and
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   helping track down the source of the problem.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed linker error on OS X when using the clang compiler.  Thanks to
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   Erick Schnetter for reporting the error and helping track down the
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   source of the problem.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed MPI_THREAD_MULTIPLE deadlock error in the vader BTL.  Thanks
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   to Thomas Klimpel for reporting the issue.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed several Valgrind warnings.  Thanks for Lisandro Dalcin for
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   contributing a patch fixing some one-sided code paths.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed version compatibility test in OOB that broke ABI within the
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   1.8 series. NOTE: this will not resolve the problem between pre-1.8.5
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   versions, but will fix it going forward.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fix some issues related to running on Intel Xeon Phi coprocessors.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Opportunistically switch away from using GNU Libtool's libltdl
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   library when possible (by default).
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fix some VampirTrace errors.  Thanks to Paul Hargrove for reporting
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   the issues.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Correct default binding patterns when --use-hwthread-cpus was
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   specified and nprocs &lt;= 2.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fix warnings about -finline-functions when compiling with clang.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Updated the embedded hwloc with several bug fixes, including the
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   &quot;duplicate Lhwloc1 symbol&quot; that multiple users reported on some
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   platforms.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Do not error when mpirun is invoked with with default bindings
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   (i.e., no binding was specified), and one or more nodes do not
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   support bindings.  Thanks to Annu Desari for pointing out the
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   problem.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Let root invoke &quot;mpirun --version&quot; to check the version without
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   printing the &quot;Don't run as root!&quot; warnings.  Thanks to Robert McLay
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   for the suggestion.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed several bugs in OpenSHMEM support.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Extended vader shared memory support to 32-bit architectures.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fix handling of very large datatypes.  Thanks to Bogdan Sataric for
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   the bug report.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed a bug in handling subarray MPI datatypes, and a bug when using
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   MPI_LB and MPI_UB.  Thanks to Gus Correa for pointing out the issue.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Restore user-settable bandwidth and latency PML MCA variables.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Multiple bug fixes for cleanup during MPI_FINALIZE in unusual
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   situations.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Added support for TCP keepalive signals to ensure timely termination
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   when sockets between daemons cannot be created (e.g., due to a
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   firewall).
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Added MCA parameter to allow full use of a SLURM allocation when
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   started from a tool (supports LLNL debugger).
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed several bugs in the configure logic for PMI and hwloc.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed incorrect interface index in TCP communications setup.  Thanks
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   to Mark Kettenis for spotting the problem and providing a patch.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed MPI_IREDUCE_SCATTER with single-process communicators when
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   MPI_IN_PLACE was not used.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Added XRC support for OFED v3.12 and higher.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Various updates and bug fixes to the Mellanox hcoll collective
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   support.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fix problems with Fortran compilers that did not support
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   REAL*16/COMPLEX*32 types.  Thanks to Orion Poplawski for identifying
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   the issue.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed problem with rpath/runpath support in pkg-config files.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   Thanks to Christoph Junghans for notifying us of the issue.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Man page fixes:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   - Removed erroneous &quot;color&quot; discussion from MPI_COMM_SPLIT_TYPE.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;     Thanks to Erick Schnetter for spotting the outdated text.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   - Fixed prototypes for MPI_IBARRIER.  Thanks to Maximilian for
</span><br>
<span class="quotelev3">&gt; &gt;&gt;     finding the issue.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   - Updated docs about buffer usage in non-blocking communications.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;     Thanks to Alexander Pozdneev for citing the outdated text.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   - Added documentation about the 'ompi_unique' MPI_Info key with
</span><br>
<span class="quotelev3">&gt; &gt;&gt;     MPI_PUBLISH_NAME.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   - Fixed typo in MPI_INTERCOMM_MERGE.  Thanks to Harald Servat for
</span><br>
<span class="quotelev3">&gt; &gt;&gt;     noticing and sending a patch.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   - Updated configure paths in HACKING.  Thanks to Maximilien Levesque
</span><br>
<span class="quotelev3">&gt; &gt;&gt;     for the fix.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   - Fixed Fortran typo in MPI_WIN_LOCK_ALL.  Thanks to Thomas Jahns
</span><br>
<span class="quotelev3">&gt; &gt;&gt;     for pointing out the issue.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed a number of MPI one-sided bugs.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed MPI_COMM_SPAWN when invoked from a singleton job.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed a number of minor issues with CUDA support, including
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   registering of shared memory and supporting reduction support for
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   GPU buffers.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Improved support for building OMPI on Cray platforms.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - Fixed performance regression introduced by the inadvertent default
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   enabling of MPI_THREAD_MULTIPLE support.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; --
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev3">&gt; &gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; For corporate legal information go to:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/04/17298.php">http://www.open-mpi.org/community/lists/devel/2015/04/17298.php</a>
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; --
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; --
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev3">&gt; &gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/04/17300.php">http://www.open-mpi.org/community/lists/devel/2015/04/17300.php</a>
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt; &gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/04/17301.php">http://www.open-mpi.org/community/lists/devel/2015/04/17301.php</a>
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; --
</span><br>
<span class="quotelev2">&gt; &gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev2">&gt; &gt; Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev2">&gt; &gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt; &gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/04/17302.php">http://www.open-mpi.org/community/lists/devel/2015/04/17302.php</a>
</span><br>
<span class="quotelev1">&gt;
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
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/04/17332.php">http://www.open-mpi.org/community/lists/devel/2015/04/17332.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><p><p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Computer Languages &amp; Systems Software (CLaSS) Group
Computer Science Department               Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-17334/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17335.php">Ralph Castain: "Re: [OMPI devel] Assigning processes to cores 1.4.2, 1.6.4 and 1.8.4"</a>
<li><strong>Previous message:</strong> <a href="17333.php">Paul Hargrove: "Re: [OMPI devel] powerpc64le support [1-line patch]"</a>
<li><strong>In reply to:</strong> <a href="17332.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 1.8.5rc2 released"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17303.php">Paul Hargrove: "Re: [OMPI devel] 1.8.5rc2 released"</a>
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
