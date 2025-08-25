USE event_manager;

CREATE TABLE attendees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(50),
  lastname VARCHAR(50),
  email VARCHAR(120) UNIQUE,
  type VARCHAR(20)  
);
