<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="{{ asset('js/app.js') }}"></script>


<script>
  $(window).on('scroll', function(){
    var scrollPos = $(document).scrollTop();
    if($(window).scrollTop()){
      $('.navbar').addClass('scrolled');
      $('.progress-bar').addClass('visible');
      $('.logo').addClass('logo_scrolled');
    }else{
      $('.navbar').removeClass('scrolled');
      $('.progress-bar').removeClass('visible');
      $('.logo').removeClass('logo_scrolled');
    }
  })
  $(window).scroll(function(){
    var cont_height = $('.content-wrapper').outerHeight();
    var scroll_top = $(window).scrollTop();
    var doc_height = $(window).outerHeight();
    var progress = (scroll_top/(cont_height - doc_height))* 100;
    //now to set range of progress value between 0 and 100 we will define a function
    function round(val,min,max) {
      return val > max ? max : val < min ? min : val;
    }
    var final_val = round(progress, 0, 100);
    $('.progress-bar').attr('value', final_val);
  });
</script>
<script src="{{ asset('js/lib/swiper.min.js')}}"></script>

<script>
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    autoplay: {
      delay: 4500,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>

<script>
  var swiper = new Swiper('.services', {
    slidesPerView: 3,
    spaceBetween: 10,
    loop: true,
    autoplay: {
      delay: 4500,
      disableOnInteraction: true,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    responsive:{
      0:{
        slidesPerView: 1,
      },
      480:{
        slidesPerView: 2,
      },
      768:{
        slidesPerView: 3,
      },
      1200:{
        slidesPerView: 4,
      }
    }
  });
</script>

<script>
  $("body").on('change',".service",function() {
      var service = $(this).val(),
          total_price = 400.00,
          minutes = 45;

      if (service === '1') {
          total_price = 400.00;
          minutes = 45;
      } else if (service === '2') {
          total_price = 600.00;
          minutes = 90;
      }

      $("#total_price").html("Php " + total_price.toFixed(2));
      $("#minutes").html(minutes.toString()+"mins");
  });
</script>