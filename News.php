<?php
class News {
    private $id;
    private $title;
    private $date;
    private $content;
    private $email_author;

    function __construct($id, $title,$date,$content, $email_author){
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->email_author = $email_author;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

   
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getEmailAuthor()
    {
        return $this->email_author;
    }

    public function setEmailAuthor($email_author)
    {
        $this->email_author = $email_author;
    }
}

?>