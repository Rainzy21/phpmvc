document.addEventListener('DOMContentLoaded', function() {
    // Hamburger menu
    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.querySelector('.mobile-menu');
    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            hamburger.classList.toggle('active');
        });
    }

    // Pesanan status
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

    // Modal review
    document.querySelectorAll('.open-review-modal-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.getElementById('modal-rental-id').value = btn.dataset.rentalId;
            document.getElementById('modal-console-id').value = btn.dataset.consoleId;
            document.getElementById('review-overlay').style.display = 'block';
            document.getElementById('review-modal').style.display = 'block';
        });
    });
    // Tutup modal
    const closeBtn = document.getElementById('close-review-modal');
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            document.getElementById('review-overlay').style.display = 'none';
            document.getElementById('review-modal').style.display = 'none';
            document.getElementById('review-form').reset();
        });
    }
    const overlay = document.getElementById('review-overlay');
    if (overlay) {
        overlay.addEventListener('click', function() {
            overlay.style.display = 'none';
            document.getElementById('review-modal').style.display = 'none';
            document.getElementById('review-form').reset();
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Tombol "Beri Review"
    document.querySelectorAll('.open-review-modal-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.getElementById('modal-rental-id').value = btn.dataset.rentalId;
            document.getElementById('modal-console-id').value = btn.dataset.consoleId;
            document.getElementById('review-overlay').style.display = 'block';
            document.getElementById('review-modal').style.display = 'block';
        });
    });
    // Tutup modal
    const closeBtn = document.getElementById('close-review-modal');
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            document.getElementById('review-overlay').style.display = 'none';
            document.getElementById('review-modal').style.display = 'none';
            document.getElementById('review-form').reset();
        });
    }
    const overlay = document.getElementById('review-overlay');
    if (overlay) {
        overlay.addEventListener('click', function() {
            overlay.style.display = 'none';
            document.getElementById('review-modal').style.display = 'none';
            document.getElementById('review-form').reset();
        });
    }
});



