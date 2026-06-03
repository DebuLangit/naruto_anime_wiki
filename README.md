CARA MENGGUNAKAN SSH DI VSCODE

Pastikan sudah install git
1. Cek versi git:
   ```cpp
   git --version
   ```
2. Cek ssh key apakah sudah ada atau belum
   Buka GitBash, ketik:
   ```cpp
   ls ~/.ssh
   ```
   Biasanya akan muncul file seperti:
   ```cpp
   id_rsa
   id_rsa.pub
   ```
   cek isi ssh public key nya
   ```cpp
   cat ~/.ssh/id_rsa.pub
   ```
   Nanti akan muncul teks panjang seperti:
   
   <img width="576" height="174" alt="image" src="https://github.com/user-attachments/assets/d5901af1-8062-4bdc-80d7-176e85f9b189" />

   kalau sudah ada email github yang terhubung berarti sudah bisa untuk git clone ssh

3. Kalau belum ada
   
   Jalankan perintah untuk membuat RSA Key:
   ```cpp
   ssh-keygen -t rsa -b 4096 -C "emailkamu@example.com"
   ```
   contoh:
   ```cpp
   ssh-keygen -t rsa -b 4096 -C "dedikur046@gmail.com"
   ```
   pastikan email github yang dipakai

   Lalu:
   - Tekan Enter
   - Enter lagi
   - Enter lagi
   - Nanti SSH key otomatis dibuat
   
   Jalankan SSH Agent:
   ```cpp
   eval "$(ssh-agent -s)"
   ```
   Tambahkan Key ke SSH Agent:
   ```cpp
   ssh-add ~/.ssh/id_rsa
   ```
   Salin Public Key:
    ```cpp
   cat ~/.ssh/id_rsa.pub
   ```
   Copy hasilnya

   Tambahkan ke GitHub
   Buka:
   github.com⁠
   Klik New SSH Key → paste key tadi → Save.

   
   

1. masuk ke git bash dan pindah ke folder proyek, misal saya pakai XAMPP dan folder proyeknya di htdocs
``cd /c/xampp/htdocs``
2. lakukan git 
