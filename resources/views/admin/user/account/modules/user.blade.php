<div class="resac-account-module">
    <div class="module-card">
        <div class="module-header">
            Utilisateur
        </div>
        <div class="module-body">

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" value="{{ $user->nom }}" name="nom" id="nom" disabled>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" value="{{ $user->prenom }}" name="prenom" id="prenom" disabled>
            </div>
        
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" value="{{ $user->email }}" name="email" id="email" disabled>
            </div>
        
            <div class="form-group">
                <label for="numero">Numéro de téléphone</label>
                <input type="text" class="form-control" value="{{ $user->numero }}" name="numero" id="numero" disabled>
            </div>

        </div>
    </div>
</div>