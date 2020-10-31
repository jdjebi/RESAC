<div class="row">
    <div class="col-md-12">
        <div class="my-3 p-5 bg-white rounded resac-linkedin-shadow">
            <div class="mb-4 d-flex justify-content-between">
                <div class="h4">Rôles</div>
                <div>
                    <a href="#" v-on:click="OnOpenRoleCreateForm" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#create_role">Nouveau rôle</a>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Rôle</th>
                    <th scope="col">Permissions</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody id="v-table-roles-row" class="d-none">
                    <tr v-for="role_tmp in role.roles">
                        <td v-bind:title="'ID ' + role_tmp.id" class="font-weight-bolder">
                            <span class="text-success"><i class="fa fa-lock"></i></span>&nbsp; @{{ role_tmp.name }}
                        </td>
                        <td></td>
                        <td class="text-right">
                            <a href="" class="btn btn-sm btn-dark text-center"><i class="fa fa-edit"></i></a>
                            <button v-bind:disabled="role.deleting"
                                v-on:click="OnDeleteRole(role_tmp.id,$event)" 
                                class="btn btn-sm btn-danger text-center"
                            >Supprimer</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div id="v-table-roles-loader">
                @include('admin.components.table-loader')
            </div>
        </div>
    </div>
</div>
