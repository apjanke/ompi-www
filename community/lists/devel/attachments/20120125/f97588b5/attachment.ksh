Index: ompi/mpi/f77/file_seek_shared_f.c
===================================================================
--- ompi/mpi/f77/file_seek_shared_f.c	(revision 25723)
+++ ompi/mpi/f77/file_seek_shared_f.c	(working copy)
@@ -62,6 +62,6 @@
 {    
     MPI_File c_fh = MPI_File_f2c(*fh);
 
-    *ierr = OMPI_INT_2_FINT(MPI_File_seek(c_fh, (MPI_Offset) *offset,
+    *ierr = OMPI_INT_2_FINT(MPI_File_seek_shared(c_fh, (MPI_Offset) *offset,
							 OMPI_FINT_2_INT(*whence)));
 }