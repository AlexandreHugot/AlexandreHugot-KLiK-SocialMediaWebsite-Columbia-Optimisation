<?php

    /**
     * Class View will allow to generate a specific view thanks to an action 
     */
    class View 
    {  
        private string $file;
        private string $title;

        /**
         * Natural Constructor of the class View
         * @param string $action : string containing the action key to generate the view
        */
        public function __construct(string $action){
            $this->file = "Views/view". $action .".php";
            $this->title = $action;
        }

        /**
         * Method to generate data into a specified file
         * @param array $data : an array containing the specified data to put in the file
         */
        public function generate(array $data) : void {
            $content = $this->generateFile($this->fichier, $data);
            $view = $this->generateFile('views/gabarit.php',array('title' => $this->title, 'content' => $content));
            // Return the view in the browser
            echo $view;
        }

        
        private function generateFile(string $file, array $data) : string {
            if (file_exists($file)) {
                // All the data from the $data array can be accessible from the view
                extract($data);
                ob_start();
                require $file;
                return ob_get_clean();
            }
            else 
            {
                throw new Exception("File '$fichier' not found");
            }
        }
    }

?>