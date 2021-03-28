<?php

namespace App\Http\Controllers\UI\admin\Suggestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Suggestion;

class SuggestionController extends Controller
{

    public function index(){

        $suggestions = Suggestion::all();

        $title = "Suggestions";
        
        return view('admin.extras.suggestions.index',[
            "title" => $title,
            "suggestions" => $suggestions
        ]);
    }

}

?>
