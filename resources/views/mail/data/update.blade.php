@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => '127.0.0.1/data/'.$data->id])
View Item
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
