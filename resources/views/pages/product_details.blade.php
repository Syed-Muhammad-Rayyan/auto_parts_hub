@extends('layouts.app')

@section('title', $product->name . ' - Auto Parts Hub')

@section('content')
    <div class="container py-5">
        <div class="row align-items-center g-4">
            <!-- Product Image -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/' . $product->image) }}"
                     alt="{{ $product->name }}"
                     class="img-fluid"
                     style="max-height: 400px; object-fit: contain;">
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h2 class="fw-bold" style="color: #dc2d34;">{{ $product->name }}</h2>
                <p class="text-muted small">{{ $product->short }}</p>
                <h3 class="mt-3">PKR {{ number_format($product->price) }}</h3>

                <hr>

                <h5 class="fw-semibold">Product Description</h5>
                <p>{{ $product->description }}</p>

                <!-- Add to Cart Form -->
                <div class="mt-4">
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <!-- Pass the product ID to the controller -->
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="mb-3">
                            <label for="quantity" class="form-label fw-bold">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" class="form-control w-25" min="1" value="1" required>
                        </div>

                        <button type="submit" class="btn text-white px-4" style="background-color: #dc2d34;">
                            Add to Cart
                        </button>
                    </form>


                @if(session('success'))
                        <div class="alert alert-success mt-3">
                            ✅ {{ session('success') }}
                        </div>
                    @endif
                </div>

                <!-- Back to Products -->
                <div class="mt-3">
                    <a href="{{ route('products.index') }}" class="text-muted">&larr; Back to Products</a>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="container mt-5">
            <h3 class="mb-4 fw-bold" style="color: #dc2d34;">Customer Reviews</h3>

            <!-- Where reviews will appear -->
            <div id="reviewsList" class="mb-4"></div>

            <!-- Write a Review -->
            <h4 class="mb-3 fw-semibold">Write a Review</h4>
            <form id="reviewForm" class="p-4 shadow-sm rounded-3 bg-white">
                <div class="mb-3">
                    <label for="reviewName" class="form-label fw-bold">Your Name</label>
                    <input type="text" id="reviewName" class="form-control" placeholder="Enter your name" required>
                </div>

                <div class="mb-3">
                    <label for="reviewRating" class="form-label fw-bold">Rating</label>
                    <select id="reviewRating" class="form-select" required>
                        <option value="">Select Rating</option>
                        <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
                        <option value="4">⭐⭐⭐⭐ - Good</option>
                        <option value="3">⭐⭐⭐ - Average</option>
                        <option value="2">⭐⭐ - Poor</option>
                        <option value="1">⭐ - Terrible</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="reviewComment" class="form-label fw-bold">Comment</label>
                    <textarea id="reviewComment" class="form-control" rows="4" placeholder="Write your review..." required></textarea>
                </div>

                <button type="submit" class="btn text-white px-4 py-2" style="background-color: #dc2d34;">
                    Submit Review
                </button>
            </form>

            <!-- Success Message -->
            <div id="reviewSuccess" class="alert alert-success mt-3" style="display: none;">
                ✅ Thank you for your review!
            </div>
        </div>
    </div>

    <!-- JS for Reviews -->
    <script>
        document.getElementById("reviewForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const name = document.getElementById("reviewName").value;
            const rating = document.getElementById("reviewRating").value;
            const comment = document.getElementById("reviewComment").value;

            // Create new review element
            const newReview = document.createElement("div");
            newReview.classList.add("border", "p-3", "rounded", "mb-3");
            newReview.innerHTML = `
            <strong>${name}</strong><br>
            <span class="text-warning">${"★".repeat(rating)}${"☆".repeat(5 - rating)}</span>
            <p class="mt-2">${comment}</p>
        `;

            document.getElementById("reviewsList").appendChild(newReview);

            // Show success message
            document.getElementById("reviewSuccess").style.display = "block";

            // Reset form
            this.reset();

            // Hide message after 3s
            setTimeout(() => {
                document.getElementById("reviewSuccess").style.display = "none";
            }, 3000);
        });
    </script>
@endsection
