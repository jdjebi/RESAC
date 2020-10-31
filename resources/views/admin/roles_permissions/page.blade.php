@extends('admin.base')

@section('main-content')
    @include('flash')
    <div id="v-app" class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="h4 mb-4">Gestion des rôles et permissions</div>
                <hr>
            </div>
            <div class="col-md-12">
                @include('admin.roles_permissions.roles')
            </div>
            <div class="col-md-12">
                @include('admin.roles_permissions.permissions')
            </div>
        </div>
        <div>
            @include('admin.roles_permissions.extras')
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    @include('admin.roles_permissions.scripts.roles_script')
@endsection
