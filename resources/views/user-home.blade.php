@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')
<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

	<!-- Content wrapper start -->
	<div class="content-wrapper">

		<!-- Row start -->
		<div class="row gutters">
			<!----------------- total project ---------------------->
			@can('app.project.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/project.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$project}}</h4>
						<a href="{{route('project.index')}}"><p>Project</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- total sector ---------------------->
			@can('app.sector.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/sector.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$sector}}</h4>
						<a href="{{route('sector.index')}}"><p>Sector</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- total ministry ---------------------->
			@can('app.ministry.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/home.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$ministry}}</h4>
						<a href="{{route('ministry-list')}}"><p>Ministry</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- total private partner ---------------------->
			@can('app.privatePartner.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/partner.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$privatepartner}}</h4>
						<a href="{{route('private-partner.index')}}"><p>Private Partner</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- total construction agency ---------------------->
			@can('app.agency.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/agency.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$constructionagency}}</h4>
						<a href="{{route('construction-company.index')}}"><p>Construction Agency</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- Identitification Phase ---------------------->
			@can('app.phase.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/identification.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$identitification}}</h4>
						<a href="{{route('identitification-phase-project')}}"><p>Identitification Phase</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- Development Phase ---------------------->
			@can('app.phase.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/development.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$development}}</h4>
						<a href="{{route('development-phase-project')}}"><p>Development Phase</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- procurement Phase ---------------------->
			@can('app.phase.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/procurement.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$procurement}}</h4>
						<a href="{{route('procurement-phase-project')}}"><p>Procurement Phase</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- award Phase ---------------------->
			@can('app.phase.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/award.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$award}}</h4>
						<a href="{{route('award-phase-project')}}"><p>Award Phase</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- implementation Phase ---------------------->
			@can('app.phase.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/implementation.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$implementation}}</h4>
						<a href="{{route('implementation-phase-project')}}"><p>Implementation Phase</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- implementation Phase / CP Obligations Met By CA And Private Partner ---------------------->
			@can('app.phase.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/implementation.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$cpObligations}}</h4>
						<a href="{{route('implementation-phase-project')}}"><p>CP Obligations</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- implementation Phase / Construction Begins ---------------------->
			@can('app.phase.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/implementation.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$constructionsBegan}}</h4>
						<a href="{{route('implementation-phase-project')}}"><p>Construction Begins</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- others document ---------------------->
			@can('app.project.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/document.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$document}}</h4>
						<a href="{{route('documents')}}"><p>Others Document</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
			<!----------------- g2g ---------------------->
			@can('app.project.index')
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile">
					<div class="sale-icon">
						<i ><img src="{{asset('upload/logo/procurement.gif')}}" alt="" width="60px"></i>
					</div>
					<div class="sale-details">
						<h4>{{$g2g}}</h4>
						<a href="{{route('g2g-projects')}}"><p>G2G</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			@endcan
		</div>
		<!-- Row end -->
	</div>
	<!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
@endsection