<? include("../../include/msg-header.inc"); ?>
<!-- received="Mon Jul 23 20:56:35 2007" -->
<!-- isoreceived="20070724005635" -->
<!-- sent="Mon, 23 Jul 2007 21:56:28 -0300" -->
<!-- isosent="20070724005628" -->
<!-- name="Lisandro Dalcin" -->
<!-- email="dalcinl_at_[hidden]" -->
<!-- subject="[OMPI devel] MPI_ALLOC_MEM warning when requesting 0 (zero) bytes" -->
<!-- id="e7ba66e40707231756h6cdac8abk67bbb652d9defbe9_at_mail.gmail.com" -->
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
<strong>From:</strong> Lisandro Dalcin (<em>dalcinl_at_[hidden]</em>)<br>
<strong>Date:</strong> 2007-07-23 20:56:28
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="1978.php">Jeff Squyres: "Re: [OMPI devel] MPI_ALLOC_MEM warning when requesting 0 (zero) bytes"</a>
<li><strong>Previous message:</strong> <a href="1976.php">Lisandro Dalcin: "[OMPI devel] MPI_APPNUM value for apps not started through mpiexec"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="1978.php">Jeff Squyres: "Re: [OMPI devel] MPI_ALLOC_MEM warning when requesting 0 (zero) bytes"</a>
<li><strong>Reply:</strong> <a href="1978.php">Jeff Squyres: "Re: [OMPI devel] MPI_ALLOC_MEM warning when requesting 0 (zero) bytes"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
If I understand correctly the standard,
<br>
<a href="http://www.mpi-forum.org/docs/mpi-20-html/node54.htm#Node54">http://www.mpi-forum.org/docs/mpi-20-html/node54.htm#Node54</a>
<br>
<p>MPI_ALLOC_MEM with size=0 is valid ('size' is a nonnegative integer)
<br>
<p>Then, using branch v1.2, I've got the following warning at runtime:
<br>
<p>malloc debug: Request for 0 bytes (base/mpool_base_alloc.c, 194)
<br>
<p>As always, forget me if this was already reported.
<br>
<p>Regards,
<br>
<p><pre>
-- 
Lisandro Dalc&#237;n
---------------
Centro Internacional de M&#233;todos Computacionales en Ingenier&#237;a (CIMEC)
Instituto de Desarrollo Tecnol&#243;gico para la Industria Qu&#237;mica (INTEC)
Consejo Nacional de Investigaciones Cient&#237;ficas y T&#233;cnicas (CONICET)
PTLC - G&#252;emes 3450, (3000) Santa Fe, Argentina
Tel/Fax: +54-(0)342-451.1594
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="1978.php">Jeff Squyres: "Re: [OMPI devel] MPI_ALLOC_MEM warning when requesting 0 (zero) bytes"</a>
<li><strong>Previous message:</strong> <a href="1976.php">Lisandro Dalcin: "[OMPI devel] MPI_APPNUM value for apps not started through mpiexec"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="1978.php">Jeff Squyres: "Re: [OMPI devel] MPI_ALLOC_MEM warning when requesting 0 (zero) bytes"</a>
<li><strong>Reply:</strong> <a href="1978.php">Jeff Squyres: "Re: [OMPI devel] MPI_ALLOC_MEM warning when requesting 0 (zero) bytes"</a>
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
