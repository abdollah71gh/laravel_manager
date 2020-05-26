<?php

namespace App\Http\Controllers\front;
use App\frontmodels\About;
use App\frontmodels\Portfolio;
use App\frontmodels\Article;
use App\frontmodels\Maniger;
use App\frontmodels\Skill;
use App\frontmodels\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $protfolios = Portfolio::orderBy('id', 'DESC')->get();
        $teams=Team::orderBy('id', 'DESC')->get();
        $manigers=Maniger::orderBy('id', 'DESC')->get();
        $abouts=About::orderBy('id', 'DESC')->get();
        $skills=Skill::all();
        $tag=$protfolios->unique('tag');

        return view('front.main' ,compact('protfolios','tag','teams','manigers','abouts','skills'));
    }
}
