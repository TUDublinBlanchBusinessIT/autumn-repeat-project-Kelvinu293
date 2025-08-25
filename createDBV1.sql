CREATE DATABASE event_manager;
USE event_manager;

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    category VARCHAR(50),
    location VARCHAR(100),
    event_date DATE
);

USE event_manager;

CREATE TABLE attendees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(50),
  lastname VARCHAR(50),
  email VARCHAR(120) UNIQUE,
  type VARCHAR(20)  
);

USE event_manager;

CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT NOT NULL,
  attendee_id INT NOT NULL,
  registered_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  start_Time TIME,
  end_Time TIME,
  FOREIGN KEY (event_id) REFERENCES events(id),
  FOREIGN KEY (attendee_id) REFERENCES attendees(id)
);
