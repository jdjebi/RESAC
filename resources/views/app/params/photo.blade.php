<div class="card resac-account-card-support">
    <div class="card-header">
        Photo de profil
    </div>
    <div class="card-body">
        <form id="photo-form" action="?photo" class="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                <img id="user-photo"  class="border resac-w-200 resac-h-200  rounded-circle" src="{{ asset($user->get_photo2()) }}" alt="">
            </div>
            <div class="d-flex justify-content-center m-3">
                <div class="upload-btn-wrapper">
                  <button class="btn btn-outline-dark btn-sm ">Importer une photo</button>
                </div>
            </div>
            <div class="text-center">
                <p class="small" id="upload-file"></p>  
            </div>
            <input id="upload-file-input" name="photo" type="file" accept=".png, .jpeg, .jpg">
            <input id="base64-upload-file-input" name="base64-photo" type="hidden">
            <input name="change_photo" type="hidden">
            <div class="text-center mt-1">
                <button class="btn  btn-sm btn-primary" name="change_photo" type="submit">Changer la photo</button>
                <a class="btn btn-sm btn-outline-danger" href="#"> Retirer la photo</a>
            </div>
        </form>
    </div>
</div>

<div id="vgt" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark">Recadrage de la photo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div style="height: 300px">
            <div id="croppie-photo-uploader"></div>
          </div>
        </div>
        <div class="modal-footer mt-4">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button id="change-photo" type="button" class="btn btn-primary" data-dismiss="modal">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>

