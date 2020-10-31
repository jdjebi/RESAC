<script src="{{ cdn_asset("asset/js/lib/axios/axios.min.js") }}"></script>
<script src="{{ cdn_asset("asset/js/lib/lodash/lodash.min.js") }}" type="text/javascript"></script>

<script>
    var vm = new Vue({
    el: "#v-app",
    data:{
        role:{
            creating: false,
            deleting: false,
            role_deleting: null,
            creating_error_msg: "",
            form_role_name: "",
            roles: []
        },
        permissions:{
            creating: false,
            deleting: false,
            permission_deleting: null,
            creating_error_msg: "",
            form_name: "",
            collection: []
        },
        url: {
            role:{
              index: "{{ route("backend.roles.index") }}",
              create: "{{ route("backend.roles.create") }}",
              delete: "{{ route("backend.roles.delete","") }}",
            },
            permission:{
              index: "{{ route("backend.permissions.index") }}",
              create: "{{ route("backend.permissions.create") }}",
              delete: "{{ route("backend.permissions.delete","") }}", 
            }
        },
        toast:{
            message: ""
        }
    },

    mounted: function (){
      // Récupération des rôles
      axios.get(this.url.role.index)
        .then(function (response) {
          vm.role.roles = response.data.data;
        })
        .catch(function (error) {
          Swal2_tools_emit_basic_error();
        })
        .then(function () {
          $("#v-table-roles-row").removeClass('d-none');
          $("#v-table-roles-loader").hide();
        });
      // Récupération des permissions
      axios.get(this.url.permission.index)
        .then(function (response) {
          vm.permissions.collection = response.data.data;
          console.log(response.data.data);
        })
        .catch(function (error) {
          Swal2_tools_emit_basic_error();
        })
        .then(function () {
          $("#v-table-permissions-row").removeClass('d-none');
          $("#v-table-permissions-loader").hide();
        });
    },

    methods:{
      OnError: function(){
        Swal2_tools_emit_basic_error();
      },

      OnOpenRoleCreateForm: function(){
        vm.role.creating_error_msg = "";
        vm.role.form_role_name = "";
      },
      OnSaveRole: function(){
        vm.role.creating = true;
        vm.role.creating_error_msg = "";
        form_data = $("#role-create").serializeArray();
        $.post({
          url: this.url.role.create,
          data:form_data,
          dataType:"json",
          success: function (data,status){
            vm.role.creating = false;
            if(data.error == true){
                vm.role.creating_error_msg = data.message;
            }else{
                vm.role.roles.unshift(data.role);
                $("#create_role").modal('hide');
                vm.toast.message = data.message;
                $('.toast').toast('show');
            }
          },
          error: function (data,status,error){
            Swal2_tools_emit_basic_error();
          }
        });
      },
      OnDeleteRole: function (id,event){
        Swal.fire({
          title:'Confirmation',
          icon: 'warning',
          text:'Voulez vous vraiment supprimer cet rôle ?',
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Oui",
          cancelButtonText: "Annuler",
        }).then( (result) => {
          if(result.value){
            url = vm.url.role.delete + "/" + id;
            vm.role.deleting = true;
            axios.delete(url)
            .then(function (response) {
              if(!response.data.error){
                roles_tmp = vm.role.roles;
                new_roles_tmp = [];
                for (let index = 0; index < roles_tmp.length; index++) {
                  r = roles_tmp[index];     
                  if(r.id!=response.data.role.id)
                    new_roles_tmp.push(r);
                }
                vm.role.roles = new_roles_tmp;
              }
              vm.toast.message = response.data.message;
              $('.toast').toast('show');
            })
            .catch(function (error) {
              console.log(error);
              Swal2_tools_emit_basic_error();
            })
            .then(function () {
              vm.role.deleting = false;
            });
          }
        });
      },

      OnDeletePermission: function (id,event){
        Swal.fire({
          title:'Confirmation',
          icon: 'warning',
          text:'Voulez vous vraiment supprimer cette permission ?',
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Oui",
          cancelButtonText: "Annuler",
        }).then( (result) => {
          if(result.value){
            url = vm.url.permission.delete + "/" + id;
            vm.permissions.deleting = true;
            axios.delete(url)
            .then(function (response) {
              if(!response.data.error){
                permissions_tmp = vm.permissions.collection;
                new_permissions_tmp = [];
                for (let index = 0; index < permissions_tmp.length; index++) {
                  r = permissions_tmp[index];     
                  if(r.id!=response.data.permission.id)
                    new_permissions_tmp.push(r);
                }
                vm.permissions.collection = new_permissions_tmp;
              }
              vm.toast.message = response.data.message;
              $('.toast').toast('show');
            })
            .catch(function (error) {
              console.log(error);
              Swal2_tools_emit_basic_error();
            })
            .then(function () {
              vm.permissions.deleting = false;
            });
          }
        });
      },
    }
  });
</script>