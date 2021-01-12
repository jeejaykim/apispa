<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script>
//Dynamic Dependent
$('body').on('change', '#category', function(event) {
    event.preventDefault();
    /* Act on the event */
    $.ajax({
        url: '/data',
        type: 'GET',
        dataType: 'HTML',
        data: {category: $(this).val()},
    })
    .done(function(response) {
        $('#service').html(response);

    })
    .fail(function(response) {
        console.log(response);
    });
});

$('body').on('change', '#service', function(event) {
    event.preventDefault();
    $.ajax({
        url: '/value',
        type: 'GET',
        dataType: 'JSON',
        data: {service: $(this).val()},
    })
    .done(function(response) {
        $('#total_price').text("PHP "+ response.price);
        $('#service_name').text(response.name);
        $('#category_type').text(response.category)
        console.log(response);
    })
    .fail(function(response) {
        console.log(response);
    });

});

</script>

<script>
    $(window).on('scroll', function(){
        if($(window).scrollTop()){
            $('.navbar').addClass('scrolled');
            $('.progress-bar').addClass('visible');
        }else{
            $('.navbar').removeClass('scrolled');
            $('.progress-bar').removeClass('visible');

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

    