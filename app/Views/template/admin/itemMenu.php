<?php foreach($menu as $m):?>
    <li class="nav-item">
        <a href="<?= site_url($m["url"]) ?>" class="nav-link">
            <i class="<?= $m["icone"] ?> nav-icon"></i>
            <p><?= $m["nome"] ?></p>
        </a>
    </li>
<?php endforeach; ?>