<?php

//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//Class to load classes it finds the file when the progrm starts to fail for calling a missing class
class Manage {
    
	public static function autoload($class) {
        //you can put any file name or directory here
        include $class . '.php';
    }
}

spl_autoload_register(array('Manage', 'autoload'));

//instantiate the program object
$obj = new main();


class main {

    public function __construct()
    {
        //print_r($_REQUEST);
        //set default page request when no parameters are in URL
        $pageRequest = 'Homepage';
		
        //check if there are parameters
        if(isset($_REQUEST['Page'])) 
		{
            //load the type of page the request wants into page request
            $pageRequest = $_REQUEST['Page'];
        }
		
        //instantiate the class that is being requested
         $page = new $pageRequest;


        if($_SERVER['REQUEST_METHOD'] == 'GET') 
		{
            $page->get();
        } 
		
		else 
		{
            $page->post();
        }
    }
}

abstract class Page {
    protected $html;

    public function __construct()
    {
        $this->html .= '<html>';
        $this->html .= '<link rel="stylesheet" href="styles.css">';
        $this->html .= '<body>';
    }
    public function __destruct()
    {
        $this->html .= '</body></html>';
        stringFunctions::printThis($this->html);
    }

    public function get() {
        stringFunctions::printThis('default get message');
    }

    public function post() {
        print_r($_POST);
    }
}

class Homepage extends Page {

    public function get() {

        $form = '<form action="index.php"  method="post" enctype="multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
        $form .= '<input type="submit" value="Upload" name="submit">';
        $form .= '</form> ';
        $this->html .= '<h1>Upload Form</h1>';
        $this->html .= $form;
    }
	
	public function post() {
        //echo 'test';
       // print_r($_FILES);
	   
	   //NAME OF THE DIRECTORY WHERE THE FILES SHOULD BE STORED
		 $targetDir = './uploads/';   
		 $targetFile = $targetDir.$_FILES['fileToUpload']['name'];
		 
		 // SAVE THE CSV FILE IN THE SERVER
		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
            //ROUTE THE PAGE TO DISPLAY THE CSV CONTENTS
            header('Location: index.php?Page=htmlTable&file=' .$targetFile);
        }
		else 
		{
            stringFunctions::printThis('File Upload Failed');
		}
    }
}

?>