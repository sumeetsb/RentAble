<?php

class postClass
{
    private $post_thread;
    private $post_author;                     
    private $post_content;
    private $post_date;
    
    public function __construct($post_thread, $post_author, $post_content, $post_date )
    {
     $this->post_thread = $post_thread;
     $this->post_author = $post_author;
     $this->post_content = $post_content;
     $this->post_date = $post_date;
    }
    public function getPostThread(){
    return $this->post_thread;
    }
    
    public function setPostThread($post_thread){
        $this->post_thread = $post_thread;
    } 
    
     public function getPostAuthor(){
    return $this->post_author;
    }
    
    public function setPostAuthor($post_author){
        $this->post_author = $post_author;
    } 
    
    
     public function getPostContent(){
    return $this->post_content;
    }
    
    public function setPostContent($post_content){
        $this->post_content = $post_content;
    } 
    
    
     public function getPostDate(){
    return $this->post_date;
    }
    
    public function setPostDate($post_date){
        $this->post_date = $post_date;
    } 
}

