<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin-login.css">
    <title>Admin Forgot Password</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="d-flex bg-white shadow-lg justify-content-center align-items-center flex-column box-area"
            style="width: 500px; padding: 80px 80px 0 80px;">
            <div class="featured-logo mb-5">
                <img src="images/ayahtekLogo.png" class="img-fluid">
            </div>
            <h4 class="mb-3">Enter security code</h4>
            <small class="mb-4">Please check your email for a message with your code. Your code is 6 numbers long. We
                sent your code to: j.delacruz@gmail.com</small>
            <form action="/resetpassword" class="justify-content-center align-items-center needs-validation" novalidate>
                <div class="input-group mb-1 has-validation">
                    <input style="margin:0 50px;" type="number" class="form-control fs-6 text-center"
                        placeholder="Verification code" aria-label="Verification code" aria-describedby="basic-addon1"
                        required>
                    <div class="invalid-feedback mb-0" id="validcode">
                        Please enter valid code.
                    </div>
                </div>
                <div class="resend mb-3 d-flex flex-column align-items-center">
                    <a href="#"><small>Resend code</small></a>
                </div>
                
                <div class="input-group mb-3 justify-content-center">
                    <button type="submit" class="btn btn-lg btn-primary shadow fs-6">CONTINUE</button>
                </div>
            </form>


            <div class="row mt-5">
                <div class="d-inline col">
                    <span><svg width="26" height="24" viewBox="0 0 26 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.6875 11.25H21.9375C22.153 11.25 22.3597 11.329 22.512 11.4697C22.6644 11.6103 22.75 11.8011 22.75 12C22.75 12.1989 22.6644 12.3897 22.512 12.5303C22.3597 12.671 22.153 12.75 21.9375 12.75H5.6875C5.47201 12.75 5.26535 12.671 5.11298 12.5303C4.9606 12.3897 4.875 12.1989 4.875 12C4.875 11.8011 4.9606 11.6103 5.11298 11.4697C5.26535 11.329 5.47201 11.25 5.6875 11.25Z"
                                fill="#096F6F" />
                            <path
                                d="M6.02388 12L12.7628 18.219C12.9153 18.3598 13.001 18.5508 13.001 18.75C13.001 18.9491 12.9153 19.1401 12.7628 19.281C12.6102 19.4218 12.4033 19.5009 12.1875 19.5009C11.9717 19.5009 11.7648 19.4218 11.6123 19.281L4.29975 12.531C4.22409 12.4613 4.16406 12.3785 4.1231 12.2874C4.08213 12.1963 4.06105 12.0986 4.06105 12C4.06105 11.9013 4.08213 11.8036 4.1231 11.7125C4.16406 11.6214 4.22409 11.5386 4.29975 11.469L11.6123 4.71897C11.7648 4.57814 11.9717 4.49902 12.1875 4.49902C12.4033 4.49902 12.6102 4.57814 12.7628 4.71897C12.9153 4.8598 13.001 5.05081 13.001 5.24997C13.001 5.44913 12.9153 5.64014 12.7628 5.78097L6.02388 12Z"
                                fill="#096F6F" />
                        </svg>
                    </span>
                    <a href="/"><small>Back to login</small></a>
                </div>

                <div class="featured-image col">
                    <img src="images/forgot.png" class="img-fluid" style="width:250px;">
                </div>
            </div>
        </div>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>