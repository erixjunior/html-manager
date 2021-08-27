<?php
namespace Htmlman;

class HtmlBody {
    const EOF_LINE = "\n";
    public function  __construct() {
        $this->begins = "\t<body>";
        $this->value = '';
        $this->end = "\n\t</body>";
    }

    public function addDataArray(array $data, string $sc_html )
    {
        $tmp_value = [];
        foreach( $data as $key => $val )
        {
            array_push( $tmp_value, sprintf( $sc_html, $val ));
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