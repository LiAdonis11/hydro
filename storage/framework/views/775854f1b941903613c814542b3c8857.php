<?php $__env->startSection('title', 'About Us'); ?>

<?php $__env->startSection('content'); ?>
<!-- Custom CSS for Refined Monochromatic Minimalist About Us page -->
<style>
    :root {
        --primary: #222222;
        --text: #222222;
        --text-light: #666666;
        --background: #ffffff;
        --surface: #f8f8f8;
        --border: #e8e8e8;
        --accent: #222222;
        --shadow-sm: rgba(0, 0, 0, 0.03);
        --shadow-md: rgba(0, 0, 0, 0.06);
        --shadow-lg: rgba(0, 0, 0, 0.1);
    }

    body {
        font-family: 'Helvetica Neue', Arial, sans-serif;
        line-height: 1.6;
        color: var(--text);
        background-color: var(--background);
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .section {
        margin: 6rem 0;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 300;
        letter-spacing: 0.15em;
        margin-bottom: 3rem;
        position: relative;
        display: inline-block;
        text-transform: uppercase;
    }

    .section-title::after {
        content: '';
        position: absolute;
        width: 40px;
        height: 1px;
        background: var(--accent);
        bottom: -16px;
        left: 0;
    }

    .card {
        background: var(--background);
        padding: 2.5rem;
        margin-bottom: 2rem;
        border-radius: 2px;
        box-shadow: 0 2px 8px var(--shadow-sm), 0 4px 16px var(--shadow-md);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 4px 12px var(--shadow-md), 0 8px 24px var(--shadow-lg);
        transform: translateY(-2px);
    }

    .surface-section {
        background: var(--surface);
        padding: 5rem 0;
        position: relative;
        box-shadow: inset 0 2px 8px var(--shadow-sm), inset 0 -2px 8px var(--shadow-sm);
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 3rem;
    }

    .team-member {
        text-align: center;
        padding: 2rem;
        background: var(--background);
        border-radius: 2px;
        box-shadow: 0 2px 6px var(--shadow-sm);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .team-member:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 12px var(--shadow-md);
    }

    .avatar {
        width: 70px;
        height: 70px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-weight: 300;
        color: var(--text);
        font-size: 1.5rem;
        background: var(--surface);
        border-radius: 50%;
        box-shadow: 0 2px 6px var(--shadow-sm), inset 0 1px 3px var(--shadow-sm);
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2.5rem;
    }

    .feature-line {
        width: 20px;
        height: 1px;
        background-color: var(--accent);
        margin-right: 1.5rem;
        margin-top: 0.7rem;
    }

    .btn {
        background: var(--background);
        border: none;
        box-shadow: 0 2px 4px var(--shadow-sm);
        padding: 0.8rem 2rem;
        text-decoration: none;
        color: var(--text);
        display: inline-block;
        font-weight: 300;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        font-size: 0.8rem;
        transition: all 0.3s ease;
        border-radius: 2px;
        position: relative;
        overflow: hidden;
    }

    .btn::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: var(--accent);
        transition: transform 0.3s ease;
    }

    .btn:hover {
        box-shadow: 0 4px 8px var(--shadow-md);
        transform: translateY(-2px);
    }

    .btn:hover::after {
        transform: scaleX(0.8);
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 4rem;
    }

    .feature-card {
        padding: 2rem;
        background: var(--background);
        border-radius: 2px;
        box-shadow: 0 2px 8px var(--shadow-sm);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px var(--shadow-md);
    }

    @media (max-width: 768px) {
        .features-grid,
        .team-grid {
            grid-template-columns: 1fr;
        }

        .section {
            margin: 4rem 0;
        }
    }

    /* New styles for centering content vertically and horizontally */
    .center-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 2rem;
        box-sizing: border-box;
    }
</style>
<div class="center-wrapper">

<!-- Hero Section -->
<div class="container section">
    <h1 class="section-title">About</h1>
    <div class="card">
        <p style="color: var(--text-light); font-weight: 300; letter-spacing: 0.05em;">
            Building innovative hydroponics monitoring solutions.
        </p>
    </div>
</div>

<!-- Mission Section -->


<!-- Team Section -->
<div class="surface-section">
    <div class="container section" style="margin: 0;">
        <h2 class="section-title">Team</h2>
        <p style="color: var(--text-light); margin-bottom: 4rem; font-weight: 300; letter-spacing: 0.02em;">
            A team of 3rd year college students from ISPSC, focused on agricultural technology.
        </p>

        <div class="team-grid">
            <!-- Team Member 1 -->
            <div class="team-member">
                <div class="avatar">L</div>
                <h3 style="font-weight: 300; margin-bottom: 0.75rem; letter-spacing: 0.05em;">Lee Adonis Lucero</h3>
                <p style="color: var(--text-light); font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.1em;">Technical Lead</p>
            </div>

            <!-- Team Member 2 -->
            <div class="team-member">
                <div class="avatar">D</div>
                <h3 style="font-weight: 300; margin-bottom: 0.75rem; letter-spacing: 0.05em;">Dane Villegas</h3>
                <p style="color: var(--text-light); font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.1em;">Data Specialist</p>
            </div>

            <!-- Team Member 3 -->
            <div class="team-member">
                <div class="avatar">J</div>
                <h3 style="font-weight: 300; margin-bottom: 0.75rem; letter-spacing: 0.05em;">Joseph Rosales</h3>
                <p style="color: var(--text-light); font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.1em;">UI/UX Designer</p>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->


<!-- Contact Section -->
<div class="container section" style="text-align: center; margin-bottom: 8rem;">
    <h2 class="section-title" style="margin-left: auto; margin-right: auto;">Contact</h2>
    <div class="card" style="max-width: 500px; margin: 0 auto;">
        <p style="color: var(--text-light); margin-bottom: 3rem; font-weight: 300; letter-spacing: 0.02em;">
            For more information about our Hydroponics Monitoring System.
        </p>
        <a href="#" class="btn">Contact Us</a>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hydroponics-api\resources\views/hydroponics/about.blade.php ENDPATH**/ ?>