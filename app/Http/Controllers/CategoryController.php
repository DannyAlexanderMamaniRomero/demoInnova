<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view('category.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = new Category;
        $data->nombreCategoria = $request->nombreCategoria;
        $data->descripcion = $request->descripcion;
        $data->save();
        return back()->with('success','Succeso exitoso!');
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->ajax()){
            $cod = $request->codCategoria;
            $info = Category::find($cod);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cod = $request->edit_codCategoria;
        $data = Category::find($cod);
        $data->nombreCategoria = $request->edit_nombreCategoria;
        $data->descripcion = $request->edit_descripcion;
        $data->save();
        return back()->with('success','Actualización exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cod = $request->codCategoria;
        $data = Category::find($cod);
        $response = $data->delete();
        if($response){
            echo "Eliminación exitosa!";
        }else{
            echo "No se pudo eliminar.";
        }
    }
    public function list(Request $request){
        $a = $request->a;
        $result = DB::table('categories')->get();
        return $result;
    }
}
