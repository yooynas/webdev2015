<div>
    <?php
        echo $heading.' : <br/>';
        foreach ($rows as $r){
            echo $r->name_lesson.$r->begin_lesson.$r->end_lesson."<br />";
            echo $r->description_lesson."<br />";
            echo "Catégorie : ".$r->name_category;
        }
        
        foreach ($pseudo as $r){
            echo $r->nickname_student."<br />";
        }
    ?>
</div><p>k</p>