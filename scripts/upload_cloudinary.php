<?php
declare(strict_types=1);

/**
 * Script de subida directa a Cloudinary para imágenes de portada de Ivan Media
 * 
 * Uso:
 *   php scripts/upload_cloudinary.php
 * 
 * Requiere en .env:
 *   CLOUDINARY_URL=cloudinary://<api_key>:<api_secret>@dbs1ypch
 *   o
 *   CLOUDINARY_API_KEY=...
 *   CLOUDINARY_API_SECRET=...
 *   CLOUDINARY_CLOUD_NAME=dbs1ypch
 */

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Env;

Env::load(__DIR__ . '/../.env');

$cloudinaryUrl = (string)env('CLOUDINARY_URL', '');
$cloudName = (string)env('CLOUDINARY_CLOUD_NAME', 'dbs1ypch');
$apiKey = (string)env('CLOUDINARY_API_KEY', '');
$apiSecret = (string)env('CLOUDINARY_API_SECRET', '');

if ($cloudinaryUrl !== '') {
    $parsed = parse_url($cloudinaryUrl);
    if ($parsed) {
        $apiKey = $parsed['user'] ?? $apiKey;
        $apiSecret = $parsed['pass'] ?? $apiSecret;
        $cloudName = $parsed['host'] ?? $cloudName;
    }
}

if ($apiKey === '' || $apiSecret === '') {
    echo "\n[AVISO] No se encontraron las credenciales de Cloudinary en el archivo .env.\n";
    echo "Por favor agrega a tu .env una de las siguientes opciones:\n\n";
    echo "Opción A:\n";
    echo "  CLOUDINARY_URL=cloudinary://<tu_api_key>:<tu_api_secret>@{$cloudName}\n\n";
    echo "Opción B:\n";
    echo "  CLOUDINARY_CLOUD_NAME={$cloudName}\n";
    echo "  CLOUDINARY_API_KEY=tu_api_key\n";
    echo "  CLOUDINARY_API_SECRET=tu_api_secret\n\n";
    echo "Encuentras estas credenciales en tu panel de Cloudinary: https://console.cloudinary.com/pm\n\n";
    exit(1);
}

$imagesToUpload = [
    'restaurante' => [
        'file' => __DIR__ . '/../MATERIAL PAGINA WEB/FOTOS/RESTAURANT/7-DSC05249.jpg',
        'public_id' => '7-DSC05249',
        'folder' => 'home/ivan portafolio'
    ],
    'cuidado-de-la-piel' => [
        'file' => __DIR__ . '/../MATERIAL PAGINA WEB/FOTOS/CUIDADO DE LA PIEL/8-DSC02482.jpg',
        'public_id' => '8-DSC02482',
        'folder' => 'home/ivan portafolio'
    ],
    'negocio-general' => [
        'file' => __DIR__ . '/../MATERIAL PAGINA WEB/FOTOS/NEGOCIO GENERAL/DSC01791.jpg',
        'public_id' => 'DSC01791',
        'folder' => 'home/ivan portafolio'
    ]
];

$results = [];

foreach ($imagesToUpload as $key => $info) {
    $filePath = $info['file'];
    if (!file_exists($filePath)) {
        echo "[ERROR] No se encontró el archivo: {$filePath}\n";
        continue;
    }

    echo "Subiendo {$info['public_id']} a Cloudinary ({$cloudName})...\n";

    $timestamp = time();
    $paramsToSign = [
        'folder' => $info['folder'],
        'public_id' => $info['public_id'],
        'timestamp' => $timestamp
    ];
    ksort($paramsToSign);

    $signString = '';
    foreach ($paramsToSign as $k => $v) {
        $signString .= "{$k}={$v}&";
    }
    $signString = rtrim($signString, '&') . $apiSecret;
    $signature = sha1($signString);

    $postData = [
        'file' => new CURLFile($filePath),
        'api_key' => $apiKey,
        'timestamp' => $timestamp,
        'folder' => $info['folder'],
        'public_id' => $info['public_id'],
        'signature' => $signature
    ];

    $ch = curl_init("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($httpCode === 200) {
        $data = json_decode((string)$response, true);
        $secureUrl = $data['secure_url'] ?? '';
        echo "✓ Subido con éxito: {$secureUrl}\n";
        $results[$key] = $secureUrl;
    } else {
        echo "[FALLÓ] Código HTTP {$httpCode}: {$response} {$curlError}\n";
    }
}

if (!empty($results)) {
    echo "\nActualizando src/Repositories/NicheRepository.php con los nuevos links...\n";
    $repoFile = __DIR__ . '/../src/Repositories/NicheRepository.php';
    $content = file_get_contents($repoFile);

    foreach ($results as $nicheKey => $uploadedUrl) {
        // Build optimized w_800 URL
        $optimizedUrl = str_replace('/image/upload/', '/image/upload/f_auto,q_auto,w_800/', $uploadedUrl);
        
        if ($nicheKey === 'restaurante') {
            $content = preg_replace(
                '/(id:\s*\'restaurante\'.*?coverImage:\s*\')[^\']+(\')/s',
                '${1}' . $optimizedUrl . '${2}',
                $content
            );
        } elseif ($nicheKey === 'cuidado-de-la-piel') {
            $content = preg_replace(
                '/(id:\s*\'cuidado-de-la-piel\'.*?coverImage:\s*\')[^\']+(\')/s',
                '${1}' . $optimizedUrl . '${2}',
                $content
            );
        } elseif ($nicheKey === 'negocio-general') {
            $content = preg_replace(
                '/(id:\s*\'negocio-general\'.*?coverImage:\s*\')[^\']+(\')/s',
                '${1}' . $optimizedUrl . '${2}',
                $content
            );
        }
    }

    file_put_contents($repoFile, $content);
    echo "✓ NicheRepository.php actualizado exitosamente.\n";
}
