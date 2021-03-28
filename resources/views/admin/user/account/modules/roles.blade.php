@push('styles')
<link rel="stylesheet" href="{{ cdn_asset('asset/css/resac/admin/roles-permissions.css') }}">
<style>
    .role-badge{
        padding: 10px 15px;
        border-radius: 25px;
        font-weight: 700;
        font-size: 12px;
        color: #3277ae;
        background: #c7edff;
        margin-right: 5px;
        margin-bottom: 5px;
        display: inline-flex;
    }
    .role-badge:hover{
      cursor: pointer;
    }
    .permission-badge{
        background: #c7edff;
        padding: 5px 10px;
        border-radius: 25px;
        font-weight: 700;
        font-size: 10px;
        color: #3277ae;
        margin-right: 5px;
        margin-bottom: 5px;
        display: inline-flex;
    }
    .role-badge-light{
        background: #F5F5F5;
        color: #636364;
    }
    .role-badge-success{
        color: #1B5E20;
        background: #E8F5E9;
    }
</style>
@endpush

<div class="resac-account-module">
    <div class="module-card">
        <div class="module-header">
            <div class="d-flex justify-content-between">
                <div>Rôles et permissions</div>
                <div class="v-component d-none">
                    <button v-on:click="SaveRoles" v-bind:disabled="UpdateBtnDisabled" class="btn btn-primary btn-sm">
                        <span  v-if="roles.updating" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Enregistrer
                    </button>
                </div>
            </div>
        </div>
        <div class="module-body v-component d-none">
            <div class="rp-item-detail">
                <div>
                    <div class="row rp-item-detail-row">
                        <div class="col-md-3 col-sm-12">
                            <span class="label text-dark">Rôles</span>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <template v-for="(role,i) in roles.user">
                                <span v-on:click="RemoveRole(i,$event)" class="role-badge" v-text="role.label"></span>
                            </template>
                        </div>
                    </div>
                    <div class="row border-top rp-item-detail-row">
                        <div class="col-md-3 col-sm-12">
                            <span class="label text-dark">Permissions</span>
                            <span v-if="roles.edited" class="text-primary text-normal label">(modifiée)</span>
                        </div>
                        <div class="col-md-9 col-sm-12">   
                            <template v-for="permission in roles.permissions" >
                                <span class="permission-badge role-badge-light" v-text="permission.name"></span>
                            </template>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <div class="text-muted">Cliquez sur un rôle pour l'ajouter</div> 
                    <div class="mt-3">
                        <template v-for="(role,i) in roles.available">
                            <span v-on:click="AddRole(i,$event)" class="role-badge role-badge-success">@{{ role.label }}</span>
                        </template>
                    </div>
                </div>
                <hr>
                <div class="form-check">
                    <input v-on:click="RoleEdited" class="form-check-input" type="checkbox" id="is_staff"  v-model="roles.is_staff">
                    <label class="form-check-label" for="is_staff">
                      Membre de l'équipe
                    </label>
                </div>
                @if(UserAuth()->is_superadmin)
                <div class="form-check">
                    <input v-on:click="RoleEdited" class="form-check-input" type="checkbox" id="is_superadmin" v-model="roles.is_superadmin">
                    <label class="form-check-label" for="is_superadmin">
                      Super administrateur
                    </label>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>