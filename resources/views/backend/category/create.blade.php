@extends('backend.layout.app')


@section('main-content')
<a class="btn btn-success" href="{{route('admin.category.list')}}">Category List</a>
   <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h2 class="card-title" style="text-align:center">Categoty Form</h2>
                
                <form class="forms-sample" id="myform">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Category Image</label>
                        <input type="file" name="img[]" id="category-image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                        <div class="img_prev" id="img-preview" style="display: none">
                            <!-- Image preview will be shown here -->
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary mr-2" id="cat_subnit_btn">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
   </div>
@endsection
@section('scripts')
    

<script>
    

    $(document).ready(function(){
        
        $('#cat_subnit_btn').on('click', function(){
        let name = $('#name').val();
        let image = $('#category-image')[0].files[0];

        if (name == '') {
            showToast('Enter A Category Name', 'error');
            return; 
        }

        if (!image) {
            showToast('Select A Category Image', 'error');
            return; 
        }

        let formData = new FormData();
        formData.append('image', image);
        formData.append('name', name);
        formData.append('_token', '{{ csrf_token() }}'); 

        $.ajax({
            url: '{{ route('admin.category.store') }}', 
            method: 'POST',
            data: formData,
            contentType: false, 
            processData: false,
            success: function(response) {
                if (response.status==true) {
                    $('.img_prev').hide();
                    $("#myform")[0].reset();
                    showToast(response.success, 'success');
                    
                }
                
            },
            
        });
    });





    });

</script>

@endsection



