<!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- Brand Logo Light -->
                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo">
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-dark-sm.png') }}" alt="small logo">
                    </span>
                </a>

                <!-- Sidebar Hover Menu Toggle Button -->
                <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                    <i class="ri-checkbox-blank-circle-line align-middle"></i>
                </div>

                <!-- Full Sidebar Menu Close Button -->
                <div class="button-close-fullsidebar">
                    <i class="ri-close-fill align-middle"></i>
                </div>

                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!-- Leftbar User -->
                    <div class="leftbar-user">
                        <a href="pages-profile.html">
                            <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" height="42" class="rounded-circle shadow-sm">
                            <span class="leftbar-user-name mt-2">{{ Auth::user()->name }}</span>
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title">NAVEGUE</li>
                        <li class="side-nav-item">
                            <a href="{{ route('dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="side-nav-item {{ $slug_page === 'tarefas' ? 'menuitem-active' : '' }}">
                            <a data-bs-toggle="collapse" href="#sidebarTarefas" aria-expanded="false" aria-controls="sidebarTarefas" class="side-nav-link">
                                <i class="uil-check-square"></i>
                                <span>Tarefas</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse {{ $slug_page === 'tarefas' ? 'show' : '' }}" id="sidebarTarefas">
                                <ul class="side-nav-second-level">
                                    <li class="{{ $slug_page === 'tarefas' ? 'menuitem-active' : '' }}">
                                        <a href="{{ route('tarefas.listagem') }}">Tarefas</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== -->