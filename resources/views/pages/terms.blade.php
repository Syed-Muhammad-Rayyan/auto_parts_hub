@extends('layouts.app')

@section('title', 'Terms & Conditions - Auto Parts Hub')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 fw-bold text-primary mb-2">Terms & Conditions</h1>
                    <p class="text-muted mb-0">Last updated: December 2025</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('about') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to About Us
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms Content -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">1. Acceptance of Terms</h3>
                        <p>
                            By accessing and using Auto Parts Hub, you accept and agree to be bound by the terms and provision
                            of this agreement. If you do not agree to abide by the above, please do not use this service.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">2. Use License</h3>
                        <p>
                            Permission is granted to temporarily access the materials (information or software) on Auto Parts Hub
                            for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title,
                            and under this license you may not:
                        </p>
                        <ul class="ms-3">
                            <li>modify or copy the materials</li>
                            <li>use the materials for any commercial purpose or for any public display</li>
                            <li>attempt to reverse engineer any software contained on Auto Parts Hub</li>
                            <li>remove any copyright or other proprietary notations from the materials</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">3. Product Information & Pricing</h3>
                        <p>
                            We strive to provide accurate product descriptions and pricing. However, we do not warrant that product
                            descriptions or other content is accurate, complete, reliable, current, or error-free. Prices are subject
                            to change without notice.
                        </p>
                        <p>
                            All products are subject to availability. We reserve the right to discontinue any product at any time.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">4. Orders & Payment</h3>
                        <p>
                            All orders are subject to acceptance and availability. We reserve the right to refuse or cancel any order
                            for any reason, including but not limited to product availability, errors in product information, or payment issues.
                        </p>
                        <p>
                            Payment must be received in full before order processing begins. We accept major credit cards and other
                            secure payment methods.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">5. Shipping & Delivery</h3>
                        <p>
                            We will make every effort to deliver products within the estimated timeframe. However, delivery dates are
                            estimates only and we are not liable for delays caused by factors beyond our control.
                        </p>
                        <p>
                            Risk of loss passes to the buyer upon delivery to the carrier. We recommend inspecting packages upon delivery
                            and reporting any damage immediately.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">6. Returns & Refunds</h3>
                        <p>
                            We want you to be satisfied with your purchase. If you are not satisfied, please contact us within 30 days
                            of delivery for return authorization. Items must be in original condition and packaging.
                        </p>
                        <p>
                            Refunds will be processed within 5-7 business days after receipt and inspection of returned items.
                            Shipping charges are non-refundable unless the return is due to our error.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">7. Warranties</h3>
                        <p>
                            Products are covered by manufacturer warranties where applicable. We pass through all manufacturer warranties
                            to the original purchaser. Warranty claims must be handled directly with the manufacturer.
                        </p>
                        <p>
                            Our liability is limited to the purchase price of the product. We are not liable for consequential or
                            incidental damages.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">8. User Reviews & Content</h3>
                        <p>
                            By submitting reviews or content to our website, you grant us a non-exclusive, royalty-free, perpetual,
                            and worldwide license to use, display, and distribute such content.
                        </p>
                        <p>
                            You are responsible for the content you submit and must not post offensive, illegal, or infringing content.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">9. Privacy Policy</h3>
                        <p>
                            Your privacy is important to us. We collect and use personal information only as outlined in our Privacy Policy.
                            We do not sell or rent personal information to third parties.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">10. Limitation of Liability</h3>
                        <p>
                            Auto Parts Hub shall not be liable for any damages arising out of or in connection with the use of this website
                            or products purchased through it. Our total liability is limited to the amount paid for the product.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">11. Governing Law</h3>
                        <p>
                            These terms and conditions are governed by and construed in accordance with the laws of our jurisdiction.
                            Any disputes shall be resolved in the appropriate courts.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="h4 text-primary mb-3">12. Changes to Terms</h3>
                        <p>
                            We reserve the right to modify these terms and conditions at any time. Changes will be effective immediately
                            upon posting on this website. Your continued use of the website constitutes acceptance of the modified terms.
                        </p>
                    </div>

                    <div class="border-top pt-4">
                        <h3 class="h4 text-primary mb-3">Contact Information</h3>
                        <p>
                            If you have any questions about these Terms & Conditions, please contact us:
                        </p>
                        <ul class="list-unstyled">
                            <li><strong>Email:</strong> support@autopartshub.com</li>
                            <li><strong>Phone:</strong> +92 300 1234567</li>
                            <li><strong>Address:</strong> 123 Auto Street, Karachi, Pakistan</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Footer -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <div class="btn-group flex-wrap" role="group">
                <a href="{{ route('about') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-1"></i>About Us
                </a>
                <a href="{{ route('home') }}" class="btn btn-outline-primary">
                    <i class="fas fa-home me-1"></i>Home
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-shopping-bag me-1"></i>Products
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                    <i class="fas fa-envelope me-1"></i>Contact
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
