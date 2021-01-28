<?php

namespace App\Http\Controllers;

use App\city;
use App\residences;
use App\destination;
use App\leads;
use App\nationalities;
use App\services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Site', 'edit', Auth::user()->id) == 1 || getPermissionUser('Site', 'create', Auth::user()->id) == 1) {
            $data = services::all();
            // dd($data);
            return view('dashbord.site.services.index', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Site', 'edit', Auth::user()->id) == 1 || getPermissionUser('Site', 'create', Auth::user()->id) == 1) {
            return view('dashbord.site.services.create');
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
        //
        // dd($request->icon);

        $request->validate([
            'titleEn' => 'required',
            'titleAr' => 'required',
            'pageTitleEn' => 'required',
            'pageTitleAr' => 'required',
            'icon' => 'required|mimes:jpg,jpeg,png,gif,icon,ico|max:800',
            'shortDescriptionEn' => 'required',
            'shortDescriptionAr' => 'required',
            'slugEn' => 'required',
            'slugAr' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:800',
            'contentEn' => 'required',
            'contentAr' => 'required',
            'brochure' => 'required|mimes:pdf|max:800',
        ]);
        // dd("asd");
        if ($files = $request->file('image')) {
            $files = $request->file('image');
            $destinationPath = public_path() . "/services/image/";
            $imgFile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgFile);
        } else {
            $imgFile = '/services/image/01.jpg';
        }

        if ($files = $request->file('icon')) {
            $files = $request->file('icon');
            $destinationPath = public_path() . "/services/icon/";
            $iconFile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $iconFile);
        } else {
            $iconFile = '/services/icon/01.jpg';
        }

        if ($files = $request->file('brochure')) {
            $files = $request->file('brochure');
            $destinationPath = public_path() . "/services/brochure/";
            $fileBrochure = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $fileBrochure);
        } else {
            $fileBrochure = '/services/brochure/01.pdf';
        }

        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'pageTitleAr' => $request->pageTitleAr,
            'pageTitleEn' => $request->pageTitleEn,
            'icon' => $iconFile,
            'shortDescriptionAr' => $request->shortDescriptionAr,
            'shortDescriptionEn' => $request->shortDescriptionEn,
            'slugEn' => $request->slugEn,
            'slugAr' => $request->slugAr,
            'image' => $imgFile,
            'contentEn' => $request->contentEn,
            'contentAr' => $request->contentAr,
            'userId' => Auth::user()->id,
            'brochure' => $fileBrochure,
        ];
        // dd($data);
        services::create($data);
        return redirect('admin/dashbord/services');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\services $services
     * @return \Illuminate\Http\Response
     */
    public function show(services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\services $services
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Site', 'edit', Auth::user()->id) == 1 || getPermissionUser('Site', 'create', Auth::user()->id) == 1) {
            $data = services::find($id);
            return view('dashbord.site.services.edit', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\services $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        // dd($request->icon);
        if ($filesImage = $request->file('image')) {
            $request->validate([
                'image' => 'mimes:jpg,jpeg,png,gif|max:800',
            ]);
            $filesImage = $request->file('image');
            $destinationPath = public_path() . "/services/image/";
            $imgFile = date('YmdHis') . "." . $filesImage->getClientOriginalExtension();
            $filesImage->move($destinationPath, $imgFile);
        } else {
            if ($request->image == null) {
                $ifThisExist = services::find($id);
                $imgFile = $ifThisExist->image;
            }
        }
        if ($files = $request->file('icon')) {
            $request->validate([
                'icon' => 'mimes:jpg,jpeg,png,gif|max:800',
            ]);
            $files = $request->file('icon');
            $destinationPath = public_path() . "/services/icon/";
            $iconFile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $iconFile);
        } else {
            if ($request->icon == null) {
                $ifThisExist = services::find($id);
                $iconFile = $ifThisExist->icon;
            }
        }
        if ($files = $request->file('brochure')) {
            $files = $request->file('brochure');
            $destinationPath = public_path() . "/services/brochure/";
            $fileBrochure = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $fileBrochure);
        } else {
            $ifThisExist = services::find($id);
            $fileBrochure = $ifThisExist->brochure;
        }

        $data = [
            'titleEn' => $request->titleEn,
            'titleAr' => $request->titleAr,
            'pageTitleAr' => $request->pageTitleAr,
            'pageTitleEn' => $request->pageTitleEn,
            'icon' => $iconFile,
            'shortDescriptionAr' => $request->shortDescriptionAr,
            'shortDescriptionEn' => $request->shortDescriptionEn,
            'slugEn' => $request->slugEn,
            'slugAr' => $request->slugAr,
            'image' => $imgFile,
            'contentEn' => $request->contentEn,
            'contentAr' => $request->contentAr,
            'userId' => Auth::user()->id,
            'brochure' => $fileBrochure,
        ];
        // dd($data);
        services::where('id', $id)->update($data);
        return redirect('admin/dashbord/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\services $services
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1 || getPermissionUser('Site', 'delete', Auth::user()->id) == 1) {
            services::where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }


    public function showPageServices()
    {
        $pagination = 8;
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $services = services::query()->paginate($pagination);
        return view('services', compact('services','nationalities','destinations','cities'));

    }

    public function detailServices($slug)
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

        $service = services::query()->where($slug_col, $slug)->first();
        if (!$service) {
            if( $service = services::query()->where($slug_col_alt, $slug)->first() ) {
                return redirect($lang . '/services/' . $service->$slug_col);
            } else {
                return abort(404);
            }
        }else {
            $services = services::where($slug_col, '!=', $slug)->get();
            $nationalities = nationalities::query()->where('status', 1)->get();
            $residences = residences::query()->where('status', 1)->get();
            $cities = city::query()->where('status', 1)->get();
            $destinations = destination::query()->where('status', 1)->get();

            $pageTitle = ( $lang == 'ar' ? $service->pageTitleAr : $service->pageTitleEn );

            return view('servicesDetails', compact('service', 'nationalities', 'residences', 'cities', 'destinations', 'services', 'pageTitle', 'lang'));
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
                    'type' => 3,
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
