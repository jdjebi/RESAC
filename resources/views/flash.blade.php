<?php foreach (Flash::get() as $notif): ?>
<div class="alert alert-<?= $notif["type"] ?> ">
  <?= $notif["message"] ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endforeach;  ?>
