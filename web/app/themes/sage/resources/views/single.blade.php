@extends('layouts.app')

@section('content')
  @includeFirst(['singles.' . get_query_var( 'post_type' ), 'singles.post'])
@endsection
