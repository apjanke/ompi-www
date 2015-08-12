<?php
$topdir = "../../..";
$title = "MPI_Type_extent(3) man page (version 1.8.8)";
$meta_desc = "Open MPI v1.8.8 man page: MPI_TYPE_EXTENT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Type_extent</b> - Returns the extent of a data type, the difference
between the upper and lower bounds of the data type -- use of this routine
is deprecated.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Type_extent(MPI_Datatype datatype, MPI_Aint *extent)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_TYPE_EXTENT(DATATYPE, EXTENT, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;DATATYPE, EXTENT, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameter</a></h2>

<dl>

<dt>datatype       </dt>
<dd>Datatype (handle). <p>
</dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>extent
      </dt>
<dd>Datatype extent (integer). <p>
</dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
Note that use of this routine is <i>deprecated</i> as of MPI-2. Please
use <a href="../man3/MPI_Type_get_extent.3.php">MPI_Type_get_extent</a> instead.  <p>
This deprecated routine is not available
in C++.  <p>
MPI_Type_extent returns the extent of a data type, the difference
between the upper and lower bounds of the data type.  <p>
In general, if <p>
<br>
<pre>    Typemap = {(type(0), disp(0)), ..., (type(n-1), disp(n-1))}
</pre><p>
then the lower bound of Typemap is defined to be  <p>
<br>
<pre>              ( min(j) disp(j)                         if no entry has
  lb(Typemap)=(                                        basic type lb
              (min(j) {disp(j) such that type(j) = lb} otherwise
</pre><p>
Similarly, the upper bound of Typemap is defined to be <p>
<br>
<pre>              (max(j) disp(j) + sizeof(type(j)) + e    if no entry has
  ub(Typemap)=(                                        basic type ub
              (max(j) {disp(j) such that type(j) = ub} otherwise
</pre><p>
Then  <p>
<br>
<pre>    extent(Typemap) = ub(Typemap) - lb(Typemap)
</pre><p>
If type(i) requires alignment to a byte address that is a multiple of k(i),
then e is the least nonnegative increment needed to round extent(Typemap)
to the next multiple of max(i) k(i).
<p>
<h2><a name='sect7' href='#toc7'>Errors</a></h2>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
<p>
<h2><a name='sect8' href='#toc8'>See Also</a></h2>
<p>
<a href="../man3/MPI_Type_get_extent.3.php">MPI_Type_get_extent</a> <br>

<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input Parameter</a></li>
<li><a name='toc5' href='#sect5'>Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Errors</a></li>
<li><a name='toc8' href='#sect8'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
