insert into Barang values
("1", "Mouse", 5000, "Mouse ErGeBeh terbaru dan termurah. Dijamin jos!!", "https://thegreatdevice.com/wp-content/uploads/2018/04/Logitech-G303-Daedalus-Apex-Performance-Edition-Gaming-Mouse-300x180.jpg"),
("2", "Keyboard", 10000, "Keyboard 1 juta umat. Meskipun tidak terlalu bagus, tetapi keyboard ini dijamin mantap dipakai", "https://www.meckeys.com/wp-content/uploads/2019/05/Gk61-Main-300x180.jpg"),
("3", "Headset", 15000, "Kehilangan pendengaran atas penggunaan headset ini bukanlah tanggungan kami", "https://www.thetechy.com/wp-content/uploads/2017/04/HyperX-Cloud-Revolver-S-with-Dongle-300x180.jpg"),
("4", "Mousepad", 22000, "Mousepad khusus gaming, dijamin akan membuat aim-mu menjadi sangat baik dan akurat", "https://katajansen.id/wp-content/uploads/2018/09/Mousepad-Untuk-Game-300x180.jpg"),
("5", "Flashdisk", 7000, "Harusnya sih flashdrive, tapi sudahlah", "https://cdn.inwepo.co/wp-content/uploads/2014/06/08082400/Flashdisk-300x180.jpg");

insert into Kantor values
("1", "Jakarta", "Jln. di jakarta"),
("2", "Tangerang", "Suatu jalanan di Tangerang"),
("3", "Bekasi", "Suatu jalanan di Bekasi");

insert into Stock values
("1", "1", "1", 10),
("2", "2", "1", 10),
("3", "3", "1", 10),
("4", "4", "1", 10),
("5", "5", "1", 10),
("6", "1", "2", 10),
("7", "2", "2", 10),
("8", "3", "2", 10),
("9", "4", "2", 10),
("10", "5", "2", 10),
("11", "1", "3", 10),
("12", "2", "3", 10),
("13", "3", "3", 10),
("14", "4", "3", 10),
("15", "5", "3", 10);

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