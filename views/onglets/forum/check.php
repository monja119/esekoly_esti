<div class="justify-content-center">
        <h3> <?= $forum['titre'] ?> </h3>
        <div class="row">
            <div class="col-1">
                <img src="/<?= $forum['donnees'] ?>" alt="pdp" class="pdp img rounded-circle w-100 h-75 mt-1">
            </div>
            <div class="col-9">
                <p class="fw-medium">
                    <b> <?= $forum['first_name'] ?> - <?= $forum['last_name'] ?> </b><br />
                    <span class="small"> <?= $forum['level'] ?> - <?= $forum['parcours'] ?> </span>
                </p>
            </div>
        </div>
        <div class="row">
            <span class="small">
                <?= $forum['views'] ?> <i class="fa fa-eye"> </i> - <?= $forum['comment'] ?> <i class="fa fa-comment"> </i>
            </span>
        </div>

        <div class="row">
            <p>
                <span class="small"><i> <?= $forum['date'] ?> - <?= $forum['time'] ?> </i></span>
            </p>
        </div>
</div>

<p class="dark">
    <?= $forum['text'] ?>
</p>

<!-- reponse -->
<div class="container">
<?php
    foreach ($answers as $answer){
?>
        <div class="row border-bottom">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <b><?= $answer['email'] ?></b>
                        <p class="small"><i class="fa fa-clock-o"></i> <?= $answer['date'].' '.$answer['time'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <p><?= $answer['answer'] ?></p>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>

</div>
<div class="row mt-3 justify-content-center">
    <div class="card col-12">
        <form action="/forum/answer/?id=<?= $forum['fr_id'] ?>" method="POST">

            <div class="card-header bg-white">
                <h5 class="card-title">Repondre ...</h5>
            </div>
            <div class="card-body" >

                <div class="form-group mt-2">
                    <textarea name="answer" id="textarea-forum" class="form-control "></textarea>
                </div>

            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-success w-100" value="Répondre"/>
            </div>
        </form>
    </div>
</div>
