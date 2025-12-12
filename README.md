# 🚗 Auto Parts Hub - E-commerce Platform

![Laravel](https://img.shields.io/badge/Laravel-12.34.0-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.2.12-777BB4.svg)
![MySQL](https://img.shields.io/badge/MySQL-8.0-blue.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple.svg)

A comprehensive e-commerce platform for automotive parts built with Laravel, featuring admin panel, AJAX search, and RESTful APIs.

## 📋 Table of Contents

- [Project Overview](#project-overview)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Setup Instructions](#setup-instructions)
- [Database Migrations](#database-migrations)
- [API Documentation](#api-documentation)
- [Usage Guide](#usage-guide)
- [Admin Panel](#admin-panel)
- [Git Workflow](#git-workflow)
- [Contributing](#contributing)

## 🎯 Project Overview

Auto Parts Hub is a modern e-commerce platform designed for buying and selling automotive spare parts. The platform provides a seamless shopping experience for customers and a comprehensive management system for administrators.

### Key Objectives:
- ✅ Complete CRUD operations for products and categories
- ✅ AJAX-powered search functionality
- ✅ RESTful API endpoints
- ✅ Admin dashboard with real-time statistics
- ✅ Responsive design for all devices
- ✅ Secure authentication system

## ✨ Features

### 🛒 Customer Features
- **Product Catalog**: Browse products by categories
- **AJAX Search**: Real-time search with live dropdown results
- **Shopping Cart**: Add, remove, and update cart items
- **Secure Checkout**: Complete order processing
- **Product Details**: Detailed product information pages
- **Responsive Design**: Optimized for mobile and desktop

### 👨‍💼 Admin Features
- **Dashboard**: Real-time statistics and overview
- **Product Management**: Full CRUD operations for products
- **Category Management**: Organize products by categories
- **Order Management**: Track and process customer orders
- **Contact Messages**: Handle customer inquiries
- **User Authentication**: Secure admin login system

### 🔌 API Features
- **RESTful APIs**: JSON responses for all data
- **Product APIs**: Retrieve, search, and filter products
- **Category APIs**: Manage categories and their products
- **Search APIs**: AJAX-powered search endpoints

## 🛠️ Technologies Used

### Backend
- **Laravel 12.34.0**: PHP framework for robust web applications
- **PHP 8.2.12**: Server-side scripting language
- **MySQL**: Relational database management system

### Frontend
- **Bootstrap 5.3**: Responsive CSS framework
- **JavaScript (Vanilla)**: AJAX functionality and interactions
- **Font Awesome**: Icons and visual elements
- **Vite**: Modern build tool for assets

### Development Tools
- **Composer**: PHP dependency management
- **NPM**: Node.js package management
- **Git**: Version control system

## 🚀 Setup Instructions

### Prerequisites
- **PHP 8.2+**
- **Composer**
- **Node.js & NPM**
- **MySQL 8.0+**
- **Git**

### Installation Steps

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Syed-Muhammad-Rayyan/auto_parts_hub.git
   cd auto_parts_hub
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies:**
   ```bash
   npm install
   ```

4. **Environment Configuration:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Setup:**
   ```bash
   # Create database in MySQL
   # Update .env file with database credentials

   php artisan migrate
   php artisan db:seed
   ```

6. **Build Assets:**
   ```bash
   npm run build
   ```

7. **Start the Application:**
   ```bash
   php artisan serve
   ```

8. **Access the Application:**
   - Frontend: `http://localhost:8000`
   - Admin Login: `http://localhost:8000/admin/login`
     - Email: `admin@gmail.com`
     - Password: `password123`

## 🗄️ Database Migrations

The application includes the following database migrations:

```bash
# Core Tables
php artisan migrate

# Available Migrations:
# - Users table
# - Cache and sessions
# - Products table
# - Cart items table
# - Orders and order items
# - Admin users table
# - Categories table
# - Contact messages table
```

### Database Relationships:
- **Products ↔ Categories**: One-to-many relationship (string-based)
- **Orders ↔ Order Items**: One-to-many relationship
- **Users ↔ Orders**: One-to-many relationship
- **Products ↔ Cart Items**: Many-to-many through cart

## 📡 API Documentation

### Base URL: `http://localhost:8000/api/`

### Products API

#### Get All Products
```
GET /api/products
```
**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Premium Oil Filter",
      "short": "High-quality filtration",
      "price": 1200,
      "category": "Engine Parts",
      "image": "bosch-oil-filter.png",
      "slug": "premium-oil-filter",
      "created_at": "2025-01-01T00:00:00.000000Z"
    }
  ],
  "count": 25
}
```

#### Get Single Product
```
GET /api/products/{id}
```

#### Search Products
```
GET /api/products/search/{query}
```

### Categories API

#### Get All Categories
```
GET /api/categories
```
**Response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Engine Parts",
      "description": "Engine components and parts",
      "created_at": "2025-01-01T00:00:00.000000Z",
      "product_count": 8
    }
  ],
  "count": 8
}
```

#### Get Category Products
```
GET /api/categories/{id}/products
```

## 📖 Usage Guide

### For Customers

1. **Browse Products**: Visit homepage to see featured products and categories
2. **Search Products**: Use the search bar for instant results
3. **Filter by Category**: Click category cards to filter products
4. **View Details**: Click "View Details" to see full product information
5. **Add to Cart**: Use the shopping cart functionality
6. **Checkout**: Complete purchase through secure checkout

### For Administrators

1. **Login**: Use admin credentials at `/admin/login`
2. **Dashboard**: View statistics and manage operations
3. **Products**: Add, edit, delete products
4. **Categories**: Manage product categories
5. **Orders**: Track and manage customer orders
6. **Messages**: Respond to customer inquiries

## 👨‍💼 Admin Panel

### Dashboard Features:
- **Total Products**: Current product count
- **Pending Orders**: Orders awaiting processing
- **New Messages**: Unread contact messages
- **Revenue**: Total earnings from completed orders

### Management Modules:
- **Products**: Complete CRUD operations
- **Categories**: Category management
- **Orders**: Order processing and tracking
- **Contacts**: Customer communication

## 🌳 Git Workflow

### Branch Structure:
- **`main`**: Production-ready code
- **`development`**: Development branch for features

### Workflow:
```bash
# Create feature branch
git checkout -b feature/new-feature

# Make changes and commit
git add .
git commit -m "Add new feature"

# Merge to development
git checkout development
git merge feature/new-feature

# Push to development
git push origin development

# Create pull request to main when ready
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Developer

**Syed Muhammad Rayyan**
- GitHub: [@Syed-Muhammad-Rayyan](https://github.com/Syed-Muhammad-Rayyan)
- Project Repository: [Auto Parts Hub](https://github.com/Syed-Muhammad-Rayyan/auto_parts_hub)

---

**⭐ If you find this project helpful, please give it a star!**
