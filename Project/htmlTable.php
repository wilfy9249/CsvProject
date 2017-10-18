<?php

class htmlTable extends page{

    public function get()
    {
        $fileName = $_GET['filename'];
        $file = $_GET['file'];
        echo $fileName;
    }

}
