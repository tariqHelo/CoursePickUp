<?php

namespace App\Http\Controllers;

use App\articles;
use App\city;
use App\residences;
use App\destination;
use App\leads;
use App\nationalities;
use App\services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = articles::all();
        return view('dashbord.articles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Articles', 'create', Auth::user()->id) == 1) {
            return view('dashbord.articles.create');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lang' => 'required',
        ]);

        if ($files = $request->file('image')) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:800',
            ]);
            $destinationPath = public_path() . "/Articles/";
            $imgFile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgFile);
        } else {
            $imgFile = 'Articles/01.jpg';
        }

        $articles = new articles;
        $articles->titleAr = $request->titleAr;
        $articles->titleEn = $request->titleEn;
        $articles->slugAr = $request->slugAr;
        $articles->slugEn = $request->slugEn;
        $articles->metaDescriptionEn = $request->metaDescriptionEn;
        $articles->metaDescriptionAr = $request->metaDescriptionAr;
        $articles->pageTitleAr = $request->pageTitleAr;
        $articles->pageTitleEn = $request->pageTitleEn;
        $articles->contentEn = $request->contentEn;
        $articles->contentAr = $request->contentAr;
        $articles->featured = $request->featured;
        $articles->status = $request->status;
        $articles->en = collect($request->lang)->contains('en') ? 1 : 0;
        $articles->ar = collect($request->lang)->contains('ar') ? 1 : 0;
        $articles->date = $request->date;
        $articles->image = $imgFile;
        $articles->userId = Auth::user()->id;
        $articles->save();

        return redirect('admin/dashbord/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\articles $articles
     * @return \Illuminate\Http\Response
     */
    public function show(articles $articles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\articles $articles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Articles', 'edit', Auth::user()->id) == 1) {
            $data = articles::find($id);
            return view('dashbord.articles.edit', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\articles $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'lang' => 'required',
        ]);

        $findThisArticle = articles::find($id);
        if ($files = $request->file('image')) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:800',
            ]);
            $destinationPath = public_path() . "/Articles/";
            $imgFile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgFile);
        } else {
            if ($findThisArticle->image == null) {
                $imgFile = 'Articles/01.jpg';
            } else {
                $imgFile = $findThisArticle->image;
            }
        }
        
        $findThisArticle->titleAr = $request->titleAr;
        $findThisArticle->titleEn = $request->titleEn;
        $findThisArticle->slugAr = $request->slugAr;
        $findThisArticle->slugEn = $request->slugEn;
        $findThisArticle->metaDescriptionEn = $request->metaDescriptionEn;
        $findThisArticle->metaDescriptionAr = $request->metaDescriptionAr;
        $findThisArticle->pageTitleAr = $request->pageTitleAr;
        $findThisArticle->pageTitleEn = $request->pageTitleEn;
        $findThisArticle->image = $imgFile;
        $findThisArticle->contentEn = $request->contentEn;
        $findThisArticle->contentAr = $request->contentAr;
        $findThisArticle->featured  = $request->featured;
        $findThisArticle->status = $request->status;
        $findThisArticle->en = collect($request->lang)->contains('en') ? 1 : 0;
        $findThisArticle->ar = collect($request->lang)->contains('ar') ? 1 : 0;
        $findThisArticle->userId = Auth::user()->id;
        $findThisArticle->date = $request->date;

        $findThisArticle->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\articles $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Articles', 'edit', Auth::user()->id) == 1) {
            articles::where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function showPageArticles()
    {

        $pagination = 9;
        $services = services::query()->get();

        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();

        $lang = app()->getLocale();
        $articles = articles::query()->where('status', 1)->where("$lang", 1)->paginate($pagination);
        return view('blog', compact('articles', 'services','nationalities','cities','destinations'));
    }

    public function detailArticles($slug)
    {
        $lang = get_default_lang();
        switch ($lang) {
            case 'ar':
                $slug_col = 'slugAr';
                $slug_col_alt = 'slugEn';
                break;
            
            default:
                $slug_col = 'slugEn';
                $slug_col_alt = 'slugAr';
                break;
        }

        $article = articles::query()->where($slug_col, $slug)->first();
        if (!$article) {
            if( $article = articles::query()->where($slug_col_alt, $slug)->first() ) {
                return redirect($lang . '/articles/' . $article->$slug_col);
            } else {
                return abort(404);
            }
        }else {
            $services = services::query()->get();
            $nationalities = nationalities::query()->where('status', 1)->get();
            $residences = residences::query()->where('status', 1)->get();
            $cities = city::query()->where('status', 1)->get();
            $destinations = destination::query()->where('status', 1)->get();

            $pageTitle = ( $lang == 'ar' ? $article->pageTitleAr : $article->pageTitleEn );

            return view('blog-single', compact('article', 'nationalities', 'residences', 'cities', 'destinations', 'services', 'pageTitle', 'lang'));
        }
    }

    public function sendLeads(Request $request)
    {
        try {
            leads::query()->create(
                [
                    'fName' => $request->fName,
                    'lName' => null,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'nationality' => $request->nationality,
                    'placeOfResidence' => $request->placeOfResidence, /*city*/
                    'notes' => $request->notes,
                    'destination' => $request->destination,
                    'invoice' => null,
                    'device' => 1,
                    'currency' => null,
                    'type' => 2,
                    'institution' => null,
                    'subject' => null,
                    'userId' => null,
                ]);
            return redirect()->route('thank_you');
        } catch (\Exception $exception) {
            return $exception;
            return redirect()->route('articles');
        }
    }

}
