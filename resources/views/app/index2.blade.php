@extends('app.page')

@section('extras_style')
<style media="screen">
  #landing-page{
    background-color: #e3e7eb;
    background-image: url({{ asset('asset/imgs/intro/bgs/etu.jpg') }});
    background-size: cover;
    background-repeat: no-repeat;
    height: 500px;
    width: 100%;
    position: relative;
  }

  #landing-page .overlay{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    opacity: 0.7;
    background: linear-gradient(45deg, #000000 0%, #2b99f3 100%);
    z-index: 0;

  }

  #landing-page .container{
    position: relative;
  }

  #landing-page .container .row{
    position: relative;
    height: 500px;
  }

  #landing-page .resac-btn-primary{
    background: #2FA4E7;
    border-radius: 3px;
  }

  #landing-page .resac-btn-back-white{
    background: #fff;
    color: #000;
    border-color: #fff;
    border-radius: 3px;
  }

  @@media(max-width: 768px) {
    #landing-page #well{
      text-align: center;
      font-size: 30px;
    }
    #landing-page #landing-btn{
      text-align: center;
    }
    #landing-page #landing-footer{
      display: flex;
      flex-direction: column;
      align-items: center
    }
  }

  #slogan-style{
    border-left: 3px #2FA4E7 solid;
  }

  .resac-section p{
    line-height: 1.8;
    font-size: 20px;
    font-weight: 500;
  }
</style>
<style media="screen">
  .w-200{
    width: 150px;
  }
  .w-150{
    width: 100px;
  }
</style>
<style media="screen">
  .customer-logos.title{
    text-align: center;
    font-weight: 100;
  }
  .customer-logos.slider{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;

  }
  .customer-logos.slider .slide{
    margin-left: 30px;
    margin-right: 30px;
  }
</style>
@endsection

@section('content')
<div class="container">
  @include('flash')
</div>

<div id="landing-page">
  <div class="overlay"></div>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-sm-12 col-md-12 col-lg-8">
        <div class="text-white">
          <h1 id="well" class="text-white">Bienvenue sur RESAC<br>La Plate-forme du Réseau des Anciens Caimans de la Diaspora</h1>
          <div id="landing-footer">
            <div id="slogan-style" class="mt-3 text-white pl-2">
              <span class="align-middle">Caimans, cherche, trouve et jamais n'abandonne.</span>
            </div>
            <div id="landing-btn" class="pt-3">
              <a class="btn btn-primary btn-lg resac-btn-primary" href="{{ route('register') }}" role="button">Rejoindre</a>
              <a class="btn btn-primary btn-lg resac-btn-back-white" href="{{ route('annuaire') }}" role="button">Annuaire des caïmans</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="resac-bg-light pt-3">
  <div class="container">
    <h3 class="customer-logos title text-muted mb-3">Les Académies du Réseau</h3>
    <section class="customer-logos slider">
      <div class="slide"><img class="w-200" title="Lycéé Classique d'Abidjan" src="{{ asset('asset/imgs/intro/e-logos/lca.png') }}" alt=""></div>
      <div class="slide"><img class="w-150" title="Science Po bordeaux" src="{{ asset('asset/imgs/intro/e-logos/sc-po.jpg') }}" alt=""></div>
      <div class="slide"><img class="w-200" title="ESATIC" src="{{ asset('asset/imgs/intro/e-logos/esatic.png') }}" alt=""></div>
      <div class="slide"><img class="w-150" title="INPHB" src="{{ asset('asset/imgs/intro/e-logos/inp.png') }}" alt=""></div>
      <div class="slide"><img class="w-150" title="Université Félix Houphouet-Boigny" src="{{ asset('asset/imgs/intro/e-logos/min/ufb.png') }}" alt=""></div>
    </section>
  </div>
</div>
<div class="">

</div>

@endsection
