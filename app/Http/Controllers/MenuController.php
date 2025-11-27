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
        'gambar' => 'images/Soto ayam.png',
        'ulasan' => [
            ['nama' => 'Dian', 'komentar' => 'Sotonya enak, kuahnya gurih banget!'],
            ['nama' => 'Rara', 'komentar' => 'Porsinya pas, cocok untuk acara besar.']
        ]
    ],

    'Nasi-Ayam-Goreng' => [
        'nama' => 'Nasi Ayam Goreng',
        'harga' => 15000,
        'minimal' => 15,
        'rating' => 5.0,
        'deskripsi' => 'Nikmati kelezatan ayam goreng berbumbu khas rumahan.',
        'gambar' => 'images/Nasi ayam goreng.png',
        'ulasan' => [
            ['nama' => 'Novi', 'komentar' => 'Ayamnya gurih, sambalnya mantap!'],
            ['nama' => 'Riko', 'komentar' => 'Porsinya banyak dan harganya pas.']
        ]
    ],

    'nasi-pecal' => [
        'nama' => 'Nasi Pecal',
        'harga' => 12000,
        'minimal' => 50,
        'rating' => 4.0,
        'deskripsi' => 'Nasi Pecel khas Teras Bu Rini.',
        'gambar' => 'images/Nasi pecal.png',
        'ulasan' => [
            ['nama' => 'Santi', 'komentar' => 'Sayurnya segar, sambalnya mantap.'],
            ['nama' => 'Vina', 'komentar' => 'Cocok buat makan siang rame-rame.']
        ]
    ],

    'sate-ayam' => [
        'nama' => 'Sate Ayam',
        'harga' => 10000,
        'minimal' => 50,
        'rating' => 4.7,
        'deskripsi' => 'Sate ayam empuk dengan bumbu kacang kental.',
        'gambar' => 'images/Sate Ayam.png',
        'ulasan' => [
            ['nama' => 'Bambang', 'komentar' => 'Bumbunya enak banget, manis gurih.'],
            ['nama' => 'Laila', 'komentar' => 'Dagingnya lembut dan tidak alot.']
        ]
    ],

    'sop-sayur' => [
        'nama' => 'Sop Sayur',
        'harga' => 10000,
        'minimal' => 50,
        'rating' => 4.7,
        'deskripsi' => 'Sop sayur segar dengan kuah gurih ringan.',
        'gambar' => 'images/sayur sop.png',
        'ulasan' => [
            ['nama' => 'Maya', 'komentar' => 'Sayurnya fresh semua.'],
            ['nama' => 'Nanda', 'komentar' => 'Kuahnya enak, cocok untuk acara makan sehat.']
        ]
    ],

    'mie-goreng-telur' => [
        'nama' => 'Mie Goreng Telur',
        'harga' => 9000,
        'minimal' => 15,
        'rating' => 4.7,
        'deskripsi' => 'Mie goreng gurih dengan telur yang harum dan lembut.',
        'gambar' => 'images/mie goreng.png',
        'ulasan' => [
            ['nama' => 'Fina', 'komentar' => 'Rasanya enak dan tidak terlalu berminyak.'],
            ['nama' => 'Dede', 'komentar' => 'Simple tapi nagih banget.']
        ]
    ],

    'mie-rebus-telur' => [
        'nama' => 'Mie Rebus Telur',
        'harga' => 7000,
        'minimal' => 15,
        'rating' => 4.7,
        'deskripsi' => 'Mie rebus dengan kuah gurih dan telur rebus.',
        'gambar' => 'images/mie rebus.png',
        'ulasan' => [
            ['nama' => 'Ayu', 'komentar' => 'Kuahnya sedap, porsinya pas.'],
            ['nama' => 'Fadil', 'komentar' => 'Enak disantap saat cuaca dingin.']
        ]
    ],

    'bakwan-kawi-bakso' => [
        'nama' => 'Bakwan Kawi Bakso',
        'harga' => 6000,
        'minimal' => 50,
        'rating' => 4.5,
        'deskripsi' => 'Bakwan kawi dengan kuah gurih khas Malang.',
        'gambar' => 'images/bakwan kawi.png',
        'ulasan' => [
            ['nama' => 'Seno', 'komentar' => 'Kuahnya sedap banget.'],
            ['nama' => 'Ira', 'komentar' => 'Porsinya pas dan nagih.']
        ]
    ],

    'Teh' => [
        'nama' => 'Teh',
        'harga' => 6000,
        'minimal' => 50,
        'rating' => 4.5,
        'deskripsi' => 'Teh hangat/dingin manis pas.',
        'gambar' => 'images/teh manis.png',
        'ulasan' => [
            ['nama' => 'Lulu', 'komentar' => 'Manisnya pas, segar banget.'],
            ['nama' => 'Tono', 'komentar' => 'Enak buat minum bareng gorengan.']
        ]
    ],

    'wedang-jahe-merah-susu' => [
        'nama' => 'Wedang Jahe Merah Susu',
        'harga' => 8000,
        'minimal' => 50,
        'rating' => 4.6,
        'deskripsi' => 'Jahe merah berpadu susu yang nikmat.',
        'gambar' => 'images/wedang susu jahe.png',
        'ulasan' => [
            ['nama' => 'Yuni', 'komentar' => 'Anget banget, enak diminum malam hari.'],
            ['nama' => 'Ardi', 'komentar' => 'Rasanya creamy tapi tetap pedas jahe.']
        ]
    ],

    'kopi-hitam' => [
        'nama' => 'Kopi Hitam',
        'harga' => 5000,
        'minimal' => 50,
        'rating' => 4.4,
        'deskripsi' => 'Kopi hitam klasik dengan aroma kuat.',
        'gambar' => 'images/kopi hitam.png',
        'ulasan' => [
            ['nama' => 'Bagas', 'komentar' => 'Kuat tapi enak, bikin melek.'],
            ['nama' => 'Nisa', 'komentar' => 'Favorit bapak-bapak di rumah.']
        ]
    ],

    'wedang-jahe-merah' => [
        'nama' => 'Wedang Jahe Merah',
        'harga' => 5000,
        'minimal' => 50,
        'rating' => 4.4,
        'deskripsi' => 'Jahe merah hangat dengan gula aren.',
        'gambar' => 'images/wedang jahe merah.png',
        'ulasan' => [
            ['nama' => 'Sari', 'komentar' => 'Hangatnya pas, pedasnya mantap.'],
            ['nama' => 'Wawan', 'komentar' => 'Cocok buat cuaca dingin.']
        ]
    ],

    'tempe-mendoan' => [
        'nama' => 'Tempe Mendoan',
        'harga' => 5000,
        'minimal' => 50,
        'rating' => 3.0,
        'deskripsi' => 'Tempe mendoan lembut dan gurih.',
        'gambar' => 'images/tempe mendoan.png',
        'ulasan' => [
            ['nama' => 'Rika', 'komentar' => 'Lembut banget, cocok pakai kecap.'],
            ['nama' => 'Doni', 'komentar' => 'Enak tapi cepat lembek.']
        ]
    ],

    'bakwan' => [
        'nama' => 'Bakwan',
        'harga' => 2000,
        'minimal' => 50,
        'rating' => 3.0,
        'deskripsi' => 'Bakwan goreng renyah dan gurih.',
        'gambar' => 'images/Bakwan.png',
        'ulasan' => [
            ['nama' => 'Citra', 'komentar' => 'Renyaaah, mantap buat camilan.'],
            ['nama' => 'Agus', 'komentar' => 'Rasanya pas buat harga segini.']
        ]
    ],

    'bolu-kukus-pandan-original' => [
        'nama' => 'Bolu Kukus Pandan Original',
        'harga' => 25000,
        'minimal' => 50,
        'rating' => 5.0,
        'deskripsi' => 'Bolu kukus lembut dengan aroma pandan.',
        'gambar' => 'images/bolu kukus pandan.png',
        'ulasan' => [
            ['nama' => 'Mega', 'komentar' => 'Lembut banget, wangi pandan.'],
            ['nama' => 'Rio', 'komentar' => 'Cocok buat acara keluarga.']
        ]
    ],

    'bolu-kukus-pandan-keju' => [
        'nama' => 'Bolu Kukus Pandan Keju',
        'harga' => 30000,
        'minimal' => 50,
        'rating' => 5.0,
        'deskripsi' => 'Bolu pandan dengan taburan keju melimpah.',
        'gambar' => 'images/bolu kukus pandan keju.png',
        'ulasan' => [
            ['nama' => 'Tia', 'komentar' => 'Manis dan gurihnya pas!'],
            ['nama' => 'Faris', 'komentar' => 'Keju banyak, bolunya lembut.']
        ]
    ],

    'jahe-merah' => [
        'nama' => 'Jahe Merah Instan',
        'harga' => 30000,
        'minimal' => 50,
        'rating' => 4.7,
        'deskripsi' => 'Jahe merah instan praktis dan menyehatkan.',
        'gambar' => 'images/Produk5.png',
        'ulasan' => [
            ['nama' => 'Nina', 'komentar' => 'Pedasnya pas, bikin hangat badan.'],
            ['nama' => 'Yoga', 'komentar' => 'Manisnya pas, enak diminum tiap pagi.']
        ]
    ],

    'telur-asin' => [
        'nama' => 'Telur Asin',
        'harga' => 3500,
        'minimal' => 50,
        'rating' => 4.3,
        'deskripsi' => 'Telur asin gurih dengan tekstur lembut.',
        'gambar' => 'images/Telur asin.png',
        'ulasan' => [
            ['nama' => 'Rudi', 'komentar' => 'Asinnya pas, tidak terlalu kuat.'],
            ['nama' => 'Mila', 'komentar' => 'Cocok jadi lauk pendamping.']
        ]
    ],
];      
        if (!isset($data[$slug])) {
            abort(404);
        }

        $menu = $data[$slug];

        return view('layouts.menu.menu_detail', compact('menu'));
    }
}