<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mail Abonelik İptali</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="alert-warning">

<center>
        <div class="container mt-4">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <p style="text-align: center;font-size: 15px;"> {{session('success')}}</p>
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif

        <h1>Abonelik İptali</h1>
        <hr>

            <div class="form-group col-md-6 row">
                <img src="/img/more-payroll-bordrolama-tesvik-danismanligi.png" width="50px">
                <br>
                <p class="alert alert-primary">Abonelikten çıkarmak istediğiniz Email adresinizi giriniz ve abonelikten çık butonuna tıklayınız...</p>
                <form action="{{route('mailchimpDelete')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <br>
                        <input class="form-control" type="email" required name="email" placeholder="Email Adresiniz...">
                    </div>
                    <div class="mb-3">
                        <input class="btn btn-outline-danger" type="submit" value="Abonelikten Çık">
                    </div>
                </form>
            </div>
        </div>
</center>



</body>
</html>
