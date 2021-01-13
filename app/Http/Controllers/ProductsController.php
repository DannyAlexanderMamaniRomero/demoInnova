<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Products::all();
        return view('products.index')->with('data',$data);
    }
    
    public function Report()
    {
        $data = Products::select('products.id','categories.nombreCategoria','products.nombreProducto','products.precioProducto','products.stock')
        ->join('categories', 'products.codCategoria', '=', 'categories.id')
        ->get();
        return view('reports.index')->with('data',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = new Products;
        $data->codCategoria = $request->codCategoria;
        $data->nombreProducto = $request->nombreProducto;
        $data->precioProducto = $request->precioProducto;
        $data->stock = $request->stock;
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
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Products::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->edit_idProducto;
        $data = Products::find($id);
        $data->codCategoria = $request->edit_categoriaProducto;
        $data->nombreProducto = $request->edit_nombreProducto;
        $data->precioProducto = $request->edit_precioProducto;
        $data->stock = $request->edit_stock;
        $data->save();
        return back()->with('success','Actualización exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
            $idProducto = $request->id;
            $data = Products::find($idProducto);
            $response = $data->delete();
            if($response){
                echo "Eliminación exitosa!";
            }else{
                echo "No se pudo eliminar.";
            }
    }
    /*public function listProduct(Request $request){
        $data = Products::select('products.id','categories.nombreCategoria','products.nombreProducto','products.precioProducto','products.stock')
                ->join('categories', 'products.codCategoria', '=', 'categories.id')
                ->get();
        return $data;
    }*/

    public function listTodoProduct(Request $request){
        $data = Products::select('products.id','categories.nombreCategoria','products.nombreProducto','products.precioProducto','products.stock')
        ->join('categories', 'products.codCategoria', '=', 'categories.id')
        ->where('categories.id',$request->idCategories)
        ->get();

        return $data;
    }
}
