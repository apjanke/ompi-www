<?
$subject_val = "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r17983";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Mar 26 20:12:41 2008" -->
<!-- isoreceived="20080327001241" -->
<!-- sent="Wed, 26 Mar 2008 20:10:40 -0400" -->
<!-- isosent="20080327001040" -->
<!-- name="Jeff Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r17983" -->
<!-- id="B3DD6D41-55FB-443D-A6E2-F4815BC0C60A_at_cisco.com" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="200803262320.m2QNKaoe016586_at_sourcehaven.osl.iu.edu" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r17983<br>
<strong>From:</strong> Jeff Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2008-03-26 20:10:40
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3541.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r17983"</a>
<li><strong>Previous message:</strong> <a href="3539.php">Josh Hursey: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r17956"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="3541.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r17983"</a>
<li><strong>Reply:</strong> <a href="3541.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r17983"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
What's Interix?
<br>
<p>On Mar 26, 2008, at 7:20 PM, bosilca_at_[hidden] wrote:
<br>
<span class="quotelev1">&gt; Author: bosilca
</span><br>
<span class="quotelev1">&gt; Date: 2008-03-26 19:20:33 EDT (Wed, 26 Mar 2008)
</span><br>
<span class="quotelev1">&gt; New Revision: 17983
</span><br>
<span class="quotelev1">&gt; URL: <a href="https://svn.open-mpi.org/trac/ompi/changeset/17983">https://svn.open-mpi.org/trac/ompi/changeset/17983</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Log:
</span><br>
<span class="quotelev1">&gt; Add support for Interix.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Added:
</span><br>
<span class="quotelev1">&gt;   trunk/config/ompi_interix.m4   (contents, props changed)
</span><br>
<span class="quotelev1">&gt; Text files modified:
</span><br>
<span class="quotelev1">&gt;   trunk/acinclude.m4 |     1 +
</span><br>
<span class="quotelev1">&gt;   trunk/configure.ac |     3 +++
</span><br>
<span class="quotelev1">&gt;   2 files changed, 4 insertions(+), 0 deletions(-)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Modified: trunk/acinclude.m4
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; ======================================================================
</span><br>
<span class="quotelev1">&gt; --- trunk/acinclude.m4	(original)
</span><br>
<span class="quotelev1">&gt; +++ trunk/acinclude.m4	2008-03-26 19:20:33 EDT (Wed, 26 Mar 2008)
</span><br>
<span class="quotelev1">&gt; @@ -108,6 +108,7 @@
</span><br>
<span class="quotelev1">&gt; # Include the macros for Windows checking
</span><br>
<span class="quotelev1">&gt; #
</span><br>
<span class="quotelev1">&gt; m4_include(config/ompi_microsoft.m4)
</span><br>
<span class="quotelev1">&gt; +m4_include(config/ompi_interix.m4)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; #
</span><br>
<span class="quotelev1">&gt; # The config/mca_no_configure_components.m4 file is generated by
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Added: trunk/config/ompi_interix.m4
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; =
</span><br>
<span class="quotelev1">&gt; ======================================================================
</span><br>
<span class="quotelev1">&gt; --- (empty file)
</span><br>
<span class="quotelev1">&gt; +++ trunk/config/ompi_interix.m4	2008-03-26 19:20:33 EDT (Wed, 26  
</span><br>
<span class="quotelev1">&gt; Mar 2008)
</span><br>
<span class="quotelev1">&gt; @@ -0,0 +1,56 @@
</span><br>
<span class="quotelev1">&gt; +dnl -*- shell-script -*-
</span><br>
<span class="quotelev1">&gt; +dnl
</span><br>
<span class="quotelev1">&gt; +dnl Copyright (c)      2008 The University of Tennessee and The  
</span><br>
<span class="quotelev1">&gt; University
</span><br>
<span class="quotelev1">&gt; +dnl                         of Tennessee Research Foundation.  All  
</span><br>
<span class="quotelev1">&gt; rights
</span><br>
<span class="quotelev1">&gt; +dnl                         reserved.
</span><br>
<span class="quotelev1">&gt; +dnl $COPYRIGHT$
</span><br>
<span class="quotelev1">&gt; +dnl
</span><br>
<span class="quotelev1">&gt; +dnl Additional copyrights may follow
</span><br>
<span class="quotelev1">&gt; +dnl
</span><br>
<span class="quotelev1">&gt; +dnl $HEADER$
</span><br>
<span class="quotelev1">&gt; +dnl
</span><br>
<span class="quotelev1">&gt; +
</span><br>
<span class="quotelev1">&gt; + 
</span><br>
<span class="quotelev1">&gt; ######################################################################
</span><br>
<span class="quotelev1">&gt; +#
</span><br>
<span class="quotelev1">&gt; +# OMPI_INTERIX
</span><br>
<span class="quotelev1">&gt; +#
</span><br>
<span class="quotelev1">&gt; +# Detect if the environment is SUA/SFU (i.e. Interix) and modify
</span><br>
<span class="quotelev1">&gt; +# the compiling environment accordingly.
</span><br>
<span class="quotelev1">&gt; +#
</span><br>
<span class="quotelev1">&gt; +# USAGE:
</span><br>
<span class="quotelev1">&gt; +#   OMPI_INTERIX()
</span><br>
<span class="quotelev1">&gt; +#
</span><br>
<span class="quotelev1">&gt; + 
</span><br>
<span class="quotelev1">&gt; ######################################################################
</span><br>
<span class="quotelev1">&gt; +AC_DEFUN([OMPI_INTERIX],[
</span><br>
<span class="quotelev1">&gt; +
</span><br>
<span class="quotelev1">&gt; +    AC_MSG_CHECKING(for Interix environment)
</span><br>
<span class="quotelev1">&gt; +    AC_TRY_COMPILE([],
</span><br>
<span class="quotelev1">&gt; +                   [#if !defined(__INTERIX)
</span><br>
<span class="quotelev1">&gt; +                    #error Normal Unix environment
</span><br>
<span class="quotelev1">&gt; +                    #endif],
</span><br>
<span class="quotelev1">&gt; +                   is_interix=yes,
</span><br>
<span class="quotelev1">&gt; +                   is_interix=no)
</span><br>
<span class="quotelev1">&gt; +    AC_MSG_RESULT([$is_interix])
</span><br>
<span class="quotelev1">&gt; +    if test &quot;$is_interix&quot; = &quot;yes&quot;; then
</span><br>
<span class="quotelev1">&gt; +
</span><br>
<span class="quotelev1">&gt; +        ompi_show_subtitle &quot;Interix detection&quot;
</span><br>
<span class="quotelev1">&gt; +
</span><br>
<span class="quotelev1">&gt; +        if ! test -d /usr/include/port; then
</span><br>
<span class="quotelev1">&gt; +            AC_MSG_WARN([Compiling Open MPI under Interix require  
</span><br>
<span class="quotelev1">&gt; an up-to-date])
</span><br>
<span class="quotelev1">&gt; +            AC_MSG_WARN([version of libport. Please ask your system  
</span><br>
<span class="quotelev1">&gt; administrator])
</span><br>
<span class="quotelev1">&gt; +            AC_MSG_WARN([to install it (pkg_update -L libport).])
</span><br>
<span class="quotelev1">&gt; +            AC_MSG_ERROR([*** Cannot continue])
</span><br>
<span class="quotelev1">&gt; +        fi
</span><br>
<span class="quotelev1">&gt; +        #
</span><br>
<span class="quotelev1">&gt; +        # These are the minimum requirements for Interix ...
</span><br>
<span class="quotelev1">&gt; +        #
</span><br>
<span class="quotelev1">&gt; +        AC_MSG_WARN([    -lport was added to the linking flags])
</span><br>
<span class="quotelev1">&gt; +        LDFLAGS=&quot;-lport $LDFLAGS&quot;
</span><br>
<span class="quotelev1">&gt; +        AC_MSG_WARN([    -D_ALL_SOURCE -D_USE_LIBPORT was added to  
</span><br>
<span class="quotelev1">&gt; the compilation flags])
</span><br>
<span class="quotelev1">&gt; +        CFLAGS=&quot;-D_ALL_SOURCE -D_USE_LIBPORT -I/usr/include/port  
</span><br>
<span class="quotelev1">&gt; $CFLAGS&quot;
</span><br>
<span class="quotelev1">&gt; +        CPPFLAGS=&quot;-D_ALL_SOURCE -D_USE_LIBPORT -I/usr/include/port  
</span><br>
<span class="quotelev1">&gt; $CPPFLAGS&quot;
</span><br>
<span class="quotelev1">&gt; +        CXXFLAGS=&quot;-D_ALL_SOURCE -D_USE_LIBPORT -I/usr/include/port  
</span><br>
<span class="quotelev1">&gt; $CXXFLAGS&quot;
</span><br>
<span class="quotelev1">&gt; +
</span><br>
<span class="quotelev1">&gt; +    fi
</span><br>
<span class="quotelev1">&gt; +
</span><br>
<span class="quotelev1">&gt; +])
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Modified: trunk/configure.ac
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; ======================================================================
</span><br>
<span class="quotelev1">&gt; --- trunk/configure.ac	(original)
</span><br>
<span class="quotelev1">&gt; +++ trunk/configure.ac	2008-03-26 19:20:33 EDT (Wed, 26 Mar 2008)
</span><br>
<span class="quotelev1">&gt; @@ -192,6 +192,9 @@
</span><br>
<span class="quotelev1">&gt; AM_CONDITIONAL(OMPI_NEED_WINDOWS_REPLACEMENTS,
</span><br>
<span class="quotelev1">&gt;                test &quot;$ompi_cv_c_compiler_vendor&quot; = &quot;microsoft&quot; )
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; +# Do all Interix detections if necessary
</span><br>
<span class="quotelev1">&gt; +OMPI_INTERIX
</span><br>
<span class="quotelev1">&gt; +
</span><br>
<span class="quotelev1">&gt; # Does the compiler support &quot;ident&quot;-like constructs?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; OMPI_CHECK_IDENT([CC], [CFLAGS], [c], [C])
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; svn-full mailing list
</span><br>
<span class="quotelev1">&gt; svn-full_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/svn-full">http://www.open-mpi.org/mailman/listinfo.cgi/svn-full</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
Cisco Systems
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="3541.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r17983"</a>
<li><strong>Previous message:</strong> <a href="3539.php">Josh Hursey: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r17956"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="3541.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r17983"</a>
<li><strong>Reply:</strong> <a href="3541.php">George Bosilca: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r17983"</a>
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
