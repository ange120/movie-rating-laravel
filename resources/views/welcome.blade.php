<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body>
<div class="container">
    <h1 class="text-center">Ласкаво просимо на сайт для оцінки фільмів</h1>

    <form method="POST" action="{{route('listRegion')}}">
        @csrf
        <div class="form-group text-center">
            <label style="margin-top: 1%" for="region">Оберіть регіон:</label>
            <select class="form-control smaller-select" name="region" id="region" required>
                <option value="" disabled selected hidden="hidden">Вибір</option>
                @foreach($lists as $code => $state)
                    <option value="{{$code}}">{{$state}}</option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Вибрати</button>
        </div>
    </form>
</div>
@include('layouts.footer')
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('#region').select2();
        });
    });
</script>
</body>
</html>
