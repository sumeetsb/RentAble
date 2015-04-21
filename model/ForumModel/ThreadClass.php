<?php
class ThreadClass 
{
//    private $thread_id;
    private $thread_subject;
    private $thread_date;
    private $thread_category;    
    private $thread_author;  
    
    public function __construct($thread_subject, $thread_date, $thread_category, $thread_author)
            {
//    $this->thread_id = $thread_id;
    $this->thread_subject = $thread_subject;
    $this->thread_date = $thread_date;
    $this->thread_category = $thread_category;
    $this->thread_author = $thread_author;
            }
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
    
     public function getThreadAuthor(){
    return $this->thread_author;
    }
    
    public function setThreadAuthor($thread_author){
        $this->thread_author = $thread_author;
    } 
}

