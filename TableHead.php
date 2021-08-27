<?php
namespace Tableman;

class TableHead
{
    public function  __construct() {
        $this->begins = "\t<thead>\n";
        $this->tr = new Tr;
        $this->end = "\n\t</thead>";
    }

    function getData()
    {
        return  $this->begins.
                $this->tr->th().
                $this->end;
    }
};

?>