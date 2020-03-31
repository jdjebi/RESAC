<?php require "views/partials/header.php" ?>
<?php require "views/partials/nav.php" ?>


<style media="screen">
  .card-user .card:hover{
    border-width: 1.2px;
  }

  .card-user a{
    color: inherit;
    text-decoration: none;
  }
</style>

<div class="container mt-5">
  <?php require "views/partials/flash.php" ?>
</div>

<div id="loader" class="mt-5 text-center">
  <h3 style="color:#ededed">Chargement...</h3>
</div>

<div id="portofolio" class="container">
    <div class="row">
      <div v-for="user in users" class="card-user col-sm-12 col-md-4 col-lg-3 d-flex justify-content-center p-3">

        <a v-bind:href="user.profil_url">
          <div class="card  d-none" style="width: 17rem">
            <div class="card-body">
              <div class="d-flex justify-content-center mb-3">
                <div class="u-photo">
                  <div class="eye u-photo-eye1"></div>
                  <div class="eye u-photo-eye2"></div>
                </div>
              </div>
              <div class="text-center" style="font-size: 13px;">
                <div class="">
                  {{ user.nom }} {{ user.prenom }}
                </div>
                <div class="">
                  {{ user.email }}
                </div>
              </div>
              </div>
          </div>
        </a>

      </div>
    </div>
</div>

<?php require "views/partials/footer.php" ?>
<script src="asset/js/vue.js" type="text/javascript"></script>
<script type="text/javascript">

var vm = new Vue({
  el: '#portofolio',
  data:{
    users: <?= $users_json ?>,
    user_connected: <?= Auth::check() ?>,

  },

  mounted: function(){
    $(".card-user .card").each(function(){
      $(this).removeClass("d-none");
      $("#loader").hide();
    })
  }
});

</script>
