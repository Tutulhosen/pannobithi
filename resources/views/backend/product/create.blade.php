@extends('backend.layout.app')


@section('main-content')
<a class="btn btn-success" href="{{route('admin.product.list')}}">Product List</a>
   <div class="row">
        
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h2 class="card-title" style="text-align:center">Product Form</h2>
                
                <form class="forms-sample" id="myform">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_code">Product Code</label>
                                <input type="text" class="form-control" id="product_code" placeholder="Product code">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Title">
                            </div>
        
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" id="category_id" name="category_id">
                                <option value="">--Select--</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                               
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Sub Category</label>
                                <select class="form-control" id="sub_category_id" name="sub_category_id">
                                <option value="">--Select--</option>
                                @foreach ($subcategory as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                               
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label>Size</label>
                                <select class="js-example-basic-multiple " multiple="multiple" style="width:100%">
                                  <option value="S"></option>
                                  <option value="M">M</option>
                                  <option value="L">L</option>
                                  <option value="XL">XL</option>
                                  <option value="XXL">XXL</option>
                                  <option value="5">5</option>
                                  <option value="5.5">5.5</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" placeholder="price">
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input type="number" class="form-control" id="discount" placeholder="discount">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" placeholder="quantity">
                            </div>
                            <div class="form-group">
                                <label>Thumbnail Image</label>
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
                            <div class="form-group">
                                <label>Gallery</label>
                                <input type="file" multiple name="gallery[]" id="gallery" class="file-upload-default" onchange="previewImages()">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                                <div class="gallery_prev" id="gallery-preview">
                                    <!-- Image preview will be shown here -->
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3" style="text-align: right">
                            <button class="btn btn-dark">Cancel</button>
                            <button type="button" class="btn btn-primary mr-2" id="product_submit_btn" >Submit</button>
                        </div>
                    </div>
                    
                    
                </form>
                </div>
            </div>
        </div>
       
   </div>
@endsection
@section('scripts')
    

<script>
    

    $(document).ready(function(){
        
        $('#product_submit_btn').on('click', function(){
            
            // Gather all input values
            var product_code = $('#product_code').val();
            var title = $('#title').val();
            var category_id = $('#category_id').val();
            var sub_category_id = $('#sub_category_id').val();
            var size = $('.js-example-basic-multiple').val(); // Assuming you're using a plugin like Select2 for multiple selection
            var description = $('#description').val();
            var price = $('#price').val();
            var discount = $('#discount').val();
            var quantity = $('#quantity').val();
            var thumbnailImage = $('#category-image')[0].files[0]; // Assuming you're uploading a single thumbnail image
            var galleryImages = $('#gallery')[0].files; // Assuming you're uploading multiple gallery images
            
            if (product_code == '') {
                showToast('Enter The Product Code', 'error');
                return; 
            }
            if (title == '') {
                showToast('Enter A Product Title', 'error');
                return; 
            }

            if (category_id == '') {
                showToast('Select A Category', 'error');
                return; 
            }
            if (sub_category_id == '') {
                showToast('Select A Sub Category', 'error');
                return; 
            }
            if (size == '') {
                showToast('Select A Product Size', 'error');
                return; 
            }
            if (description == '') {
                showToast('Enter Some Product Description', 'error');
                return; 
            }
            if (price == '') {
                showToast('Enter The Product Price', 'error');
                return; 
            }
            if (thumbnailImage==undefined) {
                showToast('Select A Thumbnail Image', 'error');
                return; 
            }
            if (galleryImages.length == 0) {
                showToast('Select Some Gallery Image', 'error');
                return; 
            }

            // Create a FormData object to send data with AJAX
            var formData = new FormData();
            formData.append('product_code', product_code);
            formData.append('title', title);
            formData.append('category_id', category_id);
            formData.append('sub_category_id', sub_category_id);
            formData.append('size', size);
            formData.append('description', description);
            formData.append('price', price);
            formData.append('discount', discount);
            formData.append('quantity', quantity);
            formData.append('thumbnail_image', thumbnailImage);
            for (var i = 0; i < galleryImages.length; i++) {
                formData.append('gallery_images[]', galleryImages[i]);
            }
            formData.append('_token', '{{ csrf_token() }}');

            // Send data using AJAX
            $.ajax({
                url: "{{ route('admin.product.store') }}",
                method: 'POST',
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if (response.status == true) {
                        $('.img_prev').hide();
                        $('.gallery_prev').hide();
                        $("#myform")[0].reset(); 
                        showToast(response.success, 'success');
                    }
                },
            });
        });





    });

</script>

@endsection



