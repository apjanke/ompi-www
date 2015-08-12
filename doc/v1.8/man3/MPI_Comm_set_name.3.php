<?php
$topdir = "../../..";
$title = "MPI_Comm_set_name(3) man page (version 1.8.8)";
$meta_desc = "Open MPI v1.8.8 man page: MPI_COMM_SET_NAME(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_set_name</b> - Associates a name with a communicator.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C
Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_set_name(MPI_Comm comm, const char *comm_name)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_SET_NAME(COMM, COMM_NAME, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;CHARACTER*(*) COMM_NAME
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Comm::Set_name(const char* comm_name)
</pre>
<h2><a name='sect5' href='#toc5'>Input/Output Parameter</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator whose identifier is to be set (handle).

<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Input Parameter</a></h2>

<dl>

<dt>comm_name </dt>
<dd>Character string to be used as the identifier
for the communicator (string).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p>
<p> </dd>
</dl>

<h2><a name='sect8' href='#toc8'>Description</a></h2>
MPI_Comm_set_name allows a user to associate
a name string with a communicator. The character string that is passed to
MPI_Comm_set_name is saved inside the MPI library (so it can be freed by
the caller immediately after the call, or allocated on the stack). Leading
spaces in <i>name</i> are significant, but trailing ones are not. <p>
MPI_Comm_set_name
is a local (noncollective) operation, which affects only the name of the
communicator as seen in the process that made the MPI_Comm_set_name call.
There is no requirement that the same (or any) name be assigned to a communicator
in every process where it exists.  <p>
The length of the name that can be stored
is limited to the value of MPI_MAX_OBJECT_NAME in Fortran and MPI_MAX_OBJECT_NAME-1
in C and C++ (to allow for the null terminator). Attempts to set names longer
than this will result in truncation of the name. MPI_MAX_OBJECT_NAME must
have a value of at least 64.
<p>
<p>
<h2><a name='sect9' href='#toc9'>Notes</a></h2>
Since MPI_Comm_set_name is provided
to help debug code, it is sensible to give the same name to a communicator
in all of the processes where it exists, to avoid confusion.  <p>
Regarding
name length, under circumstances of store exhaustion, an attempt to set
a name of any length could fail; therefore, the value of MPI_MAX_OBJECT_NAME
should be viewed only as a strict upper bound on the name length, not a
guarantee that setting names of less than this length will always succeed.

<p>
<h2><a name='sect10' href='#toc10'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. C++ functions
do not return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect11' href='#toc11'>See Also</a></h2>
<a href="../man3/MPI_Comm_get_name.3.php">MPI_Comm_get_name</a> <p>

<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input/Output Parameter</a></li>
<li><a name='toc6' href='#sect6'>Input Parameter</a></li>
<li><a name='toc7' href='#sect7'>Output Parameter</a></li>
<li><a name='toc8' href='#sect8'>Description</a></li>
<li><a name='toc9' href='#sect9'>Notes</a></li>
<li><a name='toc10' href='#sect10'>Errors</a></li>
<li><a name='toc11' href='#sect11'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
