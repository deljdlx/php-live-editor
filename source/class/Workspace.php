<?php


class Workspace
{

    private $errorManager;


    private $buffers = [];

    public function enableErrorHandling()
    {
        ini_set('display_errors', false);
        $this->errorManager = new ErrorManager();
        $this->errorManager->setCallback([$this, 'errorBufferHandling']);

        register_shutdown_function(array($this->errorManager, 'catchFatal'));
        set_error_handler(array($this->errorManager, 'add'));

    }



    public function errorBufferHandling($errno, $errstr, $errfile, $errline)
    {
        $this->obStop();

        $error = [
            'type' => $errno,
            'errstr' => $errstr,
            'file' => $errfile,
            'line' => $errline,
        ];

        $this->buffers[] = [
            'type' => 'error',
            'content' => $errline . ' : ' .$errstr,
            'data' => $error
        ];

        $this->obStart();
    }


    public function obStart()
    {
        ob_start();
        return $this;
    }

    public function obStop()
    {
        $content = ob_get_clean();

        if($content) {
            $this->buffers[] = [
                'type' => 'standart',
                'content' => $content
            ];
        }

        return $this;
    }

    public function getBuffers()
    {
        return $this->buffers;
    }

    public function getOutput()
    {
        $this->obStop();
        $output = '';
        foreach($this->buffers as $descriptor) {
            if($descriptor['type'] === 'standart') {
                $output .= $descriptor['content'];
            }
            
        }
        return $output;
    }




    public function getErrors()
    {
        return $this->errorManager->getErrors();
    }

}


