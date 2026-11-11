@extends('layouts.weblayout')

@section('content')
<div class="post-hero-quick-nav" aria-label="Quick navigation">
  <a href="{{url('grouptours')}}">GROUP TOUR</a>
  <a href="javascript:void(0)" onclick="openContactModal()">CUSTOMIZED TOUR</a>
  <a href="javascript:void(0)" onclick="openContactModal()">CONTACT US</a>
</div>

<section style="padding:60px 0 80px;">
  <div style="max-width:1240px;margin:0 auto;padding:0 24px;">
    <div style="display:grid;grid-template-columns:repeat(auto-fill, minmax(340px, 1fr));gap:30px;">

    @foreach($calender as $tours)

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

@endsection