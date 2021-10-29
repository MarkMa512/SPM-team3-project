-- created based on ER diagrame V4

CREATE DATABASE TestDataBase2; 

USE TestDataBase2; 

CREATE TABLE Employee(
    Employee_ID INT NOT NULL, 
    First_Name VARCHAR(255) NOT NULL, 
    Last_Name VARCHAR(255) NOT NULL, 
    Employee_Type CHAR, 
    Employee_Password_Hash VARCHAR(255), 
    CONSTRAINT Employee_PK PRIMARY KEY (Employee_ID)
);

CREATE TABLE Engineer(
    Engineer_ID INT NOT NULL, 
    Engineer_Type CHAR, 
    -- use to distinguish Learner and Instructor
    CONSTRAINT Engineer_PK PRIMARY KEY (Engineer_ID),
    CONSTRAINT Engineer_FK1 FOREIGN KEY (Engineer_ID) REFERENCES Employee(Employee_ID)
);

CREATE TABLE Course(
    Course_ID INT NOT NULL, 
    Course_Name VARCHAR(255), 
    Course_Bagde BINARY, 
    CONSTRAINT Course_PK PRIMARY KEY (Course_ID)
); 

CREATE TABLE Prerequisite(
    Course_ID INT NOT NULL, 
    Prerequisite_ID INT, 
    CONSTRAINT Prerequisite_PK PRIMARY KEY (Course_ID, Prerequisite_ID),
    CONSTRAINT Prerequisite_FK1 FOREIGN KEY (Course_ID) REFERENCES Course(Course_ID), 
    CONSTRAINT Prerequisite_FK2 FOREIGN KEY (Prerequisite_ID) REFERENCES Course(Course_ID)
);

CREATE TABLE CourseRun(
    CourseRun_ID INT NOT NULL, 
    Start_Date DATE, 
    End_Date DATE,
    Course_ID INT,
    CONSTRAINT CourseRun_PK PRIMARY KEY (CourseRun_ID), 
    CONSTRAINT CourseRun_FK FOREIGN KEY (Course_ID) REFERENCES Course(Course_ID)
); 

CREATE TABLE Section(
    Section_ID INT NOT NULL, 
    Section_Name VARCHAR(255), 
    CourseRun_ID INT NOT NULL, 
    CONSTRAINT Section_PK PRIMARY KEY (Section_ID), 
    CONSTRAINT Section_FK1 FOREIGN KEY (CourseRun_ID) REFERENCES CourseRun(CourseRun_ID)
); 

CREATE TABLE Material(
    Material_ID INT NOT NULL, 
    Section_ID INT NOT NULL, 
    Material BINARY,
    CONSTRAINT Material_PK PRIMARY KEY (Material_ID),
    CONSTRAINT Material_FK FOREIGN KEY (Section_ID) REFERENCES Section(Section_ID)
); 

CREATE TABLE Progress(
    Employee_ID INT NOT NULL,
    Section_ID INT NOT NULL,
    Visit_Date_Time DATETIME NOT NULL,
    CONSTRAINT Progress_PK PRIMARY KEY (Employee_ID, Section_ID, Visit_Date_Time),
    CONSTRAINT Progress_FK1 FOREIGN KEY (Employee_ID) REFERENCES Employee(Employee_ID), 
    CONSTRAINT Progress_FK2 FOREIGN KEY (Section_ID) REFERENCES Section(Section_ID)
);

CREATE TABLE Quiz(
    Quiz_ID INT NOT NULL, 
    Quiz_Name VARCHAR(255), 
    Graded BOOLEAN, 
    Section_ID INT NOT NULL, 
    CONSTRAINT Quiz_PK PRIMARY KEY(Quiz_ID),
    CONSTRAINT Quiz_FK1 FOREIGN KEY (Section_ID) REFERENCES Section(Section_ID)
);

CREATE TABLE Question(
    Quiz_ID INT NOT NULL, 
    Question_ID INT NOT NULL, 
    Question VARCHAR(255), 
    Answer VARCHAR(255), 
    CONSTRAINT Question_PK PRIMARY KEY (Quiz_ID, Question_ID), 
    CONSTRAINT Question_FK1 FOREIGN KEY (Quiz_ID) REFERENCES Quiz(Quiz_ID) 
); 

CREATE TABLE Qualification(
    Course_ID INT NOT NULL, 
    Employee_ID INT NOT NULL, 
    Qualification_date DATE NOT NULL, 
    Badge_Assign_date DATE, 
    CONSTRAINT Qualification_PK PRIMARY KEY (Course_ID, Employee_ID), 
    CONSTRAINT Qualification_FK1 FOREIGN KEY (Course_ID) REFERENCES Course(Course_ID), 
    CONSTRAINT Qualification_FK2 FOREIGN KEY (Employee_ID) REFERENCES Employee(Employee_ID)
); 

CREATE TABLE Enrollment(
    CourseRun_ID INT NOT NULL, 
    Employee_ID INT NOT NULL, 
    Enrollment_Date DATE, 
    CONSTRAINT Enrollment_PK PRIMARY KEY (CourseRun_ID, Employee_ID), 
    CONSTRAINT Enrollment_FK2 FOREIGN KEY (CourseRun_ID) REFERENCES CourseRun (CourseRun_ID), 
    CONSTRAINT Enrollment_FK1 FOREIGN KEY (Employee_ID) REFERENCES Employee(Employee_ID)
);

CREATE TABLE Quiz_Record(
    Employee_ID INT NOT NULL,
    Quiz_ID INT NOT NULL,
    Quiz_Attempt INT NOT NULL,
    Quiz_Date DATE,
    Quiz_Time TIME, 
    Quiz_Score FLOAT,
    Quiz_Status BOOLEAN,
    CONSTRAINT Quiz_Record_PK PRIMARY KEY (Employee_ID, Quiz_ID, Quiz_Attempt), 
    CONSTRAINT Quiz_Record_FK1 FOREIGN KEY (Employee_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Quiz_Record_FK2 FOREIGN KEY (Quiz_ID) REFERENCES Quiz(Quiz_ID)
); 

CREATE TABLE Assignment(
    HR_ID INT NOT NULL, 
    Instructor_ID INT NOT NULL, 
    CourseRun_ID INT NOT NULL, 
    Assignment_Date DATE, 
    CONSTRAINT Assignment_PK PRIMARY KEY (HR_ID, Instructor_ID, CourseRun_ID),
    CONSTRAINT Assignment_FK1 FOREIGN KEY (HR_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Assignment_FK2 FOREIGN KEY (Instructor_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Assignment_FK3 FOREIGN KEY (CourseRun_ID) REFERENCES CourseRun(CourseRun_ID)
);