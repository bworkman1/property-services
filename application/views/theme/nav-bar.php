
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand d-md-none d-lg-none" href="#">Samson Concrete</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto w-100 nav-justified">
      <?php
        

        foreach($navItems as $item) {
          $currentUrl = current_url();
          $urlArray = explode('/' , $currentUrl);
          $last = end($urlArray);

          $current = '';
          $sr = '';
          if($last == '' && $item['label'] == 'Home') {
            $current = 'active';
            $sr = '<span class="sr-only">(current)</span>';
          } elseif(strtolower($last) == strtolower($item['label'])) {
            $current = 'active';
            $sr = '<span class="sr-only">(current)</span>';
          }

          

          echo '<li class="nav-item '.$current.'">';
            echo '<a class="nav-link" href="'.$item['url'].'">'.$item['label'].' '.$sr.'</a>';
          echo '</li>';
        }
      ?>  

      <li class="nav-item">
        <span id="employment-link" data-toggle="modal" data-target="#employmentModal" class="nav-link">Employment</span>
      </li>
    </ul>
  </div>
</nav>