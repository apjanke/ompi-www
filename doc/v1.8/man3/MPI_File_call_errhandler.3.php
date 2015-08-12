<?php
$topdir = "../../..";
$title = "MPI_File_call_errhandler(3) man page (version 1.8.8)";
$meta_desc = "Open MPI v1.8.8 man page: MPI_FILE_CALL_ERRHANDLER(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<p>
<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_File_call_errhandler</b> - Passes the supplied error code to the

<p>error handler assigned to a file
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<p>
<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_File_call_errhandler(MPI_File fh, int errorcode)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_FILE_CALL_ERRHANDLER(FH, ERRORCODE, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;FH, IERRORCODE, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::File::Call_errhandler(int errorcode) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>fh </dt>
<dd>file with error handler (handle). </dd>

<dt>errorcode </dt>
<dd>MPI error
code (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
This function invokes the error handler assigned to the file
handle <i>fh</i> with the supplied error code <i>errorcode</i>. If the error handler was
successfully called, the process is not aborted, and the error handler
returns, this function returns MPI_SUCCESS. <p>
Unlike errors on communicators
and windows, the default errorhandler for files is MPI_ERRORS_RETURN.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. C++ functions do not
return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
See the MPI man page for a full list of MPI error codes.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_File_create_errhandler.3.php">MPI_File_create_errhandler</a>
<a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
