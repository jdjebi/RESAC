@extends('admin.base')

@section('extras_style')

@endsection

@section('main-content')
@include('flash')
<div id="v-app" class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="h4 mb-4">Gestion des rôles</div>
            <hr>
        </div>
        <div class="col-md-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="my-3 p-5 bg-white rounded resac-linkedin-shadow">
                            <div class="mb-4 d-flex justify-content-between">
                                <div class="h5">Rôles</div>
                                <div>
                                    <a href="#" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#create_role">Nouveau rôle</a>
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
                              <tbody>
                                  @foreach($roles as $role)
                                      <tr>
                                          <td title="ID {{ $role->id }}">{{ $role->name }}</td>
                                          <td></td>
                                          <td class="text-right">
                                              <a href="" class="btn btn-sm btn-dark text-center"><i class="fa fa-edit"></i></a>
                                              <a href="" class="btn btn-sm btn-danger text-center"><i class="fa fa-trash"></i></a>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                            </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create_role" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="create_role" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_roleLabel">Nouveau rôle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="role-create" v-on:submit.prevent="OnSaveRole">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Titre du rôle:</label>
                        <input type="text" name="role_name" class="form-control" id="recipient-name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button v-bind:disabled="role.creating" type="submit" class="btn btn-primary">
                        <span v-if="role.creating" class="spinner-border text-white spinner-border-sm" role="status"></span>
                        Enregistrer
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
  var vm = new Vue({
    el: "#v-app",
    data:{
      role:{
        creating: false,
      },
      url: {
        create_role: "{{ route("backend.perm_and_role.create.role") }}",
      },
    },
    mounted: function (){},

    methods:{
      OnError: function(){
        Swal2_tools_emit_basic_error();
      },
      OnSaveRole: function(){
        vm.role.creating = true;
        form_data = $("#role-create").serializeArray();
        $.post({
          url: this.url.create_role,
          data:form_data,
          success: function (data,status){
            vm.role.creating = false;
            window.location = "";
          },
          error: function (data,status,error){
            Swal2_tools_emit_basic_error();
          }
        });
      },
    }
  });
</script>


@endsection
