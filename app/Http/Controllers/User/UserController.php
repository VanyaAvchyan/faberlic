<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Partner;
use App\Video;
use App\Offer;
use App\Contact;
use App\Faq;
use App\Http\Requests\PartnerRequest;

class UserController extends Controller 
{
    public function __construct() {
        $this->middleware('User', ['except' => ['getLogin', 'getLogout', 'postLogin', 'getUser']]);
    }

    public function getIndex()
    {
        return view('user/index');
    }

    public function getLogin()
    {
        return view('user/login');
    }

    public function getLogout()
    {
        auth()->logout();
        return view('user/login');
    }

    public function postLogin()
    {
        if (auth()->attempt(request()->only('username', 'password')))
        {
            return redirect('user');
        }
        return redirect('user/login');
    }

    public function postCreate()
    {
        $user = request()->except('_token');
        $user['password'] = bcrypt($user['password']);
        if(!User::create($user))
            return redirect()->back()->with('error', 'Error !');
        return redirect()->back()->with('success', 'Success !');
    }

    public function getPartners()
    {
        $model = Partner::first();
        return view('user/partners', ['model' => $model]);
    }

    public function postPartner(PartnerRequest $request)
    {
        $partner = $request->except('_token');
        $partner['user_id'] = auth()->user()->id;
        Partner::create($partner);
        return redirect()->back()->with('success', 'Success !');
    }

    public function putPartner(PartnerRequest $request)
    {
        $partner = $request->except('_method','_token');
        Partner::first()->update($partner);
        return redirect()->back()->with('success', 'Success !');
    }

    public function getVideo($id)
    {
        $model = Video::find($id);
        if($id > 2)
            return redirect('user');
        return view('user/video', ['model' => $model, 'video_num' => $id]);
    }

    public function postVideo($id)
    {
        $video = request()->except('_method', '_token');
        $video['id'] = $id;
        $video['user_id'] = auth()->user()->id;
        Video::create($video);
        return redirect()->back()->with('success', 'Success !');
    }

    public function putVideo($id)
    {
        $video = request()->except('_method','_token');
        $video['user_id'] = auth()->user()->id;
        Video::where('id', $id)->update($video);
        return redirect()->back()->with('success', 'Success !');
    }

    public function getOffer()
    {
        $model = Offer::first();
        return view('user/offer', ['model' => $model]);
    }
    
    public function postOffer()
    {
        $offer = request()->except('_method', '_token');
        $offer['user_id'] = auth()->user()->id;
        Offer::create($offer);
        return redirect()->back()->with('success', 'Success !');
    }

    public function putOffer()
    {
        $offer = request()->except('_method','_token');
        $offer['user_id'] = auth()->user()->id;
        Offer::first()->update($offer);
        return redirect()->back()->with('success', 'Success !');
    }

    /**
     * Contact
     */
    public function getContact($id = false)
    {
        $model = Contact::find($id);
        if($id && !$model)
            return redirect('user/contact');
        $models = Contact::all();
        return view('user/contacts', ['model' => $model, 'models' => $models]);
    }
    
    public function postContact()
    {
        $data = request()->except('_method', '_token');
        $data['user_id'] = auth()->user()->id;
        Contact::create($data);
        return redirect()->back()->with('success', 'Success !');
    }

    public function putContact($id)
    {
        $data = request()->except('_method','_token');
        $data['user_id'] = auth()->user()->id;
        Contact::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Success !');
    }

    public function deleteContact($id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Success !');
    }
    
    /**
     * F.A.Q
     */
    public function getFaq($id = false)
    {
        $model = Faq::find($id);
        if($id && !$model)
            return redirect('user/faq');
        $models = Faq::all();
        return view('user/faqs', ['model' => $model, 'models' => $models]);
    }
    
    public function postFaq()
    {
        $data = request()->except('_method', '_token');
        $data['user_id'] = auth()->user()->id;
        Faq::create($data);
        return redirect()->back()->with('success', 'Success !');
    }

    public function putFaq($id)
    {
        $data = request()->except('_method','_token');
        $data['user_id'] = auth()->user()->id;
        Faq::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Success !');
    }

    public function deleteFaq($id)
    {
        Faq::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Success !');
    }
    
}