<?php
namespace Htmlman;

class Html {
    const EOF_LINE = "\n";

    public function  __construct( $lang = 'en' ) {
        $this->begins = "<!DOCTYPE html>\n<html lang=\"$lang\">";
        $this->head = new HtmlHead;
        $this->body = new HtmlBody;
        $this->foot = new HtmlFoot;
        $this->end = "\n</html>";
    }

    public function getData() {

        $html  = $this->begins. self::EOF_LINE
                . $this->head->getData() . self::EOF_LINE
                . $this->body->getData() . self::EOF_LINE
                . $this->foot->getData() . self::EOF_LINE
                . $this->end . self::EOF_LINE;
        return $html;
    }

}

?>