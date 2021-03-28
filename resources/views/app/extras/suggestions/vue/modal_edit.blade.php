<div id="update-suggestion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update-suggestion">Modification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form v-bind:action="editor.update_url" method="POST">
                <div class="modal-body">
                    @csrf
                    <textarea id="content" class="form-control" name="content" cols="30" rows="5" max="255" required v-model="editor.suggestion_content"></textarea>
                    <input type="hidden" v-model="editor.suggestion_id"> 
                    <div class="text-right ">
                        <span class="text-muted small">255 caractères maximum</span>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>