@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Sorry, the request is not found! Web page redirects to home after 5 seconds.'))
{{header( "refresh:5;url=" .route('home'))}}


