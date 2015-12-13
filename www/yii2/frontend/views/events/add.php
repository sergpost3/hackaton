<div class="row">
    <div class="col s12">
        <h1 class="header center red-text accent-2">Ð¡Ð¾Ð·Ð´Ð°Ñ‚ÑŒ Ñ�Ð¾Ð±Ñ‹Ñ‚Ð¸Ðµ</h1>
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
            <div class="row">
                <div class="input-field">
                    <input id="name" name="name" type="text" class="validate" required="required">
                    <label for="name">Ð˜Ð¼Ñ�</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field">
                    <input id="geo_name" name="geo_name" type="text" class="validate" required="required">
                    <label for="geo_name">Ð˜Ð¼Ñ� Ð¼ÐµÑ‚ÐºÐ¸ Ð½Ð° ÐºÐ°Ñ€Ñ‚Ðµ</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field">
                    <input id="desc" name="desc" type="text" class="validate" required="required">
                    <label for="desc">ÐžÐ¿Ð¸Ñ�Ð°Ð½Ð¸Ðµ Ñ�Ð¾Ð±Ñ‹Ñ‚Ð¸Ñ�</label>
                </div>
            </div>

            <div class="row">
                <div classs="col s12 m6 l6">
                    <div class="input-field">
                        <input id="date" name="date" type="date" class="validate" required="required">
                        <label for="date">Ð”Ð°Ñ‚Ð°</label>
                    </div>
                </div>
                <div classs="col s12 m6 l6">
                    <div class="input-field">
                        <input id="time" name="time" type="time" class="validate" required="required">
                        <label for="time">Ð’Ñ€ÐµÐ¼Ñ�</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-field">
                    <textarea id="full_desc" name="full_desc" class="validate" required="required"></textarea>
                    <label for="full_desc">ÐŸÐ¾Ð»Ð½Ð¾Ðµ Ð¾Ð¿Ð¸Ñ�Ð°Ð½Ð¸Ðµ</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field">
                    <input id="max_people_count" name="max_people_count" type="text" class="validate" required="required">
                    <label for="max_people_count">ÐœÐ°ÐºÑ�Ð¸Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ ÐºÐ¾Ð»Ð¸Ñ‡ÐµÑ�Ñ‚Ð²Ð¾ ÑƒÑ‡Ð°Ñ�Ñ‚Ð½Ð¸ÐºÐ¾Ð²</label>
                </div>
            </div>

            <div class="row">
                <label>Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ Ñ‚Ð¸Ð¿ Ñ�Ð¾Ð±Ñ‹Ñ‚Ð¸Ñ�</label>
                <select class="browser-default" name="type" required="required">
                    <option value="0">Ð’ÐµÑ‡ÐµÑ€Ð¸Ð½ÐºÐ°</option>
                    <option value="1">ÐœÐ°Ñ�Ñ�Ð¾Ð²Ñ‹Ðµ Ð³ÑƒÐ»Ñ�Ð½Ð¸Ñ�</option>
                </select>
            </div>

            <div class="row">
                <label for="image">Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ Ð¸Ð·Ð¾Ð±Ñ€Ð°Ð¶ÐµÐ½Ð¸Ðµ Ð´Ð»Ñ� Ñ�Ð¾Ð±Ñ‹Ñ‚Ð¸Ñ�</label>
                <input id="image" class="form-control" type="file" name="image" required="required" />
            </div>

            <div class="row">
                <p>
                    <input type="checkbox" id="checkBox1" name="private" />
                    <label for="checkBox1">Ð§Ð°Ñ�Ñ‚Ð½Ð¾Ðµ Ð¼ÐµÑ€Ð¾Ð¿Ñ€Ð¸Ñ�Ñ‚Ð¸Ðµ</label>
                </p>
                <button class="waves-effect red btn">Ð¡Ð¾Ñ…Ñ€Ð°Ð½Ð¸Ñ‚ÑŒ</button>
            </div>
        </form>
    </div>

    <div class="col s12 m4 l4">
        <img class="width-100" src="img/sample.svg" alt="">
    </div>

</div>