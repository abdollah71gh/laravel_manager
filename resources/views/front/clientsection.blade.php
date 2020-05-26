<!--==========================
          Clients Section
        ============================-->
<style>
    body{
        background-color: rgba(201, 219, 222, 0.87);
    }
</style>
<section id="testimonials">
    <div class="container">

        <header class="section-header">
            <h3>مدیران ارشد پروژه</h3>
        </header>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="owl-carousel testimonials-carousel wow fadeInUp">
                    @foreach($manigers as $maniger)
                    <div class="testimonial-item">
                        <img src="{{$maniger->image}}" class="testimonial-img" alt="">
                        <h3>{{$maniger->name}}</h3>
                        <h4>{{$maniger->job}}</h4>
                        <p>
                       {{$maniger->body}}
                        </p>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>


    </div>
</section><!-- #testimonials -->
