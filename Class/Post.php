<?php

Class Post{
    private $postID; 
    private $postTopic;
    private $postContent; 
    private $postAuthor; 
    private $postDateTime; 
    private $postReplyTo; 

    function __construct($postID, $postTopic, $postContent, $postAuthor, $postDateTime, $postReplyTo){
        $this->postID = $postID;
        $this->postTopic = $postTopic;
        $this->postContent = $postContent;
        $this->postAuthor = $postAuthor;
        $this->postDateTime = $postDateTime; 
        $this->postReplyTo = $postReplyTo; 
        // select statement 
    }

    function editPost(){
        // under construction 
        return NULL; 
    }

    function deletePost(){
        // under construction
        return NULL; 
    }

    function displayPost(){
        return NULL; 
    }

}

?>