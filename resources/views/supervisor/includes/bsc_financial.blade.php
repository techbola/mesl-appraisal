<div class="tab-pane active padding-20 slide-left" id="tab2">
	<div class="row row-same-height">

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
										<form action="{{ route('deleteFinanceAppraisals') }}" method="post">
											{{ csrf_field() }}
											<input type="hidden" name="appraisalIDs[]" id="appraisalIDs">
											<button type="submit" class="btn btn-danger">
												<i class="pg-trash"></i>
											</button>
										</form>
									</th>
									<th style="width:20%">Objectives</th>
									<th style="width:20%">KPIs</th>
									<th style="width:15%">Targets</th>
									<th style="width:20%">Constraints</th>
									<th style="width:19%">Self Assessment</th>
									<th style="width:5%">Action</th>
								</tr>
								</thead>
								<tbody>

									@foreach($appraisal_finances as $appraisal_finance)
										<tr>
											<td class="v-align-middle">
												<div class="checkbox ">
													<input type="checkbox"  id="financeAppraisal-{{ $appraisal_finance->id }}" value="{{ $appraisal_finance->id }}" onclick="displayMsg()">
													<label for="financeAppraisal-{{ $appraisal_finance->id }}"></label>
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
											<td class="v-align-middle">
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-primary editFinanceDialog"
														data-id="{{ $appraisal_finance->id }}"
														data-objective="{{ $appraisal_finance->objective }}"
														data-kpi="{{ $appraisal_finance->kpi }}"
														data-targets="{{ $appraisal_finance->target }}"
														data-constraint="{{ $appraisal_finance->constraint }}"
														data-assessment="{{ $appraisal_finance->selfAssessment }}"
														data-toggle="modal"
														data-target="#financeModal">
													Edit
												</button>
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