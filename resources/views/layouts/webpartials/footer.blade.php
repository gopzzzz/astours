
<footer class="footer-glass">
  <div style="max-width:1280px;margin:0 auto;padding:0 24px;">
    <div class="footer-grid-5col">
      <div class="footer-brand-widget">
        <img src="{{asset('public/web/logo.png')}}" alt="Pandavas Holidays" />
        <p style="font-size:0.86rem;line-height:1.7;color:#B9AAA0;">Pandavas Holidays is your premier tour operator in North Paravur, Ernakulam. Luxury bus travel, tailor-made Kerala holidays, and sacred pilgrim tours.</p>
      </div>
      <div>
        <h4 class="footer-col-head">Navigation</h4>
        <ul class="footer-list-links">
          <li><a href="{{url('index')}}">Home</a></li>
          <li><a href="{{url('grouptours')}}">Group Tours </a></li>
          <li><a href="{{url('alender-packages')}}">Package Calender</a></li>
          <li><a href="{{url('aboutus')}}">About Us</a></li>
          <li><a href="{{url('reviewslist')}}">Reviews</a></li>
         
        </ul>
      </div>
      <div>
        <h4 class="footer-col-head">Popular Tours</h4>
       <ul class="footer-list-links">
    @foreach($populartours as $poptour)
        <li>
            <a href="{{ url('booknow/' . $poptour->slug) }}">
                {{ $poptour->tourname }}
            </a>
        </li>
    @endforeach
</ul>
      </div>
      <div>
        <h4 class="footer-col-head">Services</h4>
        <ul class="footer-list-links">
          <li><a href="{{url('grouptours')}}">Bus Seat Booking</a></li>
          <li><a href="{{url('grouptours')}}">Pilgrimage Packages</a></li>
          <li><a href="{{url('grouptours')}}">Honeymoon Specials</a></li>
          <li><a href="{{url('grouptours')}}">Corporate Outings</a></li>
        </ul>
      </div>
      <div>
        <h4 class="footer-col-head">North Paravur Hub</h4>
        <p style="font-size:0.85rem;color:#B9AAA0;margin-bottom:8px;"><i class="fas fa-map-marker-alt" style="color:#F97316;margin-right:6px;"></i> NH 66, North Paravur, Ernakulam, Kerala - 683513</p>
        <p style="font-size:0.85rem;color:#B9AAA0;margin-bottom:8px;"><i class="fas fa-phone-alt" style="color:#F97316;margin-right:6px;"></i> +91 98471 23456</p>
        <p style="font-size:0.85rem;color:#B9AAA0;"><i class="fas fa-envelope" style="color:#F97316;margin-right:6px;"></i> info@pandavasholidays.com</p>
      </div>
    </div>
    <div class="footer-sub-bar">
      &copy; 2026 Pandavas Holidays. All Rights Reserved. Developed By <a href="https://routeqinnovations.com/" target="_blank"> Routeq Innovations PVT LTD.</a>
    </div>
  </div>
</footer>
<div class="modal-backdrop-wrap auth-travel-bg" id="authModalWrap">
  <div class="glass-login-card">
    <button class="glass-close-btn" onclick="closeAuthModal()" aria-label="Close"><i class="fas fa-times"></i></button>
<div id="paneLogin">
      <div class="glass-switch-prompt">
        Don't have an account? <a onclick="switchAuthPane('signup')">Sign Up</a>
      </div>
      
      <h2 class="glass-card-title">Login</h2>
      
      <form onsubmit="handleLoginSubmit(event)">
<div class="glass-input-pill">
          <i class="far fa-user"></i>
          <input type="email" id="loginEmailField" placeholder="email" required />
        </div>
<div class="glass-input-pill">
          <i class="fas fa-lock"></i>
          <input type="password" id="loginPasswordField" placeholder="Password" required />
        </div>
<button type="submit" class="btn-glass-pill">Login</button>
<div class="glass-extra-row">
          <label class="glass-checkbox-label">
            <input type="checkbox" checked />
            <span>Remember Me</span>
          </label>
          <a href="javascript:void(0)" class="glass-forgot-link" onclick="showToast('Password recovery sent to your email!')">Forgot password?</a>
        </div>
      </form>
    </div>
<div id="paneSignup" style="display:none;">
      <div class="glass-switch-prompt">
        Have an account? <a onclick="switchAuthPane('login')">Login</a>
      </div>
      
      <h2 class="glass-card-title">Sign Up</h2>
      
      <form onsubmit="handleSignupSubmit(event)">
        <div class="glass-input-pill">
          <i class="far fa-user"></i>
          <input type="text" id="signupNameField" placeholder="Full Name" required />
        </div>
        
        <div class="glass-input-pill">
          <i class="far fa-envelope"></i>
          <input type="email" id="signupEmailField" placeholder="Email Address" required />
        </div>
        
        <div class="glass-input-pill">
          <i class="fas fa-phone-alt"></i>
          <input type="tel" id="signupPhoneField" placeholder="Phone Number" required />
        </div>
        
        <div class="glass-input-pill">
          <i class="fas fa-lock"></i>
          <input type="password" id="signupPasswordField" placeholder="Create Password" required />
        </div>

        <div class="glass-input-pill">
          <i class="far fa-calendar-alt"></i>
          <input type="date" id="signupDobField" required />
        </div>
        
        <div style="margin: 10px 4px;">
          <label class="glass-checkbox-label" style="font-size:0.8rem;">
            <input type="checkbox" required />
            <span>I agree to the Terms &amp; Conditions</span>
          </label>
        </div>

        <button type="submit" class="btn-glass-pill">Sign Up</button>
      </form>
    </div>
  </div>
</div>
<div class="modal-backdrop-wrap" id="contactModal" style="background:rgba(0,0,0,0.65);">
  <div class="glass-login-card" style="max-width:480px;background:rgba(255,255,255,0.95);color:#201713;">
    <button class="glass-close-btn" onclick="closeContactModal()" style="background:#FFF2E8;color:#333;"><i class="fas fa-times"></i></button>
    <h3 style="font-size:1.35rem;font-weight:800;margin-bottom:6px;color:#201713;text-align:center;">Contact Pandavas Holidays</h3>
    <p style="font-size:0.84rem;color:#756B63;text-align:center;margin-bottom:20px;">North Paravur, Ernakulam, Kerala</p>
    
   <form action="{{ route('contact.submit') }}" method="POST" >
    @csrf

    <div style="margin-bottom:12px;">
        <label style="font-size:0.8rem;font-weight:600;display:block;margin-bottom:4px;">
            Your Name
        </label>

        <input
            type="text"
            name="name"
            class="upi-white-input"
            placeholder="Alen John"
            required
        />
    </div>

    <div style="margin-bottom:12px;">
        <label style="font-size:0.8rem;font-weight:600;display:block;margin-bottom:4px;">
            Phone / WhatsApp
        </label>

        <input
            type="tel"
            name="phone"
            class="upi-white-input"
            placeholder="+91 98765 43210"
            required
        />
    </div>

    <div style="margin-bottom:12px;">
        <label style="font-size:0.8rem;font-weight:600;display:block;margin-bottom:4px;">
            Your Trip Location
        </label>

        <input
            type="text"
            name="place"
            class="upi-white-input"
            placeholder="Thailand"
            required
        />
    </div>

    <div style="margin-bottom:16px;">
        <label style="font-size:0.8rem;font-weight:600;display:block;margin-bottom:4px;">
            Message
        </label>

        <textarea
            rows="3"
            name="message"
            class="upi-white-input"
            placeholder="Inquiry about tour packages..."
            required
            style="resize:vertical;"
        ></textarea>
    </div>

    <button
        type="submit"
        class="btn-confirm-seats-green"
        style="width:100%;padding:12px;font-size:0.95rem;"
    >
        Send Inquiry
    </button>

</form>

  </div>
</div>



@if(session('success'))

    <div class="success-popup-overlay" id="successPopup">

        <div class="success-popup">

            <button class="success-popup-close"
                    onclick="closeSuccessPopup()">
                &times;
            </button>

            <div class="success-popup-icon">
                <i class="fas fa-check"></i>
            </div>

            <h3>Success!</h3>

            <p>{{ session('success') }}</p>

            <button class="success-popup-btn"
                    onclick="closeSuccessPopup()">
                OK
            </button>

        </div>

    </div>

@endif


<style>
.success-popup-overlay {
    position: fixed;
    inset: 0;
    z-index: 99999;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(0, 0, 0, 0.55);
    backdrop-filter: blur(4px);

    padding: 20px;

    animation: popupOverlayIn 0.25s ease;
}

.success-popup {
    position: relative;

    width: 100%;
    max-width: 390px;

    background: #ffffff;

    border-radius: 20px;
    padding: 35px 28px 28px;

    text-align: center;

    box-shadow: 0 25px 70px rgba(0, 0, 0, 0.25);

    animation: popupIn 0.35s ease;
}

.success-popup-close {
    position: absolute;
    top: 12px;
    right: 15px;

    width: 32px;
    height: 32px;

    border: 0;
    background: #f1f5f9;

    border-radius: 50%;

    color: #64748b;
    font-size: 22px;

    cursor: pointer;

    display: flex;
    align-items: center;
    justify-content: center;
}

.success-popup-close:hover {
    background: #e2e8f0;
}

.success-popup-icon {
    width: 70px;
    height: 70px;

    margin: 0 auto 18px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #dcfce7;
    color: #16a34a;

    font-size: 30px;

    box-shadow: 0 0 0 8px #f0fdf4;
}

.success-popup h3 {
    margin: 0 0 8px;

    color: #166534;

    font-size: 24px;
    font-weight: 700;
}

.success-popup p {
    margin: 0 auto 24px;

    max-width: 300px;

    color: #64748b;

    font-size: 14px;
    line-height: 1.6;
}

.success-popup-btn {
    width: 100%;

    padding: 12px 20px;

    border: 0;
    border-radius: 10px;

    background: #16a34a;
    color: #ffffff;

    font-size: 14px;
    font-weight: 600;

    cursor: pointer;

    transition: 0.2s;
}

.success-popup-btn:hover {
    background: #15803d;
    transform: translateY(-1px);
}


@keyframes popupOverlayIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

@keyframes popupIn {
    from {
        opacity: 0;
        transform: scale(0.85) translateY(15px);
    }

    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}


/* Mobile */

@media (max-width: 480px) {

    .success-popup {
        max-width: 340px;
        padding: 32px 22px 22px;
    }

    .success-popup-icon {
        width: 60px;
        height: 60px;
        font-size: 25px;
    }

    .success-popup h3 {
        font-size: 21px;
    }
}
</style>


<script>
function closeSuccessPopup() {

    const popup = document.getElementById('successPopup');

    if (popup) {
        popup.style.opacity = '0';

        setTimeout(() => {
            popup.remove();
        }, 250);
    }
}


/* Close when clicking outside */

document.addEventListener('click', function(event) {

    const popup = document.getElementById('successPopup');

    if (popup && event.target === popup) {
        closeSuccessPopup();
    }

});
</script>
