        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-warning">
                        <li class="nav-item" id="nav-dashboard">
                            <a href="/dashboard">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item" id="nav-projek">
                            <a data-toggle="collapse" href="#email-nav">
                                <i class="fas fa-flag-checkered"></i>
                                <p>Projek</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="email-nav">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ url('projek') }}">
                                            <span class="sub-item">Daftar Projek</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('platformProjek') }}">
                                            <span class="sub-item">Platform Projek</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item" id="nav-tim">
                            <a href="{{ url('tim') }}">
                                <i class="fas fa-users"></i>
                                <p>Tim</p>
                            </a>
                        </li>
                        <li class="nav-item" id="nav-client">
                            <a href="{{ url('client') }}">
                                <i class="fas fa-building"></i>
                                <p>Client</p>
                            </a>
                        </li>
                        <li class="nav-item" id="nav-cover">
                            <a href="{{ url('cover') }}">
                                <i class="fas fa-images"></i>
                                <p>Cover</p>
                            </a>
                        </li>
                        <li class="nav-item" id="nav-cover">
                            <a href="{{ url('user') }}">
                                <i class="fas fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-link px-5 mt-2 text-center" id="nav-logout">
                            <a href="/logout" class="btn btn-sm btn-danger"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                        </li>                            
                    </ul>
                </div>
            </div>
        </div>
