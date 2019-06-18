@extends('layouts.main.master')

@section('content')

	<!-- START PAGE CONTENT -->
	<div class="content ">
		<!-- START CONTAINER FLUID -->
		<div class="container-fluid container-fixed-lg">

			<h4><strong>{{ $staffName }}</strong></h4>

			<form action="{{ route('goalsApproval', ['appraisalID' => $appraisalID]) }}" method="post">
				@csrf

				<div id="rootwizard" class="m-t-50">
					<!-- Nav tabs -->
				@include('supervisor.includes.appraisal_nav')
				<!-- Tab panes -->

					<div class="tab-content">

						@include('supervisor.includes.bsc_financial')
						@include('supervisor.includes.bsc_customer')
						@include('supervisor.includes.bsc_internal')
						@include('supervisor.includes.bsc_learning')
						@include('supervisor.includes.staff_behavioural')
						@include('supervisor.includes.others')

						<div class="row row-same-height" style="margin-top: -50px;">
							<div class="col-md-12">
								<div class="panel panel-transparent">
									<div class="panel-body">
										<div class="form-group">
											{{--					<label for="comment">Comment</label>--}}
											{{--					<textarea class="form-control" name="comment" id="comment" rows="3"></textarea>--}}
											{{--					<br>--}}
											<button type="submit" class="btn btn-danger pull-left" name="action" value="reject">Reject & Send to Staff</button>
											<button type="submit" class="btn btn-primary pull-left" name="action" value="approve" style="margin-left: 30px;">Approve</button>

										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="padding-20">
							<ul class="pager wizard">
								<li class="next">
									<button class="btn btn-primary pull-right" type="button">
										<span>Next</span>
									</button>
								</li>
								<li class="previous">
									<button class="btn btn-default pull-right" type="button">
										<span>Previous</span>
									</button>
								</li>
							</ul>
						</div>

					</div>

				</div>


			</form>

		</div>
		<!-- END CONTAINER FLUID -->
	</div>
	<!-- END PAGE CONTENT -->

@endsection

@push('scripts')

	@if(Session::has('success'))
		<script>
            toastr.success("{{ Session::get('success') }}")
		</script>
	@endif

	@if(Session::has('error'))
		<script>
            toastr.error("{{ Session::get('error') }}")
		</script>
	@endif

	@if(count($errors) > 0)
		<script>
			@foreach($errors->all() as $error)

            toastr.error("{{ $error }}");

			@endforeach
		</script>
	@endif

@endpush