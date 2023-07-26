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
          <?php $info ="Add";?>
        @endif
        <div class="card">
          <div class="card-header">
            <div class="card-title">{{$info}} Project</div>
          </div>
          <div class="card-body">
            <!-- Row start -->
            <div class="row gutters">
              <!-----------------project name -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <textarea name="name" style="height:40px">{{(!empty($single_data->name))?$single_data->name:''}}</textarea>
                  </div>
                  <div class="field-placeholder">Name<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!-----------------sector -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="sector_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                      <option value="">Select</option>
                      @foreach( $allsector as $sector)
                      <option value="{{$sector->id}}" {{(!empty($single_data) && $sector->id == $single_data->sector_id) ? 'selected':''}}>{{$sector->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Sector<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!-----------------ministry -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="ministry_id" id="ministry_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                      <option value="">Select</option>
                      @foreach( $allministry as $ministry)
                      <option value="{{$ministry->id}}" {{(!empty($single_data) && $ministry->id == $single_data->ministry_id) ? 'selected':''}}>{{$ministry->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Ministry<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- implementing agency -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="implementing_agency_id" id="implementing_agency_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                      @if(!empty($single_data))
                      <option value="">Select</option>
                      @foreach( $allagency as $agency)
                      <option value="{{$agency->id}}" {{(!empty($single_data) && $agency->id == $single_data->implementing_agency_id) ? 'selected':''}}>{{$agency->name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="field-placeholder">Implementing Agency<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- Location -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="location_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                      <option value="">Select</option>
                      @foreach( $alllocation as $location)
                      <option value="{{$location->id}}" {{(!empty($single_data) && $location->id == $single_data->location_id) ? 'selected':''}}>{{$location->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Location<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- delivery model -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="delivery_model" class="form-control select-single js-states" data-live-search="true" autocomplete="off">
                      <option value="">Select</option>
                      @foreach( $alldelivery as $delivery)
                      <option value="{{$delivery->title}}" {{(!empty($single_data) && $delivery->title == $single_data->delivery_model) ? 'selected':''}}>{{$delivery->title}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Delivery Model</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- revenue -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="revenue_model" class="form-control select-single js-states" data-live-search="true"  autocomplete="off">
                      <option value="">Select</option>
                      @foreach( $allrevenue as $revenue)
                      <option value="{{$revenue->title}}" {{(!empty($single_data) && $revenue->title == $single_data->revenue_model) ? 'selected':''}}>{{$revenue->title}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Revenue Model</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- Approval -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="approval_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                      <option value="">Select</option>
                      @foreach( $allapproval as $approval)
                      <option value="{{$approval->id}}" {{(!empty($single_data) && $approval->id == $single_data->approval_id) ? 'selected':''}}>{{$approval->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Approval<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- In princeple approval -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="date" name="in_princeple_approval" id="in_princeple_approval" class="form-controll" 
                    value="{{(!empty($single_data)? $single_data->in_princeple_approval : '')}}" autocomplete="off">
                  </div>
                  <div class="field-placeholder">In-Princeple Approval</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- final approval -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="date" name="final_approval" id="final_approval" class="form-controll" 
                    value="{{(!empty($single_data)? $single_data->final_approval : '')}}" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Final Approval</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- private partner -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="private_partner_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                      <option value="">Select</option>
                      @foreach( $allpartner as $partner)
                      <option value="{{$partner->id}}" {{(!empty($single_data) && $partner->id == $single_data->private_partner_id) ? 'selected':''}}>{{$partner->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Private Partner<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- contract signing -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="date" name="contract_signing" id="contract_signing" class="form-controll" 
                    value="{{(!empty($single_data)? $single_data->contract_signing : '')}}" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Contract Signing</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- Background -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <textarea name="background" style="height:40px">{{(!empty($single_data->background))?$single_data->background:''}}</textarea>
                  </div>
                  <div class="field-placeholder">Background</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- Objective -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <textarea name="objective" style="height:40px">{{(!empty($single_data->objective))?$single_data->objective:''}}</textarea>
                  </div>
                  <div class="field-placeholder">Objective</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- Project Scope -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <textarea name="project_scope" style="height:40px">{{(!empty($single_data->project_scope))?$single_data->project_scope:''}}</textarea>
                  </div>
                  <div class="field-placeholder">Project Scope</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- Project Implemention Period -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <textarea name="implementation_period" style="height:40px">{{(!empty($single_data->implementation_period))?$single_data->implementation_period:''}}</textarea>
                  </div>
                  <div class="field-placeholder">Implemention Period</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- Note -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <textarea name="note" style="height:40px">{{(!empty($single_data->note))?$single_data->note:''}}</textarea>
                  </div>
                  <div class="field-placeholder">Note</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- Image -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="file" name="image" value="{{(!empty($single_data->image))?$single_data->image:''}}" class="form-control">
                  </div>
                  <div class="field-placeholder">Image</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- development period from -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="date" name="development_period_from" id="development_period_from" class="form-controll" 
                    value="{{(!empty($single_data)? $single_data->development_period_from : '')}}" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Development Period From</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- construction period from -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="date" name="construction_period_from" id="construction_period_from" class="form-controll" 
                    value="{{(!empty($single_data)? $single_data->construction_period_from : '')}}" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Construction Period From</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- operation period from -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="date" name="operaion_period_from" id="operaion_period_from" class="form-controll" 
                    value="{{(!empty($single_data)? $single_data->operaion_period_from : '')}}" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Operation Period From</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- development period  to -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="date" name="development_period_to" id="development_period_to" class="form-controll" 
                    value="{{(!empty($single_data)? $single_data->development_period_to : '')}}" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Development Period To</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- construction period To-------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="date" name="construction_period_to" id="construction_period_to" class="form-controll" 
                    value="{{(!empty($single_data)? $single_data->construction_period_to : '')}}" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Construction Period To</div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <!----------------- operation period to -------------------------->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="date" name="operaion_period_to" id="operaion_period_to" class="form-controll" 
                    value="{{(!empty($single_data)? $single_data->operaion_period_to : '')}}" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Operation Period To</div>
                </div>
                <!-- Field wrapper end -->
              </div>
            </div>
            <!-- Row end -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">{{$info}}</button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
{!!Html::script('custom/js/jquery.min.js')!!}
<script>
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
});
</script>
@endsection 