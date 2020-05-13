 <!-- partial:partials/_horizontal-navbar.html -->
 <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
    <div class="nav-top flex-grow-1">
      <div class="container d-flex flex-row h-100">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top">
          <a class="navbar-brand brand-logo" href="index.html"></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <form class="search-field" action="#">
            <div class="form-group mb-0">
              <div class="input-group">
                
              </div>
            </div>
          </form>
          <ul class="navbar-nav navbar-nav-right mr-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="icon-bell"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">Vous avez {{$notificationAdds}} nouvelles notifications
                  </p>
                </a>
                 
                @foreach($notificationAdd as $notifie)
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-inverse-warning">
                      <i class="icon-bubble mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Votre propriété à été &nbsp; &nbsp;</h6>
                    <p class="font-weight-light small-text mb-0">
                      {{$notifie->data['statut']}}
                    </p>
                  </div>
                  <form action="{{route('proprietaire.notification.update', $notifie->id)}}" method="POST">
									{{csrf_field()}}
									<div class="pull-right" width="50">
										<button type="submit"  class="btn btn-success" title="marquer comme lu" ><i class="fa fa-check-square"></i></button>
									</div>
                </form>
                </a>
                @endforeach
              </div>
            </li>
            
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle"   id="ConnexionDropdown" href="#" >
                <span class="nav-profile-text"> </span>
              </a>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle"   id="ConnexionDropdown2" href="{{ route('logout') }}"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
   
                    <i class="fa fa-power-off"></i>
                    {{ __('Deconnexion') }}
                </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                  </form>
            </li>
          </ul>
          <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu text-white"></span>
          </button>
        </div>
      </div>
    </div>
    <div class="nav-bottom">
      <div class="container">
        <ul class="nav page-navigation">
          <li class="nav-item">
            <a href="{{route('proprietaire.index')}}" class="nav-link">
              <i class="link-icon icon-screen-desktop"></i>
              <span class="menu-title">Tableau de bord</span>
            </a>
          </li>
         
           <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon icon-people"></i>
              <span class="menu-title">Paramètre</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="submenu">
              <ul class="submenu-item">
                <li class="nav-item">
                  <a class="nav-link" href="">Profile</a>
                </li>
              </ul>
            </div>
          </li>

          <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon icon-notebook"></i>
              <span class="menu-title">Artilces</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="submenu">
              <ul class="submenu-item">
                <li class="nav-item">
                  <a class="nav-link" href="/articles/">Liste</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/articles/create">Creer un article</a>
                </li>
              </ul>
            </div>
          </li>-->

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon icon-wallet"></i>
              <span class="menu-title">Reservation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="submenu">
              <ul class="submenu-item">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('proprietaire.ListeReservation') }}">Liste des Réservations</a>
                </li>
                <!--<li class="nav-item">
                  <a class="nav-link" href="#">Ajouter une localisation</a>
                </li>-->
              </ul>
            </div>
           </li>

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon icon-home"></i>
              <span class="menu-title">Propriété</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="submenu">
              <ul class="submenu-item">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('proprietaire.appartement') }}">Liste</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('proprietaire.add') }}">Ajouter une propriété</a>
                </li>
              </ul>
            </div>
           </li>
          


         
          
         
           
          <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon icon-user"></i>
              <span class="menu-title">Profil</span>
            </a>
          </li>-->
          <!--<li class="nav-item">
            <a href="" class="nav-link">
              <i class="link-icon icon-user"></i>
              <span class="menu-title">Element du site</span>
            </a>

          </li>-->
          
        </ul>
      </div>
    </div>
  </nav>