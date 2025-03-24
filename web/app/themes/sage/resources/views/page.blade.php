@extends('layouts.app')

@section('content')
  @includeFirst(['pages.' . get_post()->post_name, 'pages.default'])
@endsection
