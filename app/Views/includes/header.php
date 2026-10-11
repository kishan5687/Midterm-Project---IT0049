<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Complete Point-of-Sale System</title>
    
    <link href="https://jsdelivr.net" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1d1f !important; 
            color: #dcddde;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            min-width: 280px;
            max-width: 280px;
            min-height: 100vh;
            background: #23272a !important; 
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            border-right: 1px solid rgba(255, 255, 255, 0.02);
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.4) !important;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .main-content {
            margin-left: 280px; 
            padding: 40px;
            min-height: 100vh;
            background-color: #1a1d1f !important; 
        }

        .sidebar-brand {
            padding: 28px 24px;
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            background-color: #1a1d1f; 
            border-bottom: 1px solid #2d3236;
            color: #38bdf8 !important; 
            text-shadow: 0 0 10px rgba(56, 189, 248, 0.2);
            text-align: center;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            color: #b9bbbe !important; 
            text-decoration: none !important;
            padding: 14px 20px;
            margin: 6px 16px;
            border-radius: 12px; 
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid transparent;
        }

        .sidebar-link:hover {
            color: #ffffff !important;
            background-color: #2b3035 !important; 
            border-color: rgba(0, 188, 212, 0.15) !important;
            box-shadow: 3px 3px 6px rgba(0,0,0,0.3), inset 1px 1px 0 rgba(255,255,255,0.05) !important;
            transform: translateX(4px);
        }

        .pos-card {
            background: #23272a !important;
            border: 1px solid rgba(255, 255, 255, 0.02) !important;
            border-radius: 16px !important;
            box-shadow: 10px 10px 20px #111314, -10px -10px 20px #2a2f33 !important;
            padding: 30px !important;
            color: #ffffff !important;
        }

        .sidebar-footer-session {
            padding: 20px !important;
            background-color: #1a1d1f !important;
            border-top: 1px solid #2d3236 !important;
            text-align: center;
        }

        .txt-staff-label {
            color: #8e9297 !important;
            font-size: 13px !important;
            margin-bottom: 12px !important;
            display: block !important;
        }

        .txt-staff-user {
            color: #ffffff !important;
            font-weight: 700 !important;
        }

        .btn-premium-logout {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            width: 90% !important;
            padding: 10px !important;
            background-color: #ff4500 !important;
            color: #ffffff !important;
            font-size: 13.5px !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            text-align: center !important;
            border-radius: 10px !important;
            box-shadow: 0 4px 12px rgba(255, 69, 0, 0.25) !important;
            transition: all 0.2s ease-in-out !important;
            border: none !important;
        }

        .btn-premium-logout:hover {
            background-color: #e03e00 !important;
            box-shadow: 0 6px 16px rgba(255, 69, 0, 0.4) !important;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

<?php if(session()->get('isLoggedIn')): ?> 
    <div class="sidebar"> 
        <div class="sidebar-brand"> 
             System Dashboard 
        </div> 
        
        <div class="nav flex-column mt-4 flex-grow-1"> 
            <a class="sidebar-link" href="/"><span class="me-2"></span> Dashboard Overview</a> 
            <a class="sidebar-link" href="/products"><span class="me-2"></span> Product Inventory</a> 
            <a class="sidebar-link" href="/customers"><span class="me-2"></span> Customer Directory</a> 
            <a class="sidebar-link" href="/users"><span class="me-2"></span> Staff Profiles</a> 
            <a class="sidebar-link" href="/sales/record"><span class="me-2"></span> Record New Sale</a> 
            <a class="sidebar-link" href="/sales/history"><span class="me-2"></span> Sales History Logs</a> 
        </div> 
        
        <div class="sidebar-footer-session"> 
            <span class="txt-staff-label">
                Staff Account: <strong class="txt-staff-user"><?= esc(session()->get('username')) ?></strong>
            </span> 
            <a class="btn-premium-logout" href="/logout">Log Out Session</a> 
        </div> 
    </div>
<?php endif; ?>

<div class="<?= session()->get('isLoggedIn') ? 'main-content' : 'container mt-5' ?>">
