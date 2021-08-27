<?php
namespace Htmlman;

class HtmlFoot {
    const EOF_LINE = "\n";
    public function  __construct() {
        $this->begins = "\t<foot>";
        $this->value = '';
        $this->end = "\n\t</foot>";
    }

    public function addDataArray(array $data, string $sc_html )
    {
        $tmp_value = [];
        foreach( $data as $key => $val )
        {
            array_push( $tmp_value, sprintf( "\t\t".$sc_html, $val ));
        }
        $this->value .= implode( "\n", $tmp_value );
        $this->value .= self::EOF_LINE;
    }

    function getData()
    {
        return  $this->begins.self::EOF_LINE.
                $this->value.self::EOF_LINE.
                $this->end.self::EOF_LINE;
    }
}

?>