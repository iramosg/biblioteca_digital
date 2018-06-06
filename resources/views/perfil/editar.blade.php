<form action="{{ route('perfil.edit') }}" method="POST">
<input type="hidden" name="id" value="{{ $redes_sociais->id }}">
    <input type="text" name="facebook" value="{{ $redes_sociais->facebook }}">
    <input type="text" name="twitter" value="{{ $redes_sociais->twitter }}">
    <input type="text" name="google_plus" value="{{ $redes_sociais->google_plus }}">
    <input type="text" name="instagram" value="{{ $redes_sociais->instagram }}">
    <input type="text" name="tumblr" value="{{ $redes_sociais->tumblr }}">
    <input type="text" name="blog" value="{{ $redes_sociais->blog }}">
    <input type="text" name="site" value="{{ $redes_sociais->site }}">
    <input type="text" name="linkedin" value="{{ $redes_sociais->linkedin }}">
    <input type="text" name="vk" value="{{ $redes_sociais->vk }}">

    <button>Enviar</button>
</form>