<?= view('includes/header') ?>

<div id="dashboard-theme-override">
    <div class="dashboard-wrapper">
        
        <div class="pos-card-premium">
            <h1 class="premium-title">Welcome to the POS System</h1>
            <p class="premium-subtitle">Use the navigation menu panel on the left to handle items management, view customer logs, or execute cash sales records.</p>
            
            <div class="custom-divider"></div>
            
            <div class="actions-grid">
                
                <a href="/sales/record" class="action-card card-glow-orange">
                    <div class="action-icon">🛒</div>
                    <div class="action-content">
                        <div class="action-title">Record a New Sale</div>
                        <div class="action-desc">Launch the checkout terminal interface to input new customer items and process payments.</div>
                    </div>
                </a>

                <a href="/sales/history" class="action-card card-glow-blue">
                    <div class="action-icon">📜</div>
                    <div class="action-content">
                        <div class="action-title">View Transaction Logs</div>
                        <div class="action-desc">Review your retail records, generated invoices, and dynamic payment archives.</div>
                    </div>
                </a>
                
            </div>
        </div>

    </div>
</div>

<style>
    #dashboard-theme-override {
        background-color: #1a1d1f !important;
        width: 100% !important;
        min-height: 100vh !important;
        margin: 0 !important;
        padding: 60px 50px !important; 
        display: flex !important;
        justify-content: flex-start !important;
        align-items: center !important;
        box-sizing: border-box !important;
    }

    #dashboard-theme-override * {
        box-sizing: border-box !important;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }

    .dashboard-wrapper {
        width: 100% !important;
        max-width: 960px !important; 
    }

    .pos-card-premium {
        background: #23272a !important;
        padding: 55px 45px !important;
        border-radius: 24px !important;
        box-shadow: 10px 10px 25px #111314, -10px -10px 25px #2a2f33 !important;
        border: 1px solid rgba(255, 255, 255, 0.01) !important;
        width: 100% !important;
    }

    .premium-title {
        color: #ffffff !important;
        font-weight: 700 !important;
        font-size: 34px !important;
        margin: 0 0 16px 0 !important;
        letter-spacing: -0.5px !important;
    }

    .premium-subtitle {
        color: #8e9297 !important;
        font-size: 15px !important;
        line-height: 1.6 !important;
        margin: 0 !important;
        max-width: 650px !important;
    }

    .custom-divider {
        border-top: 1px solid #2d3236 !important;
        margin: 40px 0 !important;
        width: 100% !important;
    }

    .actions-grid {
        display: grid !important;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)) !important;
        gap: 25px !important;
        width: 100% !important;
    }

    .action-card {
        background: #23272a !important;
        border-radius: 18px !important;
        padding: 25px !important;
        text-decoration: none !important;
        display: flex !important;
        align-items: center !important;
        gap: 20px !important;
        box-shadow: 6px 6px 15px #111314, -6px -6px 15px #2a2f33 !important;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        border: 1px solid transparent !important;
        position: relative !important;
        overflow: hidden !important;
    }

    .action-card::before {
        content: '' !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 4px !important;
        height: 100% !important;
    }

    .card-glow-orange::before { background: #ff4500 !important; }
    .card-glow-blue::before { background: #00bcd4 !important; }

    .action-card:hover {
        transform: translateY(-4px) !important;
        background: #262a2e !important;
    }

    .action-card.card-glow-orange:hover {
        box-shadow: 0 10px 22px rgba(255, 69, 0, 0.12), 6px 6px 15px #111314 !important;
        border-color: rgba(255, 69, 0, 0.2) !important;
    }

    .action-card.card-glow-blue:hover {
        box-shadow: 0 10px 22px rgba(0, 188, 212, 0.12), 6px 6px 15px #111314 !important;
        border-color: rgba(0, 188, 212, 0.2) !important;
    }

    .action-icon {
        font-size: 26px !important;
        line-height: 1 !important;
        background-color: #1a1d1f !important;
        padding: 14px !important;
        border-radius: 14px !important;
        box-shadow: inset 2px 2px 4px #111314 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .action-content {
        flex: 1 !important;
    }

    .action-title {
        font-size: 17px !important;
        font-weight: 600 !important;
        margin-bottom: 6px !important;
    }

    .card-glow-orange .action-title { color: #ff4500 !important; }
    .card-glow-blue .action-title { color: #00bcd4 !important; }

    .action-desc {
        font-size: 13px !important;
        color: #8e9297 !important;
        line-height: 1.5 !important;
    }
</style>

<?= view('includes/footer') ?>
