<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>campApp</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        }

        #wrapper {
        display: flex;
        }

        #sidebar {
        width: 250px;
        background-color: #343a40;
        color: #fff;
        padding: 20px;
        height: 100vh;
        }

        #content {
        flex: 1;
        padding: 20px;
        }

        /* Add your custom styles here */

    </style>
    </head>
    <body>

    <div id="wrapper">

    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
        <h3>Minha App</h3>
        </div>
        <ul class="list-unstyled components">
        <li class="active">
            <a href="#home">Home</a>
        </li>
        <li>
            <a href="#page1">Página 1</a>
        </li>
        <li>
            <a href="#page2">Página 2</a>
        </li>
        <!-- Add more menu items as needed -->
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        </nav>

        <!-- Content Goes Here -->

    </div>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Custom JS for sidebar toggle -->
    <script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        });
    });
    </script>

    </body>
</html>