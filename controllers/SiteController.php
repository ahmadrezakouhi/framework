<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;




class SiteController extends Controller
{

    public function handleContact(Request $request)
    {
        return $this->returnJson($request->getBody(), 200);
    }
}
