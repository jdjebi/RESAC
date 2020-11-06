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

<div id="v-app-roles" class="resac-account-module">
    <div class="module-card">
        <div class="module-header">
            <div class="d-flex justify-content-between">
                <div>Rôles et permissions</div>
                <div class="v-component d-none">
                    <button v-bind:disabled="!roles.edited" class="btn btn-primary btn-sm">Enregistrer</button>
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
                            <div v-if="!roles.collection">
                                Aucun rôle
                            </div>
                            <template v-else>
                                <template v-for="role in roles.user">
                                    <span class="role-badge" v-text="role.label"></span>
                                </template>
                            </template>
                        </div>
                    </div>
                    <div class="row border-top rp-item-detail-row">
                        <div class="col-md-3 col-sm-12">
                            <span class="label text-dark">Permissions</span>
                            <span v-if="roles.edited" class="text-primary label">(modifiée)</span>
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
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ cdn_asset("asset/js/lib/axios/axios.min.js") }}"></script>

<script>
var vm_roles = new Vue({
    el: "#v-app-roles",
    data:{
        roles: {
            user: [],
            collection: [],
            edited:false,
            permissions: null,
            available:null
        },
        url:{
            roles:{
                user: "{{ route('backend.users.roles.get',$user->id) }}?include_available_roles=true",
                availables: "{{ route('backend.roles.index') }}",
            }   
        }
    },
    mounted: function (){
        axios.get(this.url.roles.user)
            .then(function (response) {
                roles = response.data.data;
                vm_roles.roles.user = roles;
                vm_roles.roles.available = response.data.roles_available;
                vm_roles.roles.permissions = vm_roles.GetPermissionsViaRoles(roles);
                
            })
            .catch(function (error) {
                Swal2_tools_emit_basic_error();
            })
            .then(function () {
                $(".v-component").removeClass('d-none');
            });
        axios.get(this.url.roles.availables)
            .then(function (response) {
                vm_roles.roles.collection = response.data.data;
            })
            .catch(function (error) {
                Swal2_tools_emit_basic_error();
                console.log(error);
            })
            .then(function () {
                $(".v-component").removeClass('d-none');
            });
    },
    methods:{
        GetPermissionsViaRoles: function (roles){
            let roles_nbr =  roles.length;
            let p = [];
            for (i = 0; i < roles_nbr; i++) {
                role = roles[i];
                permissions = role.permissions;
                permissions_nbr = permissions.length;
                for (j = 0; j < permissions_nbr; j++) {
                    permission = permissions[j]; 
                    fp = false;
                    for (k = 0; k < p.length; k++) {
                        if(p[k].name == permission.name){
                            fp = true;
                            break;
                        }
                    }
                    if(!fp){
                        p.push(permission);    
                    }
                }
            }
            return p;
        }
    }
});
</script>
@endpush