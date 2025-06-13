<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogger Admin Panel</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #0d6efd;
            color: white;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 5px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .main-content {
            background: #f8f9fa;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            border-left: 4px solid #0d6efd;
        }

        .form-control,
        .form-select {
            border-radius: 0.5rem;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
        }

        /* Adjust main content padding to prevent footer overlap */
        .main-content {
            padding-bottom: 60px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            @include('admin.partials.sidebar')

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">

                @include('admin.partials.header')

                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <x-admin.card label="Total Posts" count="128" icon="bi-file-earmark-post" />
                    </div>
                    <div class="col-md-4">
                        <x-admin.card label="Categories" count="12" icon="bi-collection" />
                    </div>
                    <div class="col-md-4">
                        <x-admin.card label="Tags" count="128" icon="bi-tags" />
                    </div>
                </div>

                @yield('content')

            </main>
        </div>
    </div>

    @include('admin.partials.footer')

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>