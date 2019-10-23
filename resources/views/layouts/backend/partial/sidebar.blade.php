<div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{url('storage/app/public/profile',Auth::user()->image)}}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('admin.profile-setting')}}"><i class="md md-settings"></i> Profile </a></li>

                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf

                                            </form>
                                    </li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            @if (Request::is('admin*'))
                            <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}">
                                <a href="{{route('admin.dashboard')}}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fab fa-typo3"></i><span> Category </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}">
                                        <a href="{{route('admin.category.create')}}">Add Category</a>
                                    </li>
                                    <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}">
                                        <a href="{{route('admin.category.index')}}">Manage Category</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fab fa-bandcamp"></i><span> Manufacture </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}">
                                        <a href="{{route('admin.manufacture.create')}}">Add Manufacture</a>
                                    </li>
                                    <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}">
                                        <a href="{{route('admin.manufacture.index')}}">Manage Manufacture</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-book"></i><span> Product </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}">
                                        <a href="{{route('admin.product.create')}}">Add Product</a>
                                    </li>
                                    <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}">
                                        <a href="{{route('admin.product.index')}}">Manage Products</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-sliders-h"></i> Slider </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}">
                                        <a href="{{route('admin.slider.create')}}">Add Slider</a>
                                    </li>
                                    <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}">
                                        <a href="{{route('admin.slider.index')}}">Manage Slider</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}">
                                <a href="{{route('admin.order.index')}}" class="waves-effect"><i class="fas fa-shopping-cart"></i><span> Manage Order </span></a>
                            </li>
                        @endif
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>