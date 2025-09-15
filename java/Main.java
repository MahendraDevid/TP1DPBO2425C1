import java.util.ArrayList;
import java.util.Scanner;

public class Main{
    public static void main(String[] args){
        ArrayList<Tokoelektronik> tokoList = new ArrayList<>();//membuat ArrayList untuk menyimpan objek Tokoelektronik
        
        //membuat objek Tokoelektronik menggunakan konstruktor dengan parameter
        Tokoelektronik toko1 = new Tokoelektronik("T001", "TV Samsung", "Televisi", "5000000");

        //membuat objek Tokoelektronik menggunakan konstruktor default dan setter
        Tokoelektronik toko2 = new Tokoelektronik();
        toko2.setId("T002");
        toko2.setNama("Kulkas LG");
        toko2.setKategori("Kulkas");
        toko2.setHarga("3000000");

        //menambahkan objek ke dalam ArrayList
        tokoList.add(toko1); 
        tokoList.add(toko2);

        //variabel untuk memilih menu
        int choice;
        String id, nama, kategori, harga;//variabel untuk menyimpan input user

        do{
            //Menampilkan menu
            System.out.println("++++++++++ Toko Elektronik +++++++++");
            System.out.println("1. Tampilkan Semua Data");
            System.out.println("2. Tambah Data");
            System.out.println("3. Update Data");
            System.out.println("4. Hapus Data");
            System.out.println("5. Cari Data");
            System.out.println("0. Keluar");
            System.out.println("++++++++++++++++++++++++++++++++++++++");
            System.out.print("Masukkan pilihan Anda: ");

            Scanner scanner = new Scanner(System.in);
            choice = scanner.nextInt();//membaca input user untuk memilih menu
            scanner.nextLine(); //membersihkan newline character dari input buffer
            System.out.println();

            switch(choice){
                case 1:
                    //menampilkan semua data
                    System.out.println("============= Data Toko Elektronik ============");
                    for(int i = 0; i < tokoList.size(); i++){
                        System.out.println("Produk ke-" + (i+1));
                        tokoList.get(i).display();
                        System.out.println("-----------------------------------------");
                    }
                    
                    if(tokoList.isEmpty()){
                        System.out.println("Tidak ada data tersedia.");
                    }
                    break;
                case 2:
                    //menambah data baru
                    System.out.print("Masukkan ID: ");
                    id = scanner.nextLine();
                    System.out.print("Masukkan Nama: ");
                    nama = scanner.nextLine();
                    System.out.print("Masukkan Kategori: ");
                    kategori = scanner.nextLine();
                    System.out.print("Masukkan Harga: ");
                    harga = scanner.nextLine();

                    Tokoelektronik newToko = new Tokoelektronik(id, nama, kategori, harga);
                    tokoList.add(newToko);
                    System.out.println("Data produk berhasil ditambahkan.");
                    break;
                case 3:
                    //mengupdate data berdasarkan ID
                    System.out.print("Masukkan ID produk yang akan diupdate: ");
                    id = scanner.nextLine();
                    boolean foundUpdate = false;
                    for(Tokoelektronik toko : tokoList){
                        if(toko.getId().equals(id)){
                            System.out.print("Masukkan Nama baru: ");
                            nama = scanner.nextLine();
                            System.out.print("Masukkan Kategori baru: ");
                            kategori = scanner.nextLine();
                            System.out.print("Masukkan Harga baru: ");
                            harga = scanner.nextLine();

                            toko.setNama(nama);
                            toko.setKategori(kategori);
                            toko.setHarga(harga);
                            System.out.println("Data produk berhasil diupdate.");
                            foundUpdate = true;
                        }
                    }
                    if(!foundUpdate){
                        System.out.println("Produk dengan ID tersebut tidak ditemukan.");
                    }
                    break;
                case 4:
                    //menghapus data berdasarkan ID
                    System.out.print("Masukkan ID Produk yang akan dihapus: ");
                    id = scanner.nextLine();
                    boolean foundDelete = false;
                    for(int i = 0; i < tokoList.size(); i++){
                        if(tokoList.get(i).getId().equals(id)){
                            tokoList.remove(i);
                            System.out.println("Data produk berhasil dihapus.");
                            foundDelete = true;
                        }
                    }
                    if(!foundDelete){
                        System.out.println("Produk dengan ID tersebut tidak ditemukan.");
                    }
                    break;
                case 5:
                    //mencari data berdasarkan ID
                    System.out.print("Masukkan ID produk yang akan dicari: ");
                    id = scanner.nextLine();
                    boolean foundSearch = false;
                    for(Tokoelektronik toko : tokoList){
                        if(toko.getId().equals(id)){
                            toko.display();
                            foundSearch = true;
                        }
                    }
                    if(!foundSearch){
                        System.out.println("Produk dengan ID tersebut tidak ditemukan.");
                    }
                    break;
                case 0:
                    System.out.println("Keluar dari program.");
                    break;
                default:
                    System.out.println("Pilihan tidak valid. Silakan coba lagi.");
            }
            System.out.println();
        }while(choice != 0);
    }
}