
CREATE DATABASE IF NOT EXISTS bookings;

USE bookings;

CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    time VARCHAR(5),  -- الوقت المحجوز
    seat VARCHAR(50), -- المقعد المحجوز
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
