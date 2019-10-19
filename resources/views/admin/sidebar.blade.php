<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
        <li class=" navigation-header"><span>Menu</span>
        </li>
        <li class=" nav-item">
            <a href="{{route('admin.message')}}">
                
                <span class="menu-title" data-i18n="Email">Message</span>
            </a>
        </li>
        <li class=" nav-item">
            <a href="{{route('comments')}}">
                
                <span class="menu-title" data-i18n="Chat">Comment</span>
            </a>
        </li>
        <li class=" nav-item">
                <a href="#"><span class="menu-title" data-i18n="Todo">Gellary and Dialouge</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('gallery_dialouge')}}"><span  >Add Galleries and Dialouge</span></a>
                    </li>
                    <li><a href="{{route('gal_dal_list')}}"><span class="menu-item" >Current</span></a>
                    </li>
                       
                </ul>
               
        </li>
        <li class=" nav-item">
            <a href="#"><span class="menu-title" data-i18n="Todo">Products</span></a>
            <ul class="menu-content">
                    <li><a href="{{route('admin.addproduct')}}"><span  >Add A Product</span></a>
                    </li>
                    <li><a href="{{route('admin.productlist')}}"><span class="menu-item" >Product List</span></a>
                    </li>
                   
            </ul>
        </li>
       
        <li class=" nav-item">
            <a href="{{route('admin.setting')}}">
                
                <span class="menu-title" data-i18n="File Manager">Settings</span>
            </a>
            
        </li>
        <li class=" nav-item">
            <a href="#">
                </i><span class="menu-title" data-i18n="File Manager">Applications</span>
            </a>
            <ul class="#">
                    <li><a href="app-invoice-list.html"></i><span class="menu-item" data-i18n="Invoice List">View All Applications</span></a>
                    </li>
                    <li><a href="app-invoice.html"></i><span class="menu-item" data-i18n="Invoice">Accepted Applications</span></a>
                    </li>
                    <li><a href="app-invoice-edit.html"></i><span class="menu-item" data-i18n="Invoice Edit">Rejected Application</span></a>
                    </li>
                    <li><a href="app-invoice-add.html"></i><span class="menu-item" data-i18n="Invoice Add">Meeting Schedules</span></a>
                    </li>
            </ul>
        </li>
        <li class=" nav-item">
                <a href="#">
                    </i><span class="menu-title" data-i18n="File Manager">Team</span>
                </a>
                <ul class="#">
                        <li><a href="{{route('add_team_member')}}"></i><span class="menu-item" data-i18n="Invoice List">Add Member</span></a>
                        </li>
                        <li><a href="{{route('add_team')}}"></i><span class="menu-item" >Add Team</span></a>
                        </li>
                        <li><a href="{{route('manage_team')}}"></i><span class="menu-item" data-i18n="Invoice Edit">Manage</span></a>
                        </li>
                        <li><a href="{{route('current_team_view')}}"></i><span class="menu-item" data-i18n="Invoice Edit">Current View</span></a>
                        </li>
                        
                </ul>
            </li>
        <li class=" nav-item">
            <a href="#">
            <span class="menu-title" data-i18n="File Manager">Job</span>
            </a>
            <ul class="menu-content">
                    <li><a href="{{route('addjob')}}"></i><span class="menu-item" data-i18n="Invoice List">Add A Job</span></a>
                    </li>
                    <li><a href="{{route('joblist')}}"></i><span class="menu-item" data-i18n="Invoice">Job List</span></a>
                    </li>
                    <li><a href="{{route('addexam')}}"></i><span class="menu-item" data-i18n="Invoice">Add Exam</span></a>
                    </li>
                    <li><a href="{{route('exams')}}"></i><span class="menu-item" data-i18n="Invoice">Exams</span></a>
                    </li>
                    
            </ul>
        </li>
        <li class=" nav-item">
            <a href="{{route('config')}}">
            <span class="menu-title" data-i18n="File Manager">Configuration</span>
        
            </a>
        </li>
        <li class=" nav-item">
            <a href="app-file-manager.html">
                <span class="menu-title" data-i18n="File Manager">User Activites</span>
            </a>
        </li>
        <li class=" nav-item">
                <a href="{{url('logout')}}">
                    <span class="menu-title" data-i18n="File Manager">Logout</span>
                </a>
        </li>
        
      </ul>