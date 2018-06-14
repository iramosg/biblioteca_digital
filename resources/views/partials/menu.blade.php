@if(!Auth::id())

<!-- HEADER -->
<header class="header">
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
                    <div class="input-group">
                        <select id="select-opt-search">
                            <option value="ebook">Ebooks</option>
                            <option value="user">Usuário</option>
                            <option value="category">Categoria</option>
                        </select>
                    </div>
                    <form action="#" method="#" id="search-ebook">
                        <div class="center-full">
                            <div class="input-group gap">
                                <input type="text" name="txtSearchEbook" id="txtSearchEbook" class="inpt-search input-group-field" placeholder="Digite o nome da ebook que quer encontrar...">
                            </div>
                            <input type="submit" class="btn-principal btn-search" value="Buscar">
                        </div>
                    </form>
                    <form action="#" method="#" id="search-user" style="display:none;">
                        <div class="center-full">
                            <div class="input-group gap">
                                <input type="text" name="txtSearchUser" id="txtSearchUser" class="inpt-search input-group-field" placeholder="Digite o nome do usuário que quer encontrar...">
                            </div>
                            <input type="submit" class="btn-principal btn-search" value="Buscar">
                        </div>
                    </form>
                    <form action="#" method="#" id="search-category" style="display:none;">
                        <div class="center-full">
                            <div class="input-group gap">
                                <input type="text" name="txtSearchCategory" id="txtSearchCategory" class="inpt-search input-group-field" placeholder="Digite o nome da categoria que quer encontrar...">
                            </div>
                            <input type="submit" class="btn-principal btn-search" value="Buscar">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Menu Direita -->
            <div class="top-bar-right">
                <ul class="menu">
                    <li class="item-menu"><a href="#" class="link publicar btn-secundario" title="Publicar Ebook">Publicar Ebook</a></li>
                    <li class="item-menu"><a href="#" class="link meu-perfil btn-principal" title="Meu Perfil">Meu Perfil</a></li>
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
