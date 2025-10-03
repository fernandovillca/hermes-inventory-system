<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electrónica',
                'description' => 'Dispositivos, gadgets y componentes tecnológicos.'
            ],
            [
                'name' => 'Libros',
                'description' => 'Libros impresos, digitales y audiolibros.'
            ],
            [
                'name' => 'Ropa y Accesorios',
                'description' => 'Prendas de vestir, calzado y complementos de moda.'
            ],
            [
                'name' => 'Hogar y Cocina',
                'description' => 'Artículos para el hogar, menaje y electrodomésticos de cocina.'
            ],
            [
                'name' => 'Deportes y Aire Libre',
                'description' => 'Artículos deportivos, equipos para exteriores y camping.'
            ],
            [
                'name' => 'Juguetes y Juegos',
                'description' => 'Juguetes para niños, juegos de mesa y videojuegos.'
            ],
            [
                'name' => 'Salud y Belleza',
                'description' => 'Productos de cuidado personal, maquillaje y bienestar.'
            ],
            [
                'name' => 'Automotriz',
                'description' => 'Accesorios para vehículos, repuestos y herramientas automotrices.'
            ],
            [
                'name' => 'Arte y Manualidades',
                'description' => 'Materiales de arte, kits de manualidades y suministros de artesanía.'
            ],
            [
                'name' => 'Música y Películas',
                'description' => 'Discos, DVDs, instrumentos musicales y material audiovisual.'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
