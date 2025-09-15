#include <bits/stdc++.h>

using namespace std;

class TokoElektronik{
    private:
        //atribut private 
        string id;
        string nama;
        string kategori;
        string harga;

    public:
        //Konstruktor kosong / default
        TokoElektronik(){
            id = "";
            nama = "";
            kategori = "";
            harga = "";
        }

        //Konstruktor dengan parameter
        TokoElektronik(string id, string nama, string kategori, string harga){ 
            this->id = id;
            this->nama = nama;
            this->kategori = kategori;
            this->harga = harga;
        }

        //setter dan getter
        void setId(string id){
            this->id = id;
        }
        
        string getId(){
            return id;
        }

        void setNama(string nama){
            this->nama = nama;
        }

        string getNama(){
            return nama;
        }

        void setKategori(string kategori){
            this->kategori = kategori;
        }

        string getKategori(){
            return kategori;
        }

        void setHarga(string harga){
            this->harga = harga;
        }

        string getHarga(){
            return harga;
        }

        //method menampilkan data
        void display(){
            cout << "ID       : " << id << endl;
            cout << "Nama     : " << nama << endl;
            cout << "Kategori : " << kategori << endl;
            cout << "Harga    : " << harga << endl;
        }

        //destruktor
        ~TokoElektronik(){

        }
};