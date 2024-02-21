<x-mail::message>
# Hello

Please click the button below to verify your email address.

<x-mail::button :url="route('user.verify', ['token' => $token])">
Verify Email Address
</x-mail::button>

If you did not create an account, no further action is required.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
