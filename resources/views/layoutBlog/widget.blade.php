<div class="col-md-4">
    <!-- social widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Social Media</h2>
        </div>
        <div class="social-widget">
            <ul>
                <li>
                    <a href="#" class="social-facebook">
                        <i class="fa fa-facebook"></i>
                        <span>21.2K<br>Followers</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-twitter">
                        <i class="fa fa-twitter"></i>
                        <span>10.2K<br>Followers</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-google-plus">
                        <i class="fa fa-google-plus"></i>
                        <span>5K<br>Followers</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /social widget -->

    <!-- category widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Categories</h2>
        </div>
        <div class="category-widget">
            <ul>
                @foreach($category_widget as $hasil)
                <li><a href="#">{{ $hasil->name }} <span>{{ $hasil->hitungCategory->count() }}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /category widget -->
</div>
