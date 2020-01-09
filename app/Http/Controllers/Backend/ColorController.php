<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    use SoftDeletes;
    private $color;
    public function __construct(
        Color $color
    ) {
        $this->middleware('auth:admin');
        $this->color = $color;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->color->all();
        return view('backend.color.index', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.color.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $this->color->create([
            'name' => $request->input('name')
        ]);

        if ($create) {
            return redirect(route('backend.powers.index'))->with([
                'status' => [
                    'class' => 'success',
                    'message' => 'แก้ไขสำเร็จ'
                ]
            ]);
        }
        return redirect(route('backend.powers.create'))->with([
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
        $catalog = $this->color->find($id);
        return view('backend.color.form', ['results' => $catalog]);
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
        $color = $this->color->find($id);
        $color->name = $request->input('name');

        if ($color->save()) {
            return redirect(route('backend.powers.index'))->with([
                'status' => [
                    'class' => 'success',
                    'message' => 'แก้ไขสำเร็จ'
                ]
            ]);;
        }
        return redirect(route('backend.powers.edit', ['id' => $color->id]))->with([
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
        $color = $this->color->find($id);
        $color->delete();

        return redirect()->back()->with([
            'status' => [
                'class' => 'success',
                'message' => 'ลบ ' . $color->name . ' สำเร็จ'
            ]
        ]);
    }
}
