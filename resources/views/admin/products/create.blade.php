@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
        <div class="container">
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1" style="color: #dc2d34;">Add New Product</h2>
                    <p class="text-muted mb-0">Create a new product for your inventory</p>
                </div>
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Products
                </a>
            </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="short" class="form-label">Short Description</label>
                <input type="text" name="short" class="form-control" value="{{ old('short', $product->short ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <div class="image-upload-container">
                    <div class="image-upload-area" id="image-upload-area">
                        <div class="upload-placeholder">
                            <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                            <p class="mb-2">Drag & drop an image here or click to browse</p>
                            <small class="text-muted">Supported formats: JPEG, PNG, GIF (Max: 2MB)</small>
                        </div>
                        <input type="file" name="image" id="image" class="form-control d-none" accept="image/jpeg,image/png,image/gif">
                    </div>
                    <div class="image-preview mt-3" id="image-preview" style="display: none;">
                        <div class="preview-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Image Preview</h6>
                            <button type="button" class="btn btn-sm btn-outline-danger" id="remove-image">
                                <i class="fas fa-times"></i> Remove
                            </button>
                        </div>
                        <div class="preview-image mt-2">
                            <img id="preview-img" src="" alt="Preview" class="img-fluid rounded" style="max-height: 200px;">
                        </div>
                        <small class="text-muted mt-1" id="file-info"></small>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Add Product</button>
        </form>
    </div>

    {{-- Image Upload JavaScript --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const uploadArea = document.getElementById('image-upload-area');
        const preview = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');
        const fileInfo = document.getElementById('file-info');
        const removeBtn = document.getElementById('remove-image');
        const placeholder = uploadArea.querySelector('.upload-placeholder');

        // Maximum file size (2MB)
        const MAX_SIZE = 2 * 1024 * 1024; // 2MB in bytes
        const ALLOWED_TYPES = ['image/jpeg', 'image/png', 'image/gif'];

        // Click to open file dialog
        uploadArea.addEventListener('click', function() {
            imageInput.click();
        });

        // Drag and drop functionality
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleFileSelection(files[0]);
            }
        });

        // File input change
        imageInput.addEventListener('change', function(e) {
            if (this.files.length > 0) {
                handleFileSelection(this.files[0]);
            }
        });

        // Remove image
        removeBtn.addEventListener('click', function() {
            resetImageUpload();
        });

        function handleFileSelection(file) {
            // Clear previous errors
            clearFileErrors();

            // Validate file
            if (!validateFile(file)) {
                return;
            }

            // Preview image
            previewImage(file);
        }

        function validateFile(file) {
            // Check file type
            if (!ALLOWED_TYPES.includes(file.type)) {
                showFileError('Please select a valid image file (JPEG, PNG, or GIF).');
                return false;
            }

            // Check file size
            if (file.size > MAX_SIZE) {
                showFileError('File size must be less than 2MB.');
                return false;
            }

            return true;
        }

        function previewImage(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
                placeholder.style.display = 'none';

                // Show file info
                const sizeKB = Math.round(file.size / 1024);
                fileInfo.textContent = `${file.name} (${sizeKB} KB)`;
            };
            reader.readAsDataURL(file);
        }

        function resetImageUpload() {
            imageInput.value = '';
            preview.style.display = 'none';
            placeholder.style.display = 'block';
            clearFileErrors();
        }

        function showFileError(message) {
            let errorDiv = uploadArea.querySelector('.file-error');
            if (!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.className = 'file-error';
                uploadArea.appendChild(errorDiv);
            }
            errorDiv.textContent = message;
        }

        function clearFileErrors() {
            const errorDiv = uploadArea.querySelector('.file-error');
            if (errorDiv) {
                errorDiv.remove();
            }
        }
    });
    </script>
@endsection
