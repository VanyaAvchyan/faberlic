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
use Image, File;

use App\Http\Requests\PartnerRequest;
use App\Http\Requests\UserRequest;

class UserController extends Controller 
{
    public function __construct()
    {
        $this->middleware('User', ['except' => ['getLogin', 'getLogout', 'postLogin', 'getUser']]);
    }

    public function getIndex($id = false)
    {
        return view('user/index',['user' => auth()->user()]);
    }

    public function getUsers($id=false)
    {
        $model = null;
        if($id)
        {
            $model = User::where(['id' => $id])->first();
            if(!$model)
                return redirect('user/faq');
        }
        $models = User::where('role', '!=', 1)->get();
        return view('user/users', ['model' => $model, 'models' => $models]);
    }
    // User
    public function postCreate(UserRequest $request)
    {
        $user = $request->except('_method', '_token');
        $user['banned'] = $request->get('banned') ? 1: 0;
        $user['password'] = bcrypt($user['password']);
        $user['role'] = 2;
        if(!User::create($user))
            return redirect()->back()->with('error', 'Error !');
        return redirect()->back()->with('success', 'Success !');
    }

    public function putUser($id)
    {
        if(auth()->user()->role === 1)
        {
            $user = request()->except('_method', '_token');
            $user['banned'] = request()->get('banned') ? 1: 0;
            if($user['password'])
                $user['password'] = bcrypt($user['password']);
            if(!User::where('id', $id)->update($user))
                return redirect()->back()->with('error', 'Error !');
            return redirect('user/users')->with('success', 'Success !');
        }
        return redirect()->back()->with('error', 'Error !');
    }

    public function putUpdate(UserRequest $request)
    {
        $user = $request->except('_method', '_token');
        if($user['password'])
            $user['password'] = bcrypt($user['password']);
        else
            unset($user['password']);
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $filename = uniqid().'.'.$file->getClientOriginalExtension();
            $user['avatar'] = $filename;
            $path = public_path('uploads/user/'.$filename);
            if(File::exists(public_path('uploads/user/'. auth()->user()->avatar)))
                File::delete(public_path('uploads/user/'. auth()->user()->avatar));
            Image::make($file)->save($path);
        }
        if(!User::where('id', auth()->user()->id)->update($user))
            return redirect()->back()->with('error', 'Error !');
        return redirect()->back()->with('success', 'Success !');
    }
    
    public function deleteUsers($id)
    {
        if(auth()->user()->role === 1)
        {
            User::where('id', '!=' , auth()->user()->id)
                    ->where('id', $id)
                    ->delete();
            
            return redirect()->back()->with('success', 'Success !');
        }
        return redirect()->back()->with('error', 'Have\'t permissions !!!');
    }

    
    public function getLogin()
    {
        if(auth()->check())
            return redirect ('user');
        return view('user/login');
    }

    public function getLogout()
    {
        auth()->logout();
        return view('user/login');
    }

    public function postLogin()
    {
        auth()->logout();
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
        $model = Info::where( [ 'type' => $type, 'user_id' => auth()->user()->id ] )->first();
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
        Info::where( [ 'type' => $type, 'user_id' => auth()->user()->id ] )->update($info);
        return redirect()->back()->with('success', 'Success !');
    }

    // Partner
    public function getPartners()
    {
        $model = Partner::where(['user_id' => auth()->user()->id])->first();
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
        Partner::where(['user_id' => auth()->user()->id])->first()->update($partner);
        return redirect()->back()->with('success', 'Success !');
    }

    // Video
    public function getVideo($id=null)
    {
        $models = $model = [];
        if($id == 'first' or $id == 'second')
        {
            $model = Video::where(['user_id' => auth()->user()->id, 'order' => $id])->first();
        } elseif($id) {
            $model = Video::whereNotIn('order', ['first', 'second'])
                        ->where('user_id' , auth()->user()->id)
                        ->where('id' , $id)
                        ->first();
        } else {
            $models = Video::whereNotIn('order', ['first', 'second'])
                        ->where('user_id' , auth()->user()->id)
                        ->get();
        }
        return view('user/video', ['model' => $model, 'models' => $models, 'order' => $id]);
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
        if($id == 'first' or $id == 'second')
        {
            Video::where(['order' => $id, 'user_id' => $video['user_id']])->update($video);
        } else {
            Video::where(['id' => $id, 'user_id' => $video['user_id']])->update($video);
        }
        if($id == 'first' or $id == 'second')
            return redirect()->back()->with('success', 'Success !');
        return redirect('user/video')->with('success', 'Success !');
        
    }

    public function deleteVideo($id)
    {
        Video::where(['id' => $id, 'user_id' => auth()->user()->id])->delete();
        return redirect()->back()->with('success', 'Success !');
    }

    // Offer
    public function getOffer()
    {
        $model = Offer::where(['user_id' => auth()->user()->id])->first();
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
        Offer::where(['user_id' => auth()->user()->id])->update($offer);
        return redirect()->back()->with('success', 'Success !');
    }

    /**
     * Contact
     */
    public function getContact($id = false)
    {
        $model = null;
        if($id)
        {
            $model = Contact::where(['id' => $id, 'user_id' => auth()->user()->id])->first();
            if(!$model)
                return redirect('user/contact');
        }
        $models = Contact::where(['user_id' => auth()->user()->id ])->get();
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
        Contact::where([ 'id' => $id, 'user_id' => auth()->user()->id ])->update($data);
        return redirect()->back()->with('success', 'Success !');
    }

    public function deleteContact($id)
    {
        Contact::where([ 'id' => $id, 'user_id' => auth()->user()->id ])->delete();
        return redirect()->back()->with('success', 'Success !');
    }
    
    /**
     * F.A.Q
     */
    public function getFaq($id = false)
    {
        $model = null;
        if($id)
        {
            $model = Faq::where(['id' => $id, 'user_id' => auth()->user()->id])->first();
            if(!$model)
                return redirect('user/faq');
        }
        $models = Faq::where(['user_id' => auth()->user()->id ])->get();
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
        Faq::where([ 'id' => $id, 'user_id' => auth()->user()->id ])->update($data);
        return redirect('user/faq')->with('success', 'Success !');
    }

    public function deleteFaq($id)
    {
        Faq::where([ 'id' => $id, 'user_id' => auth()->user()->id ])->delete();
        return redirect()->back()->with('success', 'Success !');
    }
}