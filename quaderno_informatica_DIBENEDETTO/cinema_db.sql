-- Creazione del database
CREATE DATABASE IF NOT EXISTS cinema_db;
USE cinema_db;

-- Tabella per la gestione dei film
CREATE TABLE IF NOT EXISTS films (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    duration INT NOT NULL, -- Durata in minuti
    director VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO films (title, genre, duration, director) VALUES
('Inception', 'Sci-Fi', 148, 'Christopher Nolan'),
('Titanic', 'Romance', 195, 'James Cameron'),
('The Dark Knight', 'Action', 152, 'Christopher Nolan');

-- Tabella per la gestione delle sale
CREATE TABLE IF NOT EXISTS halls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hall_number INT NOT NULL UNIQUE,
    seats INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO halls (hall_number, seats) VALUES
(1, 100),
(2, 150),
(3, 200);

-- Tabella per la gestione degli spettacoli
CREATE TABLE IF NOT EXISTS shows (
    id INT AUTO_INCREMENT PRIMARY KEY,
    film_id INT NOT NULL,
    hall_id INT NOT NULL,
    show_time DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (film_id) REFERENCES films(id) ON DELETE CASCADE,
    FOREIGN KEY (hall_id) REFERENCES halls(id) ON DELETE CASCADE
);

INSERT INTO shows (film_id, hall_id, show_time) VALUES
(1, 1, '2025-01-24 18:00:00'),
(2, 2, '2025-01-24 20:30:00'),
(3, 3, '2025-01-25 22:00:00');

-- Tabella per la gestione delle prenotazioni
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    show_id INT NOT NULL,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    seats_reserved INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (show_id) REFERENCES shows(id) ON DELETE CASCADE
);

INSERT INTO bookings (show_id, customer_name, customer_email, seats_reserved) VALUES
(1, 'Mario Rossi', 'mario.rossi@example.com', 2),
(2, 'Anna Bianchi', 'anna.bianchi@example.com', 3),
(3, 'Luigi Verdi', 'luigi.verdi@example.com', 1);
