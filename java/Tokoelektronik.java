public class Tokoelektronik {
    //atribut private
    private String id;
    private String nama;
    private String kategori;
    private String harga;

    //konstruktor default
    public Tokoelektronik() {
        this.id = "";
        this.nama = "";
        this.kategori = "";
        this.harga = "";
    }

    //konstruktor dengan parameter
    public Tokoelektronik(String id, String nama, String kategori, String harga) {
        this.id = id;
        this.nama = nama;
        this.kategori = kategori;
        this.harga = harga;
    }

    //metode setter dan getter
    void setId(String id){
        this.id = id;
    }

    String getId(){
        return id;
    }

    void setNama(String nama){
        this.nama = nama;
    }

    String getNama(){
        return nama;
    }

    void setKategori(String kategori){
        this.kategori = kategori;
    }

    String getKategori(){
        return kategori;
    }

    void setHarga(String harga){
        this.harga = harga;
    }

    String getHarga(){
        return harga;
    }

    void display(){//metode untuk menampilkan data
        System.out.println("ID       : " + id);
        System.out.println("Nama     : " + nama);
        System.out.println("Kategori : " + kategori);
        System.out.println("Harga    : " + harga);
    }
}