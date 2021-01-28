<?php

namespace App\Http\Controllers;

use App\city;
use App\destination;
use App\leads;
use App\nationalities;
use App\pages;
use App\services;
use Illuminate\Http\Request;

class PagesFrontEndSite extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pageHowToBookYourCourse()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();


        $data = pages::query()->find(17);
        return view('howToBookYourCourse', compact('data', 'services','nationalities','cities','destinations'));

    }


    public function formSendLeadsHowBookCourse(Request $request)
    {
        try {
            leads::query()->create(
                [
                    'fName' => $request->fName,
                    'lName' => null,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'nationality' => $request->nationality,
                    'placeOfResidence' => $request->placeOfResidence,
                    'notes' => $request->notes,
                    'destination' => $request->destination,
                    'invoice' => null,
                    'device' => 1,
                    'currency' => null,
                    'type' =>3,
                    'institution' => null,
                    'subject' => null,
                    'userId' => null,
                ]);
            return redirect()->route('thank_you');
//            return view('thank_you');
        } catch (\Exception $exception) {
            return $exception;
            return redirect()->route('articles');
        }
    }



    public function pageWhoWeAre()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(15);
        return view('whoWeAre', compact('data', 'services','nationalities','cities','destinations'));

    }

    public function pageOurPartners()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(14);
        return view('ourPartners', compact('data', 'services','nationalities','cities','destinations'));

    }


    public function formSendLeadsOurPartners(Request $request)
    {
        try {
            leads::query()->create(
                [
                    'fName' => $request->fName,
                    'lName' => null,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'nationality' => null,
                    'placeOfResidence' =>null, /*city*/
                    'notes' => $request->notes,
                    'destination' =>null,
                    'invoice' => null,
                    'device' => 1,
                    'currency' => null,
                    'type' =>6,
                    'institution' =>  $request->institution,
                    'subject' => null,
                    'userId' => null,
                ]);

            return redirect()->route('thank_you_partner');
//            return view('thank_you');
        } catch (\Exception $exception) {
            return $exception;
            return redirect()->route('articles');
        }
    }


    public function pageWorkWithUs()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(13);
        return view('WorkWithUs', compact('data', 'services','nationalities','cities','destinations'));

    }


    public function formSendLeadsWorkWithUs(Request $request)
    {
        try {
            leads::query()->create(
                [
                    'fName' => $request->fName,
                    'lName' => null,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'nationality' => null,
                    'placeOfResidence' =>null, /*city*/
                    'notes' => $request->notes,
                    'destination' =>null,
                    'invoice' => null,
                    'device' => 1,
                    'currency' => null,
                    'type' =>5,
                    'institution' =>  $request->institution,
                    'subject' => null,
                    'userId' => null,
                ]);

            return redirect()->route('thank_you_partner');
//            return view('thank_you');
        } catch (\Exception $exception) {
            return $exception;
            return redirect()->route('articles');
        }
    }

    public function pageRefundPolicy()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(12);
        return view('RefundPolicy', compact('data', 'services','nationalities','cities','destinations'));
    }

    public function pageTermsConditions()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(11);
        return view('TermsConditions', compact('data', 'services','nationalities','cities','destinations'));
    }

    public function pageWhyBookWithUs()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(10);
        return view('WhyBookWithUs', compact('data', 'services','nationalities','cities','destinations'));
    }

    public function pageCookies()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(4);
        return view('WhyBookWithUs', compact('data', 'services','nationalities','cities','destinations'));
    }

    public function pagePolicies()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(3);
        return view('Policies', compact('data', 'services','nationalities','cities','destinations'));
    }

    public function pageLegal()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(2);
        return view('legal', compact('data', 'services','nationalities','cities','destinations'));
    }

    public function pageCopyright()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(1);
        return view('Copyright', compact('data', 'services','nationalities','cities','destinations'));
    }


    public function pageAboutUs()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(16);
        return view('about-us', compact('data', 'services','nationalities','cities','destinations'));
    }

    public function formSendMail(Request $request)
    {
        try {
//            dd($request->all());
            leads::query()->create(
                [
                    'fName' => null,
                    'lName' => null,
                    'email' => $request->email,
                    'phone' => null,
                    'nationality' => null,
                    'placeOfResidence' =>null, /*city*/
                    'notes' => null,
                    'destination' =>null,
                    'invoice' => null,
                    'device' => 1,
                    'currency' => null,
                    'type' =>10,
                    'institution' =>  null,
                    'subject' => null,
                    'userId' => null,
                ]);

            return redirect()->route('thank_you_newsletter');
//            return view('thank_you');
        } catch (\Exception $exception) {
            return $exception;
            return redirect()->route('articles');
        }
    }



    public function pageFeedback()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(8);
        return view('Feedback', compact('data', 'services','nationalities','cities','destinations'));

    }


    public function formSendFeedBacks(Request $request)
    {
        try {
            leads::query()->create(
                [
                    'fName' => $request->fName,
                    'lName' => null,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'nationality' => null,
                    'placeOfResidence' =>null, /*city*/
                    'notes' => $request->notes,
                    'destination' =>null,
                    'invoice' => null,
                    'device' => 1,
                    'currency' => null,
                    'type' =>8,
                    'institution' =>  $request->institution,
                    'subject' => null,
                    'userId' => null,
                ]);

            return redirect()->route('thank_you_feedback');
//            return view('thank_you');
        } catch (\Exception $exception) {
            return $exception;
            return redirect()->route('articles');
        }
    }


    public function pageContactUs()
    {
        $services = services::query()->get();
        $nationalities = nationalities::query()->where('status', 1)->get();
        $cities = city::query()->where('status', 1)->get();
        $destinations = destination::query()->where('status', 1)->get();
        $data = pages::query()->find(8);
        return view('contactUs', compact('data', 'services','nationalities','cities','destinations'));

    }

    public function formSendContactUs(Request $request)
    {
        try {
            leads::query()->create(
                [
                    'fName' => $request->fName,
                    'lName' => null,
                    'email' => $request->email,
                    'phone' =>null,
                    'nationality' => null,
                    'placeOfResidence' =>null, /*city*/
                    'notes' => $request->notes,
                    'destination' =>null,
                    'invoice' => null,
                    'device' => 1,
                    'currency' => null,
                    'type' =>7,
                    'institution' =>  $request->institution,
                    'subject' => $request->subject,
                    'userId' => null,
                ]);

            return redirect()->route('thank_you_contact');
//            return view('thank_you');
        } catch (\Exception $exception) {
            return $exception;
            return redirect()->route('articles');
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
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
