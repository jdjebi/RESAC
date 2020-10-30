<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset("asset/js/lib/lodash/lodash.min.js") }}" type="text/javascript"></script>

<script>
    var vm = new Vue({
    el: "#v-app",
    data:{
        role:{
            creating: false,
            creating_error_msg: "",
            form_role_name: "",
            roles: []
        },
        url: {
            role:{
                index: "{{ route("backend.roles.index") }}",
                create: "{{ route("backend.roles.create") }}",
            }
        },
        toast:{
            message: ""
        }
    },

    computed: {
      
    },

    mounted: function (){
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
    }
  });
</script>