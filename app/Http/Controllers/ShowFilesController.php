<?php

namespace App\Http\Controllers;

use FilesystemIterator;
use Illuminate\Http\Request;
use RecursiveIteratorIterator;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;
use Illuminate\Support\Facades\File;

class ShowFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexx()
    {
        $dir = realpath('newsletter/');

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(
                $dir,
                FilesystemIterator::SKIP_DOTS
            )
        );

        $array = iterator_to_array($iterator);

        ksort($array);

        return view('arquivos.index', compact('array'));
    }

    public function index()
    {
        $dir = realpath('newsletter/');

        $it = new RecursiveDirectoryIterator($dir);
        foreach(new RecursiveIteratorIterator($it) as $file) {
            $FILE = array_flip(explode('.', $file));
            if (isset($FILE['php']) || isset($FILE['jpg'])) {
                echo  $file. "<br />";
    }
}
    }


    public function indexImg()
    {
        $imagens = array_map(function($imagem) {
            return '/newsletter/' . basename($imagem);
        }, File::glob(public_path('newsletter/*.*')));


        return view('arquivos.index', [
            'imagens' => $imagens
        ]);
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
        //
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
