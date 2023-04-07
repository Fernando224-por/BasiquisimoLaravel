<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Category;

class todosController extends Controller
{
     public function store(Request $request) {
        $request->validate(['title'=>'required|min:3']);
        //Al momento de instanciar el objeto se debe llamar igual que el modelo
        $Tarea = new Tarea;
        $Tarea -> title= $request->title;
        $Tarea -> category_id= $request->category_id;
        $Tarea -> save();
        //prestar atencion al momento de escribir el with
        return redirect()->route('todos')->with('success','Tarea completada correctamente');
     }  
      public function index(){
         $todos = Tarea::all();
         $categories= Category::all();
         return view('tareas.index',['todos'=>$todos,'categories'=>$categories]);
      }

      public function show($id){
         $todo = Tarea::find($id);
         return view('tareas.show',['todo'=>$todo]);
        }
  
        public function update(Request $request, $id){
         $todo = Tarea::find($id);
         $todo->title=$request->title;
         //dd($request);MONITOREO O SEGUIMIENTO DE ACCIONES
         $todo->save();
         //return view('tareas.index',['success'=>'Tarea Actualizada!']);
         return redirect()->route('todos')->with('success','Tarea Actualizada!');
        }

        public function destroy($id){
         $todo = Tarea::find($id);
         $todo->delete();
         return redirect()->route('todos')->with('success','La tarea a sido eliminada');
        }
}   
