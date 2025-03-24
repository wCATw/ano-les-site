@extends('layouts.app')

@section('content')
  @include('archives.' . get_query_var( 'post_type' ), 'archives.default')
@endsection
