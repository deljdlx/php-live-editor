<?php

class ErrorManager
{
    private $errors = [];

    private $callback;


    public function __construct()
    {
        
    }

    public function add($errno, $errstr, $errfile, $errline)
    {
        $error = [
            'type' => $errno,
            'errstr' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];

        $this->errors[] = $error;

        if($this->callback) {
            call_user_func_array($this->callback, $error);
        }
    }


    public function setCallback($callable)
    {
        $this->callback = $callable;
        return $this;
    }

    public function catchFatal()
    {
        $errfile = "unknown file";
        $errstr  = "shutdown";
        $errno   = E_CORE_ERROR;
        $errline = 0;
    
        $error = error_get_last();
    
        if( $error !== NULL) {
            $errno   = $error["type"];
            $errfile = $error["file"];
            $errline = $error["line"];
            $errstr  = $error["message"];
    
            $this->add( $errno, $errstr, $errfile, $errline);
            $this->sendResponse();
        }
    }

    public function sendResponse()
    {
        header('Content-type: application/json');
        echo json_encode([
            'success' => false,
            'errors' => $this->errors
        ]);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
