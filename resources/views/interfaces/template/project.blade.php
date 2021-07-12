@extends("interfaces.template.layouts.structure",["title"=>isset($projet->nom)?$projet->nom:"Projet"])

@section("content")
  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{$projet->nom}}</h1>
            <span class="color-text-a">{{$projet->user->nom}}</span>
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
              <li class="breadcrumb-item">
                <a href="{{route("campagnes")}}">Campagnes</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{$projet->nom}}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
            @if ($projet->duree>now())
              <a href="{{route("financer",["id"=>$projet->id])}}" class="right-0 p-2 text-white bg-green-500 rounded hover:bg-green-600">Financer ce projet</a>
            @else
              <div class="w-full text-center bg-red-700">La campagne de financement de ce projet est arrivée à terme.</div>
            @endif
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
           {{--  <div class="carousel-item-b">
              <img src="{{asset("img/slide-2.jpg")}}" alt="">
            </div>
            <div class="carousel-item-b">
              <img src="{{asset("img/slide-3.jpg")}}" alt="">
            </div>
            <div class="carousel-item-b">
              <img src="{{asset("img/slide-1.jpg")}}" alt="">
            </div> --}}
          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">XAF</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">{{$projet->objectif}}</h5>
                  </div>
                </div>
              </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Sommaire</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>Identifiant:</strong>
                      <span>{{$projet->id}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Porteur:</strong>
                      <span>{{$projet->user->nom}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Catégorie:</strong>
                      <span>{{$projet->categorie->libelle}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Status:</strong>
                      <span>{{$projet->etat==1?"Actif":"Terminé"}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Fin de campagne:</strong>
                      <span>{{$projet->duree->format("D d, M Y")}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Montant collecté:</strong>
                      <span>{{$projet->objectif-1000}} XAF</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Description du projet</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                  {{$projet->description}}
                </p>
              </div>
              <div class="col-md-10 offset-md-1">
                <ul class="mb-3 nav nav-pills-a nav-pills section-t3" id="pills-tab" role="tablist">

                  <li class="nav-item">
                    <a class="nav-link active" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans"
                      aria-selected="false">Informations sur le proteur</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab"
                      aria-controls="pills-video" aria-selected="true">Image descriptive</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map"
                      aria-selected="false">Ubication</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-plans-tab">
                        <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0"
                        webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                    <img src="{{Storage::url($projet->image)}}" alt="" class="img-fluid">
                  </div>
                  <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834"
                      width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-12">
          <div class="row section-t3">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Contacter le porteur</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <img src="{{Storage::url($projet->user->avatar)}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-12 col-lg-7">
              <div class="property-agent">
                <h4 class="title-agent">{{$projet->user->nom."".$projet->user->prenom}}</h4>
                <p class="color-text-a">

                </p>
                <ul class="list-unstyled">
                  <li class="d-flex justify-content-between">
                    <strong>Email:</strong>
                    <span class="color-text-a">{{$projet->user->email}}</span>
                  </li>
                </ul>
                <div class="socials-a">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="property-contact">
                <form class="form-a">
                  <div class="row">
                    <div class="mb-1 col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-lg form-control-a" id="inputName"
                          placeholder="Name *" required>
                      </div>
                    </div>
                    <div class="mb-1 col-md-12">
                      <div class="form-group">
                        <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1"
                          placeholder="Email *" required>
                      </div>
                    </div>
                    <div class="mb-1 col-md-12">
                      <div class="form-group">
                        <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45"
                          rows="8" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-a">Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Property Single End /-->

@endsection
