<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengajuan - Pengadaan App</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/toastr/toastr.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    @include('parsial.setting')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      @include('parsial.user')

      <!-- Sidebar Menu -->
      @include('parsial.menu')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengajuan Masuk</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Pengajuan Masuk</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Nama Pengadaan</th>
                      <th>Gambar</th>
                      <th>Anggaran (IDR)</th>
                      <th>Proposal</th>
                      <th>Anggaran Pengajuan (IDR)</th>
                      <th>Suplier</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Status Pengajuan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pengajuan as $aju)
                    <tr>
                      <td>{{$aju['nama_pengadaan']}}</td>
                      <td style="width:15%;"><img style="width:70%;" src="{{asset(Storage::url($aju['gambar']))}}"></img></td>
                      <td>{{number_format($aju['anggaran'],0,",",".")}}</td>
                      <td>
                        <a class="btn btn-info" target="_blank" href="{{asset(Storage::url($aju['proposal']))}}"> Lihat Detail</a>
                      <td>{{number_format($aju['anggaran_pengajuan'],0,",",".")}}</td>
                      <td>{{$aju['nama_suplier']}}</td>
                      <td>{{$aju['email_suplier']}}</td>
                      <td>{{$aju['alamat_suplier']}}</td>
                      <td>
                        @if($aju['status_pengajuan'] == 1 )
                        <a href="/terimaPengajuan/{{$aju['id_pengajuan']}}" class="btn btn-success konfirmasi"><i class="fa fa-check"></i>Terima</a>
                        <a href="/tolakPengajuan/{{$aju['id_pengajuan']}}" class="btn btn-danger konfirmasi"><i class="fas fa-times"></i>Tolak</a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    @include('parsial.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- SweetAlert2 -->
<script src="{{asset('adminLTE/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('adminLTE/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('adminLTE/dist/js/adminlte.min.js')}}"></script>
<script type="text/javascript">
$(document).on("click",".konfirmasi",function(event){
  event.preventDefault();
  const url = $(this).attr('href');

  var answer = window.confirm("Kamu yakin ingin memproses Data?");
  if(answer){
    window.location.href = url;
  }else{
  }
});
$(function() {
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  @if(\Session::has('berhasil'))
  Toast.fire({
    icon: 'success',
    title: '{{Session::get('berhasil')}}'
  })
  @endif
  @if(\Session::has('gagal'))
  Toast.fire({
    icon: 'error',
    title: '{{Session::get('gagal')}}'
  })
  @endif
  @if(count($errors) > 0)
  Toast.fire({
    icon: 'error',
    title: '<ul>@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul>'
  })
  @endif

});
</script>

</body>
</html>
