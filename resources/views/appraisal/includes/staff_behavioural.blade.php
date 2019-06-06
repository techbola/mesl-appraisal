<div class="tab-pane slide-left padding-20" id="tab7">
	<div class="row row-same-height">
		<div class="col-md-12">
			<div class="padding-30">

			<form action="{{ route('staff_behavioural.store') }}" method="post" enctype="multipart/form-data">
				@csrf
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

				<div class="form-group-attached">
					<div class="row clearfix">
						<div class="col-md-12">
							<button class="btn btn-primary btn-cons btn-animated" type="submit">
								<span>Final Submit</span>
							</button>
						</div>
					</div>
				</div>

			</form>

			</div>
		</div>
	</div>
</div>