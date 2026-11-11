<script src="{{asset('public/web/js/main.js')}}"></script>
<script src="{{ asset('public/web/js/seat.js') }}"></script>
<script>
window.addEventListener('load', function () {
   handleProceedPayment(event);
});

function handleProceedPayment(event) {
    if (event) event.preventDefault();

    const successModal = document.getElementById("enquirySuccessModal");

    if (successModal) {
        successModal.classList.add("open");
        document.body.style.overflow = "hidden";
    }
}

</script>