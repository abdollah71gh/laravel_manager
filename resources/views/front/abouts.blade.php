<!--==========================
          About Us Section
        ============================-->
<section id="about">

    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-md-6">
                @foreach($abouts as $about)
                <div class="about-img">
                    <img src="{{$about->image}}" alt="">
                </div>
            </div>
            @endforeach
            <div class="col-lg-7 col-md-6">
                @foreach($abouts as $about)
                <div class="about-content">
                    <h2>{{$about->name}}</h2>
                    <h3>بنده یک برنامه نویس تازه کار و رو به بالا هستم و دارای روحیه خوب و خوش اخلاق و خوش برخورد و همیشه در حال رشد و توسعه هستم</h3>

                    <p>شرح حال</p>
                    <ul>
                        <li><i class="ion-android-checkmark-circle"></i> {{$about->body}}</li>
                    </ul>

                </div>
            </div>
            @endforeach
        </div>
    </div>

</section><!-- #abouts -->
