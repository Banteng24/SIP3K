<!DOCTYPE html>
<html lang="id">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>User - Admin OPD</title>
	<!--favicon-->
	<link rel="icon" href="{{url('public/template/user')}}/assets/images/favicon-32x32.png" type="image/png" />
	<!-- Vector CSS -->
	<link href="{{url('public/template/user')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<!--plugins-->
	<link href="{{url('public/template/user')}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{url('public/template/user')}}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{url('public/template/user')}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{url('public/template/user')}}/assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{url('public/template/user')}}/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{url('public/template/user')}}/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="{{url('public/template/user')}}/https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{url('public/template/user')}}/assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{url('public/template/user')}}/assets/css/app.css" />
	<link rel="stylesheet" href="{{url('public/template/user')}}/assets/css/dark-sidebar.css" />
	<link rel="stylesheet" href="{{url('public/template/user')}}/assets/css/dark-theme.css" />
		<link href="{{url('public/template/user')}}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('public/template/user')}}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!--sidebar-wrapper-->
		<x-layout.sidebar/>
		<!--end sidebar-wrapper-->
		<!--header-->
		<x-layout.header/>
		<!--end header-->
		<!--page-wrapper-->
			<!--page-content-wrapper-->
				<!--page-content-wrapper-->
				<div class="page-content-wrapper">
					<div class="page-content">
						<div class="card">
							<div class="card-body">
								{{$slot}}
							</div>
						</div>
					</div>
				</div>
				<!--end page-content-wrapper-->
		<!--end page-wrapper-->
		<!--start overlay-->
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="{{url('public/template/user')}}/javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
		<x-layout.footer/>
		<!-- end footer -->
	</div>
	<!--start switcher-->
	
	   <!--end switcher-->
	<!-- JavaScript -->
	<!-- Bootstrap JS -->
	<script src="{{url('public/template/user')}}/assets/js/bootstrap.bundle.min.js"></script>
	
	<!--plugins-->
	<script src="{{url('public/template/user')}}/assets/js/jquery.min.js"></script>
	<script src="{{url('public/template/user')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{url('public/template/user')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{url('public/template/user')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!-- Vector map JavaScript -->
	<script src="{{url('public/template/user')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="{{url('public/template/user')}}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="{{url('public/template/user')}}/assets/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
	<script src="{{url('public/template/user')}}/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
	<script src="{{url('public/template/user')}}/assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
	<script src="{{url('public/template/user')}}/assets/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
	<script src="{{url('public/template/user')}}/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="{{url('public/template/user')}}/assets/js/index2.js"></script>
	<script src="{{url('public/template/user')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<!-- App JS -->
	<script src="{{url('public/template/user')}}/assets/js/app.js"></script>
	{{-- <script>
		$(document).ready(function () {
			//Default data table
			$('#example').DataTable();
			var table = $('#example2').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
			});
			table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
		});
	</script> --}}
	<!-- App JS -->
	<script src="{{url('public/template/user')}}/assets/js/app.js"></script>
	
	

		{{-- <script>
			function loadSearchResult(keyword) {
				if (keyword.length > 1) {
					fetch("/user/pajak/live-search?keyword=" + keyword)

						.then(res => res.text())
						.then(html => {
							document.getElementById('live-search').innerHTML = html;
						})
						.catch(err => {
							console.error('Gagal fetch:', err);
						});
				} else {
					document.getElementById('live-search').innerHTML = '';
				}
			}
		</script> --}}
		
</body>

</html>