<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="logo1.png" />
  <link rel="stylesheet" href="../admin.css" />
  <link
	href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
			rel="stylesheet"/>
			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin </title>
</head>
<body>
	<div class="wrapper">
		<div id="sidebar" class="sidebar">
			<div class="logo-details">
				<i class='bx bxs-analyse'></i>
			  <span class="logo_name">Rekomendasi Wisata</span>
			</div>
		   <ul class="nav-links">
			  <li>
			   <a href="{{route('dashboard')}}">
				  <i class="bx bx-grid-alt"></i>
				  <span class="links_name">Dashboard</span>
			   </a>
			  </li>
			  <li>
			   <a href="{{route('kriteria.kriteria')}}">
				<i class='bx bxl-stack-overflow'></i>
				  <span class="links_name">Data Kreteria</span>
			   </a>
			   
			  </li>
			  <li>
			   <a href="{{route('sub_kriteria.sub_kriteria')}}">
				  <i class="bx bx-box" ></i>
				  <span class="links_name">Sub Kreteria</span>
			   </a>
			  </li>
			  <li>
				 <a href="{{route('alternatif.alternatif')}}">
					<i class='bx bx-wind'></i>
				  <span class="links_name">Alternatif</span>
			   </a>
			  </li>
			  <li>
				 <a href="{{route('nilai_alternatif.nilai_alternatif')}}">
					<i class='bx bx-detail' ></i>
				  <span class="links_name">Nilai Alternatif</span>
			   </a>
			  </li>
			  <li>
			   <a href="{{route('perhitungan.perhitungan')}}">
				<i class='bx bx-bar-chart-square' ></i>
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
			   <div class="sidebar-button" onclick="toggleSidebar()">
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
	</div>
  
   
   <script>
	function toggleSidebar() {
	  const sidebar = document.getElementById("sidebar");
	  sidebar.classList.toggle("active"); // toggle class 'active'
	}
  </script>
  <script>
	function toggleSidebar() {
	  const sidebar = document.getElementById("sidebar");
	  const icon = document.querySelector(".sidebarBtn");
	  sidebar.classList.toggle("active");
	  icon.classList.toggle("bx-menu");
	  icon.classList.toggle("bx-x");
	}
  </script>
</body>
</html>
