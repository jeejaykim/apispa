<section id="hb-services" class="hb-services hb-sectionspace hb-haslayout">
    <div class="container">
        <div class="row services">
            <div class=" col-xs-12 col-sm-12 col-sm-offset-0 col-md-12">
                <div class="hb-sectionhead mb-50">
                    <div class="hb-sectiontitle">
                        <h2 id="book-now"><span>Services Offered</span></h2>
                    </div>
                </div>
            </div>
            <div id="hb-servicesslider" class="hb-servicesslider owl-carousel owl-theme hb-haslayout swiper-wrapper">
                @foreach($services as $service)
                <div class="item swiper-slide">
                    <div class="hb-servicebox">
                        <figure class="hb-serviceimg">
                            <img src="images/swedish.jpg" alt="images description">
                            <figcaption class="hb-imagecontent">
                                <a href="#" class="hb-btn">Book Now</a>
                            </figcaption>
                        </figure>
                        <div class="hb-servicecontent">
                            <h3>
                                {{$service->name}}
                                <em>{{$service->price}}</em>
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>