<div id="review-overlay" class="review-overlay" style="display:none;"></div>
<div id="review-modal" class="review-modal" role="dialog" aria-modal="true" aria-labelledby="reviewTitle" style="display:none;">
    <section class="review-container" aria-label="Formulir Ulasan">
        <h2 id="reviewTitle">Berikan Review Anda</h2>
        <form id="review-form" action="<?= BASE_URL ?>/reviews/add" method="POST">
            <input type="hidden" name="rental_id" value="<?= $rental_id ?>">
            <input type="hidden" name="console_id" value="<?= $console_id ?>">
            <label for="rating">Rating</label>
            <select id="rating" name="rating" required>
                <option value="" disabled selected>Pilih rating</option>
                <option value="1">⭐</option>
                <option value="2">⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="5">⭐⭐⭐⭐⭐</option>
            </select>
            <label for="comment">Komentar</label>
            <textarea id="comment" name="comment" placeholder="Tulis komentar Anda di sini..." rows="4" required></textarea>
            <button type="submit" class="submit-btn">Kirim Review</button>
            <button type="button" class="close-btn" id="close-review-modal">Batal</button>
        </form>
    </section>
</div>

<!-- Tombol untuk membuka modal (contoh) -->
<button id="open-review-modal" style="margin:2rem;">Beri Review</button>

<style>
.review-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.5);
    z-index: 1000;
}
.review-modal {
    position: fixed;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
    z-index: 1001;
    width: 90%;
    max-width: 400px;
    padding: 2rem 1.5rem;
    animation: flyIn 0.25s cubic-bezier(.4,2,.6,1) both;
}
@keyframes flyIn {
    from { opacity: 0; transform: translate(-50%, -60%) scale(0.95);}
    to   { opacity: 1; transform: translate(-50%, -50%) scale(1);}
}
.close-btn {
    margin-top: 1rem;
    background: #eee;
    color: #333;
    border: none;
    padding: 0.5rem 1.2rem;
    border-radius: 6px;
    cursor: pointer;
}
.close-btn:hover {
    background: #f44336;
    color: #fff;
}

/* Review Modal Container */
.review-container {
    max-width: 480px;
    margin: auto;
    background: white;
    padding: 1.8rem 2.4rem;
    border-radius: 12px;
    box-shadow: 0 12px 24px rgba(0,0,0,0.08);
}
.review-container h2 {
    color: #0d6efd;
    margin-bottom: 1rem;
    font-weight: 700;
    font-size: 1.6rem;
}
.review-container label {
    display: block;
    margin-bottom: 0.35rem;
    font-weight: 600;
    color: #444;
}
.review-container select,
.review-container textarea {
    width: 100%;
    font-size: 1rem;
    padding: 0.6rem 0.9rem;
    border: 2px solid #ccc;
    border-radius: 8px;
    transition: border-color 0.3s ease;
    resize: vertical;
    margin-bottom: 1rem;
}
.review-container select:focus,
.review-container textarea:focus {
    border-color: #0d6efd;
    outline: none;
}
.review-container textarea {
    min-height: 100px;
}
.review-container .star-label {
    font-size: 1.1rem;
    color: #f9b700;
    margin-left: 0.35rem;
}
.review-container .submit-btn {
    display: inline-block;
    margin-top: 1rem;
    padding: 0.7rem 1.6rem;
    background-color: #0d6efd;
    border: none;
    border-radius: 8px;
    color: white;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.25s ease;
}
.review-container .submit-btn:hover {
    background-color: #084ecf;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const openBtn = document.getElementById('open-review-modal');
    const closeBtn = document.getElementById('close-review-modal');
    const overlay = document.getElementById('review-overlay');
    const modal = document.getElementById('review-modal');

    function openModal() {
        overlay.style.display = 'block';
        modal.style.display = 'block';
        // Optional: Fokus ke rating saat modal dibuka
        const rating = document.getElementById('rating');
        if (rating) rating.focus();
    }

    function closeModal() {
        overlay.style.display = 'none';
        modal.style.display = 'none';
        // Optional: Reset form jika perlu
        const form = document.getElementById('review-form');
        if (form) form.reset();
    }

    if (openBtn) openBtn.onclick = openModal;
    if (closeBtn) closeBtn.onclick = closeModal;
    if (overlay) overlay.onclick = closeModal;

    // Optional: ESC key to close modal
    document.addEventListener('keydown', function(e) {
        if (modal.style.display === 'block' && e.key === 'Escape') {
            closeModal();
        }
    });
});
</script>