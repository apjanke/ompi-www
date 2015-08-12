<?php
$topdir = "../../..";
$title = "MPI_File_sync(3) man page (version 1.8.8)";
$meta_desc = "Open MPI v1.8.8 man page: MPI_FILE_SYNC(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_File_sync</b> - Makes semantics consistent for data-access operations
(collective).
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>
<br>
<pre>C Syntax
    #include &lt;mpi.h&gt;
    int MPI_File_sync(MPI_File fh)
</pre>
<h2><a name='sect2' href='#toc2'>Fortran Syntax</a></h2>
<br>
<pre>    INCLUDE &rsquo;mpif.h&rsquo;
    MPI_FILE_SYNC(FH, IERROR)
        <tt> </tt>&nbsp;<tt> </tt>&nbsp; INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;  FH, IERROR
</pre>
<h2><a name='sect3' href='#toc3'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::File::Sync()
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameter</a></h2>

<dl>

<dt>fh </dt>
<dd>File handle (handle).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran
only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
Calling MPI_File_sync with <i>fh</i>
causes all previous writes to  <i>fh</i> by the calling process to be written
to permanent storage. If other processes have made updates to permanent
storage, then all such updates become visible to subsequent reads of  <i>fh</i>
by the calling process. <p>
MPI_File_sync is a collective operation. The user
is responsible for ensuring that all nonblocking requests on  <i>fh</i> have been
completed before calling MPI_File_sync. Otherwise, the call to MPI_File_sync
is erroneous.
<p>
<h2><a name='sect7' href='#toc7'>Errors</a></h2>
Almost all MPI routines return an error value; C routines
as the value of the function and Fortran routines in the last argument.
C++ functions do not return errors. If the default error handler is set
to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
will be used to throw an MPI::Exception object. <p>
Before the error value is
returned, the current MPI error handler is called. For MPI I/O function
errors, the default error handler is set to MPI_ERRORS_RETURN. The error
handler may be changed with <a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>; the predefined error
handler MPI_ERRORS_ARE_FATAL may be used to make I/O errors fatal. Note
that MPI does not guarantee that an MPI program can continue past an error.

<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>Fortran Syntax</a></li>
<li><a name='toc3' href='#sect3'>C++ Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input Parameter</a></li>
<li><a name='toc5' href='#sect5'>Output Parameter</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
