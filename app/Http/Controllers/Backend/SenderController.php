<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Sender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SenderController extends Controller
{

    use SoftDeletes;
    private $sender;
    public function __construct(
        Sender $sender
    ) {
        $this->middleware('auth:admin');
        $this->sender = $sender;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->sender->all();
        return view('backend.sender.index', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sender.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $this->sender->create([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
        ]);

        if ($create) {
            return redirect(route('backend.senders.index'))->with([
                'status' => [
                    'class' => 'success',
                    'message' => 'แก้ไขสำเร็จ'
                ]
            ]);;
        }
        return redirect(route('backend.senders.create'))->with([
            'status' => [
                'class' => 'warning',
                'message' => 'แก้ไขไม่สำเร็จ'
            ]
        ]);
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
        $sender = $this->sender->find($id);
        return view('backend.sender.form', ['results' => $sender]);
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

        $sender = $this->sender->find($id);
        $sender->name = $request->input('name');
        $sender->link = $request->input('link');
        if ($sender->save()) {
            return redirect(route('backend.senders.index'))->with([
                'status' => [
                    'class' => 'success',
                    'message' => 'แก้ไขสำเร็จ'
                ]
            ]);;
        }
        return redirect(route('backend.senders.edit', ['id' => $sender->id]))->with([
            'status' => [
                'class' => 'warning',
                'message' => 'แก้ไขไม่สำเร็จ'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sender = $this->sender->find($id);
        $sender->delete();

        return redirect()->back()->with([
            'status' => [
                'class' => 'success',
                'message' => 'ลบ ' . $sender->name . ' สำเร็จ'
            ]
        ]);
    }
}