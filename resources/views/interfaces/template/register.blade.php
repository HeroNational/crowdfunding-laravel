@extends("interfaces.template.layouts.structure",["title"=>"Inscription"])

@section("content")
<!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Inscription à la plateforme</h1>
            <span class="color-text-a">Inscrivez-vous sur ce site web pour bénéficier de beaucoup plus d'impact sur la plateforme.</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route("accueil")}}">Accueil</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                inscription
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
              <div class="mb-3 text-center col-md-12">
                <div class="form-group">
                  <label for="avatar"  class="text-white transition-all delay-100 bg-gray-900 form-control form-control-lg form-control-a hover:bg-gray-800">Photo de profil</label>
                  <input type="file" hidden id="avatar" accept="image/*" name="avatar">
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="form-group">
                  <input type="text" name="nom" class="form-control form-control-lg form-control-a" placeholder="Votre nom">
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="form-group">
                  <input type="text" name="prenom" class="form-control form-control-lg form-control-a" placeholder="Votre prenom">
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Votre adresse email">
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="form-group">
                  <input name="telephone" type="text" class="form-control form-control-lg form-control-a" placeholder="Votre numéro de téléphone">
                </div>
              </div>
              <div class="mb-3 col-md-12">
                <div class="form-group">
                  <select name="sexe" type="email" class="form-control form-control-lg form-control-a" placeholder="Votre adresse email">
                    <option value="">Votre sexe</option>
                    <option value="m">Masculin</option>
                    <option value="f">Feminin</option>
                    <option value="t">Transgenre</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg form-control-a" placeholder="Mot de passe">
                </div>
              </div>
              <div class="mb-3 col-md-6">
                <div class="form-group">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg form-control-a" placeholder="Confirmer le mot de passe">
                </div>
              </div>
              <div class="col-md-12">
                <button type="submit" class="w-full btn btn-a">Inscription</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--/ Contact End /-->
@endsection
