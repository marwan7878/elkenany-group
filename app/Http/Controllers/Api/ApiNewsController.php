<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;



class ApiNewsController extends Controller
{
    public function index()
    {
        $news = News::with(['category' => function ($query) {
            $query->select('id','name_ar','name_en');
        }])
        ->get();
        $data = array();
        
        foreach($news as &$event)
        {
            if($event->language == 'ar')
            {
                $data['ar'] = $event;
                $data['en'] = null;
            }
            else
            {
                $data['en'] = $event;
                $data['ar'] = null;
            }
        }
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $event = News::where('id' , $id)
            ->with(['category' => function ($query) {
            $query->select('id','name_ar','name_en');
        }])
        ->first();
        $data = array();
        
        if($event->language == 'ar')
        {
            $data['ar'] = $event;
            $data['en'] = null;
        }
        else
        {
            $data['en'] = $event;
            $data['ar'] = null;
        }
        return response()->json($data, 200);
    }

    public function search(Request $request)
    {
        $event = News::where('title', 'LIKE', "%{$request->title}%")->first();
        return response()->json($event, 200);
    }

}
