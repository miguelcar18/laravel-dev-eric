@component('mail::message')
# Introduction

you are parter of the team, Congratulations

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

 Thanks,<br>
{{ config('app.name') }}
@endcomponent
