<?php

namespace App\Http\Controllers;
use App\Models\DocumentType;
use App\Models\G2GDocument;
use App\Models\OthersDocument;
use Illuminate\Http\Request;
use App\Models\Ministry;
use App\Models\ImplementingAgency;
use App\Models\Project;
use App\User;
use DataTables;
use Illuminate\Support\Facades\Gate;
use Validator;
use Response;
use Session;
use Image;
use Auth;
use DB;

class DashboardController extends Controller
{	//------------------------ ministy ------------------//
	public function ministryList(Request $request) {
        Gate::authorize('app.dashboard.index');
        if ($request->ajax()) {
            $alldata= Ministry::where('status', '1')->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view('dashboard.ministry-list');
    }

    //------------------------ implementing agency ------------------//
	public function implementingAgencyList(Request $request,$id) {
        Gate::authorize('app.dashboard.index');
		$ministryid = $id;
        if ($request->ajax()) {
            $alldata= ImplementingAgency::where([['ministry_id',$id],['status', '1']])->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view('dashboard.implementing-agency-list',compact('ministryid'));
    }

    //------------------------ project list ------------------//
	public function projectList(Request $request,$id) {
        Gate::authorize('app.dashboard.index');
		$iaid = $id;
        if ($request->ajax()) {
            $alldata= Project::with(['sector','ministry','agency','approval','partner','location','cost','feasibility','construction','phase','subphase'])
								->where([['implementing_agency_id',$id],['status', '1']])
								->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view('dashboard.project-list',compact('iaid'));
    }

    //------------------------ identitification phase ------------------//
	public function identitificationPhaseProject(Request $request) {
        Gate::authorize('app.dashboard.index');
        if ($request->ajax()) {
            $alldata= Project::with(['sector','ministry','agency','approval','partner','location','cost','feasibility','construction','phase','subphase'])
								->where([['phase_id',1],['status', '1']])
								->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view('dashboard.identitification-phase-project');
    }

    //------------------------ development phase ------------------//
	public function developmentPhaseProject(Request $request) {
        Gate::authorize('app.dashboard.index');
        if ($request->ajax()) {
            $alldata= Project::with(['sector','ministry','agency','approval','partner','location','cost','feasibility','construction','phase','subphase'])
								->where([['phase_id',2],['status', '1']])
								->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view('dashboard.development-phase-project');
    }

    //------------------------ procurement phase ------------------//
	public function procurementPhaseProject(Request $request) {
        Gate::authorize('app.dashboard.index');
        if ($request->ajax()) {
            $alldata= Project::with(['sector','ministry','agency','approval','partner','location','cost','feasibility','construction','phase','subphase'])
								->where([['phase_id',3],['status', '1']])
								->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view('dashboard.procurement-phase-project');
    }

    //------------------------ award phase ------------------//
	public function awardPhaseProject(Request $request) {
        Gate::authorize('app.dashboard.index');
        if ($request->ajax()) {
            $alldata= Project::with(['sector','ministry','agency','approval','partner','location','cost','feasibility','construction','phase','subphase'])
								->where([['phase_id',4],['status', '1']])
								->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view('dashboard.award-phase-project');
    }

    //------------------------ implementation phase ------------------//
	public function implementationPhaseProject(Request $request) {
        Gate::authorize('app.dashboard.index');
        if ($request->ajax()) {
            $alldata= Project::with(['sector','ministry','agency','approval','partner','location','cost','feasibility','construction','phase','subphase'])
								->where([['phase_id',5],['status', '1']])
								->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view('dashboard.implementation-phase-project');
    }
    
    //------------------------ documents ------------------//
	public function document(Request $request) {
        Gate::authorize('app.dashboard.index');
        if ($request->ajax()) {
            $alldata= DocumentType::with(['documents'])->where('status', '1')->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view('dashboard.document-title');
    }

    //------------------------ document projects ------------------//
	public function documentProjects(Request $request, $id) {
        Gate::authorize('app.dashboard.index');
        $titleId = $id;
        if ($request->ajax()) {
            $alldata= OthersDocument::with(['project','project.sector','project.ministry','project.agency','document'])->where([['document_type_id',$request->id],['status', '1']])->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view('dashboard.document-project',compact('titleId'));
    }
    
    
    //------------------------ document projects ------------------//
	public function g2gProjects(Request $request) {
        Gate::authorize('app.dashboard.index');
        if ($request->ajax()) {
            $alldata= G2GDocument::with(['project','project.sector','project.ministry','project.agency','country'])->get();
            return DataTables::of($alldata)
            ->addIndexColumn()->make(True);
        }
        return view('dashboard.g2g-project');
    }

}
