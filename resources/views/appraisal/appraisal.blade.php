<div class="tab-pane padding-20 active slide-left" id="tab2">
	<div class="row row-same-height">
		<div class="col-md-12">

			{{-- Employer Details --}}
			<div class="form-group-attached">
				<div class="row clearfix">
					<div class="col-sm-6">
						<div class="form-group form-group-default required">
							<label>Employee Name</label>
							<input type="text" class="form-control" name="employee_name" value="{{ auth()->user()->last_name . ' ' .auth()->user()->first_name }}">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group form-group-default required">
							<label>Job Position</label>
							<input type="text" class="form-control" name="job_position">
						</div>
					</div>
				</div>

				<div class="row clearfix">
					<div class="col-sm-6">
						<div class="form-group form-group-default required">
							<label>Department</label>
							<input type="text" class="form-control" name="department">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group form-group-default required">
							<label>Appraiser's Period</label>
							<input type="text" class="form-control" name="appraiser_period">
						</div>
					</div>
				</div>

				@if(auth()->user()->staff->SupervisorFlag)
					<div class="row clearfix">
						<div class="col-sm-6">
							<div class="form-group form-group-default required">
								<label>Appraiser's Designation</label>
								<input type="text" class="form-control" name="appraiser_designation">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group form-group-default required">
								<label>Appraiser's Name</label>
								<input type="text" class="form-control" name="appraiser_name">
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