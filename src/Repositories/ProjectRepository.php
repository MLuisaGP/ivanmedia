<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Project;

/**
 * Class ProjectRepository
 * Encapsulates data retrieval for portfolio projects.
 */
class ProjectRepository
{
    /**
     * Retrieve all active portfolio projects.
     *
     * @return array<Project>
     */
    public function getAll(): array
    {
        return [
            new Project(
                id: 'costra-asada',
                title: 'Costra sonorense a las brasas',
                category: 'gastronomia',
                tag: 'Gastronomía',
                image: 'assets/fotos/restaurant/taco-costra-queso.jpg',
                description: 'Fotografía gastronómica comercial para La Salsa: detalle macro, textura crujiente y frescura en cada ingrediente.',
                order: 1
            ),
            new Project(
                id: 'cocteleria-autor',
                title: 'Coctelería de autor',
                category: 'gastronomia',
                tag: 'Bebidas',
                image: 'assets/fotos/restaurant/coctel-autor.jpg',
                description: 'Dirección de iluminación cálida y composición refinada para experiencias de bar y coctelería nocturna.',
                order: 2
            ),
            new Project(
                id: 'matcha-ajedrez',
                title: 'Ritual de café y matcha',
                category: 'gastronomia',
                tag: 'Cafetería',
                image: 'assets/fotos/cafeteria/matcha-ajedrez.jpg',
                description: 'Contenido lifestyle para Dante y Nova: conexión, calidez de mesa y bebidas de especialidad que cuentan historias.',
                order: 3
            ),
            new Project(
                id: 'entrenamiento-fuerza',
                title: 'Alto rendimiento y fuerza',
                category: 'fitness',
                tag: 'Fitness',
                image: 'assets/fotos/fitness-life/entrenamiento-fuerza.jpg',
                description: 'Producción visual de alto contraste para centros de acondicionamiento físico, entrenadores y atletas.',
                order: 4
            ),
            new Project(
                id: 'padel-sportswear',
                title: 'Movimiento en cancha',
                category: 'fitness',
                tag: 'Sportswear',
                image: 'assets/fotos/negocio-general/padel-sportswear.jpg',
                description: 'Sesión editorial de ropa deportiva con luz natural al atardecer en cancha de pádel.',
                order: 5
            ),
            new Project(
                id: 'tratamiento-facial',
                title: 'Tratamiento y bienestar facial',
                category: 'producto',
                tag: 'Cuidado facial',
                image: 'assets/fotos/cuidado-de-la-piel/tratamiento-facial-serum.jpg',
                description: 'Fotografía estética y clínica para Ana Quihui: pureza, suavidad y una experiencia de cuidado personal.',
                order: 6
            ),
            new Project(
                id: 'reloj-producto',
                title: 'Precisión y detalle de producto',
                category: 'producto',
                tag: 'Producto',
                image: 'assets/fotos/negocio-general/reloj-producto.jpg',
                description: 'Fotografía comercial de accesorios y piezas de valor: iluminación controlada, texturas y acabado premium.',
                order: 7
            ),
            new Project(
                id: 'abogada-corporativa',
                title: 'Retrato corporativo y firma legal',
                category: 'corporativo',
                tag: 'Corporativo',
                image: 'assets/fotos/abogados/retrato-abogada-corporativa.jpg',
                description: 'Retratos profesionales e imagen ejecutiva para despachos jurídicos: confianza, cercanía y liderazgo.',
                order: 8
            ),
        ];
    }

    /**
     * Filter projects by category.
     *
     * @return array<Project>
     */
    public function getByCategory(string $category): array
    {
        if ($category === 'todos' || $category === '') {
            return $this->getAll();
        }

        return array_values(array_filter(
            $this->getAll(),
            static fn(Project $p): bool => $p->category === $category
        ));
    }
}
