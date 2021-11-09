USE LMS_Database; 

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
INSERT INTO Course (Course_Code, Course_Name, Bagde_Name, Badge_Image, Course_Status)
VALUES
    ('CP001', 'Company Policy 1', 'Policy Badge 1', NULL, TRUE),
    ('CP002', 'Company Policy 2', 'Policy Badge 2', NULL, TRUE),
    ('CP003', 'Company Policy 3', 'Policy Badge 3', NULL, TRUE),
    ('SR101', 'Intro to Printer Servicing', 'Intro Badge', NULL, TRUE),
    ('PT101', 'Intro to Ink Printers', 'Ink Badge', NULL, TRUE), 
    ('PT102', 'Intro to Laserjet Printers', 'Laser Badge', NULL, TRUE), 
    ('SR201', 'Intermediate Printer Servicing', 'Intermediate Badge', NULL, TRUE), 
    ('PT201', 'Intro to Conon Printers', 'Conon Badge', NULL, TRUE), 
    ('PT202', 'Intro to HY Printers', 'HY Badge', NULL, TRUE), 
    ('SR301', 'Advanced Printer Servicing', 'Advance Badge', NULL, TRUE), 
    ('SR302', 'Diagonostic and Repair', 'Repair Badge', NULL, TRUE), 
    ('SR303', 'Installation and Configuration', 'Installation Badge', NULL, TRUE)    
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
INSERT INTO Material(Course_Code, Course_Run_ID, Section_ID, Material_ID, Material_Name, Material)
VALUES
    ('SR101', 1, 1, 1, 'Material1', './../Files/SR101/1/1/1/BPAS_Sample_Exam.pdf'),
    ('SR101', 1, 1, 2, 'Material2', './../Files/SR101/1/1/2/BPAS_Sample_Exam_Solution.pdf'),
    ('SR101', 1, 1, 3, 'Material3', './../Files/SR101/1/1/1/BPAS_Sample_Exam.pdf'),
    ('SR101', 1, 2, 1, 'Material4', './../Files/SR101/1/1/1/BPAS_Sample_Exam.pdf'),
    ('SR101', 1, 2, 2, 'Material5', './../Files/SR101/1/1/2/BPAS_Sample_Exam_Solution.pdf')
    ; 

-- Insertion 11
INSERT INTO Quiz(Course_Code, Course_Run_ID, Section_ID, Quiz_Title, Quiz_Question_List, Quiz_Answer_List)
VALUES
    ('SR101', 1, 1, 'Test Quiz 1', '[{"qnNumber":1,"type":"mcq","qnText":"Q1","options":[{"id":"q1-1","optText":"A1","value":1},{"id":"q1-2","optText":"A2","value":2},{"id":"q1-3","optText":"A3","value":3}]},{"qnNumber":2,"type":"mcq","qnText":"Q2","options":[{"id":"q2-1","optText":"A1","value":1},{"id":"q2-2","optText":"A2","value":2}]}]', '[{"qnNumber":1,"answer":"2"},{"qnNumber":2,"answer":"1"}]'), 
    ('SR101', 1, 2, 'Test Quiz 2', '[{"qnNumber":1,"type":"mcq","qnText":"Q1","options":[{"id":"q1-1","optText":"Q1-A1","value":1},{"id":"q1-2","optText":"Q1-A2","value":2},{"id":"q1-3","optText":"Q1-A3","value":3}]},{"qnNumber":2,"type":"checkbox","qnText":"Q2","options":[{"id":"q2-1","optText":"Q2-1","value":1},{"id":"q2-2","optText":"Q2-2","value":2},{"id":"q2-3","optText":"Q2-3","value":3},{"id":"q2-4","optText":"Q2-4","value":4}]},{"qnNumber":3,"type":"mcq","qnText":"Q3","options":[{"id":"q3-1","optText":"Q3-1","value":1},{"id":"q3-2","optText":"Q3-2","value":2}]}]', '[{"qnNumber":1,"answer":"2"},{"qnNumber":2,"answer":["1","3"]},{"qnNumber":3,"answer":"2"}]')
    ; 


-- Insertion 12
INSERT INTO Access_Record(Learner_ID, Course_Code, Course_Run_ID, Section_ID, Visit_Date_Time)
VALUES
    (2001, 'SR101', 1, 1, '2021-02-02 23:55:55'), 
    (2001, 'SR101', 1, 2, '2021-02-03 22:00:05')
    ;

-- Insertion 13
INSERT INTO Quiz_Record(Learner_ID, Course_Code, Course_Run_ID, Section_ID, Attempt_Number, Response_List, Quiz_Score, Quiz_Date_Time)
VALUES
    (2001, 'SR101', 1, 1, 1, '[{"qnNumber":1,"answer":"2"},{"qnNumber":2,"answer":"1"}]', 100.0, '2021-02-04 10:05:21'), 
    (2001, 'SR101', 1, 1, 2, '[{"qnNumber":1,"answer":"2"},{"qnNumber":2,"answer":"1"}]', 50.0, '2021-02-05 10:11:11'), 
    (2001, 'SR101', 1, 2, 2, '[{"qnNumber":1,"answer":"2"},{"qnNumber":2,"answer":["1","3"]},{"qnNumber":3,"answer":"2"}]', 80.0, '2021-03-05 08:02:20'), 
    (2001, 'SR101', 1, 2, 1, '[{"qnNumber":1,"answer":"2"},{"qnNumber":2,"answer":["1","3"]},{"qnNumber":3,"answer":"2"}]', 70.0, '2021-03-19 08:21:05')
    ; 


-- Insertion 14
INSERT INTO Forum_Post(Post_ID, Topic, Content, Creation_Date_Time, Author_ID, Reply_To_Post_ID)
VALUES
    (0001, 'Hello  LMS Forum', 'Hi LMS learning Community, Albert here, I hope you enjoy this learning platform!', '2021-01-01 08:00:00', 0001, NULL), 
    (0002, 'Reply to LMS Forum', 'Hey Albert, Thomas here, I am so excited to use the system', '2021-01-01 10:00:00', 1001, 0001)
    ; 

-- Insertion 15
INSERT INTO MSG (Sender_ID, Reciever_ID, Message_Content,Sent_Date_Time, Read_Status)
VALUES
    (1001, 0001, "Test Message", "2021-01-02 09:00:00", TRUE), 
     (0001, 1001, "Test Message", "2021-01-02 09:00:20", TRUE)
     ;  