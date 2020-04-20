

<?php $__env->startSection('extras_style'); ?>
<style media="screen">
  body{
    background-color: #f1f3f6
  }

  .post-box .box{
    border-radius: 1em;
    position: relative;
    box-sizing: content-box;
    overflow: hidden;
  }

  .post-box .header-post-message{
    font-weight: 500
  }

  .pub-box .pub-user-photo{
    width: 40px;
    height: 40px;
    border-radius: 50%
  }

  .pub-box .pub-user-name{
    font-size: 14px;
    font-weight: 500
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-3">

  <div class="row">

    <div class="col-md-3">

    </div>

    <div class="col-md-6">

      <?php echo $__env->make('flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="post-box" id="post-box-v1">
        <form action="" method="post">
          <div class="box border bg-white">
              <div class="header pl-4 pt-3 pb-3">
                <div class="header-post-message">
                  <i class="fa fa-edit"></i> Publication
                </div>
              </div>
              <div class="body pl-4 pr-4 pb-3">
                <textarea class="form-control" id="post-area" rows="3" name="content" placeholder="Exprimez vous..."></textarea>
              </div>
              <div class="footer p-2 pr-4 border-top text-right">
                <button class="btn btn-sm btn-primary" type="submit" name="new_post">Publier</button>
              </div>
          </div>
        </form>
      </div>

      <div class="separator mt-3"></div>

      <div id="feed">

        <?php $__currentLoopData = $feed_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <div class="pub-box" id="">
              <div class="box border bg-white mb-3">
                  <div class="header pl-4 pt-3 pb-3">
                    <div class="media">
                      <img class="pub-user-photo" src="<?= $post->user->get_photo() ?>" alt="Photo <?= $post->user->get_complete_name() ?>">
                      <div class="ml-3 media-body">
                        <div class="mt-0 pub-user-name"><?= $post->user->get_complete_name() ?></div>
                        <span class="text-muted small"><?= $post->date ?> &middot <?= $post->scope ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="body pl-4 pr-4 pb-3">
                    <?= $post->content ?>
                  </div>
                  <div class="footer p-2 pr-4 border-top text-right">
                    <button disabled class="btn btn-sm btn-primary" type="button" name="button" title="Les publications marquées comme lu n'apparaitrons plus dans la fil.">Maquer comme lu</button>
                  </div>
              </div>
          </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      </div>

    </div>

    <div class="col-md-3">

    </div>

  </div>


</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tidev\Documents\dev3\resac\views\blade/actu.blade.php ENDPATH**/ ?>