<section id="hb-whychooseus" class="hb-whychooseus hb-sectionspace hb-bg hb-haslayout">
    <div class="container">
        <div class="row">
            <div class=" col-xs-12 col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-2">
                <div class="hb-sectionhead mb-50">
                    <div class="hb-sectiontitle">
                        <h2><span>Spa Center</span>
                            Why Choose Us
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <figure class="hb-whychooseus-img">
                    <img src="images/trust.jpg" alt="images description">
                </figure>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="hb-whychooseus-content">
                    <div class="hb-whychooseus-title">
                        <h3 class="hb-twoheading">Special Treatments</h3>
                    </div>
                    <ul class="list-unstyled hb-whychooseus-list">
                        <li>Excellent Massage Service</li>
                        <li>100% safe for your skin</li>
                        <li>Unique from other Spa treatments</li>
                        <li>Quality product from OverSeas</li>
                        <li>Special gifts & offers for you</li>
                    </ul>
                    <div id="hb-statisticscounters" class="hb-statisticscounters">
                        <div class="hb-counter">
                            <h3><span data-from="0" data-to="135" data-speed="2000" data-refresh-interval="50">{{ App\Reservation::get()->count() }}</span></h3>
                            <h4>Clients</h4>
                        </div>
                        <div class="hb-counter">
                            <h3><span data-from="0" data-to="3" data-speed="2000" data-refresh-interval="50">{{ $users->count() }}</span></h3>
                            <h4>Therapists</h4>
                        </div>
                        <div class="hb-counter">
                            <h3><span data-from="0" data-to="20" data-speed="2000" data-refresh-interval="50">{{ App\Category::get()->count() }}</span></h3>
                            <h4>Procedures</h4>
                        </div>
                        <div class="hb-counter">
                            <h3><span data-from="0" data-to="25" data-speed="2000" data-refresh-interval="25">{{ App\Services::get()->count() }}</span></h3>
                            <h4>Treatments</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
