@extends("interfaces.template.layouts.structure",["title"=>"Campagnes"])

@section("content")

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{$projet[0]->nom}}</h1>
            <span class="color-text-a">{{$projet[0]->user->nom}}</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route("accueil")}}">Accueil</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{route('campagnes')}}">Campagnes</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Financer
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

  <!--/ Agent Single Star /-->
  <section class="agent-single">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-md-6">
              <div class="agent-avatar-box">
                <form class="form-a" action="" method="post" enctype="multipart/form-data" role="form">
                  @csrf
                  <div class="row">
                    <div class="mb-3 col-md-12">
                      <div class="form-group">
                        <input type="text" name="message" class="form-control form-control-lg form-control-a" placeholder="Message au porteur du projet">
                      </div>
                    </div>
                    <div class="mb-3 col-md-12">
                      <div class="form-group">
                        <input type="number" name="montant" class="form-control form-control-lg form-control-a" placeholder="Montant du financement">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="w-full btn btn-a">Financer</button>
                    </div>
                  </div>
                </form>
                {{-- <img src="{{Storage::url($projet[0]->image)}}" alt="" class="agent-avatar img-fluid"> --}}
              </div>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="agent-info-box">
                <div class="agent-title">
                  <div class="title-box-d">
                    <h3 class="title-d">{{$projet[0]->nom}}
                      <br> {{$projet[0]->user->nom}}</h3>
                  </div>
                </div>
                <div class="mb-3 agent-content">
                  <p class="content-d color-text-a">
                    {{$projet[0]->description}}
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Téléphone: </strong>
                      <span class="color-text-a"> {{$projet[0]->user->telephone}} </span>
                    </p>
                    <p>
                      <strong>Email: </strong>
                      <span class="color-text-a"> {{$projet[0]->user->email}}</span>
                    </p>
                  </div>
                </div>
                <div class="socials-footer">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    </sectio>
@endsection
