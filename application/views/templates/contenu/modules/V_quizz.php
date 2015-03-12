<?php

echo "<h1>Liste des questions pour votre module</h1>";

var_dump($questions);

//echo "<form action=''>";

foreach($questions as $question) {
    
    echo "
        <h2>".$question['label_question']."</h2>
        
    ";
    
    foreach($choices as $choice) {
        
        
    
    }

}


?>