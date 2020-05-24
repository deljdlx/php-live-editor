<?php


class VariableToHTML
{
    private $value;
    private $name;

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }



    public function getGetMetadata()
    {
        $html = '<table class="variable-metadata">';
            $html .= '<tr><th>Type</th><td>' . gettype($this->value) . '</td></tr>';

            if($this->getType() === 'string') {
                $html .= '<tr><th>Longueur</th><td>' . mb_strlen($this->value) . '</td></tr>';
                $html .= '<tr><th>Taile</th><td>' . strlen($this->value) . '</td></tr>';
            }
            else if($this->getType() === 'object') {
                $html .= '<tr><th>Class</th><td>' . get_class($this->value) . '</td></tr>';
            }



        $html .= '</table>';

        return $html;

    }


    public function getType()
    {
        return gettype($this->value);
    }



    public function getHTML()
    {
        ob_start();
        var_dump($this->value);
        $dump = ob_get_clean();
    
        $representation = $this->getValueRepresentation($this->value);
        
    
        $html = '<table class="variable-descriptor ' . gettype($this->value) .'">';
            $html .= '<col width="150px">';
            $html .= '<col width="auto">';
            $html .= '<thead><tr><th colspan="2"><h2 class="variable-name">$' . $this->name . '</h2></th></thead>';
            $html .= '<tr>';
                $html .= '<th>';
                    $html .= $this->getGetMetadata();
                $html .= '</th>';
                $html .= '<td class="value">' . $representation . '</td>';
            $html .= '</tr>';
        $html .= '</table>';
    
        return $html;
    }

    public function renderArray($value)
    {
        $html = '<table class="variable-type__array">';
            $html .= '<col width="100px">';
            $html .= '<col width="auto">';
            $html .= '<thead>
                    <th>Index</th><th>Value</th>
                </thead>
            ';
            foreach($value as $index => $value) {
                $html .= '<tr>';
                    $html .= '<th class="index">' . $index . '</th>';
                    $html .= '<td class="value">' . $this->getValueRepresentation($value) . '</td>';
                    
                $html .= '</tr>';
            }

        $html .= '</table>';
        return $html;
    }




    public function renderObject($value)
    {
        $reflector = new ReflectionObject($value);

        $html = '<table class="variable-type__object">';
            $html .= '<col width="150px">';
            $html .= '<col width="auto">';
            $html .= '<thead>
                    <th>Property</th><th>Attribute</th>
                </thead>
            ';

        foreach($reflector->getProperties() as $property) {
            $property->setAccessible(true);

            $class = '';
            if($property->isPrivate()) {
                $class = 'property-private';
            }
            else if($property->isProtected()) {
                $class = 'property-protected';
            }
            else {
                $class = 'property-public';
            }

            $html .= '<tr class="property '.$class.'">';
                $html .= '<th class="index">' . $property->name . '</th>';
                $html .= '<td class="value">' . $this->getValueRepresentation($property->getValue($this->value)) . '</td>';
            $html .= '</tr>';
        }

        $html .= '</table>';
        return $html;

    }


    public function getValueRepresentation($value)
    {
        if(is_scalar($value)) {
            $representation = '<pre><code>'.htmlentities(var_export($value, true)).'</code></pre>';
        }
        else {
            if(is_array($value)) {
                $representation = $this->renderArray($value);

            }
            else if(is_object($value)) {
                $representation = $this->renderObject($value);
            }
            else {
                $representation = htmlentities(var_export($value, true));
            }
        }

        return $representation;

    }
}
