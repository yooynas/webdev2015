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
            
        foreach ($compelte as $r){
            echo "<h4>".$r->name_module."</h4>";
            if ($r->count_follow == 1){
                echo "module terminé";
            } elseif ($r->count_follow == 0){
                echo "module en cour";
            }
        }
    ?>
</div>

    <div class="col-lg-12">
        <div class="avancement">
            <h4>Avancement</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-success" aria-valuenow="5"aria-valuemin="0" aria-valuemax="100" style="width:<?=$avancement?>%">
                <?=intval($avancement)?> complété</div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-12">
        
    </div>
