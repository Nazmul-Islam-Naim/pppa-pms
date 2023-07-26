@extends('layouts.layout')
@section('title', 'Budget Form')
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
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        @if(!empty($single_data))
          {!! Form::open(array('route' =>['budget.update', $single_data->id],'method'=>'PUT','files'=>true)) !!}
          <?php $info ="Update";?>
        @else
        {!! Form::open(array('route' =>['budget.store'],'method'=>'POST','files'=>true,'enctype'=>'multipart/form-data')) !!}
          <?php $info ="Add";?>
        @endif
        <div class="card">
          <div class="card-header">
            <div class="card-title">{{$info}} Budget</div>
          </div>
          <div class="card-body">
            <!-- Row start -->
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <!----------------- project -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="project_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                      <option value="">Select</option>
                      @foreach( $allproject as $project)
                      <option value="{{$project->id}}" {{(!empty($single_data) && $project->id == $single_data->project_id) ? 'selected':''}}>{{$project->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Project<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!----------------- contract firm -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="firm_id" class="form-control select-single js-states" data-live-search="true" requried="" autocomplete="off">
                      <option value="">Select</option>
                      @foreach( $allfirm as $firm)
                      <option value="{{$firm->id}}" {{(!empty($single_data) && $firm->id == $single_data->firm_id) ? 'selected':''}}>{{$firm->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Firm<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-----------------contract amount -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control" type="number" name="contract_amount" value="{{(!empty($single_data->contract_amount))?$single_data->contract_amount:''}}" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Contract Amount<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-----------------currency type -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="currency_type" class="form-controll" required="" autocomplete="off">
                      <option value="">Select</option>
                      <option value="BDT" {{(!empty($single_data) && $single_data->currency_type == "BDT")? 'selected' : '' }}>BDT</option>
                      <option value="USD"  {{(!empty($single_data) && $single_data->currency_type == "USD")? 'selected' : '' }}>USD</option>
                    </select>
                  </div>
                  <div class="field-placeholder">Currency Type<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper end -->
                <!----------------- date -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control" type="date" name="date" value="{{(!empty($single_data))? $single_data->date : date('Y-m-d') }}" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Date<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!----------------- note -------------------------->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <textarea name="note">{{(!empty($single_data->note))?$single_data->note:''}}</textarea>
                  </div>
                  <div class="field-placeholder">Note</div>
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
</script>
@endsection 