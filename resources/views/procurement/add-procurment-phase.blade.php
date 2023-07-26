@extends('layouts.layout')
@section('title', 'Procurment Phase Details')
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
        <div class="card">
          @if (!empty($single_data))
          {!! Form::open(array('route' =>['procurement-details.update',$single_data->id],'method'=>'PUT','files'=>true)) !!}
          <?php $info = 'Update'; ?>
          @else
          {!! Form::open(array('route' =>['procurement-details.store'],'method'=>'POST','files'=>true)) !!}
          <?php $info = 'Add'; ?>
          @endif
          <div class="card-header">
            <div class="card-title">{{$info}} Procurment Phase Details</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-inline">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <select  name="project_id"  class="form-control select-single js-states select2" data-live-search="true" required="">
                            <option value="">Select project</option>
                            @foreach($allproject as $project)
                            <option value="{{$project->id}}" {{(!empty($single_data) && ($single_data->project_id == $project->id)) ? 'selected' : ''}}>{{$project->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="field-placeholder">Project <span class="text-danger">*</span> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-inline">
                  <div class="field-wrapper">
                    <div class="input-group">
                      <select  name="g2g_basis" id="g2g_basis"  class="form-control select-single js-states select2 g2g_basis" data-live-search="true">
                        <option value="">Select</option>
                        <option value="Yes" {{(!empty($single_data) && ($single_data->g2g_basis == 'Yes')) ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{(!empty($single_data) && ($single_data->g2g_basis == 'No')) ? 'selected' : ''}}>No</option>
                      </select>
                    </div>
                    <div class="field-placeholder">G2G Basis</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4" id="country" style="display:none">
                <div class="form-inline">
                  <div class="field-wrapper">
                    <div class="input-group">
                      <select  name="country" id="country"  class="form-control select-single js-states select2 phase_id" data-live-search="true">
                        <option value="">Select Country</option>
                        @foreach($allcountry as $country)
                        <option value="{{$country->name}}" {{(!empty($single_data) && ($single_data->country == $country->name)) ? 'selected' : ''}}>{{$country->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="field-placeholder">Country</div>
                  </div>
                </div>
              </div>
              @if (!empty($single_data->country))
              <div class="col-md-4" id="country">
                <div class="form-inline">
                  <div class="field-wrapper">
                    <div class="input-group">
                      <select  name="country" id="country"  class="form-control select-single js-states select2 phase_id" data-live-search="true">
                        <option value="">Select Country</option>
                        @foreach($allcountry as $country)
                        <option value="{{$country->name}}" {{(!empty($single_data) && ($single_data->country == $country->name)) ? 'selected' : ''}}>{{$country->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="field-placeholder">Country</div>
                  </div>
                </div>
              </div>
              @endif
              <div class="col-md-4">
                <div class="form-inline">
                  <div class="field-wrapper">
                    <div class="input-group">
                      <select  name="procurement_type" id="procurement_type"  class="form-control select-single js-states select2 procurement_type" data-live-search="true">
                        <option value="">Select</option>
                        <option value="Solicited" {{(!empty($single_data) && ($single_data->procurement_type == 'Solicited')) ? 'selected' : ''}}>Solicited</option>
                        <option value="Unsolicited" {{(!empty($single_data) && ($single_data->procurement_type == 'Unsolicited')) ? 'selected' : ''}}>Unsolicited</option>
                      </select>
                    </div>
                    <div class="field-placeholder">Procurement Type</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-inline">
                  <div class="field-wrapper">
                    <div class="input-group">
                      <select  name="procurement_method" id="procurement_method"  class="form-control select-single js-states select2 procurement_method" data-live-search="true">
                        <option value="">Select</option>
                        <option value="Open" {{(!empty($single_data) && ($single_data->procurement_method == 'Open')) ? 'selected' : ''}}>Open</option>
                        <option value="Restricted" {{(!empty($single_data) && ($single_data->procurement_method == 'Restricted')) ? 'selected' : ''}}>Restricted</option>
                      </select>
                    </div>
                    <div class="field-placeholder">Procurement Method</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-inline">
                  <div class="field-wrapper">
                    <div class="input-group">
                      <select  name="stages" id="stages"  class="form-control select-single js-states select2 stages" data-live-search="true">
                        <option value="">Select</option>
                        <option value="One" {{(!empty($single_data) && ($single_data->stages == 'One')) ? 'selected' : ''}}>One</option>
                        <option value="Two" {{(!empty($single_data) && ($single_data->stages == 'Two')) ? 'selected' : ''}}>Two</option>
                      </select>
                    </div>
                    <div class="field-placeholder">Stages</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-inline">
                  <div class="field-wrapper">
                    <div class="input-group">
                      <select  name="envelope" id="envelope"  class="form-control select-single js-states select2 envelope" data-live-search="true">
                        <option value="">Select</option>
                        <option value="One" {{(!empty($single_data) && ($single_data->envelope == 'One')) ? 'selected' : ''}}>One</option>
                        <option value="Two" {{(!empty($single_data) && ($single_data->envelope == 'Two')) ? 'selected' : ''}}>Two</option>
                      </select>
                    </div>
                    <div class="field-placeholder">Envelope</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-inline">
                  <div class="field-wrapper">
                    <div class="input-group">
                      <select  name="negotiation" id="negotiation"  class="form-control select-single js-states select2 negotiation" data-live-search="true">
                        <option value="">Select</option>
                        <option value="One" {{(!empty($single_data) && ($single_data->negotiation == 'One')) ? 'selected' : ''}}>One</option>
                        <option value="Two" {{(!empty($single_data) && ($single_data->negotiation == 'Two')) ? 'selected' : ''}}>Two</option>
                      </select>
                    </div>
                    <div class="field-placeholder">Negotiation</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-inline">
                  <div class="field-wrapper">
                    <div class="input-group">
                      <select  name="swiss_challenge" id="swiss_challenge"  class="form-control select-single js-states select2 swiss_challenge" data-live-search="true">
                        <option value="">Select</option>
                        <option value="One" {{(!empty($single_data) && ($single_data->swiss_challenge == 'One')) ? 'selected' : ''}}>One</option>
                        <option value="Two" {{(!empty($single_data) && ($single_data->swiss_challenge == 'Two')) ? 'selected' : ''}}>Two</option>
                      </select>
                    </div>
                    <div class="field-placeholder">Swiss Challenge</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <button class="btn btn-sm btn-primary">Submit</button>
          </div>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
{!!Html::script('custom/js/jquery.min.js')!!}
<script type="text/javascript"> 
$(document).ready(function () {
  $("#g2g_basis").change(function (e) { 
    e.preventDefault();
    var value = $("#g2g_basis").val();
    if (value == "Yes") {
      $('#country').show();
    } else {
      $('#country').hide();
    }
  });
});
</script>
@endsection 