<?php

require_once "autoload.php";

Class Post{
    private $postID; 
    private $postTopic;
    private $postContent; 
    private $postAuthor; 
    private $postDateTime; 
    private $postReplyTo; 

    /**
     * Get the value of postID
     */ 
    public function getPostID()
    {
        return $this->postID;
    }

    /**
     * Get the value of postTopic
     */ 
    public function getPostTopic()
    {
        return $this->postTopic;
    }

    /**
     * Get the value of postContent
     */ 
    public function getPostContent()
    {
        return $this->postContent;
    }

    /**
     * Get the value of postAuthor
     */ 
    public function getPostAuthor()
    {
        return $this->postAuthor;
    }

    /**
     * Get the value of postDateTime
     */ 
    public function getPostDateTime()
    {
        return $this->postDateTime;
    }

    /**
     * Get the value of postReplyTo
     */ 
    public function getPostReplyTo()
    {
        return $this->postReplyTo;
    }

    /**
     * Set the value of postID
     *
     * @return  self
     */ 
    public function setPostID($postID)
    {
        $this->postID = $postID;

        return $this;
    }

    /**
     * Set the value of postTopic
     *
     * @return  self
     */ 
    public function setPostTopic($postTopic)
    {
        $this->postTopic = $postTopic;

        return $this;
    }

    /**
     * Set the value of postContent
     *
     * @return  self
     */ 
    public function setPostContent($postContent)
    {
        $this->postContent = $postContent;

        return $this;
    }

    /**
     * Set the value of postAuthor
     *
     * @return  self
     */ 
    public function setPostAuthor($postAuthor)
    {
        $this->postAuthor = $postAuthor;

        return $this;
    }

    /**
     * Set the value of postDateTime
     *
     * @return  self
     */ 
    public function setPostDateTime($postDateTime)
    {
        $this->postDateTime = $postDateTime;

        return $this;
    }

    /**
     * Set the value of postReplyTo
     *
     * @return  self
     */ 
    public function setPostReplyTo($postReplyTo)
    {
        $this->postReplyTo = $postReplyTo;

        return $this;
    }

    function __construct($postID, $postTopic, $postContent, $postAuthor, $postDateTime, $postReplyTo){
        $this->postID = $postID;
        $this->postTopic = $postTopic;
        $this->postContent = $postContent;
        $this->postAuthor = $postAuthor;
        $this->postDateTime = $postDateTime; 
        $this->postReplyTo = $postReplyTo; 
        // select statement 
    }

    

    // function editPost(){
    //     // under construction 
    //     return NULL; 
    // }

    // function deletePost(){
    //     // under construction
    //     return NULL; 
    // }

    // function displayPost(){
    //     return NULL; 
    // }
}

?>