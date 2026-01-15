<?php
session_start();
if (!isset($_SESSION['voter'])) {
    header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Voter Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #312e81 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        min-height: 100vh;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #f1f5f9;
        position: relative;
        overflow: hidden;
    }

    /* Same animated orbs as login page */
    body::before,
    body::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        filter: blur(110px);
        opacity: 0.15;
        z-index: -1;
        pointer-events: none;
    }

    body::before {
        width: 540px;
        height: 540px;
        background: #a78bfa;
        top: -30%;
        left: -25%;
        animation: orb-float 36s infinite cubic-bezier(0.445, 0.05, 0.55, 0.95);
    }

    body::after {
        width: 480px;
        height: 480px;
        background: #c084fc;
        bottom: -35%;
        right: -28%;
        animation: orb-float 44s infinite cubic-bezier(0.445, 0.05, 0.55, 0.95) reverse;
    }

    @keyframes orb-float {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50%      { transform: translate(140px, 120px) scale(1.14); }
    }

    .container {
        background: rgba(30, 41, 59, 0.27);
        backdrop-filter: blur(26px) saturate(220%);
        -webkit-backdrop-filter: blur(26px) saturate(220%);
        border: 1px solid rgba(165, 180, 252, 0.19);
        border-radius: 26px;
        padding: 48px 40px;
        width: 100%;
        max-width: 480px;
        box-shadow: 
            0 28px 70px rgba(0, 0, 0, 0.50),
            inset 0 0 0 1px rgba(165, 180, 252, 0.15);
        text-align: center;
        transition: all 0.55s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .container:hover {
        transform: translateY(-12px) scale(1.015);
        box-shadow: 
            0 48px 110px rgba(0, 0, 0, 0.62),
            inset 0 0 0 1.8px rgba(165, 180, 252, 0.24);
    }

    h2 {
        color: #f1f5f9;
        font-weight: 700;
        font-size: 2.2rem;
        margin-bottom: 40px;
        letter-spacing: -0.6px;
        text-shadow: 0 4px 14px rgba(0,0,0,0.55);
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    ul li a {
        display: block;
        background: rgba(165, 180, 252, 0.12);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(165, 180, 252, 0.28);
        border-radius: 16px;
        padding: 18px 24px;
        color: #f1f5f9;
        font-size: 1.15rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    ul li a:hover {
        background: rgba(165, 180, 252, 0.25);
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(165,180,252,0.35);
        color: #ffffff;
    }

    /* Logout link - subtle danger tone */
    ul li:last-child a {
        background: rgba(239, 68, 94, 0.12);
        border-color: rgba(239, 68, 94, 0.30);
    }

    ul li:last-child a:hover {
        background: rgba(239, 68, 94, 0.25);
        box-shadow: 0 12px 30px rgba(239,68,94,0.40);
    }

    @media (max-width: 480px) {
        .container {
            padding: 40px 28px;
            margin: 20px;
            border-radius: 20px;
        }
        h2 {
            font-size: 1.9rem;
        }
    }
</style>
</head>
<body>

<div class="container">

<h2>Voter Dashboard</h2>

<ul>
    <li><a href="vote.php">Cast Vote</a></li>
    <li><a href="../logout.php">Logout</a></li>
</ul>

</div>

</body>
</html>
