@extends('layouts.app')

@section('content')
  @include('taxonomies.' . get_queried_object()->taxonomy)
@endsection
