<div class="tab-pane padding-20 slide-left" id="tab4">
	<div class="row row-same-height">

		@if($appraisal_internals->count() > 0)

			<div class="col-md-12" style="margin-top: 20px;">
				<div class="panel panel-transparent">
					<div class="panel-heading">
						<div class="panel-title">Internal Process</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover" id="basicTable">
								<thead>
								<tr>
									@if($ap->status == 4 || $ap->status == 2 || $ap->status == 6)
										<th style="width:20%">Objectives</th>
										<th style="width:15%">KPIs</th>
										<th style="width:15%">Targets</th>
										<th style="width:20%">Constraints</th>
										<th style="width:15%;">Supervisor's Comment</th>
										<th style="width:15%;">HR's Comment</th>
									@elseif($ap->status != 4 && $ap->status != 2)
										<th style="width:20%">Objectives</th>
										<th style="width:20%">KPIs</th>
										<th style="width:15%">Targets</th>
										<th style="width:20%">Constraints</th>
										<th style="width:25%;">Comment</th>
									@endif
								</tr>
								</thead>
								<tbody>

									@if($ap->status == 4 || $ap->status == 2 || $ap->status == 6)
										@foreach($appraisal_internals as $appraisal_internal)
											<tr>
												<td class="v-align-middle ">
													<p>
														{{ $appraisal_internal->objective }}
													</p>
												</td>
												<td class="v-align-middle">
													<p>
														{{ $appraisal_internal->kpi }}
													</p>
												</td>
												<td class="v-align-middle">
													<p>
														{{ $appraisal_internal->target }}
													</p>
												</td>
												<td class="v-align-middle">
													<p>
														{{ $appraisal_internal->constraint }}
													</p>
												</td>
												<td class="v-align-middle">
													<p>
														{{ $appraisal_internal->justification ? $appraisal_internal->justification : '' }}
													</p>
												</td>
												<td class="v-align-middle">
													<p>
														{{ $appraisal_internal->hrComment ? $appraisal_internal->hrComment : '' }}
													</p>
												</td>
											</tr>
										@endforeach
									@elseif($ap->status != 4 && $ap->status != 2)
										@foreach($appraisal_internals as $appraisal_internal)
											<tr>
												<td class="v-align-middle ">
													<p>
														{{ $appraisal_internal->objective }}
													</p>
												</td>
												<td class="v-align-middle">
													<p>
														{{ $appraisal_internal->kpi }}
													</p>
												</td>
												<td class="v-align-middle">
													<p>
														{{ $appraisal_internal->target }}
													</p>
												</td>
												<td class="v-align-middle">
													<p>
														{{ $appraisal_internal->constraint }}
													</p>
												</td>
												<td class="v-align-middle">
													<div class="form-group form-group-default">
														<input type="text" class="form-control" name="internal_comment[]">
													</div>
												</td>
											</tr>
										@endforeach
									@endif

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		@endif

	</div>
</div>