<nav class="navbar navbar-expand-md sticky-top navbar-dark bg-dark">
  <?php if (session()->has('usuario')) { ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenus" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <?php } ?>
  <div class="navbar-brand">Ponto Webapp</div>
  <div class="collapse navbar-collapse" id="navbarMenus">
    <?php if (session()->has('usuario')) { ?>
      <ul class="navbar-nav mr-auto">
        <?php foreach (session('usuario.menus') as $menu) { ?>
          <li class="nav-item">
            <a class="nav-link" href="/<?php echo $menu['href'] ?>">
              <?php echo $menu['label'] ?>
            </a>
          </li>
        <?php } ?>
      </ul>
      <a class="nav-link pl-0" href="/autenticacao/sair">Sair</a>
    <?php } ?>
  </div>
</nav>