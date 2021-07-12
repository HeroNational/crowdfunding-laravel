@extends("interfaces.template.layouts.structure",["title"=>isset($projet)?$projet:"Projet"])

@section("content")
 <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Soumettre un projet</h1>
            <span class="color-text-a">Faites grandir la communauté en exposant vos idées et collecter des fonds pour les concrétiser.</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route('accueil')}}">Accueil</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Soumettre un projet
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
  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 section-t8">
          <div class="row">
            <div class="col-md-12">
              <form class="form-a" action="" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="mb-3 col-md-12">
                    <label for="image" class="text-center text-white bg-gray-800 form-group form-control form-control-lg form-control-a">Choisissez une image pour le projet</label>
                      <input type="file" accept="image/*" id="image" name="image" hidden class="" placeholder="Nom du ptojet" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  </div>
                  <div class="mb-3 col-md-12">
                    <div class="form-group">
                      <input type="text" name="nom" class="form-control form-control-lg form-control-a" placeholder="Nom du ptojet" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    </div>
                  </div>
                  <div class="mb-3 col-md-12">
                    <div class="form-group">
                      <input type="text" name="slogan" class="form-control form-control-lg form-control-a" placeholder="Slogan du ptojet" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <div class="form-group">
                      <input type="number" name="objectif" class="form-control form-control-lg form-control-a" placeholder="Objectif financier du ptojet" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <div class="form-group">
                      <input type="date" name="duree" class="form-control form-control-lg form-control-a" placeholder="Date de fin de campagne" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    </div>
                  </div>
                  <div class="mb-3 col-md-12">
                    <div class="form-group">
                      <textarea name="description" class="form-control form-control-lg form-control-a" placeholder="Description du ptojet"></textarea>
                    </div>
                  </div>
                  <div class="mb-3 col-md-12">
                    <div class="form-group">
                      <select name="categorie" class="mb-3 col-md-12 form-group">
                        <option value="">Catégorie</option>
                      @forelse (App\Models\Categorie::All() as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                      @empty

                      @endforelse
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="col-12 btn btn-a">Soumettre le projet</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Contact End /-->

@endsection
