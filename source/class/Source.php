<?php


class Source
{

    private $content = '';
    private $variables = null;

    public function __construct($content = '')
    {
        $this->content = $content;
    }
    

    public function parseVariables()
    {

        $existingVariables = get_defined_vars();
        $existingVariables['existingVariables'] = null;

        $code = str_replace('<?php', '', $this->content);
        eval($code);
        unset($code);

        $variables = get_defined_vars();

        $data = [];
        foreach ($variables as $name => $value) {
            if (!array_key_exists($name, $existingVariables)) {

                $display = new VariableToHTML($name, $value);

                $data[$name] =  [
                    'type' => gettype($value),
                    'name' => $name,
                    'array' => $value,
                    'html' => $display->getHTML()
                ];
            }
        }
        return $data;
    }


    public function getVariables()
    {
        if($this->variables === null) {
            $this->variables = $this->parseVariables();
        }

        return $this->variables;
    }
}