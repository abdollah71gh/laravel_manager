<!--==========================
          Services Section
        ============================-->
<section id="services" class="section-bg">
    <div class="container">

        <header class="section-header">
            <h3>مهارت ها</h3>
        </header>

        <div class="row">
            @foreach($skills as $skill)
            <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">

                <div class="box" style="background-color: rgba(233,233,239,0.91)">
                    <span class="btn btn-success rounded-pill"> {{$skill->name}}</span>

                    <h4 class="title"><a href="">{{$skill->title}}</a></h4>
                    <p>{{$skill->body}}</p>
                </div>

            </div>

            @endforeach


        </div>

    </div>
</section><!-- #services -->
