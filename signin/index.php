<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sate Mafaza - Sign In</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>

    <?php session_start() ?>

    <?php
        if (isset($_GET['state'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_GET['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
    ?>

    <div class="content-4-1 d-flex flex-column align-items-center h-100 flex-lg-row"
         style="font-family: 'Poppins', sans-serif">
        <div class="position-relative d-none d-lg-block h-100 width-left">
            <img class="position-absolute img-fluid centered"
                 src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content3/Content-3-11.png"
                 alt="" />
        </div>
        <div class="d-flex mx-auto align-items-left justify-content-left width-right mx-lg-0">
            <div class="right mx-lg-0 mx-auto">
                <div class="align-items-center justify-content-center d-lg-none d-flex">
                    <img class="img-fluid"
                         src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content3/Content-3-11.png"
                         alt="" />
                </div>
                <h2 class="title-text">Sign In to continue</h2>
                <p class="caption-text">
                    Please sign in using that account has<br />
                    registered on the website.
                </p>
                <form style="margin-top: 1.5rem" action="action_login.php" method="post">
                    <div style="margin-bottom: 1.75rem">
                        <label for="inputUsername" class="d-block input-label">Email Address</label>
                        <div class="d-flex w-100 div-input">
                            <svg class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M12,12 C9.790861,12 8,10.209139 8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 C16,10.209139 14.209139,12 12,12 Z M12,15 C15.1858467,15 18.0454815,15.5712647 20,18.0625268 C20,18.7758847 20,19.4217091 20,20 C9.33333333,20 4,20 4,20 C4,20 4,19.1325637 4,18.0625268 C5.95451855,15.5712647 8.81415326,15 12,15 Z" id="Shape"
                                    fill="#CACBCE"/>
                            </svg>

                            <input class="input-field border-0" type="text" name="username" id="inputUsername" placeholder="Your Username" autocomplete="on" required
                                <?php
                                    if (isset($_GET['username'])) {
                                        $username = $_GET['username'];
                                        echo "value=$username";
                                    }
                                ?>
                            />
                        </div>
                    </div>
                    <div style="margin-top: 1rem">
                        <label for="inputPassword" class="d-block input-label">Password</label>
                        <div class="d-flex w-100 div-input">
                            <svg class="icon" style="margin-right: 1rem" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.81592 4.25974C7.12462 5.48872 7 6.95088 7 8H6C4.34315 8 3 9.34315 3 11V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V11C21 9.34315 19.6569 8 18 8L17 7.99998C17 6.95087 16.8754 5.48871 16.1841 4.25973C15.829 3.62845 15.3194 3.05012 14.6031 2.63486C13.8875 2.22005 13.021 2 12 2C10.979 2 10.1125 2.22005 9.39691 2.63486C8.68058 3.05012 8.17102 3.62845 7.81592 4.25974ZM9.55908 5.24026C9.12538 6.01128 9 7.04912 9 8H15C15 7.04911 14.8746 6.01129 14.4409 5.24027C14.2335 4.87155 13.9618 4.57488 13.6 4.36514C13.2375 4.15495 12.729 4 12 4C11.271 4 10.7625 4.15495 10.4 4.36514C10.0382 4.57488 9.76648 4.87155 9.55908 5.24026ZM14 14C14 14.7403 13.5978 15.3866 13 15.7324V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V15.7324C10.4022 15.3866 10 14.7403 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14Z"
                                      fill="#CACBCE" />
                            </svg>
                            <input class="input-field border-0" type="password" name="password" id="inputPassword"
                                   placeholder="Your Password" minlength="6" required />
                            <div onclick="togglePassword()">
                                <svg style="margin-left: 0.75rem; cursor: pointer" width="20" height="14" viewBox="0 0 20 14"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path id="icon-toggle" fill-rule="evenodd" clip-rule="evenodd"
                                          d="M0 7C0.555556 4.66667 3.33333 0 10 0C16.6667 0 19.4444 4.66667 20 7C19.4444 9.52778 16.6667 14 10 14C3.31853 14 0.555556 9.13889 0 7ZM10 5C8.89543 5 8 5.89543 8 7C8 8.10457 8.89543 9 10 9C11.1046 9 12 8.10457 12 7C12 6.90536 11.9934 6.81226 11.9807 6.72113C12.2792 6.89828 12.6277 7 13 7C13.3608 7 13.6993 6.90447 13.9915 6.73732C13.9971 6.82415 14 6.91174 14 7C14 9.20914 12.2091 11 10 11C7.79086 11 6 9.20914 6 7C6 4.79086 7.79086 3 10 3C10.6389 3 11.2428 3.14979 11.7786 3.41618C11.305 3.78193 11 4.35535 11 5C11 5.09464 11.0066 5.18773 11.0193 5.27887C10.7208 5.10171 10.3723 5 10 5Z"
                                          fill="#CACBCE" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-fill text-black d-block w-100" type="submit">
                        Sign In To My Account
                    </button>
                </form>
            </div>
        </div>
    </div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="signin.js"></script>
</body>
</html>