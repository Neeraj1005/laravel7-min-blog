
           <!-- Main Sidebar Container -->
           <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
              <img
                src="{{asset('dist/img/AdminLTELogo.png')}}"
                alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3"
                style="opacity: 0.8;"
              />
              <span class="brand-text font-weight-light">DigitalCRM</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Neeraj Singh</a>
                </div>
            </div>
              <nav class="mt-2">
                <ul
                  class="nav nav-pills nav-sidebar flex-column"
                  data-widget="treeview"
                  role="menu"
                  data-accordion="false"
                >
                <li class="nav-item">
                    <a href="task/view.html" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
                  </li>
                  <li class="nav-item has-treeview menu-close">
                    <!-- <a href="#" class="nav-link active"> -->
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        Users
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('users.index')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Lists</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('users.create')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Create</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item has-treeview menu-close">
                    <!-- <a href="#" class="nav-link active"> -->
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-book"></i>
                      <p>
                        Posts
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('users.index')}}" class="nav-link">
                          <i class="far fa-copy nav-icon"></i>
                          <p>Lists</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('users.create')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Add Post</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-image"></i>
                      <p>
                        Categories
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="./index.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>All Category</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./index.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Add category</p>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-image"></i>
                      <p>
                        Media
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="./index.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>All Media</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./index.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Upload Media</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- /.sidebar -->
          </aside>
