 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
         <div class="sidebar-brand-icon">
             <img src="{{asset('asset_backend/img/logo.png')}}" class="img-fluid" alt="logo dishub" width="35" />
         </div>
         <div class="sidebar-brand-text mx-3">AMSDRENSTRA Dishub</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{route('home')}}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Menu
     </div>

     <li class="nav-item {{ Route::is('penerbangan.index') || Route::is('pesawat.edit') || Route::is('penumpangpesawat.edit') || Route::is('pelabuhan.index')  ? 'active' : ''  }}">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDt" aria-expanded="true" aria-controls="collapseTs">
             <i class="fas fa-atlas"></i>
             <span>Data Transportasi</span>
         </a>
         <div id="collapseDt" class="collapse {{ Route::is('penerbangan.index') || Route::is('pesawat.edit') || Route::is('penumpangpesawat.edit') || Route::is('pelabuhan.index')  ? 'show' : ''  }}" aria-labelledby="headingTs" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Route::is('penerbangan.index') || Route::is('pesawat.edit') || Route::is('penumpangpesawat.edit')  ? 'active' : ''  }}" href="{{route('penerbangan.index')}}">Data Penerbangan</a>
                 <a class="collapse-item {{ Route::is('pelabuhan.index') || Route::is('pesawat.edit') || Route::is('penumpangpesawat.edit')  ? 'active' : ''  }}" href="{{route('pelabuhan.index')}}">Data pelabuhan</a>
             </div>
         </div>
     </li>
     <!-- Nav Item - Pages Collapse Transaksi Surat -->
     <li class="nav-item {{ Route::is('renstra.index') || Route::is('renstra.edit')  ? 'active' : ''  }}">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRs" aria-expanded="true" aria-controls="collapseTs">
             <i class="fas fa-book-open"></i>
             <span>Renstra</span>
         </a>
         <div id="collapseRs" class="collapse {{ Route::is('renstra.index') || Route::is('renstra.edit')  ? 'show' : ''  }}" aria-labelledby="headingTs" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Route::is('renstra.index') || Route::is('renstra.edit')  ? 'active' : ''  }}" href="{{route('renstra.index')}}">Data Renstra</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Pages Collapse Transaksi Surat -->
     <li class="nav-item {{ Route::is('surat-masuk.index') || Route::is('surat-keluar.index') || Route::is('disposisi.index') || Route::is('disposisi.edit') ? 'active' : ''  }}">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTs" aria-expanded="true" aria-controls="collapseTs">
             <i class="fas fa-envelope"></i>
             <span>Transaksi Surat</span>
         </a>
         <div id="collapseTs" class="collapse {{ Route::is('surat-masuk.index') || Route::is('surat-keluar.index') || Route::is('disposisi.index') || Route::is('disposisi.edit') ? 'show' : ''  }}" aria-labelledby="headingTs" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Route::is('surat-masuk.index') || Route::is('disposisi.index') || Route::is('disposisi.edit') ? 'active' : ''  }}" href="{{route('surat-masuk.index')}}">Surat Masuk</a>
                 <a class="collapse-item {{ Route::is('surat-keluar.index') ? 'active' : ''  }}" href="{{route('surat-keluar.index')}}">Surat Keluar</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - pages Collapse Buku Agenda -->
     <li class="nav-item {{ Route::is('agenda-suratmasuk.index') || Route::is('agenda-suratkeluar.index') || Route::is('agenda-suratmasuk.periode') || Route::is('agenda-suratkeluar.periode') ? 'active' : ''  }}">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBa" aria-expanded="true" aria-controls="collapseBa">
             <i class="fas fa-book"></i>
             <span>Buku Agenda</span>
         </a>
         <div id="collapseBa" class="collapse {{ Route::is('agenda-suratmasuk.index') || Route::is('agenda-suratkeluar.index') || Route::is('agenda-suratmasuk.periode') || Route::is('agenda-suratkeluar.periode') ? 'show' : ''  }}" aria-labelledby="headingBa" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Route::is('agenda-suratmasuk.index') || Route::is('agenda-suratmasuk.periode') ? 'active' : ''  }}" href="{{route('agenda-suratmasuk.index')}}">Surat Masuk</a>
                 <a class="collapse-item {{ Route::is('agenda-suratkeluar.index') || Route::is('agenda-suratkeluar.periode') ?  'active' : ''  }}" href="{{route('agenda-suratkeluar.index')}}">Surat Keluar</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - pages Galeri File -->
     <li class="nav-item {{ Route::is('galeri.masuk') ||  Route::is('galeri.keluar') || Route::is('galerimasuk.periode') || Route::is('galerikeluar.periode') || Route::is('detail.masuk') || Route::is('detail.keluar')    ? 'active' : ''  }}">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGf" aria-expanded="true" aria-controls="collapseGf">
             <i class="fas fa-file"></i>
             <span>Galeri File</span>
         </a>
         <div id="collapseGf" class="collapse {{ Route::is('galeri.masuk') ||  Route::is('galeri.keluar') || Route::is('galerimasuk.periode') || Route::is('galerikeluar.periode') || Route::is('detail.masuk') || Route::is('detail.keluar')   ? 'show' : ''  }}" aria-labelledby="headingGf" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{Route::is('galeri.masuk') || Route::is('galerimasuk.periode') || Route::is('detail.masuk') ? 'active' : ''  }}" href="{{ route('galeri.masuk') }}">Surat Masuk</a>
                 <a class="collapse-item {{Route::is('galeri.keluar') || Route::is('galerikeluar.periode') || Route::is('detail.keluar') ? 'active' : ''  }}" href="{{ route('galeri.keluar') }}">Surat Keluar</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Referensi -->
     <li class="nav-item {{ Route::is('referensi.index') ? 'active' : ''  }} ">
         <a class="nav-link" href="{{route('referensi.index')}}">
             <i class="fas fa-bookmark"></i>
             <span>Referensi</span></a>
     </li>

     <div class="sidebar-heading">
         Setting
     </div>
     <li class="nav-item {{ Route::is('user.index') ? 'active' : ''  }} ">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSet" aria-expanded="true" aria-controls="collapseTs">
             <i class="fas fa-wrench"></i>
             <span>Setting</span>
         </a>
         <div id="collapseSet" class="collapse {{ Route::is('user.index') ? 'show' : ''  }} " aria-labelledby="collapseSet" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ Route::is('user.index') ? 'active' : ''  }}" href="{{route('user.index')}}">User</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">


     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>