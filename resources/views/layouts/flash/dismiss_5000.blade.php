<?php foreach (Flash::get() as $notif): ?>
<div class="alert resac-alert-auto-dismiss alert-<?= $notif["type"] ?> ">
  <div class="text-center">
    <?= $notif["message"] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
<?php endforeach;  ?>
