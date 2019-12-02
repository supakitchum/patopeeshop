<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    private $user;

    public function __construct(
        User $user
    )
    {
        $this->middleware('auth:admin');
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->all();
        return view('backend.customer.index')->with('customers', $users);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('backend.customer.form')->with(['result' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->input('password')){
            $data = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $user = $this->user->find($id);
            $user->password = bcrypt($request->input('password'));
            if ($user->save()){
                return redirect()->back()->with([
                    'alert' => [
                        'status' => 'success',
                        'messages' => [
                            'title' => 'อัพเดทข้อมูลสำเร็จ',
                            'body' => 'อัพเดทรหัสผ่านของ '.$user->email.' เรียบร้อยแล้ว'
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
        }else{
            $data = $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'district' => 'required',
                'province' => 'required',
                'zip_code' => 'required',
                'address' => 'required'
            ]);
            if ($this->user->find($id)->update($data)){
                return redirect()->back()->with([
                    'alert' => [
                        'status' => 'success',
                        'messages' => [
                            'title' => 'อัพเดทข้อมูลสำเร็จ',
                            'body' => 'อัพเดทข้อมูลของ '.$this->user->find($id)->email.' เรียบร้อยแล้ว'
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        if ($user->delete()){
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'success',
                    'messages' => [
                        'title' => 'ลบข้อมูลสำเร็จ',
                        'body' => 'ลบข้อมูลของ '.$user->email.' เรียบร้อยแล้ว'
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
