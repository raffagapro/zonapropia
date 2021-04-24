@props([
  'post' => $post,
])

<div class="col-4 p-1">
    <div class="card">
        @if ($post->media1)
            <img src="{{ Storage::url($post->media1) }}" class="card-img-top" alt="...">
        @else
            <img src="{{ asset('assets/images/main_default.png') }}" class="card-img-top" alt="...">
        @endif
        <!-- Badges -->
        <div class="row badge-cont2">
            @foreach ($post->tags as $tag)
            <span class="badge cust-badges badge-{{ $tag->color }} mr-1">{{ $tag->name }}</span>
            @endforeach
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
            <a class="card-link text-dark" href="{{ route('InvertirPost.indez', $post->id) }}">
                Leer más <i class="fas fa-arrow-right main-color"></i>
            </a>
        </div>
    </div>
</div>