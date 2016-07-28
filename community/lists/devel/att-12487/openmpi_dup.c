#include <mpi.h>
#include <stdio.h>

/**
 * usage:

mpicc -std=gnu99 mpi_test.c && a.out

 * expected output:

first test:
second test:
third test:

 * actual output

first test:
second test:
recv_data[0]     = 131072
ref_recv_data[0] = 0
recv_data[1]     = -65536
ref_recv_data[1] = 2
third test:

*/

void do_test(MPI_Datatype * sends, int ref_recv_data[2]);

int main(void) {

  MPI_Init(NULL, NULL);

  int rank, size;

  MPI_Comm_rank(MPI_COMM_WORLD, &rank);
  MPI_Comm_size(MPI_COMM_WORLD, &size);

  if (size == 1) {

    {
      MPI_Datatype sends[2];

      {
        sends[0] = MPI_INT;
      }
      {
        int count = 1;
        int blocklength = 1;
        int array_of_displacements[] = {2};
        MPI_Type_create_indexed_block(count, blocklength, array_of_displacements,
                                      MPI_INT, &sends[1]);
        MPI_Type_commit(&sends[1]);
      }

      int ref_recv_data[2] = {0, 2};

      puts("first test:");
      do_test(sends, ref_recv_data);

      MPI_Type_free(&sends[1]);
    }

    {
      MPI_Datatype sends[2];

      {
        MPI_Type_dup(MPI_INT, &sends[0]);
        // by definition of MPI_Type_dup no MPI_Type_commit is required
      }
      {
        int count = 1;
        int blocklength = 1;
        int array_of_displacements[] = {2};
        MPI_Type_create_indexed_block(count, blocklength, array_of_displacements,
                                      MPI_INT, &sends[1]);
        MPI_Type_commit(&sends[1]);
      }

      int ref_recv_data[2] = {0, 2};

      puts("second test:");
      do_test(sends, ref_recv_data);

      MPI_Type_free(&sends[1]);
      MPI_Type_free(&sends[0]);
    }

    {
      MPI_Datatype sends[2];

      {
        MPI_Type_dup(MPI_INT, &sends[0]);
        // by definition of MPI_Type_dup no MPI_Type_commit is required
      }
      {
        int count = 1;
        int blocklength = 1;
        int array_of_displacements[] = {1};
        MPI_Type_create_indexed_block(count, blocklength, array_of_displacements,
                                      MPI_INT, &sends[1]);
        MPI_Type_commit(&sends[1]);
      }

      int ref_recv_data[2] = {0, 1};

      puts("third test:");
      do_test(sends, ref_recv_data);

      MPI_Type_free(&sends[1]);
      MPI_Type_free(&sends[0]);
    }
  }

  MPI_Finalize();

  return 0;
}

void do_test(MPI_Datatype * sends, int ref_recv_data[2]) {

  MPI_Datatype send_dt;

  {
    int count = 2;
    int array_of_blocklengths[] = {1, 1};
    MPI_Aint array_of_displacements[] = {0, 0};
    MPI_Type_create_struct(count, array_of_blocklengths, array_of_displacements,
                           sends, &send_dt);
    MPI_Type_commit(&send_dt);
  }

  int send_data[3] = {0,1,2};
  int recv_data[2] = {-1,-1};

  MPI_Request request;

  MPI_Irecv(recv_data, 2, MPI_INT, 0, 0, MPI_COMM_WORLD, &request);
  MPI_Send(send_data, 1, send_dt, 0, 0, MPI_COMM_WORLD);

  MPI_Waitall(1, &request, MPI_STATUSES_IGNORE);

  MPI_Type_free(&send_dt);

  for (int i = 0; i < sizeof(ref_recv_data) / sizeof(ref_recv_data[0]); ++i) {

    if (recv_data[i] != ref_recv_data[i])
      printf("recv_data[%d]     = %d\n"
             "ref_recv_data[%d] = %d\n",
             i, recv_data[i], i, ref_recv_data[i]);
  }
}

