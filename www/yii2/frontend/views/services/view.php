<div class="row">
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content white-text">
                <div class="row">
                    <h2 class="center red-text text-darken-2"><?= $model["name"]; ?></h2>
                </div>
                <div class="row">
                    <div class="col s12 m4 l4 text-center">
                        <img src="<?= $model["image"]; ?>" alt="" class="preview">
                    </div>
                    <div class="col s12 m8 l8">
                        <p class="red-text text-darken-2"><?= $model["full_desc"]; ?></p>

                        <p class="red-text text-darken-2">
                            <b>Ціна: <?= $model["price"]; ?> грн/год</b></p>

                        <p class="red-text text-darken-2">
                            <b>Користувач:</b> <a href="/users/<?= $org["link"]; ?>"><?= $org["name"]; ?></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <button class="waves-effect green btn">Замовити</button>
            </div>
        </div>
    </div>
</div>