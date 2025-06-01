<div class="review-page-container">
    <section class="review-container" aria-label="Formulir Ulasan">
        <h2 id="reviewTitle">Berikan Review Anda</h2>
        <form id="review-form" action="<?= BASE_URL ?>/addReviews/add" method="POST">
            <input type="hidden" name="rental_id" value="<?= htmlspecialchars($rental_id ?? '') ?>">
            <input type="hidden" name="console_id" value="<?= htmlspecialchars($console_id ?? '') ?>">
            
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
        </form>
    </section>
</div>

<style>
body, html {
    background: linear-gradient(135deg, #229ebc, #023047) !important;
    color: #fff;
    min-height: 100vh;
    margin: 0;
    padding: 0;
}
.review-page-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
.review-container {
    max-width: 480px;
    margin: auto;
    background:  #023047;
    padding: 1.8rem 2.4rem;
    border-radius: 12px;
    box-shadow: 0 12px 24px #ffffff;
}
.review-container h2 {
    color: #ffffff;
    margin-bottom: 1rem;
    font-weight: 700;
    font-size: 1.6rem;
}
.review-container label {
    display: block;
    margin-bottom: 0.35rem;
    font-weight: 600;
    color: #ffffff;
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
.review-container .submit-btn {
    display: inline-block;
    margin-top: 1rem;
    padding: 0.7rem 1.6rem;
    background-color: #229ebc;
    border: none;
    border-radius: 8px;
    color: white;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.25s ease;
}
.review-container .submit-btn:hover {
    background-color: #8ecae6;
}

</style>
