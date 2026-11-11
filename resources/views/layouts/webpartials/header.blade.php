<header id="navbar">
  <div class="nav-container">
    <a href="{{url('index')}}" class="nav-brand-wrap">
      <div class="nav-logo-box">
        <img src="{{asset('public/web/logo.png')}}" alt="Pandavas Holidays Logo" />
      </div>
      <span class="brand-text-name">PANDAVAS HOLIDAYS</span>
    </a>
    
    <nav class="nav-links-menu" id="navLinksMenu">
      <a href="{{url('index')}}" class="nav-item-link">Home</a>
      <a href="{{url('aboutus')}}" class="nav-item-link">About Us</a>
      <a href="{{url('grouptours')}}" class="nav-item-link">Group Tours</a>
      <a href="javascript:void(0)" onclick="openContactModal()" class="nav-item-link">Customized Tour</a>
      <a href="{{url('calender-packages')}}" class="nav-item-link">Package Calender</a>
      
      <a href="javascript:void(0)" class="nav-item-link" onclick="openContactModal()">Contact</a>
     
    </nav>

     <div style="display:flex;align-items:center;gap:12px;">
      <!-- <button class="btn-nav-auth" id="navAuthBtn">LOGIN</button> -->
      <button class="nav-hamburger-btn" id="navHamburger" aria-label="Menu" aria-expanded="false" type="button">
        <span></span><span></span><span></span>
      </button>
    </div>
   
  </div>
</header>