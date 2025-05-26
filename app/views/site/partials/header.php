<?php

use SayIt\Core\Auth; ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container">
        <a class="navbar-brand" href="/">SayIt</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/alphabet">Абетка</a></li>
                <li class="nav-item"><a class="nav-link" href="/dictionary">Словник</a></li>

                <?php if (Auth::check()): ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/logout">Вийти</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Увійти</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>