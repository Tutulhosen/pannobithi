<style>

  .swiper-slide {
      position: relative;
      background-size: cover;
      background-position: center;
      height: 350px; /* Adjust height as needed */
      
  }

  .slide-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      
  }

  .slide-content h2 {
      font-size: 32px; /* Adjust font size */
      margin-bottom: 10px;
  }

  .slide-content p {
      font-size: 18px; /* Adjust font size */
  }

  </style>





{{-- @dd($slider) --}}



<!-- Swiper -->
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
      @foreach ($slider as $item)
      <div class="swiper-slide" style="background-image: url('{{ asset('images/slider/' . $item->image_name) }}');">
          <div class="slide-content" style="color: {{$item->text_color}};">
              <h2>{{$item->title}}</h2>
              <p>{{$item->slogan}}</p>
          </div>
      </div>
      @endforeach
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-pagination"></div>
</div>

