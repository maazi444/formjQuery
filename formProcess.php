<?php
    $name = $_POST['namevar'];
    $age = $_POST['agevar'];
    if($name == "")
    {
        echo "1-Name cannot be empty";
    }
    else if($age == "")
    {
        echo "2-Age cannot be empty";
    }
    else{
        echo "3-$name^4-$age";
    }
?>