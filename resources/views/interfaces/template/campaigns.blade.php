@extends("interfaces.template.layouts.structure",["title"=>"Campagnes"])

@section("content")

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Campagnes en cours</h1>
            <span class="color-text-a">Toutes les campagnes lancées</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route("accueil",["projets"=>Projet::orderBy("nom",'desc')
                    ->take(3)
                    ->get()])}}">Accueil</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Campagnes
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->
  <section class="grid property-grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="grid-option">
            <form>
              <select class="custom-select">
                <option selected>All</option>
                <option value="1">New to Old</option>
                <option value="2">For Rent</option>
              </select>
            </form>
          </div>
        </div>
        @forelse ($projets as $projet)
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{Storage::url($projet->image)}}" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.html">{{$projet->nom}}
                      <br /> <span class="text-sm text-right">{{$projet->user->nom}}</span></a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{$projet->categorie->libelle}}</span>
                  </div>
                  <a href="{{route("projet",["id"=>$projet->id])}}" class="link-a">Voir plus en detail
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="text-center card-footer-a">
                    <a href="{{route("financer",["id"=>$projet->id])}}">
                        <ul class="card-info d-flex justify-content-around">
                            <li>
                            <h4 class="card-info-title">Financer ce projet de</h4>
                            <span>{{$projet->objectif}}
                                <sup>XAF</sup>
                            </span>
                            </li>
                        </ul>
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        @empty

        @endforelse
      </div>
      <div class="row">
        <div class="col-sm-12">
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <span class="ion-ios-arrow-back"></span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="#">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Property Grid End /-->

@endsection
