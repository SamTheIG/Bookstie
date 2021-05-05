@extends('errors::minimal')

@section('title', __('HTTP_UNAUTHORIZED'))
@section('code', '301')
@section('message', __('UNAUTHORIZED'))
