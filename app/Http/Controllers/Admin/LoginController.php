<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Session;

/**
 * ��¼����
 * @package App\Http\Controllers\Admin
 */
class LoginController extends Controller
{
    /**
     * ��¼��ҳ
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin/login/login');
    }

    /**
     * �����¼��Ϣ
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $validator = Validator::make(
            $request->except(['_token']),
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back();
        }

        $admin = Admin::where('email', '=', $request->email)->wherePassword(md5($request->password))->first();
        if (empty($admin)) {
            return redirect()->back();
        }
        Session::put(['email' => $admin->email, 'id' => $admin->id]);
        return redirect()->to('admin/index');
    }

    /**
     * ɾ����¼session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete()
    {
        Session::pull('email');
        Session::pull('id');
        return redirect()->to('admin/login');
    }
}
