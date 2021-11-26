<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
    <div class="sidebar-brand-icon rotate-n-10">
        <img width="30px" src="{{asset('template1/img/usd.jpg')}}">
    </div>
    <div class="sidebar-brand-text mx-3">USU Society For Debating</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="/index">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
@if(Auth::user()->levelUser == 'admin')
<!-- Heading -->
<div class="sidebar-heading">
    Main Menu
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-globe"></i>
        <span>About Website</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/qna">Question & Answer</a>
            <a class="collapse-item" href="/structure">Organization Structure</a>
        </div>
    </div>
</li>
@if(Auth::user()->levelAdmin == 'master')
<li class="nav-item">
    <a class="nav-link" href="/user">
        <i class="fas fa-fw fa-user-circle"></i>
        <span>Users</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/task_admin">
        <i class="fa fa-tasks"></i>
        <span>Task</span></a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
        aria-expanded="true" aria-controls="collapseFive">
        <i class="fas fa-fw fa-film"></i>
        <span>Gallery</span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/regulartraining">Regular Training</a>
            <a class="collapse-item" href="cards.html">After Glow</a>
            <a class="collapse-item" href="cards.html">Hall Of Fame</a>
        </div>
    </div>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Content
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-folder-open"></i>
        <span>Article</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/all_article">List Article</a>
            <a class="collapse-item" href="/category">Categories</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="/announcement">
        <i class="fas fa-fw fa-bullhorn"></i>
        <span>Announcement</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/all_matter">
        <i class="fas fa-fw fa-book"></i>
        <span>Matters</span></a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
        aria-expanded="true" aria-controls="collapseUtilities2">
        <i class="fas fa-fw fa-th"></i>
        <span>Event</span>
    </a>
    <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities2"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/event">List Events</a>
        </div>
    </div>
</li>
@else(Auth::user()->levelAdmin== 'sekretaris')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
        aria-expanded="true" aria-controls="collapseFive">
        <i class="fas fa-fw fa-film"></i>
        <span>Gallery</span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/regulartraining">Regular Training</a>
            <a class="collapse-item" href="cards.html">After Glow</a>
            <a class="collapse-item" href="cards.html">Hall Of Fame</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
   USD's Data
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="/absensi">
        <i class="fa fa-check-square"></i>
        <span>Absensi</span></a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-users"></i>
        <span>Members</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/active_member">Active Members</a>
            <a class="collapse-item" href="/alumnee">Alumnees</a>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
        aria-expanded="true" aria-controls="collapsePages1">
        <i class="fas fa-fw fa-folder"></i>
        <span>Archive</span>
    </a>
    <div id="collapsePages1" class="collapse" aria-labelledby="headingPages1" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/letter_in">Letter In</a>
            <a class="collapse-item" href="/letter_out">Letter Out</a>
            <a class="collapse-item" href="/reports">Reports</a>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="/task_admin">
        <i class="fa fa-tasks"></i>
        <span>Task</span></a>
</li>
@endif
@else
<div class="sidebar-heading">
    Main Menu
</div>
<li class="nav-item">
    <a class="nav-link" href="/absensi-user">
        <i class="fa fa-check-square"></i>
        <span>Attendance</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/task-user">
        <i class="fa fa-tasks"></i>
        <span>Task</span></a>
</li>

@endif

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>