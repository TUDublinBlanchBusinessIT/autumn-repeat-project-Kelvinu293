USE event_manager;

CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_id INT NOT NULL,
  attendee_id INT NOT NULL,
  people INT NOT NULL,
  start_time TIME NOT NULL,
  end_time TIME NOT NULL,
  FOREIGN KEY (event_id)    REFERENCES events(id),
  FOREIGN KEY (attendee_id) REFERENCES attendees(id)
);

Insert into bookings (event_id, attendee_id, people, start_time, end_time) values (1, 1, 50, '10:00:00', '17:00:00');
Insert into bookings (event_id, attendee_id, people, start_time, end_time) values (1, 2, 75, '18:00:00', '20:00:00');
Insert into bookings (event_id, attendee_id, people, start_time, end_time) values (2, 1, 21, '10:00:00', '18:00:00');