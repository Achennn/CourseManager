-- Create the course_manage database
DROP DATABASE IF EXISTS course_manage;
CREATE DATABASE course_manage;
USE course_manage;

drop table if exists sProfiles;
CREATE TABLE sProfiles (
    studentID varchar(20) NOT NULL,
    name varchar(80) NOT NULL,
    birth varchar(50),
    gender varchar(20) NOT NULL,
    email varchar(20) NOT NULL,
    password varchar(20) NOT NULL,
    PRIMARY KEY (studentID)
);

INSERT INTO sProfiles VALUES 
('S00340000','Nike','1997-01-01','Female','nike@aum.edu','123456'),
('S00340001','Candy','2017-08-15','Female','candy@aum.edu','123456'),
('S00340002','Harry','2014-06-01','Male','harry@aum.edu','123456'),
('S00340003','Lucy','2014-09-01','Female','lucy@aum.edu','123456'),
('S00340004','Lily','1997-04-01','Female','lily@aum.edu','123456'),
('S00346284','Cheng Huang','1997-03-29','Male','chuang1@aum.edu','123456'),
('S00349999','Chou',NULL,'Female','chou@aum.edu','123456');

CREATE TABLE courses (
    courseID int NOT NULL,
    courseName varchar(50) NOT NULL,
    semester varchar(50) NOT NULL,
    instructor varchar(50) NOT NULL,
    classroom varchar(20) NOT NULL,
    time varchar(30) NOT NULL,
    PRIMARY KEY (courseID)
);

INSERT INTO courses VALUES 
(1000, 'Survey of Computer Applications', '2020 Fall', 'Sophia Yan', 'GH205', 'Mon. Wed. 10:50am-12:10pm'), 
(1110, 'Intro. to Program. Python/lab', '2020 Fall', 'Sophia Yan', 'GH208', 'Mon. Wed. 2:00pm-4:00pm'),
(1200, 'Fundamentals of Computing', '2020 Fall', 'Sophia Yan', 'GH201', 'Tue. Thu. 10:50am-12:10pm'), 
(2000, 'Functional Programming with C++/lab', '2020 Fall', 'Dinc Semih', 'GH205', 'Mon. Wed. 1:00pm-3:00pm'), 
(2200, 'Discrete Structures', '2020 Fall', 'Dinc Semih', 'GH204', 'Mon. Wed. 10:50am-12:10pm'),
(3000, 'Object-Oriented Progr. with C++/lab', '2020 Fall', 'Dinc Semih', 'GH203', 'Tue. Thu. 3:40pm-5:00pm'),
(3005, 'Front-end Web Development', '2020 Fall', 'Kevin Gao', 'GH207', 'Tue. Thu. 9:30am-11:00am'),
(3010, 'Back-end Web Development', '2020 Fall', 'Kevin Gao', 'GH205', 'Mon. Wed. 9:00am-10:50am'),
(3200, 'Responsive Database-driven Web Computing', '2020 Fall', 'Kevin Gao', 'GH204','Mon. Wed. 10:50am-12:10pm'),
(3300, 'Computer Organization & Architecture', '2020 Fall', 'Dinc Semih', 'GH204', 'Mon. Wed. 2:00pm-4:00pm'),
(3400, 'Data Structures', '2021 Spring', 'Dinc Semih', 'GH201', 'Tue. Thu. 10:50am-12:10pm'),
(3600, 'Algorithm & Complexity Analysis', '2021 Spring', 'Dinc Semih', 'GH202', 'Mon. Wed. 1:00pm-3:00pm'),
(3650, 'Hacking of Cryptographic Ciphers', '2021 Spring', 'Lei Wu', 'GH208', 'Tue. Thu. 3:40pm-5:00pm'),
(3700, 'Database Systems', '2021 Spring', 'Kevin Gao', 'GH210', 'Tue. Thu. 3:40pm-5:00pm'),
(4100, 'Software Component & Engineering', '2021 Spring', 'Pape Patrick', 'GH206', 'Tue. Thu. 3:40pm-5:00pm'),
(4300, 'Operating Systems', '2021 Spring', 'Pape Patrick', 'GH201', 'Tue. Thu. 3:40pm-5:00pm'),
(4350, 'Network Systems', '2021 Spring', 'Pape Patrick', 'GH203', 'Tue. Thu. 3:40pm-5:00pm'),
(4400, 'Cloud Computing', '2021 Spring', 'Pape Patrick', 'GH202', 'Mon. Wed. 9:00am-10:50am'),
(4500, 'Mobile Computing', '2021 Spring', 'Kevin Gao', 'GH205', 'Mon. Wed. 9:00am-10:50am'),
(4950, 'STEAM Capstone Project Practicum', '2021 Spring', 'Kevin Gao', 'GH203', 'Tue. Thu. 3:40pm-5:00pm');


CREATE TABLE enrolled (
    studentID varchar(20) NOT NULL ,
    courseID int NOT NULL,
    courseName varchar(50) NOT NULL,
    semester varchar(50) NOT NULL,
    instructor varchar(50) NOT NULL,
    classroom varchar(20) NOT NULL,
    time varchar(50) NOT NULL
);

INSERT INTO `enrolled` VALUES 
('S00349999',1110,'Intro. to Program. Python/lab','2020 Fall','Sophia Yan','GH208','Mon. Wed. 2:00pm-4:00pm'),
('S00349999',1200,'Fundamentals of Computing','2020 Fall','Sophia Yan','GH201','Tue. Thu. 10:50am-12:10pm'),
('S00349999',2000,'Functional Programming with C++/lab','2020 Fall','Dinc Semih','GH205','Mon. Wed. 1:00pm-3:00pm'),
('S00340000',2200,'Discrete Structures','2020 Fall','Dinc Semih','GH204','Mon. Wed. 10:50am-12:10pm'),
('S00349999',3000,'Object-Oriented Progr. with C++/lab','2020 Fall','Dinc Semih','GH203','Tue. Thu. 3:40pm-5:00pm'),
('S00349999',3005,'Front-end Web Development','2020 Fall','Kevin Gao','GH207','Tue. Thu. 9:30am-11:00am'),
('S00349999',3010,'Back-end Web Development','2020 Fall','Kevin Gao','GH205','Mon. Wed. 9:00am-10:50am'),
('S00340000',3200,'Responsive Database-driven Web Computing','2020 Fall','Kevin Gao','GH204','Mon. Wed. 10:50am-12:10pm'),
('S00349999',3650,'Hacking of Cryptographic Ciphers','2021 Spring','Lei Wu','GH208','Tue. Thu. 3:40pm-5:00pm'),
('S00340000',4350,'Network Systems','2021 Spring','Pape Patrick','GH203','Tue. Thu. 3:40pm-5:00pm'),
('S00349999',1000,'Survey of Computer Applications','2020 Fall','Sophia Yan','GH205','Mon. Wed. 10:50am-12:10pm'),
('S00349999',1000,'Survey of Computer Applications','2020 Fall','Sophia Yan','GH205','Mon. Wed. 10:50am-12:10pm'),
('S00346284',3000,'Object-Oriented Progr. with C++/lab','2020 Fall','Dinc Semih','GH203','Tue. Thu. 3:40pm-5:00pm'),
('S00346284',1000,'Survey of Computer Applications','2020 Fall','Sophia Yan','GH205','Mon. Wed. 10:50am-12:10pm');

-- Create a user named cm_user
CREATE USER cm_user@localhost IDENTIFIED BY 'pa55word';
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO cm_user@localhost;
