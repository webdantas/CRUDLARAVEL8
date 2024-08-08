<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\People;
use FilesystemIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class PeopleController extends Controller
{
    public function index(Request $request){
        $selCategories = DB::table('categories')
        ->select('id', 'name')
        ->get();

        if($request->ajax()){

            $people = People::with('category')->get();
            return DataTables::of($people)
                    ->addColumn('action', function($people){
                        $acoes =  '<a href="javascript:void(0)" onclick="editPeople('.$people->id.')" class="btn btn-info btn-sm"> Editar </a>';
                        $acoes .= '&nbsp;&nbsp;<button type="button" name="delete" id="'.$people->id.'" class="delete btn btn-danger btn-sm"> Excluir </button>';

                        return $acoes;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('people.index', compact('selCategories'));
    }

    public function store(Request $request){

        $people = new People();
        $people->name           = $request->name;
        $people->email          = $request->email;
        $people->category_id    = $request->category_id;

        $people->save();
        return back();
    }

    public function destroy($id){
        $people = People::find($id)->delete();

        return response()->json(['success'=> 'Apagado com sucesso!!']);
    }

    public function edit($id)
    {
        $people = People::find($id);
        return response()->json($people);

    }

    public function update(Request $request)
    {
        $people = People::where('id', $request->id)->first();
        $people->fill($request->all());

        $people->save();

        return back();
    }
}
