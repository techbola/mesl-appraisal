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
									<th style="width:20%">Objectives</th>
									<th style="width:15%">KPIs</th>
									<th style="width:15%">Targets</th>
									<th style="width:5%">Self <br> Assessment</th>
									<th style="width:20%">Staff <br> Comment</th>
									<th style="width:5%">Supervisor <br> Assessment</th>
									<th style="width:20%">Supervisor <br> Comment</th>
								</tr>
								</thead>
								<tbody>

									@foreach($appraisal_finances as $appraisal_finance)
										<tr>
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
													{{ $appraisal_finance->selfAssessment }}
												</p>
											</td>
											<td class="v-align-middle">
												<p>
													{{ $appraisal_finance->staffAppraisalComment }}
												</p>
											</td>
											<td class="v-align-middle">
												<p>
													{{ $appraisal_finance->supervisorAssessment }}
												</p>
											</td>
											<td class="v-align-middle">
												<p>
													{{ $appraisal_finance->supervisorAppraisalComment }}
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