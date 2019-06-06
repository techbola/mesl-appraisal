<div class="tab-pane padding-20 slide-left" id="tab6">
	<div class="row row-same-height">
		<div class="col-md-12">

			<form action="{{ route('other_appraisal.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				{{-- Comment --}}
				<div class="form-group-attached">
					<div class="form-group form-group-default required">
						<label>Appraisee's Comment</label>
						<input type="text" class="form-control" name="appraisee_comment">
					</div>
					@if(auth()->user()->staff->SupervisorFlag)
						<div class="form-group form-group-default required">
							<label>Appraiser's Comment</label>
							<input type="text" class="form-control" name="appraiser_comment">
						</div>
					@endif
				</div>
				<br>

				{{-- Recommendation --}}
				@if(auth()->user()->staff->SupervisorFlag)
				<div class="form-group-attached">
					<h4>Recommendation</h4>
					<div class="row clearfix">
						<div class="col-sm-6">
							<div class="form-group form-group-default required">
								<label>Promote</label>
								<input type="text" class="form-control" name="recommendation_promote">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group form-group-default required">
								<label>Commendation</label>
								<input type="text" class="form-control" name="recommendation_commendation">
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<div class="form-group form-group-default required">
								<label>Performance Improvement  (Mentoring & Coaching)</label>
								<input type="text" class="form-control" name="recommendation_performance">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group form-group-default required">
								<label>Exit</label>
								<input type="text" class="form-control" name="recommendation_exit">
							</div>
						</div>
					</div>
				</div>
				<br>
				@endif

				@if(auth()->user()->staff->SupervisorFlag)
				{{-- Training Need --}}
				<div class="form-group-attached">
					<div class="form-group form-group-default required">
						<label>Training Need</label>
						<input type="text" class="form-control" name="training_need">
					</div>
				</div>
				<br>
				@endif

				{{-- Signature --}}
				<div class="form-group-attached">
					<div class="row clearfix">
						<div class="col-sm-3">
							<div class="form-group form-group-default required">
								<label>Appraisee Sign</label>
								<input type="file" class="form-control" name="appraisee_sign">
							</div>
						</div>
						@if(auth()->user()->staff->SupervisorFlag)
							<div class="col-sm-3">
								<div class="form-group form-group-default required">
									<label>Appraiser Sign</label>
									<input type="file" class="form-control" name="appraiser_sign">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group form-group-default required">
									<label>Executive Director Sign</label>
									<input type="file" class="form-control" name="executive_sign">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group form-group-default required">
									<label>HR Sign</label>
									<input type="file" class="form-control" name="hr_sign">
								</div>
							</div>
						@endif
					</div>
				</div>
				<br>

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
	</div>
</div>