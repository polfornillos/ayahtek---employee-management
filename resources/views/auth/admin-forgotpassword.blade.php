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
            <h4 class="mb-3">Forgot Password</h4>
            <small class="mb-4">Enter email associated with your account and we’ll send you a code to reset your
                password.</small>
            <form action="/verifycode" class="needs-validation" novalidate>
                <div class="input-group mb-3 has-validation" id="input">
                    <span class="input-group-text" id="basic-addon1"><svg width="15" height="12" viewBox="0 0 15 12"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 1.5C15 0.675 14.325 0 13.5 0H1.5C0.675 0 0 0.675 0 1.5V10.5C0 11.325 0.675 12 1.5 12H13.5C14.325 12 15 11.325 15 10.5V1.5ZM13.5 1.5L7.5 5.25L1.5 1.5H13.5ZM13.5 10.5H1.5V3L7.5 6.75L13.5 3V10.5Z"
                                fill="white" />
                        </svg>
                    </span>
                    <input type="email" id="input1" class="form-control fs-6" placeholder="Enter email"
                        aria-label="Email" aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback mb-0">
                        Please enter a valid email.
                    </div>
                </div>
                <div class="input-group mb-3 justify-content-center">
                    <button type="submit" class="btn btn-lg btn-primary shadow fs-6" id="btn"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">SUBMIT</button>
                </div>
                <div class="row mt-5">
                    <div class="d-inline col">
                        <div class="back">
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
                            <small><a href="/">Back to login</a></small>
                        </div>

                    </div>

                    <div class="featured-image col">
                        <img src="images/forgot.png" class="img-fluid" style="width:250px;">
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Modal -->
     <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" center>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content justify-content-center align-items-center">
                <svg class="mt-5" width="64" height="57" viewBox="0 0 64 57" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M62.1728 4.64395L56.5117 1.1276C55.76 0.664894 54.8391 0.492292 53.9491 0.647323C53.059 0.802354 52.2719 1.27248 51.7588 1.95549L24.046 39.3372L11.3076 27.6863C10.664 27.1041 9.79537 26.7775 8.89018 26.7775C7.98499 26.7775 7.11633 27.1041 6.47276 27.6863L1.63791 32.117C1.31998 32.4074 1.06776 32.7523 0.895672 33.132C0.723586 33.5116 0.63501 33.9185 0.63501 34.3295C0.63501 34.7405 0.723586 35.1474 0.895672 35.5271C1.06776 35.9067 1.31998 36.2516 1.63791 36.542L21.2201 54.4613C22.3208 55.4622 24.0428 56.2353 25.5945 56.2353C27.1462 56.2353 28.7105 55.3411 29.7166 54.0026L63.0843 8.98529C63.5917 8.29873 63.7807 7.45612 63.6099 6.64227C63.439 5.82842 62.9222 5.10978 62.1728 4.64395Z"
                        fill="#22BB33" />
                </svg>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Email sent!</h1>
                </div>
                <div class="modal-body">
                    Successfully sent verification code. Please check your email.
                </div>
                <div class="modal-footer">
                    <a href="/verifycode"><button type="button"
                            class="btn btn-primary shadow">OK</button></a>
                </div>
            </div>
        </div>
    </div>  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
            document.getElementById("btn").addEventListener("click", function() {
            var inputText = document.getElementById("input1").value;
            const modal = document.getElementById("staticBackdrop");
            if (inputText.trim() === "") {
                // Input is empty, do not open the modal
                modal.classList.add('hide');
                console.log(modal);
            } else {
                // Input is not empty, open the modal
                modal.classList.add('show');
                console.log(modal);
            }
        });
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

</body>

</html>