<?php
namespace Htmlman;

class HtmlHead {
    const EOF_LINE = "\n";
    public function  __construct() {
        $this->begins = "\t<head>";
        $this->value = '';
        $this->end = "\n\t</head>";
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

    public function setTitle(string $title)
    {
        return $this->addDataArray( [$title], "<title>%s</title>" );
    }

    public function addMetaArray(array $data)
    {
        return $this->addDataArray( $data, "<meta %s />" );
    }

    public function addCssArray(array $data)
    {
        return $this->addDataArray( $data, "<link href= \"%s\"  rel=\"stylesheet\" />" );
    }

    public function addScriptArray(array $data)
    {
        return $this->addDataArray( $data, "<script src= \"%s\"></script>" );
    }

    function getData()
    {
        return  $this->begins.self::EOF_LINE.
                $this->value.self::EOF_LINE.
                $this->end.self::EOF_LINE;
    }

}

?>