<?php
  class htmlTags {

    static public function horizontalRule() {
      return '<hr>';
    }

    static public function headingOne($text) {
      return '<h1>' . $text . '</h1>';
    }

    static public function htmlOpenElements($html) {
         $html .= '<html>';
         $html .= '<link rel="stylesheet" href="styles.css">';
         $html .= '<body>';
         return $html;
    }

    static public function htmlEndElements($html) {
         $html .= '</body></html>';
         return $html;
    }

    static public function htmlTableOpenElements($htmlTable) {
         $htmlTable .= '<table border =' ."1" .'>';
         return $htmlTable;
    }

    static public function htmlTableEndElements($htmlTable) {
         $htmlTable .= '</table>';
         return $htmlTable;
    }

    static public function htmlTableRowOpen($htmlTableRow) {
         $htmlTableRow .= '<tr>';
         return $htmlTableRow;
    }

    static public function htmlTableRowEnd($htmlTableRow) {
         $htmlTableRow .= '</tr>';
         return $htmlTableRow;
    }

    static public function htmlTableValues($htmlTable, $values) {
         $htmlTable .= "<td>" .$values ."</td>";
         return $htmlTable;
    }
}