@component('mail::message')
# Staff Appraisal

Hello,

<p>
	New appraisal submitted by {{ auth()->user() ->last_name . " " . auth()->user() ->last_name }}.
</p>

@component('mail::button', ['url' => route('supervisor.index')])
View Appraisal
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
