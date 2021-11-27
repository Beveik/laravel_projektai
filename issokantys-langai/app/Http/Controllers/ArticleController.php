<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Type;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;
use Validator;

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
        $types = Type::all();
        return view('article.index',['articles'=> $articles, 'types'=> $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view("article.create", ['types'=> $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        //
    }
    public function storeAjax(Request $request) {


        $article = new Article;

        $input = [
            'articleTitle' => $request->articleTitle,
            'articleDescription' => $request->articleDescription,
            'articleType' => $request->articleType
        ];//ka mes ivedama, laukeliu pavadinimai kuriuos validuosim
        $rules = [
            'articleTitle' => 'required|min:3',
            'articleDescription' => 'min:15',
            'articleType' => 'numeric'
        ]; //taisykles

        $validator = Validator::make($input, $rules);

        if($validator->passes()) {
            $article->title = $request->articleTitle;
            $article->description = $request->articleDescription;
            $article->type_id = $request->articleType;

            $article->save();

            $success = [
                'success' => 'Article added successfully',
                'articleId' => $article->id,
                'articleTitle' => $article->title,
                'articleDescription' => $article->description,
                'articleType' => $article->articleType->title
            ];

            $success_json = response()->json($success);

            return $success_json;
        }

        $errors = [
            'error' => $validator->messages()->get('*')
        ];

        $errors_json = response()->json($errors);

        return $errors_json;

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }
    public function showAjax(Article $article) {

        $success = [
            'success' => 'Article recieved successfully',
            'articleId' => $article->id,
            'articleTitle' => $article->title,
            'articleDescription' => $article->description,
            'articleType' => $article->articleType->title
        ];

        $success_json = response()->json($success);

        return $success_json;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }
    public function editAjax(Article $article) {
        $success = [
            'success' => 'Article recieved successfully',
            'articleId' => $article->id,
            'articleTitle' => $article->title,
            'articleDescription' => $article->description,
            'articleType' => $article->type_id

        ];

        $success_json = response()->json($success);

        return $success_json;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }
    public function updateAjax(Request $request, Article $article) {
    $input = [
        'articleTitle' => $request->articleTitle,
        'articleDescription' => $request->articleDescription,
        'articleType' => $request->articleType
    ];//ka mes ivedama, laukeliu pavadinimai kuriuos validuosim
    $rules = [
        'articleTitle' => 'required|min:3',
        'articleDescription' => 'min:15',
        'articleType' => 'numeric'
    ]; //taisykles

    $validator = Validator::make($input, $rules);

    if($validator->passes()) {
        $article->title = $request->articleTitle;
        $article->description = $request->articleDescription;
        $article->type_id = $request->articleType;

        $article->save();

        $success = [
            'success' => 'Article updated successfully',
            'articleId' => $article->id,
            'articleTitle' => $article->title,
            'articleDescription' => $article->description,
            'articleType' => $article->articleType->title
        ];

        $success_json = response()->json($success);

        return $success_json;
    }

    $errors = [
        'error' => $validator->messages()->get('*')
    ];

    $errors_json = response()->json($errors);

    return $errors_json;
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
    public function destroyAjax(Article $article)
    {
        //1. IStriname klienta
        //2. Suskaiciuojame kiek klientu liko kompanijai
        //3. Likusiu klientu kieki perduodame i JSON zinute
        //4. Per Javascript, jei klientu kiekis ateina 0, remove() - table, append() - alert
        // id
        //name
        //surname
        //company_id

        $type_id  = $article->type_id ;

        $article->delete();

        $articlesLeft = Article::where('type_id ', $type_id )->get() ;//masyvas su visais klientais, priklausanciais kompanijai
        $articlesCount = $articlesLeft->count();

        //sekmes nesekmes zinute
        $success = [
            "success" => "The article deleted successfuly",
            "articlesCount" => $articlesCount
        ];
        $success_json = response()->json($success);

        return $success_json;
    }
    public function destroySelected(Request $request) {

        $checkedArticles = $request->checkedArticles; // visus id

        $messages = array();

        $errorsuccess = array();

        foreach($checkedArticles as $articleId) {

            $article = Article::find($articleId);
            // $clients_count = $company->companyClients->count();

                $deleteAction = $article->delete();
                if($deleteAction) {
                    $errorsuccess[] = 'success';
                    $messages[] = "Article ".$articleId." deleted successfully";
                } else {
                    $messages[] = "Something went wrong";
                    $errorsuccess[] = 'danger';
                }

        }


        $success = [
            'success' => $checkedArticles,
            'messages' => $messages,
            'errorsuccess' => $errorsuccess
        ];

        $success_json = response()->json($success);

        return $success_json;

    }
}
