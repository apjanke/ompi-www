#include <stdlib.h>
#include <mpi.h>

int main(int argc, char *argv[])
{
  int keyval;
  MPI_Win win = MPI_WIN_NULL;
  MPI_Comm comm = MPI_COMM_WORLD;
  MPI_Datatype datatype = MPI_BYTE;
  MPI_Init(&argc, &argv);
  
  MPI_Win_create_keyval(MPI_WIN_NULL_COPY_FN, MPI_WIN_NULL_DELETE_FN, &keyval, NULL);
  MPI_Win_create(MPI_BOTTOM, 0, 1, MPI_INFO_NULL, MPI_COMM_WORLD, &win);
  MPI_Win_set_attr(win, keyval, NULL);
  MPI_Win_delete_attr(win, keyval);
  MPI_Win_free(&win);
  MPI_Win_free_keyval(&keyval);

  MPI_Comm_create_keyval(MPI_COMM_NULL_COPY_FN, MPI_COMM_NULL_DELETE_FN, &keyval, NULL);
  MPI_Comm_set_attr(comm, keyval, NULL);
  MPI_Comm_delete_attr(comm, keyval);
  MPI_Comm_free_keyval(&keyval);
  
  MPI_Type_create_keyval(MPI_TYPE_NULL_COPY_FN, MPI_TYPE_NULL_DELETE_FN, &keyval, NULL);
  MPI_Type_set_attr(datatype, keyval, NULL);
  MPI_Type_delete_attr(datatype, keyval);
  MPI_Type_free_keyval(&keyval);

  MPI_Finalize();
  return 0;
}
