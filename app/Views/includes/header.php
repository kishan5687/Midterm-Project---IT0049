<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Complete Point-of-Sale System</title>
    
    <!-- FALLBACK OFFLINE BOOTSTRAP STYLING (In case internet CDN drops) -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    
    <!-- Elegant Dashboard Typography & Theme Colors -->
    <style>
        @import url('https://googleapis.com');
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f8fafc !important; /* Soft premium grey backdrop */
            color: #1e293b;
        }
        .sidebar {
            min-width: 280px;
            max-width: 280px;
            min-height: 100vh;
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%); /* Elegant Slate Gradient */
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }
        .main-content {
            margin-left: 280px; 
            padding: 40px;
            min-height: 100vh;
        }
        .sidebar-brand {
            padding: 28px 24px;
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            background-color: rgba(0, 0, 0, 0.15);
            border-bottom: 1px solid rgba(255,255,255,0.05);
            color: #38bdf8; /* Soft blue focus color */
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            color: #94a3b8; /* Muted slate font color */
            text-decoration: none;
            padding: 12px 20px;
            margin: 6px 16px;
            border-radius: 8px; 
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.2s ease-in-out;
        }
        /* Beautiful Semi-Box Highlight Hover Effect */
        .sidebar-link:hover {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.08); /* Semi-transparent frosted box */
            box-shadow: inset 0 1px 0 0 rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }
        /* Dashboard Visual Card Wrapper Components */
        .pos-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
            padding: 24px;
        }
    </style>
</head>
<body class="bg-light">

<?php if(session()->get('isLoggedIn')): ?>
    <!-- Vertical Sidebar Navigation panel -->
    <div class="sidebar d-flex flex-column text-white shadow">
        <div class="sidebar-brand text-center">
            🚀 System Dashboard
        </div>
        
        <!-- Vertically Stacked Links with explicit colors -->
        <div class="nav flex-column mt-4 flex-grow-1">
            <a class="sidebar-link" href="/" style="color: #cbd5e1;">🏠 Dashboard Overview</a>
            <a class="sidebar-link" href="/products" style="color: #cbd5e1;">📦 Product Inventory</a>
            <a class="sidebar-link" href="/customers" style="color: #cbd5e1;">👥 Customer Directory</a>
            <a class="sidebar-link" href="/users" style="color: #cbd5e1;">👔 Staff Profiles</a>
            <a class="sidebar-link" href="/sales/record" style="color: #cbd5e1;">🛒 Record New Sale</a>
            <a class="sidebar-link" href="/sales/history" style="color: #cbd5e1;">📜 Sales History Logs</a>
        </div>
        
        <!-- User Footer Session Block inside Sidebar -->
        <div class="p-3 bg-dark border-top border-secondary text-center" style="background-color: #0f172a !important;">
            <small class="d-block mb-3" style="color: #94a3b8;">Staff Account: <strong style="color: #f1f5f9;"><?= esc(session()->get('username')) ?></strong></small>
            <a class="btn btn-sm btn-outline-danger w-100 py-2 fw-semibold" style="border-radius: 6px;" href="/logout">Log Out Session</a>
        </div>
    </div>
<?php endif; ?>

<!-- Main Project Content Canvas Block -->
<div class="<?= session()->get('isLoggedIn') ? 'main-content' : 'container mt-5' ?>">
