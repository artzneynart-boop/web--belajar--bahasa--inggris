<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>

<nav id="navbar">
    <a class="nav-logo" href="index.php">
        <div class="nav-logo-icon">Ms</div>
        <span class="nav-logo-text">
            My<span>Speakora</span>
        </span>
    </a>

    <ul class="nav-links">
        <li><a href="index.php">🏠 Home</a></li>
        <li><a href="materi.php">📚 Materi</a></li>
        <li><a href="kamus.php">📖 Kamus</a></li>
        <li><a href="kuis.php">🧠 Kuis</a></li>
    </ul>

    <div class="nav-auth">

        <?php if($isLoggedIn): ?>

            <div class="user-info">
                <div class="user-avatar">
                    <?= strtoupper(substr($username, 0, 1)); ?>
                </div>

                <div class="user-detail">
                    <span class="user-label">Selamat Datang</span>
                    <span class="user-name">
                        <?= htmlspecialchars($username); ?>
                    </span>
                </div>
            </div>

            <a href="logout.php" class="btn-register">
                Logout
            </a>

        <?php else: ?>

            <a class="btn-login" onclick="openModal('login')">
                Login
            </a>

            <a class="btn-register" onclick="openModal('register')">
                Register
            </a>

        <?php endif; ?>

    </div>

    <div class="hamburger" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>