<?php

/**
 * Raise an error if sender is the same than the recipient
 */
    class ExceptionSelfMessage extends Exception
    {
        /**
         * Create the exception with the message given
         * @param $message the message to send, $code the code of the exception, $previous a previous excpetion, here null
         */
        public function __construct($message = "Cannot send a message to yourself.", $code = 0, Exception $previous = null) 
        {
            // Call to the parent constructor
            parent::__construct($message, $code, $previous);
        }

        /**
         * Check if the sender is the same than the recipient of the message
         * @param $senderId the Id of the sender, $recipientId the Id of the recipient
         */
        public static function check($senderId, $recipientId) 
        {
            if ($senderId == $recipientId) 
            {
                // Send a pop-up message and redirect to the homepage
                echo "<script type='text/javascript'>
                        alert('You cannot send a message to yourself.');
                        window.location.href = 'index.php';
                      </script>";
            }
        }

    }


?> 