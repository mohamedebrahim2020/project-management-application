<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Events Management Module

The **Events Management** module is a custom Drupal 10 module that allows site administrators to create, manage, and display events on both the back-end and front-end. It also provides a configurable interface and logging for configuration changes.

---

## 📦 Features

- Custom Event content entity with the following attributes:
  - Title
  - Image
  - Description
  - Start time
  - End time (with validation)
  - Category (taxonomy or dropdown)
- Admin CRUD UI for managing events
- Config page with:
  - Toggle to show/hide past events
  - Option to limit number of events on listing page
- Logs configuration changes to a custom database table
- Front-end:

## 📦 Documentation
  - Event Modlue config /admin/config/events-manager
  - Event listing page /admin/events
  - Event details page /admin/events/{event}/show
  - Event create page /admin/events/add
  - Event delete link /admin/events/{event}/delete
  - Event update page /admin/events/{event}/edit

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
### 3. create table called events (with its attributes)

### 4. download project from drupal ui browser and define database

### 5. download cacert.pem file and put it int php/extras/ssl

### 6. add the following configuration to httpd-vhosts.conf
```bash
<VirtualHost *:80>
    ServerName events.local
    DocumentRoot "C:/Users/Public/tasks/events_project/web"

    <Directory "C:/Users/Public/tasks/events_project/web">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
### 7 . allow or include httpd-vhosts.conf in httpd.conf
```bash
# Virtual hosts
# Include conf/extra/httpd-vhosts.conf // remove # from this
```

### 8. start apache server 
```bash
httpd
```

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
