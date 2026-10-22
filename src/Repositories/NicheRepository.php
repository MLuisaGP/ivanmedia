<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Niche;

/**
 * Class NicheRepository
 * Encapsulates data retrieval for specialized commercial niches.
 */
class NicheRepository
{
    /**
     * @var array<string, Niche>|null
     */
    private ?array $niches = null;

    /**
     * Retrieve all specialized commercial niches.
     *
     * @return array<string, Niche>
     */
    public function getAll(): array
    {
        if ($this->niches === null) {
            $this->niches = $this->buildNiches();
        }

        return $this->niches;
    }

    /**
     * Find a niche by its unique slug.
     */
    public function findBySlug(string $slug): ?Niche
    {
        $all = $this->getAll();
        return $all[$slug] ?? null;
    }

    /**
     * Build the catalog of specialized niches with tailored copy, services, and Pinterest-style gallery media.
     *
     * @return array<string, Niche>
     */
    private function buildNiches(): array
    {
        return [
            'restaurante' => new Niche(
                id: 'restaurante',
                name: 'Restaurantes & Gastronomía',
                badge: 'Gastronomía',
                tagline: 'Fotografía y video gastronómico que despiertan el apetito y llenan mesas.',
                description: 'Creamos contenido comercial especializado para restaurantes, taquerías gourmet, parrillas y conceptos gastronómicos en Hermosillo. Resaltamos la textura crujiente de las costras, el humo de las brasas, cortes selectos y coctelería de autor mediante tomas macro de alta definición y reels verticales de ritmo dinámico diseñados para despertar el antojo y generar reservaciones.',
                coverImage: 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711027/DSC01964.jpg',
                services: [
                    'Fotografía macro de platillos insignia y estilismo culinario en mesa',
                    'Reels verticales de preparación, fuego en asador y vertido de salsas',
                    'Mixología, coctelería de autor y cristalería fina con luz dirigida',
                    'Cobertura de ambiente, arquitectura del restaurante y experiencia de salón',
                    'Estrategia de contenido visual para menús digitales, campañas y delivery'
                ],
                gallery: [
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711029/98-DSC00889.jpg',
                        'title' => 'Guarnición y salsas artesanales',
                        'caption' => 'Colores vivos y texturas frescas en encuadre vertical',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711026/28-DSC01380.jpg',
                        'title' => 'Taco artesanal con tortillas hechas a mano',
                        'caption' => 'Primer plano vertical destacando textura crujiente y frescura',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'video',
                        'src' => '/assets/multimedia/restaurante/videos/CHILAQUILES%20POBLANOS%20-%20LA%20SALSA.mov',
                        'title' => 'Chilaquiles poblanos en preparación',
                        'caption' => 'Reel vertical comercial con vertido de salsa y montaje en caliente',
                        'format' => 'vertical',
                        'badge' => 'Reel 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792710980/2-DSC02848.jpg',
                        'title' => 'Mixología y coctelería de autor',
                        'caption' => 'Cristalería fina y presentación líquida vertical con luz dirigida',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711027/DSC01964.jpg',
                        'title' => 'Experiencia culinaria y ambiente',
                        'caption' => 'Perspectiva gastronómica y arquitectura de salón',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711023/25-DSC03197.jpg',
                        'title' => 'Corte y preparación a las brasas',
                        'caption' => 'Composición vertical con foco central en la textura',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'video',
                        'src' => '/assets/multimedia/restaurante/videos/horizontal/DOCUMENTAL%20LA%20SALSA.mov',
                        'title' => 'Documental comercial: La Salsa',
                        'caption' => 'Producción horizontal cinematográfica sobre la historia y pasión culinaria',
                        'format' => 'horizontal',
                        'badge' => 'Video 16:9'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711023/17-DSC02980.jpg',
                        'title' => 'Especialidad caliente en comal',
                        'caption' => 'Fotografía vertical con vapor y sazón en punto de servicio',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711026/84-DSC00951.jpg',
                        'title' => 'Costra dorada y queso fundido',
                        'caption' => 'Composición vertical con foco al centro en el dorado crujiente',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711024/DSC01812.jpg',
                        'title' => 'Platillo insignia al detalle',
                        'caption' => 'Composición horizontal con foco en la textura y el producto',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711024/26-DSC03135.jpg',
                        'title' => 'Carne asada y corte sonorense',
                        'caption' => 'Toma vertical con humo de brasa y sellado a la leña',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'video',
                        'src' => '/assets/multimedia/restaurante/videos/PROCESO%20GUACAMOLE%20EN%20LA%20SALSA.mov',
                        'title' => 'Proceso artesanal de guacamole',
                        'caption' => 'Reel vertical con preparación en mesa e ingredientes frescos',
                        'format' => 'vertical',
                        'badge' => 'Reel 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711020/63-DSC01121.jpg',
                        'title' => 'Gourmet sonorense al carbón',
                        'caption' => 'Encuadre vertical capturando la jugosidad y el término exacto',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711021/82-DSC01002.jpg',
                        'title' => 'Montaje final y presentación gourmet',
                        'caption' => 'Enfoque selectivo vertical en los ingredientes de la casa',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792710979/2-DSC03206.jpg',
                        'title' => 'Experiencia gastronómica norteña',
                        'caption' => 'Fotografía de producto en mesa con iluminación cálida',
                        'aspect' => 'tall'
                    ]
                ],
                video: '/assets/multimedia/restaurante/videos/horizontal/DOCUMENTAL%20LA%20SALSA.mov',
                order: 1,
                heroImage: 'https://res.cloudinary.com/dbs1ypch/image/upload/v1792711027/DSC01964.jpg'
            ),

            'cafeteria' => new Niche(
                id: 'cafeteria',
                name: 'Cafeterías & Bebidas de Especialidad',
                badge: 'Cafetería',
                tagline: 'Estética acogedora, rituales de barista y momentos que invitan a regresar.',
                description: 'Capturamos la atmósfera, calidez y cultura detrás de cada taza. Desde el vertido perfecto de un latte art y la preparación minuciosa de matcha hasta los rincones estéticos donde tus clientes se inspiran a trabajar, leer o platicar. Diseñamos un lenguaje visual coherente que convierte tu cafetería en el punto de encuentro predilecto.',
                coverImage: '/assets/fotos/cafeteria/matcha-ajedrez.jpg',
                services: [
                    'Tomas de detalle de extracción de espresso, emulsión y latte art',
                    'Rituales de matcha, bebidas frías de especialidad y mocktails',
                    'Fotografía de estilo de vida: lectura, trabajo casual y convivencia',
                    'Repostería artesanal, panadería recién horneada y café de grano',
                    'Cápsulas de video cortas con sonido ambiental (ASMR) de barra'
                ],
                gallery: [
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cafeteria/matcha-ajedrez.jpg',
                        'title' => 'Ritual de matcha y ajedrez',
                        'caption' => 'Estilo de vida, estética moderna y conexión en mesa'
                    ],
                    [
                        'type' => 'video',
                        'src' => '/assets/videos/cafeteria/cafeteria-reel.mov',
                        'title' => 'Bebida especial: Pumpkin Spice',
                        'caption' => 'Reel vertical con preparación artesanal en barra'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cafeteria/latte-art-barista.jpg',
                        'title' => 'Precisión del barista y latte art',
                        'caption' => 'Emulsión sedosa y vertido en taza de cerámica'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cafeteria/dante-nova-drink.jpg',
                        'title' => 'Bebida fría en capas',
                        'caption' => 'Contraste de texturas con luz suave de la mañana'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cafeteria/gallery-2.jpg',
                        'title' => 'Vaso to-go con identidad de marca',
                        'caption' => 'Branding en mano del cliente para redes sociales'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cafeteria/gallery-4.jpg',
                        'title' => 'Rincón de lectura y café',
                        'caption' => 'Espacios cálidos pensados para quedarse'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cafeteria/gallery-6.jpg',
                        'title' => 'Detalle de barra y máquina espresso',
                        'caption' => 'Artesanía y rigor técnico del café de especialidad'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cafeteria/gallery-8.jpg',
                        'title' => 'Panadería y acompañamientos',
                        'caption' => 'Maridaje visual perfecto para la tarde'
                    ]
                ],
                video: '/assets/videos/cafeteria/cafeteria-reel.mov',
                order: 2
            ),

            'fitness' => new Niche(
                id: 'fitness',
                name: 'Fitness, Gimnasio & Deporte',
                badge: 'Fitness & Deporte',
                tagline: 'Intensidad, fuerza y disciplina transmitidas con cinematografía de alto impacto.',
                description: 'El contenido fitness demanda energía pura, determinación y autenticidad sin poses falsas. Producimos contenido para gimnasios de fuerza, centros de acondicionamiento físico, clubes de pádel, marcas de ropa deportiva y coaches con tomas en cámara lenta, contrastes marcados y ritmos acelerados que motivan e impulsan la venta de membresías.',
                coverImage: '/assets/fotos/fitness-life/entrenamiento-fuerza.jpg',
                services: [
                    'Grabación en cámara lenta cinemática y planos en movimiento dinámico',
                    'Retratos de atletas, entrenadores y embajadores con iluminación dramática',
                    'Reels de alta energía con música rítmica orientados a captación',
                    'Fotografía editorial para marcas de sportswear, calzado y suplementos',
                    'Cobertura de eventos deportivos, torneos de pádel y competencias'
                ],
                gallery: [
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/fitness-life/entrenamiento-fuerza.jpg',
                        'title' => 'Fuerza y concentración pura',
                        'caption' => 'Contraste deportivo, sudor y definición muscular'
                    ],
                    [
                        'type' => 'video',
                        'src' => '/assets/videos/fitness-life/fitness-reel.mov',
                        'title' => 'Técnica en sentadilla hack',
                        'caption' => 'Reel vertical enfocado en biomecánica y superación'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/fitness-life/gallery-3.jpg',
                        'title' => 'Zona de peso libre panorámica',
                        'caption' => 'Composición horizontal amplia del centro de entrenamiento'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/fitness-life/gallery-4.jpg',
                        'title' => 'Atleta en levantamiento olímpico',
                        'caption' => 'Encuadre panorámico de potencia y técnica'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/fitness-life/gallery-1.jpg',
                        'title' => 'Prensa de piernas y esfuerzo máximo',
                        'caption' => 'Intensidad real en series pesadas'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/fitness-life/gallery-5.jpg',
                        'title' => 'Retrato fitness editorial',
                        'caption' => 'Presencia escénica e imagen de marca deportiva'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/fitness-life/gallery-8.jpg',
                        'title' => 'Detalle en el agarre con mancuernas',
                        'caption' => 'Texturas de hierro, magnesio y tensión'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/fitness-life/gallery-10.jpg',
                        'title' => 'Rutina con mancuernas pesadas',
                        'caption' => 'Disciplina y superación física'
                    ]
                ],
                video: '/assets/videos/fitness-life/fitness-reel.mov',
                order: 3
            ),

            'cuidado-de-la-piel' => new Niche(
                id: 'cuidado-de-la-piel',
                name: 'Cuidado de la Piel & Estética',
                badge: 'Cuidado de la piel',
                tagline: 'Pureza, delicadeza y bienestar que transmiten confianza clínica inmediata.',
                description: 'En el sector dermocosmético, cosmetología y estética médica, la pulcritud visual y la delicadeza son determinantes. Desarrollamos producciones que documentan protocolos faciales, aparatología de vanguardia y resultados con iluminación blanca y suave, proyectando el rigor profesional y la calidez que los pacientes buscan.',
                coverImage: '/assets/fotos/cuidado-de-la-piel/tratamiento-facial-serum.jpg',
                services: [
                    'Documentación detallada de protocolos faciales y tratamientos de cabina',
                    'Tomas macro de texturas cosméticas, sueros, gotas y aplicación suave',
                    'Cápsulas de video educativas sobre cuidado diario y prevención',
                    'Fotografía de consultorio, aparatología estética y retrato profesional',
                    'Campañas visuales para paquetes de temporada y agenda de citas'
                ],
                gallery: [
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cuidado-de-la-piel/tratamiento-facial-serum.jpg',
                        'title' => 'Aplicación de suero nutritivo',
                        'caption' => 'Luz difusa, pureza y textura hidratante al lente'
                    ],
                    [
                        'type' => 'video',
                        'src' => '/assets/videos/cuidado-de-la-piel/cuidado-piel-reel.mov',
                        'title' => 'Presentación clínica: Ana Quihui',
                        'caption' => 'Video institucional y filosofía de atención personalizada'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cuidado-de-la-piel/gallery-1.jpg',
                        'title' => 'Protocolo facial en cabina',
                        'caption' => 'Higiene clínica y cuidado milimétrico'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cuidado-de-la-piel/gallery-2.jpg',
                        'title' => 'Tratamiento con aparatología médica',
                        'caption' => 'Tecnología de rejuvenecimiento y cuidado avanzado'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cuidado-de-la-piel/gallery-3.jpg',
                        'title' => 'Experiencia de relajación y calma',
                        'caption' => 'Bienestar integral para la piel del paciente'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cuidado-de-la-piel/gallery-5.jpg',
                        'title' => 'Mascarilla regeneradora de textura',
                        'caption' => 'Ingredientes activos en acción profunda'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cuidado-de-la-piel/gallery-6.jpg',
                        'title' => 'Retrato profesional de la especialista',
                        'caption' => 'Confianza y empatía en la consulta estética'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/cuidado-de-la-piel/gallery-8.jpg',
                        'title' => 'Productos dermatológicos en consultorio',
                        'caption' => 'Línea de tratamiento y mantenimiento en casa'
                    ]
                ],
                video: '/assets/videos/cuidado-de-la-piel/cuidado-piel-reel.mov',
                order: 4
            ),

            'abogados' => new Niche(
                id: 'abogados',
                name: 'Abogados & Sector Corporativo',
                badge: 'Corporativo & Legal',
                tagline: 'Autoridad, reputación e imagen ejecutiva que genera certidumbre inmediata.',
                description: 'La decisión de contratar a un despacho legal o una firma de consultoría se fundamenta en la credibilidad y seguridad que transmite su liderazgo. Realizamos retratos corporativos con iluminación de estudio, tomas en sala de juntas y cápsulas de video con sobriedad y elegancia, proyectando solidez ante clientes y contrapartes.',
                coverImage: '/assets/fotos/abogados/retrato-abogada-corporativa.jpg',
                services: [
                    'Retratos ejecutivos individuales y de equipo para socios y directores',
                    'Fotografía institucional de despachos, salas de juntas e instalaciones',
                    'Cápsulas en video de criterio jurídico, asesoría legal y análisis',
                    'Material de alta credibilidad para perfiles de LinkedIn y prensa',
                    'Apoyo audiovisual para dossiers corporativos y sitios institucionales'
                ],
                gallery: [
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/abogados/gallery-3.jpg',
                        'title' => 'Sesión en sala de juntas corporativa',
                        'caption' => 'Toma horizontal amplia: deliberación estratégica en equipo'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/abogados/retrato-abogada-corporativa.jpg',
                        'title' => 'Retrato ejecutivo de socia directora',
                        'caption' => 'Liderazgo, seguridad y presencia institucional'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/abogados/gallery-7.jpg',
                        'title' => 'Revisión documental y contratos',
                        'caption' => 'Fotografía panorámica de rigor jurídico y análisis'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/abogados/gallery-1.jpg',
                        'title' => 'Retrato formal en despacho privado',
                        'caption' => 'Sobriedad y confianza para clientes de la firma'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/abogados/gallery-4.jpg',
                        'title' => 'Trabajo colaborativo entre especialistas',
                        'caption' => 'La fuerza de un despacho multidisciplinario'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/abogados/gallery-6.jpg',
                        'title' => 'Postura ejecutiva en oficina',
                        'caption' => 'Claridad y seriedad en la práctica profesional'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/abogados/gallery-9.jpg',
                        'title' => 'Atención presencial y mediación',
                        'caption' => 'Cercanía y acompañamiento legal continuo'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/abogados/gallery-10.jpg',
                        'title' => 'Detalle de firma y acuerdos legales',
                        'caption' => 'Validez y compromiso ante el cliente'
                    ]
                ],
                video: null,
                order: 5
            ),

            'negocio-general' => new Niche(
                id: 'negocio-general',
                name: 'Negocio General & Marcas Locales',
                badge: 'Negocio General',
                tagline: 'Impulso comercial y posicionamiento para marcas locales con visión de crecimiento.',
                description: 'Ayudamos a emprendimientos, boutiques, tiendas de ropa, productos de consumo y empresas comerciales de Hermosillo a competir con la presencia visual de marcas internacionales. Desde fotografía de producto en set controlado hasta historias de marca detrás del mostrador que humanizan tu negocio y conectan con tus clientes.',
                coverImage: '/assets/fotos/negocio-general/golden-hour-padel.jpg',
                services: [
                    'Fotografía comercial de catálogo, calzado, moda urbana y accesorios',
                    'Sesiones editoriales en locación con modelos y producto puesto',
                    'Reels de proceso, detrás de cámaras y la historia del fundador',
                    'Paquetes mensuales de contenido listos para alimentar redes sociales',
                    'Cobertura de aperturas de sucursal, eventos comerciales y pop-ups'
                ],
                gallery: [
                    [
                        'type' => 'video',
                        'src' => '/assets/videos/negocio-general/negocio-general-reel.mov',
                        'title' => 'Campaña: Magventure Los Altos',
                        'caption' => 'Producción de video vertical para marca local de indumentaria'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/negocio-general/golden-hour-padel.jpg',
                        'title' => 'Golden hour en cancha de pádel',
                        'caption' => 'Editorial de ropa deportiva con luz natural dorada'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/negocio-general/padel-sportswear.jpg',
                        'title' => 'Moda y dinamismo deportivo',
                        'caption' => 'Corte estilizado para campaña de sportswear local'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/negocio-general/reloj-producto.jpg',
                        'title' => 'Detalle de accesorio y producto',
                        'caption' => 'Macro de precisión, materiales y acabados finos'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/negocio-general/gallery-1.jpg',
                        'title' => 'Catálogo de calzado y moda',
                        'caption' => 'Composición limpia para tienda digital y redes'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/negocio-general/gallery-3.jpg',
                        'title' => 'Estilismo urbano en exteriores',
                        'caption' => 'Conexión con el público joven de la ciudad'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/negocio-general/gallery-6.jpg',
                        'title' => 'Confección y textura textil',
                        'caption' => 'Enfoque en la calidad de telas y costuras'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/assets/fotos/negocio-general/gallery-8.jpg',
                        'title' => 'Estilo de vida y marca personal',
                        'caption' => 'Contenido auténtico para fidelizar clientes'
                    ]
                ],
                video: '/assets/videos/negocio-general/negocio-general-reel.mov',
                order: 6
            )
        ];
    }
}
