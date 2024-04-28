<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pannobithi Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}" />
    
    {{-- color picker  --}}
    <!-- Spectrum CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.css">
    
    {{-- toster link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    {{-- sweet alert link  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    
   
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('../../backend/assets/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('../../backend/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />

    @yield('style');
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('backend.layout.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('backend.layout.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              @section('main-content')
                  
              @show
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('backend.layout.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <!-- jQuery -->
    

    

    
    <script>
      // alert();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      
    </script>
    <script>
      function previewImage(input) {
          var preview = document.getElementById('img-preview');
          preview.innerHTML = ''; // Clear previous preview

          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  var img = document.createElement('img');
                  img.src = e.target.result;
                  img.className = 'img-fluid'; // Add any additional classes you need
                  img.style.width = '100px'; // Set width of the image
                  img.style.height = '100px'; // Set height of the image
                  preview.appendChild(img);
                  preview.style.display = 'block'; // Show the image preview
              }

              reader.readAsDataURL(input.files[0]); // Read the uploaded file as a data URL
          }
          $('#old_img').hide();
      }

      // Attach event listener to file input
      document.getElementById('category-image').addEventListener('change', function () {
          previewImage(this);
      });

      function previewImages() {
        var preview = document.getElementById('gallery-preview');
        var files = document.getElementById('gallery').files; // Access file input by ID

        preview.innerHTML = '';

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            // Closure to capture the file reader for each iteration
            (function(reader) {
                reader.onloadend = function () {
                  var img = document.createElement('img');
                  img.src = reader.result;
                  img.style.maxWidth = '100px'; // Adjust the size as needed
                  img.style.maxHeight = '100px'; // Adjust the size as needed
                  img.style.marginRight = '10px'; // Add right margin for padding
                  img.style.marginBottom = '10px'; // Add bottom margin for padding
                  preview.appendChild(img);
              };
            })(reader);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    }
    </script>
    <script src="{{URL('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>

    <!-- Spectrum JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.js"></script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('backend/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('backend/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('backend/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('backend/assets/js/misc.js')}}"></script>
    <script src="{{asset('backend/assets/js/settings.js')}}"></script>
    <script src="{{asset('backend/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('backend/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
   
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('../../backend/assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('../../backend/assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
  
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('../../backend/assets/js/file-upload.js')}}"></script>
    <script src="{{asset('../../backend/assets/js/typeahead.js')}}"></script>
    <script src="{{asset('../../backend/assets/js/select2.js')}}"></script>
    
    <!-- jQuery (necessary for Toastr) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Your custom scripts -->
    <script>
        // Function to show a Toastr alert
        function showToast(message, type) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                showMethod: 'slideDown',
                timeOut: 3000 // 3 seconds
            };

            // Type can be 'success', 'info', 'warning', or 'error'
            toastr[type](message);
        }
    </script>

    <script src="https://kit.fontawesome.com/5b135da28d.js" crossorigin="anonymous"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    
    
    <!-- Plugin js for this page -->
   
    
    
    
    
    

    <!-- Your other scripts -->
    @yield('scripts')

    


  </body>

</html>