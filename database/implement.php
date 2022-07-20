<?php
interface AbstractClasses{
    public function validate($i):bool;
    public function getHTMLInput(string $name, string $val=""):string;
    public function formatData($d);
    public function displayData($d);
    public function getQuery();
}

//php is not a compiled language, so 'Separate class declaration from it's implementation in PHP' is not possible
//PHP doesn't have a compile phase and linker phase

class TextType implements AbstractClasses{
//-----------------class_members-----------------------
    protected $name;
    protected $val;
    protected $maxlen=65535;
//-----------------------------------------------------
    public function __construct($n){
        $this->name = $n;
    }

    //converts the html input and returns an input tag
    public function getHTMLInput($name, $val=""):string{
        $name = htmlspecialchars($name);
        $val = htmlspecialchars($val);
        return "<input type=\"text\" name=\"$this->name\" value=\"$this->val\">\n";
    }

    //returns a sql command
    public function getQuery(){
        return "ALTER TABLE 'students' ADD '$name' VARCHAR(255) NOT NULL DEFAULT '';";
    }
    //but how will this be use?
    //method 1: we can place it into a query
}

class EnumType implements AbstractClasses{
    protected array $ENUM;
    private string $name;
    public function __construct($n){
        $this->name = $n;
    }
    public function validate($i):bool{
        return in_array($i, $this->ENUM);
    }
    public function getHTMLInput($name, $val=""):string{
        $name=htmlspecialchars($name);
        $val=htmlspecialchars($val);
        $html = "<select name=\"$name\">\n<option></option>\n";

    }
}

?>