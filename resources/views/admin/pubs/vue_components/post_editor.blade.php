<div v-if="post" class="post">
    <div class="border rounded shadow-sm bg-white">
        <div class="p-3 d-flex border-bottom">
            <div class="text-muted"><span class="font-weight-bolder">Modification</span> &middot; <small>Libre</small></div>
        </div>
        <div id="scrolling-cotainer">
            <div class="quill-box">
                <form method="post" action="{{ route("backend.post.create.libre") }}">
                    @csrf
                    <input type="hidden" name="content">
                    <div id="editor" class="bg-white ui-widget-content border-bottom"></div>
                    <div class="p-2">
                        <div class="d-flex align-items justify-content-between">
                            <div></div>
                            <div>
                                <a v-on:click="OnCloseEditor" href="#" class="btn btn-sm btn-light">Annuler</a>
                                <button class="btn btn-sm btn-primary" type="submit" name="register-post">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  