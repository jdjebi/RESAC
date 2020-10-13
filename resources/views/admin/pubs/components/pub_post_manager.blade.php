<div v-if="post" class="border rounded shadow-sm bg-white">
    <div class="p-3 border-bottom">
        <div class="mb-3">
            <div v-if="is_post_manager_operation" class="float-right">
                <span class="spinner-border text-muted spinner-border-sm" role="status"></span> Opération en cours...
            </div>
            <div class="h5">Certification</div>   
        </div>
        <div v-if="post.validate_status == 1 && post.user_validator != null">
            <div class="font-italic">
                <div>Certifié le: <span v-text="post.validate_at"></span></div>
                <div>Par: <span v-text="post.user_validator.fullname"></span></div> 
            </div>
            <div class="pt-3">
                <button v-bind:disabled="is_post_manager_operation" v-on:click="OnCertifCancel" class="btn btn-danger btn-sm">Annuler</button>
            </div>
        </div>
        <div v-else>
            <button v-bind:disabled="is_post_manager_operation || post.validate_status == 2" v-on:click="OnCertifStart" class="btn btn-warning btn-sm"><i class="fa fa-hourglass-start"></i> Mettre en attente</button>
            <button v-bind:disabled="is_post_manager_operation" class="btn btn-success btn-sm" v-on:click="OnCertifSet"><i class="fa fa-check"></i> Certifier</button>
        </div>
    </div>
    <div class="p-3 border-bottom">
        <div>
            <div class="h5 mb-3">Publication</div>
            <button v-bind:disabled="is_post_manager_operation || post.validate_status != 1"class="btn btn-warning btn-sm"><i class="fa fa-ban"></i> Bloquer la publication</button>
            <button v-bind:disabled="is_post_manager_operation || post.validate_status != 1" class="btn btn-light btn-sm"><i class="fas fa-archive"></i> Retirer la publication</button>
        </div>
    </div>
    <div class="p-3">
        <div class="h5 mb-3">Zone dangereuse</div>
        <button v-bind:disabled="is_post_manager_operation || post.validate_status != 1" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Supprimer la publication</button>
    </div>
</div>