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
						<a data-toggle="tab" href="#tab1"><i class="fa fa-star tab-icon"></i> <span>Balance Score Card</span></a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#tab2"><i class="fa fa-star tab-icon"></i> <span>Behavioural Assessment</span></a>
					</li>
				</ul>
				<!-- Tab panes -->

				<form action="{{ route('appraisal.store') }}" method="post" enctype="multipart/form-data">

					@csrf

					<div class="tab-content">

						<div class="tab-pane padding-20 active slide-left" id="tab1">
							<div class="row row-same-height">
								<div class="col-md-12">

									{{-- Employer Details --}}
									<div class="form-group-attached">
										<div class="row clearfix">
											<div class="col-sm-4">
												<div class="form-group form-group-default required">
													<label>Employee Name</label>
													<input type="text" class="form-control" name="employee_name" value="{{ auth()->user()->last_name . ' ' .auth()->user()->first_name }}">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group form-group-default required">
													<label>Job Position</label>
													<input type="text" class="form-control" name="job_position">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group form-group-default required">
													<label>Department</label>
													<input type="text" class="form-control" name="department">
												</div>
											</div>
										</div>

										@if(auth()->user()->staff->SupervisorFlag)
											<div class="row clearfix">
												<div class="col-sm-4">
													<div class="form-group form-group-default required">
														<label>Appraiser's Designation</label>
														<input type="text" class="form-control" name="appraiser_designation">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group form-group-default required">
														<label>Appraiser's Name</label>
														<input type="text" class="form-control" name="appraiser_name">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group form-group-default required">
														<label>Appraiser's Period</label>
														<input type="text" class="form-control" name="appraiser_period">
													</div>
												</div>
											</div>
										@endif

									</div>
									<br>

									{{-- Financial --}}
									<div class="row clearfix">
										<div class="col-md-12">
											<h4>Financial</h4>
											<table class="table">
												<thead>
												<tr>
													<th scope="col" class="text-center text-white bg-primary">Objectives</th>
													<th scope="col" class="text-center text-white bg-primary">KPIs</th>
													<th scope="col" class="text-center text-white bg-primary">Target</th>
													<th scope="col" class="text-center text-white bg-primary">Weight</th>
													<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>
													@if(auth()->user()->staff->SupervisorFlag)
														<th scope="col" class="text-center text-white bg-primary">Supervisor's Assessment</th>
														<th scope="col" class="text-center text-white bg-primary">Justification</th>
													@endif
													<th scope="col" class="text-center text-white bg-info">
														<a style="color: Mediumslateblue;font-size: 30px;" title="Add More Field" id="addFinancialRow">
															<i class="fa fa-plus-circle"></i>
														</a>
													</th>
												</tr>
												</thead>
												<tbody id="financial_dynamic_field">

												<tr>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="financial_objective[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="financial_kpi[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="financial_target[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="financial_weight[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="financial_self_ass[]">
														</div>
													</td>
													@if(auth()->user()->staff->SupervisorFlag)
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="financial_supervisor_ass[]">
															</div>
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="financial_justification[]">
															</div>
														</td>
													@endif
												</tr>

												</tbody>
											</table>
										</div>
									</div>
									<br>

									{{-- Stakeholders --}}
									<div class="row clearfix">
										<div class="col-md-12">
											<h4>Customer/Stakeholders</h4>
											<table class="table">
												<thead>
												<tr>
													<th scope="col" class="text-center text-white bg-primary">Objectives</th>
													<th scope="col" class="text-center text-white bg-primary">KPIs</th>
													<th scope="col" class="text-center text-white bg-primary">Target</th>
													<th scope="col" class="text-center text-white bg-primary">Weight</th>
													<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>
													@if(auth()->user()->staff->SupervisorFlag)
														<th scope="col" class="text-center text-white bg-primary">Supervisor's Assessment</th>
														<th scope="col" class="text-center text-white bg-primary">Justification</th>
													@endif
													<th scope="col" class="text-center text-white bg-info">
														<a style="color: Mediumslateblue;font-size: 30px;" title="Add More Field" id="addStakeholderRow">
															<i class="fa fa-plus-circle"></i>
														</a>
													</th>
												</tr>
												</thead>
												<tbody id="stakeholder_dynamic_field">
												<tr>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="stakeholders_objective[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="stakeholders_kpi[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="stakeholders_target[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="stakeholders_weight[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="stakeholders_self_ass[]">
														</div>
													</td>
													@if(auth()->user()->staff->SupervisorFlag)
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="stakeholders_supervisor_ass[]">
															</div>
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="stakeholders_justification[]">
															</div>
														</td>
													@endif
												</tr>
												</tbody>
											</table>
										</div>
									</div>
									<br>

									{{-- Internal Process --}}
									<div class="row clearfix">
										<div class="col-md-12">
											<h4>Internal Process</h4>
											<table class="table">
												<thead>
												<tr>
													<th scope="col" class="text-center text-white bg-primary">Objectives</th>
													<th scope="col" class="text-center text-white bg-primary">KPIs</th>
													<th scope="col" class="text-center text-white bg-primary">Target</th>
													<th scope="col" class="text-center text-white bg-primary">Weight</th>
													<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>
													@if(auth()->user()->staff->SupervisorFlag)
														<th scope="col" class="text-center text-white bg-primary">Supervisor's Assessment</th>
														<th scope="col" class="text-center text-white bg-primary">Justification</th>
													@endif
													<th scope="col" class="text-center text-white bg-info">
														<a style="color: Mediumslateblue;font-size: 30px;" title="Add More Field" id="addInternalRow">
															<i class="fa fa-plus-circle"></i>
														</a>
													</th>
												</tr>
												</thead>
												<tbody id="internal_dynamic_field">
												<tr>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="internal_process_objective[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="internal_process_kpi[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="internal_process_target[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="internal_process_weight[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="internal_process_self_ass[]">
														</div>
													</td>
													@if(auth()->user()->staff->SupervisorFlag)
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="internal_process_supervisor_ass[]">
															</div>
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="internal_process_justification[]">
															</div>
														</td>
													@endif
												</tr>
												</tbody>
											</table>
										</div>
									</div>
									<br>

									{{-- People/Learning --}}
									<div class="row clearfix">
										<div class="col-md-12">
											<h4>People/Learning</h4>
											<table class="table">
												<thead>
												<tr>
													<th scope="col" class="text-center text-white bg-primary">Objectives</th>
													<th scope="col" class="text-center text-white bg-primary">KPIs</th>
													<th scope="col" class="text-center text-white bg-primary">Target</th>
													<th scope="col" class="text-center text-white bg-primary">Weight</th>
													<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>
													@if(auth()->user()->staff->SupervisorFlag)
														<th scope="col" class="text-center text-white bg-primary">Supervisor's Assessment</th>
														<th scope="col" class="text-center text-white bg-primary">Justification</th>
													@endif
													<th scope="col" class="text-center text-white bg-info">
														<a style="color: Mediumslateblue;font-size: 30px;" title="Add More Field" id="addLearningRow">
															<i class="fa fa-plus-circle"></i>
														</a>
													</th>
												</tr>
												</thead>
												<tbody id="learning_dynamic_field">
												<tr>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="learning_objective[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="learning_kpi[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="learning_target[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="learning_weight[]">
														</div>
													</td>
													<td>
														<div class="form-group form-group-default">
															<input type="text" class="form-control" name="learning_self_ass[]">
														</div>
													</td>
													@if(auth()->user()->staff->SupervisorFlag)
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name=learning_supervisor_ass[]">
															</div>
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="learning_justification[]">
															</div>
														</td>
													@endif
												</tr>
												</tbody>
											</table>
										</div>
									</div>
									<br>

									{{-- Comment --}}
									<div class="form-group-attached">
										<div class="form-group form-group-default required">
											<label>Appraisee's Comment</label>
											<input type="text" class="form-control" name="appraisee_comment">
										</div>
										@if(auth()->user()->staff->SupervisorFlag)
											<div class="form-group form-group-default required">
												<label>Appraiser's Comment</label>
												<input type="text" class="form-control" name="appraiser_comment">
											</div>
										@endif
									</div>
									<br>

									{{-- Recommendation --}}
									@if(auth()->user()->staff->SupervisorFlag)
										<div class="form-group-attached">
											<h4>Recommendation</h4>
											<div class="row clearfix">
												<div class="col-sm-6">
													<div class="form-group form-group-default required">
														<label>Promote</label>
														<input type="text" class="form-control" name="recommendation_promote">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group form-group-default required">
														<label>Commendation</label>
														<input type="text" class="form-control" name="recommendation_commendation">
													</div>
												</div>
											</div>
											<div class="row clearfix">
												<div class="col-sm-6">
													<div class="form-group form-group-default required">
														<label>Performance Improvement  (Mentoring & Coaching)</label>
														<input type="text" class="form-control" name="recommendation_performance">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group form-group-default required">
														<label>Exit</label>
														<input type="text" class="form-control" name="recommendation_exit">
													</div>
												</div>
											</div>
										</div>
										<br>
									@endif

									@if(auth()->user()->staff->SupervisorFlag)
										{{-- Training Need --}}
										<div class="form-group-attached">
											<div class="form-group form-group-default required">
												<label>Training Need</label>
												<input type="text" class="form-control" name="training_need">
											</div>
										</div>
										<br>
									@endif

									{{-- Signature --}}
									<div class="form-group-attached">
										<div class="row clearfix">
											<div class="col-sm-3">
												<div class="form-group form-group-default required">
													<label>Appraisee Sign</label>
													<input type="file" class="form-control" name="appraisee_sign">
												</div>
											</div>
											@if(auth()->user()->staff->SupervisorFlag)
												<div class="col-sm-3">
													<div class="form-group form-group-default required">
														<label>Appraiser Sign</label>
														<input type="file" class="form-control" name="appraiser_sign">
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group form-group-default required">
														<label>Executive Director Sign</label>
														<input type="file" class="form-control" name="executive_sign">
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group form-group-default required">
														<label>HR Sign</label>
														<input type="file" class="form-control" name="hr_sign">
													</div>
												</div>
											@endif
										</div>
									</div>
									<br>

								</div>
							</div>
						</div>

						<div class="tab-pane slide-left padding-20" id="tab2">
							<div class="row row-same-height">
								<div class="col-md-12">
									<div class="padding-30">

										<div class="row clearfix">
											<div class="col-md-12">
												<h4>Behavioural Appraisal</h4>
												<table class="table">
													<thead>
													<tr>
														<th scope="col" class="text-center text-white bg-primary">Personal Attribute</th>
														<th scope="col" class="text-center text-white bg-primary">Weight</th>
														<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>
														@if(auth()->user()->staff->SupervisorFlag)
															<th scope="col" class="text-center text-white bg-primary">Supervisor's Assessment</th>
														@endif
													</tr>
													</thead>
													<tbody>
													<tr>
														<td>
															Team Work
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="team_work_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="team_work_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Responsibility
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="responsibility_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="responsibility_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Integrity
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="integrity_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="integrity_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Innovation
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="innovation_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="innovation_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Passion
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="passion_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="passion_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													</tbody>
												</table>
											</div>
										</div>
										<br>

										<div class="row clearfix">
											<div class="col-md-12">
												<table class="table">
													<thead>
													<tr>
														<th scope="col" class="text-center text-white bg-primary">Job Competency</th>
														<th scope="col" class="text-center text-white bg-primary">Weight</th>
														<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>
														@if(auth()->user()->staff->SupervisorFlag)
															<th scope="col" class="text-center text-white bg-primary">Supervisor's Assessment</th>
														@endif
													</tr>
													</thead>
													<tbody>
													<tr>
														<td>
															Self starter
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="self_starter_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="self_starter_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Problem Solving
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="problem_solving_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="problem_solving_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Analytical Skill
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="analytical_skill_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="analytical_skill_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Technical Skill
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="technical_skill_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="technical_skill_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Leadership
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="leadership_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="leadership_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													</tbody>
												</table>
											</div>
										</div>
										<br>

										<div class="row clearfix">
											<div class="col-md-12">
												<table class="table">
													<thead>
													<tr>
														<th scope="col" class="text-center text-white bg-primary">Adherence & Compliance</th>
														<th scope="col" class="text-center text-white bg-primary">Weight</th>
														<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>
														@if(auth()->user()->staff->SupervisorFlag)
															<th scope="col" class="text-center text-white bg-primary">Supervisor's Assessment</th>
														@endif
													</tr>
													</thead>
													<tbody>
													<tr>
														<td>
															Efficient TAT/Time management
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="time_management_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="time_management_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Punctuality
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="punctuality_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="punctuality_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Policy & procedure compliance
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="policy_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="policy_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Process Management
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="process_mgt_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="process_mgt_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													<tr>
														<td>
															Ethics and Values adherance
														</td>
														<td>
															20
														</td>
														<td>
															<div class="form-group form-group-default">
																<input type="text" class="form-control" name="ethics_self_ass">
															</div>
														</td>
														@if(auth()->user()->staff->SupervisorFlag)
															<td>
																<div class="form-group form-group-default">
																	<input type="text" class="form-control" name="ethics_supervisor_ass">
																</div>
															</td>
														@endif
													</tr>
													</tbody>
												</table>
											</div>
										</div>
										<br>

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

						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-primary btn-cons btn-animated" type="submit">
									<span>Submit</span>
								</button>
							</div>
						</div>

					</div>

				</form>

			</div>
		</div>
		<!-- END CONTAINER FLUID -->
	</div>
	<!-- END PAGE CONTENT -->

@endsection

@push('scripts')

	@if(count($errors) > 0)
		<script>
			@foreach($errors->all() as $error)

            toastr.error("{{ $error }}");

			@endforeach
		</script>
	@endif

	@if(auth()->user()->staff->SupervisorFlag)

		<script type="text/javascript">

            $(document).ready(function () {

                var i = 1;
                var j = 1;
                var k = 1;
                var l = 1;

                $('#addFinancialRow').click(function (e) {

                    e.preventDefault();

                    i++;

                    $('#financial_dynamic_field').append('<tr id="financial_row'+i+'">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_objective">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_kpi">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_target">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_weight">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_self_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_supervisor_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_justification">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t<button name="remove" id="'+i+'" style="color: red;font-size: 20px;" class="financial_btn_remove">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-minus-circle"></i>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t</button>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>');

                });

                $(document).on('click', '.financial_btn_remove', function (e) {

                    e.preventDefault();

                    var button_id = $(this).attr("id");

                    $("#financial_row"+button_id+"").remove();

                });

                $('#addStakeholderRow').click(function (e) {

                    e.preventDefault();

                    j++;

                    $('#stakeholder_dynamic_field').append('<tr id="stakeholder_row'+j+'">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_objective">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_kpi">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_target">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_weight">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_self_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_supervisor_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_justification">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t<button name="remove" id="'+j+'" style="color: red;font-size: 20px;" class="stakeholder_btn_remove">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-minus-circle"></i>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t</button>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>');

                });

                $(document).on('click', '.stakeholder_btn_remove', function (e) {

                    e.preventDefault();

                    var button_id = $(this).attr("id");

                    $("#stakeholder_row"+button_id+"").remove();

                });

                $('#addInternalRow').click(function (e) {

                    e.preventDefault();

                    k++;

                    $('#internal_dynamic_field').append('<tr id="internal_row'+k+'">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_objective">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_kpi">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_target">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_weight">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_self_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_supervisor_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_justification">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t<button name="remove" id="'+k+'" style="color: red;font-size: 20px;" class="internal_btn_remove">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-minus-circle"></i>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t</button>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>');

                });

                $(document).on('click', '.internal_btn_remove', function (e) {

                    e.preventDefault();

                    var button_id = $(this).attr("id");

                    $("#internal_row"+button_id+"").remove();

                });

                $('#addLearningRow').click(function (e) {

                    e.preventDefault();

                    l++;

                    $('#learning_dynamic_field').append('<tr id="learning_row'+l+'">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_objective">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_kpi">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_target">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_weight">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_self_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_supervisor_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_justification">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t<button name="remove" id="'+l+'" style="color: red;font-size: 20px;" class="learning_btn_remove">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-minus-circle"></i>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t</button>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>');

                });

                $(document).on('click', '.learning_btn_remove', function (e) {

                    e.preventDefault();

                    var button_id = $(this).attr("id");

                    $("#learning_row"+button_id+"").remove();

                });

            });

		</script>

	@endif

	@if(!auth()->user()->staff->SupervisorFlag)

		<script type="text/javascript">

            $(document).ready(function () {

                var i = 1;
                var j = 1;
                var k = 1;
                var l = 1;

                $('#addFinancialRow').click(function (e) {

                    e.preventDefault();

                    i++;

                    $('#financial_dynamic_field').append('<tr id="financial_row'+i+'">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_objective">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_kpi">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_target">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_weight">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_self_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t<button name="remove" id="'+i+'" style="color: red;font-size: 20px;" class="financial_btn_remove">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-minus-circle"></i>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t</button>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>');

                });

                $(document).on('click', '.financial_btn_remove', function (e) {

                    e.preventDefault();

                    var button_id = $(this).attr("id");

                    $("#financial_row"+button_id+"").remove();

                });

                $('#addStakeholderRow').click(function (e) {

                    e.preventDefault();

                    j++;

                    $('#stakeholder_dynamic_field').append('<tr id="stakeholder_row'+j+'">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_objective">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_kpi">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_target">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_weight">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_self_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t<button name="remove" id="'+j+'" style="color: red;font-size: 20px;" class="stakeholder_btn_remove">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-minus-circle"></i>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t</button>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>');

                });

                $(document).on('click', '.stakeholder_btn_remove', function (e) {

                    e.preventDefault();

                    var button_id = $(this).attr("id");

                    $("#stakeholder_row"+button_id+"").remove();

                });

                $('#addInternalRow').click(function (e) {

                    e.preventDefault();

                    k++;

                    $('#internal_dynamic_field').append('<tr id="internal_row'+k+'">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_objective">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_kpi">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_target">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_weight">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_self_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t<button name="remove" id="'+k+'" style="color: red;font-size: 20px;" class="internal_btn_remove">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-minus-circle"></i>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t</button>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>');

                });

                $(document).on('click', '.internal_btn_remove', function (e) {

                    e.preventDefault();

                    var button_id = $(this).attr("id");

                    $("#internal_row"+button_id+"").remove();

                });

                $('#addLearningRow').click(function (e) {

                    e.preventDefault();

                    l++;

                    $('#learning_dynamic_field').append('<tr id="learning_row'+l+'">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_objective">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_kpi">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_target">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_weight">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class="form-group form-group-default">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type="text" class="form-control" name="financial_self_ass">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t<button name="remove" id="'+l+'" style="color: red;font-size: 20px;" class="learning_btn_remove">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class="fa fa-minus-circle"></i>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t</button>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>');

                });

                $(document).on('click', '.learning_btn_remove', function (e) {

                    e.preventDefault();

                    var button_id = $(this).attr("id");

                    $("#learning_row"+button_id+"").remove();

                });

            });

		</script>

	@endif

@endpush