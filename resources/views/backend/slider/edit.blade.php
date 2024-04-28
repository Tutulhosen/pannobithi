@extends('backend.layout.app')


@section('main-content')
<a class="btn btn-success" href="{{route('admin.slider.list')}}">Slider List</a>
   <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h2 class="card-title" style="text-align:center">Slider Form</h2>
                
                <form class="forms-sample" id="myform">
                    @csrf
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="title" value="{{$slider_info->title}}" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="name">Slogan</label>
                        <input type="text" class="form-control" id="slogan" value="{{$slider_info->slogan}}" placeholder="Slogan">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                        <option value="">--Select--</option>
                        @foreach ($category as $item)
                            @if ($slider_info->category_id == $item->id)
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
                                @if ($slider_info->sub_cat_id == $item->id)
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
                        <label for="name">Text Color</label>
                        <input type="text" class="form-control" id="text_color" value="{{$slider_info->text_color}}" placeholder="#000000">
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
                        @if (!empty($slider_info->image_name))
                            <div class="old_img" id="old_img" >
                                <img style="height: 100px; width:100px;object-fit:cover" src="{{asset('images/slider/'.$slider_info->image_name)}}" alt="">
                            </div>
                        @endif
                        
                        <div class="img_prev" id="img-preview" style="display: none">
                            <!-- Image preview will be shown here -->
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary mr-2" id="slider_update_btn" value="{{$slider_info->id}}">Submit</button>
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
        
        $('#slider_update_btn').on('click', function(){
       
            let id = $(this).val();
            var title = $('#title').val();
            var slogan = $('#slogan').val();
            var category_id = $('#category_id').val();
            var sub_category_id = $('#sub_category_id').val();
            var text_color = $('#text_color').val();
            var image = $('#category-image')[0].files[0];

            if (title == '') {
                showToast('Enter A Slider Title', 'error');
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

            

            let formData = new FormData();
            formData.append('id', id);
            formData.append('title', title);
            formData.append('slogan', slogan);
            formData.append('category_id', category_id);
            formData.append('sub_category_id', sub_category_id);
            formData.append('text_color', text_color);
            formData.append('image', image);
            formData.append('_token', '{{ csrf_token() }}'); 

            $.ajax({
                url: '{{ route('admin.slider.update') }}', 
                method: 'POST',
                data: formData,
                contentType: false, 
                processData: false, 
                success: function(response) {
                    if (response.status==true) {
                        $('.img_prev').hide();
                        $('#old_img').load(location.href + ' #old_img');
                        $('#old_img').show();
                    
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



