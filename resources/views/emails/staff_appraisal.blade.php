@component('mail::message')
# Introduction

A staff appraisal has been submitted.

@component('mail::button', ['url' => ''])
View Appraisal
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
