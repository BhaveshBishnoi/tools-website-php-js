<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools TechXAlt - All-in-One Online Tools</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/tools/assets/img/favicon.ico">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        .hover-shadow-lg {
            transition: all 0.3s ease;
        }
        .hover-shadow-lg:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
        }
        .icon-box {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(220, 53, 69, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
        .nav-link {
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #DC3545;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: white;
                padding: 1rem;
                border-radius: 8px;
                box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
                margin-top: 1rem;
            }
        }
        body { font-family: 'Inter', sans-serif; }
        .navbar { box-shadow: 0 2px 4px rgba(0,0,0,.08); }
        .navbar-brand { font-weight: 700; }
        .nav-link { font-weight: 500; }
        .dropdown-item { padding: .5rem 1rem; }
        .navbar-tool-icon { font-size: 1.25rem; margin-right: 0.5rem; }
    </style>
</head>
<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/tools">
                <span class="text-danger">Tools</span>.Dev
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/tools/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="toolsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tools
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="toolsDropdown">
                            <li><a class="dropdown-item" href="/tools/pdf-tools/">PDF Tools</a></li>
                            <li><a class="dropdown-item" href="/tools/image-tools/">Image Tools</a></li>
                            <li><a class="dropdown-item" href="/tools/seo-tools/">SEO Tools</a></li>
                            <li><a class="dropdown-item" href="/tools/youtube-tools/">YouTube Tools</a></li>
                            <li><a class="dropdown-item" href="/tools/other-tools/">Other Tools</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about/">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact/">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Add padding for fixed navbar -->
    <div style="padding-top: 76px;"></div>
    <main class="container py-4">