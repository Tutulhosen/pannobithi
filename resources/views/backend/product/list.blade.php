@extends('backend.layout.app')


@section('main-content')
<a class="btn btn-success" href="{{route('admin.product.create')}}">+ Create New Product</a>
   <div class="row">
    <div class="main-panel" style="padding-top:0px; !importent">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h2 class="card-title" style="text-align:center">Product List</h2>
                  
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Sub Category</th>
                          <th>Price</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody >
                       
                        
                        
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
        
        //delete sub category
        $(document).on('click', '#sub_cat_dlt_btn', function(){
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
                                    text: "Successfully Delete A Sub Category",
                                    icon: "success"
                                });
                                $(".table").load(" .table");
                                
                            }
                            if (response.status==false) {
                                
                                Swal.fire({
                                    title: "Warning!",
                                    text: "Sub Category is not deleted",
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



