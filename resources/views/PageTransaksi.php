<html>
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
    <div class="container">
    
        <form action="/prosesTransaksi" method="post">
            <div class="form-group">
                <h4 >List Barang Yang Anda Mau Beli</h4>
                <?php
                $hargaTotal= null;
                    foreach($barang as $data){
                        $hargaTotal = ($data['jumlah']*$data['hargaBarang']) + $hargaTotal;
                        ?>
                        <p>Nama Barang: <?php echo $data['namaBarang']?></p>
                        <p>Jumlah Barang: <?php echo $data['jumlah']?></p>
                        <p>Harga per unit: <?php echo $data['hargaBarang']?></p>
                        <p>Harga keseluruhan: <?php echo $data['jumlah']*$data['hargaBarang']?> </p>
                        <?php
                    }
                ?>
            </div>
            <br>
                <h4>Harga Total</h4>
                <input name="hargaTotal" class="form-control" type="text" value=<?php echo $hargaTotal?> readonly>
            <br>
            <div class="form-group">
                <p>Silahkan dipilih di cabang mana barang ingin anda beli</p>
                <input type="radio" name="valueKantor" value="1" checked> Jakarta <br>
                <input type="radio" name="valueKantor" value="2" > Tangerang <br>
                <input type="radio" name="valueKantor" value="3" > Bekasi <br>
            </div>
            <div class="form-group">
                <h4>Alamat Tujuan</h4>
                <?php 
                if($alamat->first()){
                    foreach($alamat as $data){?>
                        <input type="radio" name="valueAlamat" value="<?php echo $data['idAlamat']?>" checked> <?php echo $data['alamat']?> <br>
                        <button class="btn btn-primary" type=button onClick="toggleAlamatContainer();">Tambah Alamat</button>
                        <div id="alamatContainer" style="display: none;">
                            Alamat anda: <input type="text" name="alamat">
                            <input class="btn btn-primary" type="submit" name="submit" value="Tambah Alamat">
                        </div>
                        <input class="btn btn-primary" type="submit" name="submit" value="Beli Barang">
                    <?php
                    }
                }
                else{
                    ?>
                    <p>Maaf anda belum memiliki alamat, silahkan buat terlebih dahulu</p>
                    <button class="btn btn-primary" type=button onClick="toggleAlamatContainer();">Tambah Alamat</button>
                    <div id="alamatContainer" style="display: none;">
                        Alamat anda: <input type="text" name="alamat">
                        <input class="btn btn-primary" type="submit" name="submit" value="Tambah Alamat">
                    </div>
                    <input class="btn btn-primary" type="submit" name="submit" value="Beli Barang" disabled/>
                    <?php
                }
                ?>
                
            </div>

            

        </form>
    </div>

    <script>
        function toggleAlamatContainer(){
            document.getElementById("alamatContainer").style.display = "block";
            
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>