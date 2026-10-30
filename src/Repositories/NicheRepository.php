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
                coverImage: '/assets/images/sectores/restaurante.webp',
                services: [
                    'Fotografía macro de platillos insignia y estilismo culinario en mesa',
                    'Reels verticales de preparación, fuego en asador y vertido de salsas',
                    'Mixología, coctelería de autor y cristalería fina con luz dirigida',
                    'Cobertura de ambiente, arquitectura del restaurante y experiencia de salón',
                    'Estrategia de contenido visual para menús digitales, campañas y delivery'
                ],
                gallery: [
                    // --- VIDEO DESTACADO FILA 1 (COLUMNAS 2 Y 3) ---
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_800,c_limit/v1792729400/home/ivan%20portafolio/restaurante_documental_la_salsa_hero.mp4',
                        'title' => 'Documental gastronómico: La Salsa',
                        'caption' => 'Producción audiovisual horizontal que retrata la historia, tradición, fuego en cocina y esencia detrás de cada platillo.',
                        'format' => 'horizontal',
                        'badge' => 'Documental 16:9',
                        'span' => 'cols-2-3'
                    ],

                    // --- COLUMNA 1 (Items 0 a 5) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719596/home/ivan%20portafolio/1-DSC01561.jpg',
                        'title' => 'Cobertura arquitectónica y ambiente gastronómico',
                        'caption' => 'Perspectiva vertical en plano general que transmite la atmósfera viva y calidez del comedor.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719613/home/ivan%20portafolio/98-DSC00889.jpg',
                        'title' => 'Guarnición y salsas artesanales',
                        'caption' => 'Primer plano cenital destacando la frescura, variedad y colores vivos de las recetas de la casa.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1793326134/DESAYUNOS_-_LA_SALSA_SE_DEBE_PAUTAR.mp4',
                        'title' => 'Desayunos tradicionales: La Salsa',
                        'caption' => 'Reel vertical comercial diseñado para pauta digital destacando la variedad, frescura y sazón de los desayunos de la casa.',
                        'format' => 'vertical',
                        'badge' => 'Reel 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719594/home/ivan%20portafolio/49-DSC01238.jpg',
                        'title' => 'Fotografía publicitaria de mixología',
                        'caption' => 'Manejo de cristalería fina y hielo tallado en barra con luz de recorte.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719597/home/ivan%20portafolio/2-DSC02848.jpg',
                        'title' => 'Fotografía comercial de platillo y maridaje',
                        'caption' => 'Iluminación cálida dirigida para resaltar el glaseado a las brasas y cerveza artesanal.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719616/home/ivan%20portafolio/28-DSC01380.jpg',
                        'title' => 'Taco artesanal con tortillas hechas a mano',
                        'caption' => 'Primer plano vertical destacando textura crujiente, vapor y frescura.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1793328735/2-DSC03206.jpg',
                        'title' => 'Detalle macro: Chilaquiles con pollo a la plancha',
                        'caption' => 'Primer plano con profundidad de campo selectiva resaltando la jugosidad del pollo asado, crema, queso fresco y salsas de la casa.',
                        'aspect' => 'tall'
                    ],

                    // --- COLUMNA 2 (Items 6 a 11) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719598/home/ivan%20portafolio/25-DSC03197.jpg',
                        'title' => 'Plano cenital de menú: Chilaquiles artesanales',
                        'caption' => 'Composición simétrica con equilibrio de color entre salsas para catálogo y plataformas digitales.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719601/home/ivan%20portafolio/84-DSC00951.jpg',
                        'title' => 'Fotografía de producto: Tacos de asada',
                        'caption' => 'Encuadre angular destacando generosidad de carne al carbón y guacamole fresco.',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1793326139/TACO_DE_RIBEYE_CON_SALSA_DE_CACAHUATE_TOAST..mp4',
                        'title' => 'Taco de Ribeye con salsa de cacahuate',
                        'caption' => 'Producción vertical destacando la jugosidad del corte ribeye a las brasas coronado con salsa cremosa de cacahuate tostado.',
                        'format' => 'vertical',
                        'badge' => 'Especialidad 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719621/home/ivan%20portafolio/DSC01812.jpg',
                        'title' => 'Platillo insignia al detalle: Costra dorada',
                        'caption' => 'Composición con iluminación rasante sobre el dorado crujiente de queso fundido y carne asada.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719606/home/ivan%20portafolio/36-DSC01339.jpg',
                        'title' => 'Mixología en acción y detalle de escarchado',
                        'caption' => 'Toma vertical de alto contraste y viveza de color en cristalería para pauta en redes sociales.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719617/home/ivan%20portafolio/17-DSC02980.jpg',
                        'title' => 'Especialidad caliente en comal tradicional',
                        'caption' => 'Fotografía vertical con vapor y sazón sonorense en punto exacto de servicio.',
                        'aspect' => 'tall'
                    ],

                    // --- COLUMNA 3 (Items 12 a 17) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719607/home/ivan%20portafolio/32-DSC01355.jpg',
                        'title' => 'Fotografía arquitectónica nocturna',
                        'caption' => 'Captura de fachada e iluminación de acceso para posicionamiento de marca y ubicación del local.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719604/home/ivan%20portafolio/26-DSC03135.jpg',
                        'title' => 'Carne asada y corte sonorense al carbón',
                        'caption' => 'Toma vertical con humo de brasa y sellado a la leña para transmitir el aroma norteño.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792729393/home/ivan%20portafolio/restaurante_proceso_guacamole_vertical.mp4',
                        'title' => 'Proceso artesanal de guacamole',
                        'caption' => 'Reel vertical con preparación en mesa e ingredientes frescos de temporada.',
                        'format' => 'vertical',
                        'badge' => 'Reel 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719610/home/ivan%20portafolio/57-DSC01162.jpg',
                        'title' => 'Fotografía de alta velocidad: Baño de salsa',
                        'caption' => 'Acción congelada a 1/2500s con iluminación dramática sobre taco al pastor y piña asada.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719609/home/ivan%20portafolio/5-DSC05389.jpg',
                        'title' => 'Fotografía espontánea: Experiencia comensal',
                        'caption' => 'Dirección y captura del momento genuino de degustación para generar antojo inmediato en mesa.',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792719612/home/ivan%20portafolio/82-DSC01002.jpg',
                        'title' => 'Toma macro de producto en mano',
                        'caption' => 'Primer plano cerrado con óptica fija para acentuar jugosidad de la carne y guacamole.',
                        'aspect' => 'tall'
                    ]
                ],
                video: 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792729400/home/ivan%20portafolio/restaurante_documental_la_salsa_hero.mp4',
                order: 1,
                heroImage: 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_600,c_limit/v1792719593/home/ivan%20portafolio/DSC01964.jpg'
            ),

            'cafeteria' => new Niche(
                id: 'cafeteria',
                name: 'Cafeterías & Bebidas de Especialidad',
                badge: 'Cafetería',
                tagline: 'Estética acogedora, rituales de barista y momentos que invitan a regresar.',
                description: 'Capturamos la atmósfera, calidez y cultura detrás de cada taza. Desde el vertido perfecto de un latte art y la preparación minuciosa de matcha hasta los rincones estéticos donde tus clientes se inspiran a trabajar, leer o platicar. Diseñamos un lenguaje visual coherente que convierte tu cafetería en el punto de encuentro predilecto.',
                coverImage: 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_650,c_limit/v1792721478/home/ivan%20portafolio/1-DSC00569.jpg',
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
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721478/home/ivan%20portafolio/1-DSC00569.jpg',
                        'title' => 'Fotografía macro de arte latte',
                        'caption' => 'Captura de emulsión sedosa y vertido en acción con iluminación suave de estudio',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721479/home/ivan%20portafolio/45-DSC00149.jpg',
                        'title' => 'Composición de bebidas para catálogo y menú',
                        'caption' => 'Fotografía publicitaria en serie resaltando capas, texturas y color para plataformas digitales',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792721500/home/ivan%20portafolio/MATCHA_PARTY_2_0.mp4',
                        'title' => 'Reel comercial: Ritual de matcha',
                        'caption' => 'Producción vertical 9:16 de ritmo dinámico diseñada para pauta digital y redes sociales',
                        'format' => 'vertical',
                        'badge' => 'Reel 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721480/home/ivan%20portafolio/11-DSC00405.jpg',
                        'title' => 'Styling culinario: Repostería de autor',
                        'caption' => 'Iluminación rasante y foco selectivo para acentuar brillo, volumen y textura del postre',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721481/home/ivan%20portafolio/13-DSC04879.jpg',
                        'title' => 'Fotografía de producto en mano',
                        'caption' => 'Toma comercial en primer plano destacando condensación, frescura y tono vibrante',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792722997/home/ivan%20portafolio/30-DSC00254.jpg',
                        'title' => 'Narrativa visual de salón y atmósfera',
                        'caption' => 'Retrato editorial ambiental en salón con luz natural que transmite la identidad y calidez del espacio',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721484/home/ivan%20portafolio/12-DSC00398.jpg',
                        'title' => 'Fotografía editorial de lifestyle en mesa',
                        'caption' => 'Composición escénica con luz de ventana para campañas de marca y fidelización de clientela',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721485/home/ivan%20portafolio/7-DSC00485.jpg',
                        'title' => 'Captura en acción: Precisión del barista',
                        'caption' => 'Congelado de movimiento a alta velocidad para documentar el rigor técnico de la extracción',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792721788/home/ivan%20portafolio/BEBIDA_DANTE_Y_NOVA_PUMPKIN.mp4',
                        'title' => 'Reel de producto: Lanzamiento de temporada',
                        'caption' => 'Producción audiovisual con gradación de color cálida optimizada para campañas en Instagram',
                        'format' => 'vertical',
                        'badge' => 'Reel 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721486/home/ivan%20portafolio/40-DSC00187.jpg',
                        'title' => 'Fotografía de pastelería gourmet',
                        'caption' => 'Enfoque macro y manejo de sombras suaves pensado para menús de delivery y eCommerce',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721487/home/ivan%20portafolio/9-DSC00471.jpg',
                        'title' => 'Contraste de texturas en cristalería',
                        'caption' => 'Dirección de luz rasante para separar capas y destacar la densidad de la crema sobre café',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721488/home/ivan%20portafolio/23-DSC00317.jpg',
                        'title' => 'Macro publicitario de panadería artesanal',
                        'caption' => 'Toma cenital con profundidad de campo corta para resaltar la textura crujiente y horneado',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721489/home/ivan%20portafolio/22-DSC04848.jpg',
                        'title' => 'Bodegón gastronómico y maridaje',
                        'caption' => 'Composición editorial combinando producto insignia, repostería y acentos botánicos en mesa',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721491/home/ivan%20portafolio/24-DSC04817.jpg',
                        'title' => 'Fotografía comercial de antojo',
                        'caption' => 'Encuadre angular con luz envolvente que acentúa la frescura del glaseado y textura brioche',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792721506/home/ivan%20portafolio/BEBIDA_DE_PROTEINA_DANTE_Y_NOVA.mp4',
                        'title' => 'Cápsula audiovisual: Menú fitness & café',
                        'caption' => 'Edición dinámica de producto con planos detalle rápidos para audiencia en TikTok y Reels',
                        'format' => 'vertical',
                        'badge' => 'Reel 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721492/home/ivan%20portafolio/32-DSC00218.jpg',
                        'title' => 'Fotografía de packaging y producto to-go',
                        'caption' => 'Toma de acción en mano que comunica practicidad, consistencia cremosa y empaque para llevar',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721494/home/ivan%20portafolio/8-DSC04976.jpg',
                        'title' => 'Campaña estacional: Edición limitada',
                        'caption' => 'Iluminación cálida claroscuro sobre madera para transmitir tradición y exclusividad de temporada',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792721495/home/ivan%20portafolio/25-DSC00308.jpg',
                        'title' => 'Composición minimalista para branding',
                        'caption' => 'Fotografía de alto impacto con haz de luz natural sobre cuero para identidad visual y web',
                        'aspect' => 'tall'
                    ]
                ],
                video: 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792721500/home/ivan%20portafolio/MATCHA_PARTY_2_0.mp4',
                order: 2,
                heroImage: 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_600,c_limit/v1792721496/home/ivan%20portafolio/12-DSC04899.jpg'
            ),

            'fitness' => new Niche(
                id: 'fitness',
                name: 'Fitness, Gimnasio & Deporte',
                badge: 'Fitness & Deporte',
                tagline: 'Intensidad, fuerza y disciplina transmitidas con cinematografía de alto impacto.',
                description: 'El contenido fitness demanda energía pura, determinación y autenticidad sin poses falsas. Producimos contenido para gimnasios de fuerza, centros de acondicionamiento físico, clubes de pádel, marcas de ropa deportiva y coaches con tomas en cámara lenta, contrastes marcados y ritmos acelerados que motivan e impulsan la venta de membresías.',
                coverImage: 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_650,c_limit/v1792724399/home/ivan%20portafolio/34-DSC02408.jpg',
                services: [
                    'Grabación en cámara lenta cinemática y planos en movimiento dinámico',
                    'Retratos de atletas, entrenadores y embajadores con iluminación dramática',
                    'Reels de alta energía con música rítmica orientados a captación',
                    'Fotografía editorial para marcas de sportswear, calzado y suplementos',
                    'Cobertura de eventos deportivos, torneos de pádel y competencias'
                ],
                gallery: [
                    // --- COLUMNA 1 (7 elementos: tall, h-video, square, v-video, medium, square, tall) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724399/home/ivan%20portafolio/34-DSC02408.jpg',
                        'title' => 'Suspensión atlética y obturación de alta velocidad',
                        'caption' => 'Captura de salto a 1/2000s con luz natural cenital, congelando la potencia y elongación del movimiento',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792724422/home/ivan%20portafolio/fitness_chest_press_machine.mp4',
                        'title' => 'Cinematografía de sobrecarga en press de pecho',
                        'caption' => 'Plano horizontal 16:9 con iluminación de contraste dramático destacando tensión muscular y control de recorrido',
                        'format' => 'horizontal',
                        'badge' => 'Video 16:9'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724402/home/ivan%20portafolio/42-DSC09489.jpg',
                        'title' => 'Intensidad de serie pesada en Iron World',
                        'caption' => 'Primer plano angular con luz direccional cenital reflejando la determinación y esfuerzo máximo',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1793326494/Si_tu_objetivo_es_mejorar_gluteo.mp4',
                        'title' => 'Técnica y entrenamiento enfocado en glúteo',
                        'caption' => 'Reel vertical educativo y dinámico explicando ejecución biomecánica y consejos prácticos para hipertrofia.',
                        'format' => 'vertical',
                        'badge' => 'Reel 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724403/home/ivan%20portafolio/38-DSC09623.jpg',
                        'title' => 'Macro de textura textil y branding YoungLA',
                        'caption' => 'Detalle cerrado de tejido transpirable y clavícula esculpida para campañas e-commerce de indumentaria',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792725354/home/ivan%20portafolio/3-DSC03341.jpg',
                        'title' => 'Perspectiva cenital y geometría en pista de tartán',
                        'caption' => 'Encuadre en plano picado con línea de carril central, resaltando simetría, postura atlética y sombras cenitales',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724405/home/ivan%20portafolio/4-DSC00341.jpg',
                        'title' => 'Retrato editorial monocromático en cajón pliométrico',
                        'caption' => 'Composición monocromática de alto contraste resaltando firmeza, tono muscular y elegancia deportiva',
                        'aspect' => 'tall'
                    ],

                    // --- COLUMNA 2 (7 elementos: square, tall, v-video, horizontal, medium, square, tall) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724407/home/ivan%20portafolio/fitness_incline_bicep_curls.jpg',
                        'title' => 'Detalle anatómico en curl inclinado con mancuerna',
                        'caption' => 'Plano medio cerrado resaltando cortes musculares y vascularización del deltoides con fondo de luces geométricas',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1793328900/40-DSC09546.jpg',
                        'title' => 'Dirección de coach y máxima contracción en aperturas de pecho',
                        'caption' => 'Plano vertical en sala de máquinas capturando la guía técnica del entrenador y la tensión muscular del atleta.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792724427/home/ivan%20portafolio/fitness_triceps_dumbbell_overhead.mp4',
                        'title' => 'Reel de máxima vascularidad y extensión de tríceps',
                        'caption' => 'Formato vertical 9:16 con plano cerrado captando detalle vascular, sudor y esfuerzo al límite',
                        'format' => 'vertical',
                        'badge' => 'Reel 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724417/home/ivan%20portafolio/13-DSC07313.jpg',
                        'title' => 'Simetría mecánica y esfuerzo en máquina de hombro',
                        'caption' => 'Encuadre horizontal amplio que integra la arquitectura de las poleas rojas con la concentración del atleta',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724410/home/ivan%20portafolio/30-DSC05674.jpg',
                        'title' => 'Fotografía grupal y comunidad en club de pádel',
                        'caption' => 'Composición editorial a pie de red con palas de pádel y estilismo deportivo premium sobre pista azul',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792725355/home/ivan%20portafolio/14-DSC07298.jpg',
                        'title' => 'Recuperación y concentración entre series pesadas',
                        'caption' => 'Plano medio en descanso activo con mancuernas, capturando respiración profunda bajo la iluminación hexagonal de sala',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1793328888/49-DSC07399.jpg',
                        'title' => 'Velocidad y enfoque en sesión de indoor cycling',
                        'caption' => 'Obturación lenta creativa con iluminación puntual al rostro, transmitiendo cadencia, energía y ritmo en cabina de spinning.',
                        'aspect' => 'tall'
                    ],

                    // --- COLUMNA 3 (7 elementos: horizontal, v-video, square, medium, v-video, horizontal, tall) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724400/home/ivan%20portafolio/35-DSC02307.jpg',
                        'title' => 'Embajadores de marca en pista de tartán al atardecer',
                        'caption' => 'Toma horizontal con luz dorada lateral proyectando profesionalismo y autoridad atlética para patrocinadores',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792724432/home/ivan%20portafolio/fitness_physique_lighting_slowmo.mp4',
                        'title' => 'Perfil cinemático bajo luminarias geométricas',
                        'caption' => 'Reel vertical 9:16 en cámara lenta acentuando volumen de bíceps y sombras dramáticas de la arquitectura del gimnasio',
                        'format' => 'vertical',
                        'badge' => 'Reel 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724412/home/ivan%20portafolio/32-DSC05617.jpg',
                        'title' => 'Presencia y estilo de vida en pista de pádel',
                        'caption' => 'Retrato casual a pie de red combinando moda deportiva, gafas oscuras y la vibrante paleta azul del club',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724406/home/ivan%20portafolio/53-DSC07265.jpg',
                        'title' => 'Fotografía comercial para línea de activewear',
                        'caption' => 'Iluminación suave y cálida en sala de pesas para catálogo textil fitness, proyectando vitalidad y bienestar',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1793326860/SANNA_VIDEO_2.mp4',
                        'title' => 'Producción audiovisual deportiva: SANNA',
                        'caption' => 'Reel vertical dinámico destacando disciplina, movimiento atlético y energía de entrenamiento.',
                        'format' => 'vertical',
                        'badge' => 'Reel 9:16'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724415/home/ivan%20portafolio/46-_DSC2094.jpg',
                        'title' => 'Documentación biomecánica en hip thrust con barra',
                        'caption' => 'Encuadre a nivel de piso registrando técnica de levantamiento, asistencia de coach y concentración de la atleta',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724408/home/ivan%20portafolio/8-IMG_7862.jpg',
                        'title' => 'Fotografía nocturna urbana con arrastre de obturación',
                        'caption' => 'Shutter drag artístico sobre streetwear de Gymshark, fusionando movimiento lumínico urbano y porte atlético',
                        'aspect' => 'tall'
                    ]
                ],
                video: 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792724427/home/ivan%20portafolio/fitness_triceps_dumbbell_overhead.mp4',
                order: 3,
                heroImage: 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_600,c_limit/v1792725695/home/ivan%20portafolio/IMG_4110.jpg'
            ),
            'cuidado-de-la-piel' => new Niche(
                id: 'cuidado-de-la-piel',
                name: 'Cuidado de la Piel & Estética',
                badge: 'Cuidado de la piel',
                tagline: 'Pureza, delicadeza y bienestar que transmiten confianza clínica inmediata.',
                description: 'En el sector dermocosmético, cosmetología y estética médica, la pulcritud visual y la delicadeza son determinantes. Desarrollamos producciones que documentan protocolos faciales, aparatología de vanguardia y resultados con iluminación blanca y suave, proyectando el rigor profesional y la calidez que los pacientes buscan.',
                coverImage: '/assets/images/sectores/cuidado-de-la-piel.webp',
                services: [
                    'Documentación detallada de protocolos faciales y tratamientos de cabina',
                    'Tomas macro de texturas cosméticas, sueros, gotas y aplicación suave',
                    'Cápsulas de video educativas sobre cuidado diario y prevención',
                    'Fotografía de consultorio, aparatología estética y retrato profesional',
                    'Campañas visuales para paquetes de temporada y agenda de citas'
                ],
                gallery: [
                    // --- COLUMNA 1 (Items 0 a 5) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726765/home/ivan%20portafolio/1-DSC02526.jpg',
                        'title' => 'Macrotextura de suero y dosificación pura',
                        'caption' => 'Pipeta de vidrio y microgota en suspensión: iluminación rasante que revela la viscosidad activa y transparencia del concentrado.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726768/home/ivan%20portafolio/6-DSC02501.jpg',
                        'title' => 'Asepsia clínica y limpieza facial profunda',
                        'caption' => 'Encuadre focalizado en la mirada y precisión manual: algodón estéril y guantes de nitrilo en cabina.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792726797/home/ivan%20portafolio/skincare_dermapen_apparatus_demo.mp4',
                        'title' => 'Protocolo de aparatología: Sistema de microneedling',
                        'caption' => 'Demostración de calibración y técnica con Dermapen para inducción controlada de colágeno dérmico.',
                        'format' => 'vertical',
                        'badge' => 'Aparatología'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726772/home/ivan%20portafolio/18-DSC02419.jpg',
                        'title' => 'Arquitectura de cabina y ritual cosmetológico',
                        'caption' => 'Composición cenital con pincel facial y textiles blancos de spa: atmósfera aséptica lista para la aplicación del activo.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726770/home/ivan%20portafolio/10-DSC02468.jpg',
                        'title' => 'Extracción dermatológica con técnica manual',
                        'caption' => 'Toma macro bajo luz focal de diagnóstico: maniobras suaves para descongestión dérmica sin irritación tisular.',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726766/home/ivan%20portafolio/2-DSC02518.jpg',
                        'title' => 'Electroterapia de alta frecuencia germicida',
                        'caption' => 'Emanación de ozono dérmico con electrodo de vidrio: cauterización suave y oxigenación celular post-extracción.',
                        'aspect' => 'tall'
                    ],

                    // --- COLUMNA 2 (Items 6 a 11) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726783/home/ivan%20portafolio/30-DSC02344.jpg',
                        'title' => 'Terapia complementaria en manos y muñecas',
                        'caption' => 'Detalle de digitopresión manual con aceite esencial: experiencia holística que complementa el tratamiento facial.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726776/home/ivan%20portafolio/20-DSC02400.jpg',
                        'title' => 'Compresa térmica facial bajo luminaria envolvente',
                        'caption' => 'Especialista enmarcada bajo halo curvo: vapor y calidez para vasodilatación preparatoria de la piel.',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792726793/home/ivan%20portafolio/skincare_cabina_prep_vertical.mp4',
                        'title' => 'Preparación de cabina y ritual de bienvenida',
                        'caption' => 'Montaje de blancos, esterilización de superficies y aromatización en un espacio concebido para el bienestar.',
                        'format' => 'vertical',
                        'badge' => 'Espacio de cabina'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726774/home/ivan%20portafolio/19-DSC02415.jpg',
                        'title' => 'Emulsión activa y masaje de contacto circular',
                        'caption' => 'Toma lateral con luz difusa: textura cremosa en movimiento envolvente sobre el rostro del paciente.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726781/home/ivan%20portafolio/25-DSC02363.jpg',
                        'title' => 'Digitopresión periauricular y relajación',
                        'caption' => 'Presión suave en puntos reflexológicos: disipación de tensión facial y serenidad absoluta.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726777/home/ivan%20portafolio/21-DSC02372.jpg',
                        'title' => 'Drenaje linfático y modelado mandibular',
                        'caption' => 'Movimientos manuales ascendentes para estimular la microcirculación y definir los ángulos naturales del rostro.',
                        'aspect' => 'tall'
                    ],

                    // --- COLUMNA 3 (Items 12 a 17) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726789/home/ivan%20portafolio/64-DSC02070.jpg',
                        'title' => 'Microestimulación epidérmica con Dermapen',
                        'caption' => 'Macro close-up del cartucho de microagujas estéril: tecnología de vanguardia para inducción de colágeno.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726785/home/ivan%20portafolio/39-DSC02280.jpg',
                        'title' => 'Luminaria estética de arco envolvente',
                        'caption' => 'Ingeniería de iluminación curva sin sombras duras: confort visual para el paciente y máxima visibilidad en cabina.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792726803/home/ivan%20portafolio/skincare_consulta_diagnostico_paciente.mp4',
                        'title' => 'Consulta personalizada y diagnóstico dérmico',
                        'caption' => 'Evaluación individual del biotipo cutáneo, asesoría experta y formulación de rutinas clínicas.',
                        'format' => 'vertical',
                        'badge' => 'Diagnóstico'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726771/home/ivan%20portafolio/12-DSC02447.jpg',
                        'title' => 'Velo hidratante y fijación de activos',
                        'caption' => 'Emulsión hidropermeable en reposo: reposición del manto hidrolipídico y luminosidad visible en la dermis.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726787/home/ivan%20portafolio/45-DSC02262.jpg',
                        'title' => 'Protocolo nutritivo en cuello y escote',
                        'caption' => 'Cuidado integral de áreas fotosensibles con bálsamos regeneradores y maniobras de alisado dérmico.',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792726779/home/ivan%20portafolio/23-DSC02390.jpg',
                        'title' => 'Serenidad absoluta y piel revitalizada',
                        'caption' => 'Perfil en reposo con rostro luminoso e hidratado: el resultado tangible de un protocolo profesional de cabina.',
                        'aspect' => 'tall'
                    ]
                ],
                video: 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792726810/home/ivan%20portafolio/skincare_ana_quihui_reel_hero.mp4',
                order: 4,
                heroImage: 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_600,c_limit/v1792726765/home/ivan%20portafolio/1-DSC02526.jpg'
            ),

            'abogados' => new Niche(
                id: 'abogados',
                name: 'Abogados & Sector Corporativo',
                badge: 'Corporativo & Legal',
                tagline: 'Autoridad, reputación e imagen ejecutiva que genera certidumbre inmediata.',
                description: 'En el sector legal, arbitraje y consultoría corporativa, la credibilidad visual y la solemnidad determinan la confianza de inversionistas y clientes de alto perfil. Producimos retratos editoriales con iluminación envolvente de estudio, dirección de postura ejecutiva en salas de juntas y cápsulas de video con rigor jurídico que posicionan a despachos y socios como referentes indiscutibles en su materia.',
                coverImage: 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_650,c_limit/v1792730830/home/ivan%20portafolio/abogados_2-DSC00016.jpg',
                services: [
                    'Retratos ejecutivos individuales y de equipo para socios, asociados y directores',
                    'Fotografía de arquitectura corporativa: despachos privados, salas de juntas y lobbies',
                    'Cápsulas de video educativo: criterio jurídico, responsabilidad civil y prevención litigiosa',
                    'Contenido editorial para perfiles de LinkedIn, prensa especializada y dossiers institucionales',
                    'Documentación de firmas de acuerdos, arbitrajes y reuniones de consejo directivo'
                ],
                gallery: [
                    // --- COLUMNA 1 (Items 0 a 5) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730823/home/ivan%20portafolio/abogados_1-DSC00007.jpg',
                        'title' => 'Deliberación estratégica y revisión de expedientes',
                        'caption' => 'Socia y abogado analizando documentación en laptop sobre mesa de juntas: iluminación balanceada que resalta el trabajo colaborativo en litigios clave.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730824/home/ivan%20portafolio/abogados_6-DSC06042.jpg',
                        'title' => 'Presidencia legal y serenidad analítica',
                        'caption' => 'Socia en traje sastre negro sentada en sillón contemporáneo: postura relajada con aplomo, solvencia y firmeza institucional.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792730852/home/ivan%20portafolio/abogados_vid_asesoria_preventiva.mp4',
                        'title' => 'Cápsula jurídica: Asesoría preventiva y demandas corporativas',
                        'caption' => 'Orientación estratégica frente a controversias legales y defensa de derechos patrimoniales en tribunales.',
                        'format' => 'vertical',
                        'badge' => 'Asesoría Legal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730826/home/ivan%20portafolio/abogados_10-_DSC1453.jpg',
                        'title' => 'Equipo directivo en lobby arquitectónico',
                        'caption' => 'Perspectiva amplia al pie de escalera de acero y cristal: solidez corporativa y dimensión arquitectónica del despacho.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730827/home/ivan%20portafolio/abogados_4-_DSC1750.jpg',
                        'title' => 'Dirección jurídica en despacho corporativo',
                        'caption' => 'Retrato dual con fondo de piedra pizarra y cristal: liderazgo compartido entre litigio y consultoría mercantil.',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730828/home/ivan%20portafolio/abogados_1-DSC06458.jpg',
                        'title' => 'Retrato institucional de socia litigante',
                        'caption' => 'Encuadre formal de tres cuartos con brazos cruzados sobre fondo neutro de estudio: proyección de certidumbre y empatía profesional.',
                        'aspect' => 'tall'
                    ],

                    // --- COLUMNA 2 (Items 6 a 11) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730830/home/ivan%20portafolio/abogados_2-DSC00016.jpg',
                        'title' => 'Cierre de acuerdos y mediación contractual',
                        'caption' => 'Macro en primer plano de apretón de manos con traje sastre y reloj ejecutivo: el símbolo universal de compromiso y negociación exitosa.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730831/home/ivan%20portafolio/abogados_2-DSC06670.jpg',
                        'title' => 'Consejo directivo y certidumbre legal',
                        'caption' => 'Socio en sillón de piel capitonada en postura de escucha activa: elegancia sobria para perfiles de alto nivel directivo.',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792730858/home/ivan%20portafolio/abogados_vid_responsabilidad_civil.mp4',
                        'title' => 'Criterio legal: Responsabilidad civil y reclamación de daños',
                        'caption' => 'Explicación procesal sobre negligencia, daño moral y reparación integral del perjuicio en controversias civiles.',
                        'format' => 'vertical',
                        'badge' => 'Criterio Jurídico'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730833/home/ivan%20portafolio/abogados_2-DSC06362.jpg',
                        'title' => 'Retrato corporativo de socio litigante',
                        'caption' => 'Traje oscuro a medida y fondo gris tenue: expresión decidida para perfiles de arbitraje comercial y LinkedIn directivo.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730835/home/ivan%20portafolio/abogados_3-DSC06500.jpg',
                        'title' => 'Comité de socios en set de estudio',
                        'caption' => 'Composición horizontal simétrica en estudio: la fuerza de una firma multidisciplinaria respaldada por especialistas.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730837/home/ivan%20portafolio/abogados_1-DSC06557.jpg',
                        'title' => 'Presencia ejecutiva en consultoría corporativa',
                        'caption' => 'Socia con atuendo formal sobrio y luz modeladora suave: presencia ejecutiva para informes anuales y relaciones públicas.',
                        'aspect' => 'tall'
                    ],

                    // --- COLUMNA 3 (Items 12 a 17) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730838/home/ivan%20portafolio/abogados_1-DSC06688.jpg',
                        'title' => 'Presidencia ejecutiva en sillón de piel',
                        'caption' => 'Socio titular en sillón de piel negro con saco cruzado y corbata punteada: autoridad tradicional combinada con cercanía moderna.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730840/home/ivan%20portafolio/abogados_4-DSC06488.jpg',
                        'title' => 'Equipo multidisciplinario y asesoría integral',
                        'caption' => 'Toma grupal en estudio con gestos cordiales y receptivos: humanizando la práctica legal sin perder formalidad ni rigor.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792730865/home/ivan%20portafolio/abogados_vid_cumplimiento_mercantil.mp4',
                        'title' => 'Fundamento mercantil: Cumplimiento de contratos y plazos',
                        'caption' => 'Análisis de exigibilidad contractual, resolución pacífica y ejecución judicial de obligaciones mercantiles.',
                        'format' => 'vertical',
                        'badge' => 'Litigio Mercantil'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730842/home/ivan%20portafolio/abogados_8-_DSC1553.jpg',
                        'title' => 'Atención personalizada en despacho privado',
                        'caption' => 'Socia sentada junto a orquídea natural bajo luz ambiental cálida: atmósfera de confidencialidad para asesoría jurídica.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730843/home/ivan%20portafolio/abogados_5-_DSC1733.jpg',
                        'title' => 'Estrategia colegiada en oficina directiva',
                        'caption' => 'Plano medio del equipo directivo en instalaciones del despacho: solidez espacial y congruencia con la reputación de la firma.',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792730845/home/ivan%20portafolio/abogados_5-DSC06364.jpg',
                        'title' => 'Rigor procesal y carácter corporativo',
                        'caption' => 'Retrato vertical con luz perimetral definida: compostura profesional para litigio en tribunales y negociación de alto nivel.',
                        'aspect' => 'tall'
                    ]
                ],
                video: 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792730879/home/ivan%20portafolio/abogados_vid_institucional_hero.mp4',
                order: 5,
                heroImage: 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_600,c_limit/v1792730847/home/ivan%20portafolio/abogados_6-_DSC1717.jpg'
            ),

            'negocio-general' => new Niche(
                id: 'negocio-general',
                name: 'Negocio General & Marcas Locales',
                badge: 'Negocio General',
                tagline: 'Impulso comercial y posicionamiento para marcas locales con visión de crecimiento.',
                description: 'Impulsamos el valor percibido de marcas locales, boutiques, productos de consumo, retail y espacios comerciales de Hermosillo. Desarrollamos producciones visuales de estándar internacional que combinan fotografía editorial en locación, producto en estudio controlado y reels comerciales de alto impacto que profesionalizan tu presencia digital y aceleran las ventas.',
                coverImage: '/assets/images/sectores/negocio-general.webp',
                services: [
                    'Fotografía comercial de catálogo, e-commerce, calzado y moda urbana',
                    'Campañas editoriales en locación con modelos, styling y producto puesto',
                    'Reels comerciales para retail, lanzamientos de temporada y gastronomía/lounge',
                    'Fotografía macro de producto, relojería, packaging y texturas de alta gama',
                    'Producción audiovisual corporativa para clínicas especializadas y marcas locales'
                ],
                gallery: [
                    // --- COLUMNA 1 (8 elementos: tall, h-video, square, v-video, horizontal, tall, medium, h-video) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731787/home/ivan%20portafolio/negocio_padel-sportswear.jpg',
                        'title' => 'Moda deportiva y dinamismo en cancha',
                        'caption' => 'Jugador avanzando sobre pista de pádel bajo luz rasante: producción editorial que destaca el calce y rendimiento de indumentaria deportiva local.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1793327258/Grabaci%C3%B3n_2026-10-29_184859.mp4',
                        'title' => 'Producción audiovisual comercial y corporativa',
                        'caption' => 'Dirección cinematográfica horizontal para posicionamiento de marcas locales y presentación de alto impacto.',
                        'format' => 'horizontal',
                        'badge' => 'Video 16:9'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792724404/home/ivan%20portafolio/1-DSC05107.jpg',
                        'title' => 'Composición comercial para suplementación deportiva',
                        'caption' => 'Enfoque nítido en empaque de producto con iluminación controlada como prueba de valor para branding comercial.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792731802/home/ivan%20portafolio/negocio_vid_perfumeria_retail.mp4',
                        'title' => 'Campaña retail: Selección de fragancias para verano',
                        'caption' => 'Reel comercial de producto para perfumería local: tomas macro, estilismo con agua y dinamismo visual para catálogo de temporada.',
                        'format' => 'vertical',
                        'badge' => 'Retail Comercial'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731788/home/ivan%20portafolio/negocio_gallery-4.jpg',
                        'title' => 'Editorial western y atardecer sonorense',
                        'caption' => 'Composición horizontal en locación abierta: pareja con mezclilla y gafas oscuras capturada en la hora dorada del desierto.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1793329098/8-DSC05085.jpg',
                        'title' => 'Campaña de marca y línea de suplementos Denver Labs',
                        'caption' => 'Fotografía comercial con embajadora de marca destacando la línea completa de productos con iluminación cálida y reflejo en superficie.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731789/home/ivan%20portafolio/negocio_gallery-7.jpg',
                        'title' => 'Compostura atlética en pista azul',
                        'caption' => 'Atleta sentada en cancha de pádel con pala y pelota: balance tonal que combina el azul intenso del césped con indumentaria monocromática.',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1793327258/Grabaci%C3%B3n_2026-10-29_192728.mp4',
                        'title' => 'Contenido comercial dinámico para marcas',
                        'caption' => 'Producción audiovisual enfocada en captar la atención y destacar la propuesta de valor del negocio.',
                        'format' => 'horizontal',
                        'badge' => 'Video Comercial'
                    ],

                    // --- COLUMNA 2 (7 elementos: square, tall, v-video, medium, square, tall, tall) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731790/home/ivan%20portafolio/negocio_reloj-producto.jpg',
                        'title' => 'Macrotextura en relojería y detalles finos',
                        'caption' => 'Primer plano a reloj clásico con correa de cuero y acabados metálicos: fotografía de producto con luz rasante para destacar precisión artesanal.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731788/home/ivan%20portafolio/negocio_gallery-2.jpg',
                        'title' => 'Editorial de óptica y accesorios de lujo',
                        'caption' => 'Primer plano cerrado a silueta de gafas de sol Vogue: iluminación perimetral que define la textura del armazón y el reflejo del lente.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792731815/home/ivan%20portafolio/negocio_vid_dorian_lounge.mp4',
                        'title' => 'Campaña nocturna: Dorian Gastro-Bar & Lounge',
                        'caption' => 'Producción audiovisual envolvente: iluminación neón, cristalería en suspensión y atmósfera vibrante para posicionar la experiencia nocturna.',
                        'format' => 'vertical',
                        'badge' => 'Gastro & Lounge'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731790/home/ivan%20portafolio/negocio_gallery-8.jpg',
                        'title' => 'Textil deportivo y actitud en red',
                        'caption' => 'Atleta femenina apoyada en red de pádel con gafas oscuras: encuadre de plano medio que resalta la confección técnica del conjunto.',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1793329094/44-DSC08980.jpg',
                        'title' => 'Fotografía comercial para tienda de suplementación deportiva',
                        'caption' => 'Retrato comercial en locación exhibiendo variedad de marcas y catálogo de proteínas para campañas de retail y redes sociales.',
                        'aspect' => 'square'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731791/home/ivan%20portafolio/negocio_gallery-10.jpg',
                        'title' => 'Golden hour en Club de Pádel',
                        'caption' => 'Paseo en solitario por la pista con destello cálido a contraluz: contenido aspiracional para promocionar membresías e indumentaria de club.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731793/home/ivan%20portafolio/negocio_gallery-6.jpg',
                        'title' => 'Estilismo casual en entorno regional',
                        'caption' => 'Caminata al aire libre con camisa oscura y mezclilla: conexión con la identidad norteña y autenticidad visual para marcas de ropa urbana.',
                        'aspect' => 'tall'
                    ],

                    // --- COLUMNA 3 (7 elementos: horizontal, v-video, medium, tall, v-video, horizontal, tall) ---
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731792/home/ivan%20portafolio/negocio_DSC05674.jpg',
                        'title' => 'Comunidad y estilo en equipo',
                        'caption' => 'Toma horizontal de trío de atletas con palas en mano: fotografía grupal que proyecta camaradería y estilo de vida activo.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/osmrbv2a/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1793327243/RAM_VIDEO_OFICIAL_-_KH.mp4',
                        'title' => 'Campaña automotriz y comercial: RAM Oficial',
                        'caption' => 'Producción audiovisual de alto impacto destacando potencia, diseño e imponente presencia en locación.',
                        'format' => 'vertical',
                        'badge' => 'Spot Oficial'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731794/home/ivan%20portafolio/negocio_DSC04994.jpg',
                        'title' => 'Packaging de lujo: Jean Paul Gaultier Le Beau',
                        'caption' => 'Modelo exhibiendo estuche de perfumería prémium en set de estudio: encuadre vertical ideal para campañas promocionales y redes sociales.',
                        'aspect' => 'medium'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731789/home/ivan%20portafolio/negocio_gallery-1.jpg',
                        'title' => 'Lookbook de estudio y bolso acolchado de diseño',
                        'caption' => 'Modelo en movimiento con bolso puffer Enso sobre fondo blanco puro: fotografía limpia diseñada para e-commerce y tiendas digitales.',
                        'aspect' => 'tall'
                    ],
                    [
                        'type' => 'video',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792731819/home/ivan%20portafolio/negocio_vid_magventure_clinica.mp4',
                        'title' => 'Producción médica: Clínica de estimulación MagVenture',
                        'caption' => 'Video institucional sobre tecnología médica de estimulación transcraneal: cabina especializada, aparatología y confianza profesional.',
                        'format' => 'vertical',
                        'badge' => 'Salud & Bienestar'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731795/home/ivan%20portafolio/negocio_DSC05186.jpg',
                        'title' => 'Gafas urbanas y actitud contemporánea',
                        'caption' => 'Retrato en plano medio con gafas de sol oscuras y playera blanca: frescura y minimalismo para colecciones de moda juvenil.',
                        'aspect' => 'horizontal'
                    ],
                    [
                        'type' => 'image',
                        'src' => 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_700,c_limit/v1792731796/home/ivan%20portafolio/negocio_DSC04909.jpg',
                        'title' => 'Portabilidad y estilo en marroquinería',
                        'caption' => 'Modelo sentada con bolso de mano sobre set neutro: iluminación suave que resalta los herrajes y volumen del accesorio.',
                        'aspect' => 'tall'
                    ]
                ],
                video: 'https://res.cloudinary.com/dbs1ypch/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1792731815/home/ivan%20portafolio/negocio_vid_dorian_lounge.mp4',
                order: 6,
                heroImage: 'https://res.cloudinary.com/dbs1ypch/image/upload/f_auto,q_auto:eco,w_600,c_limit/v1792731787/home/ivan%20portafolio/negocio_golden-hour-padel.jpg'
            )
        ];
    }
}
