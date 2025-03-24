<header class="section header">
  <div class="container">
    Header
    {!! get_search_form(false) !!}
  </div>
  <div class="container">
    <nav class="nav">
      @php(wp_nav_menu([ // Example
        'theme_location'  => 'main_nav',
        'container'       => false, // you can use 'div', 'nav', false or other.
        'container_class' => 'container-class',
        "container_id"    => 'containerId',
        'menu_class'      => 'main-nav',
        'menu_id'         => 'mainNav',
        'items_wrap'      => '<ul id="%1$s" class="%2$s__list">%3$s</ul>']))
    </nav>
    <div class="burger">
      BURGER
    </div>
  </div>
  <nav class="nav nav--mobile">
    @php(wp_nav_menu([ // Example
      'theme_location'  => 'main_nav',
      'container'       => false, // you can use 'div', 'nav', false or other.
      'container_class' => 'container-class',
      "container_id"    => 'containerId',
      'menu_class'      => 'main-nav',
      'menu_id'         => 'mainNavMobile',
      'items_wrap'      => '<ul id="%1$s" class="%2$s__list">%3$s</ul>']))
  </nav>
</header>
