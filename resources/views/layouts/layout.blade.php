<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Meta -->
        <meta name="description" content="PPO">
        <meta name="author" content="ParkerThemes">
        <link rel="shortcut icon" href="{{asset('custom/img/fav.png')}}">

        <!-- Title -->
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;500&display=swap" rel="stylesheet">


        <!-- *************
            ************ Common Css Files *************
        ************ -->
        <!-- Bootstrap css -->
        {!!Html::style('custom/css/bootstrap.min.css')!!}
        
        <!-- Icomoon Font Icons css -->
        {!!Html::style('custom/fonts/style.css')!!}

        <?php 
        $checkThemeforUser=DB::table('theme_settings')->where('user_id', Auth::id())->first();
        ?>
        <!-- Main css for green -->
        {!!Html::style('custom/css/green-main.css')!!}


        <!-- *************
            ************ Vendor Css Files *************
        ************ -->

        <!-- Mega Menu -->
        {!!Html::style('custom/vendor/megamenu/css/megamenu.css')!!}

        <!-- Search Filter JS -->
        {!!Html::style('custom/vendor/search-filter/search-filter.css')!!}
        {!!Html::style('custom/vendor/search-filter/custom-search-filter.css')!!}

        <!-- Data Tables -->
        {!!Html::style('custom/vendor/datatables/dataTables.bs4.css')!!}
        {!!Html::style('custom/vendor/datatables/dataTables.bs4-custom.css')!!}
        {!!Html::style('custom/vendor/datatables/buttons.bs.css')!!}
        <!-- Date Range CSS -->
        {!!Html::style('custom/vendor/daterange/daterange.css')!!}

        <!-- font awoesome CSS -->
        {!!Html::style('custom/font-awesome-4.7.0/css/font-awesome.css')!!}
        {!!Html::style('custom/font-awesome-4.7.0/css/font-awesome.min.css')!!}
        
		<!-- Steps Wizard CSS -->
        {!!Html::style('custom/vendor/wizard/jquery.steps.css')!!}

        <!-- Bootstrap Select CSS -->
        {!!Html::style('custom/vendor/bs-select/bs-select.css')!!}

		<!-- Summernote CSS -->
        {!!Html::style('custom/vendor/summernote/summernote-bs4.css')!!}

        <style type="text/css">
            @keyframes zoominoutsinglefeatured {
                0% {
                    transform: scale(1,1);
                }
                50% {
                    transform: scale(1.2,1.2);
                }
                100% {
                    transform: scale(1,1);
                }
            }
            /* .logo img {
                animation: zoominoutsinglefeatured 1s infinite ;
            } */

            /*.sidebar-wrapper .sidebar-tabs .nav{
                width: 100% !important;
            }*/

            .slimScrollBar {
                width: 15px !important;
            }

            .default-sidebar-wrapper .default-sidebar-menu ul li.active a span {
                /*background: #e02539;
                color: #ffffff;
                border-radius: 4px;
                padding: 9px;*/
                font-weight: bold;
            }

            .default-sidebar-wrapper .default-sidebar-menu ul li.active a.current-page {
                background: #17995e;
                pointer-events: auto;
                position: relative;
                color: #ffffff;
            }
            .default-sidebar-wrapper .default-sidebar-menu ul li.active a.current-page:hover {
                background: #17995e;
                /*pointer-events: none;*/
                position: relative;
                color: #ffffff;
            }
            table.dataTable tr.odd {
            	background: #f6f6fd;
            }
            table.dataTable tr.even {
            	background: #ffffff;
            }
            table.dataTable td {
                border: 0;
                padding: 0.5rem 0.75rem;
                white-space: normal;
            }
            div.dataTables_wrapper div.dataTables_info {
            	padding: 0.425em 1.5em;
            	display: inline-block;
            	font-size: .725rem;
            	background: #f6f6fd !important;
            	margin-top: 10px;
            	border-radius: 2px;
            }
            
            /* Pagination */
            .pagination .page-link {
                color: #7980a2;
                border: 1px solid #dee2e6;
                background: #fff;
            }
            .pagination .page-link:hover {
                background: #dee2e6;
            }
            .page-item.active .page-link {
                z-index: 3;
                color: #fff;
                background-color: #4285f4;
                border-color: #4285f4;
            }
            .page-item.disabled .page-link {
                color: #7980a2;
                pointer-events: none;
                background-color: #fff;
                border-color: #dee2e6;
            }
        </style>
        
    </head>
    <body class="default-sidebar">

        <!-- Loading wrapper start -->
        <div id="loading-wrapper">
            <div class="spinner-border"></div>
        </div>
        <!-- Loading wrapper end -->

        <?php
            $baseUrl = URL::to('/');
            $url = Request::path();
        ?>

        <!-- Page wrapper start -->
        <div class="page-wrapper">
            
            <!-- Sidebar wrapper start -->
            <nav class="sidebar-wrapper">
                
                <!-- Default sidebar wrapper start -->
                <div class="default-sidebar-wrapper">

                    <!-- Sidebar brand starts -->
                    <div class="text-center">
                        <a href="{{URL::to('/home')}}" class="logo" >
                            <img src="{{asset('upload/logo/logo1.png')}}" alt="Admin" style="width: 55%; margin-top: 14px;"/>
                            <!-- <h5>PPPO</h5> -->
                        </a>
                    </div>
                    <!-- Sidebar brand starts -->

                    <!-- Sidebar menu starts -->
                    <div class="defaultSidebarMenuScroll">
                        <div class="default-sidebar-menu">
                            <ul>
                                <!-------------- dashboard part ------------>
                                <li class="default-sidebar-dropdown {{(
                                    $url=='home' || 
                                    $url==config('app.dashboard').'/ministry-list' || 
                                    $url==config('app.dashboard').'/implementing-agency-list' || 
                                    $url==config('app.dashboard').'/project-list') ? 'active':''}}">
                                    <a href="javascript:void(0)">
                                        <i class="icon-home2"></i>
                                        <span class="menu-text">{{ __('menu.dashboard') }}</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            <li>
                                                <a href="{{$baseUrl.'/home'}}"  class="{{($url=='home' || $url==config('app.dashboard').'/ministry-list' || $url==config('app.dashboard').'/implementing-agency-list/*' || $url==config('app.dashboard').'/project-list') ? 'current-page':''}}">{{ __('menu.home') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-------------- utility part ------------>
                                @can('app.utility.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.utility').'/sector' || $url==config('app.utility').'/sector/create' || $url==(request()->is(config('app.utility').'/sector/*/edit')) ||
                                    $url==config('app.utility').'/ministry' || $url==config('app.utility').'/ministry/create' || $url==(request()->is(config('app.utility').'/ministry/*/edit')) ||
                                    $url==config('app.utility').'/implementing-agency' || $url==config('app.utility').'/implementing-agency/create' || $url==(request()->is(config('app.utility').'/implementing-agency/*/edit')) ||
                                    $url==config('app.utility').'/location' || $url==config('app.utility').'/location/create' || $url==(request()->is(config('app.utility').'/location/*/edit')) ||
                                    $url==config('app.utility').'/approval' || $url==config('app.utility').'/approval/create' || $url==(request()->is(config('app.utility').'/approval/*/edit')) ||
                                    $url==config('app.utility').'/private-partner' || $url==config('app.utility').'/private-partner/create' || $url==(request()->is(config('app.utility').'/private-partner/*/edit')) ||
                                    $url==config('app.utility').'/delivery-model' || $url==config('app.utility').'/delivery-model/create' || $url==(request()->is(config('app.utility').'/delivery-model/*/edit')) ||
                                    $url==config('app.utility').'/revenue-model' || $url==config('app.utility').'/revenue-model/create' || $url==(request()->is(config('app.utility').'/revenue-model/*/edit')) ||
                                    $url==config('app.utility').'/glossary' || $url==config('app.utility').'/glossary/create' || $url==(request()->is(config('app.utility').'/glossary/*/edit')) ||
                                    $url==config('app.utility').'/faq' || $url==config('app.utility').'/faq/create' || $url==(request()->is(config('app.utility').'/faq/*/edit'))) ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-aperture"></i>
                                        <span class="menu-text">Project Brief</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.sector.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.utility').'/sector'}}" class="{{($url==config('app.utility').'/sector' || $url==config('app.utility').'/sector/create' || $url==(request()->is(config('app.utility').'/sector/*/edit'))) ? 'current-page':''}}">Sector</a>
                                            </li>
                                            @endcan
                                            @can('app.ministry.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.utility').'/ministry'}}" class="{{($url==config('app.utility').'/ministry' || $url==config('app.utility').'/ministry/create' || $url==(request()->is(config('app.utility').'/ministry/*/edit'))) ? 'current-page':''}}">Ministry</a>
                                            </li>
                                            @endcan
                                            @can('app.agency.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.utility').'/implementing-agency'}}" class="{{($url==config('app.utility').'/implementing-agency' || $url==config('app.utility').'/implementing-agency/create' || $url==(request()->is(config('app.utility').'/implementing-agency/*/edit'))) ? 'current-page':''}}">Implementing Agency</a>
                                            </li>
                                            @endcan
                                            @can('app.location.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.utility').'/location'}}" class="{{($url==config('app.utility').'/location' || $url==config('app.utility').'/location/create' || $url==(request()->is(config('app.utility').'/location/*/edit'))) ? 'current-page':''}}">Location</a>
                                            </li>
                                            @endcan
                                            @can('app.approval.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.utility').'/approval'}}" class="{{($url==config('app.utility').'/approval' || $url==config('app.utility').'/approval/create' || $url==(request()->is(config('app.utility').'/approval/*/edit'))) ? 'current-page':''}}">Approval</a>
                                            </li>
                                            @endcan
                                            @can('app.privatePartner.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.utility').'/private-partner'}}" class="{{($url==config('app.utility').'/private-partner' || $url==config('app.utility').'/private-partner/create' || $url==(request()->is(config('app.utility').'/private-partner/*/edit'))) ? 'current-page':''}}">Private Partner</a>
                                            </li>
                                            @endcan
                                            @can('app.deliveryModel.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.utility').'/delivery-model'}}" class="{{($url==config('app.utility').'/delivery-model' || $url==config('app.utility').'/delivery-model/create' || $url==(request()->is(config('app.utility').'/delivery-model/*/edit'))) ? 'current-page':''}}">PPP Delivery Model</a>
                                            </li>
                                            @endcan
                                            @can('app.revenueModel.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.utility').'/revenue-model'}}" class="{{($url==config('app.utility').'/revenue-model' || $url==config('app.utility').'/revenue-model/create' || $url==(request()->is(config('app.utility').'/revenue-model/*/edit'))) ? 'current-page':''}}">PPP Revenue Model</a>
                                            </li>
                                            @endcan
                                            @can('app.glossary.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.utility').'/glossary'}}" class="{{($url==config('app.utility').'/glossary' || $url==config('app.utility').'/glossary/create' || $url==(request()->is(config('app.utility').'/glossary/*/edit'))) ? 'current-page':''}}">Glossary</a>
                                            </li>
                                            @endcan
                                            @can('app.faq.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.utility').'/faq'}}" class="{{($url==config('app.utility').'/faq' || $url==config('app.utility').'/faq/create' || $url==(request()->is(config('app.utility').'/faq/*/edit'))) ? 'current-page':''}}">FAQ</a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                                <!-------------- project part ------------>
                                @can('app.project.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.project').'/project/create' || $url==(request()->is(config('app.project').'/project/*/edit')) ||
                                    $url==config('app.project').'/project' ||
                                    $url==config('app.project').'/project-status' ||
                                    $url==config('app.project').'/project-report') ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-book-open"></i>
                                        <span class="menu-text">Project Management</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.project.create')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.project').'/project/create'}}" class="{{($url==config('app.project').'/project/create' || $url==(request()->is(config('app.project').'/project/*/edit'))) ? 'current-page':''}}">Add Project</a>
                                            </li>
                                            @endcan
                                            @can('app.project.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.project').'/project'}}" class="{{($url==config('app.project').'/project') ? 'current-page':''}}">Project Amendment</a>
                                            </li>
                                            @endcan
                                            @can('app.project.status')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.project').'/project-status'}}" class="{{($url==config('app.project').'/project-status') ? 'current-page':''}}">Project Status</a>
                                            </li>
                                            @endcan
                                            @can('app.project.report')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.project').'/project-report'}}" class="{{($url==config('app.project').'/project-report') ? 'current-page':''}}">Project Report</a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                                <!-------------- feasibility part ------------>
                                @can('app.feasibility.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.feasibility').'/feasibility-company' || $url==config('app.feasibility').'/feasibility-company/create' || $url==(request()->is(config('app.feasibility').'/feasibility-company/*/edit')) ||
                                    $url==config('app.feasibility').'/add-feasibility' || $url==config('app.feasibility').'/add-feasibility/create' || $url==(request()->is(config('app.feasibility').'/add-feasibility/*/edit')) ||
                                    $url==config('app.feasibility').'/feasibility-amendment' || $url==config('app.feasibility').'/feasibility-amendment/create' || $url==(request()->is(config('app.feasibility').'/feasibility-amendment/*/edit')) ||
                                    $url==config('app.feasibility').'/feasibility-report' || $url==config('app.feasibility').'/feasibility-report/create' || $url==(request()->is(config('app.feasibility').'/feasibility-report/*/edit'))) ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-monitor"></i>
                                        <span class="menu-text">Feasibility Management</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.feasibilityCompany.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.feasibility').'/feasibility-company'}}" class="{{($url==config('app.feasibility').'/feasibility-company' || $url==config('app.feasibility').'/feasibility-company/create' || $url==(request()->is(config('app.feasibility').'/feasibility-company/*/edit'))) ? 'current-page':''}}">Feasibility Company</a>
                                            </li>
                                            @endcan
                                            @can('app.feasibility.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.feasibility').'/add-feasibility'}}" class="{{($url==config('app.feasibility').'/add-feasibility' || $url==config('app.feasibility').'/add-feasibility/create' || $url==(request()->is(config('app.feasibility').'/add-feasibility/*/edit'))) ? 'current-page':''}}">Add Feasibility</a>
                                            </li>
                                            @endcan
                                            @can('app.feasibility.amendment')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.feasibility').'/feasibility-amendment'}}" class="{{($url==config('app.feasibility').'/feasibility-amendment' || $url==config('app.feasibility').'/feasibility-amendment/create' || $url==(request()->is(config('app.feasibility').'/feasibility-amendment/*/edit'))) ? 'current-page':''}}">Feasibility Amendment</a>
                                            </li>
                                            @endcan
                                            @can('app.feasibility.report')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.feasibility').'/feasibility-report'}}" class="{{($url==config('app.feasibility').'/feasibility-report' || $url==config('app.feasibility').'/feasibility-report/create' || $url==(request()->is(config('app.feasibility').'/feasibility-report/*/edit'))) ? 'current-page':''}}">Feasibility Report</a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                                <!-------------- construction agency part ------------>
                                @can('app.constructionAgency.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.construction').'/construction-company' || $url==config('app.construction').'/construction-company/create' || $url==(request()->is(config('app.construction').'/construction-company/*/edit')) ||
                                    $url==config('app.construction').'/add-agency' || $url==config('app.construction').'/add-agency/create' || $url==(request()->is(config('app.construction').'/add-agency/*/edit')) ||
                                    $url==config('app.construction').'/construction-agency-report') ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-shopping-cart1"></i>
                                        <span class="menu-text">Construction Agency</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.constructionAgency.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.construction').'/construction-company'}}" class="{{($url==config('app.construction').'/construction-company' || $url==config('app.construction').'/construction-company/create' || $url==(request()->is(config('app.construction').'/construction-company/*/edit'))) ? 'current-page':''}}">Construction Company</a>
                                            </li>
                                            @endcan
                                            @can('app.constructionAgency.create')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.construction').'/add-agency'}}" class="{{($url==config('app.construction').'/add-agency' || $url==config('app.construction').'/add-agency/create' || $url==(request()->is(config('app.construction').'/add-agency/*/edit'))) ? 'current-page':''}}">Add Agency</a>
                                            </li>
                                            @endcan
                                            @can('app.constructionAgency.report')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.construction').'/construction-agency-report'}}" class="{{($url==config('app.construction').'/construction-agency-report') ? 'current-page':''}}">Construction Agency Report</a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                                <!-------------- estimated cost capital part ------------>
                                @can('app.costCapital.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.cost').'/capital-cost' || $url==config('app.cost').'/capital-cost/create' || $url==(request()->is(config('app.cost').'/capital-cost/*/edit')) ||
                                    $url==config('app.cost').'/add-capital-cost' || $url==config('app.cost').'/add-capital-cost/create' || $url==(request()->is(config('app.cost').'/add-capital-cost/*/edit')) ||
                                    $url==config('app.cost').'/capital-cost-report') ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-attach_money"></i>
                                        <span class="menu-text">Estimated Cost Capital</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.costCapital.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.cost').'/capital-cost'}}" class="{{($url==config('app.cost').'/capital-cost' || $url==config('app.cost').'/capital-cost/create' || $url==(request()->is(config('app.cost').'/capital-cost/*/edit'))) ? 'current-page':''}}">Capital Cost</a>
                                            </li>
                                            @endcan
                                            @can('app.costCapital.create')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.cost').'/add-capital-cost'}}" class="{{($url==config('app.cost').'/add-capital-cost' || $url==config('app.cost').'/add-capital-cost/create' || $url==(request()->is(config('app.cost').'/add-capital-cost/*/edit'))) ? 'current-page':''}}">Add Capital Cost</a>
                                            </li>
                                            @endcan
                                            @can('app.costCapital.report')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.cost').'/capital-cost-report'}}" class="{{($url==config('app.cost').'/capital-cost-report') ? 'current-page':''}}">Capital Cost Report</a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                                <!-------------- phase part ------------>
                                @can('app.phase.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.phase').'/phase' || $url==config('app.phase').'/phase/create' || $url==(request()->is(config('app.phase').'/phase/*/edit')) ||
                                    $url==config('app.phase').'/sub-phase' || $url==config('app.phase').'/sub-phase/create' || $url==(request()->is(config('app.phase').'/sub-phase/*/edit')) ||
                                    $url==config('app.phase').'/document-title' || $url==config('app.phase').'/document-title/create' || $url==(request()->is(config('app.phase').'/document-title/*/edit'))||
                                    $url==config('app.phase').'/add-phase' || $url==config('app.phase').'/add-phase/create' || $url==(request()->is(config('app.phase').'/add-phase/*/edit')) ||
                                    $url==config('app.phase').'/phase-amendment' ||
                                    $url==config('app.phase').'/phase-report' ||
                                    $url==config('app.phase').'/phase-document-report') ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-layers2"></i>
                                        <span class="menu-text">Phase Management</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.phase.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.phase').'/phase'}}" class="{{($url==config('app.phase').'/phase' || $url==config('app.phase').'/phase/create' || $url==(request()->is(config('app.phase').'/phase/*/edit'))) ? 'current-page':''}}">Phase</a>
                                            </li>
                                            @endcan
                                            @can('app.phase.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.phase').'/sub-phase'}}" class="{{($url==config('app.phase').'/sub-phase' || $url==config('app.phase').'/sub-phase/create' || $url==(request()->is(config('app.phase').'/sub-phase/*/edit'))) ? 'current-page':''}}">Sub Phase</a>
                                            </li>
                                            @endcan
                                            @can('app.phase.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.phase').'/document-title'}}" class="{{($url==config('app.phase').'/document-title' || $url==config('app.phase').'/document-title/create' || $url==(request()->is(config('app.phase').'/document-title/*/edit'))) ? 'current-page':''}}">Document Title</a>
                                            </li>
                                            @endcan
                                            @can('app.phaseFollowUp.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.phase').'/add-phase'}}" class="{{($url==config('app.phase').'/add-phase' || $url==config('app.phase').'/add-phase/create' || $url==(request()->is(config('app.phase').'/add-phase/*/edit'))) ? 'current-page':''}}">Add Phase</a>
                                            </li>
                                            @endcan
                                            @can('app.phaseFollowUp.amendment')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.phase').'/phase-amendment'}}" class="{{($url==config('app.phase').'/phase-amendment') ? 'current-page':''}}">Phase Amendment</a>
                                            </li>
                                            @endcan
                                            @can('app.phaseFollowUp.report')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.phase').'/phase-report'}}" class="{{($url==config('app.phase').'/phase-report') ? 'current-page':''}}">Phase Report</a>
                                            </li>
                                            @endcan
                                            @can('app.phaseFollowUp.report')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.phase').'/phase-document-report'}}" class="{{($url==config('app.phase').'/phase-document-report') ? 'current-page':''}}">Phase Document Report</a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                                <!-------------- procurement part ------------>
                                @can('app.procurementDetails.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.pfu').'/country' || $url==config('app.pfu').'/country/create' || $url==(request()->is(config('app.pfu').'/country/*/edit')) ||
                                    $url==config('app.pfu').'/procurement-details' || $url==config('app.pfu').'/procurement-details/create' || $url==(request()->is(config('app.pfu').'/procurement-details/*/edit')) ||
                                    $url==config('app.pfu').'/g2g-document' || $url==config('app.pfu').'/g2g-document/create' || $url==(request()->is(config('app.pfu').'/g2g-document/*/edit'))) ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-layers2"></i>
                                        <span class="menu-text">Procurement Details</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.country.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.pfu').'/country'}}" class="{{($url==config('app.pfu').'/country' || $url==config('app.pfu').'/country/create' || $url==(request()->is(config('app.pfu').'/country/*/edit'))) ? 'current-page':''}}"> Country </a>
                                            </li>
                                            @endcan
                                            @can('app.procurementDetails.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.pfu').'/procurement-details'}}" class="{{($url==config('app.pfu').'/procurement-details' || $url==config('app.pfu').'/procurement-details/create' || $url==(request()->is(config('app.pfu').'/procurement-details/*/edit'))) ? 'current-page':''}}">Procurement Phase Details</a>
                                            </li>
                                            @endcan
                                            @can('app.procurementDetails.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.pfu').'/g2g-document'}}" class="{{($url==config('app.pfu').'/g2g-document' || $url==config('app.pfu').'/g2g-document/create' || $url==(request()->is(config('app.pfu').'/g2g-document/*/edit'))) ? 'current-page':''}}">G2G Document</a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                                <!-------------- others document ------------>
                                @can('app.otherDocument.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.others').'/document-type' || $url==config('app.others').'/document-type/create' || $url==(request()->is(config('app.others').'/document-type/*/edit')) ||
                                    $url==config('app.others').'/add-others-document' || $url==config('app.others').'/add-others-document/create' || $url==(request()->is(config('app.others').'/add-others-document/*/edit')) ||
                                    $url==config('app.others').'/others-document-report') ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-codepen"></i>
                                        <span class="menu-text">Others Document</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.othersDocument.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.others').'/document-type'}}" class="{{($url==config('app.others').'/document-type' || $url==config('app.others').'/document-type/create' || $url==(request()->is(config('app.others').'/document-type/*/edit'))) ? 'current-page':''}}">Document Type</a>
                                            </li>
                                            @endcan
                                            @can('app.othersDocument.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.others').'/add-others-document'}}" class="{{($url==config('app.others').'/add-others-document' || $url==config('app.others').'/add-others-document/create' || $url==(request()->is(config('app.others').'/add-others-document/*/edit'))) ? 'current-page':''}}">Add Others Document</a>
                                            </li>
                                            @endcan
                                            @can('app.othersDocument.report')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.others').'/others-document-report'}}" class="{{($url==config('app.others').'/others-document-report') ? 'current-page':''}}">Others Document Report</a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                                <!-------------- site settings part ------------>
                                <li class="default-sidebar {{($url=='settings') ? 'active':''}}">
                                    <a href="{{URL::to('settings')}}">
                                        <i class="icon-settings1"></i>
                                        <span class="menu-text">{{ __('menu.Settings') }}</span>
                                    </a>
                                </li>
                                <!-------------- user part ------------>
                                @can('app.users.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.user').'/department' || $url==config('app.user').'/department/create' || $url==(request()->is(config('app.user').'/department/*/edit')) ||
                                    $url==config('app.user').'/designation' || $url==config('app.user').'/designation/create' || $url==(request()->is(config('app.user').'/designation/*/edit')) ||
                                    $url==config('app.user').'/user-list' || $url==config('app.user').'/user-list/create' || $url==(request()->is(config('app.user').'/user-list/*/edit')) ||
                                    $url==config('app.user').'/user-role' || $url==config('app.user').'/user-role/create' || $url==(request()->is(config('app.user').'/user-role/*/edit'))) ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-user"></i>
                                        <span class="menu-text">{{ __('menu.user_management') }}</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.departments.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.user').'/department'}}" class="{{($url==config('app.user').'/department' || $url==config('app.user').'/department/create' || $url==(request()->is(config('app.user').'/department/*/edit'))) ? 'current-page':''}}">Department</a>
                                            </li>
                                            @endcan
                                            @can('app.designations.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.user').'/designation'}}" class="{{($url==config('app.user').'/designation' || $url==config('app.user').'/designation/create' || $url==(request()->is(config('app.user').'/designation/*/edit'))) ? 'current-page':''}}">Designation</a>
                                            </li>
                                            @endcan
                                            @can('app.users.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.user').'/user-list'}}" class="{{($url==config('app.user').'/user-list' || $url==config('app.user').'/user-list/create' || $url==(request()->is(config('app.user').'/user-list/*/edit'))) ? 'current-page':''}}">Employee</a>
                                            </li>
                                            @endcan
                                            @can('app.roles.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.user').'/user-role'}}" class="{{($url==config('app.user').'/user-role' || $url==config('app.user').'/user-role/create' || $url==(request()->is(config('app.user').'/user-role/*/edit'))) ? 'current-page':''}}">User Role</a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                                <!-------------- account part ------------>
                                @can('app.accounttype.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.account').'/account-type' || $url==(request()->is(config('app.account').'/account-type/*/edit')) ||
                                    $url==config('app.account').'/bank-account' || 
                                    $url==config('app.account').'/cheque-book' || 
                                    $url==config('app.account').'/cheque-no' || 
                                    $url==config('app.account').'/cheque'  || $url==config('app.account').'/cheque/create'|| $url==(request()->is(config('app.account').'/cheque/*/edit')) || 
                                    $url==(request()->is(config('app.account').'/bank-deposit/*')) || 
                                    $url==(request()->is(config('app.account').'/amount-withdraw/*')) || 
                                    $url==(request()->is(config('app.account').'/amount-transfer/*')) || 
                                    $url==(request()->is(config('app.account').'/bank-report/*')) ||
                                    $url==config('app.op').'/payment-code' || $url==config('app.op').'/payment-code/create' || $url==(request()->is(config('app.op').'/payment-code/*/edit')) ||
                                    $url==config('app.op').'/payment-title' || $url==config('app.op').'/payment-title/create' || $url==(request()->is(config('app.op').'/payment-title/*/edit')) ||
                                    $url==config('app.account').'/daily-transaction') ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-dollar-sign"></i>
                                        <span class="menu-text">PPPTAF Management</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.accounttype.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.account').'/account-type'}}" class="{{($url==config('app.account').'/account-type' || $url==(request()->is(config('app.account').'/account-type/*/edit'))) ? 'current-page':''}}">{{ __('menu.account_type') }}</a>
                                            </li>
                                            @endcan 
                                            @can('app.bankaccount.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.account').'/bank-account'}}" class="{{($url==config('app.account').'/bank-account' || $url==(request()->is(config('app.account').'/bank-deposit/*')) || $url==(request()->is(config('app.account').'/amount-withdraw/*')) || $url==(request()->is(config('app.account').'/amount-transfer/*')) || $url==(request()->is(config('app.account').'/bank-report/*'))) ? 'current-page':''}}">{{ __('menu.bank_account') }}</a>
                                            </li>
                                            @endcan 
                                            @can('app.chequebook.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.account').'/cheque-book'}}" class="{{($url==config('app.account').'/cheque-book') ? 'current-page':''}}">{{ __('menu.cheque_book') }}</a>
                                            </li>
                                            @endcan 
                                            @can('app.chequenumber.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.account').'/cheque-no'}}" class="{{($url==config('app.account').'/cheque-no') ? 'current-page':''}}">{{ __('menu.cheque_no') }}</a>
                                            </li>
                                            @endcan 
                                            <!-- <li>
                                                <a href="{{$baseUrl.'/'.config('app.account').'/cheque'}}" class="{{($url==config('app.account').'/cheque'  || $url==config('app.account').'/cheque/create'|| $url==(request()->is(config('app.account').'/cheque/*/edit'))) ? 'current-page':''}}">Create Cheque</a>
                                            </li> -->
                                            
                                            <li class="list-heading" style="margin-left: 30px"><b>{{ __('menu.expense') }}</b></li>
                                            @can('app.expenseCode.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.op').'/payment-code'}}" class="{{($url==config('app.op').'/payment-code' || $url==config('app.op').'/payment-code/create' || $url==(request()->is(config('app.op').'/payment-code/*/edit'))) ? 'current-page':''}}">Expense Code</a>
                                            </li>
                                            @endcan 
                                            @can('app.expenseTitle.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.op').'/payment-title'}}" class="{{($url==config('app.op').'/payment-title' || $url==config('app.op').'/payment-title/create' || $url==(request()->is(config('app.op').'/payment-title/*/edit'))) ? 'current-page':''}}">Expense Title</a>
                                            </li>
                                            @endcan 
                                            @can('app.addExpense.create')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.op').'/payment-voucher'}}" class="{{($url==config('app.op').'/payment-voucher') ? 'current-page':''}}">Add Expense</a>
                                            </li>
                                            @endcan 
                                            @can('app.addExpense.report')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.op').'/payment-voucher-report'}}" class="{{($url==config('app.op').'/payment-voucher-report') ? 'current-page':''}}">Expense Report</a>
                                            </li>
                                            @endcan 
                                            @can('app.dashboard.dailyTransaction')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.account').'/daily-transaction'}}" class="{{($url==config('app.account').'/daily-transaction') ? 'current-page':''}}">Daily Transaction</a>
                                            </li>
                                            @endcan 
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                                <!-------------- budget payment part ------------>
                                @can('app.ppptafbudget.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.budget').'/budget'  || $url==config('app.budget').'/budget/create'|| $url==(request()->is(config('app.budget').'/budget/*/edit')) ||
                                    $url==config('app.budget').'/budget-payment' ||
                                    $url==config('app.budget').'/budget-payment-report' ||
                                    $url==config('app.budget').'/budget-payment-amendment') ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-dollar-sign"></i>
                                        <span class="menu-text">PPPTAF Fund Management</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.ppptafFund.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.budget').'/budget'}}" class="{{($url==config('app.budget').'/budget'  || $url==config('app.budget').'/budget/create'|| $url==(request()->is(config('app.budget').'/budget/*/edit'))) ? 'current-page':''}}">Budget</a>
                                            </li>
                                            @endcan
                                            @can('app.ppptafFund.create')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.budget').'/budget-payment'}}" class="{{($url==config('app.budget').'/budget-payment') ? 'current-page':''}}">Budget Payment</a>
                                            </li>
                                            @endcan
                                            @can('app.ppptafFund.report')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.budget').'/budget-payment-report'}}" class="{{($url==config('app.budget').'/budget-payment-report') ? 'current-page':''}}">Budget Payment Report</a>
                                            </li>
                                            @endcan
                                            @can('app.ppptafFund.amendment')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.budget').'/budget-payment-amendment'}}" class="{{($url==config('app.budget').'/budget-payment-amendment') ? 'current-page':''}}">Budget Payment Amendment</a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                                <!-------------- budget recovery part ------------>
                                @can('app.budgetRecovery.module')
                                <li class="default-sidebar-dropdown {{(
                                    $url==config('app.budget').'/add-extra-percent'  || $url==config('app.budget').'/add-extra-percent/create'|| $url==(request()->is(config('app.budget').'/add-extra-percent/*/edit')) ||
                                    $url==config('app.budget').'/recovery'  || $url==config('app.budget').'/recovery/create'|| $url==(request()->is(config('app.budget').'/recovery/*/edit')) ||
                                    $url==config('app.budget').'/recovery-report' ||
                                    $url==config('app.budget').'/recovery-amendment') ? 'active':''}}">
                                    <a href="javascript::void(0)">
                                        <i class="icon-dollar-sign"></i>
                                        <span class="menu-text">Fund Recovery Management</span>
                                    </a>
                                    <div class="default-sidebar-submenu">
                                        <ul>
                                            @can('app.fundRecovery.extraPercent')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.budget').'/add-extra-percent'}}" class="{{($url==config('app.budget').'/add-extra-percent'  || $url==config('app.budget').'/add-extra-percent/create'|| $url==(request()->is(config('app.budget').'/add-extra-percent/*/edit'))) ? 'current-page':''}}">Add Extra Percent</a>
                                            </li>
                                            @endcan
                                            @can('app.fundRecovery.index')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.budget').'/recovery'}}" class="{{($url==config('app.budget').'/recovery'  || $url==config('app.budget').'/recovery/create'|| $url==(request()->is(config('app.budget').'/recovery/*/edit'))) ? 'current-page':''}}">Recovery List</a>
                                            </li>
                                            @endcan
                                            @can('app.fundRecovery.report')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.budget').'/recovery-report'}}" class="{{($url==config('app.budget').'/recovery-report') ? 'current-page':''}}">Recovery Report</a>
                                            </li>
                                            @endcan
                                            @can('app.fundRecovery.amendment')
                                            <li>
                                                <a href="{{$baseUrl.'/'.config('app.budget').'/recovery-amendment'}}" class="{{($url==config('app.budget').'/recovery-amendment') ? 'current-page':''}}">Recovery Amendment</a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar menu ends -->

                </div>
                <!-- Default sidebar wrapper end -->
                
            </nav>
            <!-- Sidebar wrapper end -->

            <!-- *************
                ************ Main container start *************
            ************* -->
            <div class="main-container">

                <!-- Page header starts -->
                <div class="page-header">
                    
                    <!-- Row start -->
                    <div class="row gutters">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-9">
                             <!-- Search container start -->
                            <div class="search-container">

                                <!-- Toggle sidebar start -->
                                <div class="toggle-sidebar" id="toggle-sidebar">
                                    <i class="icon-menu"></i>
                                </div>
                                <!-- Toggle sidebar end -->

                            </div>
                            <!-- Search container end -->
                            <!-- <div class="row toggle-sidebar">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <img class="profile-user-img img-responsive " src="{{asset('upload/logo/logo1.png')}}" height="45px" alt="User profile picture">
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <img class="profile-user-img img-responsive " src="{{asset('upload/logo/logo1.png')}}" height="45px" alt="User profile picture">
                                </div>
                            </div> -->
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-3">

                            <!-- Header actions start -->
                            <ul class="header-actions">
                                <li class="dropdown">
                                    <a href="javascript:void(0)" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                        <span class="avatar">
                                            <?php 
                                                $user = DB::table('users')->where('id',Auth::id())->select('image')->first();    
                                            ?>
                                            <img src="{{asset('upload/user/'.$user->image)}}" alt="User Avatar">
                                            <span class="status busy"></span>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end md" aria-labelledby="userSettings" style="width: 21rem">
                                        <div class="header-profile-actions">
                                            <!-- <a href="#"><i class="icon-user1"></i>Profile</a> -->
                                            <a href="{{route('web-project-list')}}" target="_blank"><i class="icon-settings1"></i>Website</a>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-log-out1"></i>Logout</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!-- Header actions end -->

                        </div>
                    </div>
                    <!-- Row end -->                    

                </div>
                <!-- Page header ends -->
                @yield('content') 
                <!-- App footer start -->
                <div class="app-footer">© BinaryIT <?php echo date('Y')?></div>
                <!-- App footer end -->
            </div>
            <!-- ************************* Main container end ************************** -->

        </div>
        <!-- Page wrapper end -->

        <!-- *************
            ************ Required JavaScript Files *************
        ************* -->
        <!-- Required jQuery first, then Bootstrap Bundle JS -->
        {!!Html::script('custom/js/jquery.min.js')!!}
        {!!Html::script('custom/js/bootstrap.bundle.min.js')!!}
        {!!Html::script('custom/js/modernizr.js')!!}
        {!!Html::script('custom/js/moment.js')!!}
        
        {!!Html::script('custom/js/webcam.min.js')!!}

        <!-- *************
            ************ Vendor Js Files *************
        ************* -->
        
        <!-- Megamenu JS -->
        {!!Html::script('custom/vendor/megamenu/js/megamenu.js')!!}
        {!!Html::script('custom/vendor/megamenu/js/custom.js')!!}

        <!-- Slimscroll JS -->
        {!!Html::script('custom/vendor/slimscroll/slimscroll.min.js')!!}
        {!!Html::script('custom/vendor/slimscroll/custom-scrollbar.js')!!}

        <!-- Search Filter JS -->
        {!!Html::script('custom/vendor/search-filter/search-filter.js')!!}
        {!!Html::script('custom/vendor/search-filter/custom-search-filter.js')!!}

        <!-- Data Tables -->
        {!!Html::script('custom/vendor/datatables/dataTables.min.js')!!}
        {!!Html::script('custom/vendor/datatables/dataTables.bootstrap.min.js')!!}
        
        <!-- Custom Data tables -->
        {!!Html::script('custom/vendor/datatables/custom/custom-datatables.js')!!}

        <!-- Download / CSV / Copy / Print -->
        {!!Html::script('custom/vendor/datatables/buttons.min.js')!!}
        {!!Html::script('custom/vendor/datatables/jszip.min.js')!!}
        {!!Html::script('custom/vendor/datatables/pdfmake.min.js')!!}
        {!!Html::script('custom/vendor/datatables/vfs_fonts.js')!!}
        {!!Html::script('custom/vendor/datatables/html5.min.js')!!}
        {!!Html::script('custom/vendor/datatables/buttons.print.min.js')!!}

        <!-- Apex Charts -->
        <!-- {!!Html::script('custom/vendor/apex/apexcharts.min.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/salesGraph.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/ordersGraph.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/earningsGraph.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/visitorsGraph.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/customersGraph.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/sparkline.js')!!} -->

        <!-- Circleful Charts -->
        <!-- {!!Html::script('custom/vendor/circliful/circliful.min.js')!!}
        {!!Html::script('custom/vendor/circliful/circliful.custom.js')!!} -->

        <!-- Main Js Required -->
        {!!Html::script('custom/js/main.js')!!}

        <!-- Date Range JS -->
        {!!Html::script('custom/vendor/daterange/daterange.js')!!}
        {!!Html::script('custom/vendor/daterange/custom-daterange.js')!!}

        <!-- Steps wizard JS -->
        {!!Html::script('custom/vendor/wizard/jquery.steps.min.js')!!}
        {!!Html::script('custom/vendor/wizard/jquery.steps.custom.js')!!}

        <!-- Bootstrap Select JS -->
        {!!Html::script('custom/vendor/bs-select/bs-select.min.js')!!}
        {!!Html::script('custom/vendor/bs-select/bs-select-custom.js')!!}

		<!-- Summernote JS -->
        {!!Html::script('custom/vendor/summernote/summernote-bs4.js')!!}

        <!-- Sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.confirmdelete').on('click', function (event) {
              event.preventDefault();
                  var $form = $(this).closest('form');
                  swal({
                      title: "Are you sure?",
                      text: $(this).attr('confirm'),
                      type: "warning",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      $form.submit();
                    }
                  });
            });

            $(document).ready( function () {
              $('#dataTable').DataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
              });
            });

            function printReportOld() {
                //("#print_icon").hide();
                var reportTablePrint=document.getElementById("printTable");
                newWin= window.open("");
                //newWin.document.write('<table width="100%"><tr><td><center>শুকরিয়া মার্কেট<br>জিন্দা বাজার, সিলেট<br>(+৮৮০) ১৭১১৭২১০৮০</center></td></tr></table><br>');
                newWin.document.write('<table width="100%"><tr><td><center>PPPO</center></td></tr></table><br>');
                newWin.document.write(reportTablePrint.innerHTML);
                newWin.print();
                newWin.close();
                ("#print_icon").show();
            }

            function printReport() {
                //("#print_icon").hide();
                var reportTablePrint=document.getElementById("printTable");
                newWin= window.open();
                var is_chrome = Boolean(newWin.chrome);
                // var top = '<center><img src="{{URL::to("logo/logo.png")}}" width="40px" height="40px"></center>';
                //   top += '<center><h3>PPPO</h3></center>';
                //   top += '<center><p style="margin-top:-10px">Address</p></center>';
                // newWin.document.write(top);
                newWin.document.write(reportTablePrint.innerHTML);
                if (is_chrome) {
                    setTimeout(function () { // wait until all resources loaded 
                    newWin.document.close(); // necessary for IE >= 10
                    newWin.focus(); // necessary for IE >= 10
                    newWin.print();  // change window to winPrint
                    newWin.close();// change window to winPrint
                    }, 250);
                }
                else {
                    newWin.document.close(); // necessary for IE >= 10
                    newWin.focus(); // necessary for IE >= 10

                    newWin.print();
                    newWin.close();
                }
            }


            $('.keyup').on('keyup', function () {
              if ($('#newPass').val() == $('#confirmPass').val()) {
                $('#confirmMsg').html('Password Matched !').css('color', 'green');
              } else 
                $('#confirmMsg').html('Password Do not Matched !').css('color', 'red');
            });
            
            jQuery('.decimal').on('keydown', function (event) {return isNumberOveride(event, this);});

            function isNumberOveride(evt, element) {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if ((charCode != 190 || $(element).val().indexOf('.') != -1) // “.” CHECK DOT, AND ONLY ONE.
                && (charCode != 110 || $(element).val().indexOf('.') != -1) // “.” CHECK DOT, AND ONLY ONE.
                && ((charCode < 48 && charCode != 8)
                || (charCode > 57 && charCode < 96)
                || charCode > 105))
                return false;
                return true;
            }
        </script> 


        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
        <script type="text/javascript">
            /*$(document).ready(function(){
              $('.select2').select2({ width: '100%', height: '100%', placeholder: "Select an Option", allowClear: true });

            });*/
        </script>

        <!--jquery datepicker-->
          <link href= "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
          <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
          <script>
            $(function() {
              $( ".datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
            });
          </script>
          <!--./jquery datepicker-->

    </body>
</html>