@extends('layouts.app')

@section('title', 'Lorem Ipsum')

@section('content')
  @include('invertirPage.posts.banner')

  <div class="container pb-5">
    <div class="row mt-5 py-2 text-center">
      <div class="col-6 mx-auto">
        <h1 class="page-title">Lorem Ipsum</h1>
        <p class="page-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
          labore et dolore magna</p>
      </div>

    </div>

    <div class="row mt-4 py-2">
      <div class="col-10 mx-auto">
        <p class="page-body">
          “Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”
        </p>
        <p class="page-body">
          “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?”
        </p>
        <img class="my-5" src="assets/images/placeholders/postImgPlaceholder1.png" alt="" style="width: 100%">
        <p class="page-body">
          “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.”
        </p>
        <img class="my-5" src="assets/images/placeholders/postImgPlaceholder2.png" alt="" style="width: 100%">
        <p class="page-body">
          “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?”
        </p>
      </div>

    </div>

    <div class="mt-5 text-center">
      <h3 class="page-text">Lorem Ipsum</h3>
    </div>
    <div class="row my-4  py-2">
      <div class="col-4 p-1">
        <div class="card">
          <img src="assets/images/placeholders/cardTopPlaceholder4.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Lorem Ipsum</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna…
            </p>
            <a class="card-link text-dark" href="">Leer más <i class="fas fa-arrow-right main-color"></i></a>
          </div>
        </div>
      </div>

      <div class="col-4 p-1">
        <div class="card">
          <img src="assets/images/placeholders/cardTopPlaceholder5.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Lorem Ipsum</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna…
            </p>
            <a class="card-link text-dark" href="">Leer más <i class="fas fa-arrow-right main-color"></i></a>
          </div>
        </div>
      </div>

      <div class="col-4 p-1">
        <div class="card">
          <img src="assets/images/placeholders/cardTopPlaceholder6.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Lorem Ipsum</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna…
            </p>
            <a class="card-link text-dark" href="">Leer más <i class="fas fa-arrow-right main-color"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="row mb-5 text-center">
      <div class="col-4 mx-auto">
        paginate here
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
