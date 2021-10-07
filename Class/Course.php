<?php 
class Course{
    private courseID;
    private prerequisiteList = [];; 
    private courseTitle;
    private courseRunList = [];

    function __construct(courseTitle){
        $this->courseTitle = courseTitle;
    }

    public createCourseRun(startDate, endDate){
        $this->courseRunList.append(new CourseRun(startDate, endDate));
    }

    public addPrerequisite(prerequisite){
        prerequisiteList.append(prerequisite);
    }

    public getCourseID(){
        return $this->courseID;
    }
    public getPrerequisiteList(){
        return $this->coursprerequisiteListe;
    }
    public getCourseTitle(){
        return $this->courseTitle;
    }
    public getCourseRunList(){
        return $this->courseRunList;
    }


    public setCourseID(courseID){
        $this->courseID = courseID;
    }
    public setPrerequisiteList(coursprerequisiteList){
        return $this->coursprerequisiteList;
    }
    public setCourseTitle(courseTitle){
        $this->courseTitle = courseTitle;
    }
    public setCourseRunList(courseRunList){
        $this->courseRunList = courseRunList;
    }

}

?>