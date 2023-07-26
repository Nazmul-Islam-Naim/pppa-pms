@extends('layouts.layout')
@section('title', 'Project Form')
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
        @include('common.message')
      </div>

      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        
        @if(!empty($single_data))
          {!! Form::open(array('route' =>['project.update', $single_data->id],'method'=>'PUT','files'=>true)) !!}
          <?php $info ="Update";?>
        @else
        {!! Form::open(array('route' =>['project.store'],'method'=>'POST','files'=>true)) !!}
          <?php $info ="Add New";?>
        @endif

        <div class="card">
          <div class="card-header">
            <div class="card-title">{{$info}}  Project</div>
          </div>
          <div class="card-body">
            
            <div id="example-form">

              <h3>Summary</h3>
              <section>
                <h6 class="h-0 m-0">&nbsp;</h6>
                <div class="row gutters">

                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="name" placeholder="Enetr Project Name" required autocomplete="off" 
                      value="{{(!empty($single_data->name))?$single_data->name:''}}">
                      <div class="field-placeholder">Project Name <span class="text-danger">*</span></div>
                    </div>

                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <select name="sector_id" class="select-single js-states" data-live-search="true" requried="" autocomplete="off">
                        <option value="">Select</option>
                        @foreach( $allsector as $sector)
                        <option value="{{$sector->id}}" {{(!empty($single_data) && $sector->id == $single_data->sector_id) ? 'selected':''}}>{{$sector->name}}</option>
                        @endforeach
                      </select>
                      <div class="field-placeholder">Sector <span class="text-danger">*</span></div>
                    </div>

                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <select name="location_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                        <option value="">Select</option>
                        @foreach( $alllocation as $location)
                        <option value="{{$location->id}}" {{(!empty($single_data) && $location->id == $single_data->location_id) ? 'selected':''}}>{{$location->name}}</option>
                        @endforeach
                      </select>
                      <div class="field-placeholder">Location<span class="text-danger">*</span></div>
                    </div>

                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="area" placeholder="Enetr Area"
                      value="{{(!empty($single_data->area))?$single_data->area:''}}">
                      <div class="field-placeholder">Area</div>
                    </div>

                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="key_feature" placeholder="Enetr Key Features/Output"
                      value="{{(!empty($single_data->key_feature))?$single_data->key_feature:''}}">
                      <div class="field-placeholder">Key Features</div>
                    </div>

                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="economic_life" placeholder="Enetr Economic Life"
                      value="{{(!empty($single_data->economic_life))?$single_data->economic_life:''}}">
                      <div class="field-placeholder">Economic Life </div>
                    </div>

                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="contract_term" placeholder="Enetr Contract Term"
                      value="{{(!empty($single_data->contract_term))?$single_data->contract_term:''}}">
                      <div class="field-placeholder">Contract Term</div>
                    </div>

                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="construction_time" placeholder="Enetr Construction Time"
                      value="{{(!empty($single_data->construction_time))?$single_data->construction_time:''}}">
                      <div class="field-placeholder">Construction Time</div>
                    </div>

                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="file" name="image" value="{{(!empty($single_data->image))?$single_data->image:''}}" class="form-control">
                      <div class="field-placeholder">Image<span class="text-danger">*</span></div>
                    </div>

                  </div>
                </div>
              </section>

              <h3>Backgroud/Brief</h3>
              <section>
                <h6 class="h-0 m-0">&nbsp;</h6>
                <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                      
                      <div class="field-wrapper m-0">
                        <textarea name="background" class="summernote" id="background" >{{(!empty($single_data->background))?$single_data->background:''}}</textarea>
                        <div class="field-placeholder">Background</div>
                      </div>

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      
                      <div class="field-wrapper m-0">
                        <div></div>
                        <textarea name="project_scope" class="summernote" id="scope">{{(!empty($single_data->project_scope))?$single_data->project_scope:''}}</textarea>
                        <div class="field-placeholder">Scop in Berif <span class="text-danger">*</span></div>
                      </div>

                    </div>

                  </div>
                </div>
              </section>

              <h3>Objective/Note</h3>
              <section>
                <h6 class="h-0 m-0">&nbsp;</h6>
                <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      
                      <div class="field-wrapper m-0">
                        <textarea name="objective" class="summernote" id="objective">{{(!empty($single_data->objective))?$single_data->objective:''}}</textarea>
                        <div class="field-placeholder">Objective</div>
                      </div>

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      
                      <div class="field-wrapper m-0">
                        <textarea name="note" class="summernote" id="note">{{(!empty($single_data->note))?$single_data->note:''}}</textarea>
                        <div class="field-placeholder">Note</div>
                      </div>

                    </div>

                  </div>
                </div>
              </section>

              <h3>Structure/Model/Cost</h3>
              <section>
                <h6 class="h-0 m-0">&nbsp;</h6>
                <div class="row gutters">
                  
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <select name="delivery_model" class="form-control select-single js-states" data-live-search="true" autocomplete="off">
                        <option value="">Select</option>
                        @foreach( $alldelivery as $delivery)
                        <option value="{{$delivery->title}}" {{(!empty($single_data) && $delivery->title == $single_data->delivery_model) ? 'selected':''}}>{{$delivery->title}}</option>
                        @endforeach
                      </select>
                      <div class="field-placeholder">PPP Structure</div>
                    </div>

                  </div>
                  
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <select name="revenue_model" class="form-control select-single js-states" data-live-search="true"  autocomplete="off">
                        <option value="">Select</option>
                        @foreach( $allrevenue as $revenue)
                        <option value="{{$revenue->title}}" {{(!empty($single_data) && $revenue->title == $single_data->revenue_model) ? 'selected':''}}>{{$revenue->title}}</option>
                        @endforeach
                      </select>
                      <div class="field-placeholder">Revenue Model</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="capital_cost" placeholder="Enetr Capital Cost"
                      value="{{(!empty($single_data->capital_cost))?$single_data->capital_cost:''}}">
                      <div class="field-placeholder">Total Estimated Capital Cost</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="project_cost" placeholder="Enetr Project Cost"
                      value="{{(!empty($single_data->project_cost))?$single_data->project_cost:''}}">
                      <div class="field-placeholder">Total Estimated Project Cost</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="leverage" placeholder="Enetr Levarage (Debt to equity ratio)"
                      value="{{(!empty($single_data->leverage))?$single_data->leverage:''}}">
                      <div class="field-placeholder">Leverage</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="vgf_amount_percent" placeholder="Enetr VGF Amount %"
                      value="{{(!empty($single_data->vgf_amount_percent))?$single_data->vgf_amount_percent:''}}">
                      <div class="field-placeholder">VGF Amount %</div>
                    </div>

                  </div>

                </div>
              </section>

              <h3>Stakholder</h3>
              <section>
                <h6 class="h-0 m-0">&nbsp;</h6>
                <div class="row gutters">

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="grantor" placeholder="Enetr Grantor"
                      value="{{(!empty($single_data->grantor))?$single_data->grantor:''}}">
                      <div class="field-placeholder">Grantor</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <select name="ministry_id" id="ministry_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                        <option value="">Select</option>
                        @foreach( $allministry as $ministry)
                        <option value="{{$ministry->id}}" {{(!empty($single_data) && $ministry->id == $single_data->ministry_id) ? 'selected':''}}>{{$ministry->name}}</option>
                        @endforeach
                      </select>
                      <div class="field-placeholder"> Line Ministry/Division <span class="text-danger">*</span></div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <select name="implementing_agency_id" id="implementing_agency_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                        @if(!empty($single_data))
                        <option value="">Select</option>
                        @foreach( $allagency as $agency)
                        <option value="{{$agency->id}}" {{(!empty($single_data) && $agency->id == $single_data->implementing_agency_id) ? 'selected':''}}>{{$agency->name}}</option>
                        @endforeach
                        @endif
                      </select>
                      <div class="field-placeholder">Contracting Agency <span class="text-danger">*</span></div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <select name="private_partner_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                        <option value="">Select</option>
                        @foreach( $allpartner as $partner)
                        <option value="{{$partner->id}}" {{(!empty($single_data) && $partner->id == $single_data->private_partner_id) ? 'selected':''}}>{{$partner->name}}</option>
                        @endforeach
                      </select>
                      <div class="field-placeholder">Private Partners<span class="text-danger">*</span></div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="shareholders" placeholder="Enetr Shareholders (with equity %)"
                      value="{{(!empty($single_data->shareholders))?$single_data->shareholders:''}}">
                      <div class="field-placeholder">Shareholders </div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="lenders" placeholder="Enetr Lenders (with amound and %)"
                      value="{{(!empty($single_data->lenders))?$single_data->lenders:''}}">
                      <div class="field-placeholder">Lenders </div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="epc_contractors" placeholder="Enetr EPC Contractor's"
                      value="{{(!empty($single_data->epc_contractors))?$single_data->epc_contractors:''}}">
                      <div class="field-placeholder">EPC Contractor's </div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="o_m_contractors" placeholder="Enetr O & M Contractor's"
                      value="{{(!empty($single_data->o_m_contractors))?$single_data->o_m_contractors:''}}">
                      <div class="field-placeholder">O & M Contractor's </div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    
                    <div class="field-wrapper">
                      <input type="text" name="independent_engineer" placeholder="Enetr Independent Engineer"
                      value="{{(!empty($single_data->independent_engineer))?$single_data->independent_engineer:''}}">
                      <div class="field-placeholder">Independent Engineer</div>
                    </div>

                  </div>

                </div>
              </section>
              
              <h3>Dates</h3>
              <section>
                <h6 class="h-0 m-0">&nbsp;</h6>
                <div class="row gutters">

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    
                    <div class="field-wrapper">
                      <input type="date" name="screening_date"
                      value="{{(!empty($single_data)? $single_data->screening_date : '')}}" autocomplete="off">
                      <div class="field-placeholder">Project Screening Date</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    
                    <div class="field-wrapper">
                      <input type="date" name="in_princeple_approval" 
                      value="{{(!empty($single_data)? $single_data->in_princeple_approval : '')}}" autocomplete="off">
                      <div class="field-placeholder">In-Principle Approval Date</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    
                    <div class="field-wrapper">
                      <input type="date" name="final_approval" 
                      value="{{(!empty($single_data)? $single_data->final_approval : '')}}" autocomplete="off">
                      <div class="field-placeholder">Final Approval Date</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    
                    <div class="field-wrapper">
                      <input type="date" name="contract_signing" 
                      value="{{(!empty($single_data)? $single_data->contract_signing : '')}}" autocomplete="off">
                      <div class="field-placeholder">Concession Signing date</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    
                    <div class="field-wrapper">
                      <input type="number" name="contract_period" 
                      value="{{(!empty($single_data)? $single_data->contract_period : '')}}" autocomplete="off">
                      <div class="field-placeholder">Concession Period</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    
                    <div class="field-wrapper">
                      <input type="date" name="commencement_date" 
                      value="{{(!empty($single_data)? $single_data->commencement_date : '')}}" autocomplete="off">
                      <div class="field-placeholder">Construction Commencement date</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    
                    <div class="field-wrapper">
                      <input type="number" name="commencement_period" placeholder="Enter Commencement Period"
                      value="{{(!empty($single_data)? $single_data->commencement_period : '')}}" autocomplete="off">
                      <div class="field-placeholder">Commencement Period</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    
                    <div class="field-wrapper">
                      <input type="date" name="completion_date" 
                      value="{{(!empty($single_data)? $single_data->completion_date : '')}}" autocomplete="off">
                      <div class="field-placeholder">Completion date</div>
                    </div>

                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    
                    <div class="field-wrapper">
                      <input type="date" name="commercial_date" 
                      value="{{(!empty($single_data)? $single_data->commercial_date : '')}}" autocomplete="off">
                      <div class="field-placeholder">Commercial date</div>
                    </div>

                  </div>

                </div>
              </section>
            </div>

          </div>

          <div class="card-footer text-end">
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
          </div>
            
          {!! Form::close() !!}

        </div>

      </div>
    </div>
    <!-- Row end -->

  </div>
  <!-- Content wrapper end -->

</div>
<!-- Content wrapper scroll end -->
{!!Html::script('custom/js/jquery.min.js')!!}
<script>
  // Summernote
  $(document).ready(function() {
			});
  // dependancy dropdown using ajax
$(document).ready(function() {
    $('#ministry_id').on('change', function() {
      var ministryid = $(this).val();
      if(ministryid) {
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          method: "POST",
          url: "{{$baseUrl.'/'.config('app.project').'/get-implementing-agency'}}",
          data: {
            'id' : ministryid
          },
          dataType: "json",

          success:function(data) {
            //console.log(data);
            if(data){
              $('#implementing_agency_id').empty();
              $('#implementing_agency_id').focus;
              $('#implementing_agency_id').append('<option value="">Select</option>'); 
              $.each(data, function(key, value){
                console.log(data);
                $('select[name="implementing_agency_id"]').append('<option value="'+ value.id +'">' + value.name+ '</option>');
              });
            }else{
              $('#implementing_agency_id').empty();
            }
          }
        });
      }else{
        $('#implementing_agency_id').empty();
      }
    });

    // sumernote point
    
    $('#background').summernote({
					height: 80,
					tabsize: 2,
					focus: true,
					toolbar: [
	          ['font', ['bold', 'underline', 'clear']],
	          ['para', ['ul', 'ol']],
	          ['insert', ['link', 'picture', 'video']],
	          ['view', ['fullscreen', 'codeview', 'help']],
	        ]
				});
				$('#scope').summernote({
					height: 80,
					tabsize: 2,
					focus: true,
					toolbar: [
	          ['font', ['bold', 'underline', 'clear']],
	          ['para', ['ul', 'ol']],
	          ['insert', ['link', 'picture', 'video']],
	          ['view', ['fullscreen', 'codeview', 'help']],
	        ]
				});
				$('#objective').summernote({
					height: 80,
					tabsize: 2,
					focus: true,
					toolbar: [
	          ['font', ['bold', 'underline', 'clear']],
	          ['para', ['ul', 'ol']],
	          ['insert', ['link', 'picture', 'video']],
	          ['view', ['fullscreen', 'codeview', 'help']],
	        ]
				});
				$('#note').summernote({
					height: 80,
					tabsize: 2,
					focus: true,
					toolbar: [
	          ['font', ['bold', 'underline', 'clear']],
	          ['para', ['ul', 'ol']],
	          ['insert', ['link', 'picture', 'video']],
	          ['view', ['fullscreen', 'codeview', 'help']],
	        ]
				});
});
</script>
@endsection 