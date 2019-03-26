<?php   

    // use Redirect;

    class WebApplication{

        private $handlers;

        private $regex_handlers  = array();



        public function __construct($handlers){

            $this->handlers = $handlers;
            
        
        }


        function run(){

            $base_url = $this->getCurrentUri();

            if(array_key_exists($base_url, $this->handlers)){
            
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    if(method_exists($this->handlers[$base_url], "post")){
                        $this->handlers[$base_url]->post();
                    } else  {
                        echo "500: Internal Server Error";
                    }
                    
                }
                else if($_SERVER['REQUEST_METHOD'] === 'GET'){
                    if(method_exists($this->handlers[$base_url], "get")) {
                        $this->handlers[$base_url]->get();
                    } else  {
                        echo "500: Internal Server Error";
                    }
                    
                }
                else{
                    echo "500: Internal Server Error";
                }


            }
            else{

                echo "404: Not Found";
                
            }         




        }

        function getCurrentUri(){
            $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
            $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
            if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
            // echo $uri." ";
            // $uri = '/' . trim($uri, '/');
            $uri = '/' . $uri;
            return $uri;
        }


        

    }
    



?>
