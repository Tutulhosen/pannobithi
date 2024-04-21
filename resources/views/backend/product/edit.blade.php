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
                <input type="hidden" name="product_id" id="product_id" value="{{$product_list->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text" class="form-control" value="{{$product_list->product_code}}" id="product_code" placeholder="Product code">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" value="{{$product_list->title}}" placeholder="Title">
                        </div>
    
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                            <option value="">--Select--</option>
                            @foreach ($category as $item)
                                @if ($product_list->category_id == $item->id)
                                    <?php
                                        echo $selected= 'selected';
                                    ?>
                                @else
                                    <?php
                                        echo $selected= '';
                                    ?>
                                @endif
                                <option value="{{$item->id}}" {{$selected}}>{{$item->name}}</option>
                                
                            @endforeach
                           
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Sub Category</label>
                            <select class="form-control" id="sub_category_id" name="sub_category_id">
                            <option value="">--Select--</option>
                            @foreach ($subcategory as $item)
                                    @if ($product_list->sub_category == $item->id)
                                        <?php
                                            echo $selected= 'selected';
                                        ?>
                                    @else
                                        <?php
                                            echo $selected= '';
                                        ?>
                                    @endif
                                    <option value="{{$item->id}}" {{$selected}}>{{$item->name}}</option>
                                
                            @endforeach
                           
                            </select>
                        </div>
                       
                        <div class="form-group">
                            <label>Size</label>
                            <select class="js-example-basic-multiple " multiple="multiple" style="width:100%">
                                @foreach (['S', 'M', 'L', 'XL', 'XXL', '5', '5.5', '12', '13'] as $size)
                                 <option value="{{ $size }}" @if (in_array($size, json_decode($product_list->size))) selected @endif>{{ $size }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="4">{{$product_list->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" value="{{$product_list->price}}" placeholder="price">
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" class="form-control" id="discount" value="{{$product_list->discount}}" placeholder="discount">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" value="{{$product_list->quantity}}" placeholder="quantity">
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
                            <div class="img_prev" id="img-preview">
                                <!-- Previous thumbnail image will be shown here -->
                                <img style="height: 100px; width:100px; object-fit:cover" src="{{asset('images/galleries/'.$product_list->thumbnail)}}" alt="Previous Thumbnail Image">
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
                                @foreach ($gallery as $image)
                                    <img style="height: 100px; width:100px; object-fit:cover" src="{{asset('images/galleries/'.$image->image_name)}}" alt="Gallery Image">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3" style="text-align: right">
                        <button class="btn btn-dark">Cancel</button>
                        <button type="button" class="btn btn-primary mr-2" id="product_update_btn" >Update</button>
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
        
        $('#product_update_btn').on('click', function(){
            
            var product_id = $('#product_id').val();
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
            // if (thumbnailImage==undefined) {
            //     showToast('Select A Thumbnail Image', 'error');
            //     return; 
            // }
            // if (galleryImages.length == 0) {
            //     showToast('Select Some Gallery Image', 'error');
            //     return; 
            // }

            // Create a FormData object to send data with AJAX
            var formData = new FormData();
            formData.append('product_id', product_id);
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
           

            $.ajax({
                url: "{{route('admin.product.update')}}", 
                method: 'POST',
                data: formData,
                contentType: false, 
                processData: false, 
                success: function(response) {
                    if (response.status==true) {
                        
                        $("#myform")[0].reset(); 
                        // $('#old_img').show();
                    
                        showToast(response.success, 'success');
                        
                    }
                    if (response.status==false) {
                        
                        showToast(response.error, 'success');
                        
                    }
                    
                },
                
            });
        });





    });

</script>

@endsection



