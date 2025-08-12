USE event_manager;

CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT NOT NULL,
  attendee_id INT NOT NULL,
  registered_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (event_id) REFERENCES events(id),
  FOREIGN KEY (attendee_id) REFERENCES attendees(id)
);
