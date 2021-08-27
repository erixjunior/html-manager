<?php
namespace Tableman;

class Table {
    const EOF_LINE = "\n";

    public function  __construct( $class = null, $id = null ) {
        $this->begins = "\t<table class=\"{$class}\" id=\"{$id}\">\n";
        $this->thead = new TableHead;
        $this->tbody = new TableBody;
        $this->tfoot = new TableFoot;
        $this->end = "\n\t</table>";
    }

    public function getData() {

        $table  = $this->begins. self::EOF_LINE
                . $this->thead->getData() . self::EOF_LINE
                . $this->tbody->getData() . self::EOF_LINE
                . $this->tfoot->getData() . self::EOF_LINE
                . $this->end . self::EOF_LINE;
        return $table;
    }

}

?>