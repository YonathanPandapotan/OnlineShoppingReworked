<html>
    <head>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .adder{
                display: none;
            }
            .card-horizontal {
                display: flex;
                flex: 1 1 auto;
            }
            .search {
            width: 100%;
            position: relative;
            display: flex;
            }

            .searchTerm {
            width: 500px;
            margin-top: 4px;
            margin-left: 40px;
            border: 1px solid #00B4CC;
            border-right: none;
            padding: 14px;
            height: 20px;
            border-radius: 5px 0 0 5px;
            outline: none;
            color: #9DBFAF;
            }

            .searchTerm:focus{
            color: #00B4CC;
            }

            .searchButton {
            width: 40px;
            height: 30px;
            margin-top: 4px;
            border: 1px solid #00B4CC;
            background: #00B4CC;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 20px;
            }

            /*Resize the wrap to see the search bar change!*/
            .wrap{
            width: 30%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            }

        </style>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/listBarang">TokoKomputer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <input type="text" class="searchTerm" placeholder="Cari Produk">
            </li>
            <li>
            <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>    
            </li>
            <li class="nav-item">
                <a class="fas fa-shopping-cart" style="font-size:25px; margin-top:8px; 
                margin-left:100px;" class="nav-link" href="/keranjangAnda"><span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a  class="fas fa-bell" style="font-size:25px; margin-top:8px; 
                margin-left:20px;" class="nav-link" href="/listTransaksi"><span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a  class="fas fa-sign-out-alt" style="font-size:25px; margin-top:8px; 
                margin-left:20px;" class="nav-link" href="/logOut"><span class="sr-only"></span></a>
            </li>
            
            </ul>
        </div>
    </nav>
    
    </nav>

    <h2>List transaksi yang pernah anda lakukan</h2>

    <br>

    <?php 
        foreach($detailTransaksi as $data){
            ?>
                <div class="container">
                    <p>Id transaksi: <?php echo $data['idTransaksi']?> </p>
                    <p>Tanggal dan waktu transaksi: <?php echo $data['created_at']?> </p>
                    <p>Harga total transaksi: <?php echo $data['hargaTotal']?> </p>
                    <p>Jumlah total barang yang dibeli: <?php echo $data['jumlahTotal']?> </p>
                    <p>Alamat tujuan: <?php echo $data['alamat']?> </p>
                    <p>List barang yang dibeli:</p>
                    <?php
                        foreach($detailBarang as $anotherData){
                            ?>
                            <p>Nama Barang: <?php echo $anotherData['namaBarang'] ?> Jumlah: <?php echo $anotherData['jumah']?> Asal Kantor: <?php echo $anotherData['namaKantor']?> </p>
                            <?php
                        }
                    ?>
                </div>
            <?php
        }
    ?>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>