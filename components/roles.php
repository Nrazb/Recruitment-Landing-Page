<?php
$roles = [
    [
        'id' => 'frontend-dev',
        'name' => 'Frontend Developer',
        'category' => 'Technology',
        'icon' => '〈/〉',
        'description' => 'Membangun tampilan website yang menarik, interaktif, dan responsif.',
        'full_desc' => 'Bertanggung jawab penuh atas implementasi desain UI/UX menjadi kode antarmuka web yang bersih, cepat, dan responsif menggunakan teknologi modern seperti Tailwind CSS, React/Vue, dan JavaScript.',
        'requirements' => ['Pengalaman min. 1 tahun di bidang Frontend Development', 'Mahir HTML5, CSS3, JavaScript modern, dan Tailwind CSS', 'Terbiasa menggunakan Git & kolaborasi tim']
    ],
    [
        'id' => 'backend-dev',
        'name' => 'Backend Developer',
        'category' => 'Technology',
        'icon' => '▤',
        'description' => 'Mengembangkan sistem, database, dan arsitektur API aplikasi.',
        'full_desc' => 'Merancang dan mengoptimalkan RESTful API, mengelola struktur database yang aman dan efisien, serta memastikan performa server dan keamanan sistem aplikasi Sekolah Karir.',
        'requirements' => ['Menguasai PHP / Node.js dan framework terkait', 'Pengalaman manajemen database MySQL / PostgreSQL', 'Memahami keamanan web dan arsitektur microservices']
    ],
    [
        'id' => 'ui-ux-designer',
        'name' => 'UI/UX Designer',
        'category' => 'Creative',
        'icon' => '✦',
        'description' => 'Merancang tampilan dan pengalaman pengguna digital yang berkesan.',
        'full_desc' => 'Melakukan riset pengguna, membuat wireframe, user flow, hingga high-fidelity prototype interaktif menggunakan Figma untuk memastikan produk digital mudah digunakan dan estetik.',
        'requirements' => ['Portofolio desain UI/UX yang kuat', 'Mahir menggunakan Figma dan tools prototyping', 'Memahami prinsip Design Thinking dan User-Centered Design']
    ],
    [
        'id' => 'digital-marketing',
        'name' => 'Digital Marketing',
        'category' => 'Marketing',
        'icon' => '↗',
        'description' => 'Mengembangkan strategi pemasaran digital dan pertumbuhan brand.',
        'full_desc' => 'Merencanakan dan mengeksekusi kampanye pemasaran digital melalui media sosial, paid traffic, SEO, serta menganalisis metrik performa untuk meningkatkan jangkauan audiens.',
        'requirements' => ['Pengalaman mengelola campaign SEM / Meta Ads', 'Memiliki kemampuan copywriting dan analisis data', 'Kreatif dan update dengan tren digital marketing']
    ],
    [
        'id' => 'graphic-designer',
        'name' => 'Graphic Designer',
        'category' => 'Creative',
        'icon' => '✎',
        'description' => 'Membuat visual dan materi komunikasi kreatif untuk berbagai platform.',
        'full_desc' => 'Menghasilkan aset visual berkualitas tinggi untuk kebutuhan promosi sosial media, banner web, materi presentasi, dan branding identitas perusahaan.',
        'requirements' => ['Menguasai Adobe Illustrator, Photoshop, atau Canva', 'Kreatif dengan selera estetika visual yang tinggi', 'Mampu bekerja cepat dalam tenggat waktu']
    ],
    [
        'id' => 'data-analyst',
        'name' => 'Data Analyst',
        'category' => 'Data & Analytics',
        'icon' => '▥',
        'description' => 'Mengolah data menjadi insight berharga untuk pengambilan keputusan bisnis.',
        'full_desc' => 'Mengumpulkan, membersihkan, dan menganalisis dataset operasional perusahaan untuk menyajikan laporan visual dan rekomendasi strategis bagi manajemen.',
        'requirements' => ['Menguasai SQL, Python/R, dan tools visualisasi (Tableau/PowerBI)', 'Kemampuan berpikir analitis dan problem-solving yang kuat', 'Teliti dan berorientasi pada detail data']
    ]
];
$divisions = array_unique(array_column($roles, 'category'));
?>

<section class="roles-section" id="karir">
    <div class="roles-heading">
        <div>
            <div class="eyebrow">
                <span class="eyebrow-accent">✦</span>
                CAREER OPPORTUNITIES
            </div>
            <h2>Find Your <span>Role.</span></h2>
            <p>Geser ke samping untuk mengeksplorasi posisi yang tersedia.</p>
        </div>
        <span class="position-count-badge">
            Total: <strong><?= count($roles) ?> Roles</strong> Available
        </span>
    </div>

    <!-- Divisi -->
    <div class="division-filters" id="divisionFilters">
        <button type="button" class="filter-btn active" data-filter="all" aria-pressed="true">
            All Divisions
        </button>
        <?php foreach ($divisions as $division): ?>
            <button type="button" class="filter-btn" data-filter="<?= htmlspecialchars($division) ?>" aria-pressed="false">
                <?= htmlspecialchars($division) ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div class="role-carousel-wrapper">
        <div class="role-carousel-track" id="roleCarouselTrack">
            <?php foreach ($roles as $role): ?>
                <article class="role-card glass-panel" 
                         data-category="<?= htmlspecialchars($role['category']) ?>"
                         data-role-name="<?= htmlspecialchars($role['name']) ?>"
                         data-role-desc="<?= htmlspecialchars($role['full_desc']) ?>"
                         data-role-req='<?= htmlspecialchars(json_encode($role['requirements']), ENT_QUOTES, 'UTF-8') ?>'>
                    <div class="role-card-head">
                        <span class="role-icon">
                            <?= htmlspecialchars($role['icon']) ?>
                        </span>
                        <span class="role-arrow">↗</span>
                    </div>
                    <div class="role-copy">
                        <span class="role-category">
                            <?= htmlspecialchars($role['category']) ?>
                        </span>
                        <h3>
                            <?= htmlspecialchars($role['name']) ?>
                        </h3>
                        <p>
                            <?= htmlspecialchars($role['description']) ?>
                        </p>
                    </div>
                    <div class="role-link">
                        Lihat detail & lamar <span>→</span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
    <p class="filter-empty" id="filterEmpty" hidden>
        Belum ada posisi tersedia pada divisi ini.
    </p>
</section>

<!-- Detail Role -->
<div class="role-modal-overlay" id="roleModalOverlay">
    <div class="role-modal glass-panel" id="roleModalContent">
        <button class="modal-close" id="modalClose" aria-label="Tutup">&times;</button>
        <div class="modal-header">
            <span id="modalCategory" class="role-category">Kategori</span>
            <h3 id="modalTitle">Nama Posisi</h3>
        </div>
        <div class="modal-body">
            <h4>Deskripsi Pekerjaan</h4>
            <p id="modalDesc">Deskripsi lengkap...</p>
            <h4>Kualifikasi Utama</h4>
            <ul id="modalReqList"></ul>
        </div>
        <div class="modal-footer">
            <a id="modalApplyBtn" href="#" class="button-pink">Kirim Lamaran Sekarang →</a>
        </div>
    </div>
</div>