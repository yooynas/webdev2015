        <div class="section">
            <div class="container">
                <div class="row">
                    <h2>Ma liste de cours :</h2>
                    <?php foreach ($myLesson as $r){ ?>
                    <div class="col-md-3">
                        <h3><?=$r->name_lesson?></h3><h4>Début du cour : <?=$r->begin_lesson?></h4>
                        <p><?=$r->description_lesson?></p>
                        <h5>Fin du cours : <?=$r->end_lesson?></h5>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="container">
                <div class="row">
                    <h2>Mes modules :</h2>
                    <?php foreach ($compelte as $r){ ?>
                    <div class="col-md-3">
                        <h3><?=$r->name_module?></h3>
                        <?php
                            if ($r->count_follow == 1){
                                echo "<p style='color:green;'>Module terminé</p>";
                            } elseif ($r->count_follow == 0){
                                echo "<p style='color:red;'>Module en cours</p>";
                            }
                        ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="container">
                <div class="row">
                    <h2>Les annonces :</h2>
                    <?php foreach ($annonce as $r){ ?>
                    <div class="col-md-6">
                        <p><?=$r->message_announcement?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        
        
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress progress-striped">
                            <div class="progress-bar" role="progressbar" style="width: <?=$avancement?>%;"><?=intval($avancement)?>% Complete</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>