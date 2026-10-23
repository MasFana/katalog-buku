#include <iostream>
#include <string>
using namespace std;

// Struct tunggal untuk merepresentasikan 1 slot di gudang
struct Bahan {
    string nama;
    int harga;
    int stok;
    bool terisi; // true = ada barang, false = slot kosong
};

int main() {
    // Array 1D untuk 10 slot gudang (Index 0 sampai 9)
    // Inisialisasi awal: semua slot diset kosong (false / 0 / "")
    Bahan gudang[10] = {}; 

    // Isi 2 contoh slot awal sesuai deskripsi
    gudang[0] = {"Beras_5Kg", 65000, 10, true};
    gudang[2] = {"Minyak_1L", 16000, 20, true};

    int pilihan;
    int index;

    // Do-While Loop untuk menjalankan Menu Utama secara terus-menerus
    do {
        cout << "\n========================================\n";
        cout << "   MANAJEMEN GUDANG (10 SLOT: IDX 0-9)\n";
        cout << "========================================\n";
        cout << "1. Tampilkan Semua Data (Index 0-9)\n";
        cout << "2. Lihat Data by Index\n";
        cout << "3. Tambah Data di Index\n";
        cout << "4. Edit Data di Index\n";
        cout << "5. Delete Data di Index\n";
        cout << "0. Keluar\n";
        cout << "========================================\n";
        cout << "Pilih menu: ";
        cin >> pilihan;
        cout << "\n";

        // Navigasi menu menggunakan Branching (if-else)
        if (pilihan == 1) {
            // MENU 1: Tampilkan Semua Data (Read All)
            cout << "--- DAFTAR SLOT GUDANG (INDEX 0 - 9) ---\n";
            for (int i = 0; i < 10; i++) {
                if (gudang[i].terisi == true) {
                    cout << "[Index " << i << "] " << gudang[i].nama 
                         << "\t| Rp" << gudang[i].harga 
                         << " | Stok: " << gudang[i].stok << "\n";
                } else {
                    cout << "[Index " << i << "] --- KOSONG ---\n";
                }
            }

        } else if (pilihan == 2) {
            // MENU 2: Lihat Data by Index (Read by Index)
            // Tampilkan Semua Data (Read All)
            // Menggunakan perulangan for (int i = 0; i < 10; i++).
            // Jika gudang[i].terisi == true, cetak [Index i] Nama | Harga | Stok.
            // Jika gudang[i].terisi == false, cetak [Index i] --- KOSONG ---.

        } else if (pilihan == 3) {
            // MENU 3: Tambah Data di Index (Create by Index)
            cout << "--- TAMBAH DATA DI INDEX ---\n";
            cout << "Masukkan Index Slot tujuan (0-9)  : ";
            cin >> index;

            // Validasi rentang index (0 - 9)
            if (index >= 0 && index <= 9) {
                if (gudang[index].terisi == false) {
                    cout << "Masukkan Nama Bahan (tanpa spasi) : ";
                    cin >> gudang[index].nama;
                    cout << "Masukkan Harga (Rp)               : ";
                    cin >> gudang[index].harga;
                    cout << "Masukkan Stok                     : ";
                    cin >> gudang[index].stok;
                    
                    gudang[index].terisi = true; // Tandai slot sudah terisi
                    cout << ">> Berhasil! Data disimpan pada Gudang Index [" << index << "].\n";
                } else {
                    cout << ">> Gagal: Slot pada Index [" << index << "] sudah terisi! Pilih slot lain atau gunakan menu Edit.\n";
                }
            } else {
                cout << ">> Error: Index tidak valid! Masukkan angka 0 sampai 9.\n";
            }

        } else if (pilihan == 4) {
            // MENU 4: Edit Data di Index (Update by Index)
            cout << "--- EDIT DATA DI INDEX ---\n";
            cout << "Masukkan Index Slot yang ingin diedit (0-9): ";
            cin >> index;

            // Validasi rentang index (0 - 9)
            if (index >= 0 && index <= 9) {
                if (gudang[index].terisi == true) {
                    cout << "Data lama di Index [" << index << "] -> " 
                         << gudang[index].nama << " (Rp" << gudang[index].harga 
                         << ", Stok: " << gudang[index].stok << ")\n\n";

                    cout << "Masukkan Nama Baru (tanpa spasi) : ";
                    cin >> gudang[index].nama;
                    cout << "Masukkan Harga Baru              : ";
                    cin >> gudang[index].harga;
                    cout << "Masukkan Stok Baru               : ";
                    cin >> gudang[index].stok;

                    cout << ">> Berhasil! Data pada Index [" << index << "] telah diperbarui.\n";
                } else {
                    cout << ">> Gagal: Slot pada Index [" << index << "] kosong! Tidak ada data untuk diedit.\n";
                }
            } else {
                cout << ">> Error: Index tidak valid! Masukkan angka 0 sampai 9.\n";
            }

        } else if (pilihan == 5) {
            // MENU 5: Delete Data di Index (Delete by Index)
            cout << "--- DELETE DATA DI INDEX ---\n";
            cout << "Masukkan Index Slot yang ingin dihapus (0-9): ";
            cin >> index;

            // Validasi rentang index (0 - 9)
            if (index >= 0 && index <= 9) {
                if (gudang[index].terisi == true) {
                    string namaTerhapus = gudang[index].nama; // Simpan nama sementara untuk pesan output

                    // Reset nilai slot kembali ke kondisi kosong
                    gudang[index].nama = "";
                    gudang[index].harga = 0;
                    gudang[index].stok = 0;
                    gudang[index].terisi = false;

                    cout << ">> Berhasil! Data \"" << namaTerhapus << "\" pada Index [" << index << "] telah dihapus (Slot kembali KOSONG).\n";
                } else {
                    cout << ">> Gagal: Slot pada Index [" << index << "] sudah kosong!\n";
                }
            } else {
                cout << ">> Error: Index tidak valid! Masukkan angka 0 sampai 9.\n";
            }

        } else if (pilihan == 0) {
            // MENU 0: Keluar
            cout << "Terima kasih telah menggunakan program Manajemen Gudang!\n";

        } else {
            // Pilihan di luar 0 - 5
            cout << ">> Menu tidak valid! Silakan pilih menu 0 - 5.\n";
        }

    } while (pilihan != 0);

    return 0;
}