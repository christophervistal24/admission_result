<?php if (Session::has('status')): ?>
<div class="card bg-success text-white shadow">
    <div class="card-body">
        <h6 class="font-weight-bold"><?= ucfirst(Session::get('status')) ?></h6>
    </div>
</div>
<br>
<?php endif ?>
