<?php

class TokoElektronik {
    //atribut
    private $id;
    private $nama;
    private $kategori;
    private $harga;
    private $image;

    //constructor dengan parameter
    public function __construct($id = "", $nama = "", $kategori = "", $harga = "", $image = "") {
        $this->id = $id;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->harga = $harga;
        $this->image = $image;
    }

    //getter dan setter
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setKategori($kategori) {
        $this->kategori = $kategori;
    }

    public function getKategori() {
        return $this->kategori;
    }

    public function setHarga($harga) {
        $this->harga = $harga;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }

    //method display
    public function display() {
        echo "ID: " . $this->id . "\n";
        echo "Nama: " . $this->nama . "\n";
        echo "Kategori: " . $this->kategori . "\n";
        echo "Harga: " . $this->harga . "\n";
    }
}
?>