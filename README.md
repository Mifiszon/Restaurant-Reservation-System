Restaurant Reservation System

Overview

This repository contains a Restaurant Reservation System developed in PHP. The system allows users to browse the restaurant menu, make reservations, and manage bookings through a user-friendly interface.

Features

User Registration & Login – Secure authentication for customers.

Table Reservation – Users can select a date, time, and table for their booking.

Menu Browsing – Customers can view the restaurant’s menu.

Admin Panel – Manage reservations, customers, and menu items.

Email Notifications – Confirmations for reservations.

Responsive Design – Works on desktops, tablets, and mobile devices.

Screenshots

Home Page



Reservation Page



Menu Page



Installation

Clone this repository:

git clone https://github.com/your-repo/restaurant-reservation.git

Navigate to the project directory:

cd restaurant-reservation

Import the database:

Open phpMyAdmin

Create a new database (e.g., restaurant_db)

Import database.sql from the repository

Configure the database connection in config.php:

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_db";

Start a local server (using XAMPP or WAMP) and place the project files inside the htdocs folder.

Open a browser and navigate to:

http://localhost/restaurant-reservation/

Technologies Used

PHP – Backend logic

MySQL – Database

HTML, CSS, JavaScript – Frontend

Bootstrap – Responsive design

Authors

Your Name
