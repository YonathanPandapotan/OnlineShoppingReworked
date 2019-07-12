<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>List Barang</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .adder{
                display: none;
            }
        </style>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Toko Komputer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/listBarang">List Barang <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/keranjangAnda">Keranjang Anda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Transaksi Anda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logOut">Logout</a>
            </li>
            </ul>
        </div>
    </nav>

    <?php
        foreach($barang as $data){?>
        <div class="card" style="width: 18rem; display:inline-block; ">
            <div class="card-body">
                <h2 class="card-title"><?php echo $data['namaBarang'];?></h2>
                <p>Id Barang: <?php echo $data['idBarang'];?></p>
                <p>Ketersediaan Barang <?php echo $data['jumlahBarang'];?></p>
                <p>Deskripsi: <?php echo $data['deskripsi'];?></p>
                <p>Ketersediaan Barang</p>
                <?php
                    foreach($stock as $stockData){
                        if($stockData['idBarang'] == $data['idBarang']){
                            ?>
                            <p><?php echo $stockData['namaKantor']?> : <?php echo $stockData['jumlah']?></p>
                            <?php
                        }
                    }
                ?>
                <form action="/listBarang" method="POST">
                <button type="button" class="btn btn-primary" onClick = "showAdder(<?php echo $data['idBarang'];?>);">Tambah ke keranjang</button>
                <input style="display:none;" name="idBarang" value=<?php echo $data['idBarang'];?>>
                <div class="adder" id=<?php echo $data['idBarang'];?>>
                    Jumlah barang: <input type="number" name="jumlahBarang" min="1" max="1000" value="1">
                    <input class="btn btn-primary" type="submit" name="submit" value="Tambah Keranjang">
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Beli Barang">
                </form>
            </div>
        </div>
    <?php } ?>

    <div class="wd-100"></div>

    <script>

        function showAdder($number){
            document.getElementById($number).style.display = "block";
        }
    
    </script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>