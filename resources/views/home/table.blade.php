<section id="hb-whychooseus" class="hb-whychooseus hb-sectionspace hb-bg hb-haslayout">
    <div class="container">
        <div class="row">
            <div class=" col-xs-12 col-sm-12 col-sm-offset-0 col-md-12">
                <div class=" col-xs-12 col-sm-12 col-sm-offset-0 col-md-12">
                    <div class="hb-sectionhead mb-50">
                        <div class="hb-sectiontitle">
                            <h2 id="book-now"><span>Api Spa</span></h2>
                        </div>
                    </div>
                </div>
                
                <table class="table table-sm table-hover table-borderless text-center">
                    <thead class="thead table-border" style="background-color:#2D2C40;">
                        <tr>
                            <th class="text-white ">Time</th>
                            @foreach($users as $user)
                            <th class="image_container">
                                <img src="{{ asset($user->getProfilePic()) }}" alt="" class="table-avatar">
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @include('reservations.list')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>