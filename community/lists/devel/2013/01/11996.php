<?
$subject_val = "Re: [OMPI devel] Open MPI (not quite) on Cray XC30";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Jan 25 18:59:39 2013" -->
<!-- isoreceived="20130125235939" -->
<!-- sent="Fri, 25 Jan 2013 15:59:31 -0800" -->
<!-- isosent="20130125235931" -->
<!-- name="Paul Hargrove" -->
<!-- email="phhargrove_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Open MPI (not quite) on Cray XC30" -->
<!-- id="CAAvDA17YY88VTa3AYNTgFMdROWOSg511UyFmXCKSvvkcthKAAA_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="20130125232116.GF89496_at_pantheralanlgov.local" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Open MPI (not quite) on Cray XC30<br>
<strong>From:</strong> Paul Hargrove (<em>phhargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2013-01-25 18:59:31
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11997.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] New ARM patch"</a>
<li><strong>Previous message:</strong> <a href="11995.php">Nathan Hjelm: "Re: [OMPI devel] Open MPI (not quite) on Cray XC30"</a>
<li><strong>In reply to:</strong> <a href="11995.php">Nathan Hjelm: "Re: [OMPI devel] Open MPI (not quite) on Cray XC30"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11998.php">Ralph Castain: "Re: [OMPI devel] Open MPI (not quite) on Cray XC30"</a>
<li><strong>Reply:</strong> <a href="11998.php">Ralph Castain: "Re: [OMPI devel] Open MPI (not quite) on Cray XC30"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Nathan,
<br>
<p>The 2nd and 3rd non-blank lines of my original post:
<br>
<p><span class="quotelev1">&gt; Given that it is INTENDED to be API-compatible with the XE series, I began
</span><br>
<span class="quotelev1">&gt; configuring with
</span><br>
<span class="quotelev1">&gt;     CC=cc CXX=CC FC=ftn --with-platform=lanl/cray_xe6/optimized-nopanasas
</span><br>
<p><p>So, I am surprised that nobody objected before now to my use of the
<br>
Cray-provided wrapper compilers.
<br>
I mistakenly believed that if I don't use them then I wouldn't get through
<br>
configure w/ ugni and alps support.
<br>
However, I've just now completed configure w/o setting CC, CXX, FC and see
<br>
the expected components.
<br>
I'll report more from this build later (&quot;make all&quot; is running now).
<br>
<p>I would appreciate (perhaps off-list) receiving any module or platform file
<br>
or additional instructions that maybe appropriate to building on a Cray XE,
<br>
XK or XC system.
<br>
<p>Getting OMPI running on our XC30 is of exactly ZERO importance beyond my
<br>
own edification.
<br>
So, I am likely to stop fighting this battle soon.
<br>
<p>-Paul
<br>
<p><p>On Fri, Jan 25, 2013 at 3:21 PM, Nathan Hjelm &lt;hjelmn_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Hmm, I see mpicc in there. It will use the compiler directly instead of
</span><br>
<span class="quotelev1">&gt; Cray's wrappers. We didn't want Open MPI's wrapper linking in MPT afterall
</span><br>
<span class="quotelev1">&gt; ;). mpicc is completely borked in the trunk.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; If you want to use the Cray wrappers with Open MPI I can give you a module
</span><br>
<span class="quotelev1">&gt; file that sets up the environment correctly (link against -lmpi not
</span><br>
<span class="quotelev1">&gt; -lmpich, etc).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -Nathan
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Fri, Jan 25, 2013 at 03:10:37PM -0800, Paul Hargrove wrote:
</span><br>
<span class="quotelev2">&gt; &gt; Nathan,
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Cray's &quot;cc&quot; wrapper is adding xpmem, ugni, pmi, alps and others already:
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; $ cc -v hello.c 2&gt;&amp;1 | grep collect
</span><br>
<span class="quotelev3">&gt; &gt; &gt;  /opt/gcc/4.7.2/snos/libexec/gcc/x86_64-suse-linux/4.7.2/collect2
</span><br>
<span class="quotelev3">&gt; &gt; &gt; --sysroot= -m elf_x86_64 -static -u pthread_mutex_trylock -u
</span><br>
<span class="quotelev3">&gt; &gt; &gt; pthread_mutex_destroy -u pthread_create /usr/lib/../lib64/crt1.o
</span><br>
<span class="quotelev3">&gt; &gt; &gt; /usr/lib/../lib64/crti.o
</span><br>
<span class="quotelev3">&gt; &gt; &gt; /opt/gcc/4.7.2/snos/lib/gcc/x86_64-suse-linux/4.7.2/crtbeginT.o
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/cray/udreg/2.3.2-1.0500.5931.3.1.ari/lib64
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/cray/ugni/4.0-1.0500.5836.7.58.ari/lib64
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/cray/pmi/4.0.0-1.0000.9282.69.4.ari/lib64
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/cray/dmapp/4.0.1-1.0500.5932.6.5.ari/lib64
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/cray/xpmem/0.1-2.0500.36799.3.6.ari/lib64
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/cray/alps/5.0.1-2.0500.7663.1.1.ari/lib64
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/cray/rca/1.0.0-2.0500.37705.3.12.ari/lib64
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/cray/mpt/5.6.0/gni/mpich2-gnu/47/lib
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/cray/mpt/5.6.0/gni/sma/lib64
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/cray/libsci/12.0.00/gnu/47/sandybridge/lib
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/cray/alps/5.0.1-2.0500.7663.1.1.ari/lib64
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/gcc/4.7.2/snos/lib/gcc/x86_64-suse-linux/4.7.2
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/gcc/4.7.2/snos/lib/gcc/x86_64-suse-linux/4.7.2/../../../../lib64
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/lib/../lib64 -L/usr/lib/../lib64
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -L/opt/gcc/4.7.2/snos/lib/gcc/x86_64-suse-linux/4.7.2/../../..
</span><br>
<span class="quotelev3">&gt; &gt; &gt; /scratch1/scratchdirs/hargrove/ccQ1f0sx.o -lrca
</span><br>
<span class="quotelev1">&gt; -L/opt/cray/atp/1.6.0/lib/
</span><br>
<span class="quotelev3">&gt; &gt; &gt; --undefined=_ATP_Data_Globals --undefined=__atpHandlerInstall
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -lAtpSigHCommData -lAtpSigHandler --start-group -lgfortran -lscicpp_gnu
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -lsci_gnu_mp -lstdc++ -lgfortran -lmpich_gnu_47 -lmpl -lrt -lsma
</span><br>
<span class="quotelev1">&gt; -lxpmem
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -ldmapp -lugni -lpmi -lalpslli -lalpsutil -lalps -ludreg -lpthread -lm
</span><br>
<span class="quotelev3">&gt; &gt; &gt; --end-group -lgomp -lpthread --start-group -lgcc -lgcc_eh -lc
</span><br>
<span class="quotelev1">&gt; --end-group
</span><br>
<span class="quotelev3">&gt; &gt; &gt; /opt/gcc/4.7.2/snos/lib/gcc/x86_64-suse-linux/4.7.2/crtend.o
</span><br>
<span class="quotelev3">&gt; &gt; &gt; /usr/lib/../lib64/crtn.o
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; -Paul
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; On Fri, Jan 25, 2013 at 2:46 PM, Nathan Hjelm &lt;hjelmn_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; Something is wrong with the wrappers. A number of libraries (-lxpmem,
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -lugni, etc) are missing from libs_static. Might be a similar issue
</span><br>
<span class="quotelev1">&gt; with eh
</span><br>
<span class="quotelev3">&gt; &gt; &gt; missing -llustreapi. Going to create a critical bug to track this
</span><br>
<span class="quotelev1">&gt; issue.
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; Works in 1.7 :-/ ... If you add -lnuma to libs_static in
</span><br>
<span class="quotelev3">&gt; &gt; &gt; mpicc-wrapper-data.txt.
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -Nathan
</span><br>
<span class="quotelev3">&gt; &gt; &gt; HPC-3, LANL
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; On Fri, Jan 25, 2013 at 02:13:41PM -0800, Paul Hargrove wrote:
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; Still having problems on the Cray XC30, but now they are when
</span><br>
<span class="quotelev1">&gt; linking an
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; MPI app:
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; $ ./INSTALL/bin/mpicc -o ring_c examples/ring_c.c
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; fs_lustre_file_open.c:(.text+0x130): undefined reference to
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; `llapi_file_create'
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; fs_lustre_file_open.c:(.text+0x17e): undefined reference to
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; `llapi_file_get_stripe'
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; /usr/bin/ld: link errors found, deleting executable `ring_c'
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; collect2: error: ld returned 1 exit status
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; It appears that lustre support was found at configure time using a
</span><br>
<span class="quotelev1">&gt; test
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; that used &quot;-llustre -llusterapi&quot;:
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; configure:157666: checking if possible to link LUSTRE
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; configure:157680: cc -std=gnu99 -o conftest -O3 -DNDEBUG
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -finline-functions -fno-strict-aliasing -fexceptions   -D_REENTRANT
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; -I/global/homes/h/hargrove/GSCRATCH/OMPI/openmpi-1.9a1r27905/opal/mca/hwloc/hwloc151/hwloc/include
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; -I/global/homes/h/hargrove/GSCRATCH/OMPI/openmpi-1.9a1r27905/BUILD-edison/opal/mca/hwloc/hwloc151/hwloc/include
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; -I/global/homes/h/hargrove/GSCRATCH/OMPI/openmpi-1.9a1r27905/opal/mca/event/libevent2019/libevent
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; -I/global/homes/h/hargrove/GSCRATCH/OMPI/openmpi-1.9a1r27905/opal/mca/event/libevent2019/libevent/include
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; -I/global/homes/h/hargrove/GSCRATCH/OMPI/openmpi-1.9a1r27905/BUILD-edison/opal/mca/event/libevent2019/libevent/include
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -I/opt/cray/pmi/default/include -I/opt/cray/pmi/default/include
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -I/opt/cray/pmi/default/include -I/opt/cray/pmi/default/include
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -I/usr//include/lustre/   -fexceptions  -L/usr//lib64 conftest.c
</span><br>
<span class="quotelev1">&gt;  -lnsl
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;  -lutil  -lnsl  -lutil   -llustre -llustreapi
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; However, those two libs are NOT included when linking an MPI
</span><br>
<span class="quotelev1">&gt; application:
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; $ ./INSTALL/bin/mpicc -o ring_c examples/ring_c.c -v 2&gt;&amp;1 | grep
</span><br>
<span class="quotelev3">&gt; &gt; &gt; collect
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;  /opt/gcc/4.7.2/snos/libexec/gcc/x86_64-suse-linux/4.7.2/collect2
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; --sysroot= -m elf_x86_64 -static -o ring_c -u
</span><br>
<span class="quotelev1">&gt; pthread_mutex_trylock -u
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; pthread_mutex_destroy -u pthread_create /usr/lib/../lib64/crt1.o
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; /usr/lib/../lib64/crti.o
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; /opt/gcc/4.7.2/snos/lib/gcc/x86_64-suse-linux/4.7.2/crtbeginT.o
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/pmi/default/lib64 -L/opt/cray/alps/default/lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; -L/global/homes/h/hargrove/GSCRATCH/OMPI/openmpi-1.9a1r27905/INSTALL/lib
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/udreg/2.3.2-1.0500.5931.3.1.ari/lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/ugni/4.0-1.0500.5836.7.58.ari/lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/pmi/4.0.0-1.0000.9282.69.4.ari/lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/dmapp/4.0.1-1.0500.5932.6.5.ari/lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/xpmem/0.1-2.0500.36799.3.6.ari/lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/alps/5.0.1-2.0500.7663.1.1.ari/lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/rca/1.0.0-2.0500.37705.3.12.ari/lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/mpt/5.6.0/gni/mpich2-gnu/47/lib
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/mpt/5.6.0/gni/sma/lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/libsci/12.0.00/gnu/47/sandybridge/lib
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/cray/alps/5.0.1-2.0500.7663.1.1.ari/lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/gcc/4.7.2/snos/lib/gcc/x86_64-suse-linux/4.7.2
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; -L/opt/gcc/4.7.2/snos/lib/gcc/x86_64-suse-linux/4.7.2/../../../../lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/lib/../lib64 -L/usr/lib/../lib64
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -L/opt/gcc/4.7.2/snos/lib/gcc/x86_64-suse-linux/4.7.2/../../..
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; /scratch1/scratchdirs/hargrove/cceRJNtp.o -lmpi -lpmi -lalpslli
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -lalpsutil
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -lnsl -lutil -lnsl -lutil -lopen-rte -lpmi -lalpslli -lalpsutil
</span><br>
<span class="quotelev1">&gt; -lnsl
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -lutil -lnsl -lutil -lopen-pal -lpmi -lalpslli -lalpsutil -lnsl
</span><br>
<span class="quotelev1">&gt; -lutil
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -lnsl -lutil -lrca -L/opt/cray/atp/1.6.0/lib/
</span><br>
<span class="quotelev3">&gt; &gt; &gt; --undefined=_ATP_Data_Globals
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; --undefined=__atpHandlerInstall -lAtpSigHCommData -lAtpSigHandler
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; --start-group -lgfortran -lscicpp_gnu -lsci_gnu_mp -lstdc++
</span><br>
<span class="quotelev1">&gt; -lgfortran
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -lmpich_gnu_47 -lmpl -lrt -lsma -lxpmem -ldmapp -lugni -lpmi
</span><br>
<span class="quotelev1">&gt; -lalpslli
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -lalpsutil -lalps -ludreg -lpthread -lm --end-group -lgomp
</span><br>
<span class="quotelev1">&gt; -lpthread
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; --start-group -lgcc -lgcc_eh -lc --end-group
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; /opt/gcc/4.7.2/snos/lib/gcc/x86_64-suse-linux/4.7.2/crtend.o
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; /usr/lib/../lib64/crtn.o
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; collect2: error: ld returned 1 exit status
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; Of course the obvious work-around to try is adding &quot;-llustre
</span><br>
<span class="quotelev1">&gt; -llustreapi&quot;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; to my command line.  However, that doesn't work because mpicc places
</span><br>
<span class="quotelev1">&gt; my
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; &quot;-l&quot; args BEFORE its own &quot;-lmpi&quot;.  Since &quot;-static&quot; is also among the
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; arguments, no symbols are picked up from the luster libs when they
</span><br>
<span class="quotelev1">&gt; appear
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; on the command line before &quot;-lmpi&quot;, from which lustre symbols are
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; referenced.
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; Best guess(es):
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; EITHER config/ompi_check_lustre.m4 is failing to add &quot;-llustre
</span><br>
<span class="quotelev3">&gt; &gt; &gt; -llustreapi&quot;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; to some variable
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; OR the variable set by config/ompi_check_lustre.m4 isn't making its
</span><br>
<span class="quotelev1">&gt; way
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; into the application link command for some reason
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; Note that this is a --disable-shared/--enable-static build which may
</span><br>
<span class="quotelev3">&gt; &gt; &gt; differ
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; from other systems where LUSTRE support gets used/tested.
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; -Paul
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; On Fri, Jan 25, 2013 at 12:01 PM, Ralph Castain &lt;rhc_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; wrote:
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; Thanks Paul
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; I'm currently tracking down a problem on the Cray XE6 - it appears
</span><br>
<span class="quotelev1">&gt; that
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; recent OS release changed the way alps stores allocation info :-(
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; Will hopefully have it running soon.
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; On Jan 25, 2013, at 10:50 AM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; wrote:
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; I was able to compile with openmpi-1.9a1r27905.tar.bz
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; I'll report again when I've had an opportunity to run something
</span><br>
<span class="quotelev1">&gt; like
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; ring_c.
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; Thanks,
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; -Paul
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; On Tue, Jan 22, 2013 at 6:08 PM, Ralph Castain &lt;rhc_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; wrote:
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; I went ahead and removed the duplicate code, so this should work
</span><br>
<span class="quotelev1">&gt; now.
</span><br>
<span class="quotelev3">&gt; &gt; &gt; The
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; problem is that we re-factored the ompi_info/orte-info code, but
</span><br>
<span class="quotelev3">&gt; &gt; &gt; didn't
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; complete the job - specifically, the orte-info tool didn't get
</span><br>
<span class="quotelev3">&gt; &gt; &gt; updated.
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; It's about to get revamped yet again when the ompi-rte branch gets
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; committed to the trunk, so I'd rather not do any more with it now.
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; Hopefully, this will be the minimum required.
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; On Jan 22, 2013, at 4:20 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; wrote:
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; I am using the openmpi-1.9a1r27886 tarball and I still see an
</span><br>
<span class="quotelev1">&gt; error
</span><br>
<span class="quotelev3">&gt; &gt; &gt; for
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; one of the two duplicate symbols:
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;   CCLD     orte-info
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; ../../../orte/.libs/libopen-rte.a(orte_info_support.o): In
</span><br>
<span class="quotelev1">&gt; function
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; `orte_info_show_orte_version':
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; ../../orte/runtime/orte_info_support.c:(.text+0xe10): multiple
</span><br>
<span class="quotelev3">&gt; &gt; &gt; definition
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; of `orte_info_show_orte_version'
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt; version.o:../../../../orte/tools/orte-info/version.c:(.text+0x2370):
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; first defined here
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; -Paul
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; On Fri, Jan 18, 2013 at 3:52 AM, George Bosilca &lt;
</span><br>
<span class="quotelev1">&gt; bosilca_at_[hidden]
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;wrote:
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; Luckily for us all the definitions contain the same constant
</span><br>
<span class="quotelev1">&gt; (orte).
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; r27864 should fix this.
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;   George.
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; On Jan 18, 2013, at 06:21 , Paul Hargrove &lt;PHHargrove_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; wrote:
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; My employer has a nice new Cray XC30 (aka Cascade), and I
</span><br>
<span class="quotelev1">&gt; thought I'd
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; give Open MPI a quick test.
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; Given that it is INTENDED to be API-compatible with the XE
</span><br>
<span class="quotelev1">&gt; series, I
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; began configuring with
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;     CC=cc CXX=CC FC=ftn
</span><br>
<span class="quotelev3">&gt; &gt; &gt; --with-platform=lanl/cray_xe6/optimized-nopanasas
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; However, since this is Intel h/w, I commented-out the following 2
</span><br>
<span class="quotelev3">&gt; &gt; &gt; lines
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; in the platform file:
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;     with_wrapper_cflags=&quot;-march=amdfam10&quot;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;     CFLAGS=-march=amdfam10
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; I am using PrgEnv-gnu/5.0.15, though PrgEnv-intel is the default
</span><br>
<span class="quotelev1">&gt; on
</span><br>
<span class="quotelev3">&gt; &gt; &gt; our
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; system
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; As far as I know, use of 1.6.x is out - no ugni at all, right?
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; So, I didn't even try.
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; I gave openmpi-1.7rc6 a try, but the ALPS headers and libs have
</span><br>
<span class="quotelev1">&gt; moved
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; (as mentioned in ompi-trunk/config/orte_check_alps.m4).
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; Perhaps one should CMR the updated-for-CLE-5 configure logic to
</span><br>
<span class="quotelev1">&gt; the
</span><br>
<span class="quotelev3">&gt; &gt; &gt; 1.7
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; branch?
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; Next, I tried a trunk nightly tarball:
</span><br>
<span class="quotelev1">&gt; openmpi-1.9a1r27862.tar.bz2
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; As I mentioned above, the trunk has the right logic for locating
</span><br>
<span class="quotelev3">&gt; &gt; &gt; ALPS.
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; However, it looks like there is some untested code, protected by
</span><br>
<span class="quotelev1">&gt; &quot;#if
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; WANT_CRAY_PMI2_EXT&quot;, that needs work:
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; make[2]: Entering directory
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; `/global/scratch/sd/hargrove/OMPI/openmpi-1.9a1r27862/BUILD/orte/mca/db/pmi'
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;   CC       db_pmi_component.lo
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;   CC       db_pmi.lo
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; ../../../../../orte/mca/db/pmi/db_pmi.c: In function 'store':
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; ../../../../../orte/mca/db/pmi/db_pmi.c:202: error: 'ptr'
</span><br>
<span class="quotelev1">&gt; undeclared
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; (first use in this function)
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; ../../../../../orte/mca/db/pmi/db_pmi.c:202: error: (Each
</span><br>
<span class="quotelev1">&gt; undeclared
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; identifier is reported only once
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; ../../../../../orte/mca/db/pmi/db_pmi.c:202: error: for each
</span><br>
<span class="quotelev3">&gt; &gt; &gt; function it
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; appears in.)
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; make[2]: *** [db_pmi.lo] Error 1
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; make[2]: Leaving directory
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; `/global/scratch/sd/hargrove/OMPI/openmpi-1.9a1r27862/BUILD/orte/mca/db/pmi'
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; make[1]: *** [all-recursive] Error 1
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; make[1]: Leaving directory
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; `/global/scratch/sd/hargrove/OMPI/openmpi-1.9a1r27862/BUILD/orte'
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; make: *** [all-recursive] Error 1
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; I added the missing &quot;char *ptr&quot; declaration a few lines before
</span><br>
<span class="quotelev1">&gt; it's
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; first use, and resumed the build.
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; This time the build terminated at
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; make[2]: Entering directory
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; `/global/scratch/sd/hargrove/OMPI/openmpi-1.9a1r27862/BUILD/opal/tools/wrappers'
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;   CC       opal_wrapper.o
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;   CCLD     opal_wrapper
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; /usr/bin/ld: attempted static link of dynamic object
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; `../../../opal/.libs/libopen-pal.so'
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; collect2: error: ld returned 1 exit status
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; So I went back to the platform file and changed
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;    enable_shared=yes
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; to
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;    enable_shared=no
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; No big deal there - I had to make the same change for our XE6.
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; And so I started back at configure (after a &quot;make distclean&quot;, to
</span><br>
<span class="quotelev1">&gt; be
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; safe), and here is the next error:
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; Making all in tools/orte-info
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; make[2]: Entering directory
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; `/global/scratch/sd/hargrove/OMPI/openmpi-1.9a1r27862/BUILD/orte/tools/orte-info'
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;   CCLD     orte-info
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; ../../../orte/.libs/libopen-rte.a(orte_info_support.o): In
</span><br>
<span class="quotelev1">&gt; function
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; `orte_info_show_orte_version':
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; orte_info_support.c:(.text+0xd70): multiple definition of
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; `orte_info_show_orte_version'
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; version.o:version.c:(.text+0x4b0): first defined here
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; ../../../orte/.libs/libopen-rte.a(orte_info_support.o):(.data+0x0):
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; multiple definition of `orte_info_type_orte'
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; orte-info.o:(.data+0x10): first defined here
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; /usr/bin/ld: link errors found, deleting executable `orte-info'
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; collect2: error: ld returned 1 exit status
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; make[2]: *** [orte-info] Error 1
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; I am not sure how to fix this, but I would guess this is
</span><br>
<span class="quotelev1">&gt; probably a
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; simple fix for somebody who knows OMPI's build infrastructure
</span><br>
<span class="quotelev1">&gt; better
</span><br>
<span class="quotelev3">&gt; &gt; &gt; than I.
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; -Paul
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; --
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; Future Technologies Group
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;  _______________________________________________
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt; &gt; &gt; &gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; --
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; Future Technologies Group
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;  _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt; &gt; &gt; &gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; --
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; Future Technologies Group
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;  _______________________________________________
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; &gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; --
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; Future Technologies Group
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; devel mailing list
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt; &gt; &gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt; &gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt; &gt; &gt; devel mailing list
</span><br>
<span class="quotelev3">&gt; &gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt; &gt; &gt;
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
<span class="quotelev2">&gt; &gt; Future Technologies Group
</span><br>
<span class="quotelev2">&gt; &gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev2">&gt; &gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev1">&gt;
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
<span class="quotelev1">&gt;
</span><br>
<p><p><p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Future Technologies Group
Computer and Data Sciences Department     Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-11996/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11997.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] New ARM patch"</a>
<li><strong>Previous message:</strong> <a href="11995.php">Nathan Hjelm: "Re: [OMPI devel] Open MPI (not quite) on Cray XC30"</a>
<li><strong>In reply to:</strong> <a href="11995.php">Nathan Hjelm: "Re: [OMPI devel] Open MPI (not quite) on Cray XC30"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11998.php">Ralph Castain: "Re: [OMPI devel] Open MPI (not quite) on Cray XC30"</a>
<li><strong>Reply:</strong> <a href="11998.php">Ralph Castain: "Re: [OMPI devel] Open MPI (not quite) on Cray XC30"</a>
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
