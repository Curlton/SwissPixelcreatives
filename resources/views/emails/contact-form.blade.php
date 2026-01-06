@component('mail::message')
# New Website Inquiry

You have received a new message from the contact form on **optimization-app.com**.

**Name:** {{ $formData['name'] }}  
**Email:** {{ $formData['email'] }}  
**Company:** {{ $formData['company'] }}  
**Phone:** {{ $formData['phone'] }}  
**Country:** {{ $formData['country'] }}  

**Message:**  
{{ $formData['message'] }}

@component('mail::button', ['url' => 'mailto:' . $formData['email']])
Reply to Client
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
