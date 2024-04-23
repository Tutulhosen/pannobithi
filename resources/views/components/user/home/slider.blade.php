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

  var_dump($slider);

?>

{{-- @dd($slider) --}}



<!-- Swiper -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <a href="#" class="swiper-slide">Slide 1</a>
      <a href="#" class="swiper-slide">Slide 2</a>
      <a href="#" class="swiper-slide">Slide 3</a>
      <a href="#" class="swiper-slide">Slide 4</a>
      <a href="#" class="swiper-slide">Slide 5</a>
        
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
