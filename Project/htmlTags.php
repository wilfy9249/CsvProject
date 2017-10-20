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
  }