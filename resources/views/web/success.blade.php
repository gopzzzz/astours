@extends('layouts.weblayout')

@section('content')

<div class="modal-backdrop-wrap" id="enquirySuccessModal"
     style="background:rgba(0,0,0,0.7);">

    <div class="glass-login-card"
         style="
            max-width:440px;
            width:90%;
            background:rgba(255,255,255,0.98);
            color:#201713;
            text-align:center;
            padding:32px 28px;
            border-radius:16px;
         ">

        <!-- Success Icon -->
        <div style="
            width:72px;
            height:72px;
            border-radius:50%;
            background:#FFF2E8;
            color:#EA580C;
            font-size:2rem;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:0 auto 18px;
        ">
            <i class="fas fa-check"></i>
        </div>

        <!-- Heading -->
        <h3 style="
            font-size:1.5rem;
            font-weight:800;
            margin-bottom:8px;
            color:#201713;
        ">
            Enquiry Sent Successfully!
        </h3>

        <!-- Message -->
        <p style="
            font-size:0.92rem;
            line-height:1.6;
            color:#756B63;
            margin:0 0 24px;
        ">
            Thank you for your enquiry. Our team has received your request
            and will connect with you soon.
        </p>

        <!-- Contact Message -->
        <div style="
            background:#FFF7F0;
            border-radius:10px;
            padding:14px 16px;
            margin-bottom:22px;
            border:1px dashed #FDBA74;
        ">
            <div style="
                font-size:0.78rem;
                color:#9A3412;
                font-weight:600;
            ">
                OUR TEAM WILL CONTACT YOU
            </div>

            <div style="
                font-size:0.9rem;
                color:#756B63;
                margin-top:4px;
            ">
                Please keep your phone available for our call.
            </div>
        </div>

        <!-- Button -->
        <a href="{{ url('/index') }}"
           class="btn-confirm-seats-green"
           style="
                display:block;
                text-align:center;
                padding:13px;
                text-decoration:none;
                border-radius:8px;
                font-weight:700;
           ">
            Continue Browsing
        </a>

    </div>
</div>


@endsection