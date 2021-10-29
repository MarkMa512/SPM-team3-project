USE TestDatabase4; 

-- Insertion 1
INSERT INTO Employee (Employee_ID, First_Name, Last_Name, Employee_Type, Employee_Password_Hash)
VALUES
    -- HR Employee_ID Start with 0
    (0001, 'Albert', 'Wong', 'H', '1111'), 
    (0002, 'Luis', 'Tan', 'H', '2222'), 
    -- Instructor Employee_ID start with 1 
    (1001, 'Thomas', 'Ching', 'E', '3333'), 
    (1002, 'Lucas', 'Lew', 'E', '4444'), 
    (1003, 'Robert', 'Lim', 'E', '5555'), 
    -- Learner Employee_ID start with 2 
    (2001, 'Guan', 'Yu', 'E', '6666'), 
    (2002, 'Joel', 'Lim', 'E', '7777'),
    (2003, 'Patrick', 'Zheng', 'E', '8888'),
    (2004, 'Bryan', 'Yip', 'E', '9999'), 
    (2005, 'Cindy', 'Ong', 'E', '1010')
    ; 

-- Insertion 2
INSERT INTO Engineer(Engineer_ID, Engineer_Type)
VALUES
    -- Instructor Employee_ID start with 1 
    (1001, 'I'), 
    (1002, 'I'), 
    (1003, 'I'), 
    -- Learner Employee_ID start with 2
    (2001, 'L'), 
    (2002, 'L'),
    (2003, 'L'),
    (2004, 'L'), 
    (2005, 'L')
    ;

-- Insertion 3
INSERT INTO Course (Course_Code, Course_Name, Bagde_Name, Badge_Image)
VALUES
    ('SR101', 'Intro to Printer Servicing', 'Intro Badge', NULL),
    ('PT101', 'Intro to Ink Printers', 'Ink Badge', NULL), 
    ('PT102', 'Intro to Laserjet Printers', 'Laser Badge', NULL), 
    ('SR201', 'Intermediate Printer Servicing', 'Intermediate Badge', NULL), 
    ('PT201', 'Intro to Conon Printers', 'Conon Badge', NULL), 
    ('PT202', 'Intro to HY Printers', 'HY Badge', NULL), 
    ('SR301', 'Advanced Printer Servicing', 'Advance Badge', NULL), 
    ('SR302', 'Diagonostic and Repair', 'Repair Badge', NULL), 
    ('SR303', 'Installation and Configuration', 'Installation Badge', NULL)    
    ; 

-- Insertion 4
INSERT INTO Prerequisite (Course_Code, Prerequisite_Course_Code)
VALUES
    ('SR201', 'SR101'), 
    ('SR201', 'PT101'), 
    ('SR201', 'PT102'), 
    ('PT201', 'SR201'), 
    ('PT202', 'SR201'), 
    ('SR301', 'SR201'), 
    ('SR302', 'SR301'), 
    ('SR303', 'SR301')
    ; 

-- Insertion 5
INSERT INTO Qualification(Employee_ID, Course_Code, Qualification_Date, Badge_Assign_Date)
VALUES 
    (1001, 'SR101', '2021-01-01', '2021-01-01'), 
    (1002, 'SR101', '2021-01-01', '2021-01-01'), 
    (1003, 'SR101', '2021-01-01', '2021-01-01'), 
    (1003, 'SR303', '2021-01-02', '2021-01-02')
    ; 

-- Insertion 6
INSERT INTO Course_Run(Course_Code, Course_Run_ID, Capacity, Start_Date, End_Date)
VALUES
    ('SR101', 1, 40, '2021-01-01', '2021-03-01'),
    ('SR101', 2, 40, '2021-01-01', '2021-02-01'), 
    ('PT202', 1, 50, '2021-01-15', '2021-04-01'),
    ('SR201', 1, 50, '2021-02-01', '2021-04-01'), 
    ('SR303', 1, 30, '2021-05-02', '2021-07-08')
    ; 

-- Insertion 7
INSERT INTO Assignment(HR_ID, Instructor_ID, Course_Code, Course_Run_ID, Assignment_Date)
VALUES
    (0001, 1001, 'SR101', 1, '2020-12-01'),
    (0001, 1002, 'SR101', 2, '2020-12-01'), 
    (0002, 1003, 'SR303', 1, '2021-01-01')
    ;

-- Insertion 8 
INSERT INTO Enrollment_Record(Learner_ID, Course_Code, Course_Run_ID, Enroll_Date)
VALUES 
    (2001, 'SR101', 1, '2020-12-15'), 
    (2002, 'SR101', 1, '2020-12-15'), 
    (2003, 'SR101', 1, '2020-12-15'), 
    (2004, 'SR101', 1, '2020-12-15'), 
    (2005, 'SR101', 1, '2020-12-15')
    ;

-- Insertion 9
INSERT INTO Section(Course_Code, Course_Run_ID, Section_ID, Section_Name, Is_Graded)
VALUES
    ('SR101', 1, 0, 'Introduction', FALSE), 
    ('SR101', 1, 1, 'Chapter 1', FALSE), 
    ('SR101', 1, 2, 'Chapter 2', FALSE), 
    ('SR101', 1, 3, 'End Course Exam', TRUE)
    ; 

-- Insertion 10 
INSERT INTO Material(Course_Code, Course_Run_ID, Section_ID, Material_ID, Material)
VALUES
    ('SR101', 1, 1, 1, NULL),
    ('SR101', 1, 1, 2, NULL),
    ('SR101', 1, 1, 3, NULL),
    ('SR101', 1, 2, 1, NULL),
    ('SR101', 1, 2, 2, NULL)
    ; 

-- Insertion 11
INSERT INTO Question(Course_Code, Course_Run_ID, Section_ID, Question_Number, Question_Type, Question)
VALUES
    ('SR101', 1, 1, 1, 'M', 'This is a Test MCQ Quesion, select from the options belowL'), 
    ('SR101', 1, 1, 2, 'T', 'This is a Test T/F Question, select the False options from below:')
    ; 

-- Insertion 12 
INSERT INTO Answer(Course_Code, Course_Run_ID, Section_ID, Question_Number, Answer_Number, Answer, Is_Correct)
VALUES
    ('SR101', 1, 1, 1, 'A', 'This is the correct option', TRUE),
    ('SR101', 1, 1, 1, 'B', 'This is not a correct option', FALSE), 
    ('SR101', 1, 1, 1, 'C', 'This is not a correct option', FALSE), 
    ('SR101', 1, 1, 1, 'D', 'This is a correct option', TRUE), 
    ('SR101', 1, 1, 2, 'T', 'True', FALSE), 
    ('SR101', 1, 1, 2, 'F', 'False', TRUE)
    ; 

-- Insertion 13
INSERT INTO Access_Record(Learner_ID, Course_Code, Course_Run_ID, Section_ID, Visit_Date_Time)
VALUES
    (2001, 'SR101', 1, 1, '2021-02-02 23:55:55'), 
    (2001, 'SR101', 1, 2, '2021-02-03 22:00:05')
    ;

-- Insertion 14
INSERT INTO Quiz_Record(Learner_ID, Course_Code, Course_Run_ID, Section_ID, Attempt_Number, Quiz_Score, Quiz_Date_Time)
VALUES
    (2001, 'SR101', 1, 1, 1, 100.0, '2021-02-04 10:05:21'), 
    (2001, 'SR101', 1, 2, 1, 40.0, '2021-02-05 10:11:11'), 
    (2001, 'SR101', 1, 2, 2, 80.0, '2021-03-05 08:02:20'), 
    (2001, 'SR101', 1, 3, 1, 70.0, '2021-03-19 08:21:05')
    ; 


-- Insertion 15
INSERT INTO Forum_Post(Post_ID, Topic, Content, Creation_Date_Time, Author_ID, Reply_To_Post_ID)
VALUES
    (0001, 'Hello  LMS Forum', 'Hi LMS learning Community, Albert here, I hope you enjoy this learning platform!', '2021-01-01 08:00:00', 0001, NULL), 
    (0002, 'Reply to LMS Forum', 'Hey Albert, Thomas here, I am so excited to use the system', '2021-01-01 10:00:00', 1001, 0001)
    ; 