@extends('frontend.layouts.app')

@section('meta_title', $meta->meta_title)

@section('meta_description', $meta->meta_description)

@section('content')

{ !! ($meta->meta_description) !! }

@endsection