<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;
use Spatie\Permission\Traits\HasRoles;
use App\RESAC\Core\Security\RolesFactory;

class SuggestionUser extends Authenticatable
{
    protected $table = "suggestion_user";

    protected $guarded = [''];

}
