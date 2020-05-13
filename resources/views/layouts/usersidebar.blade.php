<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{route('user.dashboard')}}">Espace Utilisateur</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                 
                    <li class="dropdown">
                        
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                  
                    <!-- #END# Tasks -->
                    <li class="pull-right">
                        <a href="{{ route('logout') }}" class="js-right-sidebar" data-close="true"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        
                                    Deconnexion
                                </a>
                             
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>  
                            
                    </li>
                    <li class="pull-right">
                        <a href="{{ route('front.index') }}" class="js-right-sidebar" data-close="true" >
                        
                                    Accueil
                                </a>
                             
                            
                            
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                 
            <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="{{asset('client/images/avatar.png')}}" width="150" alt="AdminBSB - Profile Image">
                            </div>
                        </div>
                        
                    </div>    
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                        <div class="email">john.doe@example.com</div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="active">
                        <a href="">
                            <span style="font-size:30px;">{{ Auth::user()->name }} </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.reservation')}}">
                            <span>Mes Reservations</span>
                        </a>
            
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
           
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
     
        <!-- #END# Right Sidebar -->
    </section>