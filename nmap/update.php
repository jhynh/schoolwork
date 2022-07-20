<?php include_once 'initialize.php';
//sql ddl dql dml dcl and tcl commands

//(ddl)we need a function that creates the tmp database for compareison
function createTableTmp():bool{
    $query = "create table ";
}
//(dml)we need a function that writes the new database

//we'll want a function that's able to replace the affected rows
//function to add to your function definitions. 
function print_processed_html($string)
{ 
    $search  = Array("--", "*", "\*", "^", "\^");
    $replace = Array("<\hr>", "<b>", "<\b>", "<sup>", "<\sup>");

    $processed_string = str_replace($search, $replace , $string);

    echo $processed_string;
 }


// outputing the string to the page.
    $the_content = get_the_content();
    print_processed_html($the_content);

