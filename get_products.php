<?php
// Include your database connection file
include('koneksi.php');

// Check if category id is provided
if(isset($_GET['kat'])) {
    $category_id = $_GET['kat'];
    
    // Fetch products based on category id
    $query = mysqli_query($koneksi, "SELECT * FROM products WHERE category_id = $category_id");
    
    // Prepare JSON response
    $response = array();
    while($product = mysqli_fetch_assoc($query)) {
        $response[] = $product;
    }
    
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select the container element
    const container = document.querySelector('.box');

    // Select all category links
    const categoryLinks = document.querySelectorAll('.box a');

    // Add click event listener to each category link
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            
            // Fetch products based on selected category
            const categoryId = this.getAttribute('href').split('=')[1];
            fetchProducts(categoryId);
        });
    });

    function fetchProducts(categoryId) {
        // Make AJAX request to get products based on category
        fetch(`get_products.php?kat=${categoryId}`)
            .then(response => response.json())
            .then(products => {
                // Clear previous products
                container.innerHTML = '';

                // Display products
                products.forEach(product => {
                    const productElement = document.createElement('div');
                    productElement.classList.add('col-5');
                    productElement.innerHTML = `
                        <img src="produk/${product.image}" width="50px" style="margin-bottom: 5px;">
                        <p>${product.name}</p>
                    `;
                    container.appendChild(productElement);
                });
            })
            .catch(error => {
                console.error('Error fetching products:', error);
            });
    }
});
</script>

