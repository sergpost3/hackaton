<div class="row">
    <div class="col-md-8 personal-info">
        <form class="form-horizontal" role="form" method="post" action="">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <input type="hidden" name="geo_x" value="" required="required" />
            <input type="hidden" name="geo_y" value="" required="required" />
            <input type="hidden" name="geo_google_maps_link" value="" required="required" />
            <input type="hidden" name="geo_zoom" value="" required="required" />
            <div class="form-group">
                <label class="col-lg-4 control-label">Name:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" name="name" value="" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label">GEO name:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" name="geo_name" value="" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label">Description:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" name="desc" value="" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label">Date:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="date" name="datetime" value="" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label">Full description:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" name="full_desc" value="" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label">Max people count:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" name="max_people_count" value="" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label">Select event type:</label>
                <div class="col-lg-8">
                    <select class="form-control" name="type">
                        <option value="0">Party</option>
                        <option value="1">Mass event</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label">Image:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="file" name="image" required="required" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label">Private:</label>
                <div class="col-lg-8">
                    <div class="checkbox">
                        <label><input type="checkbox" name="private">Private</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <input type="submit" name="event_add_form" value="Піду" />
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <img class="width100" src="img/sample.svg" alt="">
    </div>
</div>