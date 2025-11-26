<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function detail($slug)
    {
        // Data contoh - nanti bisa diganti database
        $data = [
            'soto-ayam' => [
                'nama' => 'Soto Ayam',
                'harga' => 15000,
                'minimal' => 15,
                'rating' => 5.0,
                'deskripsi' => 'Soto ayam hangat dengan kuah gurih dan rempah nikmat. Cocok untuk acara keluarga, arisan, dan lainnya.',
                'gambar' => 'images/Soto ayam.png'
            ],

        'Nasi-Ayam-Goreng' => [
                'nama' => 'Nasi Ayam Goreng',
                'harga' => 15000,
                'minimal' => 15,
                'rating' => 5.0,
                'deskripsi' => 'Nikmati kelezatan ayam goreng berbumbu khas rumahan yang digoreng hingga renyah keemasan. Disajikan dengan nasi putih hangat, lalapan segar (timun, kol, dan kemangi), serta sambal pedas yang menggugah selera. Perpaduan gurih, segar, dan pedasnya pas banget buat makan siang atau malam.',
                'gambar' => 'images/Nasi ayam goreng.png'
            ],

        'nasi-pecal' => [
                'nama' => 'Nasi Pecal',
                'harga' => 12000,
                'minimal' => 50,
                'rating' => 4.0,
                'deskripsi' => 'Nasi Pecel khas Teras Bu Rini 🌿Nikmati perpaduan sayur segar, sambal kacang gurih pedas, dan nasi hangat yang bikin kangen masakan rumah. Lengkap dengan tempe goreng renyah dan rempeyek gurih — pas banget buat makan siang atau acara spesial kamu!',
                'gambar' => 'images/Nasi pecal.png'
            ],
        'sate-ayam' => [
                'nama' => 'Sate Ayam',
                'harga' => 10000,
                'minimal' => 50,
                'rating' => 4.7,
                'deskripsi' => 'Potongan daging ayam pilihan yang dipanggang di atas bara arang hingga harum menggoda. Disajikan dengan bumbu kacang kental yang gurih manis, taburan bawang goreng, serta lontong atau nasi hangat. Setiap tusukannya lembut, juicy, dan kaya rasa khas Indonesia yang bikin susah berhenti makan!',
                'gambar' => 'images/Sate Ayam.png'
            ],
        'sop-sayur' => [
                'nama' => 'Sop Sayur',
                'harga' => 10000,
                'minimal' => 50,
                'rating' => 4.7,
                'deskripsi' => 'Kuahnya bening, rasanya gurih ringan, dan penuh sayuran segar seperti wortel, kentang, buncis, dan kol. Cocok disantap kapan saja — baik untuk menu harian, acara keluarga, maupun sajian pendamping di paket catering. Disajikan hangat dengan aroma bawang goreng yang khas, Sop Sayur ini bukan cuma sehat, tapi juga bikin nyaman di setiap suapan.',
                'gambar' => 'images/sayur sop.png'
            ],
        'mie-goreng-telur' => [
                'nama' => 'Mie Goreng Telur',
                'harga' => 10000,
                'minimal' => 50,
                'rating' => 4.7,
                'deskripsi' => 'Kuahnya bening, rasanya gurih ringan, dan penuh sayuran segar seperti wortel, kentang, buncis, dan kol. Cocok disantap kapan saja — baik untuk menu harian, acara keluarga, maupun sajian pendamping di paket catering. Disajikan hangat dengan aroma bawang goreng yang khas, Sop Sayur ini bukan cuma sehat, tapi juga bikin nyaman di setiap suapan.',
                'gambar' => 'images/mie goreng.png'
            ],
        'mie-rebus-telur' => [
                'nama' => 'Mie Rebus Telur',
                'harga' => 10000,
                'minimal' => 50,
                'rating' => 4.7,
                'deskripsi' => 'Kuahnya bening, rasanya gurih ringan, dan penuh sayuran segar seperti wortel, kentang, buncis, dan kol. Cocok disantap kapan saja — baik untuk menu harian, acara keluarga, maupun sajian pendamping di paket catering. Disajikan hangat dengan aroma bawang goreng yang khas, Sop Sayur ini bukan cuma sehat, tapi juga bikin nyaman di setiap suapan.',
                'gambar' => 'images/mie rebus.png'
            ],
        'bakwan-kawi-bakso' => [
                'nama' => 'Bakwan Kawi Bakso',
                'harga' => 6000,
                'minimal' => 50,
                'rating' => 4.5,
                'deskripsi' => 'Hidangan khas Malang yang menggugah selera! Semangkuk bakwan kawi berisi tahu isi, bakso, siomay, dan pangsit goreng yang disiram kuah kaldu gurih hangat. Dilengkapi sambal dan kecap untuk cita rasa pedas manis yang pas. Setiap suapan menghadirkan perpaduan tekstur lembut dan renyah yang bikin nagih! Cocok disantap kapan pun, terutama saat cuaca dingin',
                'gambar' => 'images/bakwan kawi.png'
            ],
        'Teh' => [
                'nama' => 'Teh',
                'harga' => 6000,
                'minimal' => 50,
                'rating' => 4.5,
                'deskripsi' => '🍵 Teh Hangat / DinginMinuman sederhana yang selalu jadi favorit setiap waktu. Rasa manisnya pas, aromanya menenangkan, dan cocok banget buat nemenin makan siang atau sekadar ngobrol santai. Disajikan dalam dua pilihan ukuran:
                🧊 200 ml — Rp 2.000
                🧊 400 ml — Rp 4.000',
                'gambar' => 'images/teh manis.png'
            ],
        'wedang-jahe-merah-susu' => [
                'nama' => 'Wedang Jahe Merah Susu',
                'harga' => 8000,
                'minimal' => 50,
                'rating' => 4.6,
                'deskripsi' => 'Perpaduan hangatnya jahe merah dengan lembutnya susu menghasilkan cita rasa khas yang menenangkan tubuh dan pikiran. Cocok diminum saat cuaca dingin atau malam hari untuk menghangatkan badan dan menambah energi.',
                'gambar' => 'images/wedang susu jahe.png'
        ],
        'kopi-hitam' => [
                'nama' => 'Kopi Hitam',
                'harga' => 5000,
                'minimal' => 50,
                'rating' => 4.4,
                'deskripsi' => 'Kopi klasik dengan aroma kuat dan rasa pahit yang elegan — pilihan tepat bagi pencinta cita rasa autentik. Diseduh dari biji kopi pilihan, menghasilkan sensasi nikmat yang membangkitkan semangat di setiap tegukan. Cocok dinikmati pagi hari atau saat lembur malam.',
                'gambar' => 'images/kopi hitam.png'
        ],
        'wedang-jahe-merah' => [
                'nama' => 'Wedang Jahe Merah',
                'harga' => 5000,
                'minimal' => 50,
                'rating' => 4.4,
                'deskripsi' => 'Minuman hangat tradisional yang kaya manfaat. Terbuat dari jahe merah pilihan yang direbus hingga mengeluarkan aroma khas dan rasa pedas hangat yang menenangkan. Disajikan dengan sedikit gula aren untuk menambah cita rasa manis alami. Cocok diminum saat cuaca dingin atau untuk menghangatkan tubuh setelah beraktivitas seharian.',
                'gambar' => 'images/wedang jahe merah.png'
        ],
        'tempe-mendoan' => [
                'nama' => 'Tempe Mendoan',
                'harga' => 5000,
                'minimal' => 50,
                'rating' => 3.0,
                'deskripsi' => 'Camilan khas Jawa yang selalu menggugah selera! Irisan tempe tipis dilapisi adonan tepung berbumbu bawang dan daun bawang, lalu digoreng setengah matang hingga berwarna kuning keemasan. Hasilnya gurih, lembut, dan harum khas tempe yang baru digoreng. Paling nikmat disantap hangat-hangat dengan sambal kecap pedas atau cabai rawit segar.',
                'gambar' => 'images/tempe mendoan.png'
        ],
        'bakwan' => [
                'nama' => 'Bakwan',
                'harga' => 2000,
                'minimal' => 50,
                'rating' => 3.0,
                'deskripsi' => 'Camilan gorengan favorit yang selalu bikin kangen! Terbuat dari campuran sayuran segar seperti kol, wortel, dan daun bawang yang dibalut adonan tepung gurih, lalu digoreng hingga berwarna keemasan. Teksturnya renyah di luar, lembut di dalam. Nikmat disantap hangat-hangat, apalagi dengan cabai rawit atau saus sambal pedas manis.',
                'gambar' => 'images/Bakwan.png'
        ],
        'bolu-kukus-pandan-original' => [
                'nama' => 'Bolu Kukus Pandan Original',
                'harga' => 25000,
                'minimal' => 50,
                'rating' => 5.0,
                'deskripsi' => 'Bolu kukus lembut dengan aroma pandan yang harum dan rasa manis yang pas. Dibuat dari bahan pilihan dan dikukus sempurna hingga menghasilkan tekstur yang empuk dan mengembang cantik. Warna hijau alaminya menggoda selera, cocok dinikmati bersama teh atau kopi di waktu santai. Setiap gigitan menghadirkan rasa nostalgia kue rumahan yang klasik dan lembut di lidah.',
                'gambar' => 'images/bolu kukus pandan.png'
        ],
        'bolu-kukus-pandan-keju' => [
                'nama' => 'Bolu Kukus Pandan Keju',
                'harga' => 30000,
                'minimal' => 50,
                'rating' => 5.0,
                'deskripsi' => 'Nikmati perpaduan lembutnya bolu kukus pandan dengan gurihnya taburan keju melimpah di atasnya. Dibuat dari bahan berkualitas dengan aroma pandan alami yang harum dan tekstur lembut yang mengembang sempurna. Setiap potongnya menghadirkan rasa manis, gurih, dan wangi yang pas di lidah. Cocok untuk camilan keluarga, oleh-oleh, atau sajian acara spesial',
                'gambar' => 'images/bolu kukus pandan keju.png'
        ],
        'bolu-kukus-pandan-keju' => [
                'nama' => 'Bolu Kukus Pandan Keju',
                'harga' => 30000,
                'minimal' => 50,
                'rating' => 5.0,
                'deskripsi' => 'Nikmati perpaduan lembutnya bolu kukus pandan dengan gurihnya taburan keju melimpah di atasnya. Dibuat dari bahan berkualitas dengan aroma pandan alami yang harum dan tekstur lembut yang mengembang sempurna. Setiap potongnya menghadirkan rasa manis, gurih, dan wangi yang pas di lidah. Cocok untuk camilan keluarga, oleh-oleh, atau sajian acara spesial',
                'gambar' => 'images/bolu kukus pandan keju.png'
        ],
        'bolu-kukus-pandan-keju 15 x 10 x 5 cm' => [
                'nama' => 'Bolu Kukus Pandan Keju 15 x 10 x 5 cm',
                'harga' => 30000,
                'minimal' => 50,
                'rating' => 3.0,
                'deskripsi' => 'Bolu kukus lembut dengan aroma pandan alami yang harum, dipadukan dengan taburan keju gurih di atasnya. Teksturnya empuk dan mengembang sempurna, dengan rasa manis yang pas dan sentuhan keju yang bikin nagih. Dibuat dari bahan pilihan tanpa pengawet, cocok untuk camilan keluarga, bingkisan, atau teman minum teh sore hari.',
                'gambar' => 'images/boluu kukus pandan keju.png'
        ],
        'jahe-merah' => [
                'nama' => 'Jahe Merah Instan',
                'harga' => 30000,
                'minimal' => 50,
                'rating' => 4.7,
                'deskripsi' => 'Nikmati kehangatan alami dari jahe merah pilihan dalam bentuk instan yang praktis dan menyehatkan. Dibuat dari ekstrak jahe merah murni dengan campuran gula aren alami, menghasilkan rasa pedas hangat yang pas di tenggorokan dan menenangkan tubuh. Cocok diminum saat cuaca dingin, setelah beraktivitas, atau untuk menjaga daya tahan tubuh.',
                'gambar' => 'images/Produk5.png'
        ],
        'telur-asin' => [
                'nama' => 'Telur Asin',
                'harga' => 3500,
                'minimal' => 50,
                'rating' => 4.3,
                'deskripsi' => 'Telur asin pilihan dengan rasa gurih khas dan tekstur kuning telur yang lembut serta sedikit berminyak. Dibuat dari telur bebek segar yang diawet secara tradisional menggunakan garam pilihan, menghasilkan cita rasa yang pas — tidak terlalu asin dan tetap nikmat. Cocok dijadikan lauk pendamping nasi hangat, bubur, atau hidangan khas Indonesia lainnya.',
                'gambar' => 'images/Telur asin.png'
        ],
        'bolu-kukus-pandan-original ukuran 15 x 10 x 5 cm' => [
                'nama' => 'Bolu Kukus Pandan Original Rp Ukuran 15 x 10 x 5 cm',
                'harga' => 25000,
                'minimal' => 50,
                'rating' => 4.0,
                'deskripsi' => 'Bolu kukus lembut dengan aroma pandan alami yang khas dan rasa manis yang pas di lidah. Dibuat dari bahan pilihan tanpa pengawet, menghasilkan tekstur empuk, ringan, dan mengembang sempurna. Warna hijau pandannya menggoda selera, cocok untuk camilan keluarga, suguhan tamu, atau teman minum teh sore.',
                'gambar' => 'images/bolu kukus original.png'
        ],
        'mie-rebus-telur' => [
                'nama' => 'Mie Rebus Telur',
                'harga' => 7000,
                'minimal' => 15,
                'rating' => 4.7,
                'deskripsi' => 'Mie Rebus Telur ala Teras Bu Rini dibuat dari mie pilihan dengan kuah gurih beraroma bawang putih dan rempah ringan. Disajikan dengan telur rebus setengah matang yang menambah cita rasa creamy serta taburan daun bawang segar. Cocok dinikmati kapan saja, terutama saat cuaca dingin. Porsi pas, rasa mantap, dan dijamin bikin nagih!',
                'gambar' => 'images/mie rebus.png'
            ],
         'mie-goreng-telur' => [
                'nama' => 'Mie Goreng Telur',
                'harga' => 9000,
                'minimal' => 15,
                'rating' => 4.7,
                'deskripsi' => 'Mie goreng telur ini punya cita rasa gurih dan sedikit manis yang pas. Teksturnya lembut, tidak terlalu berminyak, dan telurnya memberi aroma harum yang bikin nagih. Simpel, tapi rasanya comforting banget.',
                'gambar' => 'images/mie goreng.png'
            ],


        
        
        
        
        
        
            
        ];

        if (!isset($data[$slug])) {
            abort(404);
        }

        $menu = $data[$slug];

        return view('layouts.menu.menu_detail', compact('menu'));
    }
}