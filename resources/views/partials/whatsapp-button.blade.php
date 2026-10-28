@php
    $whatsappNumber = preg_replace('/\D+/', '', config('jst.contact.whatsapp', ''));
    $whatsappMessage = config('jst.contact.whatsapp_message', 'Hello JST.');
@endphp
<a class="whatsapp-float" href="https://wa.me/{{ $whatsappNumber }}?text={{ rawurlencode($whatsappMessage) }}" target="_blank" rel="noopener noreferrer" aria-label="Contact JST through WhatsApp" title="Chat on WhatsApp">
    <span class="whatsapp-symbol" aria-hidden="true">WA</span>
</a>
