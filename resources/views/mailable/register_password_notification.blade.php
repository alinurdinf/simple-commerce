@component('mail::message', ['mso' => 'mso-16'])
# You Have Been Registered

Halo {{ $maildata['name'] }},
You have been registered to the system. Please use the following password to login to the system.

This detail of your account:
- **Email**: {{ $maildata['email'] }}
- **Password**: {{ $maildata['password'] }}

Thank You
@endcomponent
