<div class="row">
    <div class="col-md-12">
        <div class="my-3 p-5 bg-white rounded resac-linkedin-shadow">
            <div class="mb-4 d-flex justify-content-between">
                <div class="h4">Permissions</div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Permission</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody id="v-table-permissions-row" class="d-none">
                    <tr v-for="permission in permissions.collection">
                        <td v-bind:title="'ID ' + permission.id" class="font-weight-bolder">
                            <span class="text-primary"><i class="fa fa-lock"></i></span>&nbsp; <span class="badge badge-primary badge-lg">@{{ permission.name }}</span>  
                        </td>
                        <td class="text-right">
                            <a href="" class="btn btn-sm btn-dark text-center"><i class="fa fa-edit"></i></a>
                            <button v-bind:disabled="permissions.deleting"
                                v-on:click="OnDeletePermission(permission.id,$event)" 
                                class="btn btn-sm btn-danger text-center"
                            >Supprimer</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div id="v-table-permissions-loader">
                @include('admin.components.table-loader')
            </div>
        </div>
    </div>
</div>
