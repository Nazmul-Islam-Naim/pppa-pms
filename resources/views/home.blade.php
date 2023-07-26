@extends('layouts.layout')
@section('title', 'Admin Dashboard')
@section('content')
<style type="text/css">
	.stats-tile {
    	padding: 12px !important;
	}
	h3{
		font-size: 16px !important;
		color: #fff;
	}
	.stats-tile .sale-details p{
		color: #fff;
	}
</style>
<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

	<!-- Content wrapper start -->
	<div class="content-wrapper">

		<div class="row gutters">
			<!-- <h4>Quick Links</h4> -->
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-12" style="padding: 2px;">
				<a class="btn btn-info btn-sm" href="{{URL::To('/other-receive/receive-voucher')}}" style="width: 100%;background: darkslategray;"> {{ __('home.Income_Voucher') }}</a>
			</div>
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-12" style="padding: 2px;">
				<a class="btn btn-info btn-sm" href="{{URL::To('/other-payment/payment-voucher')}}" style="width: 100%;background: darkolivegreen;">{{ __('home.Expense_Voucher') }}</a>
			</div>
			<!--<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-12" style="padding: 2px;">
				<a class="btn btn-info btn-sm" href="{{URL::To('/rent/customer-list-for-rent')}}" style="width: 100%;background: darkslategray;">Add Shop Rent</a>
			</div>
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-12" style="padding: 2px;">
				<a class="btn btn-info btn-sm" href="{{URL::To('/apartment/apartment-assign')}}" style="width: 100%;background: darkolivegreen;">Assign Apartment</a>
			</div>-->
			<!--<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-12" style="padding: 2px;">
				<a class="btn btn-info btn-sm" href="{{URL::To('/em/employees')}}" style="width: 100%;background: palevioletred;">Employee</a>
			</div>-->
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-12" style="padding: 2px;">
				<a class="btn btn-info btn-sm" href="{{URL::To('/temporary/raw-market')}}" style="width: 100%;background: cadetblue;">{{ __('home.Kacha_Bazar') }}</a>
			</div>
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-12" style="padding: 2px;">
				<a class="btn btn-info btn-sm" href="{{URL::To('/madrasah/expense-type')}}" style="width: 100%;background: darkslategray;">{{ __('home.Madrasah') }}</a>
			</div>
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-12" style="padding: 2px;">
				<a class="btn btn-info btn-sm" href="{{URL::To('/hospital/hospital-expense-type')}}" style="width: 100%;background: darkolivegreen;">{{ __('home.Hospital') }}</a>
			</div>
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-12" style="padding: 2px;">
				<a class="btn btn-info btn-sm" href="{{URL::To('/mosjid/mosjid-expense-type')}}" style="width: 100%;background: palevioletred;">{{ __('home.Mosjid') }}</a>
			</div>
		</div>
		<br>
		<!-- Row start -->
		<div class="row gutters">
			<center><h4>{{ __('home.Daily_Transaction_Report') }}</h4></center>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<a href="{{URL::To('temporary/collect-bill-report')}}">
				<div class="stats-tile" style="background: darkslategray;">
					<div class="sale-details">
						<?php 
							$dailyKachaBazar = DB::table('raw_markets_bill_collection')->where('date', '=', date('Y-m-d'))->sum('amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailyKachaBazar, 2)}}</h3>
						<p>{{ __('home.Kacha_Bazar_Bill_Collect') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<a href="{{URL::To('madrasah/expense-report')}}">
				<div class="stats-tile" style="background: darkolivegreen;">
					<div class="sale-details">
						<?php 
							$dailyMadrasahTtlExpense = DB::table('madrasah_expense_voucher')->where('payment_date', '=', date('Y-m-d'))->sum('amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailyMadrasahTtlExpense, 2)}}</h3>
						<p>{{ __('home.Madrasah_Expense') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<a href="{{URL::To('madrasah/income-report')}}">
				<div class="stats-tile" style="background: palevioletred;">
					<div class="sale-details">
						<?php 
							$dailymadrasahTtlIncome = DB::table('madrasah_income_voucher')->where('payment_date', '=', date('Y-m-d'))->sum('amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailymadrasahTtlIncome, 2)}}</h3>
						<p>{{ __('home.Madrasah_Income') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<a href="{{URL::To('hospital/hospital-expense-report')}}">
				<div class="stats-tile" style="background: cadetblue;">
					<div class="sale-details">
						<?php 
							$dailyhospitalTtlExpense = DB::table('hospital_expense_voucher')->where('payment_date', '=', date('Y-m-d'))->sum('amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailyhospitalTtlExpense, 2)}}</h3>
						<p>{{ __('home.Hospital_Expense') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine1"></div>
					</div>
				</div>
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<a href="{{URL::To('hospital/hospital-income-report')}}">
				<div class="stats-tile" style="background: cadetblue;">
					<div class="sale-details">
						<?php 
							$dailyhospitalTtlIncome = DB::table('hospital_income_voucher')->where('payment_date', '=', date('Y-m-d'))->sum('amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailyhospitalTtlIncome, 2)}}</h3>
						<p>{{ __('home.Hospital_Income') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine3"></div>
					</div>
				</div>
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<a href="{{URL::To('mosjid/mosjid-expense-report')}}">
				<div class="stats-tile" style="background: palevioletred;">
					<div class="sale-details">
						<?php 
							$dailymosjidTtlExpense = DB::table('mosjid_expense_voucher')->where('payment_date', '=', date('Y-m-d'))->sum('amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailymosjidTtlExpense, 2)}}</h3>
						<p>{{ __('home.Mosjid_Expense') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine4"></div>
					</div>
				</div>
				</a>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<a href="{{URL::To('mosjid/mosjid-income-report')}}">
				<div class="stats-tile" style="background: darkolivegreen;">
					<div class="sale-details">
						<?php 
							$dailymosjidTtlIncome = DB::table('mosjid_income_voucher')->where('payment_date', '=', date('Y-m-d'))->sum('amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailymosjidTtlIncome, 2)}}</h3>
						<p>{{ __('home.Mosjid_Income') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine4"></div>
					</div>
				</div>
				</a>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<a href="{{URL::To('rent/rent-bill-payment')}}">
				<div class="stats-tile" style="background: darkslategray;">
					<div class="sale-details">
						<?php 
							$dailyshopRent = DB::table('rent_bill_payment')->where('date', '=', date('Y-m-d'))->sum('paid_amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailyshopRent, 2)}}</h3>
						<p>{{ __('home.Shop_Bill_Collect') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine4"></div>
					</div>
				</div>
				</a>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<a href="{{URL::To('apartment/bill-payment')}}">
				<div class="stats-tile" style="background: darkslategray;">
					<div class="sale-details">
						<?php 
							$dailyapartmentRent = DB::table('apartment_bill_payment')->where('date', '=', date('Y-m-d'))->sum('paid_amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailyapartmentRent, 2)}}</h3>
						<p>{{ __('home.Apartment_Bill_Collect') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine4"></div>
					</div>
				</div>
				</a>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<a href="{{URL::To('em/employee-salary')}}">
				<div class="stats-tile" style="background: darkolivegreen;">
					<div class="sale-details">
						<?php 
							$dailyemployeeSalary = DB::table('employee_salary_bill')->where('date', '=', date('Y-m-d'))->sum('paid_amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailyemployeeSalary, 2)}}</h3>
						<p>{{ __('home.Employee_Salary') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine4"></div>
					</div>
				</div>
				</a>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<a href="{{URL::To('/other-receive/receive-voucher-report')}}">
				<div class="stats-tile" style="background: palevioletred;">
					<div class="sale-details">
						<?php 
							$dailyotherincome = DB::table('other_receive_voucher')->where('receive_date', '=', date('Y-m-d'))->sum('amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailyotherincome, 2)}}</h3>
						<p>{{ __('home.Other_Income') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine4"></div>
					</div>
				</div>
				</a>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
				<a href="{{URL::To('/other-payment/payment-voucher-report')}}">
				<div class="stats-tile" style="background: cadetblue;">
					<div class="sale-details">
						<?php 
							$dailyotherexpense = DB::table('other_payment_voucher')->where('payment_date', '=', date('Y-m-d'))->sum('amount');
						?>
						<h3>{{Session::get('currency')}} {{number_format($dailyotherexpense, 2)}}</h3>
						<p>{{ __('home.Other_Expense') }}</p>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine4"></div>
					</div>
				</div>
				</a>
			</div>
		</div>
		<!-- Row end -->
	</div>
	<!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
@endsection