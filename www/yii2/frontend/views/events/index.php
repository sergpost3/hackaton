<div class="row">
    <div class="col s12">
        <h1 class="header center red-text accent-2">События</h1>
    </div>
</div>

<div class="row">
    <form action="" method="post">
        <div class="col s12 m9 l9">
            <div class="input-field">
                <input id="search" name="search" type="text">
                <label for="search">Поиск событий</label>
            </div>
        </div>
        <div class="col s12 m3 l3 fix-btn">
            <button class="waves-effect red btn">Искать</button>
        </div>
    </form>
</div>

<div class="row">

    <?php foreach($model as $key=>$event) : ?>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <a href="/events/<?= $event["link"]; ?>">
                    <img src="<?= $event["image"]; ?>">
                </a>
                <span class="card-title"><a href="/events/<?= $event["link"]; ?>" class="red-text accent-2"><?= $event["name"]; ?></a></span>
            </div>
            <div class="card-content">
                <p><?= $event["desc"]; ?></p>
            </div>
            <div class="card-action">
                <span>Создатель: </span>
                <a href="/users/<?= $users[$key]["link"]; ?>" class="red-text accent-2">
                    <strong><?= $users[$key]["name"]; ?></strong>
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>