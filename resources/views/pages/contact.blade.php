@extends('layouts.app')

@section('title', 'Contact | ' . config('jst.brand.name'))
@section('meta_description', 'Contact JST to discuss surveying, mapping, and geospatial project requirements.')

@section('content')
    <section class="page-hero page-hero-simple"><div class="container page-hero-content hero-enter"><p class="eyebrow eyebrow-light">CONTACT JST</p><h1>Let’s talk about your project</h1><p>Share your requirements and the team can help identify the most suitable surveying or mapping approach.</p></div></section>
    <section class="section"><div class="container contact-grid reveal"><div class="contact-intro"><p class="eyebrow">GET IN TOUCH</p><h2 class="section-title">Good projects start with a conversation.</h2><p class="section-description">Contact details below are placeholders for development. Replace them with verified company information before launch.</p><img class="contact-illustration" src="{{ asset('images/contact/contact-placeholder.svg') }}" alt="Contact JST placeholder illustration" loading="lazy"></div><div class="contact-information">
        <div class="contact-info-card reveal"><span class="contact-info-icon">@</span><div><p class="muted-label">Email</p><a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a></div></div>
        <div class="contact-info-card reveal"><span class="contact-info-icon">WA</span><div><p class="muted-label">WhatsApp</p><a href="https://wa.me/{{ preg_replace('/\D+/', '', $contact['whatsapp']) }}" target="_blank" rel="noopener noreferrer">{{ $contact['whatsapp'] }}</a></div></div>
        <div class="contact-info-card reveal"><span class="contact-info-icon">⌖</span><div><p class="muted-label">Office</p><p>{{ $contact['address'] }}</p></div></div>
        <div class="contact-info-card reveal"><span class="contact-info-icon">◷</span><div><p class="muted-label">Office hours</p><p>{{ $contact['office_hours'] }}</p></div></div>
        <a class="button button-primary button-full" href="https://wa.me/{{ preg_replace('/\D+/', '', $contact['whatsapp']) }}?text={{ rawurlencode($contact['whatsapp_message']) }}" target="_blank" rel="noopener noreferrer">Chat with JST on WhatsApp <span aria-hidden="true">↗</span></a>
    </div></div></section>
@endsection
