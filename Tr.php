<?php
namespace Tableman;

class Tr
{
    public function  __construct() {

        $this->begins = '';
        $this->th = new Th;
        $this->td = new Td;
        $this->end = '';
        $this->value = '';
    }

    function setArrayTh( $data )
    {
        
        foreach( $data as $key => $val )
        {
            $this->value .= "<tr>"; 

            if( is_array( $val ) )
            {  
                $this->th->setData( $val );
                $this->value .= $this->th->value;
            }

            $this->value .= "</tr>";
        }
    }

    function th()
    { 
        if( empty($this->value) )
        {
            if(!empty($this->th->getData()))
            {
                $this->begins = "\t<tr>\n";
                $this->end = "\n\t</tr>";
            }

            return  $this->begins.
                    $this->th->getData().
                    $this->end;
        }
        else
        {
            return $this->value;
        }
        
    }

    function td()
    {
        if( empty($this->value) )
        {
            if(!empty($this->td->getData()))
            {
                $this->begins = "\t<tr>\n";
                $this->end = "\n\t</tr>";
            }

            return  $this->begins.
                    $this->td->getData().
                    $this->end;
        }
        else
        {
            return $this->value;
        }
    }
};

?>