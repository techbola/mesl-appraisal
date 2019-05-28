@extends('layouts.main.master')

@section('content')

	<!-- START PAGE CONTENT -->
	<div class="content ">
		<!-- START CONTAINER FLUID -->
		<div class="container-fluid container-fixed-lg">
			<div id="rootwizard" class="m-t-50">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm">
					<li class="active">
						<a data-toggle="tab" href="#tab1"><i class="fa fa-shopping-cart tab-icon"></i> <span>Your cart</span></a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#tab2"><i class="fa fa-truck tab-icon"></i> <span>Shipping information</span></a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane padding-20 active slide-left" id="tab1">
						<div class="row row-same-height">
							<div class="col-md-5 b-r b-dashed b-grey sm-b-b">
								<div class="padding-30 m-t-50">
									<i class="fa fa-shopping-cart fa-2x hint-text"></i>
									<h2>Your Bags are ready to check out!</h2>
									<p>Discover goods you'll love from brands that inspire. The easiest way to open your own online store. Discover amazing stuff or open your own store for free!</p>
									<p class="small hint-text">Below is a sample page for your cart , Created using pages design UI Elementes</p>
								</div>
							</div>
							<div class="col-md-7">
								<div class="padding-30">
									<table class="table table-condensed">
										<tr>
											<td class="col-lg-8 col-md-6 col-sm-7 ">
												<a href="#" class="remove-item"><i class="pg-close"></i></a>
												<span class="m-l-10 font-montserrat fs-18 all-caps">Webarch UI Framework</span>
												<span class="m-l-10 ">Dashboard UI Pack</span>
											</td>
											<td class=" col-lg-2 col-md-3 col-sm-3 text-right">
												<span>Qty 1</span>
											</td>
											<td class=" col-lg-2 col-md-3 col-sm-2 text-right">
												<h4 class="text-primary no-margin font-montserrat">$27</h4>
											</td>
										</tr>
										<tr>
											<td class="col-lg-8 col-md-6 col-sm-7">
												<a href="#" class="remove-item"><i class="pg-close"></i></a>
												<span class="m-l-10 font-montserrat fs-18 all-caps">Pages UI Framework</span>
												<span class="m-l-10 ">Next Gen UI Pack</span>
											</td>
											<td class="col-lg-2 col-md-3 col-sm-3 text-right">
												<span>Qty 1</span>
											</td>
											<td class=" col-lg-2 col-md-3 col-sm-2 text-right">
												<h4 class="text-primary no-margin font-montserrat">$27</h4>
											</td>
										</tr>
									</table>
									<h5>Donation</h5>
									<div class="row">
										<div class="col-lg-7 col-md-6">
											<p class="no-margin">Donate now and give clean, safe water to those in need. </p>
											<p class="small hint-text">
												100% of your donation goes to the field, and you can track the progress of every dollar spent. <a href="#">Click Here</a>
											</p>
										</div>
										<div class="col-lg-5 col-md-6">
											<div class="btn-group" data-toggle="buttons">
												<label class="btn btn-default active">
													<input type="radio" name="options" id="option1" checked> <span class="fs-16">$0</span>
												</label>
												<label class="btn btn-default">
													<input type="radio" name="options" id="option2"> <span class="fs-16">$10</span>
												</label>
												<label class="btn btn-default">
													<input type="radio" name="options" id="option3"> <span class="fs-16">$20</span>
												</label>
											</div>
										</div>
									</div>
									<br>
									<div class="container-sm-height">
										<div class="row row-sm-height b-a b-grey">
											<div class="col-sm-3 col-sm-height col-middle p-l-10 sm-padding-15">
												<h5 class="font-montserrat all-caps small no-margin hint-text bold">Discount (10%)</h5>
												<p class="no-margin">$10</p>
											</div>
											<div class="col-sm-7 col-sm-height col-middle sm-padding-15 ">
												<h5 class="font-montserrat all-caps small no-margin hint-text bold">Donations</h5>
												<p class="no-margin">$0</p>
											</div>
											<div class="col-sm-2 text-right bg-primary col-sm-height col-middle padding-10">
												<h5 class="font-montserrat all-caps small no-margin hint-text text-white bold">Total</h5>
												<h4 class="no-margin text-white">$44</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane slide-left padding-20" id="tab2">
						<div class="row row-same-height">
							<div class="col-md-5 b-r b-dashed b-grey ">
								<div class="padding-30 m-t-50">
									<h2>Your Information is safe with us!</h2>
									<p>We respect your privacy and protect it with strong encryption, plus strict policies . Two-step verification, which we encourage all our customers to use.</p>
									<p class="small hint-text">Below is a sample page for your cart , Created using pages design UI Elementes</p>
								</div>
							</div>
							<div class="col-md-7">
								<div class="padding-30">
									<form role="form">
										<p>Name and Email Address</p>
										<div class="form-group-attached">
											<div class="row clearfix">
												<div class="col-sm-6">
													<div class="form-group form-group-default required">
														<label>First name</label>
														<input type="text" class="form-control" required>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group form-group-default">
														<label>Last name</label>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group form-group-default required">
												<label>Email</label>
												<input type="text" class="form-control" required>
											</div>
										</div>
										<br>
										<p>Billing Address</p>
										<div class="form-group-attached">
											<div class="form-group form-group-default required">
												<label>Address</label>
												<input type="text" class="form-control" placeholder="Current address" required>
											</div>
											<div class="row clearfix">
												<div class="col-sm-6">
													<div class="form-group form-group-default required form-group-default-selectFx">
														<label>Country</label>
														<select class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select">
															<option value="AF">Afghanistan</option>
															<option value="AX">Åland Islands</option>
															<option value="ZW">Zimbabwe</option>
														</select>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group form-group-default">
														<label>City</label>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="row clearfix">
												<div class="col-sm-9">
													<div class="form-group form-group-default required">
														<label>State/Province</label>
														<input type="text" class="form-control" placeholder="Outside US/Canada" required>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group form-group-default">
														<label>Zip code</label>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group form-group-default input-group">
                              <span class="input-group-addon">
                                            <select class="cs-select cs-skin-slide cs-transparent" data-init-plugin="cs-select">
                                            <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                                            <option data-countryCode="US" value="1">USA (+1)</option>
                                            <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                            <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                            <option data-countryCode="AO" value="244">Angola (+244)</option>
                                            <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>

                                        </select>
                                        </span>
												<label>Phone number</label>
												<input type="text" class="form-control" placeholder="For verification purpose">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="padding-20 bg-white">
						<ul class="pager wizard">
							<li class="next">
								<button class="btn btn-primary btn-cons btn-animated from-left fa fa-truck pull-right" type="button">
									<span>Next</span>
								</button>
							</li>
							<li class="previous">
								<button class="btn btn-default btn-cons pull-right" type="button">
									<span>Previous</span>
								</button>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- END CONTAINER FLUID -->
	</div>
	<!-- END PAGE CONTENT -->

@endsection