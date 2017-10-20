<?php

class htmlTable extends page
{

    public function get()
    {
        //READ THE CSV FILE FROM THE SERVER AND DISPLAY IN HTML TAGS
        $file = $_GET['file'];
        $this->html .= '<table border = "1">';

        if (($file_handle = fopen($file, "r")) !== false) {

            while (($data = fgetcsv($file_handle)) !== false) {

                $this->html .= '<tr>';

                foreach ($data as $value) {
                    $this->html .= "<td>$value</td>";
                }

                $this->html .= '</tr>';
            }

            //CLOSE THE CSV FILE
            fclose($file_handle);
            htmlTags::htmlTableEndElements($this->html);
            stringFunctions::printThis($this->html);
        }
    }
}
