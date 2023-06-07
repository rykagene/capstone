-- Create the college table
CREATE TABLE COLLEGE (
  college_code VARCHAR(50) PRIMARY KEY,
  college_name VARCHAR(255)
);

-- -- Create the year table
-- CREATE TABLE YEARSEC (
--   yearsec_id INT PRIMARY KEY,
--   year_level INT,
--   section VARCHAR(10),
--   section_group VARCHAR(10)
-- );

-- -- Create the course table
-- CREATE TABLE COURSE (
--   course_code VARCHAR(50) PRIMARY KEY,
--   course_name VARCHAR(255),
--   college_code VARCHAR(255),
--   FOREIGN KEY (college_code) REFERENCES COLLEGE(college_code)
-- );

-- Create the account table
CREATE TABLE ACCOUNT (
  account_id INT PRIMARY KEY,
  username VARCHAR(255),
  password VARCHAR(255),
  email VARCHAR(255),
  picture VARCHAR(255),
  account_type VARCHAR(255)
);
ALTER TABLE `account` CHANGE `account_id` `account_id` INT NOT NULL AUTO_INCREMENT;

-- Create the USERS table
CREATE TABLE USERS (
  user_id INT PRIMARY KEY,
  rfid_no VARCHAR(50),
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  account_id INT,
  course_code VARCHAR(50),
  yearsec_id INT,
  FOREIGN KEY (account_id) REFERENCES ACCOUNT(account_id),
  FOREIGN KEY (course_code) REFERENCES COURSE(course_code),
  FOREIGN KEY (yearsec_id) REFERENCES YEARSEC(yearsec_id)
);

-- Create the admin table
CREATE TABLE ADMIN (
  admin_id INT PRIMARY KEY,
  rfid_no VARCHAR(50),
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  account_id INT,
  FOREIGN KEY (account_id) REFERENCES ACCOUNT(account_id)
);

-- Create the seat table
CREATE TABLE SEAT (
  seat_id INT PRIMARY KEY,
  seat_number VARCHAR(50),
  status VARCHAR(50)
);



-- Create the reservation table
CREATE TABLE RESERVATION (
  reservation_id INT PRIMARY KEY,
  date DATE,
  start_time TIME,
  end_time TIME,
  user_id INT,
  seat_id INT,
  FOREIGN KEY (user_id) REFERENCES USERS(user_id),
  FOREIGN KEY (seat_id) REFERENCES SEAT(seat_id)
);
ALTER TABLE `RESERVATION` CHANGE `reservation_id` `reservation_id` INT NOT NULL AUTO_INCREMENT;


-- Create the news table
CREATE TABLE NEWS (
  news_id INT PRIMARY KEY,
  picture VARCHAR(255),
  content TEXT,
  date DATE
);

-- Create the settings table
CREATE TABLE SETTINGS (
  settings_id INT PRIMARY KEY,
  reservation BOOLEAN,
  minDuration TIME,
  maxDuration TIME
);


-- Create the ratings table
CREATE TABLE RATING (
  rating_id INT PRIMARY KEY,
  rating INT,
  review VARCHAR(255),
  date DATE,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES USERS(user_id)
);

