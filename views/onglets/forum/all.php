<?php
    foreach ($forums as $forum) {
?>
<a href="/forum/check/?id=<?= $forum['fr_id'] ?>">
    <div class="row pt-1 cursor-pointer container-forum border-bottom">
        <div class="col-4">
            <div class="row">
                <div class="col-3">
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
                <p>
                    <span class="small"><i> <?= $forum['date'] ?> - <?= $forum['time'] ?> </i></span>
                </p>
            </div>
        </div>
        <div class="col-7 d-flex flex-row align-items-center justify-content-center">
            <h5> <?= $forum['titre'] ?> </h5>
        </div>
        <div class="col-1 d-flex flex-column justify-content-center">
            <p> <b> <?= $forum['views'] ?> </b> <i class="fa fa-eye"></i>
            <br />
            <b> <?= $forum['comment'] ?>  </b> <i class="fa fa-comment"> </i> </p>
        </div>
    </div>
</a>
<?php } ?>