<?php if (Session::has('errors')): ?>
<div class="card bg-danger text-white shadow">
    <div class="card-body">
        <?php foreach (Session::get('errors') as $message): ?>
        <h6 class="font-weight-bold"><li><?= ucfirst($message) ?></li></h6>
        <?php endforeach ?>
    </div>
</div>
<br>
<?php endif ?>
