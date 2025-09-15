#include <bits/stdc++.h>
#include "tokoelektronik.cpp"

using namespace std;

int main(){
    vector<TokoElektronik> tokoElektronikList;// vector untuk menyimpan objek TokoElektronik

    //menambahkan data menggunakan konstruktor dengan parameter
    TokoElektronik toko1("T001", "Asus Rog", "Laptop", "Rp 10.000.000");

    //menambahkan data menggunakan setter
    TokoElektronik toko2;

    toko2.setId("T002");
    toko2.setNama("Samsung A56");
    toko2.setKategori("Handphone");
    toko2.setHarga("Rp 5.000.000");

    //menambahkan objek ke dalam vector
    tokoElektronikList.push_back(toko1);    
    tokoElektronikList.push_back(toko2);

    int choice;//variabel untuk menyimpan pilihan menu
    string id, nama, kategori, harga;//variabel untuk menyimpan input user

    do{
        //menampilkan menu
        cout << "++++++++++ Toko Elektronik +++++++++" << endl;
        cout << "1. Tampilkan Semua Data" << endl;
        cout << "2. Tambah Data" << endl;
        cout << "3. Update Data" << endl;
        cout << "4. Hapus Data" << endl;
        cout << "5. Cari Data" << endl; 
        cout << "0. Keluar" << endl;
        cout << "++++++++++++++++++++++++++++++++++++" << endl;
        cout << "Masukkan pilihan Anda: ";

        cin >> choice;//input pilihan
        cin.ignore();//membersihkan newline character dari input buffer
        cout << endl;

        switch(choice){//menjalankan menu sesuai pilihan
            case 1://menu 1 menampilkan semua data
                cout << "+============= Data Toko Elektronik ============" << endl;
                for(size_t i = 0; i < tokoElektronikList.size(); i++){//mengulang sesuai jumlah data dalam vector
                    cout << "Produk ke-" << i+1 << endl;
                    tokoElektronikList[i].display();//menampilkan data sesuai urutan
                    cout << "-----------------------------------------" << endl;
                }
                if(tokoElektronikList.empty()){//jika vector kosong
                    cout << "Tidak ada data tersedia." << endl;
                }
                break;

            case 2:{//menu 2 menambah data

                //input data produk baru ke variabel
                cout << "Masukkan ID: ";
                getline(cin, id);
                cout << "Masukkan Nama: ";
                getline(cin, nama);
                cout << "Masukkan Kategori: ";
                getline(cin, kategori);
                cout << "Masukkan Harga: ";
                getline(cin, harga);

                TokoElektronik newToko(id, nama, kategori, harga);//menambahkan ke dalam class TokoElektronik constructor
                tokoElektronikList.push_back(newToko);//menambahkan objek ke dalam vector
                cout << "Data produk berhasil ditambahkan." << endl;//pesan berhasil
                break;
            }

            case 3:{//menu 3 mengupdate data
                cout << "Masukkan ID produk yang akan diupdate: ";
                getline(cin, id);//input id produk yang akan diupdate

                bool found = false;//variabel untuk mengecek apakah produk ditemukan
                for(size_t i = 0; i < tokoElektronikList.size(); i++){//mengulang sesuai jumlah data dalam vector
                    if(tokoElektronikList[i].getId() == id){//cek apakah id sesuai
                        found = true;//jika ditemukan maka true

                        //update data baru
                        cout << "Masukkan Nama baru: ";
                        getline(cin, nama);
                        cout << "Masukkan Kategori baru: ";
                        getline(cin, kategori);
                        cout << "Masukkan Harga baru: ";
                        getline(cin, harga);

                        //menggunakan setter untuk mengupdate data, sesuai variabel input
                        tokoElektronikList[i].setNama(nama);
                        tokoElektronikList[i].setKategori(kategori);
                        tokoElektronikList[i].setHarga(harga);

                        cout << "Data produk berhasil diupdate." << endl;//pesan berhasil
                    }
                }
                if(!found){//jika produk tidak ditemukan
                    cout << "Produk dengan ID tersebut tidak ditemukan." << endl;
                }
                break;
            }

            case 4:{//menu 4 menghapus data
                cout << "Masukkan ID produk yang akan dihapus: ";
                getline(cin, id);//input id produk yang akan dihapus

                auto it = remove_if(tokoElektronikList.begin(), tokoElektronikList.end(), [&id](TokoElektronik &toko){ return toko.getId() == id; });//menggunakan lambda function untuk mencari id yang sesuai

                if(it != tokoElektronikList.end()){//jika produk ditemukan
                    tokoElektronikList.erase(it, tokoElektronikList.end());
                    cout << "Data produk berhasil dihapus." << endl;//pesan berhasil
                } else {
                    cout << "Produk dengan ID tersebut tidak ditemukan." << endl;//pesan tidak ditemukan
                }   

                break;
            }
            case 5:{//menu 5 mencari data
                cout << "Masukkan ID produk yang akan dicari: ";
                getline(cin, id);//input id produk yang akan dicari

                bool found = false;//variabel untuk mengecek apakah produk ditemukan
                for(size_t i = 0; i < tokoElektronikList.size(); i++){//mengulang sesuai jumlah data dalam vector
                    if(tokoElektronikList[i].getId() == id){//cek apakah id sesuai
                        found = true;//jika ditemukan maka true
                        cout << "Produk ditemukan:" << endl;//pesan ditemukan
                        tokoElektronikList[i].display();//menampilkan data produk
                    }
                }
                if(!found){//jika produk tidak ditemukan
                    cout << "Produk dengan ID tersebut tidak ditemukan." << endl;
                }
                break;
            }
            case 0://menu 0 keluar dari program
                cout << "Keluar dari program." << endl;
                break;
            default://jika input tidak sesuai
                cout << "Pilihan tidak valid. Silakan coba lagi." << endl;

        }
        cout << endl;   
    } while(choice != 0);//ulangi menu sampai user memilih 0 untuk keluar

    return 0;
}