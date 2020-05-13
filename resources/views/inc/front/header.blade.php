<!-- Main header start -->
<header class="main-header header-transparent sticky-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="/">
                <img src="{{asset('images/logo/logo.png')}}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <style>
                .navbar-nav .nav-link{
                     color: !important;
                 }
                 </style>
                 @if(Auth::check())
                
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item" style="padding-top: 20px">
                            <a class="btn btn-danger" href="{{ route('front.proprietaire') }}">Je suis propriétaire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.propriete') }}">Appartements</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('front.comment_marche') }}">Comment ça marche</a>
                        </li>
                        @if(Auth::user()->role=='client')
                        <li class="nav-link">
                           <a href="{{route('user.dashboard')}}"style="color:#fff;text-transform:uppercase;font-weight:bolder;font-size:20px;border:1px solid #fff; padding:5px 10px;border-radius:20px;">{{Auth::user()->name}}</a>
                           
                       </li>
                       @else
                       @if(Auth::user()->role=='proprietaire')
                       <li class="nav-link">
                           <a href="{{route('proprietaire.index')}}" style="color:#fff;text-transform:uppercase;font-weight:bolder;font-size:20px;border:1px solid #fff; padding:5px 10px;border-radius:20px;">{{Auth::user()->name}}</a>
                       </li>
                       @else
                       <li class=" nav-link">
                           <a href="{{route('admin')}}" style="color:#fff;text-transform:uppercase;font-weight:bolder;font-size:20px;border:1px solid #fff; padding:5px 10px;border-radius:20px;">{{Auth::user()->name}}</a>
                       </li>
                    </ul>
                    @endif
                    @endif
                 @else
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item" style="padding-top: 20px">
                            <a class="btn btn-danger" href="{{ route('front.proprietaire') }}">Je suis propriétaire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('front.propriete') }}">Appartements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('front.comment_marche') }}">Comment ça marche</a>
                        </li>
                        <li class="nav-item dropdown  ">
                            <a class="nav-link dropdown-toggle" href="{{route('front.register')}}" aria-haspopup="true" aria-expanded="false">S'inscrire</a>
                        </li>
                        <li class="nav-item dropdown  ">
                            <a class="nav-link dropdown-toggle" href="{{ route('front.login') }}">Se connecter</a>
                        </li>
                        
                    </ul>
                 @endif
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->