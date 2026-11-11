const SEAT_PRICE = 2499;
const config = window.PANDAVAS_SEAT_CONFIG || {};
const TOTAL_SEATS = Number(config.totalSeats ?? 50);

const bookedSeats = Array.isArray(config.bookedSeats)
  ? config.bookedSeats.map(Number).filter(Number.isFinite)
  : [];

let selectedSeats = [];

function readBookedSeats(source) {
  const values = Array.isArray(source) ? source : [];
  return [...new Set(
    values.map(Number).filter(n => Number.isInteger(n) && n >= 1 && n <= TOTAL_SEATS)
  )].sort((a, b) => a - b);
}

function getBookedSeats() {
  const config = window.PANDAVAS_SEAT_CONFIG || {};
  let storedSeats = [];

  try {
    const raw = localStorage.getItem('pandavas_booked_seats');
    if (raw) {
      const parsed = JSON.parse(raw);
      if (Array.isArray(parsed)) storedSeats.push(...parsed);
    }
  } catch (_) {}

  if (Array.isArray(config.dynamicBookedSeats)) {
    storedSeats.push(...config.dynamicBookedSeats);
  }

  return readBookedSeats(storedSeats);
}

window.PandavasSeatAPI = {
  setBookedSeats(seatNumbers) {
    const valid = readBookedSeats(seatNumbers);
    localStorage.setItem('pandavas_booked_seats', JSON.stringify(valid));
    bookedSeats = valid;
    selectedSeats = selectedSeats.filter(s => !bookedSeats.includes(s));
    initSeatGrid();
    return bookedSeats;
  },
  addBookedSeats(seatNumbers) {
    const current = getBookedSeats();
    const toAdd = Array.isArray(seatNumbers) ? seatNumbers : [seatNumbers];
    return this.setBookedSeats([...current, ...toAdd]);
  },
  clearBookedSeats() {
    localStorage.removeItem('pandavas_booked_seats');
    bookedSeats = [];
    initSeatGrid();
    return bookedSeats;
  },
  getBookedSeats() {
    return [...bookedSeats];
  },
  refresh() {
    refreshBookedSeats();
  }
};

function createAisleCell() {
  const span = document.createElement('span');
  span.className = 'seat-aisle-spacer';
  span.setAttribute('aria-hidden', 'true');
  return span;
}

function createEmptyCell() {
  const span = document.createElement('span');
  span.className = 'seat-empty';
  span.setAttribute('aria-hidden', 'true');
  return span;
}

function createSeatElement(seatNumber) {
  const btn = document.createElement('button');
  btn.type = 'button';
  btn.className = 'bus-seat-box';
  btn.id = `seat-${seatNumber}`;
  btn.textContent = seatNumber;
  btn.setAttribute('aria-label', `Seat ${seatNumber}`);

  if (bookedSeats.includes(seatNumber)) {
    btn.classList.add('booked');
    btn.disabled = true;
    btn.setAttribute('aria-label', `Seat ${seatNumber}, already booked`);
  } else {
    btn.addEventListener('click', () => toggleSeat(seatNumber));
  }

  return btn;
}

function initSeatGrid() {
  const container = document.querySelector('.seat-quad-rows');
  if (!container) return;

  container.innerHTML = '';
  bookedSeats = getBookedSeats();
  selectedSeats = selectedSeats.filter(s => !bookedSeats.includes(s));

  const frontRow = document.createElement('div');
  frontRow.className = 'seat-row-pair';
  frontRow.appendChild(createEmptyCell());
  frontRow.appendChild(createEmptyCell());
  frontRow.appendChild(createAisleCell());
  frontRow.appendChild(createSeatElement(1));
  frontRow.appendChild(createSeatElement(2));
  container.appendChild(frontRow);

  for (let r = 0; r < 7; r++) {
    const base = 3 + r * 4;
    const row = document.createElement('div');
    row.className = 'seat-row-pair';
    row.appendChild(createSeatElement(base));
    row.appendChild(createSeatElement(base + 1));
    row.appendChild(createAisleCell());
    row.appendChild(createSeatElement(base + 2));
    row.appendChild(createSeatElement(base + 3));
    container.appendChild(row);
  }

  const backRow = document.createElement('div');
  backRow.className = 'seat-row-pair seat-final-row';
  for (let n = 31; n <= 35; n++) {
    backRow.appendChild(createSeatElement(n));
  }
  container.appendChild(backRow);

  updateSelectionDisplay();
}

function toggleSeat(seatNumber) {
  if (bookedSeats.includes(seatNumber)) return;

  const btn = document.getElementById(`seat-${seatNumber}`);
  if (!btn) return;

  const idx = selectedSeats.indexOf(seatNumber);
  if (idx >= 0) {
    selectedSeats.splice(idx, 1);
    btn.classList.remove('selected');
  } else {
    selectedSeats.push(seatNumber);
    btn.classList.add('selected');
  }

  selectedSeats.sort((a, b) => a - b);
  updateSelectionDisplay();
}

function updateSelectionDisplay() {
  const statusEl = document.getElementById('selectedSeatsStatusText');
  const confirmBtn = document.getElementById('confirmSeatsActionBtn');

  if (statusEl) {
    statusEl.textContent = selectedSeats.length
      ? `Selected Seats: ${selectedSeats.join(', ')}`
      : 'Selected Seats: None';
  }

  if (confirmBtn) {
    const hasSelection = selectedSeats.length > 0;
    confirmBtn.disabled = !hasSelection;
    confirmBtn.style.opacity = hasSelection ? '1' : '0.55';
    confirmBtn.style.cursor = hasSelection ? 'pointer' : 'not-allowed';
  }
}

function proceedToConfirm() {
  if (!selectedSeats.length) {
    alert('Please select at least one seat.');
    return;
  }

  const booking = {
    package: 'Munnar Misty Hills & Tea Gardens',
    start: 'North Paravur, Ernakulam',
    dest: 'Munnar',
    date: '15 Oct 2026',
    seats: [...selectedSeats],
    pricePerSeat: SEAT_PRICE,
    totalAmount: selectedSeats.length * SEAT_PRICE,
    bookingId: `PND-${Math.floor(100000 + Math.random() * 900000)}`
  };

  localStorage.setItem('pandavas_current_booking', JSON.stringify(booking));
  window.location.href = 'payment.html';
}

async function refreshBookedSeats() {
  const config = window.PANDAVAS_SEAT_CONFIG || {};
  const url = config.bookedSeatsUrl;

  if (!url) {
    const latest = getBookedSeats();
    const changed = latest.join(',') !== bookedSeats.join(',');
    if (changed) initSeatGrid();
    return;
  }

  try {
    const response = await fetch(url, { cache: 'no-store' });
    if (!response.ok) return;
    const data = await response.json();
    const latest = readBookedSeats(data.bookedSeats ?? data.seats ?? data);
    if (latest.join(',') !== bookedSeats.join(',')) {
      bookedSeats = latest;
      selectedSeats = selectedSeats.filter(s => !bookedSeats.includes(s));
      initSeatGrid();
    }
  } catch (_) {}
}

document.addEventListener('DOMContentLoaded', () => {
  initSeatGrid();
  refreshBookedSeats();
  setInterval(refreshBookedSeats, 5000);
  window.addEventListener('storage', () => {
    refreshBookedSeats();
  });
});
