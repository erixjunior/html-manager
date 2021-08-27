<?php
namespace Tableman;

class Td
{
    public function  __construct() {
        $this->begins = '';
        $this->value = '';
        $this->end = '';
    }

    function setData( $data )
    {
        if(is_array($data))
        {
            $tmp_value = [];
            foreach( $data as $key => $val )
            {
                array_push( $tmp_value, "\t<td>{$val}</td>");
            }
            $this->begins = '';
            $this->value = implode( "\n", $tmp_value );
            $this->end = '';
        }
        else
        {
            $this->begins = "\t<td>\n";
            $this->value = "\n\t\t". $data;
            $this->end = "\n\t</td>";
        }
    }

    function getData()
    {
        return  $this->begins.
                $this->value.
                $this->end;
    }

};

?>