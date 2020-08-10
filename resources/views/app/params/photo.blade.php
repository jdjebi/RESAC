<div class="card">
    <div class="card-header">
        Photo de profil
    </div>
    <div class="card-body">
        <form class="">
            <div class="text-center">
                <img class="border resac-w-200 resac-h-200  rounded-circle" src="{{ asset($user->photo) }}" alt="">
            </div>
            <div class="text-center">
                <div class="upload-btn-wrapper">
                    <button class="btn btn-success btn-sm ">Impoter une photo</button>
                    <input name="photo" type="file">
                </div>
            </div>
            <div class="text-center">
                <p class="text-muted small">
                    Nous vous recommandant d'importer des photos<br>de largeur et d'hauteur égalent
                </p>
            </div>
            <div class="text-left">
                <button class="btn btn-primary" type="submit"> <i class="fa fa-camera"></i> Changer la photo</button>
            </div>
        </form>
    </div>
</div>