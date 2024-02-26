<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .mySwiper{
        width:1180px;
        margin:auto;
        margin-top:30px;
    }
    .swiper-slide img{
        width:100% !important;
        border-radius:15px;
        border:2px solid black;
    }
    .swiper-button-next, .swiper-button-prev{
        display:block;
        color:#988630;
    }
    @media(max-width:768px){
        .mySwiper{
            width:100%;
            margin-top:0px;
        }
        .swiper-slide img{
            width:100% !important;
            border-radius:0;
            border:0 solid black;
            height:290px;
            object-fit:cover;
            object-position:79% 20%;
        }
        .swiper-button-next, .swiper-button-prev{
            display:none;
        }
    }
</style>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php foreach($slider_data as $slider){ ?>
          <div class="swiper-slide">
              <a href="<?php echo $slider->link ?>" target="_self"><img src="<?php echo base_url('assets/images/slider/').$slider->foto.$slider->foto_type?>" alt="<?php echo $slider->nama_slider ?>"></a>
          </div>
      <?php } ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
</script>
