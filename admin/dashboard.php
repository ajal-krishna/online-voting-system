<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #312e81 100%);
        color: #f1f5f9;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        min-height: 100vh;
        margin: 0;
        padding: 0;
        position: relative;
        overflow-x: hidden;
    }

    /* Subtle animated background orbs – consistent with login */
    body::before,
    body::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        filter: blur(110px);
        opacity: 0.14;
        z-index: -1;
        pointer-events: none;
    }

    body::before {
        width: 540px;
        height: 540px;
        background: #a78bfa;
        top: -28%;
        left: -24%;
        animation: orb-float 38s infinite ease-in-out;
    }

    body::after {
        width: 480px;
        height: 480px;
        background: #c084fc;
        bottom: -34%;
        right: -26%;
        animation: orb-float 46s infinite ease-in-out reverse;
    }

    @keyframes orb-float {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50%      { transform: translate(140px, 120px) scale(1.14); }
    }

    .container {
        max-width: 1280px;
        margin: 60px auto 40px;
        padding: 0 20px;
    }

    h2 {
        text-align: center;
        font-weight: 700;
        font-size: 2.4rem;
        margin-bottom: 60px;
        letter-spacing: -0.6px;
        text-shadow: 0 4px 16px rgba(0,0,0,0.55);
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 28px;
    }

    .dash-card {
        background: rgba(30, 41, 59, 0.28);
        backdrop-filter: blur(24px) saturate(220%);
        -webkit-backdrop-filter: blur(24px) saturate(220%);
        border: 1px solid rgba(165, 180, 252, 0.18);
        border-radius: 20px;
        padding: 40px 28px;
        text-align: center;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 
            0 22px 55px rgba(0, 0, 0, 0.45),
            inset 0 0 0 1px rgba(165, 180, 252, 0.12);
        position: relative;
        overflow: hidden;
    }

    .dash-card:hover {
        transform: translateY(-14px) scale(1.03);
        box-shadow: 
            0 40px 100px rgba(0, 0, 0, 0.60),
            inset 0 0 0 1.6px rgba(165, 180, 252, 0.26);
    }

    .dash-card a {
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
    }

    .dash-card span {
        font-size: 4.2rem;              /* larger icons for premium feel */
        line-height: 1;
        transition: transform 0.5s ease;
    }

    .dash-card:hover span {
        transform: scale(1.18) rotate(8deg);
    }

    .dash-card span + span {            /* text below icon */
        font-size: 1.15rem;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    /* Logout – distinct visual cue */
    .logout-card {
        border-color: rgba(239, 68, 68, 0.30);
    }

    .logout-card:hover {
        background: rgba(239, 68, 68, 0.16);
        border-color: rgba(239, 68, 68, 0.50);
        box-shadow: 
            0 40px 100px rgba(239, 68, 68, 0.38),
            inset 0 0 0 1.6px rgba(239, 68, 68, 0.30);
    }

    .logout-card span {
        color: #fca5a5;                 /* lighter red for icon */
    }

    .logout-card:hover span {
        color: white;
    }

    @media (max-width: 768px) {
        .dashboard-grid {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }
        .dash-card {
            padding: 32px 20px;
        }
        h2 {
            font-size: 2rem;
            margin-bottom: 40px;
        }
    }
</style>
</head>
<body>

<div class="container">

<h2>Admin Dashboard</h2>

<div class="dashboard-grid">

    <div class="dash-card">
        <a href="add_voter.php">
            <span>👥</span>
            Add Voter
        </a>
    </div>

    <div class="dash-card">
        <a href="add_candidate.php">
            <span>🧑‍💼</span>
            Add Candidate
        </a>
    </div>

    <div class="dash-card">
        <a href="control_voting.php">
            <span>🗳️</span>
            Start / Stop Voting
        </a>
    </div>

    <div class="dash-card">
        <a href="results.php">
            <span>📊</span>
            View Results
        </a>
    </div>

    <div class="dash-card logout-card">
        <a href="../logout.php">
            <span>🚪</span>
            Logout
        </a>
    </div>

</div>

</div>

</body>
</html>
