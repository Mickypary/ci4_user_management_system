<?= $this->extend('layouts/base') ?>



<?= $this->section('content'); ?>
        
        <!-- Slider Section -->
        <section>
            <?= $this->include('partials/slider'); ?>
        </section>
        
        <!-- Features Section -->
        <section id="features">
            <?= $this->include('partials/features'); ?>
        </section>

        <!-- About Section -->
        <section id="about">
            <?= $this->include('partials/about'); ?>
        </section>

        <!-- Articles Section -->
        <section id="about">
            <?= $this->include('partials/articles'); ?>
        </section>



<?= $this->endSection(); ?>
        