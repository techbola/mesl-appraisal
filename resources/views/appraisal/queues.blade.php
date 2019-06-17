@extends('layouts.main.master')

@section('content')

	<div class="panel panel-transparent" style="margin-top: 50px;">
		<div class="panel-heading">
			<div class="panel-title">All Appraisals</div>
			<div class="clearfix"></div>
		</div>

		@if($appraisals->count() > 0)

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover" id="basicTable">
						<thead>
						<tr>
							<th style="width:1%">
								<button class="btn"><i class="pg-trash"></i>
								</button>
							</th>
							<th style="width:40%">Period</th>
							<th style="width:29%">Action</th>
							<th style="width:30%">Status</th>
						</tr>
						</thead>
						<tbody>

							@foreach($appraisals as $appraisal)

								<tr>
									<td class="v-align-middle">
										<div class="checkbox ">
											<input type="checkbox" value="3" id="checkbox1">
											<label for="checkbox1"></label>
										</div>
									</td>
									<td class="v-align-middle ">
										<p>{{ $appraisal->period }}</p>
									</td>
									<td class="v-align-middle">

										@if($appraisal->sentFlag && $appraisal->status == 1)
											<a href="#" class="btn btn-info btn-sm" disabled="">Appraisal Submitted</a>
										@elseif($appraisal->sentFlag && $appraisal->status == 2)
											<a href="{{ route('viewGoals', ['id' => $appraisal->id]) }}" class="btn btn-info btn-sm">View Goals</a>
										@else
											<a href="{{ route('submitAppraisalHR', ['id' => $appraisal->id]) }}" class="btn btn-info btn-sm">Submit To HR</a>
											|
											<a href="{{ route('editAppraisal', ['id' => $appraisal->id]) }}" class="btn btn-primary btn-sm">Edit</a>
											|
											<a href="{{ route('deleteAppraisal', ['id' => $appraisal->id]) }}" class="btn btn-danger btn-sm">Delete</a>
										@endif

									</td>
									<td class="v-align-middle">
										@if($appraisal->status == 0)
											<p>Not Submitted.</p>
										@elseif($appraisal->status == 1)
											<p>Submitted, awaiting supervisor's feedback.</p>
										@elseif($appraisal->status == 2)
											<p>Approved</p>
										@elseif($appraisal->status == 3)
											<p>
												<strong>Rejected,</strong>
												<button type="button" class="btn btn-primary commentDialog"
														data-comment="{{ $appraisal->supervisorComment }}"
														data-toggle="modal"
														data-target="#supervisorCommentModal">
													View Comment/Reason
												</button>
											</p>
										@endif
									</td>
								</tr>

							@endforeach

						</tbody>
					</table>
				</div>
			</div>

			@else

				<h4 style="padding: 30px;">No appraisal yet!</h4>

		@endif

	</div>

	<div class="modal fade" id="supervisorCommentModal" tabindex="-1" role="dialog" aria-labelledby="supervisorCommentModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="supervisorCommentModalLabel">Comment/Reason</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="supervisorComment">Comment</label>
							<input class="form-control" name="supervisorComment" id="supervisorComment">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('scripts')

	@if(Session::has('success'))
		<script>
            toastr.success("{{ Session::get('success') }}")
		</script>
	@endif

	@if(Session::has('errorFlag'))
		<script>
            toastr.error("{{ Session::get('errorFlag') }}")
		</script>
	@endif

	@if(count($errors) > 0)
		<script>
			@foreach($errors->all() as $error)

            toastr.error("{{ $error }}");

			@endforeach
		</script>
	@endif

	<script>

        $(document).on("click", ".commentDialog", function () {

            let supervisorComment = $(this).data('comment');

            // console.log(supervisorComment)

            $("#supervisorComment").val( supervisorComment );

        });

	</script>

@endpush