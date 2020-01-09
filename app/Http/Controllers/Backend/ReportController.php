<?php

namespace App\Http\Controllers\Backend;

use App\Model\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class ReportController extends Controller
{
    private $report;
    public function __construct(
        Report $report
    ) {
        $this->report = $report;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->report
            ->leftjoin('orders','reports.order_ref','=','orders.reference')
            ->select('reports.title','reports.detail','reports.email','orders.id','reports.order_ref','reports.id as rid','reports.status','reports.phone')
            ->get();
        return view('backend.report.index',['results' => $results]);
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
        $data = $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'detail' => 'required',
            'rid' => 'required'
        ]);
        try{
            Mail::to('dank-04@hotmail.com')->send(new SendMail($data));
            $this->report->where('id',$request->input('rid'))->update(['status' => 1]);
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'success',
                    'messages' => [
                        'title' => 'ส่งอีเมลสำเร็จ',
                        'body' => 'ส่งอีเมลไปที่ '.$request->input('email').' แล้ว'
                    ]
                ]
            ]);
        }catch (\Exception $e){
            return redirect()->back()->with([
                'alert' => [
                    'status' => 'error',
                    'messages' => [
                        'title' => 'ส่งอีเมลไม่สำเร็จ',
                        'body' => 'รายละเอียดปัญหา : ไม่ทราบสาเหตุ กรุณาแจ้งผู้ดูแล'
                    ]
                ]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        //
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
