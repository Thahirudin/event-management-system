<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'id_organizer' => '1',
            'id_kategori' => '2',
            'nama_event' => 'Lazada Fest Concert',
            'slug' => 'lazada-fest-concert',
            'waktu' => '2023-12-13 16:00:00',
            'lokasi' => 'Jakarta',
            'detail' => '<h2><strong>Highlight</strong></h2>

<p>Konser Musik Lazada Fest 12.12 akan hadir di Jakarta, Makassar, dan Surabaya bersama musisi internasional, Red Velvet dan SHINee&#39;s KEY juga musisi Rizky Febian, Vierratale, Raisa, Tiara Andini, Maliq &amp; D&rsquo;Essentials, TULUS, Isyana Sarasvati dan Kahitna. Yuk beli tiketnya sebelum kehabisan!</p>

<h2><strong>Deskripsi</strong></h2>

<p>Everyone, Get Ready! Konser Musik Lazada Fest 12.12 akan hadir di Jakarta, Makasar dan Surabaya yang pastinya bakal seru habis-habisan. Dengan line up Musisi Internasional &amp; nasional:<br />
<br />
<strong>Jakarta</strong><br />
Line Up: Red Velvet dan SHINee&#39;s KEY . Rizky Febian, Vierratale<br />
Tanggal: 13 Desember 2023<br />
Waktu: 18.00 WIB<br />
Lokasi: Indonesia Arena, Jakarta<br />
<br />
Jakarta Floor Plan&nbsp;</p>

<h2><strong>Syarat &amp; Ketentuan</strong></h2>

<ul>
	<li>Pembelian tiket dianggap berhasil/selesai setelah pembayaran Anda berhasil diverifikasi. Konfirmasi pembayaran akan kami kirimkan ke email yang Anda gunakan saat melakukan pembelian.</li>
	<li>Dengan menyelesaikan proses pembelian, maka Anda telah setuju untuk menerima email konfirmasi berupa notifikasi pembelian tiket diterima, pembayaran expired, pembayaran berhasil/E-Tiket disertai dengan kode tiket dan QR code, pembatalan pesanan dan notifikasi lain terkait acara yang Anda akan ikuti.</li>
	<li>Tiket tidak dapat direfund.&nbsp;</li>
</ul>',
            'kontak' => '089628437540',
            'thumbnail' => '20231204155718-Lazada Fest Concert.jpg',
            'status' => 'Akan Datang',
        ]);
        Event::create([
            'id_organizer' => '2',
            'id_kategori' => '2',
            'nama_event' => 'Bogor Colorrun 2023',
            'slug' => 'bogor-colorrun-2023',
            'waktu' => '2023-12-14 12:00:00',
            'lokasi' => 'Bogor',
            'detail' => '<h2><strong>Highlight</strong></h2>

<p>BOGOR COLORRUN 2023 , More Fun, More Healty , and More Colorfull</p>

<h2><strong>Deskripsi</strong></h2>

<p>Siap-siap untuk menghadiri Bogor Color Run 2023!</p>

<p>Sebuah event seru yang akan menggabungkan olahraga dan keceriaan dalam satu kesempatan yang nggak boleh dilewatkan. Di sini, kamu bisa mengikuti fun run dengan jarak 5 kilometer yang penuh warna-warni sehingga pengalaman larimu jadi berbeda dan menyenangkan. Ini adalah kesempatan emas bagi kamu untuk menghabiskan akhir pekan bersama keluarga, teman, atau bahkan berkenalan dengan orang baru sambil berolahraga.</p>

<p>Nggak cuma lari aja, Bogor Color Run 2023 akan menghadirkan hiburan seru dari Bondan Prakoso, DJ Avriel Key, dan masih banyak lagi. Menangkan juga hadiah doorprize untuk kamu yang beruntung. Catat tanggalnya ya, detikers!</p>

<p>Hari/Tanggal : Minggu, 12 November 2023<br />
Lokasi : Taman Budaya Sentul City<br />
Waktu : 06.00 WIB-selesai</p>

<p>Kamu bisa mendapatkan tiket Presale seharga Rp 205.000 hingga 31 Oktober 2023. Harga tiket sudah termasuk:<br />
Jersey<br />
BiB number<br />
String bag<br />
Kacamata<br />
Kupon doorprize<br />
Refreshment<br />
Asuransi</p>

<p>Jadi, tunggu apa lagi? Daftar sekarang juga dan siap-siap merasakan keseruan yang tak terlupakan di Bogor Color Run 2023. Ayo, kita berlari dan berwarna bersama-sama!</p>

<h2><strong>Syarat &amp; Ketentuan</strong></h2>

<ul>
	<li>Pembelian tiket dianggap berhasil/selesai setelah pembayaran Anda berhasil diverifikasi. Konfirmasi pembayaran akan kami kirimkan ke email yang Anda gunakan saat melakukan pembelian.</li>
	<li>Dengan menyelesaikan proses pembelian, maka Anda telah setuju untuk menerima email konfirmasi berupa notifikasi pembelian tiket diterima, pembayaran expired, pembayaran berhasil/E-Tiket disertai dengan kode tiket dan QR code, pembatalan pesanan dan notifikasi lain terkait acara yang Anda akan ikuti.</li>
	<li>Tiket tidak dapat direfund.&nbsp;</li>
</ul>',
            'kontak' => '089628437540',
            'thumbnail' => '20231204155537-Bogor Colorrun 2023.png',
            'status' => 'Akan Datang',
        ]);
        Event::create([
            'id_organizer' => '1',
            'id_kategori' => '4',
            'nama_event' => 'Bumil Time',
            'slug' => 'bumil-time',
            'waktu' => '2023-12-14 09:00:00',
            'lokasi' => 'Mayapada Hospital Surabaya (MHSB), Jalan Mayjen Sungkono, Pakis, Surabaya, East Java, Indonesia',
            'detail' => '<h2><strong>Highlight</strong></h2>

<p>Mayapada Hospital Surabaya bersama HaiBunda menghadirkan acara Bumil Time dengan tema &ldquo;Awas! Ibu Hamil Bukan Cuma Waspada Makanan, Tapi Juga Kemasannya&ldquo;</p>

<h2><strong>Deskripsi</strong></h2>

<p>Hai, Bunda!</p>

<p>Asupan makanan dan minuman yang bergizi sangat penting untuk diperhatikan Bumil. Kesehatan Bumil adalah prioritas utama dalam memastikan perkembangan yang sehat bagi bayi di dalam kandungan. Makanan yang dikonsumsi oleh Bumil harus mengandung protein, karbohidrat, serat, vitamin, serta mineral yang seimbang.</p>

<p>Tapi, Bunda tahu nggak, sih? Ternyata bukan hanya gizi dari makanan dan minuman yang perlu Bunda perhatikan. Kemasan dari makanan dan minuman juga penting untuk diperhatikan. Kemasan yang mengandung Bisphenol A (BPA) diketahui berdampak besar pada kesehatan janin.</p>

<p>Supaya Bunda lebih paham, Mayapada Hospital Surabaya bersama HaiBunda menghadirkan acara Bumil Time dengan tema&nbsp;<strong>&ldquo;Kupas Tuntas Bahaya BPA Pada Kemasan Makanan dan Minuman Bagi Ibu Hamil&ldquo;</strong></p>

<p>Dalam acara ini, Bunda bisa belajar langsung dari dr. Uning Marlina, MHSM, SpOG, selaku Spesialis Kebidanan &amp; Kandungan. Selain membahas secara mendalam mengenai kemasan berbahaya untuk Bumil, dr. Uning Marlina juga akan memberikan tips untuk memilih makanan dan minuman serta kemasannya yang aman.&nbsp;</p>

<p><strong>Catat tanggal dan lokasinya sekarang juga, Bun!</strong></p>

<p><strong>Tanggal : Sabtu, 4 November 2023</strong></p>

<p><strong>Waktu : 08.00 - selesai</strong></p>

<p><strong>Tempat : Auditorium MHSB Lantai 18, RS Mayapada Surabaya</strong></p>

<p>Selain itu, di acara ini Bunda juga dapat mengikuti kelas prenatal yoga couple yang dipandu oleh I Gusti Ayu Dwi Kristinawati, AMd, SH. Prenatal yoga dapat membantu Bunda untuk menjaga kesehatan fisik dan mental selama kehamilan hingga persalinan.</p>

<p>Jangan sampai kelewatan ya Bun, daftar sekarang karena kuota terbatas!</p>

<h2><strong>Syarat &amp; Ketentuan</strong></h2>

<p>1. Pemesanan tiket dianggap berhasil/selesai setelah Anda menyelesaikan seluruh proses pemesanan tiket.</p>

<p>2. Setelah berhasil melakukan pemesanan tiket maka status Anda adalah pending, hal ini berarti pesanan tiket Anda sedang menunggu diterima/disetujui/approve &nbsp;atau&nbsp; ditolak oleh tim detikEvent.</p>

<p>3. Apabila pemesanan tiket tersebut telah diterima oleh tim detikEevent maka Anda akan menerima email konfirmasi berupa notifikasi pemesanan tiket diterima dan mendapatkan E-Tiket disertai dengan kode tiket dan QR code.</p>',
            'kontak' => '089628437540',
            'thumbnail' => '20231204165300-Bumil Time.jpg',
            'status' => 'Akan Datang',
        ]);
        Event::create([
            'id_organizer' => '1',
            'id_kategori' => '3',
            'nama_event' => 'UMKM Day 2023 - Membangun Masa Depan UMKM Bersama',
            'slug' => 'umkm-day-2023-membangun-masa-depan-umkm-bersama',
            'waktu' => '2023-12-07 12:00:00',
            'lokasi' => 'Graha Sanusi Hardjadinata, Jalan Dipati Ukur, Lebak Gede, Bandung City, West Java, Indonesia',
            'detail' => '<h2><strong>Highlight</strong></h2>

<p>Alfamart bersama detikcom mengajak kamu untuk belajar menyusun dan mengembangkan strategi pengembangan bisnis mu lho, jangan lewatkan kesempatannya dan daftarkan dirimu detik ini juga!</p>

<h2><strong>Deskripsi</strong></h2>

<p>Sebagai pelaku UMKM, tuntutan untuk menjadi inovatif dan terus maju akan selalu datang. Oleh karenanya, Alfamart mengadakan Alfamart UMKM Day 2023 dengan tema &lsquo;Membangun Masa Depan UMKM Bersama&rsquo;.</p>

<p>Acara ini merupakan bincang santai bersama narasumber terkait strategi pengembangan bisnis bagi masyarakat umum maupun pelaku UMKM yang terbagi dalam dua sesi.</p>

<p>Dalam sesi pertama kamu akan belajar seputar cara &lsquo;Pikat Konsumen Agar Beli Produk dalam 5 Detik dengan kemasan yang Menarik&rsquo; dan pada sesi kedua akan membahas menganai &lsquo;Rahasia Ciptakan Pelanggan Setia untuk Tingkatkan Cuan Tak Terhingga.&rsquo;</p>

<p>Alfamart UMKM Day 2023 turut mengundang berbagai pembicara ahli yang akan membantu meningkatkan bisnismu seperti Prof. Poppy Rufaidah (Akademisi FEB UNPAD), Reymond Lee, S.Sn (Founder Lee Design &amp; Pack Me Up), dan Joko Ristono (CRM Specialist).</p>

<p>Penampilan hiburan dari PSM UNPAD dan kesempatan untuk memenangkan doorprize senilai total 25 juta rupiah juga menanti kamu!</p>

<p>Semakin tertarik untuk ikutan? Catat tanggal dan waktunya, ya!</p>

<p>Hari, tanggal : Senin, 4 Desember 2023<br />
Waktu : 08.00 - 15.00 WIB<br />
Lokasi : Gedung Graha Sanusi UNPAD, Jalan Dipati Ukur No, 35 Bandung</p>

<p>Daftar sekarang juga karena acara ini 100% GRATIS!</p>',
            'kontak' => '089628437540',
            'thumbnail' => '20231204170019-UMKM Day 2023 - Membangun Masa Depan UMKM Bersama.jpg',
            'status' => 'Akan Datang',
        ]);
        Event::create([
            'id_organizer' => '1',
            'id_kategori' => '1',
            'nama_event' => 'Demi Indonesia',
            'slug' => 'demi-indonesia',
            'waktu' => '2023-10-27 12:00:00',
            'lokasi' => 'THE HALL BALLROOM - SENAYAN CITY, Jalan Asia Afrika No, RT.1/RW.3, Gelora, Central Jakarta City, Jakarta, Indonesia',
            'detail' => '<h2><strong>Highlight</strong></h2>

<p>Ingin ikut membuat gebrakan untuk Indonesia? Yuk, datang ke &lsquo;Demi Indonesia&rsquo;! Acara ini digelar dalam rangka memperingati Hari Sumpah Pemuda. banyak ikon dan tokoh penting tanah air lho! Buruan daftarkan diri kamu karena kuota terbatas! Sssst.. Ada Doorprize Iphone 15 dan Macbook Air M1 lho!</p>

<h2><strong>Deskripsi</strong></h2>

<p>Ingin ikut membuat gebrakan untuk Indonesia? Salah satu cara yang dapat kamu lakukan yaitu datang ke &lsquo;<strong>Demi Indonesia</strong>&rsquo;! Acara ini digelar dalam rangka&nbsp;<strong>memperingati Hari Sumpah Pemuda</strong>.</p>

<p>Di sini kamu bisa bertemu dengan banyak ikon dan tokoh penting tanah air. Bersama para pemimpin dan inspirator muda, masing-masing dari mereka akan berbagi cerita dan perjuang luar biasa dalam membanggakan Indonesia.&nbsp;</p>

<p>Ada beragam segmen acara yang seru dan bisa kamu ikuti semuanya secara gratis. Penasaran ada apa saja?&nbsp;</p>

<p><strong>1. BEDA SERVER SATU BAHASA</strong></p>

<p>Menghadirkan tokoh inspiratif seperti Gus Miftah dan&nbsp; Bhante Dhira yang akan membahas seputar keanekaragaman dan pentingnya persaudaraan dalam perbedaan.</p>

<p><strong>2. BERBEDA-BEDA TAPI FUN JUGA</strong></p>

<p>Ngomongin Indonesia tapi sambil santai dan ketawa? Bisa dong! Di segmen ini kamu akan menyaksikan perpaduan Abdur Arsyad, Ferry Irwandi, dan Presiden Gen Z, Rian Farhadi, yang akan membahas tentang demokrasi dan pentingnya pemuda untuk aktif berpartisipasi dalam politik. Kelucuan mereka dijamin bakal mengocok perut.</p>

<p><strong>3. BEDA CARA BIKIN BANGGA +62</strong></p>

<p>Anak-anak bangsa yang membanggakan seperti Greysia Polii akan datang untuk menceritakan kisahnya dalam mencetak prestasi demi Indonesia.</p>

<p>Selain ketiga segmen acara di atas, kamu juga akan terhibur oleh penampilan dari Project Pop. Dipandu host kece Arif Brata, dijamin akan banyak ilmu berharga yang bisa dipetik sekaligus canda tawa yang membuatmu tertawa.</p>

<p><strong>Acara akan dilaksanakan&nbsp; pada:</strong></p>

<p><strong>Hari, tanggal&nbsp;:&nbsp;</strong>Jumat, 27 Oktober 2023</p>

<p><strong>Waktu&nbsp;:&nbsp;</strong>13.30 WIB - selesai</p>

<p><strong>Lokasi&nbsp;:&nbsp;</strong>The Hall, Senayan City Lantai 8&nbsp;</p>

<p>Yakin mau melewatkan kesempatan hadir di acara ini? Apalagi akan ada&nbsp;<strong>Doorprize menarik yaitu&nbsp;Iphone 15 dan Macbook Air serta masih banyak hadiah lainnya!!</strong>&nbsp;Yuk,&nbsp;Buruan daftarkan diri kamu karena kuota terbatas!&nbsp;</p>

<p>Jangan lupa juga untuk ungkapkan rasa cinta dan kebangsaan terhadap Indonesia sekarang juga di detik.com/demipemudaindonesia</p>',
            'kontak' => '20231204170704-Demi Indonesia.jpg',
            'thumbnail' => '20231204170947-Demi Indonesia.jpg',
            'status' => 'Akan Datang',
        ]);
    }
}