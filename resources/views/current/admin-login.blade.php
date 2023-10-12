<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin-login.css">

    <title>Admin Login</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="d-flex bg-white shadow-lg flex-column box-area">
            <div class="d-flex flex-column align-items-center">
                <div class="featured-logo mb-5 mt-5">
                <img src="images/ayahtekLogo.png" class="img-fluid">
            </div>
            <form action="/employeetable" class="needs-validation" novalidate>
                <div class="input-group mb-4 has-validation" id="input">
                    <span class="input-group-text" id="basic-addon1"><svg width="15" height="16" viewBox="0 0 15 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.5 9C4.99687 9 0 10.34 0 13V16H15V13C15 10.34 10.0031 9 7.5 9ZM13.2188 14.1H1.78125V13C1.78125 12.36 4.71562 10.9 7.5 10.9C10.2844 10.9 13.2188 12.36 13.2188 13V14.1ZM7.5 8C9.57188 8 11.25 6.21 11.25 4C11.25 1.79 9.57188 0 7.5 0C5.42812 0 3.75 1.79 3.75 4C3.75 6.21 5.42812 8 7.5 8ZM7.5 1.9C7.75854 1.9 8.01455 1.95432 8.25341 2.05985C8.49227 2.16539 8.7093 2.32007 8.89212 2.51508C9.07493 2.71008 9.21995 2.94158 9.31889 3.19636C9.41783 3.45115 9.46875 3.72422 9.46875 4C9.46875 4.27578 9.41783 4.54885 9.31889 4.80364C9.21995 5.05842 9.07493 5.28992 8.89212 5.48492C8.7093 5.67993 8.49227 5.83461 8.25341 5.94015C8.01455 6.04568 7.75854 6.1 7.5 6.1C6.97786 6.1 6.4771 5.87875 6.10788 5.48492C5.73867 5.0911 5.53125 4.55695 5.53125 4C5.53125 3.44305 5.73867 2.9089 6.10788 2.51508C6.4771 2.12125 6.97786 1.9 7.5 1.9Z"
                                fill="white" />
                        </svg>

                    </span>
                    <input id="username" type="text" class="form-control fs-6" placeholder="Enter username"
                        aria-label="Username" aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback">
                        Please enter a username.
                    </div>
                </div>
                <div class="input-group mb-4 has-validation" id="input">
                    <span class="input-group-text" id="basic-addon1"><svg width="15" height="16" viewBox="0 0 15 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.125 5.33333H12.1875V3.80952C12.1875 1.70667 10.0875 0 7.5 0C4.9125 0 2.8125 1.70667 2.8125 3.80952V5.33333H1.875C0.84375 5.33333 0 6.01905 0 6.85714V14.4762C0 15.3143 0.84375 16 1.875 16H13.125C14.1563 16 15 15.3143 15 14.4762V6.85714C15 6.01905 14.1563 5.33333 13.125 5.33333ZM4.6875 3.80952C4.6875 2.54476 5.94375 1.52381 7.5 1.52381C9.05625 1.52381 10.3125 2.54476 10.3125 3.80952V5.33333H4.6875V3.80952ZM13.125 14.4762H1.875V6.85714H13.125V14.4762ZM7.5 12.1905C8.53125 12.1905 9.375 11.5048 9.375 10.6667C9.375 9.82857 8.53125 9.14286 7.5 9.14286C6.46875 9.14286 5.625 9.82857 5.625 10.6667C5.625 11.5048 6.46875 12.1905 7.5 12.1905Z"
                                fill="white" />
                        </svg>

                    </span>
                    <input type="password" class="form-control fs-6" placeholder="Enter password" aria-label="Password"
                        aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback">
                        Please enter a password.
                    </div>
                </div>
                <div class="input-group mb-5 justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label"><small id="remember">Remember me</small></label>
                    </div>
                    <div class="forgot">
                        <small><a href="/forgotpassword">Forgot password?</a></small>
                    </div>
                </div>
                <div class="input-group mb-1 justify-content-center">
                    <button type="submit" class="btn btn-lg shadow btn-primary fs-6">LOGIN</button>
                </div>
            </form>
            </div>
            

            <div class="featured-image mt-4">
                <img src="images/wave.png" class="img-fluid float-end" style="width:220px;">
            </div>

        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        document.addEventListener('DOMContentLoaded', () => {
            const forms = document.querySelectorAll('.needs-validation');

            forms.forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });
            });


        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>