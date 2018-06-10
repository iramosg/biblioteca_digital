
<!-- Menu Centro -->
<div class="top-bar-left" id="responsive-menu">
    <ul class="menu">
        <li class="item-menu"><a href="{{ route('livros.index') }}" class="link ebook" title="Ebooks"><i class="fas fa-book"></i> Ebooks</a></li>
        <li class="item-menu"><a href="{{ route('escritor') }}" class="link editor" title="Conheça o Editor"><i class="fas fa-pencil-alt"></i> Conheça o Editor</a></li>
        <li class="item-menu"><a href="{{ route('leitor') }}" class="link leitor" title="Conheça o Leitor"><i class="fas fa-id-card"></i> Conheça o Leitor</a></li>
    </ul>
</div>

<!-- Menu Direita -->
<div class="top-bar-right">
    <ul class="menu">
        <li class="item-menu"><a href="{{ route('login.cadastrar') }}" class="link cadastro" title="Cadastre-se">Cadastre-se</a></li>
        <li class="item-menu"><a href="{{ route('login.index') }}" class="link entrar" title="Entrar">Entrar</a></li>
    </ul>
</div>

<!-- Mobile Toggle Menu -->
<div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
    <div class="title-bar-title">Menu</div>
</div>
