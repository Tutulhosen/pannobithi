@extends('backend.layout.app')


@section('main-content')
<a class="btn btn-success" href="{{route('admin.category.page')}}">+ Create New Category</a>
   <div class="row">
    <div class="main-panel" style="padding-top:0px; !importent">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h2 class="card-title" style="text-align:center">Categoty List</h2>
                  
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody >
                        @foreach ($category_list as $category)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$category->name}}</td>
                            <td><img style="height: 50px;width:50px; object-fit:cover"  src="{{asset('images/categories/'.$category->image)}}" alt=""></td>
                            <td>
                                @if ($category->status==1)
                                 <label class="badge badge-success">Active</label>
                                @endif
                                @if ($category->status==0)
                                 <label class="badge badge-danger">Deactivate</label>
                                @endif
                              
                              
                            </td>
                            
                            <td>
                              <div style="display: flex; gap: 10px;">
                                  <a href="{{ route('admin.category.update.page', $category->id) }}" style="display: flex; justify-content: center; align-items: center; height: 30px; width: 30px; border-radius: 50%; background-color: rgb(125, 168, 209);">
                                      <i class="fa-solid fa-pen-to-square" style="color: blue; font-size: 16px;"></i>
                                  </a>
                                  <button value="{{$category->id}}" style="display: flex; justify-content: center; align-items: center; height: 30px; width: 30px;    border-radius: 50%; background-color: rgb(125, 168, 209);" id="cat_dlt_btn">
                                      <i class="fa-solid fa-trash" style="color: red; font-size: 16px;"></i>
                                  </button>
                                  @if ($category->status==1)
                                    <button value="{{$category->id}}" style="display: flex; justify-content: center; align-items: center; height: 30px; width: 30px; border-radius: 50%; background-color: rgb(125, 168, 209);" id="active_btn">
                                        <i class="fa-solid fa-toggle-on" style="color: green; font-size: 18px;"></i>
                                    </button>
                                  @endif
                                  @if ($category->status==0)
                                    <button value="{{$category->id}}" style="display: flex; justify-content: center; align-items: center; height: 30px; width: 30px; border-radius: 50%; background-color: rgb(125, 168, 209);" id="deactivate_btn">
                                        <i class="fa-solid fa-toggle-off" style="color: red; font-size: 18px;"></i>
                                    </button>
                                  @endif
                                  
                                  
                              </div>
                              
                              
                              
                            </td>
                          </tr>
                        @endforeach
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        
        <!-- partial -->
      </div>
   </div>
@endsection
@section('scripts')
    

<script>
    
    $(document).ready(function(){
        
        //delete category
        $(document).on('click', '#cat_dlt_btn', function(){
            Swal.fire({
                title: "<div style='color: black;'>Are you sure?</div>",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                customClass: {
                    popup: 'swal-small', // Apply custom class to the popup
                    title: 'swal-title-small', // Apply custom class to the title
                    cancelButton: 'swal-cancel-button-small', // Apply custom class to the cancel button
                    confirmButton: 'swal-confirm-button-small' // Apply custom class to the confirm button
                }
                }).then((result) => {
                if (result.isConfirmed) {
                    let id= $(this).val();
                   

                    $.ajax({
                       
                        url:"delete/" +id,
                        method: 'GET',
                        
                        
                        success: function(response) {
                            if (response.status==true) {
                                
                                Swal.fire({
                                    title: "<div style='color: black;'>Deleted</div>",
                                    text: "Successfully Delete A Category",
                                    icon: "success"
                                });
                                $(".table").load(" .table");
                                
                            }
                            if (response.status==false) {
                                
                                Swal.fire({
                                    title: "Warning!",
                                    text: "Category is not deleted",
                                    icon: "warning"
                                });
                                
                            }
                            
                        },
                        
                    });
                    
                }
            });
           
        });

        //click for deactivate
        $(document).on('click', '#active_btn', function(){
            Swal.fire({
                title: "<div style='color: black;'>Are you sure?</div>",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Confirm !"
            }).then((result) => {
                if (result.isConfirmed) {
                    let id= $(this).val();

                    $.ajax({
                        url:"status/update/" +id,
                        method: 'GET',
                        success: function(response) {
                            if (response.status==true) {
                                Swal.fire({
                                    title: "<div style='color: black;'>Successfully Deactive A Category</div>",
                                    icon: "success"
                                });
                                $(".table").load(" .table");
                            }
                            if (response.status==false) {
                                Swal.fire({
                                    title: "<div style='color: black;'>Something went wrong</div>",
                                    icon: "warning"
                                });
                            }
                        },
                    });
                }
            });
        });

        //click for Active
        $(document).on('click', '#deactivate_btn', function(){
            Swal.fire({
                title: "<div style='color: black;'>Are you sure?</div>",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Confirm !"
            }).then((result) => {
                if (result.isConfirmed) {
                    let id= $(this).val();

                    $.ajax({
                        url:"status/update/" +id,
                        method: 'GET',
                        success: function(response) {
                            if (response.status==true) {
                                Swal.fire({
                                    title: "<div style='color: black;'>Successfully Active A Category</div>",
                                    icon: "success"
                                });
                                $(".table").load(" .table");
                            }
                            if (response.status==false) {
                                Swal.fire({
                                    title: "<div style='color: black;'>Something went wrong</div>",
                                    icon: "warning"
                                });
                            }
                        },
                    });
                }
            });
        });


        
        





    });

</script>

@endsection



