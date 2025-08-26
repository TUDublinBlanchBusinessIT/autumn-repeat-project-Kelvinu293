USE event_manager;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(100)
);

Insert into users (username, password) values ('admin', 'changeme');
Insert into users (username, password) values ('supervisor', 'changeme');

