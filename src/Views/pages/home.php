<?php
declare(strict_types=1);

use App\Core\View;

/**
 * @var \App\Models\SiteConfig $site
 * @var array<string, \App\Models\Niche> $niches
 * @var array<\App\Models\Project> $projects
 * @var array<string, mixed>|null $flash
 */
?>

<?= View::partial('partials/hero', ['site' => $site]) ?>

<?= View::partial('partials/about_me') ?>

<?= View::partial('partials/intro') ?>

<?= View::partial('partials/work', ['niches' => $niches, 'projects' => $projects]) ?>

<?= View::partial('partials/services') ?>

<?= View::partial('partials/results', ['site' => $site]) ?>

<?= View::partial('partials/pricing', ['site' => $site]) ?>

<?= View::partial('partials/testimonials', ['site' => $site]) ?>

<?= View::partial('partials/brand_strip') ?>

<?= View::partial('partials/contact', ['site' => $site]) ?>
