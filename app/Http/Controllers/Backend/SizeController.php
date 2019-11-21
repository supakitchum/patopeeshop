<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    use SoftDeletes;
    private $size;
    public function __construct(
        Size $size
    ) {
        $this->middleware('auth:admin');
        $this->size = $size;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->size->all();
        return view('backend.size.index', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.size.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $this->size->create([
            'name' => $request->input('name'),
        ]);

        if ($create) {
            return redirect(route('backend.sizes.index'))->with([
                'status' => [
                    'class' => 'success',
                    'message' => 'แก้ไขสำเร็จ'
                ]
            ]);;
        }
        return redirect(route('backend.sizes.create'))->with([
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
        $size = $this->size->find($id);
        return view('backend.size.form', ['results' => $size]);
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
        $size = $this->size->find($id);
        $size->name = $request->input('name');

        if ($size->save()) {
            return redirect(route('backend.sizes.index'))->with([
                'status' => [
                    'class' => 'success',
                    'message' => 'แก้ไขสำเร็จ'
                ]
            ]);;
        }
        return redirect(route('backend.sizes.edit', ['id' => $size->id]))->with([
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
        $size = $this->size->find($id);
        $size->delete();

        return redirect()->back()->with([
            'status' => [
                'class' => 'success',
                'message' => 'ลบ ' . $size->name . ' สำเร็จ'
            ]
        ]);
    }
}