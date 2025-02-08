<?php echo $this->include('layout/header'); ?>

<!-- Hero Section -->
<header class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1>Welcome to CoreX</h1>
        <p class="lead">The Ultimate FiveM Roleplay Framework</p>
        <a href="#download" class="btn btn-light btn-lg">Get Started</a>
    </div>
</header>

<!-- Features Section -->
<section id="features" class="container py-5">
    <h2 class="text-center">CoreX Features</h2>
    <div class="row mt-4">
        <div class="col-md-4 text-center">
            <h4>🚀 Optimized Performance</h4>
            <p>CoreX is built for efficiency with modular and lightweight code.</p>
        </div>
        <div class="col-md-4 text-center">
            <h4>💼 Advanced Job System</h4>
            <p>Custom jobs, salaries, and role-based interactions for RP servers.</p>
        </div>
        <div class="col-md-4 text-center">
            <h4>🔧 Fully Configurable</h4>
            <p>CoreX provides an extensive configuration system for easy customization.</p>
        </div>
    </div>
</section>

<!-- Download Section -->
<section id="download" class="bg-light py-5">
    <div class="container text-center">
        <h2>Download CoreX</h2>
        <p>Get the latest version of CoreX Framework.</p>
        <a href="https://github.com/LegacyAngel2K9/CoreX" target="_blank" class="btn btn-primary">Download on GitHub</a>
    </div>
</section>

<!-- Documentation Section -->
<section id="docs" class="container py-5">
    <h2 class="text-center">Documentation</h2>
    <p class="text-center">Learn how to install, configure, and use CoreX.</p>
    <div class="text-center">
        <a href="https://docs.core-x.dev" target="_blank" class="btn btn-success">View Documentation</a>
    </div>
</section>

<!-- Team Section -->
<section id="team" class="bg-dark text-white py-5">
    <div class="container text-center">
        <h2>Meet the Team</h2>
        <p>CoreX is built and maintained by an amazing team of developers.</p>
        <div class="row mt-4">
            <?php if (!empty($team) && is_array($team)): ?>
                <?php foreach ($team as $member): ?>
                    <div class="col-md-3 text-center">
                        <img src="<?= isset($member['avatar_url']) ? htmlspecialchars($member['avatar_url']) : 'default-avatar.png'; ?>" class="rounded-circle" width="80" height="80" alt="Contributor">
                        <h5 class="mt-2">
                            <?php if (!empty($member['profile_url'])): ?>
                                <a href="<?= htmlspecialchars($member['profile_url']); ?>" target="_blank" class="text-white">@<?= htmlspecialchars($member['username'] ?? 'Unknown'); ?></a>
                            <?php else: ?>
                                @<?= htmlspecialchars($member['username'] ?? 'Unknown'); ?>
                            <?php endif; ?>
                        </h5>
                        <p>Contributions: <?= isset($member['contributions']) ? (int)$member['contributions'] : 'N/A'; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No contributors found or failed to fetch data.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Community Section -->
<section id="community" class="bg-dark text-white py-5">
    <div class="container text-center">
        <h2>Join Our Community</h2>
        <p>Connect with developers and players on Discord.</p>
        <a href="https://discord.core-x.dev" target="_blank" class="btn btn-light">Join Discord</a>
    </div>
</section>

<?php echo $this->include('layout/footer'); ?>
