<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Project Management Application

The **Project Management Application** 
small task using laravel 12 contain store and index for tasks table

---

## 📦 Features

- Store Task:
  - title
  - description
  - Status
  - priority
- List Tasks:
  - with caching if exists
  - with filtering using indexed columns ('status', 'priority') 
- Feature Test Cases:
- using Service Repo coding pattern:
## 📦 Documentation
  - /api/tasks (post)
  - /api/tasks (get) query params('status', 'priority') 
---

## 🛠 Installation Steps

### 1. Clone the repository
```bash
git clone https://github.com/mohamedebrahim2020/events_management.git
```

### 2. install project
```bash
composer install
```
### 3. migrate database
```bash
php artisan migrate
```
### 4. run feature tests
```bash
php artisan test
```
### 5. try swagger or postman for store and index tasks after queue operating using
```bash
php artisan queue:work
```
## 📦 Task Time Details
- API Design:
  - 2 hrs
- Implementation:
  - 4 hrs
- Database Optimization &implementation:
  - 2 hrs

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
