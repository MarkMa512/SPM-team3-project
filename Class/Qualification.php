<?php 
class Qualification{
    private $employeeID; 
    private $courseCode; 
    private $qualificationDate;
    private $badgeAssignDate;

    /**
     * Get the value of employeeID
     */ 
    public function getEmployeeID()
    {
        return $this->employeeID;
    }

    /**
     * Set the value of employeeID
     *
     * @return  self
     */ 
    public function setEmployeeID($employeeID)
    {
        $this->employeeID = $employeeID;

        return $this;
    }

    /**
     * Get the value of courseCode
     */ 
    public function getCourseCode()
    {
        return $this->courseCode;
    }

    /**
     * Set the value of courseCode
     *
     * @return  self
     */ 
    public function setCourseCode($courseCode)
    {
        $this->courseCode = $courseCode;

        return $this;
    }

    /**
     * Get the value of qualificationDate
     */ 
    public function getQualificationDate()
    {
        return $this->qualificationDate;
    }

    /**
     * Set the value of qualificationDate
     *
     * @return  self
     */ 
    public function setQualificationDate($qualificationDate)
    {
        $this->qualificationDate = $qualificationDate;

        return $this;
    }

    /**
     * Get the value of badgeAssignDate
     */ 
    public function getBadgeAssignDate()
    {
        return $this->badgeAssignDate;
    }

    /**
     * Set the value of badgeAssignDate
     *
     * @return  self
     */ 
    public function setBadgeAssignDate($badgeAssignDate)
    {
        $this->badgeAssignDate = $badgeAssignDate;

        return $this;
    }

    function __construct($employeeID, $courseCode, $qualificationDate, $badgeAssignDate = NULL)
    {
        $this->$employeeID = $this->setEmployeeID($employeeID); 
        $this->$courseCode = $this->setCourseCode($courseCode); 
        $this->$qualificationDate = $this->setQualificationDate($qualificationDate); 
        $this->$badgeAssignDate = $this->setBadgeAssignDate($badgeAssignDate); 
    }
}

?>