<div class="tab-pane padding-20 slide-left" id="tab5">
	<div class="row row-same-height">
		<div class="col-md-12">

			<form action="{{ route('bsc_learning.store') }}" method="post" enctype="multipart/form-data">
				@csrf
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
								<th scope="col" class="text-center text-white bg-primary">Constraint</th>
								<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>
								@if(auth()->user()->staff->SupervisorFlag)
								<th scope="col" class="text-center text-white bg-primary">Weight</th>
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
										<input type="text" class="form-control" name="learning_constraint[]">
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
											<input type="text" class="form-control" name="learning_weight[]">
										</div>
									</td>
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

				<div class="form-group-attached">
					<div class="row clearfix">
						<div class="col-md-12">
							<button class="btn btn-primary btn-cons btn-animated" type="submit">
								<span>Submit & Click Next</span>
							</button>
						</div>
					</div>
				</div>

			</form>

		</div>
	</div>
</div>