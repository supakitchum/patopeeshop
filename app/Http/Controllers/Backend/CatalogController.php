<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Catalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    use SoftDeletes;
    private $catalog;
    public function __construct(
        Catalog $catalog
    ) {
        $this->middleware('auth:admin');
        $this->catalog = $catalog;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->catalog->all();
        return view('backend.catalog.index', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.catalog.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = 'catalog_' . time() . '.' . $extension;
            if ($file->move('uploads/', $filename)) {
                $create = $this->catalog->create([
                    'name' => $request->input('name'),
                    'photo' => 'upload/'.$filename
                ]);

                if ($create) {
                    return redirect(route('backend.catalogs.index'))->with([
                        'status' => [
                            'class' => 'success',
                            'message' => 'แก้ไขสำเร็จ'
                        ]
                    ]);;
                }
            }
        } catch (\Exception $e){
            return redirect(route('backend.catalogs.create'))->with([
                'status' => [
                    'class' => 'warning',
                    'message' => 'แก้ไขไม่สำเร็จ'
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
        $catalog = $this->catalog->find($id);
        return view('backend.catalog.form', ['results' => $catalog]);
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
        $catalog = $this->catalog->find($id);
        $catalog->name = $request->input('name');
        if ($request->file('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = 'catalog_' . time() . '.' . $extension;
            if ($file->move('uploads/', $filename)) {
                $catalog->photo = 'uploads/'.$filename;
            }
        }

        if ($catalog->save()) {
            return redirect(route('backend.catalogs.index'))->with([
                'status' => [
                    'class' => 'success',
                    'message' => 'แก้ไขสำเร็จ'
                ]
            ]);;
        }
        return redirect(route('backend.catalogs.edit', ['id' => $catalog->id]))->with([
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
        $catalog = $this->catalog->find($id);
        $catalog->delete();

        return redirect()->back()->with([
            'status' => [
                'class' => 'success',
                'message' => 'ลบ ' . $catalog->name . ' สำเร็จ'
            ]
        ]);
    }
}
