<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\User\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $loginService;

    /**
     * @param $loginService
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.login', [
            'title' => __('text.login.title.index'),
        ]);
    }

    public function store(Request $request)
    {
     return $this->loginService->loginValidate($request);
    }
}
