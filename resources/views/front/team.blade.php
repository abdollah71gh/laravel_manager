<!--==========================
          Team Section
        ============================-->
<section id="team" class="section-bg">
    <div class="container">
        <div class="section-header">
            <h3>Team</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">
            @foreach($teams as $team)
            <div class="col-lg-3 col-md-6 wow fadeInUp">

                <div class="member">
                    <img src="{{$team->image}}" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{{$team->title}}</h4>
                            <span>{{$team->name}}</span>
                            <div class="social">
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section><!-- #team -->
