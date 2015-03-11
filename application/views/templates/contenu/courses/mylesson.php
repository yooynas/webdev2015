<div>
    <?php
        echo $heading.' : <br/>';
        /*
        foreach ($fk_lesson as $r){
            echo $r->fk_lesson_courses."<br />";
        }
        */
        foreach ($fk_lesson as $r){
            echo $r->fk_lesson_courses."<br />";
        }   //var_dump($fk_lesson);
        
        /*
        foreach ($student as $r){
            echo $r->email_student."<br />";
            echo $r->nickname_student."<br />";
        }
        */
        var_dump($myLesson);
        
    ?>
</div>