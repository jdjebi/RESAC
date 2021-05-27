<?php foreach (Flash::get() as $notif): ?>
<div class="alert alert-<?= $notif["type"] ?> ">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="text-center">
    <?= $notif["message"] ?>
  </div>
</div>
<?php endforeach;  ?>
