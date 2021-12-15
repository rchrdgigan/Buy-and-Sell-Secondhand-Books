@extends('layouts.buyer')

@section('content')
<div class="about-us-wrapper pt-60 pb-40">
    <div class="container">
    <section id="bulan">
        <div class="row">
            <!-- About Text Start -->
            <div class="col-lg-6 order-last order-lg-first">
                <div class="about-text-wrap">
                    <h2><span>Buying Book In</span>Bulan Area Only</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, quas quod consectetur ut et iusto ad qui repudiandae illo nihil quae esse dicta quasi laboriosam exercitationem, iure illum repellendus rem.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam tenetur vero reprehenderit corporis laboriosam repudiandae, eos aspernatur asperiores. Quibusdam aliquam eligendi reprehenderit esse minus id assumenda odio tenetur recusandae aperiam!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore nulla facere quia consectetur ratione, rem, id molestias pariatur dolores consequatur aperiam provident asperiores est explicabo quaerat fugiat repellat dolore voluptatibus.</p>
                </div>
            </div>
            <!-- About Text End -->
            <!-- About Image Start -->
            <div class="col-lg-5 col-md-10">
                <div class="about-image-wrap">
                    <img class="img-full" src="{{asset('vendor/images/bulan.jpg')}}" alt="About Us" />
                </div>
            </div>
            <!-- About Image End -->
        </div>
    </section>
    </div>
</div>
<div class="about-us-wrapper pt-60 pb-40">
    <div class="container">
    <section id="notvalid">
        <div class="row">
            <!-- About Text Start -->
            <div class="col-lg-6 order-last order-lg-first">
                <div class="about-text-wrap">
                    <h2><span>No Valid ID</span>Well Not Approve</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, quas quod consectetur ut et iusto ad qui repudiandae illo nihil quae esse dicta quasi laboriosam exercitationem, iure illum repellendus rem.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam tenetur vero reprehenderit corporis laboriosam repudiandae, eos aspernatur asperiores. Quibusdam aliquam eligendi reprehenderit esse minus id assumenda odio tenetur recusandae aperiam!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore nulla facere quia consectetur ratione, rem, id molestias pariatur dolores consequatur aperiam provident asperiores est explicabo quaerat fugiat repellat dolore voluptatibus.</p>
                </div>
            </div>
            <!-- About Text End -->
            <!-- About Image Start -->
            <div class="col-lg-5 col-md-10">
                <div class="about-image-wrap">
                    <img class="img-full" src="{{asset('vendor/images/notvalid.png')}}" alt="About Us" />
                </div>
            </div>
            <!-- About Image End -->
        </div>
    </section>
    </div>
</div>
@endsection