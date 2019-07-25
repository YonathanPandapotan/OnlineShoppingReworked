<html>
    <head>
        <title>Register Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style type="text/css">
            body{
                margin: 0;
                font-size: .9rem;
                font-weight: 400;
                line-height: 1.6;
                color: #212529;
                text-align: left;
                background-color: #f5f8fa;
            }
            .button {
                background-color: #4d4dff;
                border: none;
                color: white;
                padding: 10px 90px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
                transition: all 0.5s;
                cursor: pointer;
                margin: 5px;
                }

                .button span {
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.5s;
                }

                .button span:after {
                content: '\00bb';
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
                }

                .button:hover span {
                padding-right: 25px;
                }

                .button:hover span:after {
                opacity: 1;
                right: 0;
                }

            .navbar-label
            {
                box-shadow: 0 2px 4px rgba(0,0,0,.04);
            }

            .navbar-brand , .nav-link, .my-form, .login-form
            {
                font-family: Raleway, sans-serif;
            }

            .my-form
            {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }

            .my-form .row
            {
                margin-left: 0;
                margin-right: 0;
                color: #212529;
            }

            .login-form
            {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }

            .login-form .row
            {
                margin-left: 0;
                margin-right: 0;
            }
        </style>
    </head>
    <body >
    <nav class="navbar navbar-expand-lg navbar-light navbar-label">
    <div class="container">
        <a class="navbar-brand" href="#">TokoKomputer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register akun baru</div>
                    <div class="card-body">
                        <form action="/daftarBaru" method="POST">
                        
                        <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                <input name="username" class="form-control" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input  name="email" type="email" class="form-control" placeholder="Enter email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                </div>
                            </div>

                            <div class="offset-md-5">
                                <button type="submit" class="button">
                                    <span>Register</span>
                                </button>
                                <!-- <a href="/daftarBaru" class="btn btn-link">
                                    Belum punya akun ? daftar
                                </a> -->
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
    <!-- <div class="container">
        <div class="alert alert-danger" role="alert" id="alert" style="display:none;">
            A simple danger alert—check it out!
        </div>
        <div class="main-content" style="height: 100%;">
        <h3>Anda sedang berada di halaman pendaftaran baru</h3>
        <h5>Silahkan masukkan data-data yang dibutuhkan</h3>
        <div class="row">
            <div class="col-md-6" style="margin: auto;">
                <form action="/daftarBaru" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input name="email" type="email" class="form-control" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>        
    </div> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>