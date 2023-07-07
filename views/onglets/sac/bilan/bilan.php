<div class="container">
    <p class="mt-3">
        <h1>
            <b> Notes -</b>
            <?php
                $note_general = $note_general['note_general'] * 100;
                if($note_general < 50){
                    echo '<span class="text-danger">'.$note_general.' %</span>';
                }
                else if($note_general >= 50 && $note_general < 60){
                    echo '<span class="text-warning">'.$note_general.' %</span>';
                }
                else if($note_general >= 60 && $note_general < 100){
                    echo '<span class="text-success">'.$note_general.' %</span>';
                }
            ?>
        </h1>
    </p>

    <hr>

    <div class="row">
    <?php
        //  detecter si il y a de notes equal than mean
        if (count($notes_greater_than_mean) > 0){
            echo '<span class="mr-2 text-success mt-2"> <b> Points forts - Notes superieur à la moyenne </b> </span>';
            foreach ($notes_greater_than_mean as $greater){
                echo '<div class="col-12 mt-3">';
                    echo '<div class="d-flex flex-row">';
                        echo '<div class="card">';
                            echo '<div class="card-header text-success">';
                                echo '<span class="fw-bold">'.$greater['name'].' - '.$greater['module_id'].'</span>';
                            echo '</div>';

                            echo '<div class="card-body text-center">';
                                echo '<span class="text-success">'.$greater['note'].' / </span> <span>'.$greater['note_max'].'</span>';
                            echo '</div>';

                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

        }
        else {
            echo '<span class="mr-2 text-danger"> <b> Vous n\'avez aucun point fort </b> </span>';
        }
    ?>
    </div>


    <div class="row">
    <?php
        //  detecter si il y a de notes equal than mean
        if (count($notes_equal_to_mean) > 0){
            echo '<span class="mr-2 text-warning mt-2"> <b> Points moyens - Notes égales à la moyenne </b> </span>';
            foreach ($notes_equal_to_mean as $equal){
                echo '<div class="col-12 mt-3">';
                    echo '<div class="d-flex flex-row">';
                        echo '<div class="card">';
                            echo '<div class="card-header bg-warning">';
                                echo '<span class="fw-bold">'.$equal['name'].' - '.$equal['module_id'].'</span>';
                            echo '</div>';

                            echo '<div class="card-body text-center">';
                                echo '<span class="text-warning">'.$equal['note'].' / </span> <span>'.$equal['note_max'].'</span>';
                            echo '</div>';

                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

        }
        else {
            echo '<span class="mr-2 text-warning"> <b> Vous n\'avez aucun point moyen </b> </span>';
        }
    ?>
    </div>


    <div class="row">
    <?php
        //  detecter si il y a de notes equal than mean
        if (count($notes_less_than_mean) > 0){
            echo '<span class="mr-2 text-danger mt-2"> <b> Points faibles - Notes inferieur à la moyenne </b> </span>';
            foreach ($notes_less_than_mean as $less){
                echo '<div class="col-12 mt-3">';
                    echo '<div class="d-flex flex-row">';
                        echo '<div class="card">';
                            echo '<div class="card-header bg-danger">';
                                echo '<span class="fw-bold">'.$less['name'].' - '.$less['module_id'].'</span>';
                            echo '</div>';

                            echo '<div class="card-body text-center">';
                                echo '<span class="text-danger">'.$less['note'].' / </span> <span>'.$less['note_max'].'</span>';
                            echo '</div>';

                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

        }
        else {
            echo '<span class="mr-2 text-success"> <b> Bien joué, vous n\'avez pas de point faible </b> </span>';
        }
    ?>
    </div>


    </div>