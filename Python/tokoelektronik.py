class TokoElektronik:
    #constructor dengan parameter
    def __init__(self, id ="", nama ="", kategori ="", harga =""):
        self.id = id
        self.nama = nama
        self.kategori = kategori
        self.harga = harga

    #getter dan setter
    def setId(self, id):
        self.id = id
    
    def getId(self):
        return self.id
    
    def setNama(self, nama):
        self.nama = nama   
    
    def getNama(self):
        return self.nama
    
    def setKategori(self, kategori):
        self.kategori = kategori

    def getKategori(self):
        return self.kategori

    def setHarga(self, harga):
        self.harga = harga
    
    def getHarga(self):
        return self.harga

    #method display
    def display(self):
        print(f"ID: {self.id}")
        print(f"Nama: {self.nama}")
        print(f"Kategori: {self.kategori}")
        print(f"Harga: {self.harga}")
        
    
