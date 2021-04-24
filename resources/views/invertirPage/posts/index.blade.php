@extends('layouts.app')

@section('title', $post->title)

@section('content')
  @include('invertirPage.posts.banner')

  <div class="container pb-5">
    <div class="row mt-5 py-2 text-center">
      <div class="col-6 mx-auto">
        <h1 class="page-title">{{ $post->title }}</h1>
        <p class="page-body">{{ $post->subtitle }}</p>
        <!-- Badges -->
        @foreach ($post->tags as $tag)
          <span class="badge badge-primary mr-1">{{ $tag->name }}</span>
        @endforeach
      </div>
    </div>
    
    <div class="row mt-4 py-2">
      <div class="col-10 mx-auto">
        @php
            $body = explode('[p]', $post->body );
            $bCounter = 0;
            $bTotal = count($body);
            $ytURL = explode('/', $post->video );
        @endphp
        
        @foreach ($body as $b)
          @php
              $bCounter++;
          @endphp
          <p class="page-body">{{ $b }}</p>
          @if ($bCounter === 1 && $post->media1)
            <img class="my-5 post-img" src="{{ Storage::url($post->media1) }}" alt="">
          @endif
          @if ($bCounter === ($bTotal - 1) && $post->video)
            <div class="embed-responsive embed-responsive-16by9 post-img">
              <iframe
                src="https://www.youtube.com/embed/{{ $ytURL[3] }}"
                class="post-img"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
              </iframe>
            </div>
            <br>
          @endif
        @endforeach
      </div>

    </div>

    <div class="mt-5 text-center">
      <h3 class="page-text">Artículos Similares</h3>
    </div>
    <div class="row my-4  py-2">
      @forelse ($relatedPosts as $p)
        @if ($p->id !== $post->id)
          <x-blog.relateditem :post="$p"/>
        @endif
      @empty
          No hay articulos similares.
      @endforelse
    </div>

    <div class="row mb-5 text-center">
      <div class="col-4 mx-auto">
        {{ $relatedPosts->links() }}
      </div>

    </div>

  </div>

@endsection

{{-- @section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/range-jqui/range_style.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2.css') }}"/>
@endsection

@section('scripts')
  @isset($tag)
      <input type="hidden" name="tagId" value="{{ $tag }}">
  @endisset
  @isset($cat)
      <input type="hidden" name="catId" value="{{ $cat }}">
  @endisset
  @isset($comuna)
      <input type="hidden" name="comunaId" value="{{ $comuna }}">
  @endisset
  @isset($region)
      <input type="hidden" name="regionId" value="{{ $region }}">
  @endisset
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <script src="{{ asset('js/ajax/regionSwitcherHome.js') }}" ></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection --}}
