<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Partner;
use App\Video;
use App\Offer;
use App\Contact;
use App\Faq;
use App\Info;
use App\User;
use App;
class SiteController extends Controller
{
    public function getIndex($locale = 'am')
    {
        $admin = User::where('role', 1)->first();
        App::setLocale($locale);
        $partner = Partner::where('user_id', $admin->id)->first();
        $offer   = Offer::where('user_id', $admin->id)->first();
        $videos  = Video::where('user_id', $admin->id)->get();
        $main_videos = [
            Video::whereIn('order', ['first'])
                        ->where('user_id' , $admin->id)
                        ->first(),
            Video::whereIn('order', ['second'])
                        ->where('user_id' , $admin->id)
                        ->first()
        ];
        $main_videos = array_filter($main_videos);
        $contacts = Contact::where('user_id', $admin->id)->get();
        $faqs = Faq::where('user_id', $admin->id)->get();
        $about_us    = Info::where('type', 'about_us')->first();
        $our_product = Info::where('type', 'our_product')->first();
        $undecided   = Info::where('type', 'undecided')->first();

        return view('site/index', [
                                    'user'         => $admin,
                                    'videos'        => $videos,
                                    'code'          => $admin->username,
                                    'partner'       => $partner,
                                    'offer'         => $offer,
                                    'contacts'      => $contacts,
                                    'faqs'          => $faqs,
                                    'about_us'      => $about_us,
                                    'our_product'   => $our_product,
                                    'undecided'     => $undecided,
                                    'main_videos'   => $main_videos,
                                ]);
    }

    public function getSiteByCode($code = false, $locale = 'am')
    {
        $admin = User::where('role', 1)->first();
        $user = User::where('username', $code)->first();
        if(!$user )
            return redirect('/');
        App::setLocale($locale);
        $partner = Partner::where('user_id', $admin->id)->first();
        if(!$partner)
            $partner         = Partner::where('user_id', $user->id)->first();
        $videos = Video::where('user_id', $user->id)->get();
        if($videos->isEmpty())
            $videos = Video::where('user_id', $admin->id)->get();
        $video1 = Video::whereIn('order', ['first'])
                        ->where('user_id' , $user->id)
                        ->first();
        $video2 = Video::whereIn('order', ['second'])
                        ->where('user_id' , $user->id)
                        ->first();
        if(!$video1)
            $video1 = Video::whereIn('order', ['first'])
                        ->where('user_id' , $admin->id)
                        ->first();
        if(!$video2)
            $video2 = Video::whereIn('order', ['second'])
                        ->where('user_id' , $admin->id)
                        ->first();
        $main_videos = [
            $video1,$video2
        ];
        $main_videos = array_filter($main_videos);
        $offer = Offer::where('user_id', $user->id)->first();
        if(!$offer)
            $offer = Offer::where('user_id', $admin->id)->first();

        $contacts = Contact::where('user_id', $user->id)->get();
        if($contacts->isEmpty())
            $contacts = Contact::where('user_id', $admin->id)->get();
        $faqs = Faq::where('user_id', $admin->id)->get();
        $about_us = Info::where([ 'type' => 'about_us', 'user_id' => $user->id ])->first();
        if(!$about_us)
            $about_us = Info::where([ 'type' => 'about_us', 'user_id' => $admin->id ])->first();
        $our_product = Info::where([ 'type' => 'our_product', 'user_id' => $user->id ])->first();
        if(!$our_product)
            $our_product = Info::where([ 'type' => 'our_product', 'user_id' => $admin->id ])->first();
        $undecided = Info::where([ 'type' => 'undecided', 'user_id' => $user->id ])->first();
        if(!$undecided)
            $undecided = Info::where([ 'type' => 'undecided', 'user_id' => $admin->id ])->first();
        return view('site/index', [
                                    'user'          => $user,
                                    'videos'        => $videos,
                                    'code'          => $user->username,
                                    'partner'       => $partner,
                                    'offer'         => $offer,
                                    'contacts'      => $contacts,
                                    'faqs'          => $faqs,
                                    'about_us'      => $about_us,
                                    'our_product'   => $our_product,
                                    'undecided'     => $undecided,
                                    'main_videos'   => $main_videos,
                                ]);
    }
}
