<?php
$page_title = 'Dashboard';
require_once('includes/load.php');
if (!$session->isUserLoggedIn(true)) redirect('index.php', false);
$c_category=count_by_id('categories');
$c_product=count_by_id('products');
$c_sale=count_by_id('sales');
$c_user=count_by_id('users');
$recent_sales=find_recent_sale_added('6');
$recent_products=find_recent_product_added('6');
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
    <h1 class="page-title">Good day, <?php echo remove_junk(first_character($user['name'])); ?> 👋</h1>
    <p class="page-subtitle">Here’s a quick overview of your KD Automobile Management System.</p>
  </div>
</div>
<div class="row">
  <a href="categorie.php" style="color:inherit"><div class="col-md-3 col-sm-6"><div class="panel panel-box"><div class="panel-icon"><i class="fa-solid fa-layer-group"></i></div><div class="panel-value"><h2><?php echo (int)$c_category['total']; ?></h2><p>Categories</p></div></div></div></a>
  <a href="product.php" style="color:inherit"><div class="col-md-3 col-sm-6"><div class="panel panel-box"><div class="panel-icon"><i class="fa-solid fa-boxes-stacked"></i></div><div class="panel-value"><h2><?php echo (int)$c_product['total']; ?></h2><p>Inventory Items</p></div></div></div></a>
  <a href="sales.php" style="color:inherit"><div class="col-md-3 col-sm-6"><div class="panel panel-box"><div class="panel-icon"><i class="fa-solid fa-cart-shopping"></i></div><div class="panel-value"><h2><?php echo (int)$c_sale['total']; ?></h2><p>Sales Records</p></div></div></div></a>
  <?php if($user['user_level']==='1'): ?><a href="users.php" style="color:inherit"><div class="col-md-3 col-sm-6"><div class="panel panel-box"><div class="panel-icon"><i class="fa-solid fa-users"></i></div><div class="panel-value"><h2><?php echo (int)$c_user['total']; ?></h2><p>System Users</p></div></div></div></a><?php endif; ?>
</div>
<div class="row">
  <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading clearfix"><strong><i class="fa-solid fa-clock-rotate-left text-primary"></i> Recent Sales</strong><a href="sales.php" class="pull-right">View all <i class="fa-solid fa-arrow-right"></i></a></div>
      <div class="panel-body table-responsive">
        <table class="table">
          <thead><tr><th>#</th><th>Item</th><th>Quantity</th><th>Total</th><th>Date</th></tr></thead>
          <tbody>
          <?php if($recent_sales): foreach($recent_sales as $sale): ?>
            <tr><td><?php echo count_id(); ?></td><td><strong><?php echo remove_junk(first_character($sale['name'])); ?></strong></td><td><?php echo (int)$sale['qty']; ?></td><td><strong><?php echo remove_junk($sale['price']); ?></strong></td><td><?php echo remove_junk($sale['date']); ?></td></tr>
          <?php endforeach; else: ?><tr><td colspan="5" class="text-center text-muted">No sales records yet.</td></tr><?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="panel panel-default">
      <div class="panel-heading clearfix"><strong><i class="fa-solid fa-box-open text-primary"></i> Recently Added Inventory</strong><a href="product.php" class="pull-right">View all</a></div>
      <div class="panel-body table-responsive">
        <table class="table">
          <thead><tr><th>Item</th><th>Category</th><th>Stock</th></tr></thead>
          <tbody>
          <?php if($recent_products): foreach($recent_products as $product): ?>
            <tr><td><strong><?php echo remove_junk(first_character($product['name'])); ?></strong></td><td><?php echo remove_junk($product['categorie']); ?></td><td><span class="badge" style="background:#e0f2fe;color:#0369a1"><?php echo (int)$product['quantity']; ?></span></td></tr>
          <?php endforeach; else: ?><tr><td colspan="3" class="text-center text-muted">No inventory items yet.</td></tr><?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12"><div class="panel panel-default"><div class="panel-body" style="padding:18px 20px"><strong><i class="fa-solid fa-shield-halved"></i> KDAMS Management Suite</strong><span class="text-muted"> &nbsp; Inventory, sales tracking, users and reports in one place.</span></div></div></div>
</div>
<?php include_once('layouts/footer.php'); ?>
