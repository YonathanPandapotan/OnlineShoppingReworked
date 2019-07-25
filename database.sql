insert into Barang values
("1", "Mouse", 5000, "Mouse ErGeBeh terbaru dan termurah. Dijamin jos!!", "https://thegreatdevice.com/wp-content/uploads/2018/04/Logitech-G303-Daedalus-Apex-Performance-Edition-Gaming-Mouse-300x180.jpg"),
("2", "Keyboard", 10000, "Keyboard 1 juta umat. Meskipun tidak terlalu bagus, tetapi keyboard ini dijamin mantap dipakai", "https://www.meckeys.com/wp-content/uploads/2019/05/Gk61-Main-300x180.jpg"),
("3", "Headset", 15000, "Kehilangan pendengaran atas penggunaan headset ini bukanlah tanggungan kami", "https://www.thetechy.com/wp-content/uploads/2017/04/HyperX-Cloud-Revolver-S-with-Dongle-300x180.jpg"),
("4", "Mousepad", 22000, "Mousepad khusus gaming, dijamin akan membuat aim-mu menjadi sangat baik dan akurat", "https://katajansen.id/wp-content/uploads/2018/09/Mousepad-Untuk-Game-300x180.jpg"),
("5", "Flashdisk", 7000, "Harusnya sih flashdrive, tapi sudahlah", "https://cdn.inwepo.co/wp-content/uploads/2014/06/08082400/Flashdisk-300x180.jpg"),
("6", "Earphone", 10000, "Kerusakan pendengaran atas menggunakan alat ini bukanlah tanggung jawab kami", "https://s3-ap-south-1.amazonaws.com/thetechy.com/wp-content/uploads/2017/10/01143309/1more-ibfree-bluetooth-in-ear-headphones-300x180.jpg"),
("7", "Modem", 20000, "Tidak ada jaminan internet anda akan lancar", "https://metalbiz.ru/assets/screen43865db2ub-300x180.jpg"),
("8", "RAM", 25000, "Harusnya sih flashdrive, tapi sudahlah", "https://unicartapp.s3.amazonaws.com/image/tyfontech/image/cache/data/Ram-300x180.jpg"),
("9", "Hardisk", 15000, "Hardisk sudah disediakan OS, tinggal pakai saja", "https://www.ecs.lk/image/cache/catalog/hdd-300x180.jpg"),
("10", "Motherboard", 16000, "Papan ibu", "https://www.ecs.lk/image/cache/catalog/g41d3-300x180.jpg");

insert into Kantor values
("1", "Jakarta", "Jln. di jakarta"),
("2", "Tangerang", "Suatu jalanan di Tangerang"),
("3", "Bekasi", "Suatu jalanan di Bekasi");

insert into Stock values
("1", "1", "1", 100),
("2", "2", "1", 100),
("3", "3", "1", 100),
("4", "4", "1", 100),
("5", "5", "1", 100),
("6", "6", "1", 100),
("7", "7", "1", 100),
("8", "8", "1", 100),
("9", "9", "1", 100),
("10", "10", "1", 100),
("11", "1", "2", 100),
("12", "2", "2", 100),
("13", "3", "2", 100),
("14", "4", "2", 100),
("15", "5", "2", 100),
("16", "6", "2", 100),
("17", "7", "2", 100),
("18", "8", "2", 100),
("19", "9", "2", 100),
("20", "10", "2", 100),
("21", "1", "3", 100),
("22", "2", "3", 100),
("23", "3", "3", 100),
("24", "4", "3", 100),
("25", "5", "3", 100),
("26", "6", "3", 100),
("27", "7", "3", 100),
("28", "8", "3", 100),
("29", "9", "3", 100),
("30", "10", "3", 100);

--Worked
DELIMITER //
CREATE TRIGGER transaksi
AFTER INSERT ON DetailTransaksi
FOR EACH ROW
BEGIN
    INSERT INTO Stock (idStockBarang, idBarang, idKantor, jumlah)
    Select d.idStockBarang, (select idBarang from Stock where idStockBarang = NEW.idStockBarang), (select idKantor from Stock where idStockBarang = NEW.idStockBarang), d.jumah from DetailTransaksi as d where d.idTransaksi = NEW.idTransaksi
    ON DUPLICATE KEY UPDATE JUMLAH = Stock.jumlah - VALUES(jumlah);
END//