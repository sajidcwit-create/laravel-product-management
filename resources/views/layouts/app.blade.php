<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Product Management')</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f8; color: #222; }
        .container { max-width: 960px; margin: 0 auto; padding: 20px; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #2e75b6; color: #fff; }
        .card { background: #fff; padding: 16px; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,.1); margin-bottom: 16px; }
        .btn { display: inline-block; padding: 8px 14px; background: #2e75b6; color: #fff; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
        .alert-success { background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 16px; }
        .alert-info { background: #d1ecf1; color: #0c5460; padding: 10px; border-radius: 4px; margin-bottom: 16px; }
        .stats { display: flex; gap: 16px; flex-wrap: wrap; }
        .stat-box { flex: 1; min-width: 150px; background: #fff; padding: 16px; border-radius: 6px; text-align: center; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
        .stat-box h2 { margin: 0; color: #2e75b6; }
        form .field { margin-bottom: 12px; }
        label { display: block; margin-bottom: 4px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
    </style>
</head>
<body>

    @include('partials.header')
    @include('partials.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')

</body>
</html>
