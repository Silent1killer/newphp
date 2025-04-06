<?php
$page_title = "Menu";
include 'includes/header.php';

// Load menu data from JSON file
$menu_data = json_decode(file_get_contents('data/menu.json'), true);
?>

<!-- Menu Header -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">Our Menu</h1>
                <p class="lead">Experience our chef's exquisite creations</p>
            </div>
        </div>
    </div>
</section>

<!-- Menu Categories Navigation -->
<section class="py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="menu-nav">
                    <ul class="nav nav-pills justify-content-center menu-tabs" id="menuTabs" role="tablist">
                        <?php
                        $first = true;
                        foreach ($menu_data as $category => $items) {
                            $category_id = strtolower(str_replace(' ', '-', $category));
                            $active = $first ? 'active' : '';
                            echo '<li class="nav-item" role="presentation">';
                            echo '<button class="nav-link ' . $active . '" id="' . $category_id . '-tab" data-bs-toggle="pill" data-bs-target="#' . $category_id . '" type="button" role="tab" aria-controls="' . $category_id . '" aria-selected="' . ($first ? 'true' : 'false') . '">' . $category . '</button>';
                            echo '</li>';
                            $first = false;
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Menu Content -->
<section class="py-5">
    <div class="container">
        <div class="tab-content" id="menuTabsContent">
            <?php
            $first = true;
            foreach ($menu_data as $category => $items) {
                $category_id = strtolower(str_replace(' ', '-', $category));
                $active = $first ? 'show active' : '';
                echo '<div class="tab-pane fade ' . $active . '" id="' . $category_id . '" role="tabpanel" aria-labelledby="' . $category_id . '-tab">';
                echo '<div class="row mb-4"><div class="col-12 text-center"><h2 class="menu-category-title">' . $category . '</h2></div></div>';
                echo '<div class="row g-4">';
                
                foreach ($items as $item) {
                    echo '<div class="col-md-6">';
                    echo '<div class="menu-item p-4 h-100">';
                    echo '<div class="d-flex justify-content-between align-items-start">';
                    echo '<h3 class="h5 mb-2">' . $item['name'] . '</h3>';
                    echo '<span class="menu-price">' . $item['price'] . '</span>';
                    echo '</div>';
                    echo '<p class="menu-description mb-0">' . $item['description'] . '</p>';
                    if (isset($item['dietary'])) {
                        echo '<div class="dietary-info mt-2">';
                        foreach ($item['dietary'] as $dietary) {
                            switch ($dietary) {
                                case 'vegetarian':
                                    echo '<span class="badge bg-success me-1" title="Vegetarian"><i class="fas fa-leaf"></i></span>';
                                    break;
                                case 'vegan':
                                    echo '<span class="badge bg-success me-1" title="Vegan"><i class="fas fa-seedling"></i></span>';
                                    break;
                                case 'gluten-free':
                                    echo '<span class="badge bg-warning text-dark me-1" title="Gluten-Free">GF</span>';
                                    break;
                                case 'spicy':
                                    echo '<span class="badge bg-danger me-1" title="Spicy"><i class="fas fa-pepper-hot"></i></span>';
                                    break;
                            }
                        }
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
                
                echo '</div>';
                echo '</div>';
                $first = false;
            }
            ?>
        </div>
    </div>
</section>

<!-- Menu Legend -->
<section class="py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="menu-legend text-center">
                    <span class="me-3"><span class="badge bg-success me-1"><i class="fas fa-leaf"></i></span> Vegetarian</span>
                    <span class="me-3"><span class="badge bg-success me-1"><i class="fas fa-seedling"></i></span> Vegan</span>
                    <span class="me-3"><span class="badge bg-warning text-dark me-1">GF</span> Gluten-Free</span>
                    <span><span class="badge bg-danger me-1"><i class="fas fa-pepper-hot"></i></span> Spicy</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Special Dietary Needs -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Special Dietary Needs</h2>
                <p class="section-subtitle mb-5">We're happy to accommodate special dietary requirements. Please inform your server of any allergies or restrictions.</p>
                <a href="contact.php" class="btn btn-outline-primary">Contact Us for Special Requests</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
