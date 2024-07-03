<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('menu.index') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Menus</span>
              </a>
            </li>
        
            <li class="nav-item">
              <a class="nav-link" href="{{ route('section.index') }}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Sections</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('page.index') }}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Pages</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('users.index') }}">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Users</span>
              </a>
            </li>
          </ul>
        </nav>