<div id="create-suggestion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="create-suggestion">Nouvelle suggestion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('backend.suggestions.create') }}" method="POST">
          <div class="modal-body">
              @csrf
              <label for="content">Décrivez votre suggestion:</label>
              <textarea id="content" class="form-control" name="content" cols="30" rows="5" placeholder="Exprimez vous..." max="255" required></textarea>
              <div class="text-right ">
                <span class="text-muted small">255 caractères maximum</span>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Créer</button>
          </div>
        </form>
      </div>
    </div>
  </div>