
@extends('layouts.weblayout')

@section('content')
<style>
  .reviews-section {
    padding: 80px 20px;
    background: linear-gradient(135deg, #f8fafc, #eef5ff);
    font-family: "Poppins", sans-serif;
}

.reviews-container {
    max-width: 1200px;
    margin: auto;
}

/* Heading */

.reviews-heading {
    text-align: center;
    margin-bottom: 45px;
}

.reviews-subtitle {
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    color: #f59e0b;
    margin-bottom: 10px;
}

.reviews-heading h2 {
    margin: 0;
    font-size: 38px;
    font-weight: 800;
    color: #172033;
}

.reviews-heading h2 span {
    color: #f59e0b;
}

.reviews-heading p {
    margin-top: 12px;
    color: #718096;
    font-size: 15px;
}


/* Grid */

.reviews-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}


/* Card */

.review-card {
    position: relative;
    background: rgba(255, 255, 255, 0.92);
    border: 1px solid rgba(226, 232, 240, 0.9);
    border-radius: 22px;
    padding: 15px;
    box-shadow: 0 15px 45px rgba(30, 41, 59, 0.08);
    transition: all 0.35s ease;
    overflow: hidden;
}

.review-card::before {
    content: "";
    position: absolute;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    background: rgba(245, 158, 11, 0.08);
    top: -35px;
    right: -30px;
}

.review-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 55px rgba(30, 41, 59, 0.14);
}


/* Featured */

.featured-review {
    border: 1px solid rgba(245, 158, 11, 0.35);
    background: linear-gradient(
        145deg,
        #ffffff,
        #fffaf0
    );
}

.featured-badge {
    position: absolute;
    top: 18px;
    right: 18px;

    display: flex;
    align-items: center;
    gap: 5px;

    background: #fff3d6;
    color: #d97706;

    padding: 6px 10px;
    border-radius: 30px;

    font-size: 10px;
    font-weight: 700;
}


/* User */

.review-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    position: relative;
    z-index: 2;
}

.review-user {
    display: flex;
    align-items: center;
    gap: 12px;
}

.review-avatar {
    width: 48px;
    height: 48px;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #fff;
    font-weight: 700;
    font-size: 14px;

    box-shadow: 0 5px 15px rgba(0,0,0,0.12);
}

.avatar-1 {
    background: linear-gradient(135deg, #f59e0b, #ef4444);
}

.avatar-2 {
    background: linear-gradient(135deg, #2563eb, #7c3aed);
}

.avatar-3 {
    background: linear-gradient(135deg, #059669, #0891b2);
}

.review-user h4 {
    margin: 0;
    font-size: 15px;
    font-weight: 700;
    color: #1e293b;
}

.review-user span {
    display: block;
    margin-top: 3px;
    color: #94a3b8;
    font-size: 11px;
}


/* Verified */

.verified {
    display: flex;
    align-items: center;
    gap: 4px;

    color: #16a34a;
    font-size: 10px;
    font-weight: 600;

    background: #f0fdf4;
    padding: 5px 8px;
    border-radius: 20px;
}

.verified i {
    font-size: 9px;
}


/* Stars */

.review-stars {
    margin-top: 22px;
    color: #f59e0b;
    font-size: 19px;
    letter-spacing: 2px;
}


/* Review text */

.review-text {
    position: relative;
    z-index: 2;

    margin: 16px 0 25px;

    color: #475569;
    font-size: 14px;
    line-height: 1.8;
}


/* Footer */

.review-footer {
    display: flex;
    align-items: center;
    gap: 10px;

    padding-top: 16px;
    border-top: 1px solid #edf2f7;
}

.review-footer span {
    width: 30px;
    height: 30px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #fff7e6;
    color: #f59e0b;

    font-size: 11px;
}

.review-footer small {
    color: #94a3b8;
    font-size: 11px;
    font-weight: 600;
}


/* Tablet */

@media (max-width: 900px) {
    .reviews-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .reviews-heading h2 {
        font-size: 32px;
    }
}


/* Mobile */

@media (max-width: 600px) {

    .reviews-section {
        padding: 55px 15px;
    }

    .reviews-grid {
        grid-template-columns: 1fr;
        gap: 18px;
    }

    .reviews-heading {
        margin-bottom: 30px;
    }

    .reviews-heading h2 {
        font-size: 28px;
    }

    .review-card {
        padding: 23px;
    }

    .featured-badge {
        display: none;
    }
}
.review-avatar {
    width: 48px;
    height: 48px;
    min-width: 48px;
    border-radius: 50%;
    overflow: hidden;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f59e0b;
    color: #fff;
    font-size: 18px;
}

.review-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
```css
.read-more-btn {
    display: inline-block;
    margin-top: 8px;
    padding: 0;
    border: none;
    background: transparent;
    color: #f39c12;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.read-more-btn:hover {
    color: #d68910;
    text-decoration: underline;
}

.read-more-btn:focus {
    outline: none;
    box-shadow: none;
}

.read-more-btn {
    margin-top: 10px;
    padding: 6px 14px;
    border: 1px solid #f39c12;
    border-radius: 20px;
    background: #fff;
    color: #f39c12;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s ease;
}

.read-more-btn:hover {
    background: #f39c12;
    color: #fff;
}
.hero-slide-bg {
    width: 100%;
    height: auto;
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
}
</style>

<section class="hero-viewport">
 @foreach($banners as $banner)
    <div class="hero-slide-bg active"
         style="background-image: url('{{ asset('public/uploads/banners/' . $banner->bannerimage) }}');">
    </div>
@endforeach
  <!-- <div class="hero-banner-content">
    <span class="hero-eyebrow">PANDAVAS HOLIDAYS</span>
    <h1>Discover the World with Pandavas</h1>
    <p>Curated journeys, comfortable travel, unforgettable memories.</p>
  </div> -->
  <button class="hero-slider-arrow left" id="sliderArrowLeft" aria-label="Previous">&lt;</button>
  <button class="hero-slider-arrow right" id="sliderArrowRight" aria-label="Next">&gt;</button>
  <div class="hero-dashes-wrap">
    <div class="hero-dash active"></div>
    <div class="hero-dash"></div>
  </div>
</section>


<div class="post-hero-quick-nav" aria-label="Quick navigation">
  <a href="{{url('grouptours')}}">GROUP TOUR</a>
  <a href="javascript:void(0)" onclick="openContactModal()">CUSTOMIZED TOUR</a>
  <a href="javascript:void(0)" onclick="openContactModal()">CONTACT US</a>
</div>
<section style="padding:40px 0 70px;">
  <div style="max-width:1240px;margin:0 auto;padding:0 24px;">
    <div style="text-align:center;margin-bottom:44px;">
      <span style="font-size:0.8rem;font-weight:700;letter-spacing:1.5px;color:#EA580C;text-transform:uppercase;">Curated Holidays</span>
      <h2 style="font-size:2.2rem;font-weight:800;color:#201713;margin-top:6px;">Featured Tour Packages</h2>
      <p style="color:#756B63;font-size:0.95rem;">Departing from North Paravur with interactive bus seat selection</p>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fill, minmax(340px, 1fr));gap:28px;">

    @foreach($latest_tours as $tours)
<div class="glass-card-item">
        <div style="height:210px;overflow:hidden;position:relative;">
          <img src="{{ asset('public/uploads/tours/' . $tours->image) }}" alt="Munnar" style="width:100%;height:100%;object-fit:cover;" />
          <span style="position:absolute;top:14px;right:14px;background:#F59E0B;color:#201713;font-size:0.75rem;font-weight:700;padding:4px 10px;border-radius:4px;">@if($tours->package_type==1) Bus Tour @else Train Tour @endif</span>
        </div>
        <div style="padding:22px;">
          <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:8px;color:#201713;">{{$tours->tourname}}</h3>
          <p style="font-size:0.86rem;color:#756B63;line-height:1.6;margin-bottom:16px;">{{ Str::limit($tours->description, 150) }}</p>
          <div style="display:flex;justify-content:space-between;align-items:center;padding-top:14px;border-top:1px solid rgba(0,0,0,0.08);">
            <div>
              <span style="font-size:0.72rem;color:#756B63;text-transform:uppercase;">Price Per Seat</span>
              <div style="font-size:1.3rem;font-weight:800;color:#EA580C;">₹{{$tours->amount}}</div>
              Date :  {{ \Carbon\Carbon::parse($tours->date)->format('d-m-Y') }}
            </div>
            <a href="{{url('booknow/'.$tours->slug)}}" class="btn-confirm-seats-green" style="background:#EA580C;text-decoration:none;padding:8px 18px;">Book Now</a>
          </div>
        </div>
      </div>
      @endforeach



    </div>
  </div>
</section>
<section id="faqSection" style="background:#FFF2E8;padding:60px 0;">
  <div style="max-width:820px;margin:0 auto;padding:0 20px;">
    <div style="text-align:center;margin-bottom:36px;">
      <h2 style="font-size:1.8rem;font-weight:800;color:#201713;">Frequently Asked Questions</h2>
    </div>
    
    <div style="background:#ffffff;border-radius:12px;padding:24px 30px;box-shadow:0 4px 14px rgba(0,0,0,0.05);margin-bottom:16px;">
      <h4 style="font-size:1.05rem;font-weight:700;color:#201713;margin-bottom:8px;">How do I select and reserve my bus seats?</h4>
      <p style="font-size:0.88rem;color:#756B63;line-height:1.7;">Browse Tour Packages, click Book Now, and you will see our exact top-down bus layout graphic. Choose your seats (turning them green), view your total in the yellow box below, and click Confirm Seats to proceed to payment.</p>
    </div>

    <div style="background:#ffffff;border-radius:12px;padding:24px 30px;box-shadow:0 4px 14px rgba(0,0,0,0.05);">
      <h4 style="font-size:1.05rem;font-weight:700;color:#201713;margin-bottom:8px;">Where is the Pandavas Holidays departure depot located?</h4>
      <p style="font-size:0.88rem;color:#756B63;line-height:1.7;">Our main office and boarding bay is located on NH 66 Main Road, North Paravur, Ernakulam. En-route pick-up points across Kochi can also be scheduled.</p>
    </div>
  </div>
</section>
<section class="why-choose-section" id="whyChooseUs">
  <div class="section-shell">
    <div class="section-heading">
      <span>WHY TRAVEL WITH US</span>
      <h2>Why Choose Us</h2>
      <p>Thoughtful planning, trusted service and comfortable journeys from start to finish.</p>
    </div>
    <div class="why-choose-grid">
      <article class="why-card">
        <div class="why-icon"><i class="fas fa-shield-heart"></i></div>
        <h3>Trusted &amp; Safe</h3>
        <p>Passenger-first travel with dependable support and carefully planned journeys.</p>
      </article>
      <article class="why-card">
        <div class="why-icon"><i class="fas fa-bus"></i></div>
        <h3>Comfortable Travel</h3>
        <p>Well-planned routes and a comfortable touring experience built around your group.</p>
      </article>
      <article class="why-card">
        <div class="why-icon"><i class="fas fa-wallet"></i></div>
        <h3>Fair Pricing</h3>
        <p>Clear packages and practical options designed to give you more value.</p>
      </article>
      <article class="why-card">
        <div class="why-icon"><i class="fas fa-headset"></i></div>
        <h3>Personal Support</h3>
        <p>Our team stays close before, during and after your journey whenever you need us.</p>
      </article>
      <article class="why-card">
        <div class="why-icon"><i class="fas fa-map-location-dot"></i></div>
        <h3>Curated Experiences</h3>
        <p>Handpicked destinations, flexible planning and memorable moments along the way.</p>
      </article>
    </div>
  </div>
</section>
<section class="reviews-section" id="reviews">
  <div class="section-shell">
    <div class="section-heading">
      <span>GUEST EXPERIENCES</span>
      <h2>What Our Travellers Say</h2>
      <p>Real feedback from guests who chose Pandavas Holidays for their journeys.</p>
    </div>
    <div class="reviews-layout">
      <div class="reviews-list"  aria-live="polite">

      <section class="reviews-section">
    <div class="reviews-container">


        <div class="reviews-grid">

         @foreach($reviews as $rvs)

            <!-- Review 1 -->
            <div class="review-card">
                <div class="review-top">
                    <div class="review-user">

                     <div class="review-avatar avatar-1">

    @if($rvs->image)
        <img src="{{ asset('public/uploads/' . $rvs->image) }}"
             alt="{{ $rvs->blogname }}">
    @else
        <i class="fas fa-user"></i>
    @endif

</div>

                        <div>
                            <h4>{{$rvs->blogname}}</h4>
                            <span>{{ \Carbon\Carbon::parse($rvs->created_at)->format('d M Y') }}</span>
                        </div>
                    </div>

                  
                </div>

                <div class="review-stars">
                    ★★★★★
                </div>

                <p class="review-text">
                   {{ Str::words($rvs->description, 15, '...') }}
                </p>
<a href="{{url('reviews/'.$rvs->id)}}"><button type="button" class="btn btn-link p-0 read-more-btn" > Read More </button></a>
               
            </div>

            @endforeach


           
            

        </div>

    </div>
</section>
      </div>


      <div class="review-form-card">
        <div class="review-form-heading">
          <span>SHARE YOUR EXPERIENCE</span>
          <h3>Add Your Review</h3>
        </div>
        <form  class="review-form"  action="{{ route('addreview') }}"
        method="POST"
        enctype="multipart/form-data"> @csrf
          <label for="reviewName">Your Name *</label>
          <input id="reviewName" name="name" type="text" maxlength="60" placeholder="Enter your name" required />
          <label for="reviewName">Upload Image</label>
          <input id="reviewName" name="image" type="file" maxlength="60"   />
         
          <label for="reviewText">Your Review *</label>
          <textarea id="reviewText" name="review" rows="5" maxlength="500" placeholder="Tell us about your journey..." required></textarea>
          <button type="submit" class="review-submit-btn"><i class="fas fa-paper-plane"></i> Publish Review</button>
        </form>
      </div>
    </div>
  </div>
</section>  




@endsection
