<x-mail::message>
# Introduction

Your profile has been approved. Your email address is 
email:{{$company->email}}
Please click on the button below to Login

<x-mail::button :url="route('company.login')">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

