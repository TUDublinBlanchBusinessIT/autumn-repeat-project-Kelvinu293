USE event_manager;

CREATE TABLE attendees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(50),
  lastname VARCHAR(50),
  email VARCHAR(120) UNIQUE,
  type VARCHAR(20)  
);

Insert into attendees (firstname, lastname, email, type) values ('Alex', 'Murphy', 'alex@yahoo.ie', 'guest');
Insert into attendees (firstname, lastname, email, type) values ('Sam', 'O''Brien', 'ryanobrien47@gmail.com', 'VIP');

