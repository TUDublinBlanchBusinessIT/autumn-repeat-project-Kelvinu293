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

Insert into bookings (event_id, attendee_id, start_time, end_time) values (1, 1, '02:00:00', '17:00:00');
Insert into bookings (event_id, attendee_id, start_time, end_time) values (1, 2, '18:00:00', '20:00:00');
Insert into bookings (event_id, attendee_id, start_time, end_time) values (2, 1, '10:00:00', '18:00:00');
