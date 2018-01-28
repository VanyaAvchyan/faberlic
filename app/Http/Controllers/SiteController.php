<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Partner;
use App\Video;
use App\Offer;
use App\Contact;
use App\Faq;
use App;
class SiteController extends Controller
{
    public function getIndex($locale = 'am')
    {
        App::setLocale($locale);
        $partner = Partner::first();
        $offer   = Offer::first();
        $video = Video::all();
        $contacts = Contact::all();
        $faqs = Faq::all();
        return view('site/index', [
                                    'user'      => auth()->user(),
                                    'video'     => $video,
                                    'code'      => 408134,
                                    'partner'   => $partner,
                                    'offer'     => $offer,
                                    'contacts'  => $contacts,
                                    'faqs'      => $faqs,
                                ]);
    }

    public function getSiteByCode($code = 408134)
    {
        dd($code);
    }
}
