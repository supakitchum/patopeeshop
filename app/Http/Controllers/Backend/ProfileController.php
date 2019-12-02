<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $admin;
    public function __construct(
        Admin $admin
    ) {
        $this->middleware('auth:admin');
        $this->admin = $admin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->admin->find($id);
        if ($request->input('password')){
            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
            ]);
            if (Hash::check($request->input('old-password'),$user->password)){
                $user->password = bcrypt($request->input('password'));
                if ($user->save()){
                    return redirect()->back()->with([
                        'alert' => [
                            'status' => 'success',
                            'messages' => [
                                'title' => 'อัพเดทข้อมูลสำเร็จ',
                                'body' => 'อัพเดทรหัสผ่านของท่านเรียบร้อยแล้ว'
                            ]
                        ]
                    ]);
                }else{
                    return redirect()->back()->with([
                        'alert' => [
                            'status' => 'error',
                            'messages' => [
                                'title' => 'อัพเดทข้อมูลไม่สำเร็จ',
                                'body' => 'รายละเอียดปัญหา : ไม่ทราบสาเหตุ กรุณาติดต่อผู้ดูแลระบบ'
                            ]
                        ]
                    ]);
                }
            }
            else{
                return redirect()->back()->with([
                    'alert' => [
                        'status' => 'error',
                        'messages' => [
                            'title' => 'อัพเดทข้อมูลไม่สำเร็จ',
                            'body' => 'รายละเอียดปัญหา : รหัสผ่านเก่าของท่านผิด'
                        ]
                    ]
                ]);
            }
        }else{
            $this->validate($request, [
                'fname' => 'required|min:3|max:50',
                'lname' => 'required|min:3|max:50',
            ]);
            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            if ($user->save()){
                return redirect()->back()->with([
                    'alert' => [
                        'status' => 'success',
                        'messages' => [
                            'title' => 'อัพเดทข้อมูลสำเร็จ',
                            'body' => 'อัพเดทข้อมูลส่วนตัวของท่านเรียบร้อยแล้ว'
                        ]
                    ]
                ]);
            }else{
                return redirect()->back()->with([
                    'alert' => [
                        'status' => 'error',
                        'messages' => [
                            'title' => 'อัพเดทข้อมูลไม่สำเร็จ',
                            'body' => 'รายละเอียดปัญหา : ไม่ทราบสาเหตุ กรุณาติดต่อผู้ดูแลระบบ'
                        ]
                    ]
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
