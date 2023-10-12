<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="{{ asset('/css/admin-employee-table.css') }}" rel="stylesheet"> 
    @yield('script')  
    
</head>


<body>
    <div class="navbar-container">
        <div class="top-section">
            <div class="profile-section">
                <div class="profile-pic">
                    <img src="images/pexels-pixabay-220453.jpg" alt="Profile Picture">
                </div>
                <div class="profile-details">
                    <h2>Juan Dela Cruz</h2>
                    <p>ADM-001</p>
                </div>
            </div>
        </div>
        <div class="navigation">
            <ul>
                <li><a href="/welcome"><i class="fas fa-user fa-lg"></i> <span>PROFILE</span><div id="link-box-profile" class="link-box"></div></a></li>
                <li>
                    <a href="#"><i class="fas fa-tachometer-alt fa-lg"></i> <span>DASHBOARD</span><div id="link-box-profile" class="link-box"></div></a>
                    
                </li>
                <li class="employee-link">
                    <a href="#"><i class="fas fa-users fa-lg"></i> <span>EMPLOYEES</span><div id="link-box-profile" class="link-box-current"></div></a>
                </li>
                <li><a href="#"><i class="fa-solid fa-table fa-lg"></i> <span>LEAVE REQUESTS</span><div id="link-box-profile" class="link-box"></div></a></li>
                <li id="signoutBtn"><a href="/"><i class="fas fa-sign-out-alt fa-lg"></i> <span>SIGN OUT</span><div id="link-box-profile" class="link-box"></div></a></li>
            </ul>
        </div>
        <div class="logo">
            <img src="images/ayahtek-logo.png" alt="Logo">
        </div>
    </div>
    @yield('content')
    </body>
</html>
<script src="{{ asset('/js/admin-employee-table.js') }}"></script>