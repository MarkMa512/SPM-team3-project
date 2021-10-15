-- created based on ER diagrame V5

CREATE DATABASE TestDataBase3; 

USE TestDataBase3; 

CREATE TABLE Employee(
    Employee_ID INT NOT NULL, 

    First_Name VARCHAR(255), 
    Last_Name VARCHAR(255), 
    Employee_Type CHAR, 
    Employee_Password_Hash VARCHAR(255), 

    CONSTRAINT Employee_PK PRIMARY KEY (Employee_ID)
);

CREATE TABLE Engineer(
    Engineer_ID INT NOT NULL, 

    Engineer_Type CHAR, 
    -- use to distinguish Learner and Instructor; "I" for Instructor and "L" for learner
    CONSTRAINT Engineer_PK PRIMARY KEY (Engineer_ID),
    CONSTRAINT Engineer_FK1 FOREIGN KEY (Engineer_ID) REFERENCES Employee(Employee_ID)
);

CREATE TABLE Course(
    Course_Code CHAR(5) NOT NULL, -- Course Code is a 5 digit alpha numeric code

    Course_Name VARCHAR(255), 
    Bagde_Name VARCHAR(255), -- Asssuming each course awards one badge only
    Badge_Image BLOB, -- stores the badge image

    CONSTRAINT Course_PK PRIMARY KEY (Course_Code)
); 

CREATE TABLE Prerequisite(
    Course_Code CHAR(5) NOT NULL, 

    Prerequisite_ID CHAR(5),

    CONSTRAINT Prerequisite_PK PRIMARY KEY (Course_Code, Prerequisite_ID),
    CONSTRAINT Prerequisite_FK1 FOREIGN KEY (Course_Code) REFERENCES Course(Course_Code), 
    CONSTRAINT Prerequisite_FK2 FOREIGN KEY (Prerequisite_ID) REFERENCES Course(Course_Code)
);

CREATE TABLE CourseRun(
    -- CourseRun is a Weak Entity of Course
    Course_Code CHAR(5) NOT NULL, 
    CourseRun_ID INT NOT NULL, 

    Start_Date DATE, 
    End_Date DATE,

    CONSTRAINT CourseRun_PK PRIMARY KEY (Course_Code, CourseRun_ID), 
    CONSTRAINT CourseRun_FK FOREIGN KEY (Course_Code) REFERENCES Course(Course_Code)
); 

CREATE TABLE Section(
    Course_Code CHAR(5) NOT NULL, 
    CourseRun_ID INT NOT NULL, 
    Section_ID INT NOT NULL, 

    Section_Name VARCHAR(255), 
    -- since Each section has only 1 quiz
    Quiz_Graded BOOLEAN, 

    CONSTRAINT Section_PK PRIMARY KEY (Course_Code, CourseRun_ID, Section_ID), 
    -- Section is a Weak Entity of Course Run 
    CONSTRAINT Section_FK1 FOREIGN KEY (Course_Code, CourseRun_ID) REFERENCES CourseRun(Course_Code, CourseRun_ID)
); 

-- CREATE TABLE Quiz(
--     Quiz_ID INT NOT NULL, 
--     Quiz_Name VARCHAR(255), 
--     Graded BOOLEAN, 
--     Section_ID INT NOT NULL, 
--     CONSTRAINT Quiz_PK PRIMARY KEY(Quiz_ID),
--     CONSTRAINT Quiz_FK1 FOREIGN KEY (Section_ID) REFERENCES Section(Section_ID)
-- );

CREATE TABLE Material(

    -- This allows search of material by course run or by course
    Course_Code CHAR(5) NOT NULL, 
    CourseRun_ID INT NOT NULL, 
    Section_ID INT NOT NULL, 
    Material_ID INT NOT NULL, 

    Material BLOB,

    CONSTRAINT Material_PK PRIMARY KEY (Course_Code, CourseRun_ID, Section_ID, Material_ID),
    -- Material is a week entity of Section
    CONSTRAINT Material_FK1 FOREIGN KEY (Course_Code, CourseRun_ID, Section_ID) REFERENCES Section(Course_Code, CourseRun_ID, Section_ID)
); 


CREATE TABLE Question(
    -- Question is a weak entity of Section
    Course_Code CHAR(5) NOT NULL, 
    CourseRun_ID INT NOT NULL, 
    Section_ID INT NOT NULL, 
    Question_Number INT NOT NULL,

    Question VARCHAR(255), 
    Answer VARCHAR(255), 

    CONSTRAINT Question_PK PRIMARY KEY (Course_Code, CourseRun_ID, Section_ID, Question_Number), 
    CONSTRAINT Question_FK1 FOREIGN KEY (Course_Code, CourseRun_ID, Section_ID) REFERENCES Section(Course_Code, CourseRun_ID, Section_ID)
); 

CREATE TABLE Access_Record(
    Learner_ID INT NOT NULL,
    Course_Code CHAR(5) NOT NULL,
    CourseRun_ID INT NOT NULL, 
    Section_ID INT NOT NULL,

    Visit_Date_Time DATETIME NOT NULL,

    CONSTRAINT Access_Record_PK PRIMARY KEY (Learner_ID, Course_Code, CourseRun_ID, Section_ID, Visit_Date_Time),
    CONSTRAINT Access_Record_FK1 FOREIGN KEY (Learner_ID) REFERENCES Employee(Employee_ID), 
    CONSTRAINT Access_Record_FK2 FOREIGN KEY (Course_Code, CourseRun_ID, Section_ID) REFERENCES Section(Course_Code, CourseRun_ID, Section_ID)
);

CREATE TABLE Qualification(

    Course_Code CHAR(5) NOT NULL, 
    Employee_ID INT NOT NULL, 

    Qualification_date DATE NOT NULL, 
    -- if Badge_Assign_date == null, means the bagde has yet been assigned
    Badge_Assign_date DATE, 

    CONSTRAINT Qualification_PK PRIMARY KEY (Course_Code, Employee_ID), 
    CONSTRAINT Qualification_FK1 FOREIGN KEY (Course_Code) REFERENCES Course(Course_Code), 
    CONSTRAINT Qualification_FK2 FOREIGN KEY (Employee_ID) REFERENCES Employee(Employee_ID)
); 

CREATE TABLE Enrollment_Record(
    Learner_ID INT NOT NULL,
    Course_Code VARCHAR(5) NOT NULL, 
    CourseRun_ID INT NOT NULL,

    Enrollment_Date DATE, 

    CONSTRAINT Enrollment_Record_PK PRIMARY KEY (Learner_ID, Course_Code, CourseRun_ID),
    CONSTRAINT Enrollment_Record_FK1 FOREIGN KEY (Learner_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Enrollment_Record_FK2 FOREIGN KEY (Course_Code, CourseRun_ID) REFERENCES CourseRun(Course_Code, CourseRun_ID)
);

CREATE TABLE Quiz_Record(
    Learner_ID INT NOT NULL,
    Course_Code CHAR(5) NOT NULL,
    CourseRun_ID INT NOT NULL, 
    Section_ID INT NOT NULL,
    Attempt_Number INT NOT NULL,

    Quiz_Score FLOAT,
    Quiz_Date_Time DATETIME, 

    CONSTRAINT Quiz_Record_PK PRIMARY KEY (Learner_ID, Course_Code, CourseRun_ID, Section_ID, Attempt_Number), 
    CONSTRAINT Quiz_Record_FK1 FOREIGN KEY (Learner_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Quiz_Record_FK2 FOREIGN KEY (Course_Code, CourseRun_ID, Section_ID) REFERENCES Section(Course_Code, CourseRun_ID, Section_ID)
);

CREATE TABLE Assignment(
    HR_ID INT NOT NULL, 
    Instructor_ID INT NOT NULL, 
    Course_Code CHAR(5) NOT NULL, 
    CourseRun_ID INT NOT NULL, 

    Assignment_Date DATE, 

    CONSTRAINT Assignment_PK PRIMARY KEY (HR_ID, Instructor_ID, Course_Code, CourseRun_ID),
    CONSTRAINT Assignment_FK1 FOREIGN KEY (HR_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Assignment_FK2 FOREIGN KEY (Instructor_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Assignment_FK3 FOREIGN KEY (Course_Code, CourseRun_ID) REFERENCES CourseRun(Course_Code, CourseRun_ID)
);