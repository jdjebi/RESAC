<?php

namespace App\Http\Controllers\UI\admin\Suggestion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Resac\Auth2;

class SuggestionController extends Controller
{

    public function index(){
        return view('admin.extras.suggestions.index');
    }

}

?>
