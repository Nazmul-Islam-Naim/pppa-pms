<?php

namespace App\Http\Controllers;

use App\Models\G2GDocument;
use App\Models\OthersDocument;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Ministry;
use App\Models\PrivatePartner;
use App\Models\ConstructionCompnay;
use Illuminate\Support\Facades\Gate;
use Session;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['project'] = Project::count();
        $data['sector'] = Sector::count();
        $data['ministry'] = Ministry::count();
        $data['privatepartner'] = PrivatePartner::count();
        $data['constructionagency'] = ConstructionCompnay::count();
        $data['identitification'] = Project::where('phase_id',1)->count();
        $data['development'] = Project::where('phase_id',2)->count();
        $data['procurement'] = Project::where('phase_id',3)->count();
        $data['award'] = Project::where('phase_id',4)->count();
        $data['implementation'] = Project::where('phase_id',5)->count();
        $data['cpObligations'] = Project::where([['phase_id',5],['sub_phase_id',29]])->count();
        $data['constructionsBegan'] = Project::where([['phase_id',5],['sub_phase_id',30]])->count();
        $data['document'] = OthersDocument::count();
        $data['g2g'] = G2GDocument::count();
        return view('user-home',$data);
    }

    public function selectBranch()
    {
        return view('branchPanelPopup');
    }

    public function adminSelectedDashboard($branch_id)
    {
        if(Auth::user()->user_type == 1)
        {
            session(['branch_id' => $branch_id]);
            return redirect('home');
        }
    }
}
