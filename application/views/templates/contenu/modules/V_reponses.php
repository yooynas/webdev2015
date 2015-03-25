<body>
<?php

    echo "voilà tes réponses";
    
    foreach($questions as $question) {
    
        echo "<label>".$question[0]['label_question']."</label>";
        echo '<br>';

        foreach($choices as $choice) {

            if ($question[0]['id_question'] == $choice['fk_questions_choice']) {
                echo $choice['label_choice'];
                echo '<br>';

            }

        }
        echo '<br>';   
    }


?>