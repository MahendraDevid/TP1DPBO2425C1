from tokoelektronik import TokoElektronik

listToko = [] #list untuk menyimpan objek TokoElektronik

#menambahkan dengan constructor
Toko1 = TokoElektronik("T001", "Samsung Galaxy S21", "Smartphone", "2000000")

#menambahkan dengan setter
Toko2 = TokoElektronik()
Toko2.setId("T002")
Toko2.setNama("Apple MacBook Pro")
Toko2.setKategori("Laptop")
Toko2.setHarga("15000000")

#menambahkan objek ke dalam list
listToko.append(Toko1)
listToko.append(Toko2)

choice = -1#variabel untuk menyimpan pilihan menu
id, nama, kategori, harga = "", "", "", ""#variabel untuk menyimpan input user

while choice != 0:#looping menu sampai user memilih keluar
    print("++++++++++ Toko Elektronik +++++++++")
    print("1. Tampilkan semua data")
    print("2. Tambah data baru")
    print("3. Update data")
    print("4. Hapus data")
    print("5. Cari data")
    print("0. Keluar")
    print("++++++++++++++++++++++++++++++++++++++")
    print("Masukkan pilihan Anda: ", end="")

    choice = int(input()) #membaca input user untuk memilih menu

    if choice == 1:
        #menampilkan semua data
        print("============= Data Toko Elektronik ============")
        for i, toko in enumerate(listToko):
            print(f"Produk ke-{i+1}")
            toko.display()
            print("-----------------------------------------")

        if len(listToko) == 0:
            print("Tidak ada data tersedia.")
    
    elif choice == 2:
        #menambah data baru
        print("Masukkan ID: ", end="")
        id = input()
        print("Masukkan Nama: ", end="")
        nama = input()
        print("Masukkan Kategori: ", end="")
        kategori = input()
        print("Masukkan Harga: ", end="")
        harga = input()

        newToko = TokoElektronik(id, nama, kategori, harga)
        listToko.append(newToko)
        print("Data berhasil ditambahkan.")

    elif choice == 3:
        #update data
        print("Masukkan ID produk yang akan diupdate: ", end="")
        id = input()
        found = False

        for toko in listToko:
            if toko.getId() == id:
                found = True
                print("Masukkan Nama baru: ", end="")
                nama = input()
                print("Masukkan Kategori baru: ", end="")
                kategori = input()
                print("Masukkan Harga baru: ", end="")
                harga = input()

                toko.setNama(nama)
                toko.setKategori(kategori)
                toko.setHarga(harga)
                print("Data berhasil diupdate.")
        
        if not found:
            print("Produk dengan ID tersebut tidak ditemukan.")

    elif choice == 4:
        #hapus data
        print("Masukkan ID produk yang akan dihapus: ", end="")
        id = input()
        found = False

        for i, toko in enumerate(listToko):
            if toko.getId() == id:
                found = True
                del listToko[i]
                print("Data berhasil dihapus.")
        
        if not found:
            print("Produk dengan ID tersebut tidak ditemukan.")

    elif choice == 5:
        #cari data
        print("Masukkan ID produk yang akan dicari: ", end="")
        id = input()
        found = False

        for toko in listToko:
            if toko.getId() == id:
                found = True
                print("Produk ditemukan:")
                toko.display()
        
        if not found:
            print("Produk dengan ID tersebut tidak ditemukan.")

    elif choice == 0:
        print("Keluar dari program.")
    else:
        print("Pilihan tidak valid. Silakan coba lagi.")

    print() #menambahkan baris kosong untuk pemisah antar iterasi
