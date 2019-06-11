<div class="tab-pane slide-left padding-20" id="tab6">
	<div class="row row-same-height">
		<div class="col-md-12">
			<div class="padding-30">

				<form action="{{ route('staff_behavioural.store') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="row clearfix">
						<div class="col-md-12">
							<h4>Behavioural Appraisal</h4>

							@foreach($behaviourals  as $behavioural)
								<table class="table">
									<thead>
									<tr>
										<th scope="col" class="text-center text-white bg-primary">{{ $behavioural->behaviouralCat }}</th>
										<th scope="col" class="text-center text-white bg-primary">Weight</th>
										<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>
									</tr>
									</thead>
									<tbody>

										@foreach($behavioural->behaviouralUserItems  as $staff_behavioural_item)
											<tr>
												<td>
													{{ $staff_behavioural_item->behaviouralItem }}
												</td>
												<td>
													{{ $staff_behavioural_item->weight }}
												</td>
												<td>
													<div class="form-group form-group-default">
														<input type="text" class="form-control" name="">
													</div>
												</td>
											</tr>
										@endforeach

									</tbody>
								</table>
							@endforeach
						</div>
					</div>
					<br>

					<div class="form-group-attached">
						<div class="row clearfix">
							<div class="col-md-12">
								<input type="hidden" name="appraisalID" value="{{ $appraisalID }}">
								<button class="btn btn-primary btn-cons btn-animated" type="submit">
									<span>Submit</span>
								</button>
							</div>
						</div>
					</div>

				</form>

{{--			<form action="{{ route('staff_behavioural.store') }}" method="post" enctype="multipart/form-data">--}}
{{--				@csrf--}}
{{--				<div class="row clearfix">--}}
{{--					<div class="col-md-12">--}}
{{--						<h4>Behavioural Appraisal</h4>--}}
{{--						<table class="table">--}}
{{--							<thead>--}}
{{--							<tr>--}}
{{--								<th scope="col" class="text-center text-white bg-primary">Personal Attribute</th>--}}
{{--								<th scope="col" class="text-center text-white bg-primary">Weight</th>--}}
{{--								<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<th scope="col" class="text-center text-white bg-primary">Supervisor's Assessment</th>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							</thead>--}}
{{--							<tbody>--}}
{{--								<tr>--}}
{{--									<td>--}}
{{--										Team Work--}}
{{--									</td>--}}
{{--									<td>--}}
{{--										20--}}
{{--									</td>--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="team_work"--}}
{{--												   value="{!! !empty($personal_attribute) ? $personal_attribute->team_work : '' !!}">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--									@if(auth()->user()->staff->SupervisorFlag)--}}
{{--										<td>--}}
{{--											<div class="form-group form-group-default">--}}
{{--												<input type="text" class="form-control" name="team_work2">--}}
{{--											</div>--}}
{{--										</td>--}}
{{--									@endif--}}
{{--								</tr>--}}
{{--								<tr>--}}
{{--									<td>--}}
{{--										Responsibility--}}
{{--									</td>--}}
{{--									<td>--}}
{{--										20--}}
{{--									</td>--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="responsibility"--}}
{{--												   value="{!! !empty($personal_attribute) ? $personal_attribute->responsibility : '' !!}">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--									@if(auth()->user()->staff->SupervisorFlag)--}}
{{--										<td>--}}
{{--											<div class="form-group form-group-default">--}}
{{--												<input type="text" class="form-control" name="responsibility2">--}}
{{--											</div>--}}
{{--										</td>--}}
{{--									@endif--}}
{{--								</tr>--}}
{{--								<tr>--}}
{{--									<td>--}}
{{--										Integrity--}}
{{--									</td>--}}
{{--									<td>--}}
{{--										20--}}
{{--									</td>--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="integrity"--}}
{{--												   value="{!! !empty($personal_attribute) ? $personal_attribute->integrity : '' !!}">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--									@if(auth()->user()->staff->SupervisorFlag)--}}
{{--										<td>--}}
{{--											<div class="form-group form-group-default">--}}
{{--												<input type="text" class="form-control" name="integrity2">--}}
{{--											</div>--}}
{{--										</td>--}}
{{--									@endif--}}
{{--								</tr>--}}
{{--								<tr>--}}
{{--									<td>--}}
{{--										Innovation--}}
{{--									</td>--}}
{{--									<td>--}}
{{--										20--}}
{{--									</td>--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="innovation"--}}
{{--												   value="{!! !empty($personal_attribute) ? $personal_attribute->innovation : '' !!}">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--									@if(auth()->user()->staff->SupervisorFlag)--}}
{{--										<td>--}}
{{--											<div class="form-group form-group-default">--}}
{{--												<input type="text" class="form-control" name="innovation2">--}}
{{--											</div>--}}
{{--										</td>--}}
{{--									@endif--}}
{{--								</tr>--}}
{{--								<tr>--}}
{{--									<td>--}}
{{--										Passion--}}
{{--									</td>--}}
{{--									<td>--}}
{{--										20--}}
{{--									</td>--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="passion"--}}
{{--												   value="{!! !empty($personal_attribute) ? $personal_attribute->passion : '' !!}">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--									@if(auth()->user()->staff->SupervisorFlag)--}}
{{--										<td>--}}
{{--											<div class="form-group form-group-default">--}}
{{--												<input type="text" class="form-control" name="passion2">--}}
{{--											</div>--}}
{{--										</td>--}}
{{--									@endif--}}
{{--								</tr>--}}
{{--							</tbody>--}}
{{--						</table>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<br>--}}

{{--				<div class="row clearfix">--}}
{{--					<div class="col-md-12">--}}
{{--						<table class="table">--}}
{{--							<thead>--}}
{{--							<tr>--}}
{{--								<th scope="col" class="text-center text-white bg-primary">Job Competency</th>--}}
{{--								<th scope="col" class="text-center text-white bg-primary">Weight</th>--}}
{{--								<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<th scope="col" class="text-center text-white bg-primary">Supervisor's Assessment</th>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							</thead>--}}
{{--							<tbody>--}}
{{--							<tr>--}}
{{--								<td>--}}
{{--									Self starter--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									20--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									<div class="form-group form-group-default">--}}
{{--										<input type="text" class="form-control" name="self_starter"--}}
{{--											   value="{!! !empty($job_competency) ? $job_competency->self_starter : '' !!}">--}}
{{--									</div>--}}
{{--								</td>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="self_starter2">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							<tr>--}}
{{--								<td>--}}
{{--									Problem Solving--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									20--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									<div class="form-group form-group-default">--}}
{{--										<input type="text" class="form-control" name="problem_solving"--}}
{{--											   value="{!! !empty($job_competency) ? $job_competency->problem_solving : '' !!}">--}}
{{--									</div>--}}
{{--								</td>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="problem_solving2">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							<tr>--}}
{{--								<td>--}}
{{--									Analytical Skill--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									20--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									<div class="form-group form-group-default">--}}
{{--										<input type="text" class="form-control" name="analytical_skill"--}}
{{--											   value="{!! !empty($job_competency) ? $job_competency->analytical_skill : '' !!}">--}}
{{--									</div>--}}
{{--								</td>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="analytical_skill2">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							<tr>--}}
{{--								<td>--}}
{{--									Technical Skill--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									20--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									<div class="form-group form-group-default">--}}
{{--										<input type="text" class="form-control" name="technical_skill"--}}
{{--											   value="{!! !empty($job_competency) ? $job_competency->technical_skill : '' !!}">--}}
{{--									</div>--}}
{{--								</td>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="technical_skill2">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							<tr>--}}
{{--								<td>--}}
{{--									Leadership--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									20--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									<div class="form-group form-group-default">--}}
{{--										<input type="text" class="form-control" name="leadership"--}}
{{--											   value="{!! !empty($job_competency) ? $job_competency->leadership : '' !!}">--}}
{{--									</div>--}}
{{--								</td>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="leadership2">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							</tbody>--}}
{{--						</table>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<br>--}}

{{--				<div class="row clearfix">--}}
{{--					<div class="col-md-12">--}}
{{--						<table class="table">--}}
{{--							<thead>--}}
{{--							<tr>--}}
{{--								<th scope="col" class="text-center text-white bg-primary">Adherence & Compliance</th>--}}
{{--								<th scope="col" class="text-center text-white bg-primary">Weight</th>--}}
{{--								<th scope="col" class="text-center text-white bg-primary">Self Assessment</th>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<th scope="col" class="text-center text-white bg-primary">Supervisor's Assessment</th>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							</thead>--}}
{{--							<tbody>--}}
{{--							<tr>--}}
{{--								<td>--}}
{{--									Efficient TAT/Time management--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									20--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									<div class="form-group form-group-default">--}}
{{--										<input type="text" class="form-control" name="time_management"--}}
{{--										value="{!! !empty($compliance) ? $compliance->time_management : '' !!}">--}}
{{--									</div>--}}
{{--								</td>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="time_management2">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							<tr>--}}
{{--								<td>--}}
{{--									Punctuality--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									20--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									<div class="form-group form-group-default">--}}
{{--										<input type="text" class="form-control" name="punctuality"--}}
{{--										value="{!! !empty($compliance) ? $compliance->punctuality : '' !!}">--}}
{{--									</div>--}}
{{--								</td>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="punctuality2">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							<tr>--}}
{{--								<td>--}}
{{--									Policy & procedure compliance--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									20--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									<div class="form-group form-group-default">--}}
{{--										<input type="text" class="form-control" name="policy"--}}
{{--										value="{!! !empty($compliance) ? $compliance->policy : '' !!}">--}}
{{--									</div>--}}
{{--								</td>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="policy2">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							<tr>--}}
{{--								<td>--}}
{{--									Process Management--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									20--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									<div class="form-group form-group-default">--}}
{{--										<input type="text" class="form-control" name="process_mgt"--}}
{{--										value="{!! !empty($compliance) ? $compliance->process_mgt : '' !!}">--}}
{{--									</div>--}}
{{--								</td>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="process_mgt2">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							<tr>--}}
{{--								<td>--}}
{{--									Ethics and Values adherance--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									20--}}
{{--								</td>--}}
{{--								<td>--}}
{{--									<div class="form-group form-group-default">--}}
{{--										<input type="text" class="form-control" name="ethics"--}}
{{--											   value="{!! !empty($compliance) ? $compliance->ethics : '' !!}">--}}
{{--									</div>--}}
{{--								</td>--}}
{{--								@if(auth()->user()->staff->SupervisorFlag)--}}
{{--									<td>--}}
{{--										<div class="form-group form-group-default">--}}
{{--											<input type="text" class="form-control" name="ethics2">--}}
{{--										</div>--}}
{{--									</td>--}}
{{--								@endif--}}
{{--							</tr>--}}
{{--							</tbody>--}}
{{--						</table>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<br>--}}

{{--				<div class="form-group-attached">--}}
{{--					<div class="row clearfix">--}}
{{--						<div class="col-md-12">--}}
{{--							<input type="hidden" name="appraisalID" value="{{ $appraisalID }}">--}}
{{--							<button class="btn btn-primary btn-cons btn-animated" type="submit">--}}
{{--								<span>Submit</span>--}}
{{--							</button>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}

{{--			</form>--}}

			</div>
		</div>
	</div>
</div>