@extends('layouts.layout')
@section('title', 'Project Profile')
@section('content')
<!-- Content Header (Page header) -->
<?php
  $baseUrl = URL::to('/');
?>
<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">
  <!-- Content wrapper start -->
  <div class="content-wrapper">
    <!-- Row start -->
    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <?php 
          //--------------------------------------- set progress color -----------------------------------------//
          $color1 =''; 
          $color2 =''; 
          $color3 =''; 
          $color4 =''; 
          $color5 =''; 
          $notyet ='Not Yet'; 
          //--------------------------------------- identitification phase -----------------------------------------//
          $color1of1 = DB::table('phase_details')->where([['project_id',$single_data->id],['phase_id',1]])->count();
          $phase1details = DB::table('phase_details')->where([['project_id',$single_data->id],['phase_id',1]])->get();
          if ( ($color1of1 > 0) &&  ($color1of1 < 4) ) {
            $color1 = 'warning';
          } elseif( ($color1of1 == 4) || ($color1of1 > 4)) {
            $color1 = 'success';
          }else{
            $color1 = 'info';
          }
          
          //--------------------------------------- development phase -----------------------------------------//
          $color2of1 = DB::table('phase_details')->where([['project_id',$single_data->id],['phase_id',2]])->count();
          $phase2details = DB::table('phase_details')->where([['project_id',$single_data->id],['phase_id',2]])->get();
          if ( ($color2of1 > 0) && ($color2of1 < 10) ) {
            $color2 = 'warning';
          } elseif( ($color2of1 == 10) || ($color2of1 > 10)) {
            $color2 = 'success';
          }else{
            $color2 = 'info';
          }
          
          //--------------------------------------- procurement phase -----------------------------------------//
          $color3of1 = DB::table('phase_details')->where([['project_id',$single_data->id],['phase_id',3]])->count();
          $phase3details = DB::table('phase_details')->where([['project_id',$single_data->id],['phase_id',3]])->get();
          if ( ($color3of1 > 0) &&  ($color3of1 < 8) ) {
            $color3 = 'warning';
          } elseif( ($color3of1 == 8) || ($color3of1 > 8)) {
            $color3 = 'success';
          }else{
            $color3 = 'info';
          }

          //--------------------------------------- award phase -----------------------------------------//
          $color4of1 = DB::table('phase_details')->where([['project_id',$single_data->id],['phase_id',4]])->count();
          $phase4details = DB::table('phase_details')->where([['project_id',$single_data->id],['phase_id',4]])->get();
          if ( ($color4of1 > 0) &&  ($color4of1 < 6) ) {
            $color4 = 'warning';
          } elseif( ($color4of1 == 6) || ($color4of1 > 6)) {
            $color4 = 'success';
          }else{
            $color4 = 'info';
          }

          //--------------------------------------- implementation phase -----------------------------------------//
          $color5of1 = DB::table('phase_details')->where([['project_id',$single_data->id],['phase_id',5]])->count();
          $phase5details = DB::table('phase_details')->where([['project_id',$single_data->id],['phase_id',5]])->get();
          if ( ($color5of1 > 0) &&  ($color5of1 < 2) ) {
            $color5 = 'warning';
          } elseif( ($color5of1 == 2) || ($color5of1 > 2)) {
            $color5 = 'success';
          }else{
            $color5 = 'info';
          }
        ?>
        <div class="progress">
          <div class="progress-bar bg-{{$color1}}" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
            <p>
              <a class="btn btn-{{$color1}}" id="Ident" data-bs-toggle="collapse" href="#Identification" role="button" aria-expanded="false" aria-controls="Identification">
                Identification
              </a>
            </p>
          </div>
          <div class="progress-bar bg-{{$color2}}" role="progressbar" style="width: 20%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
            <p>
              <a class="btn btn-{{$color2}}" id="Dev" data-bs-toggle="collapse" href="#Development" role="button" aria-expanded="false" aria-controls="Development">
              Development
              </a>
            </p>
          </div>
          <div class="progress-bar bg-{{$color3}}" role="progressbar" style="width: 20%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
            <p>
              <a class="btn btn-{{$color3}}" id="Pro" data-bs-toggle="collapse" href="#Procurement" role="button" aria-expanded="false" aria-controls="Procurement">
              Procurement
              </a>
            </p>
          </div>
          <div class="progress-bar bg-{{$color4}}" role="progressbar" style="width: 20%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
            <p>
              <a class="btn btn-{{$color4}}" id="Awa" data-bs-toggle="collapse" href="#Award" role="button" aria-expanded="false" aria-controls="Award">
                Award
              </a>
            </p>
          </div>
          <div class="progress-bar bg-{{$color5}}" role="progressbar" style="width: 20%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
            <p>
              <a class="btn btn-{{$color5}}" id="Imp" data-bs-toggle="collapse" href="#Implementation" role="button" aria-expanded="false" aria-controls="Implementation">
                Implementation
              </a>
            </p>
          </div>
        </div>
        <div class="collapse" id="Identification">
            <div class="card card-body">
              <div class="table-responsive">
                  <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td colspan="3" style="text-align:center">Phase Status</td>
                        </tr> 
                        <tr>
                          <td>Date</td>
                          <td colspan="2">Description</td>
                        </tr> 
                        @if(count($phase1details))
                        @foreach($phase1details as $p1d)
                        <tr>
                          <td>{{date('d-m-Y',strtotime($p1d->date))}}</td>
                          <td colspan="2">{{$p1d->des}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                          <td colspan="3" style="text-align:center">No data found...........</td>
                        </tr>
                        @endif
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
        <div class="collapse" id="Development">
            <div class="card card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td colspan="3" style="text-align:center">Phase Status</td>
                      </tr> 
                      <tr>
                        <td>Date</td>
                        <td colspan="2">Description</td>
                      </tr> 
                      @if(count($phase2details))
                      @foreach($phase2details as $p2d)
                      <tr>
                        <td>{{date('d-m-Y',strtotime($p2d->date))}}</td>
                        <td colspan="2">{{$p2d->des}}</td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td colspan="3" style="text-align:center">No data found...........</td>
                      </tr>
                      @endif
                    </tbody>
                </table>
              </div>
            </div>
        </div>
        <div class="collapse" id="Procurement">
            <div class="card card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td colspan="3" style="text-align:center">Phase Status</td>
                      </tr> 
                      <tr>
                        <td>Date</td>
                        <td colspan="2">Description</td>
                      </tr> 
                      @if(count($phase3details))
                      @foreach($phase3details as $p3d)
                      <tr>
                        <td>{{date('d-m-Y',strtotime($p3d->date))}}</td>
                        <td colspan="2">{{$p3d->des}}</td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td colspan="3" style="text-align:center">No data found...........</td>
                      </tr>
                      @endif
                    </tbody>
                </table>
              </div>
            </div>
        </div>
        <div class="collapse" id="Award">
            <div class="card card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td colspan="3" style="text-align:center">Phase Status</td>
                      </tr> 
                      <tr>
                        <td>Date</td>
                        <td colspan="2">Description</td>
                      </tr> 
                      @if(count($phase4details))
                      @foreach($phase4details as $p4d)
                      <tr>
                        <td>{{date('d-m-Y',strtotime($p4d->date))}}</td>
                        <td colspan="2">{{$p4d->des}}</td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td colspan="3" style="text-align:center">No data found...........</td>
                      </tr>
                      @endif
                    </tbody>
                </table>
              </div>
            </div>
        </div>
        <div class="collapse" id="Implementation">
            <div class="card card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td colspan="3" style="text-align:center">Phase Status</td>
                      </tr> 
                      <tr>
                        <td>Date</td>
                        <td colspan="2">Description</td>
                      </tr> 
                      @if(count($phase5details))
                      @foreach($phase5details as $p5d)
                      <tr>
                        <td>{{date('d-m-Y',strtotime($p5d->date))}}</td>
                        <td colspan="2">{{$p5d->des}}</td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td colspan="3" style="text-align:center">No data found...........</td>
                      </tr>
                      @endif
                    </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Project Profile || Updated At: {{$single_data->updated_at}}</h3>
            <a onclick="printReport();" href="javascript:0;"><img class="img-thumbnail" style="width:30px;" src='{{asset("custom/img/print.png")}}'></a>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12" id="printTable">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="example" style="width:100%: font-size:20px"> 
                      <tbody>
                        <tr> 
                          <td style="text-align:center" colspan="3">
                            <img class="profile-user-img img-responsive " src="{{asset('upload/logo/logo1.png')}}" height="45px" alt="User profile picture">
                          </td>
                          <td style="text-align:center" colspan="2">
                            <img class="profile-user-img img-responsive " src="{{asset('upload/logo/logo2.png')}}" height="45px" alt="User profile picture">
                          </td>
                          <td style="text-align:center" colspan="2">
                            <img class="profile-user-img img-responsive " src="{{asset('upload/logo/logo1.png')}}" height="45px" alt="User profile picture">
                          </td>
                          <td style="text-align:center" colspan="3">
                            <img class="profile-user-img img-responsive " src="{{asset('upload/logo/logo2.png')}}" height="45px" alt="User profile picture">
                          </td>
                        </tr>
                        <tr> 
                          <td colspan="10" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> <h4 style="text-align:center">{{$single_data->name}}</h4> </td>
                        </tr>
                        <tr> 
                          <td colspan="10" style="border: 1px solid #ddd; padding: 3px 3px; text-align:center">
                            @if (!empty($single_data->image))
                            <img class="profile-user-img img-responsive " src="{{asset('upload/project/'.$single_data->image)}}" alt="User profile picture">
                            @else
                            <img class="profile-user-img img-responsive " src="{{asset('upload/logo/no-image.jpg')}}" height="45px" alt="User profile picture">
                            @endif
                          </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Information:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset"> Details </td>
                        </tr>
                        <tr style="background: green; color:white"> 
                          <td colspan="10" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:left"> <b>Project Summery</b> </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b> Project Name:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->name}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Sector:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->sector->name}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b> Location:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->location->name}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b> Area:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->area}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Background:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {!! $single_data->background !!} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Project Scope:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {!! $single_data->project_scope !!} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Objective:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {!! $single_data->objective !!} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Procurement Method:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify">
                             {{!empty($procurementPhaseDetails->g2g_basis) ? "G2G Basis: ".$procurementPhaseDetails->g2g_basis.", " : ''}}
                             {{!empty($procurementPhaseDetails->country) ? "Country: ".$procurementPhaseDetails->country.", " : ''}}
                             {{!empty($procurementPhaseDetails->procurement_type) ? "Procurement Type: ".$procurementPhaseDetails->procurement_type.", " : ''}}
                             {{!empty($procurementPhaseDetails->procurement_method) ? "Procurement Method: ".$procurementPhaseDetails->procurement_method.", " : ''}}
                             {{!empty($procurementPhaseDetails->stages) ? "Stages: ".$procurementPhaseDetails->stages.", " : ''}}
                             {{!empty($procurementPhaseDetails->envelope) ? "Envelope: ".$procurementPhaseDetails->envelope.", " : ''}}
                             {{!empty($procurementPhaseDetails->negotiation) ? "Negotiation: ".$procurementPhaseDetails->negotiation.", " : ''}}
                             {{!empty($procurementPhaseDetails->swiss_challenge) ? "Swiss Challenge: ".$procurementPhaseDetails->swiss_challenge.", " : ''}}
                          </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b> Key Features/Output:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->key_feature}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b> Economic Life:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->economic_life}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b> Contract Term:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->contract_term}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b> Construction Time:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->construction_time}} </td>
                        </tr>
                        <tr style="background: green; color:white"> 
                          <td colspan="10" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:left"> <b>Project Structure/Model</b> </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>PPP Structure:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->delivery_model)) ? $single_data->delivery_model : '' }} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>PPP Reveneue Model:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->revenue_model)) ? $single_data->revenue_model : '' }} </td>
                        </tr>
                        <tr style="background: green; color:white"> 
                          <td colspan="10" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:left"> <b>Project Estimated Cost per PFS/DFS</b> </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Total Estimated Capital Cost:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->capital_cost)) ? $single_data->capital_cost : '' }} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Total Project Cost:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->project_cost)) ? $single_data->project_cost : '' }} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Leverage (Debt to equity ratio):</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->leverage)) ? $single_data->leverage : '' }} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>VGF amount %:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->vgf_amount_percent)) ? $single_data->vgf_amount_percent : '' }} </td>
                        </tr>
                        <tr style="background: green; color:white"> 
                          <td colspan="10" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:left"> <b>Stakeholder Details</b> </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Grantor:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->grantor}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Division/Ministry:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->ministry->name}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Contracting Authority:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->agency->name}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Private Partner / Project Company:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{($single_data->partner->name != null)?$single_data->partner->name:'Not Yet'}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Shareholders (with Equity %):</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->shareholders}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Lenders (with amount and %):</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->lenders}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>EPC Contractor’s:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->epc_contractors}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>O & M Contractor’s:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->o_m_contractors}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Independent Engineer:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->independent_engineer}} </td>
                        </tr>
                        <tr style="background: green; color:white"> 
                          <td colspan="10" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:left"> <b>Key dates</b> </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Project Screening Date:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->screening_date)) ? date('d-m-Y',strtotime($single_data->screening_date)) : ''}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>In-Principle Approval Date:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->in_princeple_approval)) ? date('d-m-Y',strtotime($single_data->in_princeple_approval)) : ''}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Final Approval Date:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->final_approval)) ? date('d-m-Y',strtotime($single_data->final_approval)) : ''}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Concession Signing Date:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->contract_signing)) ? date('d-m-Y',strtotime($single_data->contract_signing)) : ''}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Concession Period:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify">  {{$single_data->commencement_period}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Construction Commencement Date:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->commencement_date)) ? date('d-m-Y',strtotime($single_data->commencement_date)) : ''}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Construction Period:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->contract_period}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Completion Date:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->completion_date)) ? date('d-m-Y',strtotime($single_data->completion_date)) : ''}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Commercial Date:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{(!empty($single_data->commercial_date)) ? date('d-m-Y',strtotime($single_data->commercial_date)) : ''}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Construction Contractor:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{!empty($single_data->construction)?$single_data->construction->name:'Not Yet'}} </td>
                        </tr>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>TA Service Provider:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{($single_data->feasibility != null)?$single_data->feasibility->name:'Not Yet'}}</td>
                        <tr> 
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Present Status:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{($single_data->phase != null)?$single_data->phase->name:'Not Yet'}} ({{($single_data->subphase != null)?$single_data->subphase->name:'Not Yet'}}) </td>
                        <tr> 
                          <td style="border: 1px solid #ddd; padding: 3px 3px; text-align:right"><b>Note:</b></td>
                          <td colspan="9" style="border: 1px solid #ddd; padding: 3px 3px; white-space: unset; text-align:justify"> {{$single_data->note}} </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
  </div>
</div>
{!!Html::script('custom/js/jquery.min.js')!!}
<script>
  $(document).ready(function () {
    //------------- identitification---------------//
    $('#Ident').click(function (e) { 
      $('#Development').hide();
      $('#Procurement').hide();
      $('#Award').hide();
      $('#Implementation').hide();
      $('#Identification').show();
    });
    //------------- development---------------//
    $('#Dev').click(function (e) { 
      $('#Identification').hide();
      $('#Procurement').hide();
      $('#Award').hide();
      $('#Implementation').hide();
      $('#Development').show();
    });
    //------------- procurement---------------//
    $('#Pro').click(function (e) { 
      $('#Identification').hide();
      $('#Award').hide();
      $('#Implementation').hide();
      $('#Development').hide();
      $('#Procurement').show();
    });
    //------------- award---------------//
    $('#Awa').click(function (e) { 
      $('#Identification').hide();
      $('#Implementation').hide();
      $('#Development').hide();
      $('#Procurement').hide();
      $('#Award').show();
    });
    //------------- implementation---------------//
    $('#Imp').click(function (e) { 
      $('#Identification').hide("slow");
      $('#Development').hide("slow");
      $('#Procurement').hide("slow");
      $('#Award').hide("slow");
      $('#Implementation').show(3000);
    });
  });
</script>
@endsection 