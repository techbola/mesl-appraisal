@extends('layouts.main.master')

@section('content')

	<!-- START PAGE CONTENT -->
	<div class="content ">
		<!-- START CONTAINER FLUID -->
		<div class="container-fluid container-fixed-lg">

			<div id="rootwizard" class="m-t-50">
				<!-- Nav tabs -->
			@include('supervisor.includes.appraisal_nav')
			<!-- Tab panes -->

				<div class="tab-content">

					@include('supervisor.includes.bsc_financial')
{{--					@include('supervisor.includes.bsc_customer')--}}
{{--					@include('supervisor.includes.bsc_internal')--}}
{{--					@include('supervisor.includes.bsc_learning')--}}
{{--					@include('supervisor.includes.staff_behavioural')--}}
{{--					@include('supervisor.includes.others')--}}

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
		</div>
		<!-- END CONTAINER FLUID -->
	</div>
	<!-- END PAGE CONTENT -->

	@include('supervisor.includes.edit_appraisal_modals')

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

	@if(auth()->user()->staff->SupervisorFlag)

		<script type="text/javascript" src="{{ asset('main/js/staff_add_row.js') }}"></script>

	@endif

	@if(!auth()->user()->staff->SupervisorFlag)

		<script type="text/javascript" src="{{ asset('main/js/staff_add_row.js') }}"></script>

	@endif

	<script type="text/javascript" src="{{ asset('main/js/delete_checkbox_ids.js') }}"></script>

	<script type="text/javascript" src="{{ asset('main/js/pass_appraisalid_to_modal.js') }}"></script>

@endpush