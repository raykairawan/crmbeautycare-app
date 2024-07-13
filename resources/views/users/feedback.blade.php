<div id="feedbackForm" class="feedback-form-container">
    <div class="feedback-form">
        <h2>Give Feedback</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form id="feedbackForm" action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="rating" class="form-label">Rating (1-5)</label>
                <div class="rating-stars">
                    <i data-value="1" class="star fas fa-star"></i>
                    <i data-value="2" class="star fas fa-star"></i>
                    <i data-value="3" class="star fas fa-star"></i>
                    <i data-value="4" class="star fas fa-star"></i>
                    <i data-value="5" class="star fas fa-star"></i>
                </div>
                <input type="hidden" id="rating" name="rating" value="0" required>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
