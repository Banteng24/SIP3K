<x-app>
	@if (session('success'))
	<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
		{{ session('success') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif

	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	  <div class="breadcrumb-title pe-3">Dashboard</div>
	  <div class="ps-3">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb mb-0 p-0">
			<li class="breadcrumb-item"><a href="#"><i class='bx bx-home-alt'></i></a></li>
			<li class="breadcrumb-item active" aria-current="page">Beranda</li>
		  </ol>
		</nav>
	  </div>
	</div>
	<!--end breadcrumb-->
  
	<!-- Welcome Card -->
	<div class="row mb-4">
	  <div class="col-12">
		<div class="card">
		  <div class="card-body p-4">
			<div class="row align-items-center">
			  <div class="col-md-8">
				<h4 class="mb-2">Selamat Datang, <span class="text-primary">{{ Auth::user()->name ?? 'Admin Opd' }}</span>! 👋</h4>
				{{-- <p class="text-muted mb-3">Berikut ini ringkasan aktivitas Anda di sistem Pajak & Cuti.</p> --}}
				<div class="d-flex align-items-center">
				  <div class="me-4">
					<small class="text-muted d-block">Terakhir Login</small>
					<strong>{{ now()->format('d M Y, H:i') }}</strong>
				  </div>
				  <div>
					<small class="text-muted d-block">Status Akun</small>
					<span class="badge bg-success">Aktif</span>
				  </div>
				</div>
			  </div>
			  <div class="col-md-4 text-center">
				<img src="{{url('public/template	/user/assets/images/dinas.jpeg')}}" class="rounded-circle" width="80" height="80" alt="">
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  
	<!-- Fitur Cepat -->
	<div class="row">
	  <div class="col-6">
		<a href="{{ url('user/cuti') }}">
		  <div class="card radius-10 border-start border-0 border-3 border-primary">
			<div class="card-body d-flex align-items-center">
			  <div>
				<p class="mb-0 text-secondary">Permohonan Cuti</p>
				<h5 class="my-1 text-primary">Ajukan Cuti</h5>
			  </div>
			  <div class="widgets-icons-2 bg-gradient-scooter text-white ms-auto">
				<i class='bx bx-calendar'></i>
			  </div>
			</div>
		  </div>
		</a>
	  </div>
	  <div class="col-6">
		<a href="{{ url('user/pajak') }}">
		  <div class="card radius-10 border-start border-0 border-3 border-warning">
			<div class="card-body d-flex align-items-center">
			  <div>
				<p class="mb-0 text-secondary">Laporan Pajak</p>
				<h5 class="my-1 text-warning">Lihat Pajak</h5>
			  </div>
			  <div class="widgets-icons-2 bg-gradient-blooker text-white ms-auto">
				<i class='bx bx-file'></i>
			  </div>
			</div>
		  </div>
		</a>
	  </div>
	</div>
  
	<!-- Ringkasan Aktivitas -->
	<div class="row mt-4">
	  <div class="col-12">
		<div class="card">
		  <div class="card-header">
			<h6 class="mb-0">Aktivitas Terbaru</h6>
		  </div>
		  <div class="card-body">
			<ul class="list-group list-group-flush">
			  <li class="list-group-item">
				<strong>Cuti</strong> - Terakhir pengajuan cuti: <span class="text-muted">{{ $lastCutiDate ?? 'Belum Ada' }}</span>
			  </li>
			  <li class="list-group-item">
				<strong>Pajak</strong> - Laporan terakhir diunggah: <span class="text-muted">{{ $lastPajakDate ?? 'Belum Ada' }}</span>
			  </li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
  
	<style>
	  .widgets-icons-2 {
		width: 50px;
		height: 50px;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 24px;
		border-radius: 50%;
	  }
	</style>
  </x-app>
  