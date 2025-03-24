@extends('layouts.app')

@section('content')
  <section class="section content">
    <div class="container">
      <h1>Home</h1>
      @while(have_posts())
        @php the_post() @endphp
        <a href="{{ get_permalink() }}">{{ get_the_title() }}</a>
      @endwhile
    </div>
  </section>
@endsection
