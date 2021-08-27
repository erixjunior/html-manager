<?php
namespace Tableman;

class Th
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
                if(is_array($val))
                {
                    $_span = '';
                    $_cval = '';

                    foreach( $val as $_key => $_val )
                    {
                        if( is_numeric( $_key ) )
                            $_cval = "{$_val}</th>";
                        else
                            $_span = "\t<th {$_key}=\"$_val\">";
                        
                    }

                    array_push( $tmp_value, $_span.$_cval );
                    
                }
                else
                    array_push( $tmp_value, "\t<th>{$val}</th>");
            }
            $this->begins = '';
            $this->value = implode( "\n", $tmp_value );
            $this->end = '';
        }
        else
        {
            $this->begins = "\t<th>\n";
            $this->value = "\n\t\t". $data;
            $this->end = "\n\t</th>";
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