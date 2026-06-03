# CARA MENGGUNAKAN SSH DI VSCODE

## Pastikan sudah install git

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
   - github.com⁠
   - Settings
     <img width="1240" height="585" alt="image" src="https://github.com/user-attachments/assets/0314cf1b-1c3c-4a10-b7cb-dc75258f1c21" />

   - Klik New SSH Key → paste key tadi → Save.

   Tes Koneksi:
   ```cpp
   ssh -T git@github.com
   ```
   Jika berhasil:
   ```cpp
   Hi username! You've successfully authenticated...
   ```
   <img width="642" height="62" alt="image" src="https://github.com/user-attachments/assets/dc8c1483-ce3c-442e-a549-33ff98df5a6f" />

---

## Cara clone repo lewat ssh

1. Salin command ssh di repo:
   <img width="961" height="505" alt="image" src="https://github.com/user-attachments/assets/1020d9aa-4257-41a6-9d05-2864936c8f85" />

2. Di Git Bash, pindah dulu ke folder yang diinginkan:

   Contoh ke `htdocs` karena saya pake XAMPP:
   ```cpp
   cd /c/xampp/htdocs
   ```
   
3. Lalu clone:
   ```cpp
   git clone git@github.com:username/nama-repo.git
   ```
   Contoh:
   ```cpp
   git clone git@github.com:alivvio56-alt/RESPONSI_PEMWEB.git
   ```
   
4. Masuk ke folder project:
   ```cpp
   cd nama-repo
   ```
   
5. Buka di VS Code:
   Kalau VS Code sudah terinstall:
   ```cpp
   code .
   ```
---

## CARA PUSH DAN PULL KE REPO GITHUB DARI VSCODE

### Push : untuk memperbarui/update repo di github setelah koding/menambah file baru di folder proyek

Setelah selesai ngoding

1. Buka terminal lalu langkah pertama adalah git add:
   ```cpp
   git add .
   ```
   
2. Selanjutnya, menambah comment:
   ```cpp
   git commit -m "Menambahkan fitur X"
   ```
   isi coment harus berbeda setiap perintah

3. Terakhir git push:
   ```cpp
   git push
   ```
   Cek repo di github, refresh, maka repo berhasil di update
   

### Pull : untuk mengambil/unduh, setelah repo di github ada perubahan dari anggota lain

 ```cpp
 git pull
 ```

Jadi urutannya biasanya:
 ```cpp
git pull
# coding di VS Code
git add .
git commit -m "update"
git push
```









