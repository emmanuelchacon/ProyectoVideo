<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria; //Importamos el modelo

class CategoriaController extends Controller
{

    public function index()//listamos todos los registros de la tabla categoria
    {
        $categorias= Categoria::all(); //Almacenamos todos los registros de la tabla categorias en la variable categorias
        return $categorias;
    }


    public function store(Request $request)
    {
        //Se crea una instancia del modelo Categoria
        $categoria=new Categoria();

        $categoria->nombre=$request->nombre;//en el campo nombre se alojara el valor del campo nombre del request
        $categoria->descripcion=$request->descripcion;
        $categoria->condicion='1';
        $categoria->save();//Se guarda todo en la base de datos.
    }



    public function update(Request $request)
    {
        $categoria=Categoria::findOrFail($request->id);

        $categoria->nombre=$request->nombre;//en el campo nombre se alojara el valor del campo nombre del request
        $categoria->descripcion=$request->descripcion;
        $categoria->condicion='1';
        $categoria->save();//Se guarda todo en la base de datos.
    }

    public function desactivar(Request $request)
    {
        $categoria=Categoria::findOrFail($request->id);

        $categoria->condicion='0';
        $categoria->save();//Se guarda todo en la base de datos.

    }

    public function activar(Request $request)
    {
        $categoria=Categoria::findOrFail($request->id);

        $categoria->condicion='1';
        $categoria->save();//Se guarda todo en la base de datos.
    }



}
