<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Partner;
use App\Video;
class SiteController extends Controller 
{
    public function getIndex()
    {
        $partner = Partner::first();
        $video = Video::all();
        return view('site/index', [
                                    'user'    => auth()->user(),
                                    'video'   => $video,
                                    'code'    => 408134,
                                    'partner' => $partner
                                ]);
    }
}
