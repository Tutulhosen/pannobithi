<style>

    .swiper {
      width: 100%;
      height: 50vh;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>

<?php
  $sliders=DB::table('sliders')->where('status',1)->get();
?>


<!-- Swiper -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
      @foreach ($sliders as $slider)
      <a href="#" class="swiper-slide">Slide 1</a>
          
      @endforeach
        
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
