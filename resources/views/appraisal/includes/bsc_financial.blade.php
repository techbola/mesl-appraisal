<div class="tab-pane active padding-20 slide-left" id="tab2">
	<div class="row row-same-height">

		<div class="col-md-12">
			<form action="{{ route('bsc_financial.store') }}" method="post" enctype="multipart/form-data">
				@csrf
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
								<th scope="col" class="text-center text-white bg-primary">Constraints</th>
								<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>
								@if(auth()->user()->staff->SupervisorFlag)
								<th scope="col" class="text-center text-white bg-primary">Weight</th>
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
											<input type="text" class="form-control" name="financial_constraint[]">
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
												<input type="text" class="form-control" name="financial_weight[]">
											</div>
										</td>
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

				<div class="form-group-attached">
					<div class="row clearfix">
						<div class="col-md-12">
							<input type="hidden" name="appraisalID" value="{{ $appraisalID }}">
							<button class="btn btn-primary btn-cons btn-animated" type="submit">
								<span>Submit & Click Next</span>
							</button>
						</div>
					</div>
				</div>

			</form>
		</div>


		@if($appraisal_finances->count() > 0)

			<div class="col-md-12" style="margin-top: 20px;">
				<div class="panel panel-transparent">
					<div class="panel-heading">
						<div class="panel-title">Financial</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover" id="basicTable">
								<thead>
								<tr>
									<th style="width:1%">
										<button class="btn"><i class="pg-trash"></i>
										</button>
									</th>
									<th style="width:20%">Objectives</th>
									<th style="width:20%">KPIs</th>
									<th style="width:29%">Targets</th>
									<th style="width:15%">Constraints</th>
									<th style="width:15%">Self Assessment</th>
								</tr>
								</thead>
								<tbody>

									@foreach($appraisal_finances as $appraisal_finance)
										<tr>
											<td class="v-align-middle">
												<div class="checkbox ">
													<input type="checkbox" value="3" id="checkbox1">
													<label for="checkbox1"></label>
												</div>
											</td>
											<td class="v-align-middle ">
												<p>
													{{ $appraisal_finance->objective }}
												</p>
											</td>
											<td class="v-align-middle">
												<p>
													{{ $appraisal_finance->kpi }}
												</p>
											</td>
											<td class="v-align-middle">
												<p>
													{{ $appraisal_finance->target }}
												</p>
											</td>
											<td class="v-align-middle">
												<p>
													{{ $appraisal_finance->constraint }}
												</p>
											</td>
											<td class="v-align-middle">
												<p>
													{{ $appraisal_finance->selfAssessment }}
												</p>
											</td>
										</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		@endif

	</div>
</div>