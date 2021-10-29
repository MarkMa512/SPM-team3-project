CREATE DATABASE TestDataBase1; 


CREATE TABLE Employee(
    -- "Employee" is used over "User" as User is a reserved SQL keywords
    Employee_ID INT NOT NULL, 
    First_Name VARCHAR(255) NOT NULL, 
    Last_Name VARCHAR(255) NOT NULL, 
    User_Type CHAR, 
    User_Password_Hash VARCHAR(255), 
    CONSTRAINT Employee_PK PRIMARY KEY (Employee_ID)
);

CREATE TABLE Course(
    Course_ID INT NOT NULL, 
    Course_Name VARCHAR(255), 
    CONSTRAINT Course_PK PRIMARY KEY (Course_ID)
); 

CREATE TABLE Prerequisite(
    Course_ID INT NOT NULL, 
    Prerequisite_ID INT, 
    CONSTRAINT Prerequisite_PK PRIMARY KEY (Course_ID, Prerequisite_ID),
    CONSTRAINT Prerequisite_FK1 FOREIGN KEY (Course_ID) REFERENCES Course(Course_ID), 
    CONSTRAINT Prerequisite_FK2 FOREIGN KEY (Prerequisite_ID) REFERENCES Course(Course_ID)
);

CREATE TABLE ClassRun(
    -- "ClassRun" is used over "Session" as User is a reserved SQL keywords
    ClassRun_ID INT NOT NULL, 
    Start_Date DATE, 
    End_Date Date, 
    Course_ID INT, 
    CONSTRAINT ClassRun_PK PRIMARY KEY (ClassRun_ID), 
    CONSTRAINT ClassRun_FK FOREIGN KEY (Course_ID) REFERENCES Course(Course_ID)
); 

CREATE TABLE Section(
    Section_ID INT NOT NULL, 
    Section_Name VARCHAR(255), 
    ClassRun_ID INT NOT NULL, 
    CONSTRAINT Section_PK PRIMARY KEY (Section_ID), 
    CONSTRAINT Section_FK FOREIGN KEY (ClassRun_ID) REFERENCES ClassRun(ClassRun_ID)
); 

CREATE TABLE Quiz(
    Quiz_ID INT NOT NULL, 
    Quiz_Name VARCHAR(255), 
    CONSTRAINT Quiz_PK PRIMARY KEY(Quiz_ID)
);

CREATE TABLE Qualification(
    Course_ID INT NOT NULL, 
    Employee_ID INT NOT NULL, 
    Qualification_date DATE, 
    CONSTRAINT Qualification_PK PRIMARY KEY (Course_ID, Employee_ID), 
    CONSTRAINT Qualification_FK1 FOREIGN KEY (Course_ID) REFERENCES Course(Course_ID), 
    CONSTRAINT Qualification_FK2 FOREIGN KEY (Employee_ID) REFERENCES Employee(Employee_ID)
); 

CREATE TABLE Enrollment(
    ClassRun_ID INT NOT NULL, 
    Employee_ID INT NOT NULL, 
    Enrollment_Date DATE, 
    CONSTRAINT Enrollment_PK PRIMARY KEY (ClassRun_ID, Employee_ID), 
    CONSTRAINT Enrollment_FK2 FOREIGN KEY (ClassRun_ID) REFERENCES ClassRun (ClassRun_ID), 
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
    ClassRun_ID INT NOT NULL, 
    Assignment_Date DATE, 
    CONSTRAINT Assignment_PK PRIMARY KEY (HR_ID, Instructor_ID, ClassRun_ID),
    CONSTRAINT Assignment_FK1 FOREIGN KEY (HR_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Assignment_FK2 FOREIGN KEY (Instructor_ID) REFERENCES Employee(Employee_ID),
    CONSTRAINT Assignment_FK3 FOREIGN KEY (ClassRun_ID) REFERENCES ClassRun(ClassRun_ID)
);