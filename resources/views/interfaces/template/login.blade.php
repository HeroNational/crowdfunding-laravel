@extends("interfaces.template.layouts.structure",["title"=>"Connexion"])

@section("content")
<!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Connexion à la plateforme</h1>
            <span class="color-text-a">Connectez-vous sur ce site et continuez vos actions précédentes.</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route("accueil")}}">Accueil</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                connexion
              </li>
            </ol>
          </nav>
        </div>
        @if ($errors->any())
          <div class="ml-5 font-medium text-right text-red-600">
              {{ __('Whoops! Something went wrong.') }}
          </div>

          <ul class="mt-3 text-sm text-left text-red-600 list-disc list-inside">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        @endif
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Contact Star /-->
  <section class="container contact">
    <div class="col-sm-6 section-t8">
      <div class="relative -top-12 row">
        <div class="col-12">
          <form class="form-a" action="" method="post" enctype="multipart/form-data" role="form">
            @csrf
            <div class="row">
              <div class="mb-3 col-md-12">
                <div class="form-group">
                  <input type="text" name="email" class="form-control form-control-lg form-control-a" placeholder="Votre adresse email">
                </div>
              </div>
              <div class="mb-3 col-md-12">
                <div class="form-group">
                  <input type="text" name="password" class="form-control form-control-lg form-control-a" placeholder="Votre mot de passe">
                </div>
              </div>
              <!-- Remember Me -->
              <div class="mb-3 col-md-12">
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Me garder connecté') }}</span>
                    </label>
                </div>
              </div>
              <div class="col-md-12">
                <button type="submit" class="w-full btn btn-a">Connexion</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--/ Contact End /-->
@endsection
