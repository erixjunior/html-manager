<?php
namespace Tableman;

class TableFoot
{
    public function  __construct() {
        $this->begins = "\t<tfoot>\n";
        $this->tr = new Tr;
        $this->end = "\n\t</tfoot>";
    }

    function getData()
    {
        return  $this->begins.
                $this->tr->th().
                $this->end;
    }
};

?>