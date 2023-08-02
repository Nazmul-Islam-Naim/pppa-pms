@extends('layouts.frontend-app')
@section('content')

<!-- Bootstrap css -->
{!!Html::style('custom/css/bootstrap.min.css')!!}
<style>
   table.dataTable th {
    background: #186b59;
   }

</style>

<!--Activity Area Start-->
<div class="container pt-5">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
        <h5 class="card-title">Profile Of "{{$single_data->name}}"</h5>
        <p><small> Updated At: {{$single_data->updated_at}}</small></p>
        <span class="badge bg-info">Pending</span>
        <span class="badge bg-warning">Running</span>
        <span class="badge bg-success">Complete</span>
    </div>
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
      <div class="progress" style="height:25px">
        <div class="progress-bar bg-{{$color1}}" role="progressbar" style="width: 20%; padding:19px; border-radius:0px" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
          <p>
            <a class="btn btn-{{$color1}}" id="Ident" data-bs-toggle="collapse" href="#Identification" role="button" aria-expanded="false" aria-controls="Identification">
              Identification
            </a>
          </p>
        </div>
        <div class="progress-bar bg-{{$color2}}" role="progressbar" style="width: 20%; padding:19px; border-radius:0px" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
          <p>
            <a class="btn btn-{{$color2}}" id="Dev" data-bs-toggle="collapse" href="#Development" role="button" aria-expanded="false" aria-controls="Development">
            Development
            </a>
          </p>
        </div>
        <div class="progress-bar bg-{{$color3}}" role="progressbar" style="width: 20%; padding:19px; border-radius:0px" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
          <p>
            <a class="btn btn-{{$color3}}" id="Pro" data-bs-toggle="collapse" href="#Procurement" role="button" aria-expanded="false" aria-controls="Procurement">
            Procurement
            </a>
          </p>
        </div>
        <div class="progress-bar bg-{{$color4}}" role="progressbar" style="width: 20%; padding:19px; border-radius:0px" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
          <p>
            <a class="btn btn-{{$color4}}" id="Awa" data-bs-toggle="collapse" href="#Award" role="button" aria-expanded="false" aria-controls="Award">
              Award
            </a>
          </p>
        </div>
        <div class="progress-bar bg-{{$color5}}" role="progressbar" style="width: 20%; padding:19px; border-radius:0px" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
          <p>
            <a class="btn btn-{{$color5}}" id="Imp" data-bs-toggle="collapse" href="#Implementation" role="button" aria-expanded="false" aria-controls="Implementation">
              Implementation
            </a>
          </p>
        </div>
      </div>
      <div class="collapse" id="Identification">
          <div class="card card-body bg-{{$color1}}">
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
          <div class="card card-body bg-{{$color2}}">
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
        <div class="card card-body bg-{{$color3}}">
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
          <div class="card card-body bg-{{$color4}}">
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
          <div class="card card-body bg-{{$color5}}">
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
          
        </div>
        <div class="card-body">
          <!-- Faq start -->
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne"  style="border-bottom:1px solid #ddd">
                    <button class="accordion-button collapsed btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <h6> Project Summery</h6>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                       <p ><strong>Project Name:</strong> {{$single_data->name}}</p>
                       <p ><strong>Sector:</strong> {{$single_data->sector->name}}</p>
                       <p ><strong>Location:</strong> {{$single_data->location->name}}</p>
                       <p ><strong>Area:</strong> {{$single_data->area}}</p>
                       <p ><strong>Background:</strong> {!! $single_data->background !!}</p>
                       <p ><strong>Scope in Brief:</strong> {!! $single_data->project_scope !!}</p>
                       <p ><strong>Objectives:</strong> {!! $single_data->objective !!}</p>
                       <p ><strong>Procurement Method:</strong>
                        {{!empty($procurementPhaseDetails->g2g_basis) ? "G2G Basis: ".$procurementPhaseDetails->g2g_basis.", " : ''}}
                        {{!empty($procurementPhaseDetails->country) ? "Country: ".$procurementPhaseDetails->country.", " : ''}}
                        {{!empty($procurementPhaseDetails->procurement_type) ? "Procurement Type: ".$procurementPhaseDetails->procurement_type.", " : ''}}
                        {{!empty($procurementPhaseDetails->procurement_method) ? "Procurement Method: ".$procurementPhaseDetails->procurement_method.", " : ''}}
                        {{!empty($procurementPhaseDetails->stages) ? "Stages: ".$procurementPhaseDetails->stages.", " : ''}}
                        {{!empty($procurementPhaseDetails->envelope) ? "Envelope: ".$procurementPhaseDetails->envelope.", " : ''}}
                        {{!empty($procurementPhaseDetails->negotiation) ? "Negotiation: ".$procurementPhaseDetails->negotiation.", " : ''}}
                        {{!empty($procurementPhaseDetails->swiss_challenge) ? "Swiss Challenge: ".$procurementPhaseDetails->swiss_challenge.", " : ''}} 
                      </p>
                      <p ><strong>Key Features/ Output:</strong> {{$single_data->key_feature}}</p>
                      <p ><strong>Economic Life:</strong> {{$single_data->economic_life}}</p>
                      <p ><strong>Contract Term:</strong> {{$single_data->contract_term}}</p>
                      <p ><strong>Construction Time:</strong> {{$single_data->construction_time}}</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo" style="border-bottom:1px solid #ddd">
                    <button class="accordion-button collapsed btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h6>Project Structure/Revenue Model</h6>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                       <p ><strong>PPP Structure:</strong> {{$single_data->delivery_model}}</p>
                       <p ><strong>Revenue Model:</strong> {{$single_data->revenue_model}}</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree" style="border-bottom:1px solid #ddd">
                    <button class="accordion-button collapsed btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <h6>Project Estimated Cost per PFS/DFS</h6>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      <p ><strong>Total Estimated Capital Cost:</strong> {{$single_data->capital_cost}}</p>
                      <p ><strong>Total Estimated project Cost:</strong> {{$single_data->project_cost}}</p>
                      <p ><strong>Leverage (Debt to Equity Ratio):</strong> {{$single_data->leverage}}</p>
                      <p ><strong>VGF Amount %:</strong> {{$single_data->vgf_amount_percent}}</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour" style="border-bottom:1px solid #ddd">
                    <button class="accordion-button collapsed btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <h6>Stakeholder Details</h6>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      <p ><strong>Grantor:</strong> {{$single_data->grantor}}</p>
                      <p ><strong>Line Ministry/ Division:</strong> {{$single_data->ministry->name}}</p>
                      <p ><strong>Contracting Agency:</strong> {{$single_data->agency->name}}</p>
                      <p ><strong>Private Partners:</strong> {{$single_data->partner->name}}</p>
                      <p ><strong>Shareholders (with Equity %):</strong> {{$single_data->shareholders}}</p>
                      <p ><strong>Lenders (with amount and %):</strong> {{$single_data->lenders}}</p>
                      <p ><strong>EPC Contractor’s:</strong> {{$single_data->epc_contractors}}</p>
                      <p ><strong>O &amp; M Contractor’s:</strong> {{$single_data->o_m_contractors}}</p>
                      <p ><strong>Independent Engineer:</strong> {{$single_data->independent_engineer}}</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive" style="border-bottom:1px solid #ddd">
                    <button class="accordion-button collapsed btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      <h6>Key dates</h6>
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      <p ><strong>Project Screening Date:</strong> {{(!empty($single_data->screening_date)) ? date('d F Y',strtotime($single_data->screening_date)) : '' }}</p>
                      <p ><strong>In-Principle Approval Date:</strong> {{(!empty($single_data->in_princeple_approval)) ? date('d F Y',strtotime($single_data->in_princeple_approval)) : '' }}</p>
                      <p ><strong>Final Approval date:</strong> {{(!empty($single_data->final_approval)) ? date('d F Y',strtotime($single_data->final_approval)) : '' }}</p>
                      <p ><strong>Concession Signing date:</strong> {{(!empty($single_data->contract_signing)) ? date('d F Y',strtotime($single_data->contract_signing)) : '' }}</p>
                      <p ><strong>Concession Period:</strong> {{$single_data->commencement_period}}</p>
                      <p ><strong>Construction Commencement date:</strong> {{(!empty($single_data->commencement_date)) ? date('d F Y',strtotime($single_data->commencement_date)) : '' }}</p>
                      <p ><strong>Construction Period:</strong> {{$single_data->contract_period}}</p>
                      <p ><strong>Completion date:</strong> {{(!empty($single_data->completion_date)) ? date('d F Y',strtotime($single_data->completion_date)) : '' }}</p>
                      <p ><strong>Commercial date of Operation COD:</strong> {{(!empty($single_data->commercial_date)) ? date('d F Y',strtotime($single_data->commercial_date)) : '' }}</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix" style="border-bottom:1px solid #ddd">
                    <button class="accordion-button collapsed btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                     <h6> Current Status and Activity/Note/Construction Company</h6>
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      <p ><strong>Current Status and Activity:</strong> {{($single_data->phase != null)?$single_data->phase->name:'Not Yet'}} ({{($single_data->subphase != null)?$single_data->subphase->name:'Not Yet'}})</p>
                      <p ><strong>Note:</strong> {!! $single_data->note !!}</p>
                      <p ><strong>Construction Company:</strong> {{!empty($single_data->construction) ? $single_data->construction->name : ''}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Faq end -->
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>
</div>
<!--End of Activity Area-->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
{!!Html::script('custom/js/bootstrap.bundle.min.js')!!}
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