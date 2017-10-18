<?php

class htmlTable extends page
{

    public function get()
    {
        $file = $_GET['file'];

        $this->html .= '<table border = "1">';

        if (($file_handle = fopen($file, "r")) !== false) {

            while (($data = fgetcsv($file_handle)) !== false) {
                $this->html .= '<tr>';
                foreach ($data as $value) {
                    $this->html .= "<td>$value</td>";
               }
                $this->html.= '</tr>';
            }
            fclose($file_handle);
            $this->html .= '</table>';
            stringFunctions::printThis($this->html);
        }
    }
}
