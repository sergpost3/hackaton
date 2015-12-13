<div class="row">

    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content white-text">
                <div class="row">
                    <div class="col s12">
                        <h2 class="center red-text text-darken-2"><?= $model["name"]; ?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6 text-center">
                        <img src="<?= $model["image"]; ?>" alt="" class="preview">
                    </div>
                    <div class="col s12 m6 l6">
                        <p class="red-text text-darken-2"><?= $model["full_desc"]; ?></p>

                        <p class="red-text text-darken-2">
                            <strong>Организатор:</strong> <a href="/users/<?= $org["link"]; ?>"><?= $org["name"]; ?></a>
                        </p>

                        <?php if ($participients) : ?>
                            <p class="red-text text-darken-2">
                                <strong>Участники:</strong>
                                <?php $total = count($participients);
                                $counter = 0; ?>
                                <?php foreach ($participients as $us) : ?>
                                    <?php $counter++; ?>
                                    <a
                                    href="/users/<?= $us["link"]; ?>"><?= $us["name"]; ?></a><?php if ($counter != $total) : ?>, <?php endif; ?>
                                <?php endforeach; ?>
                            </p>
                            <br>
                        <?php endif; ?>


                        <ul class="collapsible" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header red-text text-darken-2">
                                    <strond>We need</strond>
                                </div>
                                <div class="collapsible-body">
                                    <ul class="red-text text-darken-2 margin-fix-collapse">
                                        <li>jskdfd</li>
                                        <li>sgf</li>
                                        <li>sfgdfgfds</li>
                                    </ul>
                                </div>

                            </li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="card-action">
                <form action="" method="">
                    <button name="go" class="waves-effect green btn">Я пойду</button>
                    <button name="not_go" class="waves-effect red btn">Я не пойду</button>
                    <button name="maybe_go" class="waves-effect grew btn">Возможно пойду</button>
                </form>
            </div>
        </div>
    </div>


</div>