@extends('layouts.weblayout')

@section('content')

<div class="inner-page-banner" style="background-image: url('https://images.unsplash.com/photo-1597848212624-a19eb35e2651?w=1920&q=85');">
  <div class="banner-glass-caption">
    <h1>ABOUT US</h1>
    <p>Headquartered in North Paravur, Ernakulam, Kerala</p>
  </div>

</div>
<div class="post-hero-quick-nav" aria-label="Quick navigation">
  <a href="{{url('grouptours')}}">GROUP TOUR</a>
  <a href="javascript:void(0)" onclick="openContactModal()">CUSTOMIZED TOUR</a>
  <a href="javascript:void(0)" onclick="openContactModal()">CONTACT US</a>
</div>

<section style="padding:60px 0 80px;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
    
    <div style="display:grid;grid-template-columns:1fr 1.2fr;gap:40px;align-items:center;margin-bottom:60px;">
      <div style="border-radius:16px;overflow:hidden;box-shadow:0 8px 30px rgba(0,0,0,0.1);">
        <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=800&q=80" alt="North Paravur Headquarters" style="width:100%;height:380px;object-fit:cover;" />
      </div>
      <div>
        <span style="font-size:0.8rem;font-weight:700;letter-spacing:1.5px;color:#EA580C;text-transform:uppercase;">Company Profile</span>
        <h2 style="font-size:2.1rem;font-weight:800;color:#201713;margin:6px 0 16px;">Pandavas Holidays, North Paravur</h2>
        <p style="font-size:0.95rem;color:#756B63;line-height:1.8;margin-bottom:14px;">Founded in the historic town of <strong>North Paravur, Ernakulam</strong>, Pandavas Holidays has been delivering premier touring and road transit experiences across Kerala and pan-India.</p>
        <p style="font-size:0.95rem;color:#756B63;line-height:1.8;margin-bottom:18px;">Our mission is to combine the warmth of traditional hospitality with state-of-the-art motorcoach engineering. Every journey is planned with passenger safety, comfort, and delight at its heart.</p>
        <div style="display:flex;gap:20px;">
          <div><h4 style="font-size:1.8rem;font-weight:800;color:#EA580C;">15+</h4><small style="color:#756B63;">Years of Trust</small></div>
          <div><h4 style="font-size:1.8rem;font-weight:800;color:#EA580C;">2,800+</h4><small style="color:#756B63;">Tours Completed</small></div>
          <div><h4 style="font-size:1.8rem;font-weight:800;color:#EA580C;">24 Seats</h4><small style="color:#756B63;">Air Suspended Bus</small></div>
        </div>
      </div>
    </div>

    <div style="text-align:center;margin-bottom:36px;">
      <h2 style="font-size:1.9rem;font-weight:800;color:#201713;">Our Core Pillars</h2>
    </div>

    <div style="display:grid;grid-template-columns:repeat(3, 1fr);gap:24px;">
      <div class="glass-card-item" style="padding:32px 24px;text-align:center;border-top:4px solid #EA580C;">
        <div style="width:60px;height:60px;border-radius:16px;background:rgba(0,120,212,0.12);color:#EA580C;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin:0 auto 16px;">
          <i class="fas fa-bullseye"></i>
        </div>
        <h3 style="font-size:1.25rem;font-weight:800;color:#201713;margin-bottom:10px;">Mission</h3>
        <p style="font-size:0.88rem;color:#756B63;line-height:1.7;">To make travel seamless, affordable, and safe for every explorer, ensuring transparent pricing and unforgettable memories across South India.</p>
      </div>

      <div class="glass-card-item" style="padding:32px 24px;text-align:center;border-top:4px solid #F59E0B;">
        <div style="width:60px;height:60px;border-radius:16px;background:rgba(245,158,11,0.15);color:#d97706;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin:0 auto 16px;">
          <i class="fas fa-eye"></i>
        </div>
        <h3 style="font-size:1.25rem;font-weight:800;color:#201713;margin-bottom:10px;">Vision</h3>
        <p style="font-size:0.88rem;color:#756B63;line-height:1.7;">To be recognized as Kerala's premier holiday brand, renowned for passenger care, modern fleets, and pioneering interactive seat reservation technology.</p>
      </div>

      <div class="glass-card-item" style="padding:32px 24px;text-align:center;border-top:4px solid #10b981;">
        <div style="width:60px;height:60px;border-radius:16px;background:rgba(16,185,129,0.15);color:#C2410C;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin:0 auto 16px;">
          <i class="fas fa-running"></i>
        </div>
        <h3 style="font-size:1.25rem;font-weight:800;color:#201713;margin-bottom:10px;">Action</h3>
        <p style="font-size:0.88rem;color:#756B63;line-height:1.7;">Continuous fleet maintenance, expert certified chauffeurs, 24/7 round-the-clock support desk, and seamless Razorpay digital bookings.</p>
      </div>
    </div>

  </div>
</section>

@endsection