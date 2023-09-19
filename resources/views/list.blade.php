<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-warning" onclick="window.history.back()"> Повернутися до меню</button>
                        <div class="card" style="margin: 5%">

                            <div class="card-header">

                                <h3 class="card-title text-sm-center">Топ фільмів за регіоном <b>{{$info}}</b>  <br>@auth Ви ввійшли в систему як {{ Auth::user()->name }} @endauth </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Мова оригіналу</th>
                                        <th>Назва в оригіналі</th>
                                        <th>Огляд</th>
                                        <th>Популярність</th>
                                        <th>Дата релізу</th>
                                        <th>Середня оцінка</th>
                                        <th>Кількість голосів</th>
                                        <th>Дії</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dataList as $item)
                                        <tr>
                                            <td>{{$item['id']}}</td>
                                            <th>{{$item['original_language']}}</th>
                                            <th>{{$item['original_title']}}</th>
                                            <th>{{$item['overview']}}</th>
                                            <th>{{$item['popularity']}}</th>
                                            <th>{{$item['release_date']}}</th>
                                            <th>{{$item['vote_average']}}</th>
                                            <th>{{$item['vote_count']}}</th>
                                            <td>
                                                @auth
                                                    <div class="btn-group" role="group" aria-label="Опції оцінки">
                                                        <a href="{{ route('movies.editRating', $item['id']) }}" class="btn btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('movies.rate', $item['id']) }}" class="btn btn-success">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                        <form action="{{ route('movies.deleteRating', $item['id']) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                @else
                                                    <a href="{{ route('movies.rate', $item['id']) }}" class="btn btn-primary">Увійти</a>
                                                @endauth
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Original Language</th>
                                        <th>Original Title</th>
                                        <th>Overview</th>
                                        <th>Popularity</th>
                                        <th>Release Date</th>
                                        <th>Vote Average</th>
                                        <th>Vote Count</th>
                                        <th>Дії</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
</div>

@include('layouts.footer_table')
@include('layouts.modal')

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "lengthMenu": [10, 25, 50, 100],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    });
    document.getElementById('showLogin').addEventListener('click', function() {
        document.querySelector('.modal-body .auth-form.login-form').classList.add('active');
        document.querySelector('.modal-body .auth-form.register-form').classList.remove('active');
    });

    document.getElementById('showRegister').addEventListener('click', function() {
        document.querySelector('.modal-body .auth-form.login-form').classList.remove('active');
        document.querySelector('.modal-body .auth-form.register-form').classList.add('active');
    });

    $(document).ready(function () {
        $('#loginBtn').click(function (e) {
            e.preventDefault();

            let email = $('.login-form input[name="email"]').val();
            let password = $('.login-form input[name="password"]').val();

            $.ajax({
                type: 'POST',
                url: '{{ route("login") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    email: email,
                    password: password
                },
                success: function (data) {
                    if (data.success) {

                    } else {
                        $('.alert-danger').html(data.message).show();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#registerBtn').click(function (e) {
            e.preventDefault();

            let email = $('.register-form input[name="email"]').val();
            let password = $('.register-form input[name="password"]').val();
            let confirmPassword = $('.register-form input[name="confirm_password"]').val();

            $.ajax({
                type: 'POST',
                url: '{{ route("register") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    email: email,
                    password: password,
                    confirm_password: confirmPassword
                },
                success: function (data) {
                    if (data.success) {

                    } else {
                        $('.alert-danger').html(data.message).show();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
