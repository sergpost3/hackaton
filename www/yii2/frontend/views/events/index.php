<div class="row">
    <div class="col s12">
        <h1 class="header center red-text accent-2">Events</h1>
    </div>
</div>

<div class="row">
    <form action="" method="post">
        <div class="col s12 m9 l9">
            <div class="input-field">
                <input id="search" name="search" type="text">
                <label for="search">Search for</label>
            </div>
        </div>
        <div class="col s12 m3 l3 fix-btn">
            <button class="waves-effect red btn">Stuff</button>
        </div>
    </form>
</div>

<div class="row">

    <?php foreach($model as $event) : ?>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <a href="#">
                    <img src="img/sample.svg">
                </a>
                <span class="card-title"><a href="#" class="red-text accent-2">Name</a></span>
            </div>
            <div class="card-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolo</p>
            </div>
            <div class="card-action">
                <span>Creator: </span>
                <a href="#" class="red-text accent-2">
                    <strong>User1234</strong>
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>