const DEFAULT_USER = {
  isLoggedIn: false,
  name: "Alen John",
  email: "alen.john@example.com",
  phone: "+91 98471 23456",
  dob: "1998-05-15"
};

function getAuthState() {
  const saved = localStorage.getItem("pandavas_auth_user");
  if (saved) {
    try {
      return JSON.parse(saved);
    } catch (e) {
      return { ...DEFAULT_USER };
    }
  }
  return { ...DEFAULT_USER };
}

function saveAuthState(state) {
  localStorage.setItem("pandavas_auth_user", JSON.stringify(state));
  updateNavAuthState();
}

function updateNavAuthState() {
  const state = getAuthState();
  const authBtn = document.getElementById("navAuthBtn");
  const profileLink = document.getElementById("navProfileItem");

  if (authBtn) {
    if (state.isLoggedIn) {
      authBtn.textContent = "LOGOUT";
      authBtn.onclick = handleLogout;
    } else {
      authBtn.textContent = "LOGIN";
      authBtn.onclick = () => openAuthModal("login");
    }
  }

  if (profileLink) {
    profileLink.style.display = state.isLoggedIn ? "block" : "none";
  }
}

function openAuthModal(mode = "login") {
  const modal = document.getElementById("authModalWrap");
  if (!modal) return;
  modal.classList.add("open");
  switchAuthPane(mode);
}

function closeAuthModal() {
  const modal = document.getElementById("authModalWrap");
  if (!modal) return;
  modal.classList.remove("open");
}

function switchAuthPane(mode) {
  const loginPane = document.getElementById("paneLogin");
  const signupPane = document.getElementById("paneSignup");
  if (!loginPane || !signupPane) return;

  if (mode === "login") {
    loginPane.style.display = "block";
    signupPane.style.display = "none";
  } else {
    loginPane.style.display = "none";
    signupPane.style.display = "block";
  }
}

function handleLoginSubmit(event) {
  if (event) event.preventDefault();
  const emailInput = document.getElementById("loginEmailField");
  const email = emailInput ? emailInput.value.trim() : "traveler@pandavas.com";

  const state = getAuthState();
  state.isLoggedIn = true;
  state.email = email || state.email;
  if (!state.name || state.name === "Alen John") {
    const userPart = email.split("@")[0];
    state.name = userPart ? userPart.charAt(0).toUpperCase() + userPart.slice(1) : "Valued Guest";
  }

  saveAuthState(state);
  closeAuthModal();
  showToast("Welcome back! You are now logged in.");

  if (typeof renderDashboard === "function") {
    renderDashboard();
  }
}

function handleSignupSubmit(event) {
  if (event) event.preventDefault();
  const nameInput = document.getElementById("signupNameField");
  const emailInput = document.getElementById("signupEmailField");
  const phoneInput = document.getElementById("signupPhoneField");
  const dobInput = document.getElementById("signupDobField");

  const state = getAuthState();
  state.isLoggedIn = true;
  if (nameInput && nameInput.value) state.name = nameInput.value;
  if (emailInput && emailInput.value) state.email = emailInput.value;
  if (phoneInput && phoneInput.value) state.phone = phoneInput.value;
  if (dobInput && dobInput.value) state.dob = dobInput.value;

  saveAuthState(state);
  closeAuthModal();
  showToast("Account created successfully! Welcome to Pandavas Holidays.");

  if (typeof renderDashboard === "function") {
    renderDashboard();
  }
}

function handleLogout() {
  const state = getAuthState();
  state.isLoggedIn = false;
  saveAuthState(state);
  showToast("Logged out successfully.");

  if (window.location.pathname.includes("userdashboard") || window.location.pathname.includes("dashboard")) {
    window.location.href = "index.html";
  }
}

function showToast(msg) {
  let toast = document.getElementById("glassToast");
  if (!toast) {
    toast = document.createElement("div");
    toast.id = "glassToast";
    toast.className = "toast-glass";
    toast.innerHTML = `<i class="fas fa-check-circle"></i> <span id="toastMsgText"></span>`;
    document.body.appendChild(toast);
  }
  const textEl = document.getElementById("toastMsgText");
  if (textEl) textEl.textContent = msg;

  toast.classList.add("show");
  setTimeout(() => {
    toast.classList.remove("show");
  }, 4000);
}

function initHeroSlider() {
  const slides = document.querySelectorAll(".hero-slide-bg");
  const dashes = document.querySelectorAll(".hero-dash");
  const leftArrow = document.getElementById("sliderArrowLeft");
  const rightArrow = document.getElementById("sliderArrowRight");
  if (!slides.length) return;

  let current = 0;
  let timer = null;

  function showSlide(index) {
    slides.forEach((s, i) => s.classList.toggle("active", i === index));
    dashes.forEach((d, i) => d.classList.toggle("active", i === index));
    current = index;
  }

  function nextSlide() {
    showSlide((current + 1) % slides.length);
  }

  function prevSlide() {
    showSlide((current - 1 + slides.length) % slides.length);
  }

  if (rightArrow) rightArrow.addEventListener("click", () => { nextSlide(); resetTimer(); });
  if (leftArrow) leftArrow.addEventListener("click", () => { prevSlide(); resetTimer(); });

  dashes.forEach((dash, idx) => {
    dash.addEventListener("click", () => {
      showSlide(idx);
      resetTimer();
    });
  });

  function startTimer() {
    timer = setInterval(nextSlide, 6000);
  }

  function resetTimer() {
    clearInterval(timer);
    startTimer();
  }

  startTimer();
}

function initNavbarScroll() {
  const nav = document.getElementById("navbar");
  if (!nav) return;
  window.addEventListener("scroll", () => {
    if (window.scrollY > 30) {
      nav.classList.add("scrolled");
    } else {
      nav.classList.remove("scrolled");
    }
  });
}

function initMobileNav() {
  const btn = document.getElementById("navHamburger");
  const menu = document.getElementById("navLinksMenu");
  if (!btn || !menu) return;

  const setMenuState = (open) => {
    menu.classList.toggle("open", open);
    btn.setAttribute("aria-expanded", String(open));
    btn.classList.toggle("is-open", open);
  };

  setMenuState(false);

  btn.addEventListener("click", () => {
    setMenuState(!menu.classList.contains("open"));
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") setMenuState(false);
  });

  menu.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => setMenuState(false));
  });
}

function openContactModal() {
  const modal = document.getElementById("contactModal");
  if (modal) modal.classList.add("open");
}

function closeContactModal() {
  const modal = document.getElementById("contactModal");
  if (modal) modal.classList.remove("open");
}

function handleContactSubmit(event) {
  if (event) event.preventDefault();
  closeContactModal();
  showToast("Thank you! Our Pandavas team in North Paravur will reach out shortly.");
}

document.addEventListener("DOMContentLoaded", () => {
  updateNavAuthState();
  initNavbarScroll();
  initMobileNav();
  initHeroSlider();
  initReviews();

  document.querySelectorAll(".modal-backdrop-wrap").forEach(wrap => {
    wrap.addEventListener("click", (e) => {
      if (e.target === wrap) {
        wrap.classList.remove("open");
      }
    });
  });
});

const defaultReviews = [
  { name: "Ananya Menon", rating: 5, text: "Everything was smooth from booking to the journey. The team was friendly, the planning was excellent and the trip felt truly comfortable.", date: "09 Sep 2026" },
  { name: "Rahul S.", rating: 5, text: "A very pleasant travel experience. The package was well organised and the support from Pandavas Holidays was prompt whenever we needed it.", date: "03 Sep 2026" },
  { name: "Meera Thomas", rating: 4, text: "Loved the overall experience. Good coordination, beautiful destinations and a very comfortable trip with our family.", date: "28 Aug 2026" }
];

function loadReviews() {
  try {
    const saved = JSON.parse(localStorage.getItem("pandavas_reviews") || "[]");
    return Array.isArray(saved) && saved.length ? saved : defaultReviews;
  } catch (e) {
    return defaultReviews;
  }
}

function saveReviews(reviews) {
  localStorage.setItem("pandavas_reviews", JSON.stringify(reviews));
}

function renderReviews() {
  const list = document.getElementById("reviewsList");
  if (!list) return;
  const reviews = loadReviews();
  list.innerHTML = reviews.map(review => {
    const rating = Math.max(1, Math.min(5, Number(review.rating) || 5));
    const stars = "★".repeat(rating) + "☆".repeat(5 - rating);
    return `<article class="review-card">
      <div class="review-card-header">
        <div>
          <div class="review-author">${escapeReviewHtml(review.name)}</div>
          <div class="review-date">${escapeReviewHtml(review.date)}</div>
        </div>
        <div class="review-stars" aria-label="${rating} out of 5 stars">${stars}</div>
      </div>
      <p>${escapeReviewHtml(review.text)}</p>
    </article>`;
  }).join("");
}

function escapeReviewHtml(value) {
  return String(value).replace(/[&<>'"]/g, char => ({
    "&": "&amp;",
    "<": "&lt;",
    ">": "&gt;",
    "'": "&#39;",
    '"': "&quot;"
  }[char]));
}

function initReviews() {
  const form = document.getElementById("reviewForm");
  if (!form) return;
  renderReviews();
  form.addEventListener("submit", event => {
    event.preventDefault();
    const name = document.getElementById("reviewName").value.trim();
    const rating = Number(document.getElementById("reviewRating").value);
    const text = document.getElementById("reviewText").value.trim();
    if (!name || !text) return;
    const reviews = loadReviews();
    reviews.unshift({
      name,
      rating,
      text,
      date: new Date().toLocaleDateString("en-IN", { day: "2-digit", month: "short", year: "numeric" })
    });
    saveReviews(reviews.slice(0, 12));
    form.reset();
    renderReviews();
    showToast("Thank you! Your review has been added.");
  });
}

