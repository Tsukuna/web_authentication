
# Authentication App

This project provides a secure, user-friendly login and registration system built using PHP/Laravel and Tailwind CSS. It is designed for developers or organizations looking for robust user authentication solutions, including features like OTP verification and brute force prevention


## Tech Stack

**Framework and Language:** PHP/Laravel, Tailwind CSS, HTML, JavaScript

**Database:** MySQL

**Text Editor:** Visual Studio Code

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

## Deployment From Github

Git clone command -
```bash
git clone https://github.com/Tsukuna/web_authentication.git
```
When you have done, run these commands whether in visual's terminal or [Git Bash](https://git-scm.com/downloads) ( Ctr+Shft+` )


```bash
cp .env.example .env
npm install
composer install
php artisan key:generate
```

# Laravel Mail Configuration with Gmail

Create app passwords in your gmail account and copy code into MAIL_PASSWORD
### Update `.env` File
Edit your `.env` file with the following settings:

```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD= generated code by app-passwords
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```
# Database Configuration 
### Update `.env` File
Edit your `.env` file with the following settings:
Before you migrate database, you need to modify dabatase connection in .env file

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=authentication
DB_USERNAME=htet
DB_PASSWORD=htet123
```
After that, run these commands
```bash
php artisan migrate
npm run dev
php artisan serve
```
