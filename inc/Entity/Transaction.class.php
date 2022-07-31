<?php

class Transaction
{
    private $transactionID;
    private $ternantID;
    private $postID;
    private $requestedDate;
    private $approvedDate;
    private $rejectedDate;
    private $status;

    //Getters
    function getTransactionID()
    {
        return $this->transactionID;
    }

    function getTernantID()
    {
        return $this->ternantID;
    }

    function getPostID()
    {
        return $this->postID;
    }

    function getRequestedDate()
    {
        return $this->requestedDate;
    }

    function getApprovedDate()
    {
        return $this->approvedDate;
    }

    function getRejectedDate()
    {
        return $this->rejectedDate;
    }

    function getStatus()
    {
        return $this->status;
    }


    //Setters
    function setTransactionID($transactionID)
    {
        $this->transactionID = $transactionID;
    }

    function setTernantID($ternantID)
    {
        $this->ternantID = $ternantID;
    }

    function setPostID($postID)
    {
        $this->postID = $postID;
    }

    function setRequestedDate($requestedDate)
    {
        $this->requestedDate = $requestedDate;
    }

    function setApprovedDate($approvedDate)
    {
        $this->approvedDate = $approvedDate;
    }

    function setRejectedDate($rejectedDate)
    {
        $this->rejectedDate = $rejectedDate;
    }

    function setStatus($status)
    {
        $this->status = $status;
    }
}
