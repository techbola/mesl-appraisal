@component('mail::message')
	# Staff Appraisal - Goals Approval Status

	Hello,

	<p>
		Your goals set for period {{ $appraisal->period }} has been rejected.
	</p>

	@component('mail::button', ['url' => route('staff.index')])
		View Appraisal
	@endcomponent

	Thanks,<br>
	{{ config('app.name') }}
@endcomponent