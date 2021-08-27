<?php
namespace Tableman;

class TableBody
{
    public function  __construct() {
        $this->begins = "\t<tbody>\n";
        $this->tr = new Tr;
        $this->end = "\n\t</tbody>";
    }

    function getData()
    {
        return  $this->begins.
                $this->tr->td().
                $this->end;
    }
};

?>