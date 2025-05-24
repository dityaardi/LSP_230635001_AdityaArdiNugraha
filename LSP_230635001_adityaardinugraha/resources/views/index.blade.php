<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>TO DO LIST APPS</title>
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3 col-lg-10">
                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">TO DO LIST</h5>
                                    </div>
                                </div>
                            </div>


                            @foreach($tasks as $task)
                            <div class="card mb-3 col-lg-10">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $task->nama }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Status: {{ $task->status }}</h6>
                                    @if($task->status == 'Belum')
                                    <form action="/finish/{{$task->id}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('POST')
                                        <input class="form-check-input" type="checkbox" id="gridCheck{{$task->id}}" onchange="this.form.submit()">
                                        <label class="form-check-label" for="gridCheck{{$task->id}}">
                                            Selesaikan
                                        </label>
                                    </form>
                                    @else
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle-fill"></i> Selesai
                                    </span>
                                    <form action="/delete/{{$task->id}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('POST')
                                        <input class="form-check-input" type="checkbox" id="gridCheck{{$task->id}}" onchange="this.form.submit()">
                                        <label class="form-check-label" for="gridCheck{{$task->id}}">
                                            Hapus
                                        </label>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            @endforeach

                            <div class="card mb-3 col-lg-10">
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addtask">Add Task</a>
                            </div>
                            <div class="modal fade" id="addtask" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Task</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/addtask" method="post">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="yourName" class="form-label">Nama Task</label>
                                                    <input type="text" name="nama" class="form-control" id="yourName" required>
                                                    <div class="invalid-feedback">Nama Task</div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>