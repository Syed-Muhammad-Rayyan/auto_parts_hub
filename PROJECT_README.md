# 🚗 Auto Parts Hub - Complete E-Commerce Platform

## 📋 Project Overview

This is a **Laravel 11** e-commerce platform for automotive parts with complete CRUD functionality, admin panel, API endpoints, and authentication. The project fulfills all the professor's requirements including proper category relationships, API authentication, AJAX search, and comprehensive order management.

## ✅ **Requirements Fulfilled**

### ✅ **Complete E-Commerce Flow**
- **Browse Products**: Category-based filtering with dynamic categories from database
- **Shopping Cart**: Session-based cart with add/remove/update functionality
- **Checkout Process**: Customer information collection and order creation
- **Order Storage**: Complete order history with customer details and order items
- **Order Management**: Admin panel to view and update order status

### ✅ **Category Relationships**
- **Database Structure**: Proper foreign key relationships (`category_id` in products table)
- **Dynamic Categories**: Categories loaded from database, not hardcoded
- **Product Display**: Category badges shown on product cards and admin panel
- **Relationship Queries**: Using Eloquent relationships for data retrieval

### ✅ **CRUD APIs with Authentication**
- **Custom API Authentication**: Bearer token system (similar to Passport)
- **Protected Endpoints**: All CRUD operations require authentication
- **Token Management**: Generate and manage API tokens
- **Complete CRUD**: Full Create, Read, Update, Delete operations for Products and Categories

### ✅ **AJAX-Based Search**
- **Real-time Search**: Navbar dropdown with live product suggestions
- **Backend API**: AJAX endpoints for search functionality
- **Performance**: Optimized queries with limits and proper indexing

### ✅ **Image Upload Functionality**
- **Product Images**: File upload with validation (JPEG, PNG, GIF, max 2MB)
- **Image Management**: Automatic file storage and cleanup on updates/deletes
- **Display**: Images shown in product listings and detail views

### ✅ **Postman Collection**
- **Complete API Documentation**: All endpoints documented with examples
- **Authentication Setup**: Bearer token configuration included
- **Test Data**: Sample requests for all CRUD operations

---

## 🏗️ **Architecture & Technologies**

### **Backend Stack**
- **Laravel 11**: PHP framework with modern architecture
- **SQLite Database**: Lightweight database with proper migrations
- **Eloquent ORM**: Object-relational mapping with relationships
- **Blade Templates**: Server-side templating with Bootstrap 5
- **Vite**: Asset compilation and hot reloading

### **Frontend Features**
- **Responsive Design**: Bootstrap 5 with custom CSS variables
- **Interactive Elements**: AJAX search, modals, form validation
- **Admin Dashboard**: Complete admin interface with data tables
- **User Experience**: Flash messages, loading states, error handling

### **Security Features**
- **CSRF Protection**: All forms protected with CSRF tokens
- **Input Validation**: Server-side validation on all endpoints
- **SQL Injection Prevention**: Parameterized queries via Eloquent
- **API Authentication**: Bearer token validation middleware
- **File Upload Security**: Type and size restrictions

---

## 📊 **Database Schema**

### **Core Tables**

#### **Categories** (`categories`)
```sql
- id (Primary Key)
- name (Unique category name)
- description (Optional description)
- timestamps
```

#### **Products** (`products`)
```sql
- id (Primary Key)
- name (Product name)
- short (Brief description)
- price (Integer in cents)
- category_id (Foreign Key → categories.id)
- image (Image file path)
- description (Full description)
- slug (URL-friendly identifier)
- timestamps
```

#### **Orders** (`orders`)
```sql
- id (Primary Key)
- user_id (Optional, for future user auth)
- total_amount (Order total)
- status (pending/processing/completed/cancelled)
- name, email, phone, address (Customer details)
- timestamps
```

#### **Order Items** (`order_items`)
```sql
- id (Primary Key)
- order_id (Foreign Key → orders.id)
- product_id (Foreign Key → products.id)
- quantity, price (Snapshot at order time)
- timestamps
```

#### **API Tokens** (`api_tokens`)
```sql
- id (Primary Key)
- name (Token identifier)
- token (60-character random string)
- abilities (JSON array of permissions)
- last_used_at (Timestamp)
- timestamps
```

#### **Admins** (`admins`)
```sql
- id (Primary Key)
- name, email, password (Admin credentials)
- timestamps
```

---

## 🎯 **Key Features Implementation**

### **1. Category Relationships**
```php
// Product Model
public function category() {
    return $this->belongsTo(Category::class);
}

// Category Model
public function products() {
    return $this->hasMany(Product::class);
}
```

### **2. API Authentication**
```php
// Custom middleware checks Bearer token
$token = $request->bearerToken();
$apiToken = ApiToken::where('token', $token)->first();
// Validates token and permissions
```

### **3. AJAX Search Implementation**
```javascript
// Frontend AJAX call
fetch(`/api/products/search/${query}`)
    .then(response => response.json())
    .then(data => displayResults(data));

// Backend response
{
    "success": true,
    "data": [...products...],
    "count": 5
}
```

### **4. Order Processing Flow**
```
1. Customer adds items to cart (session storage)
2. Customer proceeds to checkout
3. Form validation and order creation
4. Order items linked to order
5. Cart cleared, success page shown
6. Admin can view/manage orders
```

---

## 🚀 **Setup Instructions**

### **Prerequisites**
- PHP 8.2+
- Composer
- Node.js & NPM
- SQLite (or MySQL/PostgreSQL)

### **Installation**
```bash
# Clone repository
git clone <repository-url>
cd scdProject

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Seed database
php artisan db:seed

# Create API token for testing
php artisan db:seed --class=ApiTokenSeeder

# Build assets
npm run build

# Start development server
php artisan serve
```

### **Access Points**
- **Website**: `http://localhost:8000`
- **Admin Login**: `http://localhost:8000/admin/login`
- **API Documentation**: Import `Auto_Parts_API.postman_collection.json`

---

## 🔐 **Authentication & Security**

### **Admin Authentication**
- **Login**: Session-based authentication
- **Middleware**: `AdminAuth` protects admin routes
- **Credentials**: Stored in `admins` table with hashed passwords

### **API Authentication**
- **Token Generation**: `POST /api/auth/token`
- **Bearer Token**: Include in `Authorization: Bearer <token>` header
- **Middleware**: `ApiAuthenticate` validates all API requests

### **Security Measures**
- Password hashing with bcrypt
- CSRF protection on forms
- Input sanitization and validation
- File upload restrictions
- SQL injection prevention via Eloquent

---

## 📱 **API Endpoints**

### **Authentication**
- `POST /api/auth/token` - Generate API token

### **Categories (Protected)**
- `GET /api/categories` - List all categories
- `GET /api/categories/{id}` - Get category details
- `POST /api/categories` - Create category
- `PUT /api/categories/{id}` - Update category
- `DELETE /api/categories/{id}` - Delete category
- `GET /api/categories/{id}/products` - Get category products

### **Products (Protected)**
- `GET /api/products` - List all products
- `GET /api/products/{id}` - Get product details
- `POST /api/products` - Create product
- `PUT /api/products/{id}` - Update product
- `DELETE /api/products/{id}` - Delete product
- `GET /api/products/search/{query}` - Search products

---

## 🧪 **Testing with Postman**

1. **Import Collection**: `Auto_Parts_API.postman_collection.json`
2. **Set Variables**:
   - `base_url`: `http://localhost:8000`
   - `api_token`: Use token from seeder or generate new one
3. **Test Flow**:
   - Generate token (optional)
   - Test category endpoints
   - Test product CRUD operations
   - Test search functionality

---

## 📈 **Project Structure**

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Api/ (API controllers with CRUD)
│   │   ├── Admin*Controller.php (Admin panel)
│   │   ├── *Controller.php (Customer-facing)
│   │   └── Middleware/ApiAuthenticate.php
│   ├── Models/ (Eloquent models with relationships)
│   └── Providers/AppServiceProvider.php
├── database/
│   ├── migrations/ (Database schema)
│   └── seeders/ (Data seeding)
├── resources/views/
│   ├── layouts/ (Base templates)
│   ├── pages/ (Customer pages)
│   ├── admin/ (Admin panel)
│   └── *.blade.php (Blade templates)
├── routes/
│   └── web.php (Route definitions)
└── public/images/ (Product images)
```

---

## 🎯 **Key Achievements**

1. **Complete E-Commerce Flow**: From product browsing to order completion
2. **Proper Database Relationships**: Foreign keys and Eloquent relationships
3. **API-First Architecture**: RESTful APIs with authentication
4. **Modern Frontend**: Responsive design with AJAX functionality
5. **Security Best Practices**: Input validation, CSRF protection, secure file uploads
6. **Admin Management**: Complete CRUD interface for products and categories
7. **Order Management**: Full order lifecycle from creation to fulfillment
8. **Search Functionality**: Real-time AJAX search with optimized queries
9. **Documentation**: Comprehensive Postman collection and README

---

## 🚀 **Deployment Ready**

The application is production-ready with:
- Environment-based configuration
- Asset compilation with Vite
- Database migrations for schema management
- Proper error handling and logging
- Security headers and validation
- Scalable architecture for future enhancements

**This project demonstrates a complete, professional e-commerce platform with all modern web development best practices implemented.** 🎉
