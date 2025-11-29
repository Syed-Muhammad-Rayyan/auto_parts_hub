@extends('layouts.app')

@section('title', 'Contact - Auto Parts Hub')

@section('content')
    <div class="container py-5">
        <h2 class="hb mb-4">Contact Us</h2>

        <div class="row g-4">
            <!-- Left info / social -->
            <div class="col-lg-4">
                <div class="soft-card-sm text-center">
                    <img src="{{ asset('images/brake2.png') }}" alt="brand" class="img-fluid mb-3 rounded-image">
                    <h4 class="fw-bold">AutoParts Hub</h4>
                    <p class="text-muted small">Quality car parts & accessories. Fast delivery across Pakistan.</p>

                    <div class="mt-3">
                        <div class="fw-semibold mb-2">Contact Info</div>
                        <div class="small text-muted">Email: info@autopartshub.example</div>
                        <div class="small text-muted">Phone: +92 300 1234567</div>
                    </div>

                    <hr>

                    <div class="fw-semibold mb-2">Follow Us</div>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="https://facebook.com/" target="_blank" class="icon-circle facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com/" target="_blank" class="icon-circle instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/923001234567" target="_blank" class="icon-circle whatsapp"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://linkedin.com/" target="_blank" class="icon-circle linkedin"><i class="fab fa-linkedin-in"></i></a>
                    </div>


                    <p class="small text-muted mt-3">Have a question? Send us an email or message on WhatsApp — we reply quickly.</p>
                </div>
            </div>

            <!-- Right: Form -->
            <div class="col-lg-8">
                <div class="soft-card">
                    <h4 class="fw-bold mb-3">Get in touch</h4>
                    <p class="text-muted mb-4">Fill the form below and we’ll reply within 24 hours.</p>

                    <form action="{{ route('contact.send') }}" method="POST">
                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Your Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Ali Ahmed" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="+92 3xx xxxxxxx" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Subject</label>
                                <input type="text" name="subject" class="form-control" placeholder="Order / Inquiry / Support" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Message</label>
                                <textarea name="message" rows="5" class="form-control" placeholder="Type your message..." required></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="small text-muted">Or reach us at <strong>+92 300 1234567</strong></div>
                            <button type="submit" class="btn-brand">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .soft-card, .soft-card-sm {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            padding: 25px;
            transition: 0.3s ease;
        }

        .soft-card:hover, .soft-card-sm:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .icon-circle {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .icon-circle.facebook { background: #1877f2; }
        .icon-circle.instagram { background: #e1306c; }
        .icon-circle.whatsapp { background: #25d366; }
        .icon-circle.linkedin { background: #0a66c2; }

        .icon-circle:hover {
            transform: translateY(-4px) scale(1.1);
            opacity: 0.9;
        }

        .btn-brand {
            background-color: #dc2d34;
            color: #fff;
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: 600;
            transition: 0.3s ease;
            border: none;
        }

        .btn-brand:hover {
            background-color: #b91f27;
            transform: translateY(-2px);
        }

        input, textarea {
            border-radius: 10px !important;
            border: 1px solid #ddd;
        }

        input:focus, textarea:focus {
            border-color: #dc2d34;
            box-shadow: 0 0 5px rgba(220,45,52,0.4);
        }

        .rounded-image {
            border-radius: 50%;
            width: 100px;
        }
    </style>


@endsection
