<?
$subject_val = "Re: [OMPI devel] [EXTERNAL] Re: Unable to set flags using platform files in the 1.6 release";
include("../../include/msg-header.inc");
?>
<!-- received="Wed May 23 16:41:48 2012" -->
<!-- isoreceived="20120523204148" -->
<!-- sent="Wed, 23 May 2012 20:41:11 +0000" -->
<!-- isosent="20120523204111" -->
<!-- name="Barrett, Brian W" -->
<!-- email="bwbarre_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [EXTERNAL] Re: Unable to set flags using platform files in the 1.6 release" -->
<!-- id="CBE2A73C.ECC0%bwbarre_at_sandia.gov" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="5B214621-20AB-41BC-B9B4-DEE3FFC363B7_at_lanl.gov" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [EXTERNAL] Re: Unable to set flags using platform files in the 1.6 release<br>
<strong>From:</strong> Barrett, Brian W (<em>bwbarre_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-05-23 16:41:11
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11019.php">Josh Hursey: "Re: [OMPI devel] Building Open MPI without Java"</a>
<li><strong>Previous message:</strong> <a href="11017.php">Ralph Castain: "Re: [OMPI devel] Building Open MPI without Java"</a>
<li><strong>In reply to:</strong> <a href="11016.php">Gunter, David O: "Re: [OMPI devel] [EXTERNAL] Re: Unable to set flags using platform files in the 1.6 release"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11020.php">Ralph Castain: "Re: [OMPI devel] [EXTERNAL] Re: Unable to set flags using platform files in the 1.6 release"</a>
<li><strong>Reply:</strong> <a href="11020.php">Ralph Castain: "Re: [OMPI devel] [EXTERNAL] Re: Unable to set flags using platform files in the 1.6 release"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Yup, it sucks.  But that's not supported functionality.  Someone could
<br>
possibly desire to support it, but I could never get behavior I was
<br>
comfortable with, so I'm not making promises that should work.  The
<br>
platform thing is a real hack to begin with in terms of what it does to
<br>
autoconf...
<br>
<p>Brian
<br>
<p>On 5/23/12 2:37 PM, &quot;Gunter, David O&quot; &lt;dog_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt;So perhaps I should stop calling them environment variables. Since one
</span><br>
<span class="quotelev1">&gt;can always do something like
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;$ ./configure CFLAGS=&quot;-I/usr/include/specialK&quot; ...
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;a line such as 
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;CFLAGS=&quot;-I/usr/include/specialK&quot;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;should be supported by the platform file reader.  No two systems are
</span><br>
<span class="quotelev1">&gt;alike here and we need these platform files to manage the dozens of
</span><br>
<span class="quotelev1">&gt;different OMPI builds. We have different paths for the IB libs, Panasas
</span><br>
<span class="quotelev1">&gt;file system libs and includes, etc.  Essentially, we're not going to 1.6
</span><br>
<span class="quotelev1">&gt;at the moment.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;-david
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;--
</span><br>
<span class="quotelev1">&gt;David Gunter
</span><br>
<span class="quotelev1">&gt;HPC-3: Infrastructure Team
</span><br>
<span class="quotelev1">&gt;Los Alamos National Laboratory
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;On May 23, 2012, at 2:23 PM, Barrett, Brian W wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; David -
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Where exactly the platform file gets evaluated depends on a number of
</span><br>
<span class="quotelev2">&gt;&gt; things that the OMPI developers don't have a lot of control over.  It
</span><br>
<span class="quotelev2">&gt;&gt;was
</span><br>
<span class="quotelev2">&gt;&gt; never meant to be used to set environment variables, only command line
</span><br>
<span class="quotelev2">&gt;&gt; arguments.  It looks like something bad has happened with ordering; I'm
</span><br>
<span class="quotelev2">&gt;&gt; not sure when I'll be able to take a look, but we should be able to make
</span><br>
<span class="quotelev2">&gt;&gt; it evaluate sooner...
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Brian
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On 5/23/12 2:16 PM, &quot;Gunter, David O&quot; &lt;dog_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I think I have some understanding of what is happening. In version 1.6,
</span><br>
<span class="quotelev3">&gt;&gt;&gt; the check for the platform file occurs after some basic compiler
</span><br>
<span class="quotelev3">&gt;&gt;&gt;testing
</span><br>
<span class="quotelev3">&gt;&gt;&gt; has already occured:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (dog_at_tu-fe1 61%) ./configure --with-platform=non-existant
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;========================================================================
</span><br>
<span class="quotelev3">&gt;&gt;&gt;==
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ==
</span><br>
<span class="quotelev3">&gt;&gt;&gt; == Configuring Open MPI
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;========================================================================
</span><br>
<span class="quotelev3">&gt;&gt;&gt;==
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ==
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; *** Startup tests
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking build system type... x86_64-unknown-linux-gnu
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking host system type... x86_64-unknown-linux-gnu
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking target system type... x86_64-unknown-linux-gnu
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for gcc... gcc
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking whether the C compiler works... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for C compiler default output file name... a.out
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for suffix of executables...
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking whether we are cross compiling... no
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for suffix of object files... o
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking whether we are using the GNU C compiler... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking whether gcc accepts -g... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for gcc option to accept ISO C89... none needed
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking how to run the C preprocessor... gcc -E
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for grep that handles long lines and -e... /bin/grep
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for egrep... /bin/grep -E
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for ANSI C header files... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for sys/types.h... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for sys/stat.h... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for stdlib.h... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for string.h... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for memory.h... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for strings.h... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for inttypes.h... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for stdint.h... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for unistd.h... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking minix/config.h usability... no
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking minix/config.h presence... no
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking for minix/config.h... no
</span><br>
<span class="quotelev3">&gt;&gt;&gt; checking whether it is safe to define __EXTENSIONS__... yes
</span><br>
<span class="quotelev3">&gt;&gt;&gt; configure: error: platform file non-existant not found
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (dog_at_tu-fe1 62%)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; For OMPI 1.4.5, the platform file check occurs right off:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (dog_at_tu-fe1 13%) ./configure --with-platform=non-existant
</span><br>
<span class="quotelev3">&gt;&gt;&gt; configure: error: platform file non-existant not found
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; As it is in the newer release, it will fail to work for the PGI
</span><br>
<span class="quotelev3">&gt;&gt;&gt;compilers
</span><br>
<span class="quotelev3">&gt;&gt;&gt; then.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -david
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --
</span><br>
<span class="quotelev3">&gt;&gt;&gt; David Gunter
</span><br>
<span class="quotelev3">&gt;&gt;&gt; HPC-3: Infrastructure Team
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Los Alamos National Laboratory
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On May 23, 2012, at 12:21 PM, Gunter, David O wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I thought the purpose of the platform file was to be equivalent to
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; setting things on the command-line to configure. Still, it has always
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; worked that way for us.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Here's what I'm seeing:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; (dog_at_lo1-fe 297%) ./configure
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; --prefix=/usr/projects/hpcsoft/lobo/openmpi/1.6.0-pgi-12.4
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; --with-platform=./optimized-panasas-pgi
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;=======================================================================
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;==
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; ===
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; == Configuring Open MPI
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;=======================================================================
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;==
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; ===
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; *** Startup tests
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; checking build system type... x86_64-unknown-linux-gnu
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; checking host system type... x86_64-unknown-linux-gnu
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; checking target system type... x86_64-unknown-linux-gnu
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; checking for gcc...
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; /usr/projects/hpcsoft/lobo/pgi/linux86-64/12.4/bin/pgcc
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; checking whether the C compiler works... no
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; configure: error: in `/usr/projects/hpctools/dog/openmpi/openmpi-1.6':
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; configure: error: C compiler cannot create executables
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; See `config.log' for more details
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; The error happens because this particular compiler, pgi-12.4, needs
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;two
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; flags: -lnomp and -lnuma. Thus the reason for the LDFLAGS line in the
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; platform file.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; If I compile like this:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; (dog_at_lo1-fe 297%) ./configure
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; --prefix=/usr/projects/hpcsoft/lobo/openmpi/1.6.0-pgi-12.4
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; --with-platform=./optimized-panasas-pgi LDFLAGS=&quot;-nomp -lnuma&quot;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Then the configure proceeds normally.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; -david
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; David Gunter
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; HPC-3: Infrastructure Team
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Los Alamos National Laboratory
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On May 23, 2012, at 12:03 PM, Jeff Squyres (jsquyres) wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Can you send some output showing that those flags aren't passed
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; through, like some output from &quot;make V=1&quot; and or from config.log?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Offhand, I don't know if we ever formally supported setting env
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; variables other than enable and with flag variables in the platform
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; files...?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Sent from my phone. No type good.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On May 23, 2012, at 12:49 PM, &quot;Gunter, David O&quot; &lt;dog_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; I am trying to set LDFLAGS, CFLAGS, etc, in a platform file but the
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 1.6 release does not seem to pick these up.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Here's the tail end of one of our platform files, for building with
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; the latest PGI compilers:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; LDFLAGS=&quot;-nomp -lnuma&quot;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; CFLAGS=&quot;-I/opt/panfs/include&quot;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; CXXFLAGS=&quot;-I/opt/panfs/include&quot;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; FCFLAGS=&quot;-I/opt/panfs/include&quot;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; FFLAGS=&quot;-I/opt/panfs/include&quot;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; CCASFLAGS=&quot;-I/opt/panfs/include&quot;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; The same platform file will configure the 1.4.5 release just fine
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt;but
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; does not work with 1.6. If I set these variables in my environment
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt;and
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; then run configure, it works just fine - as expected.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Has anyone else noticed this behavior?
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; -david
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; David Gunter
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; HPC-3: Infrastructure Team
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Los Alamos National Laboratory
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; -- 
</span><br>
<span class="quotelev2">&gt;&gt;  Brian W. Barrett
</span><br>
<span class="quotelev2">&gt;&gt;  Dept. 1423: Scalable System Software
</span><br>
<span class="quotelev2">&gt;&gt;  Sandia National Laboratories
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
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
<span class="quotelev1">&gt;_______________________________________________
</span><br>
<span class="quotelev1">&gt;devel mailing list
</span><br>
<span class="quotelev1">&gt;devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><p><pre>
-- 
  Brian W. Barrett
  Dept. 1423: Scalable System Software
  Sandia National Laboratories
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11019.php">Josh Hursey: "Re: [OMPI devel] Building Open MPI without Java"</a>
<li><strong>Previous message:</strong> <a href="11017.php">Ralph Castain: "Re: [OMPI devel] Building Open MPI without Java"</a>
<li><strong>In reply to:</strong> <a href="11016.php">Gunter, David O: "Re: [OMPI devel] [EXTERNAL] Re: Unable to set flags using platform files in the 1.6 release"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11020.php">Ralph Castain: "Re: [OMPI devel] [EXTERNAL] Re: Unable to set flags using platform files in the 1.6 release"</a>
<li><strong>Reply:</strong> <a href="11020.php">Ralph Castain: "Re: [OMPI devel] [EXTERNAL] Re: Unable to set flags using platform files in the 1.6 release"</a>
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
