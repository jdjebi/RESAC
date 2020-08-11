<div class="card">
    <div class="card-header">
        Photo de profil
    </div>
    <div class="card-body">
        <form action="?photo" class="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                <p class="text-muted small">
                    Nous vous recommandant d'importer des photos de dimension égalent
                </p>
            </div>
            <div class="text-center">
                <img class="border resac-w-200 resac-h-200  rounded-circle" src="{{ asset($user->photo) }}" alt="">
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
            <div class="text-left mt-1">
                <button class="btn btn-primary" name="change_photo" type="submit"> <i class="fa fa-camera"></i> Changer la photo</button>
            </div>
        </form>
    </div>
</div>