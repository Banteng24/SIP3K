<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{url('public/template/admin')}}/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{url('public/template/admin')}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="{{url('public/template/admin')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="{{url('public/template/admin')}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{url('public/template/admin')}}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{url('public/template/admin')}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{url('public/template/admin')}}/assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{url('public/template/admin')}}/assets/js/pace.min.js"></script>
	<script src="https://unpkg.com/feather-icons"></script>

	<!-- Bootstrap CSS -->
	<link href="{{url('public/template/admin')}}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<link href="{{url('public/template/admin')}}/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{url('public/template/admin')}}/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="{{url('public/template/admin')}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
	<link href="{{url('public/template/admin')}}/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
	<link href="{{url('public/template/admin')}}/https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{url('public/template/admin')}}/assets/css/app.css" rel="stylesheet">
	<link href="{{url('public/template/admin')}}/assets/css/icons.css" rel="stylesheet">
	
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{url('public/template/admin')}}/assets/css/dark-theme.css" />
	<link rel="stylesheet" href="{{url('public/template/admin')}}/assets/css/semi-dark.css" />
	<link rel="stylesheet" href="{{url('public/template/admin')}}/assets/css/header-colors.css" />
	<title>Admin - Admin BKPSDM</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
	 <!--start header wrapper-->	
	  <div class="header-wrapper">
		<!--start header -->
		<x-layout-admin.header/>
		<!--end header -->
		<!--navigation-->
		<x-layout-admin.sidebar/>
		<!--end navigation-->
	   </div>
	   <!--end header wrapper-->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="card">
					<div class="card-body">
						{{$slot}}
					</div>
				</div>			
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="{{url('public/template/admin')}}/javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<x-layout-admin.footer/>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{url('public/template/admin')}}/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{url('public/template/admin')}}/assets/js/jquery.min.js"></script>
	<script src="{{url('public/template/admin')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{url('public/template/admin')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{url('public/template/admin')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="{{url('public/template/admin')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{url('public/template/admin')}}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="{{url('public/template/admin')}}/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="{{url('public/template/admin')}}/assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="{{url('public/template/admin')}}/assets/plugins/chartjs/js/Chart.extension.js"></script>
	<script src="{{url('public/template/admin')}}/assets/js/index.js"></script>
	<!--app JS-->
	<script src="{{url('public/template/admin')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{url('public/template/admin')}}/assets/js/app.js"></script>
	<script src="{{url('public/template/admin')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="{{url('public/template/admin')}}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/select2/js/select2.min.js"></script>
	<script>
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	</script>
	<!-- App JS -->
	<script src="assets/js/app.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	<!--app JS-->
	<script src="{{url('public/template/admin')}}/assets/js/app.js"></script>
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="{{url('public/template/admin')}}/assets/js/app.js"></script>
	<script src="{{url('public/template/user')}}/assets/js/jquery.min.js"></script>
	<script>
		feather.replace();
	</script>
	
<!--Password show & hide js -->
<script>
	$(document).ready(function () {
		$("#show_hide_password a").on('click', function (event) {
			event.preventDefault();
			if ($('#show_hide_password input').attr("type") == "text") {
				$('#show_hide_password input').attr('type', 'password');
				$('#show_hide_password i').addClass("bx-hide");
				$('#show_hide_password i').removeClass("bx-show");
			} else if ($('#show_hide_password input').attr("type") == "password") {
				$('#show_hide_password input').attr('type', 'text');
				$('#show_hide_password i').removeClass("bx-hide");
				$('#show_hide_password i').addClass("bx-show");
			}
		});
	});
</script>
	
</body>

</html>