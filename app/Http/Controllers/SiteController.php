<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Partner;
use App\Video;
use App\Offer;
use App\Contact;
use App\Faq;
use App\Info;
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
        $about_us    = Info::where('type', 'about_us')->first();
        $our_product = Info::where('type', 'our_product')->first();
        $undecided   = Info::where('type', 'undecided')->first();
        
        return view('site/index', [
                                    'user'          => auth()->user(),
                                    'video'         => $video,
                                    'code'          => 408134,
                                    'partner'       => $partner,
                                    'offer'         => $offer,
                                    'contacts'      => $contacts,
                                    'faqs'          => $faqs,
                                    'about_us'      => $about_us,
                                    'our_product'   => $our_product,
                                    'undecided'     => $undecided,
                                ]);
    }

    public function getSiteByCode($code = 408134)
    {
        dd($code);
    }
}
