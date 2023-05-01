<nav class="navbar navbar-expand-lg navbar-light bg-gradient" style="background-color: #e3f2fd;">
    <div class="container">
      <a class="navbar-brand" href="/user/dashboard"><i class="bi bi-columns-gap"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/user/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/user/board">Board</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/user/req">Request</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
      @auth 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Welcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/user/dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/user/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>
          </ul>
        </li>
      @else
        <li class="nav-item">
            <a href="/" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
      @endauth
      </ul> 
    </div>
    </div>
</nav>