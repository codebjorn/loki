<html>
<head>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  {{  wp_head()  }}
</head>
<body @php(body_class())>
@include('partials.header')

<main class="main">
  @yield('content')
</main>

@hasSection('sidebar')
  <aside class="sidebar">
    @yield('sidebar')
  </aside>
@endif

@include('partials.footer')
</body>
</html>