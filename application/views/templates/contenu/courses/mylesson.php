<div>
    <?php
    
        foreach ($user as $r){
            echo "Salut : ".$r->email_student;
        }
        
        echo "<h2>".$heading.' : </h2>';
        
        foreach ($myLesson as $r){
            echo "<h3>".$r->name_lesson."</h3><p>Début du cour : ".$r->begin_lesson."</p>";
            echo "<p>Intitulé : ".$r->description_lesson."</p>";
            echo "<p>Fin du cour : ".$r->end_lesson."</p>";
          }

    ?>
</div>