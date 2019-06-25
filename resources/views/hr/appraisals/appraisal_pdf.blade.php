@extends('layouts.main.master')

@push('styles')

	<link href="{{ asset('main/assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('main/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('main/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />

@endpush

@section('content')

	<!-- START PAGE CONTENT -->
	<div class="content ">
		<!-- START CONTAINER FLUID -->
		<div class="container-fluid container-fixed-lg bg-white">

			<div class="panel panel-transparent">
				<div class="panel-heading">
					<div class="panel-title">

					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">

					<div class="table-responsive" style="margin-top: 30px;margin-bottom: 30px;">
						<table class="table table-hover" id="basicTable">
							<thead>
							<tr>
								<th style="width:15%">Staff</th>
								<th style="width:10%">Picture</th>
								<th style="width:15%">Supervisor</th>
								<th style="width:10%">Grade <br> Level</th>
								<th style="width:5%">Staff <br> BSC Total</th>
								<th style="width:5%">Staff <br> Atittudinal Total</th>
								<th style="width:5%">Staff <br> Overall Total</th>
								<th style="width:5%">Supervisor <br> BSC Total</th>
								<th style="width:5%">Supervisor <br> Atittudinal Total</th>
								<th style="width:5%">Supervisor <br> Overall Total</th>
								<th style="width:10%">Department</th>
								<th style="width:10%">Location</th>
							</tr>
							</thead>
							<tbody>

							@foreach($appraisals as $appraisal)

								<tr>
									<td>
										<p>{{ $appraisal->staff->user->getFullNameAttribute() }}</p>
									</td>
									<td>
										<p>{{ 'Profile Picture' }}</p>
									</td>
									<td >
										<p>{{ $appraisal->staff->supervisor->getFullNameAttribute() }}</p>
									</td>
									<td>
										<p>{{ $appraisal->staff->user->level->name }}</p>
									</td>
									<td>
										<p>{{ $appraisal->bscStaffScore }}</p>
									</td>
									<td>
										<p>{{ $appraisal->staffBehavioural }}</p>
									</td>
									<td>
										<p>{{ $appraisal->overallStaffScore }}</p>
									</td>
									<td>
										<p>{{ $appraisal->bscSupervisorScore }}</p>
									</td>
									<td>
										<p>{{ $appraisal->supervisorBehavioural }}</p>
									</td>
									<td>
										<p>{{ $appraisal->overallSupervisorScore }}</p>
									</td>
									<td>
										<p>{{ 'Department' }}</p>
									</td>
									<td>
										<p>{{ 'Location' }}</p>
									</td>
								</tr>

							@endforeach

							</tbody>
						</table>
					</div>

				</div>

			</div>

		</div>
	</div>
	<!-- END PAGE CONTENT -->

@endsection

@push('scripts')

	<script src="{{ asset('main/assets/js/tables.js') }}" type="text/javascript"></script>
	<script src="{{ asset('main/assets/js/scripts.js') }}" type="text/javascript"></script>

@endpush