@extends('layouts.app')

@section('content')
  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @while(have_posts())
    @php(the_post())
    <a href="{{ get_permalink() }}">{{ get_the_title() }}</a>
  @endwhile
@endsection
