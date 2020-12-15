<?php

use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class obat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = array('obat bebas','obat bebas terbatas','obat keras dan psikotropika','narkotika','tradisional','herbal tersetandar','fitofarmaka');
        $satuan = array('Pulvis (serbuk)', 'Pulveres', 'Tablet (compressi)', 'Pil (pilulae)', 'Kapsul (capsule)', 'Kaplet (kapsul tablet)', 'Larutan (solutiones)', 'Suspensi (suspensiones)', 'Emulsi (elmusiones)', 'Galenik', 'Ekstrak (extractum)', 'Infusa', 'Imunoserum (immunosera)', 'Salep (unguenta)', 'Suppositoria', 'Obat tetes (guttae)', 'Injeksi (injectiones)');
        $harga = array(2500, 3500, 1500, 4500, 4000);
        for ($i=0; $i < 50; $i++) {
            $rand_keys_kategori = array_rand($kategori, 1);
            $rand_keys_harga = array_rand($harga, 1);
            $rand_keys_satuan = array_rand($satuan, 1);
            DB::table('obat')->insert([
                "nama_obat" => str_shuffle('nama obat sementara'),
                "kategori_obat" => $kategori[$rand_keys_kategori],
                "kadaluarsa" => Carbon::create(2038, 01, 19, 3, 14, 7, 'UTC'),
                "satuan" => $satuan[$rand_keys_satuan],
                "harga_obat" => $harga[$rand_keys_harga],
                "deskripsi_obat" => "obat dipergunakan dengan baik ya",
                "stock" =>  50,
                "suplier" =>  rand(1,20),
                "add_at" => Carbon::now(),
            ]);
        }
    }
}
