<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="logo1.png" />
  <link rel="stylesheet" href="../admin.css" />
  <link
	href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
			rel="stylesheet"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin </title>
</head>
<body>
  <div class="sidebar">
     <div class="logo-details">
	   <i class=" "></i> 
	   <span class="logo_name">Rekomendasi Wisata</span>
     </div>
	<ul class="nav-links">
	   <li>
		<a href="Dashboard.php">
		   <i class="bx bx-grid-alt"></i>
		   <span class="links_name">Dashboard</span>
		</a>
	   </li>
	   <li>
		<a href="">
		   <i class="bx bx-box" ></i>
		   <span class="links_name">Data Kreteria</span>
		</a>
	   </li>
	   <li>
	      <a href="{{route('data_alternatif.alternatif')}}">
		   <i class="bx bx-box"></i>
		   <span class="links_name">Data Alternatif</span>
		</a>
	   </li>
	   <li>
		<a href="">
		 <i class="bx bx-box"></i>
		 <span class="links_name">Perhitungan</span>
	  </a>
	 </li>
	   <li>
		<a href="#">
		   <i class="bx bx-log-out"></i>
		   <span class="links_name">Log out</span>
		</a>
	   </li>
	</ul>
   </div>
   <section class="home-section">
	<nav >
	   <div class="sidebar-button">
		<i class="bx bx-menu sidebarBtn"></i>
	   </div>
	   <div class="profile-details">
	      <span class="admin_name">Admin </span>
	   </div>
	</nav>
	<div class="home-content">
		@yield('content')
	</div>
   </section> 
</body>
</html>
