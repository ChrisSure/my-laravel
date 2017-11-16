@component('mail::message')
# Наші вітання

Для підтвердження реєстрації перейдіть по посиланню.

@component('mail::button', ['url' => $url])
Перейти
@endcomponent

Дякуємо,<br>
{{ config('app.name') }}
@endcomponent
