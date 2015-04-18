<?php

class ForumClass {
    
    //Categoty table
    private $cat_id;
    private $cat_name;
    private $cat_description;
    
    //Thread table
    private $thread_id;
    private $thread_subject;
    private $thread_date;
    private $thread_category;    
    private $thread_author;
    
    //Post table
    private $post_thread;
    private $post_author;                     
    private $post_content;
    private $post_date;
     
public function __construct($cat_id, $cat_name, $cat_description,
        $thread_id, $thread_subject, $thread_date, $thread_category,
        $thread_author, $post_thread, $post_author, $post_content, $post_date)
        {
    //Category
    $this->cat_id = $cat_id;
    $this->cat_name = $cat_name;
    $this->cat_description = $cat_description;
    //Thread
    $this->thread_id = $thread_id;
    $this->thread_subject = $thread_subject;
    $this->thread_date = $thread_date;
    $this->thread_category = $thread_category;
    $this->thread_author = $thread_author;
    //Post
     $this->post_thread = $post_thread;
     $this->post_author = $post_author;
     $this->post_content = $post_content;
     $this->post_date = $post_date;
        }
     
        
    //Category
    public function getCategoryId(){
    return $this->cat_id;
    }
    
    public function setCategoryId($cat_id){
        $this->cat_id = $cat_id;
    } 
    
    public function getCategoryName(){
    return $this->cat_name;
    }
    
    public function setCategoryName($cat_name){
        $this->cat_name = $cat_name;
    } 
    
    public function getCategoryDescription(){
    return $this->cat_description;
    }
    
    public function setcategoryDescription($cat_description){
        $this->cat_description = $cat_description;
    } 
    
    //Thread

    public function getThreadId(){
    return $this->thread_id;
    }
    
    public function setThreadId($thread_id){
        $this->thread_id = $thread_id;
    } 
    
     public function getThreadSubject(){
    return $this->thread_subject;
    }
    
    public function setThreadSubject($thread_subject){
        $this->thread_subject = $thread_subject;
    } 
    
      public function getThreadDate(){
    return $this->thread_date;
    }
    
    public function setThreadDate($thread_date){
        $this->thread_date = $thread_date;
    } 
    
     public function getThreadCategory(){
    return $this->thread_category;
    }
    
    public function setThreadCategory($thread_category){
        $this->thread_category = $thread_category;
    } 
    
//Author        
      public function getThreadAuthor(){
    return $this->thread_author;
    }
    
    public function setThreadAuthor($thread_author){
        $this->thread_author = $thread_author;
    } 
    
    //Post
    

     
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










