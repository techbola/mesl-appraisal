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
					<div class="panel-title">Staffs
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">

					@if(count($staffs) > 0)

						<div class="table-responsive">
							<table class="table table-hover" id="basicTable">
								<thead>
								<tr>
									<th style="width:40%">Staff</th>
									<th style="width:20%">Date Submitted</th>
									<th style="width:40%">Action</th>
								</tr>
								</thead>
								<tbody>

									@foreach($staffs as $staff)

										<tr>
											<td class="v-align-middle ">
												<p>First Tour</p>
											</td>
											<td class="v-align-middle">
												<p>United States, India, China,Africa</p>
											</td>
											<td class="v-align-middle">
												<p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
											</td>
										</tr>

									@endforeach
								@else
									<tr>
										<td>No Staff!</td>
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