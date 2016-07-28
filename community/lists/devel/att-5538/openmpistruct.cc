#include"mpi.h"
#include<iostream>

struct LocalIndex
{
  int local_;
  char attribute_;
  char public_;
};


struct IndexPair
{
  int global_;
  LocalIndex local_;
};
  

int main(int argc, char** argv)
{
  MPI_Init(&argc, &argv);

  int rank, size;
  
  MPI_Comm_rank(MPI_COMM_WORLD, &rank);
  MPI_Comm_size(MPI_COMM_WORLD, &size);

  if(size<2)
    {
      std::cerr<<"no procs has to be >2"<<std::endl;
      MPI_Abort(MPI_COMM_WORLD, 99);
    }  
  
  MPI_Datatype litype, ptype;
  // Create custom MPI datatypes
  {
    int length=1;
    MPI_Aint disp, origin, next;
    MPI_Datatype types = MPI_CHAR;
    LocalIndex rep[2];
    MPI_Address(rep, &origin); // lower bound of the datatype
    MPI_Address(&(rep[0].attribute_), &disp);
    MPI_Address(rep+1, &next);
    
    disp -= origin;
    next -= origin;
    MPI_Datatype tmptype;
    MPI_Type_struct(1, &length, &disp, &types, &litype);
    //MPI_Type_commit(&tmptype);
    //MPI_Type_create_resized(tmptype, (MPI_Aint)0, next, &litype);
    MPI_Type_commit(&litype);
    //MPI_Type_free(&tmptype);

    if(rank==0)
      {
	MPI_Aint lb,extent;
	MPI_Type_get_extent(litype, &lb, &extent);
	std::cout<<"litype: lb="<<lb<<" extend="<<extent<<std::endl;
	MPI_Type_get_true_extent(litype, &lb, &extent);
	std::cout<<"true litype: lb="<<lb<<" extend="<<extent<<std::endl;
	int size;
	MPI_Type_size(litype, &size);
	std::cout<<"litype size="<<size<<std::endl;
      }
  }
  
  {
    int length[2] ={1, 1};
    MPI_Aint disp[2], origin;
    MPI_Datatype types[2] = {MPI_INT, 
			     litype};
    IndexPair rep[2];

    MPI_Address(rep, &origin); // lower bound of the datatype
    MPI_Address(&(rep[0].global_), disp);
    MPI_Address(&(rep[0].local_), disp+1);
    for(int i=0; i < 2; ++i)
      disp[i] -= origin;
    MPI_Type_struct(2, length, disp, types, &ptype);
    MPI_Type_commit(&ptype);
    if(rank==0)
      {
	MPI_Aint lb,extent;
	MPI_Type_get_extent(ptype, &lb, &extent);
	std::cout<<"ptype: lb="<<lb<<" extend="<<extent<<std::endl;
	MPI_Type_get_true_extent(ptype, &lb, &extent);
	std::cout<<"true: ptype: lb="<<lb<<" extend="<<extent<<std::endl;
	int size;
	MPI_Type_size(ptype, &size);
	std::cout<<"ptype size="<<size<<std::endl;
	
      }
  }
  
  IndexPair pair;

  if(rank==0)
    {
      pair.global_=10;
      pair.local_.local_=1;
      pair.local_.attribute_='1';
      pair.local_.public_='1';
      MPI_Send(&pair, 1, ptype, 1, 199, MPI_COMM_WORLD);
      MPI_Send(&pair.local_, 1, litype, 1, 199, MPI_COMM_WORLD);
    }else
    {
      pair.global_=0;
      pair.local_.local_=100;
      pair.local_.attribute_='0';
      pair.local_.public_='0';
      if(rank==1)
	{
	  MPI_Status status;
	  MPI_Recv(&pair, 1, ptype, 0, 199, MPI_COMM_WORLD, &status);
	  std::cout<<"received global="<<pair.global_<<" attribute="<<
	    pair.local_.attribute_<<" (local="<<pair.local_.local_
		   <<" public="<<pair.local_.public_<<")"<<std::endl;
	  
	  pair.local_.local_=100;
	  pair.local_.attribute_='0';
	  pair.local_.public_='0';
	  MPI_Recv(&pair.local_, 1, litype, 0, 199, MPI_COMM_WORLD, &status);
	  std::cout<<"received  attribute="<<pair.local_.attribute_
		   <<" (local="<<pair.local_.local_
		   <<" public="<<pair.local_.public_<<")"<<std::endl;
	}
    }
  MPI_Barrier(MPI_COMM_WORLD);
  MPI_Finalize();
  
}

