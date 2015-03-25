<div class="col-lg-12">
        <div class="avancement">
            <h4>Avancement</h4>
            <div class="progress">
                <div class="progress-bar progress-bar-success" aria-valuenow="5"aria-valuemin="0" aria-valuemax="100" style="width:<?=$avancement?>%">
                <?=intval($avancement)?> % complété</div>
            </div>
        </div>
    </div>

    <?php
    
        foreach ($user as $r){
            echo "Salut : ".$r->email_student;
        }
        
        //echo "<h2>".$heading.' : </h2>';
        
        echo "<div class='col-lg-12'><h2>Ma liste de cours :</h2>";
        
        foreach ($myLesson as $r){ ?>
            <div class ="col-lg-2 borderCourses">
                <h4><?=$r->name_lesson?></h4><p>Début du cour : <?=$r->begin_lesson?></p>
                <p>Intitulé : <?=$r->description_lesson?></p>
                <p>Fin du cour : <?=$r->end_lesson?></p>
            </div>
            <div class="col-lg-1"></div>
        <?php  }
        
        echo "<i class='fa fa-arrow-right fa-2x pull-right arrowToModif'></i></div><div class='col-lg-12'><h3>Mes modules :</h3>";
        foreach ($compelte as $r){ ?>
            
            <div class='col-lg-2 borderCourses' id="divModule">
            <h4><?=$r->name_module?></h4>
            <?php
                if ($r->count_follow == 1){
                    echo "<p style='color:green;'>Module terminé</p>";
                } elseif ($r->count_follow == 0){
                    echo "<p style='color:red;'>Module en cours</p>";
                }
            ?></div><div class="col-lg-1"></div>
            
        <?php } ?>
            <i class='fa fa-arrow-right fa-2x pull-right arrowToModif'></i>
        
    
    <?php
        echo "</div><h3>Les annonces :</h3>";
        foreach($annonce as $r){ ?>
            <div class='col-lg-5 borderCourses' id="divModule">
                <p><?=$r->message_announcement?></p>
            </div><div class="col-lg-1"></div>
        <?php } ?>
        <i class='fa fa-arrow-right fa-2x pull-right arrowToModif'></i>
    
    
</div>