<div class="owl-carousel owl-theme d-none d-md-block">
  @foreach($banners as $banner)
  <div class="item"><img src="{{asset('storage/') .'/'. $banner->img}}" alt=""></div>
  @endforeach
</div>
<div class="owl-carousel owl-theme d-xs-block d-lg-none">
  @foreach($banners as $banner)
  <div class="item"><img src="{{asset('storage/') .'/'. $banner->img_mobile}}" alt=""></div>
  @endforeach
</div>
<div class="container">
  <div class="text-center">
    <strong>SECCIÓN DEL BANNER ADMINISTRABLE</strong>
  </div>
</div>
<script type="text/javascript">
$('.owl-carousel').owlCarousel({
  loop:true,
  margin:0,
  items: 1,
  autoplay:true,
  autoplayTimeout:1000,
  autoplayHoverPause:true
});
</script>
