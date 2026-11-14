@extends('layouts.app')

@section('title', 'Home | ' . config('cakrawala.brand.name'))
@section('meta_description', 'Discover Cakrawala surveying, drone mapping, bathymetry, LiDAR, and 3D mapping solutions.')

@section('content')
    @include('pages.home.sections.hero')
    @include('pages.home.sections.services-preview')
    @include('pages.home.sections.documentation-preview')
    @include('pages.home.sections.mitra-preview')

@endsection
