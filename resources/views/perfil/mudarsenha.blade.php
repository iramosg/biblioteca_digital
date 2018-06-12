<form action="{{ route('alterarsenha') }}" method="POST" id="alterarSenha">
                {{ csrf_field() }}
                <div class="cabecalho-cta gap text-center">
                    <p class="h6 subheader">Mudar senha:</p>
                </div>
                <div class="input-group gap">
						<span class="input-group-label"><i class="fas fa-lock"></i></span>
						<input class="input-group-field" type="password" id="txtAtualSenha" name="atualsenha" require>
						<label for="txtAtualSenha" class="label-animado"><span class="obrigatorio">*</span> Senha atual:</label>
					</div>
                    <div class="input-group gap">
						<span class="input-group-label"><i class="fas fa-lock"></i></span>
						<input class="input-group-field" type="password" id="txtNovaSenha" name="novasenha" require>
						<label for="txtNovaSenha" class="label-animado"><span class="obrigatorio">*</span> Nova senha:</label>
					</div>

                <div class="input-group gap">
						<span class="input-group-label"><i class="fas fa-lock"></i></span>
						<input class="input-group-field" type="password" id="txtComfirmaSenha" name="comfirmasenha" require>
						<label for="txtComfirmaSenha" class="label-animado"><span class="obrigatorio">*</span> Comfirmar Senha:</label>
					</div>        
                <div class="box-action cell small-12 large-6">
                    <input type="submit" id="btnLogin" class="btn-login btn-principal" value="Redefinir">
                </div>
            </div>
        </div>
    </form>