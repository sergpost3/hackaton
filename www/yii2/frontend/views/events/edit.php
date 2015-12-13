<div class="row">
    <div class="col s12">
        <h1 class="header center red-text accent-2">Редактировать событие</h1>
    </div>
</div>

<div class="row">
    <div class="col s12 m8 l8">
        <form class="margin-bottom" action="" method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <input type="hidden" name="geo_x" value="" required="required" />
            <input type="hidden" name="geo_y" value="" required="required" />
            <input type="hidden" name="geo_google_maps_link" value="" required="required" />
            <input type="hidden" name="geo_zoom" value="" required="required" />
            <input type="hidden" name="id" value="<?= $model["id"]; ?>" required="required" />
            <div class="row">
                <div class="input-field">
                    <input id="name" name="name" type="text" value="<?= $model["name"]; ?>" class="validate">
                    <label for="name">Ім'я</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field">
                    <input id="geo_name" name="geo_name" type="text" value="<?= $model["geo_name"]; ?>" class="validate">
                    <label for="geo_name">Назва мітки на карті</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field">
                    <input id="desc" name="desc" type="text" value="<?= $model["desc"]; ?>" class="validate">
                    <label for="desc">Опис події</label>
                </div>
            </div>

            <div class="row">
                <?php $date = explode(" ", $model["datetime"]); ?>
                <div classs="col s12 m6 l6">
                    <div class="input-field">
                        <input id="date" name="date" type="date" value="<?= $date[0]; ?>" class="validate">
                        <label for="date">Дата</label>
                    </div>
                </div>
                <div classs="col s12 m6 l6">
                    <div class="input-field">
                        <input id="time" name="time" type="time" value="<?= $date[1]; ?>" class="validate">
                        <label for="time">Час</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-field">
                    <textarea id="full_desc" name="full_desc" class="validate"><?= $model["full_desc"]; ?></textarea>
                    <label for="full_desc">Повний опис</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field">
                    <input id="max_people_count" name="max_people_count" type="text" value="<?= $model["max_people_count"]; ?>" class="validate">
                    <label for="max_people_count">Максимальна кількість учасників</label>
                </div>
            </div>

            <div class="row">
                <label>Оберіть тип події</label>
                <select class="browser-default" name="type">
                    <option value="0"<?php if($model["type"]=='0') echo 'selected'; ?>>Вечірка</option>
                    <option value="1"<?php if($model["type"]=='1') echo 'selected'; ?>>Масові гуляння</option>
                </select>
            </div>

            <div class="row">
                <label for="image">Оберіть зображення для події</label>
                <input id="image" class="form-control" type="file" name="image" required="required" />
            </div>

            <div class="row">
                <p>
                    <input type="checkbox" id="checkBox1" name="private" <?php if($model["private"]=='1') echo "checked"; ?>/>
                    <label for="checkBox1">Приватна подія</label>
                </p>
                <button class="waves-effect red btn">Зберегти</button>
            </div>
        </form>
    </div>

    <div class="col s12 m4 l4">
        <img class="width-100" src="img/sample.svg" alt="">
    </div>

</div>