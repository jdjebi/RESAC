@extends('app.params.base')

@section('params-content')

<div id="v-photo">


<div class="card resac-account-card-support">
    <div class="card-header">
        Photo de profil
    </div>
    <div class="card-body">
        <form id="photo-form" class="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                <img id="user-photo"  class="resac-w-200 resac-h-200  rounded-circle" v-bind:src="user.photo" alt="">
            </div>
            <div class="text-center">
                <p class="small" id="upload-file"></p>  
            </div>
            <input v-on:change="onChangeFileUploader" id="upload-file-input" name="photo" type="file" accept=".png, .jpeg, .jpg">
            <input id="base64-upload-file-input" name="base64-photo" type="hidden">
            <input name="change_photo" type="hidden">
            <div class="text-center mt-1">
                <button type="button"
                    v-on:click="onChangePhoto"
                    class="btn  btn-sm btn-primary" name="change_photo">
                    Changer la photo
                </button>
                <button type="button"
                    v-if="photo.can_delete" 
                    v-bind:disabled="photo.delete_photo_btn.disabled"
                    v-on:click="onDeletePhoto"
                    class="btn btn-sm btn-outline-danger"> 
                    <span v-if="photo.delete_photo_btn.spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Retirer la photo
                </button>
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
            <div>
            <div id="croppie-photo-uploader"></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button 
                v-on:click="onSaveCropPhoto" 
                v-bind:disabled="photo.change_photo_btn.disabled"
                id="change-photo" type="button" class="btn btn-primary" data-dismis="modal">
                <span v-if="photo.change_photo_btn.spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Enregistrer
            </button>
        </div>
        </div>
    </div>
</div>


</div>

@endsection

@section('scripts')
@parent
<script src="{{ cdn_asset("asset/js/vue.js") }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ cdn_asset("asset/js/lib/croppie/croppie.min.js") }}"></script>
<script type="text/javascript">

var vm = new Vue({
    el: "#v-photo",
    data:{
        photo:{
            can_delete:true,
            change_photo_btn:{
                spinner:false,
                disabled:false,
            },
            delete_photo_btn:{
                spinner:false,
                disabled:false,
            },
            url:{
                delete_photo: "{{ route('backend.compte.photo.delete') }}",
                save_photo: "{{ route('backend.compte.photo.change')  }}"
            },
        },
        user:{
            photo: "{{ photos_cdn_asset(UserAuth()) }}"
        }
    },

    mounted: function(){
        let have_user_photo = {{ UserAuth()->have_photo }};
        
        if(have_user_photo){
            this.photo.can_delete = true;
        }
    },

    methods:{
        onChangePhoto: function (){
            $('#photo-form')[0].reset();
            $("#upload-file-input").trigger('click')
        },

        onChangeFileUploader: function (event){
            reader.readAsDataURL(event.target.files[0]);
            $('#vgt').modal('show')
        },

        onSaveCropPhoto: function (event){
            vm.photo.change_photo_btn.spinner = true;
            vm.photo.change_photo_btn.disabled = true;

            $uploadCrop.croppie("result", {
                type: "canvas",
                size: "original",
                circle: false
            }).then(function (resp) {
                $('#base64-upload-file-input').val(resp);
                let form_data = $('#photo-form').serializeArray();
                $.post({
                    url: vm.photo.url.save_photo,
                    data: form_data,
                    success: function (data,status){
                        $('#account-user-photo').attr('src',resp);
                        vm.user.photo = resp;
                        vm.photo.change_photo_btn.spinner = false;
                        vm.photo.change_photo_btn.disabled = false;
                       // $('#vgt').modal('hide');
                    },
                    error: vm.onError
                });
            });
        },

        onDeletePhoto: function (){
            this.photo.delete_photo_btn.spinner = true;
            this.photo.delete_photo_btn.disabled = true;
            $.get({
                url: this.photo.url.delete_photo,
                data: {},
                dataType: 'json',
                success: function (data,status){
                    vm.user.photo = data.photo
                    console.log(data);
                    vm.photo.delete_photo_btn.spinner = false;
                    vm.photo.delete_photo_btn.disabled = false;
                    $('#account-user-photo').attr('src',data.photo);
                },
                error: vm.onError
            });
        },

        onError: function(data,status,error){
            alert("Une erreur c'est produite. Contactez l'administrateur.");
            console.log(error);
            this.photo.delete_photo_btn.spinner = false;
            this.photo.delete_photo_btn.disabled = false;
            vm.photo.change_photo_btn.spinner = false;
            vm.photo.change_photo_btn.disabled = false;
        }
    }
});

var $uploadCrop = $("#croppie-photo-uploader").croppie({
    viewport: {
        width: 400,
        height: 400,
        type: "circle",
    },
    boundary: {
        height: 400,
    },
});

var reader = new FileReader();

reader.onload = function (event) {
    $uploadCrop.croppie('bind', {
    url: event.target.result,
    });
};

/*
$('.upload-btn-wrapper button').on('click', function(e){
    e.preventDefault()
    $("#upload-file-input").trigger('click')
});

$('#upload-file-input').on('change', function(event){
    local_path = $(event.target).val();
    reader.readAsDataURL(this.files[0]);
    $('#vgt').modal('show')
});

$('#change-photo').on('click',function(){
    $uploadCrop
    .croppie("result", {
        type: "canvas",
        size: "original",
        circle: false
    })
    .then(function (resp) {
        $('#base64-upload-file-input').val(resp);
        $('#user-photo').attr('src',resp);
        // $('#photo-form').submit();
    });
});
*/
</script>
@endsection