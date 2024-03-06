<x-mail::message>
# Introduction

A job has been posted in the category you are interested.Please click on the link below to go to specific job

{{-- <x-mail::button :url="''">
Apply in this Url
</x-mail::button> --}}
<x-mail::button :url="route('job.details',$job['id'])">
Click Here
</x-mail::button>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
