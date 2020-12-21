<?php

namespace App\Http\Controllers\UI\Web\Index;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Features;


class IndexController extends Controller
{

    public function __invoke()
    {
      return redirect()->route("home");
    }

    public function index2()
    {
      return view('app.index.page');
    }

}

?>
