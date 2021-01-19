DROP TABLE IF EXISTS admin;

CREATE TABLE admin(
    id_admin INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50),
    username VARCHAR(20),
    password VARCHAR(20),
    auth_key TEXT,
    token TEXT
);

INSERT INTO admin (id_admin,nama,username,password,auth_key,token) VALUES (1,'admin','admin','admin','auth_key-01','token-01');

DROP TABLE IF EXISTS pelanggan;

CREATE TABLE pelanggan(
    id_pelanggan INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(50),
    email VARCHAR(20),
    no_telp VARCHAR(20),
    alamat VARCHAR(50)
);

INSERT INTO pelanggan (id_pelanggan,nama_lengkap,email,no_telp,alamat) VALUES ('1','pelanggan A','pelanggan1@gmail.com','0812345678','jl janti, bantul, DIY');

DROP TABLE IF EXISTS berita;

CREATE TABLE berita(
    id_berita INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100),
    tgl_berita DATETIME,
    isi_berita TEXT,
    gambar TEXT,
    id_admin INT(11) NOT NULL,
    FOREIGN KEY(id_admin) REFERENCES admin(id_admin)
);

DROP TABLE IF EXISTS pengumuman;

CREATE TABLE pengumuman(
    id_pengumuman INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_kategori VARCHAR(100),
    judul VARCHAR(100),
    tgl_berita DATETIME,
    isi_berita TEXT,
    id_admin INT(11) NOT NULL,
    FOREIGN KEY(id_admin) REFERENCES admin(id_admin)
);

DROP TABLE IF EXISTS pengaduan;

CREATE TABLE pengaduan(
    id_pengaduan INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pengaduan TEXT,
    id_pelanggan VARCHAR(12),
    penanganan TEXT,
    status TEXT,
    id_admin INT(11) NOT NULL,
    FOREIGN KEY(id_admin) REFERENCES admin(id_admin)
);

DROP TABLE IF EXISTS info_pelanggan;

CREATE TABLE info_pelanggan(
    id_pelanggan INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_bayar INT(11),
    tgl_pembayaran DATETIME,
    denda VARCHAR(100),
    total_bayar VARCHAR(100)
);

