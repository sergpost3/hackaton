<div class="row">
    <div class="col s12">
        <h1 class="header center red-text accent-2">Послуги</h1>
    </div>
</div>

<div class="row">
    <form action="">
        <div class="col s12 m9 l9">
            <div class="input-field">
                <input id="" type="text">
                <label for="">Шукати послугу</label>
            </div>
        </div>
        <div class="col s12 m3 l3 fix-btn">
            <button class="waves-effect red btn">Пошук</button>
        </div>
    </form>
</div>

<div class="row">

    <?php foreach($model as $key=>$item) : ?>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <a href="/services/<?= $item["link"]; ?>">
                    <img src="<?= $item["image"]; ?>">
                </a>
                <span class="card-title"><a href="/services/<?= $item["link"]; ?>" class="red-text accent-2"><?= $item["name"]; ?></a></span>
            </div>
            <div class="card-content">
                <p><?= $item["desc"]; ?></p>
            </div>
            <div class="card-action">
                <span>Користувач: </span>
                <a href="/users/<?= $users[$key]["link"]; ?>" class="red-text accent-2">
                    <strong><?= $users[$key]["name"]; ?></strong>
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>