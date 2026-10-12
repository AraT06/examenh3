<?php

require __DIR__ . '/../src/bootstrap.php';

use App\Config\Database;

$pdo = Database::connection();

$count = (int) $pdo->query('SELECT COUNT(*) FROM profile')->fetchColumn();
if ($count > 0) {
    echo "Table profile already has data, skipping seed.\n";
    exit(0);
}

$pdo->beginTransaction();

$pdo->prepare('
    INSERT INTO profile (
        full_name, headline, typed_roles, about_intro, about_summary, about_extra,
        birth_date, website, phone, city, degree, email, freelance, address,
        avatar_path, hero_path, latitude, longitude, map_span
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
')->execute([
    'Santiago Echeverria',
    'Systems Engineering student and backend developer',
    'Backend Developer, Systems Engineering Student, Go Developer, Docker Enthusiast',
    'Sixth semester Systems Engineering student at Unifranz. I build web applications with Go, Node and Next.js on top of PostgreSQL, and I ship them in containers.',
    'I like understanding how things work underneath: routers, data layers, containers and orchestration. This portfolio is an example of that, a Bootstrap template served from a hand written PHP MVC with all the content stored in PostgreSQL.',
    'Right now I am taking Programacion V at Unifranz, working mostly on backend and infrastructure. I am looking for internships or projects where I can keep growing in backend architecture and Kubernetes.',
    '2005-10-20',
    'github.com/TantiE100',
    '+591 76961855',
    'Cochabamba, Bolivia',
    'Undergraduate',
    'santy10mcpe@gmail.com',
    'Available',
    'Cochabamba, Bolivia',
    'assets/img/profile.jpg',
    'assets/img/hero.jpg',
    -17.377530,
    -66.128214,
    0.02,
]);

$socials = [
    [1, 'github', 'bi bi-github', 'https://github.com/TantiE100'],
    [2, 'linkedin', 'bi bi-linkedin', 'https://www.linkedin.com/in/santi-echeverria/'],
    [3, 'instagram', 'bi bi-instagram', 'https://www.instagram.com/santiecheverr1a/'],
    [4, 'twitter', 'bi bi-twitter-x', 'https://x.com/tantimane100'],
];
$stmt = $pdo->prepare('INSERT INTO social_links (sort_order, css_class, icon, url) VALUES (?, ?, ?, ?)');
foreach ($socials as $row) {
    $stmt->execute($row);
}

$stats = [
    [1, 'bi bi-mortarboard', 6, 'Semesters', 'of Systems Engineering'],
    [2, 'bi bi-stack', 6, 'Technologies', 'used day to day'],
    [3, 'bi bi-hdd-network', 2, 'Years', 'working with containers'],
    [4, 'bi bi-cup-hot', 900, 'Hours', 'in front of the editor'],
];
$stmt = $pdo->prepare('INSERT INTO stats (sort_order, icon, value, label, caption) VALUES (?, ?, ?, ?, ?)');
foreach ($stats as $row) {
    $stmt->execute($row);
}

$skills = [
    [1, 'Go', 85],
    [2, 'Node.js', 80],
    [3, 'Next.js', 75],
    [4, 'PostgreSQL', 80],
    [5, 'Docker', 80],
    [6, 'Kubernetes', 65],
];
$stmt = $pdo->prepare('INSERT INTO skills (sort_order, name, percent) VALUES (?, ?, ?)');
foreach ($skills as $row) {
    $stmt->execute($row);
}

$resume = [
    [
        'education', 1,
        'Systems Engineering (in progress)',
        '2024 - Present',
        'Universidad Privada Franz Tamayo (Unifranz), Cochabamba',
        'Currently in the sixth semester. Coursework focused on programming, databases and graphics and multimedia programming.',
        null,
    ],
    [
        'education', 2,
        'Primary and secondary school',
        'Until 2023',
        'Colegio Capilla, Cochabamba',
        'Full primary and secondary education at the same school.',
        null,
    ],
    [
        'experience', 1,
        'Backend and infrastructure practice',
        '2024 - Present',
        'Personal and coursework projects',
        null,
        '{"Services in Go and Node.js backed by PostgreSQL","Full stack apps with Next.js on the frontend","Containerized development environments with Docker and docker compose","First deployments on Kubernetes"}',
    ],
];
$stmt = $pdo->prepare('INSERT INTO resume_items (kind, sort_order, title, period, place, body, bullets) VALUES (?, ?, ?, ?, ?, ?, ?)');
foreach ($resume as $row) {
    $stmt->execute($row);
}

$services = [
    [1, 'bi bi-hdd-stack', 'Backend development', 'HTTP services and APIs in Go and Node.js, with a clear separation between transport, domain and data access.'],
    [2, 'bi bi-database', 'Data modeling', 'PostgreSQL schema design, versioned migrations and prepared statements.'],
    [3, 'bi bi-box', 'Containers', 'Application packaging with Docker and docker compose for both development and delivery.'],
    [4, 'bi bi-diagram-3', 'Kubernetes basics', 'Manifests, services and ingress to move a containerized app to a cluster.'],
    [5, 'bi bi-window', 'Frontend with Next.js', 'Server rendered React interfaces wired to my own APIs.'],
    [6, 'bi bi-file-earmark-text', 'Technical documentation', 'READMEs, diagrams and reports explaining how to run and extend a project.'],
];
$stmt = $pdo->prepare('INSERT INTO services (sort_order, icon, title, description) VALUES (?, ?, ?, ?)');
foreach ($services as $row) {
    $stmt->execute($row);
}

$pdo->commit();

echo "Portfolio data seeded.\n";
