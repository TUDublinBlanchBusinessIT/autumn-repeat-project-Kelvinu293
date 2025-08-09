CREATE DATABASE event_manager;
USE event_manager;

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    category VARCHAR(50),
    location VARCHAR(100),
    event_date DATE
);

