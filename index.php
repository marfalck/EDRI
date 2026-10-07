<?php
$pages = [
  "home" => [
    "title" => "Enterprise Dynamics",
    "subtitle" => "A Systems Theory for the Intentional Governance of Enterprise Evolution",
    "body" => [
      "Enterprise Dynamics is an independent research initiative exploring how enterprises continuously evolve to remain fit for purpose within changing operating landscapes.",
      "The site is the canonical home for the theory, working papers, knowledge base, visual language and research roadmap."
    ]
  ],
  "theory" => [
    "title" => "Theory",
    "subtitle" => "How enterprises remain fit for purpose over time",
    "body" => [
      "Enterprise Dynamics views enterprises as dynamic systems composed of evolving capabilities.",
      "The core model links Operating Landscape, Enterprise Purpose, Capability Architecture, Enterprise Motion, Enterprise Direction and Enterprise Resilience."
    ]
  ],
  "research" => [
    "title" => "Research",
    "subtitle" => "A working research programme",
    "body" => [
      "The research programme compares Enterprise Dynamics with existing strategy, systems thinking, organisational design and transformation theories.",
      "Current priorities include executive critique, academic feedback, comparative research and case study development."
    ]
  ],
  "knowledge" => [
    "title" => "Knowledge Base",
    "subtitle" => "Canonical reference material",
    "body" => [
      "The knowledge base contains terminology, visual language, governing laws, version history and working documents.",
      "All material is versioned and treated as a living research corpus."
    ]
  ],
  "visuals" => [
    "title" => "Visual Language",
    "subtitle" => "Engineering-inspired diagrams",
    "body" => [
      "The canonical visual language includes the Operating Landscape, Capability Gears, Enterprise Clock, Steering Wheel and Enterprise Gyroscope.",
      "Visuals should be monochrome, technical and mechanism-oriented rather than marketing-oriented."
    ]
  ],
  "papers" => [
    "title" => "Working Papers",
    "subtitle" => "Versioned publications",
    "body" => [
      "Working papers will be published here as the theory evolves.",
      "Version 0.1 will introduce the theory, governing laws, research agenda and questions for critique."
    ]
  ],
  "about" => [
    "title" => "About",
    "subtitle" => "Independent research initiative",
    "body" => [
      "Enterprise Dynamics is developed as an independent research initiative by Marko Falck.",
      "The purpose is to invite critique, build evidence and refine a systems theory of enterprise evolution."
    ]
  ]
];

$page = $_GET["page"] ?? "home";
if (!array_key_exists($page, $pages)) {
  http_response_code(404);
  $page = "home";
}
$current = $pages[$page];

function nav_link($key, $label, $page) {
  $active = $key === $page ? "active" : "";
  return "<a class=\"$active\" href=\"?page=$key\">$label</a>";
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($current["title"]) ?> | Enterprise Dynamics</title>
  <meta name="description" content="Enterprise Dynamics is an independent research initiative developing a systems theory for governing enterprise evolution.">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
  <div class="brand">
    <div class="mark">ED</div>
    <div>
      <strong>Enterprise Dynamics</strong>
      <span>Working Research Programme - v0.1</span>
    </div>
  </div>
  <nav>
    <?= nav_link("home", "Home", $page) ?>
    <?= nav_link("theory", "Theory", $page) ?>
    <?= nav_link("research", "Research", $page) ?>
    <?= nav_link("knowledge", "Knowledge Base", $page) ?>
    <?= nav_link("visuals", "Visuals", $page) ?>
    <?= nav_link("papers", "Working Papers", $page) ?>
    <?= nav_link("about", "About", $page) ?>
  </nav>
</header>

<main>
  <section class="hero">
    <p class="kicker">Independent Research Initiative</p>
    <h1><?= htmlspecialchars($current["title"]) ?></h1>
    <h2><?= htmlspecialchars($current["subtitle"]) ?></h2>
    <?php foreach ($current["body"] as $paragraph): ?>
      <p><?= htmlspecialchars($paragraph) ?></p>
    <?php endforeach; ?>
    <?php if ($page === "home"): ?>
    <div class="actions">
      <a class="button" href="?page=papers">Download Working Paper</a>
      <a class="button secondary" href="?page=theory">Explore the Theory</a>
    </div>
    <?php endif; ?>
  </section>

  <?php if ($page === "home"): ?>
  <section class="grid">
    <article>
      <h3>Operating Landscape</h3>
      <p>The external terrain of technology, competition, regulation, economics and society.</p>
    </article>
    <article>
      <h3>Capability Architecture</h3>
      <p>The enterprise capabilities and interactions that define what the enterprise is built from.</p>
    </article>
    <article>
      <h3>Enterprise Clock</h3>
      <p>The mechanism that synchronises capability evolution over time.</p>
    </article>
    <article>
      <h3>Enterprise Direction</h3>
      <p>Leadership steering and gyroscopic stability that preserve coherence during change.</p>
    </article>
  </section>
  <?php endif; ?>
</main>

<footer>
  <p>© <?= date("Y") ?> Enterprise Dynamics Research Initiative. Working draft material. Not affiliated with enterprise simulation software of the same name.</p>
</footer>
</body>
</html>
