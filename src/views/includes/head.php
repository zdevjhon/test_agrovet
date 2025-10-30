<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title><?= $_ENV['TITLE'] ?></title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="<?=$_ENV['HOST']?>assets/img/favicon.ico" rel="icon">
<link href="<?=$_ENV['HOST']?>assets/img/favicon.ico" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- plugins CSS Files -->
<link href="<?=$_ENV['HOST']?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/cerulean/bootstrap.min.css" rel="stylesheet">
<link href="<?=$_ENV['HOST']?>assets/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="<?=$_ENV['HOST']?>assets/plugins/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="<?=$_ENV['HOST']?>assets/plugins/quill/quill.snow.css" rel="stylesheet">
<link href="<?=$_ENV['HOST']?>assets/plugins/quill/quill.bubble.css" rel="stylesheet">
<link href="<?=$_ENV['HOST']?>assets/plugins/remixicon/remixicon.css" rel="stylesheet">
<link href="<?=$_ENV['HOST']?>assets/plugins/simple-datatables/style.css" rel="stylesheet">

<link href="<?=$_ENV['HOST']?>assets/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Template Main CSS File -->
<link href="<?=$_ENV['HOST']?>assets/css/style.css" rel="stylesheet">

<style>
    .modal-header {
        background-color: #dbdbdb;
    }
    .modal-title{
        font-weight: bold;
        font-family: system-ui;
    }

    /*body {
        background-image: linear-gradient(#17082e 0%, #1a0933 7%, #1a0933 80%, #0c1f4c 100%);
        text-shadow: 0 0 1px rgba(50, 251, 226, 0.3), 0 0 2px rgba(50, 251, 226, 0.3), 0 0 5px rgba(50, 251, 226, 0.2);
    }*/
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        display: none;
    }

    .spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>