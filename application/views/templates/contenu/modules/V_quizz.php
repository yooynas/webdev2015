<?php

echo "<h1>Liste des questions pour votre module</h1>";

$url = '';

foreach($questions as $question) {

    $url = $url.$question['id_question'].'-';
}

echo form_open('quizz/quizz_verif/'.$url);

$num = 1;

foreach($questions as $question) {
    
    echo "<label>".$question['label_question']."</label>";
    echo '<br>';
    
    foreach($choices as $choice) {
        
        if ($question['id_question'] == $choice['fk_questions_choice']) {
            echo form_radio('reponse'.$num, $choice['label_choice'], FALSE);
            echo $choice['label_choice'];
            echo '<br>';
        
        }
    
    }
    $num++;
    echo '<br>';   
}

echo form_submit('submit', 'Vérifie tes réponses');

echo form_close();


?>