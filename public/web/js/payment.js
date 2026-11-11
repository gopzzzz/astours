function initPaymentScreen() {
  const upiRadio = document.getElementById("radioUpi");
  const cardRadio = document.getElementById("radioCard");
  const upiBlock = document.getElementById("blockUpi");
  const cardBlock = document.getElementById("blockCard");

  if (upiRadio && cardRadio) {
    upiRadio.addEventListener("change", () => {
      if (upiBlock) upiBlock.style.display = "block";
      if (cardBlock) cardBlock.style.display = "none";
    });

    cardRadio.addEventListener("change", () => {
      if (upiBlock) upiBlock.style.display = "none";
      if (cardBlock) cardBlock.style.display = "block";
    });
  }
}

function handleProceedPayment(event) {
  if (event) event.preventDefault();
  const btn = document.getElementById("btnProceedPayment");
  if (btn) {
    btn.disabled = true;
    btn.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Processing Razorpay...`;
  }

  setTimeout(() => {
    const saved = localStorage.getItem("pandavas_current_booking");
    let booking = null;
    if (saved) {
      booking = JSON.parse(saved);
    } else {
      booking = {
        package: "Munnar Misty Hills & Tea Gardens",
        start: "North Paravur",
        dest: "Munnar",
        date: "15 Oct 2026",
        seats: [23],
        totalAmount: 2499,
        bookingId: "PND-" + Math.floor(100000 + Math.random() * 900000)
      };
    }

    const trips = JSON.parse(localStorage.getItem("pandavas_user_trips") || "[]");
    trips.unshift({
      ...booking,
      status: "Confirmed",
      bookedOn: new Date().toLocaleDateString("en-IN")
    });
    localStorage.setItem("pandavas_user_trips", JSON.stringify(trips));

    const successModal = document.getElementById("paymentSuccessModal");
    if (successModal) {
      const codeEl = document.getElementById("refBookingCode");
      if (codeEl) codeEl.textContent = booking.bookingId;
      successModal.classList.add("open");
    } else {
      alert("Payment Successful! Booking Reference ID: " + booking.bookingId);
      window.location.href = "userdashboard.html";
    }
  }, 1600);
}

document.addEventListener("DOMContentLoaded", () => {
  initPaymentScreen();
});
