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
                                v-on:click="OnDeletePermission2(permission.id,$event)" 
                                class="btn btn-sm btn-danger"
                            ><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <form v-on:submit.prevent>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nouvelle permission</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input v-bind:disabled="permissions.creating" name="role_name" v-model="permissions.form.name" class="form-control form-control-sm" placeholder="Nom de la permission" type="text">
                                <small v-if="permissions.form.error" class="form-text text-danger" v-text="permissions.form.error"></small>
                            </td>
                            <td>
                                <button 
                                    v-bind:disabled="permissions.creating"
                                    v-on:click="OnCreatePermission"
                                    class="btn btn-sm btn-success"
                                >Ajouter</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
