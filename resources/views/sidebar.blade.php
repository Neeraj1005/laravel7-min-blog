
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
              <nav class="mt-2">
                <ul
                  class="nav nav-pills nav-sidebar flex-column"
                  data-widget="treeview"
                  role="menu"
                  data-accordion="false"
                >
                  <li class="nav-item">
                    <a href="index.html" class="nav-link">
                      <i class="nav-icon far fa-image"></i>
                      <p>
                        Create User
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="task/view.html" class="nav-link">
                      <i class="nav-icon far fa-image"></i>
                      <p>
                        View Task
                      </p>
                    </a>
                  </li>
                  <li class="nav-item has-treeview menu-close">
                    <!-- <a href="#" class="nav-link active"> -->
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Dropdown
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="./index.html" class="nav-link active">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Option1</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- /.sidebar -->
          </aside>
