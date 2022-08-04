<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entegra</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <span class="brand-text font-weight-light">Entegra Bilişim</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('logout') }}">
                            <i class="fas fa-power-off"></i>
                        </a>
                    </li>
                </ul>
            </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Products <small>v0.1</small></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('product') }}">Products</a></li>
                            <li class="breadcrumb-item active">Product Edit</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">Product Table</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('product.update',$product->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{ $product->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="productCode">Code</label>
                                        <input type="text" class="form-control" id="productCode" name="productCode"
                                               value="{{ $product->productCode }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                               value="{{ $product->quantity }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ route('product') }}" class="btn btn-warning">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <a href="https://github.com/tarikkamat">Tarık KAMAT</a>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('') }}dist/js/adminlte.min.js"></script>

<!-- REQUIRED SCRIPTS -->
@include('sweetalert::alert')

</body>
</html>
