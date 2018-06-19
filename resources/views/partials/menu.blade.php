@if(!Auth::id())

<!-- HEADER -->
<header class="header menu-logoff">
		<div class="grid-container center-full">
			<!-- Logo -->
			<div class="box-logo">
				<a href="{{ route('index') }}" title="Biblioteka Digital">
					<img src="{{ asset('images/biblioteca-digital-logo.png')}}" alt="Biblioteka Digital" class="logo-img">
				</a>
				<h1 class="no-text logo-txt">Biblioteka Digital</h1>
			</div>
			
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
			
			
		</div>
</header>

@else
<header class="header">
        <div class="grid-container center-full">
            <!-- Logo -->
            <div class="box-logo">
                <a href="{{ route('index') }}" title="Biblioteka Digital">
                    <img src="{{ asset('images/biblioteca-digital-logo.png') }}" alt="Biblioteka Digital" class="logo-img">
                </a>
                <h1 class="no-text logo-txt">Biblioteka Digital</h1>
            </div>

            <!-- Menu Centro -->
            
            <div class="top-bar-left" id="responsive-menu">
                <div id="search" class="search center-full">
                <form action="{{ route('buscar') }}" method="POST" id="search-ebook">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <select id="select-opt-search" name="tipo">
                            <option value="livro">e-book</option>
                            <option value="usuario">Usuário</option>
                            <option value="categoria">Categoria</option>
                        </select>
                    </div>
                    
                        <div class="center-full">
                            <div class="input-group gap">
                                <input type="text" name="busca" id="busca" class="inpt-search input-group-field" placeholder="O que você procura?">
                            </div>
                            <input type="submit" class="btn-principal btn-search" value="Buscar">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Menu Direita -->
            <div class="top-bar-right">
                <ul class="menu">
                    <li class="item-menu"><a href="{{ route('livros.cadastrar') }}" class="link publicar btn-secundario" title="Publicar Ebook">Publicar Ebook</a></li>
                    <li class="item-menu"><a href="{{ route('perfil.index', ['url_amigavel' => Auth::user()->url_amigavel ]) }}" class="link meu-perfil btn-principal" title="Meu Perfil">Meu Perfil</a></li>
                    <li class="item-menu"><a href="{{ route('login.logout') }}" class="link meu-perfil btn-principal btn-red" title="Sair">Sair</a></li>
                </ul>
            </div>

            <!-- Mobile Toggle Menu -->
            <div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
                <button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
                <div class="title-bar-title">Menu</div>
            </div>
        </div>
    </header>
@endif
