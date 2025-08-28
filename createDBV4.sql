USE event_manager;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

Insert into users (username, password) values ('admin', 'colafunk');
Insert into users (username, password) values ('supervisor', 'lulu');

