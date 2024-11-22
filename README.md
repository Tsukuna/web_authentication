
# Authentication App

This project provides a secure, user-friendly login and registration system built using PHP/Laravel and Tailwind CSS. It is designed for developers or organizations looking for robust user authentication solutions, including features like OTP verification and brute force prevention


## Tech Stack

**Framework and Language:** PHP/Laravel, Tailwind CSS, HTML, JavaScript

**Database:** MySQL


## System Configuration

Some system requirements are essential to configure -


## Chocolatey Installation

Install Chocolatey In Powershell With Administrator

```bash
 Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))
```
    
## PHP, Composer, NodeJS , MySQL Installation

Install PHP, NodeJS , MySQL In Powershell With Administrator

```bash
choco install php
choco install composer
choco install nodejs
choco install mysql
```
## Create User and Password For MySQL

After installing mysql package, close powershell and reopen it, then create as follow:

```bash
CREATE USER 'htet' IDENTIFIED BY 'htet123';
GRANT ALL PRIVILEGES ON *.* TO 'htet';
```
After this, download  [phpMyAdmin](https://www.phpmyadmin.net/) zip file and unzip it

In order to run server, open file with git bash or terminal and run this command 

```bash
php -S localhost:8080
```

Enter created user and password when localhost starts running and login into mysql

## Laravel Installation

System Requirements -

- [Git](https://git-scm.com/downloads) (Version Control)
- PHP (Language)
- Composer (Dependancy Manager)
- MySQL
- VS Code (Text Editor)
---

Run this command 
```bash
php --ini
code C:\tools\php83\php.ini
```
In php.ini, open all these extensions

```bash
extension=fileinfo
extension=zip
extension=mbstring
extension=curl
extension=sqlite3
extension=mysql
extension=pdo_pgsql
extension=pdo_sqlite
```


## Deployment From Zip File

Step by step Commands :

Run these commands whether in terminal or [Git](https://git-scm.com/downloads)

```bash
npm install
composer install
php artisan migrate
npm run dev
php artisan serve
```

## Deployment From Github

Step by step Commands :

Run these commands whether in terminal or [Git](https://git-scm.com/downloads)

```bash
cp .env.example .env
npm install
composer install
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```
