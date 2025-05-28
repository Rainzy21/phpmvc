
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.querySelector('.mobile-menu');

    hamburger.addEventListener('click', function() {
        mobileMenu.classList.toggle('active');
        hamburger.classList.toggle('active');
    });
});

// Pesanan
document.querySelectorAll('.order-card').forEach(function(card) {
    const statusEl = card.querySelector('[id^="order-status-"]');
    if (!statusEl) return;
    const status = statusEl.getAttribute('data-status')?.toLowerCase() || '';
    const iconEl = statusEl.querySelector('.status-icon');
    const textEl = statusEl.querySelector('.status-text');

    const statusMap = {
        pending: {text: "Pending", className: "status-pending"},
        ongoing: {text: "Ongoing", className: "status-ongoing"},
        completed: {text: "Selesai", className: "status-completed"},
        cancelled: {text: "Dibatalkan", className: "status-cancelled"}
    };

    if(statusMap[status]) {
        iconEl.className = 'status-icon ' + statusMap[status].className;
        textEl.textContent = statusMap[status].text;
    } else {
        iconEl.style.backgroundColor = '#6c757d';
        textEl.textContent = status;
    }

    // Notes section
    const orderId = statusEl.id.replace('order-status-', '');
    const notesSection = card.querySelector('#notes-section-' + orderId);
    const notesValue = card.querySelector('#order-notes-' + orderId);
    if (notesSection && notesValue && notesValue.textContent.trim().length > 0) {
        notesSection.style.display = 'block';
    } else if (notesSection) {
        notesSection.style.display = 'none';
    }
});



