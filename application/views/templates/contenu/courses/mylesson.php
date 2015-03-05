<div>
    <?php
        echo $heading.' : <br/>';
        foreach ($rows as $r){
            echo $r->name_lesson.$r->begin_lesson.$r->end_lesson."<br />";
            echo $r->description_lesson."<br />";
            echo "Catégorie : ".$r->name_category."<br />";
        }
        
        foreach ($fk_lesson as $r){
            echo $r->fk_lesson_courses."<br />";
        }
        
        foreach ($fk_student as $r){
            echo $r->fk_student_courses."<br />";
        }
    ?>
</div>