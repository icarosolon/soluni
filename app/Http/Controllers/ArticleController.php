<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api\ApiMessages;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $sector = $request->input('sector_id');
            $sector = Sector::findOrFail($sector);
            $sector->articles()->create($request->all());
            
            $response = ['Status'=> 'Artigo ' . $request->input('title') . ' criado com sucesso!'];
            $statusCode = 201;
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            $response = $message->getMessage();
            $statusCode = 401;
        }
        
        return $response = response()->json($response, $statusCode);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $response = Article::where('id', $id)->first();
            $statusCode = 200;
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            $response = $message->getMessage();
            $statusCode = 401;
        }
        return response()->json($response, $statusCode);
    }

    //Definir pesquisa por tipo de equipamento
    public function search($termo)
    {
        try {
            $response = Article::where('title', 'like',  '%' . $termo . '%')
                                    ->orWhere('description', 'like',  '%' . $termo . '%')
                                    ->orWhere('keywords', 'like',  '%' . $termo . '%')
                                    ->get();
            $statusCode = 200; 
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            $response = $message->getMessage();
            $statusCode = 406;
        }finally{
            return response()->json($response, $statusCode);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function documents($id)
    {
        try {
            $article = Article::findOrFail($id);
            $response = $article->documents;
            $statusCode = 200;
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            $response = $message->getMessage();
            $statusCode = 401;
        }
        return response()->json($response, $statusCode);
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
