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
                'deskripsi' => 'Kuahnya bening, rasanya gurih ringan, dan penuh sayuran segar seperti wortel, kentang, buncis, dan kol. Cocok disantap kapan saja — baik untuk menu harian, acara keluarga, maupun sajian pendamping di paket catering.  Disajikan hangat dengan aroma bawang goreng yang khas, Sop Sayur ini bukan cuma sehat, tapi juga bikin nyaman di setiap suapan.',
                'gambar' => 'images/sayur sop.png'
            ],
        'mie-goreng-telur' => [
                'nama' => 'Mie Goreng Telur',
                'harga' => 10000,
                'minimal' => 50,
                'rating' => 4.7,
                'deskripsi' => 'Kuahnya bening, rasanya gurih ringan, dan penuh sayuran segar seperti wortel, kentang, buncis, dan kol. Cocok disantap kapan saja — baik untuk menu harian, acara keluarga, maupun sajian pendamping di paket catering.  Disajikan hangat dengan aroma bawang goreng yang khas, Sop Sayur ini bukan cuma sehat, tapi juga bikin nyaman di setiap suapan.',
                'gambar' => 'images/mie goreng.png'
            ],
        'mie-rebus-telur' => [
                'nama' => 'Mie Rebus Telur',
                'harga' => 10000,
                'minimal' => 50,
                'rating' => 4.7,
                'deskripsi' => 'Kuahnya bening, rasanya gurih ringan, dan penuh sayuran segar seperti wortel, kentang, buncis, dan kol. Cocok disantap kapan saja — baik untuk menu harian, acara keluarga, maupun sajian pendamping di paket catering.  Disajikan hangat dengan aroma bawang goreng yang khas, Sop Sayur ini bukan cuma sehat, tapi juga bikin nyaman di setiap suapan.',
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
        
        
        
        
            
        ];

        if (!isset($data[$slug])) {
            abort(404);
        }

        $menu = $data[$slug];

        return view('layouts.menu.menu_detail', compact('menu'));
    }
}
