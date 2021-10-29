-- created based on ER diagrame V6
-- with auto insertion of date and time for some of the tables

DROP DATABASE IF EXISTS TestDatabase5; 
CREATE DATABASE TestDatabase5; 

USE TestDatabase5; 

-- Table 1
DROP TABLE IF EXISTS Employee; 
CREATE TABLE Employee(
    Employee_ID INT NOT NULL, 

    First_Name VARCHAR(255), 
    Last_Name VARCHAR(255), 
    Employee_Type CHAR, 
    Employee_Password_Hash VARCHAR(255), 

    CONSTRAINT Employee_PK PRIMARY KEY (Employee_ID)
);

-- Table 2
DROP TABLE IF EXISTS Engineer; 
CREATE TABLE Engineer(
    Engineer_ID INT NOT NULL, 

    Engineer_Type CHAR, -- used to distinguish Learner and Instructor; "I" for Instructor and "L" for learner
    CONSTRAINT Engineer_PK PRIMARY KEY (Engineer_ID),
    CONSTRAINT Engineer_FK1 FOREIGN KEY (Engineer_ID) REFERENCES Employee(Employee_ID)
);

-- Table 3
DROP TABLE IF EXISTS Course; 
CREATE TABLE Course(
    Course_Code CHAR(5) NOT NULL, -- Course Code is a 5 digit alpha numeric code

    Course_Name VARCHAR(255), 
    Bagde_Name VARCHAR(255), --  each course awards one badge only
    Badge_Image BLOB, -- stores the badge image

    CONSTRAINT Course_PK PRIMARY KEY (Course_Code)
); 

-- Table 4 
DROP TABLE IF EXISTS Prerequisite; 
CREATE TABLE Prerequisite(
    Course_Code CHAR(5) NOT NULL, 
    Prerequisite_Course_Code CHAR(5),

    CONSTRAINT Prerequisite_PK PRIMARY KEY (Course_Code, Prerequisite_Course_Code),
    CONSTRAINT Prerequisite_FK1 FOREIGN KEY (Course_Code) REFERENCES Course(Course_Code), 
    CONSTRAINT Prerequisite_FK2 FOREIGN KEY (Prerequisite_Course_Code) REFERENCES Course(Course_Code)
);

-- Table 5
DROP TABLE IF EXISTS Qualification; 
CREATE TABLE Qualification(

    Employee_ID INT NOT NULL, 
    Course_Code CHAR(5) NOT NULL,

    -- added in TestDatabase 5: auto capture of the date 
    Qualification_Date DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    Badge_Assign_Date DATE, -- if Badge_Assign_date == null, means the bagde has yet been assigned

    CONSTRAINT Qualification_PK PRIMARY KEY (Employee_ID, Course_Code),  
    CONSTRAINT Qualification_FK1 FOREIGN KEY (Employee_ID) REFERENCES Employee(Employee_ID), 
    CONSTRAINT Qualification_FK2 FOREIGN KEY (Course_Code) REFERENCES Course(Course_Code)
); 

-- Table 6
DROP TABLE IF EXISTS Course_Run; 
CREATE TABLE Course_Run(
    -- Course_Run is a Weak Entity of Course
    Course_Code CHAR(5) NOT NULL, 
    Course_Run_ID INT NOT NULL, 

    Capacity INT, -- newly added  attribute in TestDatabase4 to store the capacity limit of the Course Run 
    Start_Date DATE, 
    End_Date DATE,
    -- Is_Ended AS(End_Date) not necessary

    CONSTRAINT Course_Run_PK PRIMARY KEY (Course_Code, Course_Run_ID), 
    CONSTRAINT Course_Run_FK FOREIGN KEY (Course_Code) REFERENCES Course(Course_Code)
); 

-- Table 7 
DROP TABLE IF EXISTS Assignment; 
CREATE TABLE Assignment(
    HR_ID INT NOT NULL, 
    Instructor_ID INT NOT NULL, 
    Course_Code CHAR(5) NOT NULL, 
    Course_Run_ID INT NOT NULL, 

    Assignment_Date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT Assignment_PK PRIMARY KEY (HR_ID, Instructor_ID, Course_Code, Course_Run_ID),
    CONSTRAINT Assignment_FK1 FOREIGN KEY (HR_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Assignment_FK2 FOREIGN KEY (Instructor_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Assignment_FK3 FOREIGN KEY (Course_Code, Course_Run_ID) REFERENCES Course_Run(Course_Code, Course_Run_ID)
);

-- Table 8
DROP TABLE IF EXISTS Enrollment_Record; 
CREATE TABLE Enrollment_Record(
    Learner_ID INT NOT NULL,
    Course_Code VARCHAR(5) NOT NULL, 
    Course_Run_ID INT NOT NULL,

    -- added in TestDatabase 5: auto capture of the date 
    Enroll_Date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 

    CONSTRAINT Enrollment_Record_PK PRIMARY KEY (Learner_ID, Course_Code, Course_Run_ID),
    CONSTRAINT Enrollment_Record_FK1 FOREIGN KEY (Learner_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Enrollment_Record_FK2 FOREIGN KEY (Course_Code, Course_Run_ID) REFERENCES Course_Run(Course_Code, Course_Run_ID)
);

-- Table 9 
DROP TABLE IF EXISTS Section; 
CREATE TABLE Section(
    Course_Code CHAR(5) NOT NULL, 
    Course_Run_ID INT NOT NULL, 
    Section_ID INT NOT NULL, 

    Section_Name VARCHAR(255), 
    -- since Each section has only 1 quiz
    Is_Graded BOOLEAN, 

    CONSTRAINT Section_PK PRIMARY KEY (Course_Code, Course_Run_ID, Section_ID), 
    -- Section is a Weak Entity of Course Run 
    CONSTRAINT Section_FK1 FOREIGN KEY (Course_Code, Course_Run_ID) REFERENCES Course_Run(Course_Code, Course_Run_ID)
); 
-- removed in TestDdatabase4
-- CREATE TABLE Quiz(
--     Quiz_ID INT NOT NULL, 
--     Quiz_Name VARCHAR(255), 
--     Graded BOOLEAN, 
--     Section_ID INT NOT NULL, 
--     CONSTRAINT Quiz_PK PRIMARY KEY(Quiz_ID),
--     CONSTRAINT Quiz_FK1 FOREIGN KEY (Section_ID) REFERENCES Section(Section_ID)
-- );

-- Table 10 
DROP TABLE IF EXISTS Material; 
CREATE TABLE Material(
    -- Material is a weak entity of section
    -- This allows search of material by course run or by course
    Course_Code CHAR(5) NOT NULL, 
    Course_Run_ID INT NOT NULL, 
    Section_ID INT NOT NULL, 
    Material_ID INT NOT NULL, 

    Material BLOB,

    CONSTRAINT Material_PK PRIMARY KEY (Course_Code, Course_Run_ID, Section_ID, Material_ID),
    -- Material is a week entity of Section
    CONSTRAINT Material_FK1 FOREIGN KEY (Course_Code, Course_Run_ID, Section_ID) REFERENCES Section(Course_Code, Course_Run_ID, Section_ID)
); 

-- Table 11
DROP TABLE IF EXISTS Question; 
CREATE TABLE Question(
    -- Question is a weak entity of Section
    Course_Code CHAR(5) NOT NULL, 
    Course_Run_ID INT NOT NULL, 
    Section_ID INT NOT NULL, 
    Question_Number INT NOT NULL,
    
    Question_Type CHAR, 
    Question VARCHAR(255), 
    -- Answer VARCHAR(255), 

    CONSTRAINT Question_PK PRIMARY KEY (Course_Code, Course_Run_ID, Section_ID, Question_Number), 
    CONSTRAINT Question_FK1 FOREIGN KEY (Course_Code, Course_Run_ID, Section_ID) 
    REFERENCES Section(Course_Code, Course_Run_ID, Section_ID)
); 

-- Table 12
DROP TABLE IF EXISTS Answer; 
CREATE TABLE Answer(
    -- Newly implemented in TestDatabase 4 
    -- Answer is a weak entity of Section
    Course_Code CHAR(5) NOT NULL, 
    Course_Run_ID INT NOT NULL, 
    Section_ID INT NOT NULL, 
    Question_Number INT NOT NULL,
    Answer_Number VARCHAR(5), 

    Answer VARCHAR(255), 
    Is_Correct BOOLEAN, 

    CONSTRAINT Answer_PK PRIMARY KEY (Course_Code, Course_Run_ID, Section_ID, Question_Number, Answer_Number), 
    CONSTRAINT Answer_FK1 FOREIGN KEY (Course_Code, Course_Run_ID, Section_ID, Question_Number) 
    REFERENCES Question(Course_Code, Course_Run_ID, Section_ID, Question_Number)
);

-- Table 13
DROP TABLE IF EXISTS Access_Record; 
CREATE TABLE Access_Record(
    Learner_ID INT NOT NULL,
    Course_Code CHAR(5) NOT NULL,
    Course_Run_ID INT NOT NULL, 
    Section_ID INT NOT NULL,

    -- added in TestDatabase 5: auto capture of the date 
    Visit_Date_Time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT Access_Record_PK PRIMARY KEY (Learner_ID, Course_Code, Course_Run_ID, Section_ID, Visit_Date_Time),
    CONSTRAINT Access_Record_FK1 FOREIGN KEY (Learner_ID) REFERENCES Employee(Employee_ID), 
    CONSTRAINT Access_Record_FK2 FOREIGN KEY (Course_Code, Course_Run_ID, Section_ID) REFERENCES Section(Course_Code, Course_Run_ID, Section_ID)
);

-- Table 14
DROP TABLE IF EXISTS Quiz_Record; 
CREATE TABLE Quiz_Record(
    Learner_ID INT NOT NULL,
    Course_Code CHAR(5) NOT NULL,
    Course_Run_ID INT NOT NULL, 
    Section_ID INT NOT NULL,
    Attempt_Number INT NOT NULL,

    Quiz_Score FLOAT,
    -- added in TestDatabase 5: auto capture of the date 
    Quiz_Date_Time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 

    CONSTRAINT Quiz_Record_PK PRIMARY KEY (Learner_ID, Course_Code, Course_Run_ID, Section_ID, Attempt_Number), 
    CONSTRAINT Quiz_Record_FK1 FOREIGN KEY (Learner_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Quiz_Record_FK2 FOREIGN KEY (Course_Code, Course_Run_ID, Section_ID) REFERENCES Section(Course_Code, Course_Run_ID, Section_ID)
);

-- Table 15 
-- newly added in TestDatabase4; 
DROP TABLE IF EXISTS Forum_Post; 
CREATE TABLE Forum_Post(
    Post_ID INT NOT NULL, 
    Topic VARCHAR(255), 
    Content VARCHAR(255), 
    -- added in TestDatabase 5: auto capture of the date 
    Creation_Date_Time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    Author_ID INT NOT NULL, 
    -- if Reply_to_Post_ID = NULL, means this post is a main posts
    Reply_To_Post_ID INT, 

    CONSTRAINT Forum_Post_PK PRIMARY KEY (Post_ID), 
    CONSTRAINT Forum_Post_FK1 FOREIGN KEY (Author_ID) REFERENCES Employee(Employee_ID), 
    CONSTRAINT FOrum_Post_FK2 FOREIGN KEY (Reply_To_Post_ID) REFERENCES Forum_Post(Post_ID)
);