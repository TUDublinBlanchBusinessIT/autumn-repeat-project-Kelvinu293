USE event_manager;

CREATE TABLE payment (
  id INT AUTO_INCREMENT PRIMARY KEY,
  booking_id INT NOT NULL,
  amount DECIMAL(18,3),
  paid_at DATETIME,
  FOREIGN KEY (booking_id) REFERENCES bookings(id)
);

Insert into payment (booking_id, amount, paid_at) values (1, 1130.000, NOW());
Insert into payment (booking_id, amount, paid_at) values (2,  650.000, NOW());
