<?php

class Comment

{
    private $commentID;
    private $post;
    private $user;
    private $body;
    private $date;

    /**
     * @param $commentID
     * @param $post
     * @param $user
     * @param $body
     * @param $date
     */
    public function __construct($commentID, $post, $user, $body, $date)
    {
        $this->commentID = $commentID;
        $this->post = $post;
        $this->user = $user;
        $this->body = $body;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCommentID()
    {
        return $this->commentID;
    }

    /**
     * @param mixed $commentID
     */
    public function setCommentID($commentID)
    {
        $this->commentID = $commentID;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }




}