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
			<!-- START PANEL -->
			<div class="panel panel-transparent">
				<div class="panel-heading">
					<div class="panel-title">All Staff Appraisals for {{ $period }}
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">

					<form role="form" action="{{ route('hrAllStaffAppraisals') }}" method="post">
						@csrf
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Appraisal Period</label>
									<select name="appraiser_period" id="appraiser_period" class="full-width" style="height: 50px;">
										<option value="2018/2019">2018/2019</option>
										<option value="2019/2020">2019/2020</option>
										<option value="2020/2021">2020/2021</option>
										<option value="2021/2022">2021/2022</option>
										<option value="2022/2023">2022/2023</option>
										<option value="2023/2024">2023/2024</option>
										<option value="2024/2025">2024/2025</option>
										<option value="2025/2026">2025/2026</option>
										<option value="2026/2027">2026/2027</option>
										<option value="2027/2028">2027/2028</option>
										<option value="2028/2029">2028/2029</option>
										<option value="2029/2030">2029/2030</option>
									</select>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<button class="btn btn-primary" type="submit">Submit</button>
					</form>

					@if(count($appraisals) > 0)

						<div class="table-responsive" style="margin-top: 30px;">
							<table class="table table-hover" id="basicTable">
								<thead>
								<tr>
									<th style="width:15%">Staff</th>
									<th style="width:15%">Supervisor</th>
									<th style="width:15%">GradeLevel</th>
									<th style="width:5%">BSC</th>
									<th style="width:10%">Behavioural</th>
									<th style="width:5%">Total</th>
									<th style="width:15%">Department</th>
									<th style="width:15%">Location</th>
								</tr>
								</thead>
								<tbody>

								@foreach($appraisals as $appraisal)

									<tr>
										<td class="v-align-middle ">
											<p>{{ $appraisal->staff->user->getFullNameAttribute() }}</p>
										</td>
										<td class="v-align-middle ">
											<p>{{ $appraisal->staff->supervisor->getFullNameAttribute() }}</p>
										</td>
										<td class="v-align-middle ">
											<p>{{ 'test' }}</p>
										</td>
										<td class="v-align-middle">
											<p>{{ 'test' }}</p>
										</td>
										<td class="v-align-middle">
											<p>{{ 'test' }}</p>
										</td>
										<td class="v-align-middle ">
											<p>{{ 'test' }}</p>
										</td>
										<td class="v-align-middle">
											<p>{{ 'test' }}</p>
										</td>
										<td class="v-align-middle">
											<p>{{ 'test' }}</p>
										</td>
									</tr>

								@endforeach
								@else
									<tr>
										<td>No Appraisal has been approved yet!</td>
									</tr>

								</tbody>
							</table>
						</div>

					@endif

				</div>
			</div>
			<!-- END PANEL -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->

@endsection

@push('scripts')

	<script src="{{ asset('main/assets/js/tables.js') }}" type="text/javascript"></script>
	<script src="{{ asset('main/assets/js/scripts.js') }}" type="text/javascript"></script>

@endpush