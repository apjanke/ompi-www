<?
$subject_val = "[OMPI devel] 1.7.0rc5 - FORTRAN build failure w /pathcc-4.0.12.1";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Oct 31 00:03:25 2012" -->
<!-- isoreceived="20121031040325" -->
<!-- sent="Tue, 30 Oct 2012 21:03:07 -0700" -->
<!-- isosent="20121031040307" -->
<!-- name="Paul Hargrove" -->
<!-- email="phhargrove_at_[hidden]" -->
<!-- subject="[OMPI devel] 1.7.0rc5 - FORTRAN build failure w /pathcc-4.0.12.1" -->
<!-- id="CAAvDA17cBGw_+YxifXxBwmjens-bsA5CYrUROy4TMONm7ixtwg_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
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
<strong>Subject:</strong> [OMPI devel] 1.7.0rc5 - FORTRAN build failure w /pathcc-4.0.12.1<br>
<strong>From:</strong> Paul Hargrove (<em>phhargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-10-31 00:03:07
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11697.php">Paul Hargrove: "[OMPI devel] 1.7.0rc5 - FOTRAN build failure with Open64 compilers"</a>
<li><strong>Previous message:</strong> <a href="11695.php">Paul Hargrove: "[OMPI devel] 1.7.0rc5 - build failure w/ gcc-3.4.6/x86-64 (regression)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11699.php">Paul Hargrove: "Re: [OMPI devel] 1.7.0rc5 - FORTRAN build failure w /pathcc-4.0.12.1"</a>
<li><strong>Reply:</strong> <a href="11699.php">Paul Hargrove: "Re: [OMPI devel] 1.7.0rc5 - FORTRAN build failure w /pathcc-4.0.12.1"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I have a Linux/x86-64 system with PathScale's &quot;ekopath-4.0.12.1&quot; compilers.
<br>
<p>Building Fortran 2008 support fails as shown below.
<br>
<p>My records show the ompi-1.5 branch and a Feb 2012 trunk were OK on this
<br>
configuration.
<br>
<p>-Paul
<br>
<p><p>&nbsp;&nbsp;PPFC     mpi-f08-interfaces-callbacks.lo
<br>
<p>module mpi_f08_interfaces_callbacks
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;^
<br>
pathf95-855 pathf95: ERROR MPI_F08_INTERFACES_CALLBACKS, File =
<br>
/global/homes/h/hargrove/GSCRATCH/OMPI/openmpi-1.7rc5-linux-x86_64-pathcc-4.0/openmpi-1.7rc5/ompi/mpi/fortran/base/mpi-f08-interfaces-callbacks.F90,
<br>
Line = 9, Column = 8
<br>
&nbsp;&nbsp;The compiler has detected errors in module
<br>
&quot;MPI_F08_INTERFACES_CALLBACKS&quot;.  No module information file will be created
<br>
for this module.
<br>
<p><p>&nbsp;attribute_val_in,attribute_val_out,flag,ierror) &amp;
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;^
<br>
pathf95-1691 pathf95: ERROR MPI_COMM_COPY_ATTR_FUNCTION, File =
<br>
/global/homes/h/hargrove/GSCRATCH/OMPI/openmpi-1.7rc5-linux-x86_64-pathcc-4.0/openmpi-1.7rc5/ompi/mpi/fortran/base/mpi-f08-interfaces-callbacks.F90,
<br>
Line = 66, Column = 75
<br>
&nbsp;&nbsp;For &quot;FLAG&quot;, LOGICAL(KIND=4) not allowed with BIND(C)
<br>
<p><p>attribute_val_in,attribute_val_out,flag,ierror) &amp;
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;^
<br>
pathf95-1691 pathf95: ERROR MPI_WIN_COPY_ATTR_FUNCTION, File =
<br>
/global/homes/h/hargrove/GSCRATCH/OMPI/openmpi-1.7rc5-linux-x86_64-pathcc-4.0/openmpi-1.7rc5/ompi/mpi/fortran/base/mpi-f08-interfaces-callbacks.F90,
<br>
Line = 91, Column = 74
<br>
&nbsp;&nbsp;For &quot;FLAG&quot;, LOGICAL(KIND=4) not allowed with BIND(C)
<br>
<p><p><p>&nbsp;attribute_val_in,attribute_val_out,flag,ierror) &amp;
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;^
<br>
pathf95-1691 pathf95: ERROR MPI_TYPE_COPY_ATTR_FUNCTION, File =
<br>
/global/homes/h/hargrove/GSCRATCH/OMPI/openmpi-1.7rc5-linux-x86_64-pathcc-4.0/openmpi-1.7rc5/ompi/mpi/fortran/base/mpi-f08-interfaces-callbacks.F90,
<br>
Line = 116, Column = 75
<br>
&nbsp;&nbsp;For &quot;FLAG&quot;, LOGICAL(KIND=4) not allowed with BIND(C)
<br>
<p>SUBROUTINE MPI_Grequest_cancel_function(extra_state,complete,ierror) &amp;
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;^
<br>
pathf95-1691 pathf95: ERROR MPI_GREQUEST_CANCEL_FUNCTION, File =
<br>
/global/homes/h/hargrove/GSCRATCH/OMPI/openmpi-1.7rc5-linux-x86_64-pathcc-4.0/openmpi-1.7rc5/ompi/mpi/fortran/base/mpi-f08-interfaces-callbacks.F90,
<br>
Line = 195, Column = 53
<br>
&nbsp;&nbsp;For &quot;COMPLETE&quot;, LOGICAL(KIND=4) not allowed with BIND(C)
<br>
<p>pathf95: PathScale(TM) Fortran Version 4.0.12.1 (f14) Tue Oct 30, 2012
<br>
&nbsp;20:45:48
<br>
pathf95: 429 source lines
<br>
pathf95: 5 Error(s), 0 Warning(s), 0 Other message(s), 0 ANSI(s)
<br>
pathf95: &quot;explain pathf95-message number&quot; gives more information about each
<br>
message
<br>
make[2]: *** [mpi-f08-interfaces-callbacks.lo] Error 1
<br>
make[2]: Leaving directory
<br>
`/global/scratch/sd/hargrove/OMPI/openmpi-1.7rc5-linux-x86_64-pathcc-4.0/BLD/ompi/mpi/fortran/base'
<br>
make[1]: *** [all-recursive] Error 1
<br>
make[1]: Leaving directory
<br>
`/global/scratch/sd/hargrove/OMPI/openmpi-1.7rc5-linux-x86_64-pathcc-4.0/BLD/ompi'
<br>
make: *** [all-recursive] Error 1
<br>
<p><p><p>On Tue, Oct 30, 2012 at 7:01 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Hi folks
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; We have posted the next release candidate (rc5) for the 1.7.0 release in
</span><br>
<span class="quotelev1">&gt; the usual place:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/software/ompi/v1.7/">http://www.open-mpi.org/software/ompi/v1.7/</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Please put it thru the wringer to help us validate it prior to release
</span><br>
<span class="quotelev1">&gt; later this month. We think this looks pretty complete, pending someone
</span><br>
<span class="quotelev1">&gt; finding a problem.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Thanks
</span><br>
<span class="quotelev1">&gt; Ralph
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
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-11696/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11697.php">Paul Hargrove: "[OMPI devel] 1.7.0rc5 - FOTRAN build failure with Open64 compilers"</a>
<li><strong>Previous message:</strong> <a href="11695.php">Paul Hargrove: "[OMPI devel] 1.7.0rc5 - build failure w/ gcc-3.4.6/x86-64 (regression)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11699.php">Paul Hargrove: "Re: [OMPI devel] 1.7.0rc5 - FORTRAN build failure w /pathcc-4.0.12.1"</a>
<li><strong>Reply:</strong> <a href="11699.php">Paul Hargrove: "Re: [OMPI devel] 1.7.0rc5 - FORTRAN build failure w /pathcc-4.0.12.1"</a>
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
