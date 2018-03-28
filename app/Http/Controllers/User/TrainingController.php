<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\User;
use App\Training;
use App\TrainingVideo;
use App\Http\Requests\TrainingVideosRequest;
use Hash, Cookie;
class TrainingController extends Controller 
{
    private $langs = [];
    public function __construct()
    {
        $this->langs = ['am','ru','en'];
    }

    public function getIndex()
    {
        return redirect('training/login');
    }

    public function getLogin($videoNum = false)
    {
        return view('trainings/login', ['trainingNum' => request()->get('trainingNum')]);
    }

    public function postLogin()
    {
        if (!auth()->attempt(request()->only('username', 'password')))
            return redirect()->back()->with('error', 'Incorrect username or password');

        $trainingIsEmpty = Training::where('level1',request()->get('reg_num'))
                                    ->orWhere('level2',request()->get('reg_num'))
                                    ->orWhere('level3',request()->get('reg_num'))
                                    ->get()
                                    ->isEmpty();
        $trainingNum = request()->has('trainingNum') ? request()->get('trainingNum'): 1;
        if(!$trainingIsEmpty)
        {
            Cookie::queue('has_training_access', $trainingNum, 120);
        }
        else
            return redirect()->back()->with('error', 'Incorrect access data');

        return redirect('training/videos/'.$trainingNum);
    }

    public function getVideos( $id = 1, $lang = 'am' )
    {
        if(!Cookie::get('has_training_access'))
            return redirect('training/login')->with('error', 'Access denied');
        if(Cookie::get('has_training_access')*1 !== $id*1)
            return redirect('training/login')->with('error', 'Access denied to training '.$id);

        if(!in_array($lang, $this->langs))
            return abort(404);
        if(!$id)
            return abort(404);
        $training = Training::first();
        $training_level = '';
        switch($id)
        {
            case 1 : $training_level = $training->level1; break;
            case 2 : $training_level = $training->level2; break;
            case 3 : $training_level = $training->level3; break;
            default : $training_level = '';
        }
        $training_videos = TrainingVideo::where('training_level', $training_level)->get();
//        dd($training_videos->count());
        return view('trainings/level', ['training_videos' => $training_videos, 'lang' => $lang]);
    }

    public function postCode()
    {
        $codes = request()->except('_token');
        $check = array_count_values($codes);
        if( max($check) > 1)
            return redirect()->back()->with ('error', 'Ձեր կոդը եզակի չէ');
        Training::create($codes);
        return redirect('user/trainings')->with ('success', 'Success!');
    }
    
    public function putCode()
    {
        $codes = request()->except('_token','_method');
        $check = array_count_values($codes);
        if( max($check) > 1)
            return redirect()->back()->with ('error', 'Ձեր կոդը եզակի չէ');
        
        Training::first()->update($codes);
        return redirect('user/trainings')->with ('success', 'Success!');
    }

    public function postVideo(TrainingVideosRequest $request)
    {
        $videos = request()->except('_token');

        TrainingVideo::create($videos);
        return redirect('user/training-videos');
    }

    public function putVideo(TrainingVideosRequest $request, $id)
    {
        $videos = request()->except('_token', '_method');
        TrainingVideo::where('id', $id)->update($videos);
        return redirect('user/training-videos');
    }

    public function deleteVideo($id)
    {
        TrainingVideo::find($id)->delete();
        return redirect()->back()->with ('success', 'Success !');
    }
    
}