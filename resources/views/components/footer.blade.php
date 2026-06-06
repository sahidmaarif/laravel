{{-- Footer Component --}}
<footer class="bg-dark text-light mt-5 py-4">
    <div class="container">
        <div class="row">
            <!-- Footer Section 1: About -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold mb-3">About Online Shop</h5>
                <p class="small">
                    Your one-stop shop for quality products at great prices. 
                    Browse our collection and enjoy a seamless shopping experience.
                </p>
            </div>
            
            <!-- Footer Section 2: Quick Links -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold mb-3">Quick Links</h5>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('home') }}" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-light text-decoration-none">Products</a></li>
                    <li><a href="{{ route('cart') }}" class="text-light text-decoration-none">Cart</a></li>
                    <li><a href="{{ route('checkout.create') }}" class="text-light text-decoration-none">Checkout</a></li>
                </ul>
            </div>
            
            <!-- Footer Section 3: Contact -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold mb-3">Contact</h5>
                <p class="small mb-1">
                    <i class="bi bi-envelope"></i> info@onlineshop.com
                </p>
                <p class="small mb-1">
                    <i class="bi bi-telephone"></i> (555) 123-4567
                </p>
                <p class="small">
                    <i class="bi bi-geo-alt"></i> 123 Shop Street, City, State 12345
                </p>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <hr class="border-secondary my-3">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="small mb-0">
                    &copy; {{ date('Y') }} Online Shop. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="small mb-0">
                    Built with <i class="bi bi-heart-fill text-danger"></i> using Laravel & Bootstrap
                </p>
            </div>
        </div>
    </div>
</footer>
