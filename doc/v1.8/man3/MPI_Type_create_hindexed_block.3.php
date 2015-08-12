<?php
$topdir = "../../..";
$title = "MPI_Type_create_hindexed_block(3) man page (version 1.8.8)";
$meta_desc = "Open MPI v1.8.8 man page: MPI_TYPE_CREATE_HINDEXED_BLOCK(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b><a href="../man3/MPI_Type_create_indexed_block.3.php">MPI_Type_create_indexed_block</a>, MPI_Type_create_hindexed_block</b>
- Creates an indexed data type with the same block length for all blocks.

<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int <a href="../man3/MPI_Type_create_indexed_block.3.php">MPI_Type_create_indexed_block</a>(int count, int blocklength, const int
array_of_displacements[], MPI_Datatype oldtype, MPI_Datatype *newtype)
int MPI_Type_create_hindexed_block(int count, int blocklength, const int
array_of_displacements[], MPI_Datatype oldtype, MPI_Datatype *newtype)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
<a href="../man3/MPI_Type_create_indexed_block.3.php">MPI_TYPE_CREATE_INDEXED_BLOCK</a>(COUNT, BLOCKLENGTH,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;ARRAY_OF_DISPLACEMENTS, OLDTYPE, NEWTYPE, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, BLOCKLENGTH, ARRAY_OF_DISPLACEMENTS(*),
<tt> </tt>&nbsp;<tt> </tt>&nbsp;        OLDTYPE, NEWTYPE, IERROR
MPI_TYPE_CREATE_HINDEXED_BLOCK(COUNT, BLOCKLENGTH,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;ARRAY_OF_DISPLACEMENTS, OLDTYPE, NEWTYPE, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, BLOCKLENGTH, ARRAY_OF_DISPLACEMENTS(*),
<tt> </tt>&nbsp;<tt> </tt>&nbsp;        OLDTYPE, NEWTYPE, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI::Datatype MPI::Datatype::Create_indexed_block( int count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int blocklength, const int array_of_displacements[]) const
MPI::Datatype MPI::Datatype::Create_hindexed_block( int count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int blocklength, const int array_of_displacements[]) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>count </dt>
<dd>Length of array of displacements (integer). </dd>

<dt>blocklength
</dt>
<dd>Size of block (integer). </dd>

<dt>array_of_displacements </dt>
<dd>Array of displacements (array
of integers). In units of the extent of <i>oldtype</i> for <a href="../man3/MPI_Type_create_indexed_block.3.php">MPI_Type_create_indexed_block</a>
and bytes for MPI_Type_create_hindexed_block. </dd>

<dt>oldtype </dt>
<dd>Old data type (handle).

<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>newtype </dt>
<dd>New data type (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
<a href="../man3/MPI_Type_create_indexed_block.3.php">MPI_Type_create_indexed_block</a> and MPI_Type_create_hindexed_block
create an indexed data type with the same block length for all blocks. The
only difference between the two functions is <a href="../man3/MPI_Type_create_indexed_block.3.php">MPI_Type_create_indexed_block</a>
takes an array of displacements in units of the extent of <i>oldtype</i> while
MPI_Type_create_hindexed_block takes displacements in bytes.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. C++ functions do not
return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<a href="../man3/MPI_Type_indexed.3.php">MPI_Type_indexed</a> <br>

<p>  <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
