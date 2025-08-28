CREATE DATABASE event_manager;
USE event_manager;

CREATE TABLE events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  category VARCHAR(50),
  location VARCHAR(100),
  event_date DATE NOT NULL
);

Insert into events (name, category, location, event_date) values ('Tech Meetup', 'Technology', 'Dublin', '2025-09-10');
Insert into events (name, category, location, event_date) values ('Art Fair', 'Arts', 'Cork', '2025-10-05');
