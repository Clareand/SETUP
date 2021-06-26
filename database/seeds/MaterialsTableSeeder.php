<?php

use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('materials')->delete();
        
        \DB::table('materials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Android dan Hello World',
            'material_text' => '<h1>Welcome!</h1><p>Pada materi ini akan akan membahas hal-hal yang dibutuhkan di dalam pengembangan Android. Dalam pengembangan Android dibutuhkan IDE (<em>integrated development environment</em>) seperti Android Studio dan penggunan Emulator ataupun penggunaan perangkat fisik dalam menjalankan aplikasi yang telah dibuat. </p><h3>Apa saja yang dibutuhkan ?</h3><ul><li>Sebuah komputer yang kompatibel dengan Windows atau Linux, atau Mac running macOS. Lihat halaman Android Studio untuk persyaratan sistem terbaru.</li><li>Akses Internet atau cara alternatif untuk memuat Android Studio terbaru dan mengunduh Java ke komputer anda.</li></ul><h3>Apa saja yang akan kamu pelajari</h3><ul><li>Cara mengunduh dan menggunakan Android Studio IDE</li><li>Cara menggunakan proses pengembangan untuk membangun aplikasi Android</li><li>Cara membuat projek Android dari templat.</li><li>Cara menambahkan pesan log ke aplikasi anda untuk proses debug</li></ul><h3>Apa saja yang akan kamu lakukan</h3><ul><li>Mengunduh Android Studio development environment</li><li>Membuat emulator ( <em>Virtual Device ) </em>untuk menjalankan aplikasi anda di komputer</li><li>Membuat dan menjalankan aplikasi Hello World secara virtual maupun secara fisik</li><li>Menjelajahi projek tata letak</li><li>Menghasilkan dan melihat pesan log dari aplikasi anda</li><li>Menjelajahi file <strong>AndroidManifest.xml </strong></li></ul>',
                'material_image' => 'public/material/1624442855.png',
                'video' => NULL,
                'point' => 100,
                'created_at' => '2021-06-23 10:07:35',
                'updated_at' => '2021-06-23 10:30:52',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Instalasi Android Studio',
            'material_text' => '<p>Android Studio menyediakan IDE lengkap termasuk <em>code editor </em>dan set template aplikasi. Sebagai tambahan, ini menyediakan alat untuk pengembangan <em>debugging</em>, pengujian, dan kinerja agar lebih cepat dan mudah untuk mengembangkan aplikasi. Anda bisa menguji aplikasi anda dengan jangkauan yang luas untuk pengaturan <em>emulators </em>atau perangkat bergerak.</p><p><br></p><p>Android studio tersedia untuk Windows, Linux dan Macos. OpenJDK ( <em>Java Development Kit )</em> terbaru sudah termasuk di dalam Android Studio.</p><p><br></p><p>untuk memulai Android Studio, pertama lakukan pengecekan <em>systems requirement </em> untuk memastikan bahwa sistem sudah memenuhi syarat. Pemasangan pada seluruh perangkat memiliki proses yang sama. Perbedaannya dituliskan di bawah ini</p><ol><li>Arahkan ke <strong>Android Developers Site </strong>dan ikuti perintah untuk mengunduh dan memasang Android Studio</li><li>Menerima konfigurasi bawaan untuk seluruh langkah, dan pastikan seluruh komponen terpilih untuk dipasang </li><li>Setelah selesai, <em>Setup Wizard </em>akan mengunduh dan memasang beberapa komponen tambahan termasuk <strong>Android SDK</strong>. Proses ini memakan waktu yang cukup panjang.</li><li>Ketika seluruh pengunduhan selesai, Android Studio akan berjalan dan siap untuk membuat aplikasi pertamamu!</li></ol><p><br></p><p><span style="color: rgb(136, 152, 170);">Setelah kamu mengunduh Android Studio, kamu akan membuat, dari sebuah template, sebuah projek baru dari aplikasi Hello World. Aplikasi sederhana ini menampilkan string "Hello World" di layar Android Virtual atau perangkat fisik.</span></p><p><br></p>',
                'material_image' => 'public/material/1624446182.png',
                'video' => NULL,
                'point' => 100,
                'created_at' => '2021-06-23 10:38:28',
                'updated_at' => '2021-06-23 11:08:00',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Jalankan Aplikasimu!',
            'material_text' => '<p>Selamat kamu telah menginstall Android Studio!</p><p><br></p><p>Langkah selanjutnya adalah konfigurasi untuk menjalankan aplikasi. Terdapat 2 cara untuk melakukan hal ini yaitu dengan <em>Virtual Device </em> atau menggunakan perangkat asli. </p><p><br></p><h2>Konfigurasi <em>Virtual Device ( Emulator )</em></h2><p>untuk dapat menggunakan emulator, hal pertama yang harus dilakukan adalah membuat <em>Android Virtual Device ( AVD )</em>  yang ada di dalam menu AVD manager disana terdapat banyak pilihan perangkat virtual yang dapat kamu pilih atau kamu dapat membuatnya sendiri dengan memilih menu <em>Create Virtual Device. </em></p><h2><br></h2><h2>Konfigurasi Perangkat Asli </h2><p>Dalam konfigurasi Perangkat Asli kamu membutuhkan :</p><ul><li>Perangkat Android ( HP / tablet )</li><li>Kabel data untuk menyambungkan perangkat android-mu ke komputer via <em>USB port</em></li><li>Jika kamu menggunakan Linux atau Windows, kamu perlu melakukan langkah tambahan untuk menjalankannya di <em>hardware device. </em>Lihat dokumentasi untuk penggunaan perangkat keras. Dan kamu juga perlu untuk memasang<em> USB driver </em>yang cocok untuk perangkatmu.</li></ul><p>selanjutnya kamu perlu mengaktifkan <em>USB debugging </em> pada mode pengembangan, jika tersembunyi pergi ke menu setting-&gt;About Phone dan ketuk 7 kali maka developer mode-mu sudah aktif.</p>',
                'material_image' => 'public/material/1624446106.png',
                'video' => NULL,
                'point' => 100,
                'created_at' => '2021-06-23 11:01:46',
                'updated_at' => '2021-06-23 11:26:39',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Graddle dan Log',
            'material_text' => '<p>Pada tahapan ini, Kamu akan melakukan konfigurasi terhadap build.gradle(Module:app) dan Log statement<strong>.</strong></p><p><br></p><h3><strong>Konfigurasi Graddle</strong></h3><p><strong>Konfigurasi yang dilakukan untuk gradle adalah mengganti minimum versi SDK untuk aplikasi yang dibuat. untuk melakukannya, carilah <em>Graddle scripts </em>folder. pada blok <em>defaultConfig, </em>gantilah nilai dari <em>minSdkVersion</em> dengan nilai 17 (pada versi asli di set 15). Lakukan sinkronisasi <em>graddle</em> dengan klik pilihan S<em>ync Now</em> pada notifikasi yang muncul.</strong></p><p><br></p><h3><strong>Log</strong></h3><p>Log merupakan pesan yang ditampilkan oleh IDE terhadap suatu proses. Untuk dapat menampilkan pesan Log, lakukan hal berikut :</p><ol><li>Buka <em>logcat</em> tab yang ada terdapat dalam panel <em>logcat</em>.</li><li>ubah <em>Log level</em> menjadi <em>verbose </em>yang akan menampilkan seluruh pesan Log.</li></ol><p><br></p>',
                'material_image' => NULL,
                'video' => 'public/material/video/1624448076.png',
                'point' => 200,
                'created_at' => '2021-06-23 11:34:36',
                'updated_at' => '2021-06-23 11:46:05',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Instalasi Selesai!',
                'material_text' => '<p>Yeay, Selamat Kamu berhasi memasang Android Studio! Kamu sudah siap untuk melakukan pengembangan aplikasi Android. Ikuti Kelas lanjutan untuk mempelajari tahap selanjutnya dalam pengembangan Android. Sampai Bertemu Kembali di kelas Selanjutnya!</p>',
                'material_image' => 'public/material/1624449603.png',
                'video' => NULL,
                'point' => 100,
                'created_at' => '2021-06-23 12:00:03',
                'updated_at' => '2021-06-23 12:00:03',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Editor Tampilan',
                'material_text' => '<h1>Hallo!</h1><p>Pada Kelas ini kita akan membahas mengenai editor tampilan untuk membuat tampilan dari aplikasimu. Untuk dapat membangun tampilan pada aplikasi Android, Kamu dapat menggunakan <em>ContstrainLayout </em>yang akan mengatur elemen dari UI dengan menggunakan hubungan <em>constrain</em>. Untuk mengatur <em>view</em> dari tampilan, terdapat 2 jenis <em>ViewGroup :</em></p><ul><li><em>LinearLayout</em> : kelompok yang mengatur <em>child</em> <em>View</em> secara horizontal atau Vertical</li><li><em>RelativeLayout : </em>kelompok yang <em> </em>mengatur <em>child View</em> dengan meletakan secara relatif pada elemen lainnya.</li></ul><h3>Yang kamu akan pelajari :</h3><ul><li>Membuat variasi layout secara horizontal</li><li>Membuat variasi tampilan untuk tabel dan tampilan besar</li><li>Cara menggunakan <em>baseline</em> untuk menata UI elemen</li><li>Mengatur tombol didalam layout</li><li>Mengatur posisi menggunakan <em>LinearLayout</em></li><li>Mengatur posisi dengan menggunakan <em>Relative Layout</em></li></ul><p>Akan terdapat banyak aktifitas dalam kelas ini. Pastikan seluruh komponen untuk pengembangan Android sudah terpasang untuk mempermudah dalam mengikuti kelas Ini.</p><p><br></p><h3>Semangat!</h3>',
                'material_image' => 'public/material/1624506263.png',
                'video' => NULL,
                'point' => 110,
                'created_at' => '2021-06-24 03:44:23',
                'updated_at' => '2021-06-24 03:44:23',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Variasi Tampilan',
            'material_text' => '<h2>Ubah tampilanmu ke Landscape!</h2><p>Pada tahapan ini, kita akan membuat variasi tampilan untuk horizontal (<em>landscape</em>) dan vertikal (<em>potrait</em>).</p><p>untuk dapat membuat tampilan horizontal dan vertikal dalam sebuah aplikasi, pilih tombol <em>orientation in Editor</em> pada toolbar dan pilih <em>create landscape variation. </em>setelah langkah tersebut dilakukan maka akan terbuka sebuah editro baru dengan land/activity_main.xml. Kamu dapat melakukan perubahan terhadap layout untuk orientasi tanpa harus mengubah versi asli dari orientasi vertikal.</p><p><br></p><h2>Lihat tampilanmu pada beragam Device</h2><p>Kamu dapat melakukan <em>preview</em> terhadap berbagai jeni perangkat tanpa harus menjalankan aplikasi pada perangkat ataupun emulator. Ikuti Langkah berikut :</p><ol><li>pastika tab <em>land/activiy_main.xml</em> terbuka pada <em>layout editor</em>, jika tidak terbuka, Klik 2 kali pada <em>activiy_main.xml</em> pada direktori layout.</li><li>klik pada <em>device in editor</em> yang terdapat di dalam toolbar</li><li>pilih perangkat yang berbeda pada dropdown menu</li></ol>',
                'material_image' => 'public/material/1624507377.png',
                'video' => NULL,
                'point' => 130,
                'created_at' => '2021-06-24 04:02:57',
                'updated_at' => '2021-06-24 04:02:57',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Ubah layout aplikasimu!',
                'material_text' => '<p>Pada materi ini kita akan ubah layout dari tampilan aplikasi. <em>LinearLayout</em> merupakan sebuah <em>ViewGrup</em> yang mengatur koleksi elemen UI secara horizontal ataupun vertikal. <em>LinearLayout</em> merupakan layout yang paling sering digunakan karena simpel dan cepat.</p><p>Pada Linear Layout, diperlukan Atribut :</p><ul><li>layout_width</li><li>layout_height</li><li>orientation</li></ul><p>atribut layout_width dan layout_height dapat menggunakan salah satu nilai dibawah ini :</p><ul><li><strong>match_parent</strong> : membuat tampilan sesuai dengan <em>parent</em> dari viewGroup</li><li><strong>wrap_content : </strong>tampilan akan menyesuaikan dengan isi atau konten. Jika tidak terdapat konten, maka view ini tidak akan terlihat.</li><li><strong>Fixed number dp</strong>: membuat tampilan sesuai dengan angka yang pasti</li></ul><p>Nilai dari orientasi dapat berupa :</p><ul><li>Horizontal : view akan disusun dari kiri ke kanan</li><li>Vertikal : view akan disusun dari atas ke bawah</li></ul>',
                'material_image' => 'public/material/1624508479.png',
                'video' => NULL,
                'point' => 200,
                'created_at' => '2021-06-24 04:21:03',
                'updated_at' => '2021-06-24 04:21:19',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Tampilan mu selesai!',
                'material_text' => '<h3>Yeay, selamat Kamu dapat mengubah tampilan dari aplikasimu!</h3><p>Kamu sudah bisa untuk mengatur dari tampilan aplikasimu agar semakin menarik untuk dilihat dan dapat menyesesuaikan di berbagai perangkat. Tetap Belajar dan terus mencoba berbagai jenis tampilan untuk mengasah keterampilanmu dalam menyusun tampilan antarmuka di Android. tetap semangat dan Jangan Menyerah!</p><p><br></p><blockquote>Sampai bertemu di kelas lainya!</blockquote>',
                'material_image' => 'public/material/1624508829.png',
                'video' => NULL,
                'point' => 300,
                'created_at' => '2021-06-24 04:27:09',
                'updated_at' => '2021-06-24 04:27:09',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Pengenalan Java',
            'material_text' => '<p>Java merupakan sebuah bahasa pemograman yang dibuat oleh James Gosling yang terinspirasi dari kopi yang diminum olehnya. Sintaks dari Java memiliki kemiripan dengan bahasa pemograman C/C++ karena Java memang terinspirasi dari kedua bahasa tersebut. Java dirancang untuk tujuan umum dan sepenuhnya menggunakan konsep OOP (Object Oriented Programming).</p><p><br></p><h2>Kelebihan dari bahasa Java </h2><p><br></p><h3>General Purpose</h3><p>Bahasa Java bersifat <strong>General Purpose</strong>, atau dapat diartikan bahasa Java tidak hanya dipakai untuk membuat suatu program spesifik, dimana java dapat digunakan untuk dekstop, web, ataupun android.</p><h3>Cross platform </h3><p>Java dapat berjalan pada platform yang bermacam-macam seperti di Linux,Windows, ataupun MacOs</p><h3>Populer</h3><p>Java termasuk kedalam bahasa pemograman yang populer sehingga memiliki komunitas yang banyak. </p>',
                'material_image' => 'public/material/1624511182.png',
                'video' => NULL,
                'point' => 50,
                'created_at' => '2021-06-24 05:06:22',
                'updated_at' => '2021-06-24 05:06:22',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Sintaks Java',
            'material_text' => '<p>Dalam setiap bahasa memiliki struktur dan aturan penulisan yang berbeda-beda. Java memiliki kemiripan dengan penulisan bahasa C karena java dikembangan dari bahasa C.</p><p>Struktur dasar di dalam bahasa pemograman java dibagi menjadi 4 bagian :</p><ul><li>Deklarasi package</li><li>Impor Library</li><li>Bagian Class</li><li>Method main</li></ul><p><br></p><h3>Deklarasi Package </h3><p>Package merupakan sebuah folder yang berisi kumpulan dari program java. Biasanya nama package akan mengikuti nama dari domain sebuah vendor yang mengeluarkan program tersebut</p><p><br></p><h3>Impor Library</h3><p>Library merupakan sekumpulan <em>class</em> dan fungsi yang dapat digunakan untuk membuat progam</p><p><br></p><h3>Class</h3><p>Java merupakan bahasa pemograman yang menggunakan konsep OOP. Setiap prgogram yang ada harus dibungkus didalam class agar bisa dibuat menjadi objek.</p><p><br></p><h3>Method Main</h3><p>Method main() atau fungsi main() merupakan blok program yang akan dijalankan pertama kali. Method ini wajib untuk dibuat, jika tidak maka program tidak akan bisa dieksekusi</p><p><br></p><h3>Komentar pada Java</h3><p>Komentar merupakan bagian yang tidak akan dieksekusi oleh komputer. Pada Java untuk membuat komentar maka akan menggunakan // untuk single line comment atau /*....*/ untuk komentar yang lebih dari satu baris</p>',
                'material_image' => 'public/material/1624511718.png',
                'video' => NULL,
                'point' => 100,
                'created_at' => '2021-06-24 05:15:18',
                'updated_at' => '2021-06-24 05:15:18',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Tipe Data dan Variabel',
                'material_text' => '<p>Apa itu Variabel? Variabel merupakan tempat untuk menyimpan suatu nilai. Tipe data merupakan jenis data yang tersimpan di dalam variabel. dalam bahasa pemograman Java terdapat berbagai macam tipe data. Berikut macam-macam dari tipe data yang tedapat dalam bahasa Java.</p><p><br></p><h3>Macam-macam tipe data :</h3><ul><li>char : tipe data karakter</li><li>int : tipe data untuk angka atau bilangan bulat</li><li>float : tipe data untuk angka decimal</li><li>double : tipe data untuk desimal, tetapi lebih besar kapasitasnya</li><li>String : tipe data untuk kata</li><li>boolean : tipe data yang hanya bernilai true dan false</li></ul><p><br></p><h3>Membuat Variabel</h3><p>format untuk membuat variabel dalam Java adalah &lt;tipe data&gt; nama variabel; </p><p>contoh :</p><p>int namaVariabel;</p><p>int namaVariabel = 10;</p><p><br></p><h3>Aturan dalam penulisan Variabel</h3><ul><li>nama variabel tidak boleh menggunakan kata kunci dari Java </li><li>nama variabel diawali dengan huruf kecil, karena Java menggunakan gaya penulisan camelCase.</li><li>apabila nama variabel lebih dari 1 suku kata, maka kata ke-2 dituliksan dengan huruf besar</li></ul>',
                'material_image' => 'public/material/1624512396.png',
                'video' => NULL,
                'point' => 210,
                'created_at' => '2021-06-24 05:26:36',
                'updated_at' => '2021-06-24 05:26:36',
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'Operator Java',
            'material_text' => '<p>Operator pada pemograman digunakan untuk melakukan operasi tertentu. Pada Java terdapat 6 operator pemograman Java :</p><ul><li>Aritmatika</li><li>Penugasan</li><li>Pembanding</li><li>Logika</li><li>Bitwise</li><li>Ternary</li></ul><p><br></p><h2>1. Operator Aritmatika</h2><p>Operator ini akan terdiri dari :</p><ul><li>+ (penjumlahan)</li><li>- (pengurangan)</li><li>* (perkalian)</li><li>/ (pembagian)</li><li>% (sisa bagi)</li></ul><p><br></p><h2>2. Operator Penugasan</h2><p>Operator penugasan memiliki fungsi untuk memberikan tugas pada sebuah variabel, biasanya untuk mengisi nilai. Operator penugasan terdiri dari :</p><ul><li>=     (pengisian nilai)</li><li>+=   (pengisian dan penambahan)</li><li>-=    (pengisian dan pengurangan)</li><li>*=    (pengisian dan perkalian)</li><li>/=    (pengisian dan pembagian)</li><li>%=  (pengisian dan sisa bagi)</li></ul>',
                'material_image' => 'public/material/1624513289.png',
                'video' => NULL,
                'point' => 200,
                'created_at' => '2021-06-24 05:41:29',
                'updated_at' => '2021-06-24 05:41:29',
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'Jalankan programmu!',
                'material_text' => '<p>Selamat! Kamu sudah bisa menuliskan progam dalam bahasa Java.</p><p>Tetap belajar untuk mendalalami bahasa pemograman Java.</p><p>Semangag!</p>',
                'material_image' => 'public/material/1624513410.png',
                'video' => NULL,
                'point' => 300,
                'created_at' => '2021-06-24 05:43:30',
                'updated_at' => '2021-06-24 05:43:30',
            ),
        ));
        
        
    }
}