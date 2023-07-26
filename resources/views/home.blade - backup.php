<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="{{asset('custom/img/fav.png')}}">

		<!-- Title -->
		<title>Uni Pro Admin Template - Admin Dashboard</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		{!!Html::style('custom/css/bootstrap.min.css')!!}
		
		<!-- Icomoon Font Icons css -->
		{!!Html::style('custom/fonts/style.css')!!}

		<!-- Main css -->
		{!!Html::style('custom/css/main.css')!!}


		<!-- *************
			************ Vendor Css Files *************
		************ -->

		<!-- Mega Menu -->
		{!!Html::style('custom/vendor/megamenu/css/megamenu.css')!!}

		<!-- Search Filter JS -->
		{!!Html::style('custom/vendor/search-filter/search-filter.css')!!}
		{!!Html::style('custom/vendor/search-filter/custom-search-filter.css')!!}
		
	</head>
	<body>

		<!-- Loading wrapper start -->
		<div id="loading-wrapper">
			<div class="spinner-border"></div>
			Loading...
		</div>
		<!-- Loading wrapper end -->

		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
			<!-- Sidebar wrapper start -->
			<nav class="sidebar-wrapper">

				<!-- Sidebar content start -->
				<div class="sidebar-tabs">

					<!-- Tabs nav start -->
					<div class="nav" role="tablist" aria-orientation="vertical">
						<a href="{{URL::To('home')}}" class="logo">
							<img src="{{asset('custom/img/logo.svg')}}" alt="Uni Pro Admin">
						</a>
						<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">
							<i class="icon-home2"></i>
							<span class="nav-link-text">Dashboards</span>
						</a>
						<a class="nav-link" id="product-tab" data-bs-toggle="tab" href="#tab-product" role="tab" aria-controls="tab-product" aria-selected="false">
							<i class="icon-layers2"></i>
							<span class="nav-link-text">Product</span>
						</a>
						<a class="nav-link" id="pages-tab" data-bs-toggle="tab" href="#tab-pages" role="tab" aria-controls="tab-pages" aria-selected="false">
							<i class="icon-book-open"></i>
							<span class="nav-link-text">Pages</span>
						</a>
						<a class="nav-link" id="forms-tab" data-bs-toggle="tab" href="#tab-forms" role="tab" aria-controls="tab-forms" aria-selected="false">
							<i class="icon-edit1"></i>
							<span class="nav-link-text">Forms</span>
						</a>
						<a class="nav-link" id="components-tab" data-bs-toggle="tab" href="#tab-components" role="tab" aria-controls="tab-components" aria-selected="false">
							<i class="icon-box"></i>
							<span class="nav-link-text">Components</span>
						</a>
						<a class="nav-link" id="graphs-tab" data-bs-toggle="tab" href="#tab-graphs" role="tab" aria-controls="tab-graphs" aria-selected="false">
							<i class="icon-pie-chart1"></i>
							<span class="nav-link-text">Graphs</span>
						</a>
						<a class="nav-link" id="authentication-tab" data-bs-toggle="tab" href="#tab-authentication" role="tab" aria-controls="tab-authentication" aria-selected="false">
							<i class="icon-unlock"></i>
							<span class="nav-link-text">Authentication</span>
						</a>
						<a class="nav-link settings" id="settings-tab" data-bs-toggle="tab" href="#tab-settings" role="tab" aria-controls="tab-authentication" aria-selected="false">
							<i class="icon-settings1"></i>
							<span class="nav-link-text">Settings</span>
						</a>
					</div>
					<!-- Tabs nav end -->

					<!-- Tabs content start -->
					<div class="tab-content">
								
						<!-- Chat tab -->
						<div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">

							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Dashboards
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>
										<li>
											<a href="{{URL::To('home')}}" class="current-page">Dashboard</a>
										</li>
										<li>
											<a href="analytics.html">Analytics</a>
										</li>
										<li>
											<a href="sales.html">Sales</a>
										</li>
										<li>
											<a href="crm.html">CRM</a>
										</li>
										<li>
											<a href="reports.html">Reports</a>
										</li>
										<li>
											<a href="saas.html">Saas</a>
										</li>
										<li>
											<a href="consulting.html">Consulting</a>
										</li>
										<li>
											<a href="profile.html">Profile</a>
										</li>
									</ul>
									<ul>
										<li class="list-heading">Layouts</li>
										<li>
											<a href="starter-page.html">Starter Page</a>
										</li>
										<li>
											<a href="layout-tabs-tooltip.html">Tabs Hover Tooltip</a>
										</li>
										<li>
											<a href="layout-tile-menu.html">Tile Menu</a>
										</li>
										<li>
											<a href="layout-collapse-menu.html">Collapse Sidebar</a>
										</li>
										<li>
											<a href="layout-compact-menu.html">Compact Sidebar</a>
										</li>
										<li>
											<a href="layout-slim-menu.html">Slim Sidebar</a>
										</li>
										<li>
											<a href="layout-hover-tabs.html">Hover Tabs</a>
										</li>
										<li>
											<a href="layout-daterange.html">Date Range</a>
										</li>
										<li>
											<a href="layout-full-screen.html">Full Screen</a>
										</li>
										<li>
											<a href="layout-full-view.html">Full View</a>
										</li>
										<li>
											<a href="layout-search.html">Global Search</a>
										</li>
										<li>
											<a href="layout-megamenu.html">Megamenu</a>
										</li>
										<li>
											<a href="layout-bradcrumb.html">Breadcrumbs</a>
										</li>
										<li>
											<a href="layout-scroll-cards.html">Scroll Cards</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- Sidebar menu ends -->

							<!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<a href="orders.html" class="red">
									<div class="bg-avatar">12</div>
									<h5>New Orders</h5>
								</a>
								<a href="invoices-list.html" class="blue">
									<div class="bg-avatar">24</div>
									<h5>Bills Pending</h5>
								</a>
							</div>
							<!-- Sidebar actions ends -->

						</div>

						<!-- Pages tab -->
						<div class="tab-pane fade" id="tab-product" role="tabpanel" aria-labelledby="product-tab">
							
							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Product
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>
										<li>
											<a href="products.html">Products Grid</a>
										</li>
										<li>
											<a href="products-list.html">Products List</a>
										</li>
										<li>
											<a href="add-product.html">Add Product</a>
										</li>
										<li>
											<a href="orders.html">Orders</a>
										</li>
										<li>
											<a href="customers-list.html">Customers</a>
										</li>
										<li>
											<a href="products-reviews.html">Reviews</a>
										</li>
									</ul>
									<ul>
										<li class="list-heading">Calendars</li>
										<li>
											<a href="calendar-daygrid-view.html">Daygrid View</a>
										</li>
										<li>
											<a href="calendar-list-view.html">List View</a>
										</li>
										<li>
											<a href="calendar-external-dragging.html">Draggable</a>
										</li>
										<li>
											<a href="calendar-google-view.html">Google View</a>
										</li>
										<li>
											<a href="calendar-selectable.html">Selectable</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- Sidebar menu ends -->

							<!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<div class="support-tile">
									<i class="icon-headphones"></i> 24/7 Support
								</div>
							</div>
							<!-- Sidebar actions ends -->
							
						</div>

						<!-- Pages tab -->
						<div class="tab-pane fade" id="tab-pages" role="tabpanel" aria-labelledby="pages-tab">
							
							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Pages
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>
										<li>
											<a href="chat.html">Chat</a>
										</li>
										<li>
											<a href="tasks.html">Tasks</a>
										</li>
										<li>
											<a href="create-invoice.html">Create Invoice</a>
										</li>
										<li>
											<a href="view-invoice.html">View Invoice</a>
										</li>
										<li>
											<a href="documents.html">Documents</a>
										</li>
										<li>
											<a href="faq.html">Faq's</a>
										</li>
										<li>
											<a href="contacts.html">Contacts</a>
										</li>
										<li>
											<a href="pricing.html">Pricing</a>
                                        </li>
                                        <li>
											<a href="gallery-tiles.html">Gallery Tiles</a>
                                        </li>
                                        <li>
											<a href="gallery.html">Gallery</a>
										</li>
										<li>
											<a href="icons.html">Icons</a>
										</li>
										<li>
											<a href="timeline.html">Timeline</a>
										</li>
										<li>
											<a href="search-results.html">Search Results</a>
										</li>
										<li>
											<a href="account-settings.html">Account Settings</a>
                                        </li>
                                        <li>
											<a href="user-profile.html">User Profile</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- Sidebar menu ends -->

							<!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<div class="support-tile green">
									<i class="icon-pie-chart1"></i> 5GB Free Space
								</div>
							</div>
							<!-- Sidebar actions ends -->

						</div>

						<!-- Forms tab -->
						<div class="tab-pane fade" id="tab-forms" role="tabpanel" aria-labelledby="forms-tab">

							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Forms
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>
										<li class="list-heading">Form Layouts</li>
										<li>
											<a href="forms-layout-one.html">Default Layout</a>
										</li>
										<li>
											<a href="forms-layout-two.html">Layout Sections</a>
										</li>
										<li>
											<a href="forms-layout-three.html">Simple Form Layout</a>
										</li>
										<li>
											<a href="forms-layout-four.html">Select 2 Tags and Mask</a>
										</li>
										<li>
											<a href="forms-layout-five.html">Horizontal Form Layout</a>
										</li>
										<li>
											<a href="forms-layout-six.html">Layout Six with Tabs</a>
										</li>
									</ul>									
									<ul>
										<li class="list-heading">Form Fields</li>
										<li>
											<a href="forms-inputs.html">Form Inputs</a>
										</li>
										<li>
											<a href="forms-input-groups.html">Input Groups</a>
										</li>
										<li>
											<a href="forms-checkbox-radio.html">Checkbox &amp; Radios</a>
										</li>
										<li>
											<a href="forms-validation.html">Form Validation</a>
										</li>
									</ul>									
									<ul>
										<li class="list-heading">Plugins</li>
										<li>
											<a href="forms-dropzone.html">Dropzone</a>
										</li>
										<li>
											<a href="forms-bs-select.html">Select 2 Dropdowns</a>
										</li>
										<li>
											<a href="forms-date-time-picker.html">Date Time Picker</a>
										</li>
										<li>
											<a href="forms-input-mask.html">Input Mask</a>
										</li>
										<li>
											<a href="forms-input-range.html">Input Range</a>
										</li>
										<li>
											<a href="forms-editor.html">WYSIWYG Editor</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- Sidebar menu ends -->

							<!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<div class="support-tile red">
									<i class="icon-mail"></i> Inbox Full
								</div>
							</div>
							<!-- Sidebar actions ends -->

						</div>
						
						<!-- Components tab -->
						<div class="tab-pane fade" id="tab-components" role="tabpanel" aria-labelledby="components-tab">
							
							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Components
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>
                                        <li>
                                            <a href="accordions.html">Accordions</a>
                                        </li>
                                        <li>
                                            <a href="alerts.html">Alerts</a>
                                        </li>
                                        <li>
                                            <a href="buttons.html">Buttons</a>
                                        </li>
                                        <li>
                                            <a href="badges.html">Badges</a>
                                        </li>
                                        <li>
                                            <a href="cards.html">Cards</a>
                                        </li>
                                        <li>
                                            <a href="carousel.html">Carousel</a>
                                        </li>
                                        <li>
                                            <a href="list-group.html">List group</a>
                                        </li>
                                        <li>
                                            <a href="modals.html">Modal</a>
                                        </li>
                                        <li>
                                            <a href="paginations.html">Paginations</a>
                                        </li>
                                        <li>
                                            <a href="popovers.html">Popovers</a>
                                        </li>
                                        <li>
                                            <a href="progress.html">Progress</a>
                                        </li>
                                        <li>
                                            <a href="spinners.html">Spinners</a>
                                        </li>
                                        <li>
                                            <a href="tabs.html">Tabs</a>
                                        </li>
                                        <li>
                                            <a href="toasts.html">Toasts</a>
                                        </li>
                                        <li>
                                            <a href="tooltips.html">Tooltips</a>
                                        </li>
									</ul>
								</div>
							</div>
							<!-- Sidebar menu ends -->

                            <!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<div class="support-tile yellow">
									<i class="icon-arrow-down-circle"></i><a href="#">Download Reports</a>						</div>
							</div>
							<!-- Sidebar actions ends -->

						</div>

						<!-- Graphs tab -->
						<div class="tab-pane fade" id="tab-graphs" role="tabpanel" aria-labelledby="graphs-tab">
							
							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Graphs &amp; Tables
							</div>
							<!-- Tab content header end -->
							
							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
                                    <ul>
										<li class="list-heading">Graphs</li>
                                        <li>
                                            <a href="apex-graphs.html">Apex Graphs</a>
                                        </li>
                                        <li>
                                            <a href="morris-graphs.html">Morris Graphs</a>
                                        </li>
                                        <li>
                                            <a href="vector-maps.html">Vector Maps</a>
                                        </li>
                                    </ul>
                                    
                                    <ul>
										<li class="list-heading">Tables</li>
                                        <li>
                                            <a href="bootstrap-tables.html">Bootstrap Tables</a>
                                        </li>
                                        <li>
                                            <a href="custom-tables.html">Custom Tables</a>
                                        </li>
                                        <li>
                                            <a href="data-tables.html">Data Tables</a>
                                        </li>
									</ul>
								</div>
							</div>
							<!-- Sidebar menu ends -->

							<!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<div class="support-tile pink">
									<i class="icon-align-right1"></i> RTL Support
								</div>
							</div>
							<!-- Sidebar actions ends -->

						</div>

						<!-- Authentication tab -->
						<div class="tab-pane fade" id="tab-authentication" role="tabpanel" aria-labelledby="authentication-tab">
							
							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Authentication
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>
										<li>
											<a href="login.html">Login</a>
										</li>
										<li>
											<a href="signup.html">Signup</a>
										</li>
										<li>
											<a href="forgot-password.html">Forgot Password</a>
										</li>
										<li>
											<a href="reset-password.html">Reset Password</a>
										</li>
										<li>
											<a href="lock-screen.html">Lock Screen</a>
										</li>
										<li>
											<a href="subscribe.html">Subscribe</a>
										</li>										
										<li>
											<a href="maintenance.html">Maintenance</a>
										</li>
										<li>
											<a href="error.html">404</a>
										</li>
										<li>
											<a href="error-option2.html">Error</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- Sidebar menu ends -->

							<!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<div class="support-tile blue">
									<a href="pricing.html" class="btn btn-light m-auto">Upgrade Account</a>
								</div>
							</div>
							<!-- Sidebar actions ends -->

						</div>
						
						<!-- Settings tab -->
						<div class="tab-pane fade" id="tab-settings" role="tabpanel" aria-labelledby="settings-tab">
							
							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Settings
							</div>
							<!-- Tab content header end -->

							<!-- Settings start -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-settings">
									<div class="accordion" id="settingsAccordion">
										<div class="accordion-item">
											<h2 class="accordion-header" id="genInfo">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#genCollapse" aria-expanded="true" aria-controls="genCollapse">
													General Info
												</button>
											</h2>
											<div id="genCollapse" class="accordion-collapse collapse show" aria-labelledby="genInfo" data-bs-parent="#settingsAccordion">
												<div class="accordion-body">
													<div class="field-wrapper">
														<input type="text" value="Jeivxezer Lopexz" />
														<div class="field-placeholder">Full Name</div>
													</div>

													<div class="field-wrapper">
														<input type="email" value="jeivxezer-lopexz@email.com" />
														<div class="field-placeholder">Email</div>
													</div>

													<div class="field-wrapper">
														<input type="text" value="0 0000 00000" />
														<div class="field-placeholder">Contact</div>
													</div>
													<div class="field-wrapper m-0">
														<button class="btn btn-primary stripes-btn">Save</button>
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="chngPwd">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chngPwdCollapse" aria-expanded="false" aria-controls="chngPwdCollapse">
													Change Password
												</button>
											</h2>
											<div id="chngPwdCollapse" class="accordion-collapse collapse" aria-labelledby="chngPwd" data-bs-parent="#settingsAccordion">
												<div class="accordion-body">
													<div class="field-wrapper">
														<input type="text" value="">
														<div class="field-placeholder">Current Password</div>
													</div>
													<div class="field-wrapper">
														<input type="password" value="">
														<div class="field-placeholder">New Password</div>
													</div>
													<div class="field-wrapper">
														<input type="password" value="">
														<div class="field-placeholder">Confirm Password</div>
													</div>
													<div class="field-wrapper m-0">
														<button class="btn btn-primary stripes-btn">Save</button>
													</div>

												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="sidebarNotifications">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#notiCollapse" aria-expanded="false" aria-controls="notiCollapse">
													Notifications
												</button>
											</h2>
											<div id="notiCollapse" class="accordion-collapse collapse" aria-labelledby="sidebarNotifications" data-bs-parent="#settingsAccordion">
												<div class="accordion-body">
													<div class="list-group m-0">
														<div class="noti-container">
															<div class="noti-block">
																<div>Alerts</div>
																<div class="form-switch">
																	<input class="form-check-input" type="checkbox" id="showAlertss" checked>
																	<label class="form-check-label" for="showAlertss"></label>
																</div>
															</div>
															<div class="noti-block">
																<div>Enable Sound</div>
																<div class="form-switch">
																	<input class="form-check-input" type="checkbox" id="soundEnable">
																	<label class="form-check-label" for="soundEnable"></label>
																</div>
															</div>
															<div class="noti-block">
																<div>Allow Chat</div>
																<div class="form-switch">
																	<input class="form-check-input" type="checkbox" id="allowChat">
																	<label class="form-check-label" for="allowChat"></label>
																</div>
															</div>
															<div class="noti-block">
																<div>Desktop Messages</div>
																<div class="form-switch">
																	<input class="form-check-input" type="checkbox" id="desktopMessages">
																	<label class="form-check-label" for="desktopMessages"></label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Settings end -->

							<!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<div class="support-tile blue">
									<a href="account-settings.html" class="btn btn-light m-auto">Advance Settings</a>
								</div>
							</div>
							<!-- Sidebar actions ends -->
						</div>

					</div>
					<!-- Tabs content end -->

				</div>
				<!-- Sidebar content end -->
				
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

								<!-- Mega Menu Start -->
								<div class="cd-dropdown-wrapper">
									<a class="cd-dropdown-trigger" href="#0"><i class="icon-menu menu-icon"></i><span class="menu-text">Megamenu</span></a>
									<nav class="cd-dropdown">

										<ul class="cd-dropdown-content">

											<li class="has-children">
												<a href="#">Main Pages</a>
												<ul class="cd-secondary-dropdown is-hidden">
													<li class="has-children">
														<a href="#">Dashboards</a>
														<ul class="is-hidden">
															<li>
																<a href="reports.html">Reports</a>
															</li>
															<li>
																<a href="saas.html">Saas</a>
															</li>
															<li>
																<a href="sales.html">Sales</a>
															</li>
															<li>
																<a href="index.html">Admin</a>
															</li>
															<li>
																<a href="analytics.html">Analytics</a>
															</li>															
															<li>
																<a href="crm.html">CRM</a>
															</li>
															<li>
																<a href="consulting.html">Consulting</a>
															</li>
														</ul>
													</li>
													<li class="has-children">
														<a href="#">Layouts</a>
														<ul class="is-hidden">
															<li>
																<a href="starter-page.html">Starter Page</a>
															</li>
															<li>
																<a href="layout-full-screen.html">Full Screen</a>
															</li>
															<li>
																<a href="layout-search.html">Global Search</a>
															</li>
															<li>
																<a href="layout-megamenu.html">Megamenu</a>
															</li>
															<li>
																<a href="layout-bradcrumb.html">Breadcrumbs</a>
															</li>
															<li>
																<a href="layout-scroll-cards.html">Scroll Cards</a>
															</li>
														</ul>
													</li>												
												</ul>
											</li>

											<li class="has-children">
												<a href="#">Product &amp; Calendars</a>

												<ul class="cd-secondary-dropdown is-hidden">
													<li class="has-children">
														<a href="#">Product</a>
														<ul class="is-hidden">
															<li>
																<a href="products.html">Products Grid</a>
															</li>
															<li>
																<a href="products-list.html">Products List</a>
															</li>
															<li>
																<a href="add-product.html">Add Product</a>
															</li>
															<li>
																<a href="orders.html">Orders</a>
															</li>
															<li>
																<a href="customers-list.html">Customers</a>
															</li>
															<li>
																<a href="products-reviews.html">Reviews</a>
															</li>														
														</ul>
													</li>

													<li class="has-children">
														<a href="#">Calendars</a>
														<ul class="is-hidden">
															<li>
																<a href="calendar-daygrid-view.html">Daygrid View</a>
															</li>
															<li>
																<a href="calendar-list-view.html">List View</a>
															</li>
															<li>
																<a href="calendar-external-dragging.html">Draggable</a>
															</li>
															<li>
																<a href="calendar-google-view.html">Google View</a>
															</li>
															<li>
																<a href="calendar-selectable.html">Selectable</a>
															</li>													
														</ul>
													</li>												
												</ul>
											</li>

											<li class="has-children">
												<a href="#">Forms</a>

												<ul class="cd-secondary-dropdown is-hidden">

													<li class="has-children">
														<a href="#">Form Layouts</a>
														<ul class="is-hidden">
															<li>
																<a href="forms-layout-one.html">Default Layout</a>
															</li>
															<li>
																<a href="forms-layout-two.html">Layout Sections</a>
															</li>
															<li>
																<a href="forms-layout-three.html">Simple Form Layout</a>
															</li>
															<li>
																<a href="forms-layout-four.html">Select 2 Tags and Mask</a>
															</li>
															<li>
																<a href="forms-layout-five.html">Horizontal Form Layout</a>
															</li>
															<li>
																<a href="forms-layout-six.html">Layout Six with Tabs</a>
															</li>													
														</ul>
													</li>

													<li class="has-children">
														<a href="#">Forms</a>
														<ul class="is-hidden">
															<li>
																<a href="forms-inputs.html">Form Inputs</a>
															</li>
															<li>
																<a href="forms-input-groups.html">Input Groups</a>
															</li>
															<li>
																<a href="forms-checkbox-radio.html">Checkbox &amp; Radios</a>
															</li>
															<li>
																<a href="forms-validation.html">Form Validation</a>
															</li>
															<li>
																<a href="forms-dropzone.html">Dropzone</a>
															</li>
															<li>
																<a href="forms-bs-select.html">Select 2 Dropdowns</a>
															</li>
															<li>
																<a href="forms-date-time-picker.html">Date Time Picker</a>
															</li>
															<li>
																<a href="forms-input-mask.html">Input Mask</a>
															</li>
															<li>
																<a href="forms-input-range.html">Input Range</a>
															</li>
															<li>
																<a href="forms-editor.html">WYSIWYG Editor</a>
															</li>													
														</ul>
													</li>												
												</ul>
											</li>

											<li class="has-children">
												<a href="#">Pages &amp; Components</a>

												<ul class="cd-secondary-dropdown is-hidden">

													<li class="has-children">
														<a href="#">Pages</a>
														<ul class="is-hidden">
															<li>
																<a href="chat.html">Chat</a>
															</li>
															<li>
																<a href="tasks.html">Tasks</a>
															</li>
															<li>
																<a href="create-invoice.html">Create Invoice</a>
															</li>
															<li>
																<a href="view-invoice.html">View Invoice</a>
															</li>
															<li>
																<a href="documents.html">Documents</a>
															</li>
															<li>
																<a href="faq.html">Faq's</a>
															</li>
															<li>
																<a href="contacts.html">Contacts</a>
															</li>
															<li>
																<a href="pricing.html">Pricing</a>
															</li>
															<li>
																<a href="gallery-tiles.html">Gallery Tiles</a>
															</li>
															<li>
																<a href="gallery.html">Gallery</a>
															</li>
															<li>
																<a href="icons.html">Icons</a>
															</li>
															<li>
																<a href="timeline.html">Timeline</a>
															</li>
															<li>
																<a href="search-results.html">Search Results</a>
															</li>
															<li>
																<a href="account-settings.html">Account Settings</a>
															</li>
															<li>
																<a href="user-profile.html">User Profile</a>
															</li>
														</ul>
													</li>

													<li class="has-children">
														<a href="#">Components</a>
														<ul class="is-hidden">
															<li>
																<a href="accordions.html">Accordions</a>
															</li>
															<li>
																<a href="alerts.html">Alerts</a>
															</li>
															<li>
																<a href="buttons.html">Buttons</a>
															</li>
															<li>
																<a href="badges.html">Badges</a>
															</li>
															<li>
																<a href="cards.html">Cards</a>
															</li>
															<li>
																<a href="carousel.html">Carousel</a>
															</li>
															<li>
																<a href="list-group.html">List group</a>
															</li>
															<li>
																<a href="modals.html">Modal</a>
															</li>
															<li>
																<a href="paginations.html">Paginations</a>
															</li>
															<li>
																<a href="popovers.html">Popovers</a>
															</li>
															<li>
																<a href="progress.html">Progress</a>
															</li>
															<li>
																<a href="spinners.html">Spinners</a>
															</li>
															<li>
																<a href="tabs.html">Tabs</a>
															</li>
															<li>
																<a href="toasts.html">Toasts</a>
															</li>
															<li>
																<a href="tooltips.html">Tooltips</a>
															</li>												
														</ul>
													</li>												
												</ul>
											</li>

											<li class="has-children">
												<a href="#">Graphs &amp; Tables</a>

												<ul class="cd-secondary-dropdown is-hidden">

													<li class="has-children">
														<a href="#">Graphs</a>
														<ul class="is-hidden">
															<li>
																<a href="apex-graphs.html">Apex Graphs</a>
															</li>
															<li>
																<a href="morris-graphs.html">Morris Graphs</a>
															</li>
															<li>
																<a href="vector-maps.html">Vector Maps</a>
															</li>													
														</ul>
													</li>

													<li class="has-children">
														<a href="#">Tables</a>
														<ul class="is-hidden">
															<li>
																<a href="bootstrap-tables.html">Bootstrap Tables</a>
															</li>
															<li>
																<a href="custom-tables.html">Custom Tables</a>
															</li>
															<li>
																<a href="data-tables.html">Data Tables</a>
															</li>												
														</ul>
													</li>												
												</ul>
											</li>
											
											<li>
												<a href="account-settings.html">Account Settings</a>
											</li>
											<li>
												<a href="login.html">Logout</a>
											</li>
											<li>
												<a href="error-option2.html">Error</a>
											</li>
										</ul>
										
									</nav>
								</div>
								<!-- Mega Menu End -->

								<!-- Search input group start -->
								<div class="ui fluid category search">
									<div class="ui icon input">
										<input class="prompt" type="text" placeholder="Search">
										<i class="search icon icon-search1"></i>
									</div>
									<div class="results"></div>
								</div>
								<!-- Search input group end -->

							</div>
							<!-- Search container end -->

						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-3">

							<!-- Header actions start -->
							<ul class="header-actions">
								<li class="dropdown">
									<a href="#" id="taskss" data-toggle="dropdown" aria-haspopup="true">
										<i class="icon-check-square"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end lrg" aria-labelledby="taskss">
										<div class="dropdown-menu-header">
											Tasks (7/10)
										</div>
										<div class="customScroll">
											<ul class="activity">
												<li class="activity-list">
													<div class="detail-info">
														<p class="date">Today</p>
														<p class="info">Messages accepted with attachments</p>
													</div>
												</li>
												<li class="activity-list danger">
													<div class="detail-info">
														<p class="date">Today</p>
														<p class="info">Send email notifications of subscriptions and deletions to list owner</p>
													</div>
												</li>
												<li class="activity-list success">
													<div class="detail-info">
														<p class="date">Yesterday</p>
														<p class="info">Required change logs activity reports</p>
													</div>
												</li>
												<li class="activity-list warning">
													<div class="detail-info">
													<p class="date">2 Days Ago</p>
														<p class="info">Strategic partnership plan</p>
													</div>
												</li>
												<li class="activity-list">
													<div class="detail-info">
														<p class="date">2 days ago</p>
														<p class="info">Send email notifications of subscriptions and deletions to list owner</p>
													</div>
												</li>
												<li class="activity-list danger">
													<div class="detail-info">
														<p class="date">3 days ago</p>
														<p class="info">Required change logs activity reports</p>
													</div>
												</li>
												<li class="activity-list success">
													<div class="detail-info">
													<p class="date">7 days ago</p>
														<p class="info">Strategic partnership plan</p>
													</div>
												</li>
												<li class="activity-list">
													<div class="detail-info">
														<p class="date">2 weeks ago</p>
														<p class="info">Required change logs activity reports</p>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li class="dropdown">
									<a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
										<i class="icon-alert-triangle"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end lrg" aria-labelledby="notifications">
										<div class="dropdown-menu-header">
											Notifications (7)
										</div>
										<div class="customScroll">
											<ul class="header-notifications">
												<li>
													<a href="#">
														<div class="user-img online">
															<img src="{{asset('custom/img/user6.png')}}" alt="User">
														</div>
														<div class="details">
															<div class="user-title">Larkyn</div>
															<div class="noti-details">Check out every table in detail.</div>
															<div class="noti-date">April 25, 04:00 pm</div>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="user-img busy">
															<img src="{{asset('custom/img/user10.png')}}" alt="User">
														</div>
														<div class="details">
															<div class="user-title">Braxten</div>
															<div class="noti-details">Approved new design.</div>
															<div class="noti-date">April 10, 12:00 am</div>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="user-img away">
															<img src="{{asset('custom/img/user21.png')}}" alt="User">
														</div>
														<div class="details">
															<div class="user-title">Maria</div>
															<div class="noti-details">Membership has been ended.</div>
															<div class="noti-date">March 20, 07:30 pm</div>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="user-img busy">
															<img src="{{asset('custom/img/user15.png')}}" alt="User">
														</div>
														<div class="details">
															<div class="user-title">Alex</div>
															<div class="noti-details">Design Review.</div>
															<div class="noti-date">April 18, 09:30 am</div>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="user-img online">
															<img src="{{asset('custom/img/user5.png')}}" alt="User">
														</div>
														<div class="details">
															<div class="user-title">Sunny</div>
															<div class="noti-details">UI Discussion</div>
															<div class="noti-date">April 21, 05:00 pm</div>
														</div>
													</a>
												</li>												
											</ul>
										</div>
									</div>
								</li>
								<li class="dropdown">
									<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
										<span class="avatar">
											<img src="{{asset('custom/img/user5.png')}}" alt="User Avatar">
											<span class="status busy"></span>
										</span>
									</a>
									<div class="dropdown-menu dropdown-menu-end md" aria-labelledby="userSettings">
										<div class="header-profile-actions">
											<a href="user-profile.html"><i class="icon-user1"></i>Profile</a>
											<a href="account-settings.html"><i class="icon-settings1"></i>Settings</a>
											<a href="forgot-password.html"><i class="icon-log-out1"></i>Logout</a>
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

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Content wrapper start -->
					<div class="content-wrapper">

						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
								<div class="stats-tile">
									<div class="sale-icon">
										<i class="icon-shopping-bag1"></i>
									</div>
									<div class="sale-details">
										<h2>25</h2>
										<p>Products</p>
									</div>
									<div class="sale-graph">
										<div id="sparklineLine1"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
								<div class="stats-tile">
									<div class="sale-icon">
										<i class="icon-shopping-bag1"></i>
									</div>
									<div class="sale-details">
										<h2>32</h2>
										<p>Orders</p>
									</div>
									<div class="sale-graph">
										<div id="sparklineLine2"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="stats-tile">
									<div class="sale-icon">
										<i class="icon-check-circle"></i>
									</div>
									<div class="sale-details">
										<h2>19</h2>
										<p>Customers</p>
									</div>
									<div class="sale-graph">
										<div id="sparklineLine3"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 cool-12">

								<div class="card">
									<div class="card-body">
										<!-- Row start -->
										<div class="row gutters">											
											<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
												<div class="reports-summary">
													<div class="reports-summary-block">
														<h5>Great Sales</h5>
														<h6>Overall sales of the month</h6>
													</div>
													<div class="reports-summary-block">
														<h5>35 Millions</h5>
														<h6>Overall earnings</h6>
													</div>
													<div class="reports-summary-block">
														<h5>27 Millions</h5>
														<h6>Overall revenue</h6>
													</div>
													<div class="reports-summary-block">
														<h5>67k</h5>
														<h6>New customers</h6>
													</div>
													<button class="btn btn-danger stripes-btn">Generate Report</button>
												</div>
											</div>
											<div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-12">
												<div class="row gutters">
													<div class="col-12">
														<div class="graph-day-selection mt-2" role="group">
															<button type="button" class="btn active">Today</button>
															<button type="button" class="btn">Yesterday</button>
															<button type="button" class="btn">7 days</button>
															<button type="button" class="btn">15 days</button>
															<button type="button" class="btn">30 days</button>
														</div>
													</div>
													<div class="col-12">
														<div id="salesGraph" class="chart-height-xl"></div>
													</div>
												</div>
											</div>
										</div>
										<!-- Row end -->
									</div>
								</div>

							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

								<div class="card">
									<div class="card-header">
										<div class="card-title">Visitors</div>
										<div class="graph-day-selection" role="group">
											<button type="button" class="btn active">Export</button>
										</div>
									</div>
									<div class="card-body">
										<div id="visitorsGraph" class="chart-height-md"></div>

										<ul class="stats-list-container">
											<li class="stats-list-item primary">
												<div class="stats-icon">
													<i class="icon-calendar1"></i>
												</div>
												<div class="stats-info">
													<h6 class="stats-title">Week 1</h6>
													<p class="stats-amount">25</p>
												</div>
											</li>
											<li class="stats-list-item primary">
												<div class="stats-icon">
													<i class="icon-calendar1"></i>
												</div>
												<div class="stats-info">
													<h6 class="stats-title">Week 2</h6>
													<p class="stats-amount">32</p>
												</div>
											</li>
										</ul>
									</div>
								</div>

							</div>
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

								<div class="card">
									<div class="card-header">
										<div class="card-title">Orders</div>
										<div class="graph-day-selection" role="group">
											<button type="button" class="btn active">View All</button>
										</div>
									</div>
									<div class="card-body">
										<div id="ordersGraph" class="chart-height-md"></div>

										<ul class="stats-list-container">
											<li class="stats-list-item primary">
												<div class="stats-icon">
													<i class="icon-archive1"></i>
												</div>
												<div class="stats-info">
													<h6 class="stats-title">New</h6>
													<p class="stats-amount">15</p>
												</div>
											</li>
											<li class="stats-list-item primary">
												<div class="stats-icon">
													<i class="icon-truck"></i>
												</div>
												<div class="stats-info">
													<h6 class="stats-title">Delivered</h6>
													<p class="stats-amount">10</p>
												</div>
											</li>
										</ul>
									</div>
								</div>

							</div>
							<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

								<div class="card">
									<div class="card-header">
										<div class="card-title">Earnings</div>
										<div class="graph-day-selection" role="group">
											<button type="button" class="btn active">Download</button>
										</div>
									</div>
									<div class="card-body">
										<div id="earningsGraph" class="chart-height-md"></div>

										<ul class="stats-list-container">
											<li class="stats-list-item primary">
												<div class="stats-icon">
													<i class="icon-briefcase"></i>
												</div>
												<div class="stats-info">
													<h6 class="stats-title">Today</h6>
													<p class="stats-amount">$25</p>
												</div>
											</li>
											<li class="stats-list-item primary">
												<div class="stats-icon">
													<i class="icon-briefcase"></i>
												</div>
												<div class="stats-info">
													<h6 class="stats-title">Yesterday</h6>
													<p class="stats-amount">$18</p>
												</div>
											</li>
										</ul>
									</div>
								</div>

							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Recent Orders</div>
										<div class="graph-day-selection" role="group">
											<button type="button" class="btn active">Export to Excel</button>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table products-table">
												<thead>
													<tr>
														<th>Order No.</th>
														<th>Ordered Date</th>
														<th>Product</th>
														<th>Delivery Status</th>												
														<th>Amount</th>
														<th>Discount</th>
														<th>Location</th>
														<th>Est Delivery Date</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#55589</td>
														<td>20/11/2020</td>
														<td>
															<img class="user" src="{{asset('custom/img/products/bag.jpeg')}}" alt="Product Image">
														</td>
														<td>
															<span class="badge bg-info">Moving</span>
														</td>
														<td>$385.00</td>
														<td>30%</td>
														<td>Los Angeles, California</td>
														<td>22/11/2020</td>
													</tr>
													<tr>
														<td>#23198</td>
														<td>23/11/2020</td>												
														<td>
															<img class="user" src="{{asset('custom/img/products/toy.jpeg')}}" alt="Product Image">
														</td>
														<td>
															<span class="badge bg-success">Shipped</span>
														</td>
														<td>$539.00</td>
														<td>25%</td>
														<td>Arverne, New York</td>
														<td>27/11/2020</td>
													</tr>
													<tr>
														<td>#87324</td>
														<td>26/11/2020</td>												
														<td>
															<img class="user" src="{{asset('custom/img/products/pencils.jpeg')}}" alt="Product Image">
														</td>
														<td>
															<span class="badge bg-warning">Pending</span>
														</td>
														<td>$671.00</td>
														<td>35%</td>
														<td>Mesquite, Texas</td>
														<td>29/11/2020</td>
													</tr>
													<tr>
														<td>#65673</td>
														<td>25/11/2020</td>
														<td>
															<img class="user" src="{{asset('custom/img/products/camera.jpeg')}}" alt="Product Image">
														</td>
														<td>
															<span class="badge bg-danger">Cancelled</span>
														</td>
														<td>$490.00</td>
														<td>21%</td>
														<td>Hallandale, Florida</td>
														<td>26/11/2020</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="goal-container">
									<div class="goal-info">
										<h5 class="text-info">Today's Goal</h5>
										<h6>70/100</h6>
									</div>
									<div class="goal-graph">
										<div id="todaysTarget"></div>
										<div class="circle-one"></div>
										<div class="circle-two"></div>
									</div>
								</div>
							</div>							
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<div class="graph-card">
									<h6>New Customers</h6>
									<h4 class="text-info">2500</h4>
									<div class="graph-placeholder">
										<div id="customersGraph"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
								<div class="payments-card">
									<h6>Balance</h6>
									<h4 class="text-info">$5699.89</h4>
									<div class="custom-btn-group mt-2">
										<button class="btn btn-outline-info"><i class="icon-credit-card"></i>Deposit</button>
										<button class="btn btn-info stripes-btn"><i class="icon-credit-card"></i>Withdraw</button>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

					</div>
					<!-- Content wrapper end -->

					<!-- App footer start -->
					<div class="app-footer">© Uni Pro Admin 2021</div>
					<!-- App footer end -->

				</div>
				<!-- Content wrapper scroll end -->

			</div>
			<!-- *************
				************ Main container end *************
			************* -->

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

		<!-- Apex Charts -->
		{!!Html::script('custom/vendor/apex/apexcharts.min.js')!!}
		{!!Html::script('custom/vendor/apex/custom/home/salesGraph.js')!!}
		{!!Html::script('custom/vendor/apex/custom/home/ordersGraph.js')!!}
		{!!Html::script('custom/vendor/apex/custom/home/earningsGraph.js')!!}
		{!!Html::script('custom/vendor/apex/custom/home/visitorsGraph.js')!!}
		{!!Html::script('custom/vendor/apex/custom/home/customersGraph.js')!!}
		{!!Html::script('custom/vendor/apex/custom/home/sparkline.js')!!}

		<!-- Circleful Charts -->
		{!!Html::script('custom/vendor/circliful/circliful.min.js')!!}
		{!!Html::script('custom/vendor/circliful/circliful.custom.js')!!}

		<!-- Main Js Required -->
		{!!Html::script('custom/js/main.js')!!}

	</body>
</html>