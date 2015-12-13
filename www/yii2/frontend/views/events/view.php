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
                            <strong>Организатор:</strong> <a href="/users/<?= $org["link"]; ?>"><?= $org["name"]; ?></a></p>

                        <p class="red-text text-darken-2">
                            <strong>Участники:</strong> <a href="">User2424</a>, <a href="">User2424</a></p>
                        <br>


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
                <button class="waves-effect green btn">Will go</button>
                <button class="waves-effect red btn">fUCK YOOUUUU</button>
                <button class="waves-effect grew btn">I don't know</button>

            </div>
        </div>
    </div>


</div>