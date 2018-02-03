<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Partner;
use App\Video;
use App\Offer;
use App\Contact;
use App\Faq;
use App\Info;
use App\Image;

use App\Http\Requests\PartnerRequest;
use App\Http\Requests\UserRequest;

class UserController extends Controller 
{
    public function __construct()
    {
        $this->middleware('User', ['except' => ['getLogin', 'getLogout', 'postLogin', 'getUser']]);
    }

    public function getIndex()
    {
        return view('user/index',['user' => auth()->user()]);
    }

    // User
    public function postCreate()
    {
        $user = request()->except('_token');
        $user['password'] = bcrypt($user['password']);
        if(!User::create($user))
            return redirect()->back()->with('error', 'Error !');
        return redirect()->back()->with('success', 'Success !');
    }

    public function putUpdate(UserRequest $request)
    {
        $user = $request->except('_method', '_token');
        if($user['password'])
            $user['password'] = bcrypt($user['password']);
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $filename = uniqid().'.'.$file->getClientOriginalExtension();
            $user['avatar'] = $filename;
            $path = url().'/uploads/user/'.$filename;
            Image::make($file)->save($path);
        }
        dd($user);
        if(!User::create($user))
            return redirect()->back()->with('error', 'Error !');
        return redirect()->back()->with('success', 'Success !');
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

    // Info
    public function getInfo($type=false)
    {
        if(!$type)
            return redirect('user');
        $model = Info::where( 'type', $type )->first();
        return view('user/info', ['model' => $model, 'type' => $type ]);
    }

    public function postInfo()
    {
        $partner = request()->except('_token');
        $partner['user_id'] = auth()->user()->id;
        Info::create($partner);
        return redirect()->back()->with('success', 'Success !');
    }

    public function putInfo()
    {
        $info = request()->except('_method','_token');
        $type = request()->get('type');
        Info::where( 'type', $type )->update($info);
        return redirect()->back()->with('success', 'Success !');
    }

    // Partner
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

    // Video
    public function getVideo($id=null)
    {
        if($id)
            $model = Video::find($id);
        else
            $model = Video::where('id', '>', 2)->get();
        return view('user/video', ['model' => $model, 'video_num' => $id]);
    }

    public function postVideo()
    {
        $video = request()->except('_method', '_token');
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

    public function deleteVideo($id)
    {
        Video::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Success !');
    }

    // Offer
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