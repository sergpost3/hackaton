<form method="post" action="">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <input type="text" name="name" value="" required="required" />
    <input type="hidden" name="geo_x" value="" required="required" />
    <input type="hidden" name="geo_y" value="" required="required" />
    <input type="hidden" name="geo_zoom" value="" required="required" />
    <input type="text" name="geo_name" value="" required="required" />
    <input type="hidden" name="geo_google_maps_link" value="" required="required" />
    <input type="text" name="desc" value="" required="required" />
    <input type="text" name="datetime" value="" required="required" />
    <input type="text" name="full_desc" value="" required="required" />
    <input type="text" name="max_people_count" value="" required="required" />
    <input type="file" name="image" required="required" />

    <select name="type">
        <option value="0">Party</option>
        <option value="1">Mass event</option>
    </select>

    <input type="checkbox" name="private" id="private" />
    <label for="private">Private</label>
    <input type="submit" name="event_add_form" value="Save" />
</form>